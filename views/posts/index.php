<?php view('partials/header'); ?>

<main class="container">
    <a class="btn btn-primary" href="/admin/posts/create">New Post</a>
    <table class="table table-striped table-hoverable">
        <thead>
            <th>Id</th>
            <th>Title</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= $post->id ?></td>
                    <td><?= $post->title ?></td>
                    <td>
                        <div class="btn-group" role="group">
                        <a class="btn btn-info" href="/posts/show?id=<?= $post->id ?>">View</a>
                            <a class="btn btn-warning" href="/admin/posts/edit?id=<?=$post->id?>">Edit</a>
                            <a class="btn btn-danger" href="/admin/posts/delete?id=<?=$post->id?>">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</main>

<?php view('partials/footer'); ?>