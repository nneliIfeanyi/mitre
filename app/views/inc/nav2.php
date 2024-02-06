<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark mb-3">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/admin"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URLROOT; ?>/admin">Home</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
      <?php if(isset($_SESSION['user_id'])) : ?>
       <li class="nav-item">
         <a class="nav-link" href="<?php echo URLROOT; ?>/admin/all_registered">Dashboard</a>
       </li>
      
      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/admin/login">Login</a>
        </li>
      <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>