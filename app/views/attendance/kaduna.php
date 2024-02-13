<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/top.php'; ?>
<?php require APPROOT . '/views/inc/admin/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<?php if($data['set'] == JUNIOR):
$conclave = J_CONCLAVE;
$set = JUNIOR;
$first_day = FIRSTDAY;
$full_day1 = FULLDAY1;
$full_day2 = FULLDAY2;
$full_day3 = FULLDAY3;
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fab fa-check"></i> Mark Attendance <span class="text-muted"><span class="text-primary">(</span>Kaduna Set <span class="badge bg-primary"><?php echo $data['set']?></span><span class="text-primary">)</span></span></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
            <li class="breadcrumb-item active">Mark Attendance</li>
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
        <table class="table table-striped" id="kaduna-table">
          <div class="row"><div class="col-lg-6"><?php flash('msg');?></div></div>
          <thead>
            <tr class="">
              <th>#</th>
              <th><b>Name</b></th>
              <th><b>Arrival</b></th>
              <th><b>Monday</b></th> 
              <th><b>Tuesday</b></th> 
              <th><b>Wednesday</b></th>    
            </tr>
          </thead>

          <tbody>
          <?php $numbering = 1; foreach($data['all'] as $student) : ?>
          <tr>
            <td><?php echo $numbering;?></td>
            <td><?php echo $student->fullname?></td>
            <td>
            <?php if(!$this->attendanceModel->check_attendance($student->id, $first_day, $set, $conclave)):?>
              <!-- CANDIDATE IS ABSENT -->
              <form action="<?php echo URLROOT?>/attendance/kaduna/<?= $set?>" method="post">
                <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                <input type="hidden" name="day" value="<?php echo $first_day;?>">
                <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                <input type="hidden" name="conclave" value="<?php echo $conclave;?>">

                <input type="submit" class="btn btn-danger btn-sm" value="Absent">
              </form>
            <?php else:?>
              <div class="d-flex">
                <!-- ATTENDANCE ALREADY MARKED-->
                <a class="btn btn-sm btn-success" style="cursor: text;"><i class="fas fa-check"></i> Present</a>

                <!-- REVERSE  ATTENDANCE-->
                <!-- <form action="<?php echo URLROOT?>/attendance/reverse_kaduna" method="post" 
                  data-toggle="tooltip" data-placement="right"
                  title="Click to reverse or unmark attendance">
                  <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                  <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                  <input type="hidden" name="day" value="<?php echo $first_day?>">
                  <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                  <input type="hidden" name="conclave" value="<?php echo $conclave?>">
                  <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                </form> -->
              </div>
            <?php endif;?>
            </td>

            <!-- MONDAY FIRST FULLDAY ATTENDANCE-->
            <td>
              <?php if(!$this->attendanceModel->check_attendance($student->id, $full_day1, $set, $conclave)):?>
              <!-- CANDIDATE IS ABSENT -->
              <form action="<?php echo URLROOT?>/attendance/kaduna/<?= $set?>" method="post" id="">
                <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                <input type="hidden" name="day" value="<?php echo $full_day1;?>">
                <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                <input type="hidden" name="conclave" value="<?php echo $conclave;?>">
                
                <input type="submit" class="btn btn-danger btn-sm" id="" value="Absent">
              </form>
            <?php else:?>
              <div class="d-flex">

                <!-- ATTENDANCE ALREADY MARKED-->
                <a class="btn btn-sm btn-success" style="cursor: text;"><i class="fas fa-check"></i> Present</a>

                <!-- REVERSE  ATTENDANCE-->
                <!-- <form action="<?php echo URLROOT?>/attendance/reverse_kaduna" method="post" 
                  data-toggle="tooltip" data-placement="right"
                  title="Click to reverse or unmark attendance">
                  <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                  <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                  <input type="hidden" name="day" value="<?php echo $full_day1?>">
                  <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                  <input type="hidden" name="conclave" value="<?php echo $conclave?>">
                  <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                </form> -->
              </div>
            <?php endif;?>
            </td>
            <!-- TUESDAY SECOND FULLDAY ATTENDANCE-->
            <td>
            <?php if(!$this->attendanceModel->check_attendance($student->id, $full_day2, $set, $conclave)):?>
              <!-- CANDIDATE IS ABSENT -->
              <form action="<?php echo URLROOT?>/attendance/kaduna/<?= $set?>" method="post" id="">
                <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                <input type="hidden" name="day" value="<?php echo $full_day2;?>">
                <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                <input type="hidden" name="conclave" value="<?php echo $conclave;?>">
                
                <input type="submit" class="btn btn-danger btn-sm" id="" value="Absent">
              </form>
            <?php else:?>
              <div class="d-flex">

                <!-- ATTENDANCE ALREADY MARKED-->
                <a class="btn btn-sm btn-success" style="cursor: text;"><i class="fas fa-check"></i> Present</a>

                <!-- REVERSE  ATTENDANCE-->
                <!-- <form action="<?php echo URLROOT?>/attendance/reverse_kaduna" method="post" 
                  data-toggle="tooltip" data-placement="right"
                  title="Click to reverse or unmark attendance">
                  <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                  <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                  <input type="hidden" name="day" value="<?php echo $full_day2?>">
                  <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                  <input type="hidden" name="conclave" value="<?php echo $conclave?>">
                  <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                </form> -->
              </div>
            <?php endif;?>
            </td>
            <!-- WEDNESDAY THIRD FULLDAY ATTENDANCE-->
            <td>
            <?php if(!$this->attendanceModel->check_attendance($student->id, $full_day3, $set, $conclave)):?>
              <!-- CANDIDATE IS ABSENT -->
              <form action="<?php echo URLROOT?>/attendance/kaduna/<?= $set?>" method="post" id="">
                <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                <input type="hidden" name="day" value="<?php echo $full_day3;?>">
                <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                <input type="hidden" name="conclave" value="<?php echo $conclave;?>">
                
                <input type="submit" class="btn btn-danger btn-sm" id="" value="Absent">
              </form>
            <?php else:?>
              <div class="d-flex">

                <!-- ATTENDANCE ALREADY MARKED-->
                <a class="btn btn-sm btn-success" style="cursor: text;"><i class="fas fa-check"></i> Present</a>

                <!-- REVERSE  ATTENDANCE-->
                <!-- <form action="<?php echo URLROOT?>/attendance/reverse_kaduna" method="post" 
                  data-toggle="tooltip" data-placement="right"
                  title="Click to reverse or unmark attendance">
                  <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                  <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                  <input type="hidden" name="day" value="<?php echo $full_day3?>">
                  <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                  <input type="hidden" name="conclave" value="<?php echo $conclave?>">
                  <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                </form> -->
              </div>
            <?php endif;?>
            </td>
          </tr>
          <?php $numbering++; endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>     
  </div><!-- /.container-fluid -->
