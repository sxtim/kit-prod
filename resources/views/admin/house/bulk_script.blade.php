<script>
  (function(){
    const toggleSelector = '[data-controller="modal-toggle"][data-modal-toggle-key-value="confirmDelete"]';
    const confirmButtonId = 'submit-modal-confirmDelete';
    const postFormId = 'post-form';
    const deleteActionInput = 'bulk-delete-action';

    let selectedItems = [];

    function collectSelected() {
      var rows = [];
      document.querySelectorAll('input[name="ids[]"]:checked').forEach(function(chk) {
        var tr = chk.closest('tr');
        var numberCell = tr ? tr.querySelector('td[data-column="number"]') : null;
        rows.push({
          id: chk.value,
          number: numberCell ? numberCell.textContent.trim() : chk.value,
        });
      });
      return rows;
    }

    function renderPreview(items) {
      var empty = document.getElementById('bulk-preview-empty');
      var wrap = document.getElementById('bulk-preview');
      var cnt = document.getElementById('bulk-preview-count');
      var list = document.getElementById('bulk-preview-numbers');

      if (!empty || !wrap || !cnt || !list) {
        return;
      }

      if (items.length === 0) {
        empty.style.display = '';
        wrap.style.display = 'none';
        list.textContent = '';
        cnt.textContent = '0';
        return;
      }

      empty.style.display = 'none';
      wrap.style.display = '';
      cnt.textContent = String(items.length);
      list.textContent = items.map(function (item) { return item.number; }).join(', ');
    }

    function ensurePostFormAction(form) {
      if (!form) {
        return '';
      }

      if (!form.dataset.bulkOriginalAction) {
        form.dataset.bulkOriginalAction = form.getAttribute('action') || window.location.pathname;
      }

      var actionInput = document.getElementById(deleteActionInput);
      return actionInput ? actionInput.value : (form.dataset.bulkOriginalAction.replace(/\/$/, '') + '/removeSelected');
    }

    function appendHiddenInputs(form) {
      form.querySelectorAll('input[data-bulk="true"]').forEach(function (node) {
        node.remove();
      });

      selectedItems.forEach(function (item) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'ids[]';
        input.value = item.id;
        input.dataset.bulk = 'true';
        form.appendChild(input);
      });
    }

    function submitSelection() {
      var postForm = document.getElementById(postFormId);
      if (!postForm) {
        return;
      }

      appendHiddenInputs(postForm);
      var action = ensurePostFormAction(postForm);
      postForm.setAttribute('action', action);
      postForm.submit();
    }

    document.addEventListener('click', function (event) {
      var toggleBtn = event.target.closest(toggleSelector);
      if (toggleBtn) {
        selectedItems = collectSelected();
        if (selectedItems.length === 0) {
          event.preventDefault();
          event.stopPropagation();
          submitSelection();
          return;
        }
        renderPreview(selectedItems);
      }

      if (event.target && event.target.id === confirmButtonId) {
        event.preventDefault();
        if (selectedItems.length === 0) {
          submitSelection();
          return;
        }

        submitSelection();
      }
    }, true);

    // Ensure default state on load
    document.addEventListener('DOMContentLoaded', function () {
      selectedItems = collectSelected();
      renderPreview(selectedItems);
    });
  })();
</script>
