<?php view('partials/header'); ?>

<main class="container">
    <article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1"><?= $post->title ?></h2>
        <p class="blog-post-meta">Post ID: <?= $post->id ?> | December 14, 2020 by <a href="#">Chris</a></p>
        <p><?= $post->body ?></p>
    </article>
    <div class="mt-6">
    <a href="/admin/posts" class="inline-block px-6 py-2 mt-4 text-white bg-blue-500 rounded hover:bg-blue-600">Back to Admin Page</a>
    </div>
</main>

<?php view('partials/footer'); ?>