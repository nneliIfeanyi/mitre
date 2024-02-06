<?php require APPROOT . '/views/inc/alumni/header.php'; ?>

<div class="container-lg mb-5">
  <div class="bg-light">
  <h3 class="text-primary"><?php flash('login'); ?></h3>
  <div class="h3"> <?php flash('success')?></div>
    <div class="px-2 pt-4 pb-2">
      <h1 class="display-3">Ministers Improvement And Training Retreat <span class="text-primary">(MITRE)</span></h1>
      <p class="lead text-primary">Alumni Registration</p>
      <div class="fw-bold mb-2">29th Feb - 2nd March 2024.</div>
      <div class="d-grid"><a href="<?php echo URLROOT ?>/alumni/register" class="btn btn-primary btn-lg rounded-4"><i class="fa fa-pen"></i> Register Now</a></div>
      
    </div>
  </div>
</div>

<div class="bg-dark position-fixed bottom-0  px-2 py-3 w-100">
  <div class="row ">
    <div class="col-md-6 shadow">
        <h2 class="h4 text-light">Inquiries</h2>
        <ul class="list-unstyled text-light footer-link-list">
            <li>
            <i class="fa fa-envelope fa-fw"></i>
            <a style="text-decoration:none;color:antiquewhite;" href="mailto:mitreaffairs@gmail.com">mitreaffairs@gmail.com</a>
            </li>
        </ul>
    </div>

    <div class="col-md-6 pt-3 ">
      <div class="text-center">
        <p class="lead fs-6 text-light">Copyright &copy; <?php echo date('Y');?> <span class="text-white fst-italic fw-semibold">Threshers Team</span>
        <br>
        <span class=""> All Rights Reserved</span></p>
      </div>  
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/alumni/footer.php'; ?>