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
          <h1 class="m-0">Showing Added Scores For <span class="text-primary"><?php echo $_COOKIE['student-name']?> </span> Conclave <?php echo $data['conclave']?></h1>
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
        
        <table class="table table-striped table-bordered" id="eg">
          <!-- <div class="row"><div class="col-lg-6"><?php flash('msg');?></div></div> -->
          <thead>
            <tr class="text-primary">
              <th>Paper</th>
              <th class="text-left">Score</th>
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
            <td class="text-left">
              <?php 
                if (strlen($added->score) == 1) {
                  $added->score = '0'.$added->score;
                }
              ?>
              <?= $added->score ?>
            </td>
          </tr>
          <?php $sum += $added->score; endforeach; ?>
          <tr>
            <td class="font-weight-bold">Attendance</td>
            <td class="text-left"><?= $data['attendance'];?></td>
          </tr>
          <tr>
            <td class="font-weight-bold text-primary">Total</td>
            <td class="font-weight-bold text-left"><?php 
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

<script>
  new DataTable('#eg', {
    paging:false,
    searching: false,

    layout: {
        topStart: {
            buttons: [
                
                {
                    extend: 'pdfHtml5',
                    messageTop:'Showing Added Scores For <?php echo $_COOKIE['student-name']?> Conclave <?php echo $data['conclave']?>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'print',
                    messageTop:'Showing Added Scores For <?php echo $_COOKIE['student-name']?> Conclave <?php echo $data['conclave']?>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                
            ]
        }
    }
});
</script>
    