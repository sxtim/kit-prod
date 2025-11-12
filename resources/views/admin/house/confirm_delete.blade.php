<div id="bulk-preview-wrap">
    <p id="bulk-preview-empty" class="mb-0">Не выбрано ни одной записи.</p>
    <div id="bulk-preview" style="display:none">
        <p class="mb-3">Вы собираетесь удалить <span id="bulk-preview-count">0</span> квартир:</p>
        <div class="mb-3">
            <span>Номера квартир: </span>
            <span id="bulk-preview-numbers"></span>
        </div>
    </div>
</div>
<input type="hidden" id="bulk-delete-action" value="{{ route('platform.house.list') }}/removeSelected">
