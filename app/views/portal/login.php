<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<div class="container-lg">
<div class="row">
<div class="col-md-8 mx-auto mt-3">
  <div class="card card-body bg-light my-5">
    <p class="text-center" data-toggle="tooltip" data-title="Restricted Access, only admin can login"><i class="fa fa-lock fa-5x"></i></p><hr>
    <h1 class="text-primary">Admin Login</h1>
    <p>Please fill in your credentials to login.</p>
    <form action="<?php echo URLROOT; ?>/portal/login" method="post">
      <div class="form-group mb-3">
          <input type="text" name="user_name" placeholder="User name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['user_name']; ?>">
          <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
      </div>    
      <div class="form-group">
          <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>" placeholder="Password">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
      </div>
      <div class="row mt-3">
        <div class="col">
          <input type="submit" class="btn btn-primary btn-lg rounded-5" value="Login">
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<div class="mt-5">
  <p style="visibility: hidden;">Enough gap</p>
</div>
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
