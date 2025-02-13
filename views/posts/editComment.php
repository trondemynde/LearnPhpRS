<?php view('partials/header'); ?>

<main class="container">
    <h1>Edit Comment</h1>

<form action="/comments/update?id=<?= $comment->id ?>" method="POST">
    <div class="mb-3">
        <label for="body" class="form-label">Content</label>
        <textarea name="body" class="form-control" id="body" rows="3"><?= htmlspecialchars($comment->body) ?></textarea>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Edit Comment">
    </div>
</form>

</main>

<?php view('partials/footer'); ?>