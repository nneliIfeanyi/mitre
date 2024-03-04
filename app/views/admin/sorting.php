<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/top.php'; ?>
<?php require APPROOT . '/views/inc/admin/sidebar.php'; ?>
<?php error_reporting(0);?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Attendance Sorting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
            <li class="breadcrumb-item active">Sorting</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-body">
        <form action="" method="POST" id="mark-add">
          <div class="row">
          <div class="col-lg-3">
            <div class="form-group shadow p-1">
              <label>Set:</label>
              <select name="set" required class="form-control">
                <option value="">Select set</option>
                <option value="<?= SENIOR?>"><?= SENIOR?></option>
                <option value="<?= JUNIOR?>"><?= JUNIOR?></option> 
              </select>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group shadow p-1">
              <label>Conclave:</label>
              <select name="conclave" required class="form-control">
                <option value="">---</option>
                <?php foreach ($data['conclaves'] as $conclave):?>
                  <option value="<?php echo $conclave->conclave;?>"><?php echo $conclave->conclave;?></option>
                 <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group shadow p-1">
              <label>Zone:</label>
              <select name="zone" required class="form-control">
                <option value="">Select zone</option>
                <option value="Ufuma">East</option>
                <option value="Minna">Niger</option>
                <option value="Kaduna">Kaduna</option>
              </select>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group shadow p-1">
              <label>Day:</label>
              <select name="day" required class="form-control">
                <option value="">Select Day</option>
                <option value="Monday">First Full Day</option>
                <option value="Tuesday">Second Full Day</option>
                <option value="Wednesday">Third Full Day</option>
              </select>
            </div>
          </div>
          <div class=" d-grid col-md-4 offset-md-4 my-3">
            <input type="submit" id="mark" class="btn btn-primary btn-block rounded-5 fw-bold" value="Submit">
          </div>
        </div>
      </form>
  </div>
     
  </div><!-- /.container-fluid -->
</section>
</div>
  <!-- /.content -->
</div>
    <!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
<script>
$(function(){
    $('#mark-add').parsley();


})
</script>