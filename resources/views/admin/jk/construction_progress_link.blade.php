@if($item->exists)
    <div class="bg-white rounded shadow-sm p-4">
        <p class="mb-3">
            Фотоотчеты по ходу строительства для этой позиции / адреса.
        </p>
        <a class="btn btn-primary" href="{{ route('platform.jk.construction-progress.list', $item) }}">
            Управлять отчетами
        </a>
    </div>
@else
    <div class="bg-white rounded shadow-sm p-4">
        Сначала сохраните позицию, затем можно будет добавить отчеты хода строительства.
    </div>
@endif
