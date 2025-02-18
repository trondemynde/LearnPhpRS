<?php view('partials/header'); ?>

<main class="container">


    <div class="col-md-12">
    <?php view('partials/posts', compact('posts', 'currentPage', 'totalPages')); ?>
    </div>


</main>

<?php view('partials/footer'); ?>