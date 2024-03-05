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
          <h1 class="m-0">Recorded Attendance for <span class="text-muted"><span class="text-primary">(</span><?php echo $data['zone']?> Set <span class="badge bg-primary"><?php echo $data['set']?></span><span class="text-primary">)</span> Conclave <?php echo $data['conclave']?></span></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
            <li class="breadcrumb-item active">Attendance Sorting</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
  <a href="<?php echo URLROOT;?>/admin/sorting" class="mb-2 btn btn-primary"><i class="fas fa-backward"></i> Go Back</a>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-striped table-bordered" id="eg">
          <div class="row"><div class="col-lg-6"><?php flash('msg');?></div></div>
          <thead>
            <tr class="text-primary">
              <th>#</th>
              <th>Name</th>
              <th><?php echo $data['day']?></th>
            </tr>
          </thead>

          <tbody>
          <?php $numbering = 1; foreach($data['scores'] as $student) : ?>
          <tr>
            <td><?php echo $numbering;?></td>
            <td class="font-weight-bold"><?php echo $student->name?></td>
            <td class="font-weight-bold text-success">Present</td>
          </tr>
          <?php $numbering++; endforeach; ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>     
  </div><!-- /.container-fluid -->
</section>
</div>
  <!-- /.content -->
</div>
    <!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>

<script>
  new DataTable('#eg', {
    caption:"Recorded Attendance for <?php echo $data['zone']?> Set <?php echo $data['set']?> Conclave <?php echo $data['conclave']?>",
    paging:false,
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel',
              { extend:'pdf',
                messageTop:'Recorded Attendance for <?php echo $data['zone']?> zone Set <?php echo $data['set']?> Conclave <?php echo $data['conclave']?>',
                messageBottom:null
              },
              { extend:'print',
                messageTop:'Recorded Attendance for <?php echo $data['zone']?> zone Set <?php echo $data['set']?> Conclave <?php echo $data['conclave']?>',
                messageBottom:null
              }]
        }
    }
});
</script>
    