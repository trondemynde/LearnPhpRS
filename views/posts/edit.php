<?php view('partials/header'); ?>

<main class="container min-h-screen">
    <form action="/admin/posts/edit?id=<?=$post->id?>" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="title" value="<?=$post->title?>">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Content</label>
            <textarea name="body" class="form-control" id="body" rows="3"><?=$post->body?></textarea>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Edit Post">
        </div>
    </form>
</main>

<?php view('partials/footer'); ?>