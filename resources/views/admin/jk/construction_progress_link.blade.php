@if($item->exists)
    <div class="bg-white rounded shadow-sm p-4">
        <div class="d-flex align-items-center justify-content-between gap-3 mb-3">
            <p class="mb-0">
                Фотоотчеты по ходу строительства для этой позиции / адреса.
            </p>
            <a class="btn btn-primary"
               href="{{ route('platform.jk.construction-progress.create', $item) }}">
                Добавить отчет
            </a>
        </div>

        @if($item->constructionProgress->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Название</th>
                        <th>Фото</th>
                        <th>Активность</th>
                        <th class="text-end">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($item->constructionProgress as $progress)
                        <tr>
                            <td>
                                {{ $progress->report_date?->format('d.m.Y') ?: 'Не указана' }}
                            </td>
                            <td>
                                {{ $progress->title ?: 'Без названия' }}
                            </td>
                            <td>
                                {{ $progress->attachments->count() }}
                            </td>
                            <td>
                                {{ $progress->active ? 'Да' : 'Нет' }}
                            </td>
                            <td class="text-end">
                                <a class="btn btn-link"
                                   href="{{ route('platform.jk.construction-progress.edit', [$item, $progress]) }}">
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
                Отчетов пока нет.
            </p>
        @endif
    </div>
@else
    <div class="bg-white rounded shadow-sm p-4">
        Сначала сохраните позицию, затем можно будет добавить отчеты хода строительства.
    </div>
@endif
