<?php require APPROOT . '/views/inc/header2.php'; ?>
<div class="container-lg">
<div class="row">
<div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
    
        <h2 class="text-primary">Admin Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo URLROOT; ?>/admin/login" method="post">
          <div class="form-group mb-3">
              <label>Username:<sup>*</sup></label>
              <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
              <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>    
          <div class="form-group">
              <label>Password:<sup>*</sup></label>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
              <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="form-row mt-3">
            <div class="col">
              <input type="submit" class="btn btn-primary rounded-5" value="Login">
            </div>
            <!--div class="col">
              <a href="<?php echo URLROOT; ?>/students/register" class="btn btn-light">No account? Register</a>
            </div>-->
          </div>
        </form>
      </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
