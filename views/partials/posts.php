
<h3 class="pb-4 mb-4 fst-italic border-bottom">
    From the Firehose
</h3>

<?php foreach($posts as $post): ?>
    <article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1">
        <a href="posts/show?id=<?=$post->id?>" class="text-inherit no-underline"><?=$post->title?></a>
        </h2>
        <p class="blog-post-meta">December 14, 2020 by <a href="#">Chris</a></p>
        <p class="break-words whitespace-normal"><?=$post->body?></p>

        <section class="comments">
            <h4>Comments:</h4>
            <div class="commentList">
                <?php $comments = $post->comments(); ?>
                <?php if (count($comments) > 0): ?>
                    <?php foreach($comments as $index => $comment): ?>
                        <div class="comment <?= $index >= 5 ? 'hidden' : '' ?>">
                            <p class="container-sm border border-gray-300 rounded-lg '"><?=$comment->body?></p>
                        </div>
                    <?php endforeach; ?>
                    <?php if (count($comments) > 5): ?>
                        <button class="see-more btn btn-info mt-2">See More</button>
                    <?php endif; ?>
                <?php else: ?>
                    <p>No comments yet.</p>
                <?php endif; ?>
            </div>

            <form class="commentForm flex items-center align-left space-x-2 mt-4">
                <input type="hidden" name="post_id" value="<?php echo $post->id; ?>">
                <textarea name="body" required class="textarea textarea-ghost textarea-bordered textarea-info textarea-sm w-full max-w-xs" placeholder="Comment"></textarea>
                <button type="submit" class="btn btn-info btn-xs sm:btn-sm md:btn-md lg:btn-lg">Submit Comment</button>
            </form>
        </section>
    </article>
<?php endforeach; ?>

<nav class="blog-pagination" aria-label="Pagination">
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