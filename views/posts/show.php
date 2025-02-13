<?php view('partials/header'); ?>

<main class="container">
    <article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1"><?= $post->title ?></h2>
        <p class="blog-post-meta">Post ID: <?= $post->id ?> | December 14, 2020 by <a href="#">Chris</a></p>
        <p><?= $post->body ?></p>
    </article>
    <div class="mt-6">
    <a href="/" class="btn btn-secondary btn-wide rounded hover:bg-blue-600">Back</a>
    </div>
</main>

<section class="comments container mx-auto mt-8">
            <h4>Comments:</h4>
            <div class="commentList">
                <?php $comments = $post->comments(); ?>
                <?php if (count($comments) > 0): ?>
                    <?php foreach($comments as $comment): ?>
                        <div class="comment container mx-auto mt-4 p-4  border border-gray-300 rounded-lg">
                            <p><?=$comment->body?></p>
                            <a href="/comments/edit?id=<?= $comment->id ?>" class="btn btn-primary btn-sm">Edit Comment</a>
                            <a href="/posts/show/delete?id=<?= $comment->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</a>
                        </div>
                    <?php endforeach; ?>
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

<?php view('partials/footer'); ?>