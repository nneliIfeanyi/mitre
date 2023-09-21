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
        
        <?php if(isset($_SESSION['user_id'])) : ?>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown">More</a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a href="<?php echo URLROOT; ?>/admin/progress" class="dropdown-item">Change password</a></li>
            <li><a href="<?php echo URLROOT; ?>/admin/about" class="dropdown-item">About</a></li>
            <li><a href="<?php echo URLROOT; ?>/admin/logout" class="dropdown-item">Logout</a></li>
          </ul>
        </li>
        <?php else : ?>
          <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/admin/about">About</a>
        </li>
          <?php endif ; ?>
      </ul>
      <ul class="navbar-nav ms-auto">
      <?php if(isset($_SESSION['user_id'])) : ?>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Attendance</a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a href="<?php echo URLROOT; ?>/admin/progress" class="dropdown-item">Mark attendance</a></li>
            <li><a href="<?php echo URLROOT; ?>/admin/progress" class="dropdown-item">View full participants</a></li>
            <li><a href="<?php echo URLROOT; ?>/admin/progress" class="dropdown-item">View partial participants</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Registration</a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a href="<?php echo URLROOT; ?>/admin/registration" class="dropdown-item">Register new</a></li>
            <li><a href="<?php echo URLROOT; ?>/admin/all_registered" class="dropdown-item">View all registered</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Instructors</a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a href="<?php echo URLROOT; ?>/admin/progress" class="dropdown-item">Register new Instructor</a></li>
            <li><a href="<?php echo URLROOT; ?>/admin/progress" class="dropdown-item">View all Instructors</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Archives</a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a href="<?php echo URLROOT; ?>/admin/progress" class="dropdown-item">Selected works</a></li>
            <li><a href="<?php echo URLROOT; ?>/admin/progress" class="dropdown-item">Outlines</a></li>
            <li><a href="<?php echo URLROOT; ?>/admin/progress" class="dropdown-item">Audios</a></li>
            <li><a href="<?php echo URLROOT; ?>/admin/progress" class="dropdown-item">Videos</a></li>
          </ul>
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