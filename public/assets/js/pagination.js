document.addEventListener('DOMContentLoaded', function () {
    function attachCommentFormEvents() {
        document.querySelectorAll('.commentForm').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(this);
                fetch('/storeComment', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        const commentList = this.closest('section.comments').querySelector('.commentList');
                        if (commentList) {
                            const newComment = document.createElement('div');
                            newComment.classList.add('comment');
                            newComment.innerHTML = `<p>${data.comment.body}</p>`;
                            commentList.appendChild(newComment);
                            this.reset();
                        }
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    }

    function attachPaginationEvents() {
        document.querySelectorAll('.pagination-link').forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const page = this.getAttribute('data-page');
                fetchPage(page);
            });
        });
    }

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
                attachCommentFormEvents();
            })
            .catch(error => console.error('Error fetching page:', error));
    }

    attachPaginationEvents();
    attachCommentFormEvents();
});
