<?php view('partials/header'); ?>

<main class="container mx-auto p-4 min-h-screen">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">Posts</h1>
        <a class="btn btn-primary btn-sm flex items-center justify-center transition duration-300 ease-in-out transform hover:scale-105" href="/admin/posts/create">New Post</a>
    </div>
    <div class="overflow-x-auto">
        <table class="table w-full table-striped border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 w-1/12">Id</th>
                    <th class="px-4 py-2 w-5/12">Title</th>
                    <th class="px-4 py-2 w-4/12">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr class="border-b">
                        <td class="px-4 py-2"><?= $post->id ?></td>
                        <td class="px-4 py-2"><?= $post->title ?></td>
                        <td class="px-4 py-2">
                            <div class="flex space-x-2">
                                <a class="btn btn-info flex btn-sm items-center justify-center transition duration-300 ease-in-out transform hover:scale-105" href="/posts/show?id=<?= $post->id ?>">View</a>
                                <a class="btn btn-warning btn-sm flex items-center justify-center transition duration-300 ease-in-out transform hover:scale-105" href="/admin/posts/edit?id=<?= $post->id ?>">Edit</a>
                                <a class="btn btn-danger btn-sm flex items-center justify-center transition duration-300 ease-in-out transform hover:scale-105" href="/admin/posts/delete?id=<?= $post->id ?>">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="mt-4">
    <?php include __DIR__ . '/../partials/pagination.php'; ?>
    </div>

</main>

<?php view('partials/footer'); ?>