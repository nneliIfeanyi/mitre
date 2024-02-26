<?php require APPROOT . '/views/inc/student/header.php'; ?>
<?php require APPROOT . '/views/inc/student/top.php'; ?>
<?php require APPROOT . '/views/inc/student/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Scores</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
              <li class="breadcrumb-item active">Culmulative Scores</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">
<?php //EVERYTHING GOES HERE, Start coding from here.?>

<div class="card card-body">
      <form action="" method="POST" id="mark-add">
          <!-- <div class="row">
            <div class="col-lg-6">
            <?= flash('msg')?>
            </div>
          </div> -->
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group shadow p-1">
              <label>Set:</label>
              <select name="set" id="set" required class="form-control">
                <option value="<?= $data['details']->mitre_set ?>"><?= $data['details']->mitre_set ?></option>
              </select>
            </div>
          </div>
           <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-1">
              <label>Conclave:</label>
              <select name="conclave" class="form-control">
                <option value="">----</option>
                 <?php foreach ($data['conclaves'] as $conclave):?>
                  <option value="<?php echo $conclave->conclave;?>"><?php echo $conclave->conclave;?></option>
                 <?php endforeach;?>
            </select>
            </div>
          </div>
    
          <div class=" d-grid col-md-4 offset-md-4 my-2">
            <input type="submit" class="btn btn-primary btn-block rounded-5 fw-bold" value="Submit">
          </div>
        </div>
      </form>
  </div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/student/footer.php'; ?>