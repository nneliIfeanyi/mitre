<?php require APPROOT . '/views/inc/header.php'; ?>
  <h1 class="text-primary h4">About</h1>
  <h5 class="display-3">Built For Administrative Purposes</h5>
  <p>App Version: <?php echo $data['version']; ?> <sup class="badge bg-primary fs-6"><small>Beta</small></sup></p>
  <p class="lead fs-6">Copyright &copy; <?php echo date('Y');?> <span class="fst-italic fw-semibold">Threshers Team</span>
    <br>
    <span class=""> All Rights Reserved</span></p>
<?php require APPROOT . '/views/inc/footer.php'; ?>