<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/top.php'; ?>
<?php require APPROOT . '/views/inc/admin/sidebar.php'; ?>
 <div class="content-wrapper">
  <section class="content">
      <div class="container-fluid">
      <h3 class="text-primary"><?php flash('login'); ?></h3>
      <div class="h3"> <?php flash('success')?></div>
      <div class="px-2 py-5">
        <h1 class="display-2">Ministers Improvement And Training Retreat <span class="text-primary">(MITRE)</span></h1>
        <p class="lead font-weight-bold text-primary">Administrative Portal</p>
        <p class="m-0 lead text-primary">Current Conclave Set 16 : <span style='color: green; font-weight: bold; font-size: 18px; text-transform: uppercase;'>
              <?php echo S_CONCLAVE?>
            </span>
              &nbsp; | &nbsp; Current Conclave Set 17 : <span style='color: green; font-weight: bold; font-size: 18px; text-transform: uppercase;'><?php echo J_CONCLAVE; ?></span>
        </p>
        
        <p class="lead"><span style='color: green; font-weight: bold;'> Today : </span><?php echo date('d').' '.date('M').','.' '.date('Y').' '.'|'.' '. DAY ?>.</p>
        <?php if(!isset($_SESSION['admin_id'])) : ?>
        <div class="d-grid"><a href="<?php echo URLROOT; ?>/portal/login" class="btn btn-primary btn-lg">Login To Continue <i class="fas fa-sign-in"></i></a></div>
        <?php else:?>
          <div class="d-grid"><a href="<?php echo URLROOT; ?>/admin/dashboard" class="btn btn-primary btn-lg">Go to dashboard &nbsp;<i class="fas fa-forward"></i></a></div>
        <?php endif; ?>
      </div>
    </div>
  </section>        
</div>
<!-- <div style="margin-bottom: 100px;"></div> -->
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>