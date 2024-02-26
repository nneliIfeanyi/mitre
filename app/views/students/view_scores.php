<?php require APPROOT . '/views/inc/student/header.php'; ?>
<?php require APPROOT . '/views/inc/student/top.php'; ?>
<?php require APPROOT . '/views/inc/student/sidebar.php'; ?>
<?php error_reporting(0);?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Showing Addes Scores For <span class="text-primary"><?php echo $_SESSION['student_name']?> </span> Conclave <?php echo $data['conclave']?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= URLROOT;?>/admin">Home</a></li>
            <li class="breadcrumb-item active">Culmulative</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
  
    <div class="card">
      <div class="card-body">
        <table class="table table-striped table-bordered" id="score-table">
          <!-- <div class="row"><div class="col-lg-6"><?php flash('msg');?></div></div> -->
          <thead>
            <tr class="text-primary">
              <th><b>Paper</b></th>
              <th><b>Score</b></th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $sum = 0;
          if ($data['scores']) {
            foreach ($data['scores'] as $added):?>
          <tr>
            <td class="font-weight-bold">
              <?= $added->paper ?>
            </td>
            <td>
              <?= $added->score ?>
            </td>
          </tr>
          <?php $sum += $added->score; endforeach; ?>
          <tr>
            <td class="font-weight-bold">Attendance</td>
            <td><?= $data['attendance'];?></td>
          </tr>
          <tr>
            <td class="font-weight-bold text-primary">Total</td>
            <td class="font-weight-bold"><?php 
                  echo $sum + $data['attendance'];
                ?> 
            </td>
          </tr>
          <?php
          }else{
          ?>
            <tr>
              <td>No Scores Added yet</td>
              <td></td>
            </tr>
          <?php
          }

          ?>
          </tbody>
        </table>
      </div>
    </div>     
  </div><!-- /.container-fluid -->
</section>
</div>
  <!-- /.content -->
</div>
    <!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/student/footer.php'; ?>

<script type="text/javascript">
   new DataTable('#score-table', {
    ordering: false,
    searching: false,
    info: false,
    paging: false,
  });
</script>
    