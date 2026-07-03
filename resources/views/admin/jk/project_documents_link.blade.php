@if($item->exists)
    <div class="bg-white rounded shadow-sm p-4">
        <div class="d-flex align-items-center justify-content-between gap-3 mb-3">
            <p class="mb-0">
                Документы, которые будут показываться на страницах позиций этого ЖК.
            </p>
            <a class="btn btn-primary"
               href="{{ route('platform.jk.document-groups.create', $item) }}">
                Добавить раздел
            </a>
        </div>

        @if($item->documentGroups->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>Раздел</th>
                        <th>Документ</th>
                        <th>Файл</th>
                        <th>Активность</th>
                        <th class="text-end">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($item->documentGroups as $group)
                        <tr>
                            <td>
                                <a href="{{ route('platform.jk.document-groups.edit', [$item, $group]) }}">
                                    {{ $group->title }}
                                </a>
                            </td>
                            <td>
                                @php($document = $group->documents->first())

                                @if($document)
                                    {{ $document->title }}
                                @else
                                    <span class="text-muted">Документ не заполнен.</span>
                                @endif
                            </td>
                            <td>
                                @if($document?->attachments->isNotEmpty())
                                    Да
                                @else
                                    <span class="text-muted">Не загружен</span>
                                @endif
                            </td>
                            <td>
                                {{ $group->active ? 'Да' : 'Нет' }}
                            </td>
                            <td class="text-end">
                                <a class="btn btn-link"
                                   href="{{ route('platform.jk.document-groups.edit', [$item, $group]) }}">
                                    Редактировать
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="mb-0 text-muted">
                Разделов документов пока нет.
            </p>
        @endif
    </div>
@else
    <div class="bg-white rounded shadow-sm p-4">
        Сначала сохраните ЖК, затем можно будет добавить документы проекта.
    </div>
@endif
