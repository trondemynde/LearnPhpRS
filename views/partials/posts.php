<h3 class="pb-4 mb-4 fst-italic border-bottom">
    From the Firehose
</h3>

<?php foreach($posts as $post): ?>
    <article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1"><?=$post->title?></h2>
        <p class="blog-post-meta">December 14, 2020 by <a href="#">Chris</a></p>
        <p class="break-words whitespace-normal"><?=$post->body?></p>
    </article>
<?php endforeach; ?>

<nav class="blog-pagination" aria-label="Pagination">
<?php include __DIR__ . '/pagination.php'; ?>
</nav>