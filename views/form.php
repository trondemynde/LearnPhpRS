<?php view('partials/header'); ?>

<main class="container">
  <?php if($fname): ?>
    <h1>Hello <?=$fname?></h1>
  <?php endif ?>
  <form method="POST" action="/answer">
    <div class="mb-3">
      <label for="fname" class="form-label">First Name</label>
      <input type="text" class="form-control" id="fname" name="firstname">
    </div>
    <div class="mb-3">
      <input type="submit" class="btn btn-primary" value="Send that shiit">
    </div>
  </form>
</main>

<?php view('partials/footer'); ?>