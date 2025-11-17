<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        background-color: #f8f9fa;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .error-container {
        text-align: center;
      }
      .error-code {
        font-size: 8rem;
        font-weight: 700;
        color: #0d6efd;
      }
      .error-message {
        font-size: 1.5rem;
        color: #6c757d;
      }
    </style>
  </head>
  <body>
    <?php flash('msg'); ?>
    <div class="container">
      <div class="error-container">
        <h1 class="error-code">404</h1>
        <p class="error-message">Oops! The page you’re looking for can’t be found.</p>
        <p class="fw-bold fst-italic"><?php echo $data['msg']; ?></p>
        <a href="<?php echo URLROOT; ?>/application" class="btn btn-primary mt-3">
          <i class="bi bi-arrow-left"></i> Go Home
        </a>
      </div>
    </div>

    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  </body>
</html>
