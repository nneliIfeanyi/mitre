<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/top.php'; ?>
<?php require APPROOT . '/views/inc/admin/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Reg-No Administration</h1>
            <p class="lead text-primary py-2">Registration number is auto generated.</p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
              <li class="breadcrumb-item active">Reg-no</li>
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
          <div class="row"><div class="col-lg-6"><p><?php flash('msg') ?></p></div></div>
              <table class="table table-striped" id="eg">
                <thead>
                   <tr class="">
                     <th>#</th>
                     <th><b>Name</b></th>
                     <th><b>Set</b></th>
                     <th><b>Zone</b></th>
                     <th><b>Reg-no</b></th>
                     
                     <th><b>Status</b></th>
                     
                   </tr>
                </thead>

                 <tbody>
                 <?php $numbering = 1; foreach($data['students'] as $student) : ?>
                  <tr>
                      <td><?php echo $numbering;?></td>
                      <td><?php echo $student->fullname?></td>
                      <td><?php echo $student->mitre_set?></td>
                      <td><?php echo $student->zone?></td>
                      <td>
                        <?php echo $student->admsn_no?>
                      </td>
                      <td>
                         <?php if(empty($student->admsn_no)):?>
                          <form method="post" action="">
                            <input type="hidden" name="std_id" value="<?= $student->id?>">
                            <input type="hidden" name="zone" value="<?= $student->zone?>">
                            <input type="submit" name="submit" value="Generate" class="btn btn-sm btn-success">
                          </form>
                         <?php else:?>
                          <p>in use</p>
                         <?php endif;?>
                      </td>

                  </tr>
                  <?php $numbering++; endforeach; ?>
                 </tbody>
                  <tfoot>
                   <tr class="">
                     <th>#</th>
                     <th><b>Name</b></th>
                     <th><b>Set</b></th>
                     <th><b>Zone</b></th>
                     <th><b>Reg-no</b></th>
                     
                     <th><b>Status</b></th>
                     
                   </tr>
                </tfoot>
               </table>
       </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
    <!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
<script type="text/javascript">
  new DataTable('#eg', {
    //scrollX: true,
    //scrollY: '60vh',
    //scrollCollapse: true,
    ordering: false,
    searching: true,
    info: false,
    paging:false,
  });
</script>


    
  