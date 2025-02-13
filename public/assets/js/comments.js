document.addEventListener('DOMContentLoaded', function () {
    function attachSeeMoreEvents() {
        document.querySelectorAll('.see-more').forEach(button => {
            // Clone button to remove existing event listeners
            const newButton = button.cloneNode(true);
            button.parentNode.replaceChild(newButton, button);

            newButton.addEventListener('click', function () {
                const commentList = this.closest('.commentList');
                const hiddenComments = commentList.querySelectorAll('.comment.hidden');

                hiddenComments.forEach((comment, index) => {
                    if (index < 5) {
                        comment.classList.remove('hidden');
                    }
                });

                if (commentList.querySelectorAll('.comment.hidden').length === 0) {
                    this.remove();
                }
            });
        });
    }

    function attachCommentFormEvents() {
        document.querySelectorAll('.commentForm').forEach(form => {
            // Clone form to remove existing event listeners
            const newForm = form.cloneNode(true);
            form.parentNode.replaceChild(newForm, form);

            newForm.addEventListener('submit', function(event) {
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
            // Clone link to remove existing event listeners
            const newLink = link.cloneNode(true);
            link.parentNode.replaceChild(newLink, link);

            newLink.addEventListener('click', function (event) {
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
                
                // Rebind all event listeners after replacing content
                attachPaginationEvents();
                attachCommentFormEvents();
                attachSeeMoreEvents();
            })
            .catch(error => console.error('Error fetching page:', error));
    }

    // Initial bindings when the page loads
    attachPaginationEvents();
    attachCommentFormEvents();
    attachSeeMoreEvents();
});
