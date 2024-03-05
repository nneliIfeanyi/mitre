
<!-- Content Wrapper. Contains page content -->
<?php if($data['set'] == JUNIOR):
$conclave = J_CONCLAVE;
$set = JUNIOR;
$paper = 'short_paper';
?>
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
            <h1 class="m-0 h3">Add <?= $paper?> Scores For Set <?= $set?> Ufuma Zone</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
              <li class="breadcrumb-item active">Add Scores</li>
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
  <div class="col-lg-6">
    <?= flash('msg')?>
  </div>
      <table class="table table-striped" id="eg">
          <thead>
             <tr class="">
               <th>#</th>
               <th><b>Name</b></th>
               <th><b><?= $paper?></b></th>
               <th><b>Action</b></th>
             </tr>
          </thead>

           <tbody>
           <?php $numbering = 1; 
           foreach($data['students'] as $student) : 
            $added = $this->attendanceModel->check_mark($set,$conclave,$paper,$student->id);
            ?>
           
            <tr>
                <td><?php echo $numbering;?></td>
                <td><?php echo $student->fullname?></td>
                 <?php if($added):?>
                  <td><?= $added->score?></td>
                  <td><a href="<?php echo URLROOT?>/papers/edit/<?php echo $added->id;?>" class="btn btn-sm btn-success"> Edit</a></td>
                 <?php else:?>
                   <form method="post" action="<?= URLROOT;?>/portal/add_mark" id="register_form">
                    <td><input type="" class="" required placeholder="Enter score"  name="score"></td>
                    <td>
                        <input type="hidden" name="std_id" value="<?= $student->id; ?>">
                        <input type="hidden" name="zone" value="<?= $student->zone; ?>">
                        <input type="hidden" name="fullname" value="<?= $student->fullname; ?>">
                        <input type="hidden" name="mitre_set" value="<?= $student->mitre_set; ?>">
                        <input type="hidden" name="conclave" value="<?= $conclave; ?>">
                        <input type="hidden" name="paper" value="<?= $paper; ?>">
                        <input type='submit' id="submit" name='method2' value='Mark' class='btn btn-dark'>
                    </td>
                  </form>
                 <?php endif;?>
            </tr>
            <?php $numbering++; endforeach; ?>
           </tbody>
            <tfoot>
             <tr class="">
               <th>#</th>
               <th><b>Name</b></th>
               <th><b><?= $paper?></b></th>
               <th><b>Action</b></th>
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

<?php elseif($data['set'] == SENIOR):
$conclave = S_CONCLAVE;
$set = SENIOR;
$paper = 'short_paper';
?>

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
            <h1 class="m-0 h3">Add <?= $paper?> Scores For Set <?= $set?> Ufuma Zone</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
              <li class="breadcrumb-item active">Add Scores</li>
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
  <div class="col-lg-6">
    <h5><?= flash('msg') ?></h5>
  </div>
      <table class="table table-striped" id="eg">
          <thead>
             <tr class="">
               <th>#</th>
               <th><b>Name</b></th>
               <th><b><?= $paper?></b></th>
               <th><b>Action</b></th>
             </tr>
          </thead>

           <tbody>
           <?php $numbering = 1; 

           foreach($data['students'] as $student) : 
            $added = $this->attendanceModel->check_mark($set,$conclave,$paper,$student->id);
            ?>
           
            <tr>
                <td><?php echo $numbering;?></td>
                <td><?php echo $student->fullname?></td>
                 <?php if($added):?>
                  <td><?= $added->score?></td>
                  <td><a href="<?php echo URLROOT?>/papers/edit/<?php echo $added->id;?>" class="btn btn-sm btn-success"> Edit</a></td>
                 <?php else:?>
                   <form method="post" action="<?= URLROOT;?>/portal/add_mark" id="register_form">
                    <td><input type="" class="" required placeholder="Enter score"  name="score"></td>
                    <td>
                        <input type="hidden" name="std_id" value="<?= $student->id; ?>">
                        <input type="hidden" name="zone" value="<?= $student->zone; ?>">
                        <input type="hidden" name="fullname" value="<?= $student->fullname; ?>">
                        <input type="hidden" name="mitre_set" value="<?= $student->mitre_set; ?>">
                        <input type="hidden" name="conclave" value="<?= $conclave; ?>">
                        <input type="hidden" name="paper" value="<?= $paper; ?>">
                        <input type='submit' id="submit" name='method2' value='Mark' class='btn btn-dark'>
                    </td>
                  </form>
                 <?php endif;?>
            </tr>
            <?php $numbering++; endforeach; ?>
           </tbody>
            <tfoot>
             <tr class="">
               <th>#</th>
               <th><b>Name</b></th>
               <th><b><?= $paper?></b></th>
               <th><b>Action</b></th>
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
<?php endif;?>

<script type="text/javascript">
   new DataTable('#eg', {
    ordering: true,
    searching: true,
    paging: false,
  });
</script>







