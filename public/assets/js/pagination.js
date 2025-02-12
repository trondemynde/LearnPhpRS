document.addEventListener('DOMContentLoaded', function () {
    const paginationLinks = document.querySelectorAll('.pagination-link');

    paginationLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const page = this.getAttribute('data-page');
            fetchPage(page);
        });
    });

    function fetchPage(page) {
        const url = new URL(window.location.href);
        url.searchParams.set('page', page);

        fetch(url)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.querySelector('main').innerHTML;
                document.querySelector('main').innerHTML = newContent;
                window.history.pushState({}, '', url);
                attachPaginationEvents();
            })
            .catch(error => console.error('Error fetching page:', error));
    }

    function attachPaginationEvents() {
        const newPaginationLinks = document.querySelectorAll('.pagination-link');
        newPaginationLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const page = this.getAttribute('data-page');
                fetchPage(page);
            });
        });
    }
});