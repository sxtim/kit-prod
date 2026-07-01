export default function initSort() {
    document.querySelectorAll('[data-sort]').forEach(item => {
        item.addEventListener('click', () => {
            window.location.href = `${window.location.pathname}?order=${item.getAttribute('data-sort')}`;
        });
    });
}
