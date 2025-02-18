

<?php foreach($posts as $post): ?>
    <article class="blog-post p-4 mb-6 bg-gray-800 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-2">
            <a href="posts/show?id=<?=$post->id?>" class="text-inherit no-underline"><?=$post->title?></a>
        </h2>
        <p class="text-gray-500 mb-4">December 14, 2020 by <a href="#" class="text-blue-500 hover:underline">Chris</a></p>
        <p class="mb-4 break-words overflow-hidden"><?=$post->body?></p>

        <section class="comments">
            <h4 class="text-lg font-semibold mb-2">Comments:</h4>
            <div class="commentList space-y-4">
                <?php $comments = $post->comments(); ?>
                <?php if (count($comments) > 0): ?>
                    <?php foreach($comments as $index => $comment): ?>
                        <div class="comment <?= $index >= 5 ? 'hidden' : '' ?>">
                            <p class="p-4 border border-gray-300 rounded-lg"><?=$comment->body?></p>
                        </div>
                    <?php endforeach; ?>
                    <?php if (count($comments) > 5): ?>
                        <button class="see-more btn btn-info mt-2">See More</button>
                    <?php endif; ?>
                <?php else: ?>
                    <p>No comments yet.</p>
                <?php endif; ?>
            </div>

            <form id="commentForm-<?=$post->id?>" class="commentForm flex items-center mt-4">
                <input type="hidden" name="post_id" value="<?php echo $post->id; ?>">
                <textarea name="body" required class="textarea textarea-bordered w-full max-w-xs" placeholder="Comment"></textarea>
                <button type="submit" class="btn btn-info">Submit Comment</button>
            </form>
        </section>
    </article>
<?php endforeach; ?>

<nav class="blog-pagination mt-6" aria-label="Pagination">
    <?php include __DIR__ . '/pagination.php'; ?>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.see-more').forEach(button => {
        button.addEventListener('click', function () {
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
});
</script>

<style>
    .hidden {
        display: none;
    }
</style>