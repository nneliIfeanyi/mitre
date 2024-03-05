<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row" style="height: 87vh;">
<div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5 mx-1">
  <!-- <h2 class="display-3">Not available</h2> -->
    
        <!-- <h2 class="fw-bold">Student Login</h2> -->
        <p class="lead fs-2">Please fill in your credentials to login.</p>
        <p class="text-muted" style="font-size:15.8px;margin-top: -4px;">Your phone number is your password..</p>
        <form action="<?php echo URLROOT; ?>/students/login" method="post">
         <!--  <div class="form-group mb-3">
              <label>Email:</label>
              <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
              <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>  -->   
          <div class="form-group mb-3">
              <label>Password:</label><br>
              <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
              <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="form-row mt-3">
            <div class="col">
              <input type="submit" class="btn btn-primary rounded-3" value="Login">
            </div>
            <!-- <div class="col mt-5">
              <a href="<?= URLROOT?>/students/auth" class="btn btn-outline-secondary">Forgot Email? <i class="fa fa-arrow-right"></i></a>
            </div> -->
          </div>
        </form>
      </div>
    </div>
  </div>
<div class="bg-dark  px-2 py-3 mt-3">

<div class="row">

<div class="col-md-6 shadow">
    <h2 class="h4 text-light">Inquiries</h2>
    <ul class="list-unstyled text-light footer-link-list">
        <li>
        <i class="fa fa-envelope fa-fw"></i>
        <a style="text-decoration:none;color:antiquewhite;" href="mailto:mitreaffairs@gmail.com">mitreaffairs@gmail.com</a>
        </li>
    </ul>
</div>

<div class="col-md-6 pt-3">
  <div class="text-center">
  <p class="lead fs-6 text-light">Copyright &copy; <?php echo date('Y');?> <span class="text-white fst-italic fw-semibold">Threshers Team</span>
    <br>
    <span class=""> All Rights Reserved</span></p>
  </div>
  
  </div>
  </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
