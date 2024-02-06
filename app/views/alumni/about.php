<?php require APPROOT . '/views/inc/alumni/header.php'; ?>
<div class="container">
  <h1 class="text-primary h4">About</h1>
  <h5 class="display-1">Built For Administrative Purposes</h5>

    <p>App Version: <?php echo $data['version']; ?> <sup class="badge bg-primary fs-6"><small>Beta</small></sup></p>

</div>
<!-- FOOTER-->
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