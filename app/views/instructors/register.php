<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="content">
<div class="container-fluid">
<?php if(!isset($_COOKIE['instructor-name'])):?>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row text-center text-primary mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Mitre Instructors Online Registration Form</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="row">
    <div class="col-lg-9 mx-auto">
      <div class="row"><div class="h3 col-lg-6"><?php flash('msg')?></div></div>
      <form action="<?php echo URLROOT;?>/portal/instructors" method="post" id="register_form">

        <div class="row border p-2">
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Fullname <span class="font-weight-light" style="font-size:12px">(surname first)</span></label>
              <input type="text" required data-parsley-pattern="^[a-zA-Z' ]+$" data-parsley-trigger="keyup" name="fullname" class="form-control form-control-lg" value="<?php echo $data['fullname']; ?>">
            </div>
          </div>
          
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Gender:</label>
              <select name="gender" data-parsley-trigger="change" class="form-control">
                <option value="">----</option>
                <option value="male">Male</option>
                <option value="female">Female</option> 
              </select>
            </div>
          </div>
         
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Zone:</label>
              <select name="zone"required data-parsley-trigger="change" class="form-control">
                <option value="">----</option>
                <option value="Ufuma">Ufuma</option>
                <option value="Minna">Minna</option>
                <option value="Kaduna">Kaduna</option>
              </select>
            </div>
          </div>
         
          
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Mobile Phone:</label>
              <input type="number" name="phone" required data-parsley-length="[10, 11]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['phone']; ?>">
              <span class="error"><?= $data['error'] ?></span>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Whatsapp Phone:</label>
              <input type="number" name="whatsapp" data-parsley-length="[10, 11]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['whatsapp']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Telegram:</label>
              <input type="number" name="telegram" data-parsley-length="[0, 11]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['telegram']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Email:</label>
              <input type="email" name="email" data-parsley-type="email" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['email']; ?>">
            </div>
          </div>
           <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Detailed Address</label>
              <input type="text" name="address" required class="form-control form-control-lg" value="<?php echo $data['address']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Area of Ministry:</label>
              <input type="text" name="ministry" class="form-control form-control-lg" value="<?php echo $data['ministry']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Occupation:</label>
              <input type="text" name="occupation" class="form-control form-control-lg" value="<?php echo $data['occupation']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Local Assembly:</label>
              <input type="text" name="assembly" class="form-control form-control-lg" value="<?php echo $data['assembly']; ?>">
            </div>
          </div>

          <div class=" d-grid col-md-6 offset-md-3 my-3">
            <!-- <button type="submit" id="submit" class="btn btn-primary rounded-5 fw-bold"><i class="fa fa-paper-plane fa-2x" aria-hidden="true"></i> Submit</button> -->
            <input type="submit" id="submit" class="btn btn-primary btn-block rounded-5 fw-bold" value="Register">
          </div>
        </div>
      </form>
    </div>
</div>
<div class="row bg-dark">

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
<?php else:?>
  <div class="row">
  <div class="col-md-6 mx-auto">
    <h2><?php echo flash('msg'); ?></h2>
    <div class="card card-body bg-light mt-1 mb-5">
      <h1 class="text-primary">Add profile photo</h1>
      <p class="p-2 text-center" style="width: 50%;"><i class="fa fa-user fa-5x"></i></p>
      <form action="<?php echo URLROOT; ?>/portal/profile_pic" method="post" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <input type="file" accept="image*/" name="photo"  class="form-control form-control-lg">
        </div>    
        
      <div class="row mt-5">
        <div class="col-6">
          <input type="submit" name="upload" class="btn btn-primary rounded-3" value="Upload">
        </div>
     
      </form>

      <div class="col-6">
        <form action="<?php echo URLROOT; ?>/portal/profile_pic" method="post">
          <input type="submit" name="later" class="btn btn-outline-dark btn rounded-3" value="Maybe Later">
        </form>
      </div>
    </div>
    </div>
  </div>


  </div>
<?php endif;?>

</div><!-- /.container-fluid -->
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
    $('#register_form').parsley();
</script>