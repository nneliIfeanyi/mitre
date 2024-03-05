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
          <h1 class="m-0">Culmulative Records <span class="text-muted"><span class="text-primary">(</span><?php echo $data['zone']?> Set <span class="badge bg-primary"><?php echo $data['set']?></span><span class="text-primary">)</span> Conclave <?php echo $data['conclave']?></span></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
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
    <div class="card card-body">
        <form action="" method="POST" id="mark-add">
          <div class="row">
          <div class="col-lg-4">
            <div class="form-group shadow p-1">
              <label>Set:</label>
              <select name="set" required class="form-control">
                <option value="">Select set</option>
                <option value="<?= SENIOR?>"><?= SENIOR?></option>
                <option value="<?= JUNIOR?>"><?= JUNIOR?></option> 
              </select>
            </div>
          </div>
          <div class="col-lg-4">
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
          <div class="col-lg-4">
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
          <div class=" d-grid col-md-4 offset-md-4 my-3">
            <input type="submit" id="mark" class="btn btn-primary btn-block rounded-5 fw-bold" value="Submit">
          </div>
        </div>
      </form>
  </div>
  
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-striped table-bordered" id="score-table">
          <div class="row"><div class="col-lg-6"><?php flash('msg');?></div></div>
          <thead>
            <tr class="text-primary">
              <th>#</th>
              <th><b>Name</b></th>
              <th><b>Attendance</b></th>
              <th><b>Summary</b></th>
              <th><b>Short Paper</b></th>
              <th><b>Long Paper</b></th> 
              <th><b>Term Paper</b></th> 
              <th><b>Total</b></th>    
            </tr>
          </thead>

          <tbody>
          <?php $numbering = 1; foreach($data['scores'] as $student) : 
          $resolve1 = $this->attendanceModel->getIndividualScore($student->std_id, $data['paper1']);
          $resolve2 = $this->attendanceModel->getIndividualScore($student->std_id, $data['paper2']);
          $resolve3 = $this->attendanceModel->getIndividualScore($student->std_id, $data['paper3']);
          $summary = $this->attendanceModel->getIndividualScore($student->std_id, $data['paper4']);
          $names = $this->attendanceModel->getNames($student->std_id);
          $punctual = $this->attendanceModel->getAttendance($student->std_id, $data['set'], $data['conclave']);
            if ($punctual == 3) {
              $mark = 45;
            }elseif ($punctual == 2) {
              $mark = 30;
            }elseif ($punctual == 1) {
              $mark = 15;
            }else{
              $mark = 0;
            }
          ?>
          <tr>
            <td><?php echo $numbering;?></td>
            <td class="font-weight-bold"><?php echo $names->name?></td>
            <td><?php echo $mark?></td>
            <td>
              <?php 
                if (!$summary->score) {
                  echo '--';
                }else{
                echo $summary->score;
              }?>
              
            </td>
            <td>
              <?php 
                if (!$resolve1->score) {
                  echo '--';
                }else{
                echo $resolve1->score;
              }?>
              
            </td>
            <td>
              <?php 
                if (!$resolve2->score) {
                  echo '--';
                }else{
                echo $resolve2->score;
              }?>
            </td>
            <td>
              <?php 
                if (!$resolve3->score) {
                  echo '--';
                }else{
                echo $resolve3->score;
              }?>
            </td>
            <td class="font-weight-bold"><?php echo $mark + $resolve1->score + $resolve2->score + $resolve3->score?></td>
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
$(function(){
    $('#mark-add').parsley();
})
</script>
<script>
  new DataTable('#score-table', {
    caption:"Culmulative Records for <?php echo $data['zone']?> zone Set <?php echo $data['set']?> Conclave <?php echo $data['conclave']?>",
    paging:false,
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel',
              { extend:'pdf',
                messageTop:'Culmulative Records for <?php echo $data['zone']?> zone Set <?php echo $data['set']?> Conclave <?php echo $data['conclave']?>',
                messageBottom:null
              },
              { extend:'print',
                messageTop:'Culmulative Records for <?php echo $data['zone']?> zone Set <?php echo $data['set']?> Conclave <?php echo $data['conclave']?>',
                messageBottom:null
              }]
        }
    }
});
</script>
    