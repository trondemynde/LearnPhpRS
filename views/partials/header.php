<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="/assets/js/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>Blog Template · Bootstrap v5.3</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">

  <link href="/output.css" rel="stylesheet">
  <link href="/blog.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="/assets/js/pagination.js" defer></script>
  <script src="/assets/js/comments.js" defer></script>

  <style>
    .hidden {
        display: none;
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="blog.css" rel="stylesheet">
</head>


  <div class="container col-md-12 bg-gray-800 rounded-lg shadow-lg">
    <header class="py-3 flex justify-between items-center border-b border-gray-300">
      <div class="text-center">
        <a class="text-2xl font-bold no-underline" href="#">Blog</a>
      </div>
      <div class="flex items-center">
        <?php if (auth()): ?>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?=auth()->email?>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/profile">Profile</a></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
          </div>
        <?php else: ?>
          <a class="btn btn-sm btn-outline-secondary" href="/register">Sign up</a>
          <a class="btn btn-sm btn-primary ms-2" href="/login">Login</a>
        <?php endif ?>
      </div>
    </header>

    <div class="nav-scroller py-3 mb-3">
      <nav class="nav nav-underline flex space-x-4">
        <a class="nav-item nav-link link-body-emphasis" href="/">World</a>
        <a class="nav-item nav-link link-body-emphasis" href="/admin/posts">Admin</a>
      </nav>
    </div>
  </div>

  <?php if (isset($_SESSION['alert'])): ?>
    <div id="alert" class="bg-purple-700 text-white text-center py-2 animate-fadeOut">
        <?= $_SESSION['alert'] ?>
    </div>
    <?php unset($_SESSION['alert']); ?>
    <script>
        setTimeout(function() {
            document.getElementById('alert').style.display = 'none';
        }, 2000);
    </script>
  <?php endif; ?>
</body>
</html>