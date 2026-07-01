<?php

namespace App\Orchid\Screens\JkProjectDocument;

use App\Models\JkProject;
use App\Models\JkProjectDocument;
use App\Models\JkProjectDocumentGroup;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Attach;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class JkProjectDocumentGroupEditScreen extends Screen
{
    public $project;

    public $item;

    public $document;

    public function query(JkProject $project, JkProjectDocumentGroup $item): array
    {
        abort_if($item->exists && $item->jk_project_id !== $project->id, 404);

        $this->project = $project;
        $this->item = $item;
        $this->document = $this->document();

        return [
            'item' => $item,
            'document' => $this->document,
        ];
    }

    public function name(): ?string
    {
        return $this->item()->exists ? 'Редактировать документ проекта' : 'Добавить раздел документов';
    }

    public function description(): ?string
    {
        return $this->project()->title;
    }

    public function commandBar(): iterable
    {
        return [
            Button::make('Создать')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->item()->exists),

            Button::make('Обновить')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee($this->item()->exists),

            Button::make('Удалить')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->item()->exists),

            Link::make('К ЖК')
                ->icon('arrow-left')
                ->route('platform.jk.projects.edit', $this->project()),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                CheckBox::make('item.active')
                    ->placeholder('Активность')
                    ->sendTrueOrFalse(),

                Input::make('item.sort')
                    ->title('Сортировка'),

                Input::make('item.title')
                    ->title('Название раздела')
                    ->help('Например: Проектные декларации или Разрешения на строительство.')
                    ->required(),

                CheckBox::make('document.active')
                    ->placeholder('Показывать документ')
                    ->sendTrueOrFalse(),

                Input::make('document.sort')
                    ->title('Сортировка документа'),

                DateTimer::make('document.document_date')
                    ->title('Дата документа')
                    ->allowInput()
                    ->format('Y-m-d'),

                Input::make('document.title')
                    ->title('Название документа')
                    ->required(),

                Attach::make('document.attachments')
                    ->multiple()
                    ->maxCount(1)
                    ->title('Файл')
                    ->help('Загрузите один файл документа. На странице будет показана одна ссылка «Скачать».'),
            ]),
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $item = $this->item();

        $item->fill($request->get('item', []));
        $item->jk_project_id = $this->project()->id;
        $item->save();

        $documentFields = $request->get('document', []);
        unset($documentFields['attachments']);

        $document = $item->documents()->first() ?? new JkProjectDocument([
            'active' => true,
        ]);

        $document->fill($documentFields);
        $document->jk_project_document_group_id = $item->id;
        $document->save();

        $attachmentId = collect((array) $request->input('document.attachments', []))
            ->flatten()
            ->filter(fn ($id) => is_numeric($id) && (int) $id > 0)
            ->map(fn ($id) => (int) $id)
            ->first();

        $document->attachments()->sync($attachmentId ? [$attachmentId] : []);

        $item->documents()
            ->whereKeyNot($document->id)
            ->get()
            ->each(function (JkProjectDocument $extraDocument) {
                $extraDocument->attachments()->detach();
                $extraDocument->delete();
            });

        Alert::info('Сохранено');

        return redirect()->route('platform.jk.projects.edit', $this->project());
    }

    public function remove()
    {
        $this->item()->delete();

        Alert::info('Удалено');

        return redirect()->route('platform.jk.projects.edit', $this->project());
    }

    private function project(): JkProject
    {
        if ($this->project instanceof JkProject) {
            return $this->project;
        }

        $project = request()->route('project');

        if ($project instanceof JkProject) {
            return $project;
        }

        return JkProject::findOrFail($project);
    }

    private function item(): JkProjectDocumentGroup
    {
        if ($this->item instanceof JkProjectDocumentGroup) {
            return $this->item;
        }

        $item = request()->route('item');

        if ($item instanceof JkProjectDocumentGroup) {
            return $item;
        }

        if ($item) {
            return JkProjectDocumentGroup::findOrFail($item);
        }

        return new JkProjectDocumentGroup([
            'active' => true,
        ]);
    }

    private function document(): JkProjectDocument
    {
        $item = $this->item();

        if ($item->exists) {
            $document = $item->documents()->with('attachments')->first();

            if ($document instanceof JkProjectDocument) {
                return $document;
            }
        }

        return new JkProjectDocument([
            'active' => true,
            'sort' => 10,
        ]);
    }
}
