<?php require APPROOT . '/views/inc/header2.php'; ?>
<div class="container-lg">
  <div class="bg-light">
  <h3 class="text-primary"><?php flash('login'); ?></h3>
  <div class="h3"> <?php flash('success')?></div>
    <div class="px-2 py-5">
      <h1 class="display-3">Ministers Improvement And Training Retreat <span class="text-primary">(MITRE)</span></h1>
      <p class="lead text-primary">Administrative Portal</p>
      <?php if(!isset($_SESSION['user_id'])) : ?>
      <div class="d-grid"><a href="<?php echo URLROOT; ?>/admin/login" class="btn btn-primary rounded-5">Login</a></div>
      <?php endif; ?>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>