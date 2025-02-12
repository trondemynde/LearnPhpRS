<?php view('partials/header'); ?>

<main class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">Posts</h1>
        <a class="btn btn-primary flex items-center justify-center transition duration-300 ease-in-out transform hover:scale-105" href="/admin/posts/create">New Post</a>
    </div>
    <div class="overflow-x-auto">
        <table class="table w-full table-striped border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2">Id</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr class="border-b">
                        <td class="px-4 py-2"><?= $post->id ?></td>
                        <td class="px-4 py-2"><?= $post->title ?></td>
                        <td class="px-4 py-2">
                            <div class="flex space-x-2">
                                <a class="btn btn-info flex items-center justify-center transition duration-300 ease-in-out transform hover:scale-105" href="/posts/show?id=<?= $post->id ?>">View</a>
                                <a class="btn btn-warning flex items-center justify-center transition duration-300 ease-in-out transform hover:scale-105" href="/admin/posts/edit?id=<?= $post->id ?>">Edit</a>
                                <a class="btn btn-danger flex items-center justify-center transition duration-300 ease-in-out transform hover:scale-105" href="/admin/posts/delete?id=<?= $post->id ?>">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</main>

<?php view('partials/footer'); ?>