</section>
</div>
  <!-- /.content -->

<!-- /// END SET 17 SECTION ///
    /// END SET 17 SECTION ///
    /// END SET 17 SECTION /// --->

<!-- /// SENIOR SET 16 SECTION ///
    /// SENIOR SET 16 STUDENTS ///
    /// CHECKING FOR SET 16 /// --->
<?php elseif($data['set'] == SENIOR):
$conclave = S_CONCLAVE;
$set = SENIOR;
$first_day = FIRSTDAY;
$full_day1 = FULLDAY1;
$full_day2 = FULLDAY2;
$full_day3 = FULLDAY3;

  ?>
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fab fa-check"></i> Mark Attendance <span class="text-muted"><span class="text-primary">(</span>Kaduna Set <span class="badge bg-primary"><?php echo $data['set']?></span><span class="text-primary">)</span></span></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
            <li class="breadcrumb-item active">Mark Attendance</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

    <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
     <div class="card-body">
        <div class="card-body">
        <table class="table table-striped" id="kaduna-table">
          <div class="row"><div class="col-lg-6"><?php flash('msg');?></div></div>
          <thead>
            <tr class="">
              <th>#</th>
              <th><b>Name</b></th>
              <th><b>Arrival</b></th>
              <th><b>Monday</b></th> 
              <th><b>Tuesday</b></th> 
              <th><b>Wednesday</b></th>    
            </tr>
          </thead>

          <tbody>
          <?php $numbering = 1; foreach($data['all'] as $student) : ?>
          <tr>
            <td><?php echo $numbering;?></td>
            <td><?php echo $student->fullname?></td>
            <td>
            <?php if(!$this->attendanceModel->check_attendance($student->id, $first_day, $set, $conclave)):?>
              <!-- CANDIDATE IS ABSENT -->
              <form action="<?php echo URLROOT?>/attendance/kaduna/<?= $set?>" method="post">
                <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                <input type="hidden" name="day" value="<?php echo $first_day;?>">
                <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                <input type="hidden" name="conclave" value="<?php echo $conclave;?>">

                <input type="submit" class="btn btn-danger btn-sm" value="Absent">
              </form>
            <?php else:?>
              <div class="d-flex">
                <!-- ATTENDANCE ALREADY MARKED-->
                <a class="btn btn-sm btn-success" style="cursor: text;"><i class="fas fa-check"></i> Present</a>

                <!-- REVERSE  ATTENDANCE-->
                <!-- <form action="<?php echo URLROOT?>/attendance/reverse_kaduna" method="post" 
                  data-toggle="tooltip" data-placement="right"
                  title="Click to reverse or unmark attendance">
                  <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                  <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                  <input type="hidden" name="day" value="<?php echo $first_day?>">
                  <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                  <input type="hidden" name="conclave" value="<?php echo $conclave?>">
                  <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                </form> -->
              </div>
            <?php endif;?>
            </td>

            <!-- MONDAY FIRST FULLDAY ATTENDANCE-->
            <td>
              <?php if(!$this->attendanceModel->check_attendance($student->id, $full_day1, $set, $conclave)):?>
              <!-- CANDIDATE IS ABSENT -->
              <form action="<?php echo URLROOT?>/attendance/kaduna/<?= $set?>" method="post" id="">
                <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                <input type="hidden" name="day" value="<?php echo $full_day1;?>">
                <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                <input type="hidden" name="conclave" value="<?php echo $conclave;?>">
                
                <input type="submit" class="btn btn-danger btn-sm" id="" value="Absent">
              </form>
            <?php else:?>
              <div class="d-flex">

                <!-- ATTENDANCE ALREADY MARKED-->
                <a class="btn btn-sm btn-success" style="cursor: text;"><i class="fas fa-check"></i> Present</a>

                <!-- REVERSE  ATTENDANCE-->
                <!-- <form action="<?php echo URLROOT?>/attendance/reverse_kaduna" method="post" 
                  data-toggle="tooltip" data-placement="right"
                  title="Click to reverse or unmark attendance">
                  <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                  <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                  <input type="hidden" name="day" value="<?php echo $full_day1?>">
                  <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                  <input type="hidden" name="conclave" value="<?php echo $conclave?>">
                  <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                </form> -->
              </div>
            <?php endif;?>
            </td>
            <!-- TUESDAY SECOND FULLDAY ATTENDANCE-->
            <td>
            <?php if(!$this->attendanceModel->check_attendance($student->id, $full_day2, $set, $conclave)):?>
              <!-- CANDIDATE IS ABSENT -->
              <form action="<?php echo URLROOT?>/attendance/kaduna/<?= $set?>" method="post" id="">
                <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                <input type="hidden" name="day" value="<?php echo $full_day2;?>">
                <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                <input type="hidden" name="conclave" value="<?php echo $conclave;?>">
                
                <input type="submit" class="btn btn-danger btn-sm" id="" value="Absent">
              </form>
            <?php else:?>
              <div class="d-flex">

                <!-- ATTENDANCE ALREADY MARKED-->
                <a class="btn btn-sm btn-success" style="cursor: text;"><i class="fas fa-check"></i> Present</a>

                <!-- REVERSE  ATTENDANCE-->
                <!-- <form action="<?php echo URLROOT?>/attendance/reverse_kaduna" method="post" 
                  data-toggle="tooltip" data-placement="right"
                  title="Click to reverse or unmark attendance">
                  <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                  <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                  <input type="hidden" name="day" value="<?php echo $full_day2?>">
                  <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                  <input type="hidden" name="conclave" value="<?php echo $conclave?>">
                  <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                </form> -->
              </div>
            <?php endif;?>
            </td>
            <!-- WEDNESDAY THIRD FULLDAY ATTENDANCE-->
            <td>
            <?php if(!$this->attendanceModel->check_attendance($student->id, $full_day3, $set, $conclave)):?>
              <!-- CANDIDATE IS ABSENT -->
              <form action="<?php echo URLROOT?>/attendance/kaduna/<?= $set?>" method="post" id="">
                <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                <input type="hidden" name="day" value="<?php echo $full_day3;?>">
                <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                <input type="hidden" name="conclave" value="<?php echo $conclave;?>">
                
                <input type="submit" class="btn btn-danger btn-sm" id="" value="Absent">
              </form>
            <?php else:?>
              <div class="d-flex">

                <!-- ATTENDANCE ALREADY MARKED-->
                <a class="btn btn-sm btn-success" style="cursor: text;"><i class="fas fa-check"></i> Present</a>

                <!-- REVERSE  ATTENDANCE-->
                <!-- <form action="<?php echo URLROOT?>/attendance/reverse_kaduna" method="post" 
                  data-toggle="tooltip" data-placement="right"
                  title="Click to reverse or unmark attendance">
                  <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                  <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                  <input type="hidden" name="day" value="<?php echo $full_day3?>">
                  <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                  <input type="hidden" name="conclave" value="<?php echo $conclave?>">
                  <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                </form> -->
              </div>
            <?php endif;?>
            </td>
          </tr>
          <?php $numbering++; endforeach; ?>
          </tbody>
        </table>
      </div>
     </div>      
  </div><!-- /.container-fluid -->
  </section>

<?php endif;?>
</div>
    <!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
<script type="text/javascript">
   new DataTable('#kaduna-table', {
    //ordering: false,
    searching: true,
    info: true,
  });
</script>
    