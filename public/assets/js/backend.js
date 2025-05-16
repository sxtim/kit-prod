document.addEventListener('DOMContentLoaded', () => {
    window.fetchEvents.sort();
});

window.fetchEvents = {
    'sort': () => {
        const items = document.querySelectorAll('[data-sort]');

        items.forEach(item => {
            item.addEventListener('click', () => {
                window.location.href = window.location.pathname + '?order=' + item.getAttribute('data-sort');
            });
        });
    },
}
