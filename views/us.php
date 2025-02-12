<?php view('partials/header'); ?>

<main class="container">
  <?php view('partials/hero'); ?>
  <?php view('partials/featured'); ?>
  

  <div class="row g-5">
    <div class="col-md-8">
    <?php view('partials/posts', compact('posts', 'currentPage', 'totalPages')); ?>

    </div>

    <div class="col-md-4">
      <?php view('partials/side'); ?>
    </div>
  </div>

</main>

<?php view('partials/footer') ?>