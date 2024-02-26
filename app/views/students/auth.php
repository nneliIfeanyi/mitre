<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
<div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5 mx-1">
        <p class="lead fs-2">Please fill in your credentials to login.</p>
        <p class="text-muted" style="font-size:12.8px;margin-top: -4px;">Your phone number is your password..</p>
        
        <form action="<?php echo URLROOT; ?>/students/auth" method="post">
           <div class="form-group mb-3">
              <label>Registered name:</label>
              <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
              <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div>   
          <div class="form-group mb-3">
              <label>Password:</label><br>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
              <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="form-row mt-3">
            <div class="col">
              <input type="submit" class="btn btn-primary rounded-3" value="Login">
            </div>
            <div class="col mt-5">
              <a data-bs-toggle="modal" data-bs-target="#contact-admin" class="btn btn-outline-secondary">Having problem logging in? <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<div class="bg-dark  px-2 py-3 mt-3 fixed-bottom">

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

  <!-- Contact Admin Modal -->
<div class="modal fade" id="contact-admin">
  <div class="modal-dialog" role="document">
    <form action="<?php echo URLROOT; ?>/students" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-envelope"></i> Contact Admin</h5>
       <!--  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <div>    
          <div class="form-group mb-3">
              <label>Add some text</label>
              <textarea name="message" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder=""><?php echo $data['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-around py-3">
        <button type="button" class="btn btn-outline-secondary rounded-3 btn-sm" 
          data-bs-dismiss="modal">
          <i class="fa fa-times" aria-hidden="true"></i> 
          Close
        </button>
        <button type="submit" class="btn btn-primary rounded-3 btn-sm">
              <i class="fa fa-paper-plane" aria-hidden="true"></i> 
              Post
        </button>
      </div>
    </div>
  </form>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
