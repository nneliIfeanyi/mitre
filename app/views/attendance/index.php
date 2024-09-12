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
            <h1 class="m-0"><i class="fab fa-mark"></i> Reverse Attendance <span class="badge bg-primary"><?php echo $data['set']?></span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
              <li class="breadcrumb-item active">Attendance</li>
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
        <div class="callout callout-success" style="margin-top: 30px;">
          <p><span class="font-weight-bold">Note:</span>
          <span class="lead">Use the search bar right below to search for the student you want to reverse his/her attendance.</span></p>
        </div>
        <nav>
          <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
            <a href="<?php echo URLROOT?>/attendance/kaduna/<?php echo $set?>" class="nav-link" 
                id="nav-kaduna-tab" 
                type="button" role="tab" >Kaduna Zone
            </a>
            <a href="<?php echo URLROOT?>/attendance/ufuma/<?php echo $set?>" class="nav-link" 
                id="nav-ufuma-tab" 
                type="button" role="tab" >Ufuma Zone
            </a>
            <a href="<?php echo URLROOT?>/attendance/minna/<?php echo $set?>" class="nav-link" 
                id="nav-minna-tab" 
                type="button" role="tab" >Minna Zone
            </a>
            <a href="<?php echo URLROOT?>/attendance/reverse/<?php echo $set?>" class="active nav-link" 
                id="nav-minna-tab" 
                type="button" role="tab" >Reverse Attendance
            </a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">


    <!-- /// ALL COLLECTIVE TAB SET 17 ///
    /// SELECTING ALL COLLECTIVE STUDENTS ///
    /// MARK ATTENDANCE FOR ALL COLLECTIVE STUDENTS /// --->
          <div class="tab-pane fade show active" id="collective" role="tabpanel" aria-labelledby="nav-collective-tab">
            <div class="card card-body">
             <div class="table-responsive">
                <table class="table table-striped" id="collective-table">
                  <div class="row"><div class="col-lg-6"><?php flash('msg');?></div></div>
                  <thead>
                     <tr class="">
                       <th>#</th>
                       <th><b>Name</b></th>
                       <th><b>Monday</b></th> 
                       <th><b>Tuesday</b></th> 
                       <th><b>Wednesday</b></th>    
                     </tr>
                  </thead>

                   <tbody>
                   <?php $numbering = 1; foreach($data['students'] as $student) : ?>
                    <tr>
                        <td><?php echo $numbering;?></td>
                        <td><?php echo $student->fullname?></td>
                       
                        <td>
                          <?php if(!$this->attendanceModel->check_attendance($student->id, $full_day1, $set, $conclave)):?>
                          <!-- CANDIDATE IS ABSENT -->
                          <button class="btn btn-danger btn-sm">Absent</button>
                        <?php else:?>
                          <div class="d-flex">

                            <!-- ATTENDANCE ALREADY MARKED-->
                            <a class="btn btn-sm btn-success" style="cursor: text;"><i class="fas fa-check"></i> Present</a>

                            <!-- REVERSE  ATTENDANCE-->
                            <form action="<?php echo URLROOT?>/attendance/reverse/<?php echo $set?>" method="post" 
                              data-toggle="tooltip" data-placement="right"
                              title="Click to reverse or unmark attendance">
                              <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                              <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                              <input type="hidden" name="day" value="<?php echo $full_day1?>">
                              <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                              <input type="hidden" name="conclave" value="<?php echo $conclave?>">
                              <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                            </form>
                          </div>
                        <?php endif;?>
                        </td>
                        <td>
                         <?php if(!$this->attendanceModel->check_attendance($student->id, $full_day2, $set, $conclave)):?>
                          <!-- CANDIDATE IS ABSENT -->
                          <button class="btn btn-danger btn-sm">Absent</button>
                        <?php else:?>
                          <div class="d-flex">

                            <!-- ATTENDANCE ALREADY MARKED-->
                            <a class="btn btn-sm btn-success" style="cursor: text;"><i class="fas fa-check"></i></a>

                            <!-- REVERSE  ATTENDANCE-->
                            <form action="<?php echo URLROOT?>/attendance/reverse/<?php echo $set?>" method="post" 
                              data-toggle="tooltip" data-placement="right"
                              title="Click to reverse or unmark attendance">
                              <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                              <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                              <input type="hidden" name="day" value="<?php echo $full_day2?>">
                              <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                              <input type="hidden" name="conclave" value="<?php echo $conclave?>">
                              <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Reverse</button>
                            </form>
                          </div>
                        <?php endif;?>
                        </td>
                        <td>
                          <?php if(!$this->attendanceModel->check_attendance($student->id, $full_day3, $set, $conclave)):?>
                          <!-- CANDIDATE IS ABSENT -->
                          <button class="btn btn-danger btn-sm">Absent</button>
                        <?php else:?>
                          <div class="d-flex">

                            <!-- ATTENDANCE ALREADY MARKED-->
                            <a class="btn btn-sm btn-success" style="cursor: text;"><i class="fas fa-check"></i></a>

                            <!-- REVERSE  ATTENDANCE-->
                            <form action="<?php echo URLROOT?>/attendance/reverse/<?php echo $set?>" method="post" 
                              data-toggle="tooltip" data-placement="right"
                              title="Click to reverse or unmark attendance">
                              <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                              <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                              <input type="hidden" name="day" value="<?php echo $full_day3?>">
                              <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                              <input type="hidden" name="conclave" value="<?php echo $conclave?>">
                              <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i>Reverse</button>
                            </form>
                          </div>
                        <?php endif;?>
                        </td>
                    </tr>
                    <?php $numbering++; endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
     </div>      
  </div><!-- /.container-fluid -->
  </section>
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
              <h1 class="m-0"><i class="fab fa-mark"></i> Reverse Attendance <span class="badge bg-primary"><?php echo $data['set']?></span></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
                <li class="breadcrumb-item active">Attendance</li>
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
      <div class="callout callout-success" style="margin-top: 30px;">
          <p><span class="font-weight-bold">Note:</span>
          <span class="lead">Use the search bar right below to search for the student you want to reverse his/her attendance.</span></p>
        </div>
            <nav>
              <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                <a href="<?php echo URLROOT?>/attendance/kaduna/<?php echo $set?>" class="nav-link" 
                    id="nav-kaduna-tab" 
                    type="button" role="tab" >Kaduna Zone
                </a>
                <a href="<?php echo URLROOT?>/attendance/ufuma/<?php echo $set?>" class="nav-link" 
                    id="nav-ufuma-tab" 
                    type="button" role="tab" >Ufuma Zone
                </a>
                <a href="<?php echo URLROOT?>/attendance/minna/<?php echo $set?>" class="nav-link" 
                    id="nav-minna-tab" 
                    type="button" role="tab" >Minna Zone
                </a>
                <a href="<?php echo URLROOT?>/attendance/reverse/<?php echo $set?>" class="active nav-link" 
                  id="nav-minna-tab" 
                  type="button" role="tab" >Reverse Attendance
                </a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">


        <!-- /// ALL COLLECTIVE TAB SET 17 ///
        /// SELECTING ALL COLLECTIVE STUDENTS ///
        /// MARK ATTENDANCE FOR ALL COLLECTIVE STUDENTS /// --->
              <div class="tab-pane fade show active" id="collective" role="tabpanel" aria-labelledby="nav-collective-tab">
                <div class="card card-body">
                 <div class="table-responsive">
                    <table class="table table-striped" id="collective-table">
                      <div class="row"><div class="col-lg-6"><?php flash('msg');?></div></div>
                      <thead>
                         <tr class="">
                           <th>#</th>
                           <th><b>Name</b></th>
                           <th><b>Monday</b></th> 
                           <th><b>Tuesday</b></th> 
                           <th><b>Wednesday</b></th>    
                         </tr>
                      </thead>

                       <tbody>
                       <?php $numbering = 1; foreach($data['students'] as $student) : ?>
                        <tr>
                            <td><?php echo $numbering;?></td>
                            <td><?php echo $student->fullname?></td>
                            
                            <td>
                              <?php if(!$this->attendanceModel->check_attendance($student->id, $full_day1, $set, $conclave)):?>
                              <!-- CANDIDATE IS ABSENT -->
                              <button class="btn btn-danger btn-sm">Absent</button>
                            <?php else:?>
                              <div class="d-flex">

                                <!-- ATTENDANCE ALREADY MARKED-->
                                <a class="btn btn-sm btn-success" style="cursor: text;"><i class="fas fa-check"></i></a>

                                <!-- REVERSE  ATTENDANCE-->
                                <form action="<?php echo URLROOT?>/attendance/reverse/<?php echo $set?>" method="post" 
                                  data-toggle="tooltip" data-placement="right"
                                  title="Click to reverse or unmark attendance">
                                  <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                                  <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                                  <input type="hidden" name="day" value="<?php echo $full_day1?>">
                                  <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                                  <input type="hidden" name="conclave" value="<?php echo $conclave?>">
                                  <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Reverse</button>
                                </form>
                              </div>
                            <?php endif;?>
                            </td>
                            <td>
                             <?php if(!$this->attendanceModel->check_attendance($student->id, $full_day2, $set, $conclave)):?>
                              <!-- CANDIDATE IS ABSENT -->
                             <button class="btn btn-danger btn-sm">Absent</button>
                            <?php else:?>
                              <div class="d-flex">

                                <!-- ATTENDANCE ALREADY MARKED-->
                                <a class="btn btn-sm btn-success" style="cursor: text;"><i class="fas fa-check"></i></a>

                                <!-- REVERSE  ATTENDANCE-->
                                <form action="<?php echo URLROOT?>/attendance/reverse/<?php echo $set?>" method="post" 
                                  data-toggle="tooltip" data-placement="right"
                                  title="Click to reverse or unmark attendance">
                                  <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                                  <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                                  <input type="hidden" name="day" value="<?php echo $full_day2?>">
                                  <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                                  <input type="hidden" name="conclave" value="<?php echo $conclave?>">
                                  <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Reverse</button>
                                </form>
                              </div>
                            <?php endif;?>
                            </td>
                            <td>
                              <?php if(!$this->attendanceModel->check_attendance($student->id, $full_day3, $set, $conclave)):?>
                              <!-- CANDIDATE IS ABSENT -->
                             <button class="btn btn-danger btn-sm">Absent</button>
                            <?php else:?>
                              <div class="d-flex">

                                <!-- ATTENDANCE ALREADY MARKED-->
                                <a class="btn btn-sm btn-success" style="cursor: text;"><i class="fas fa-check"></i></a>

                                <!-- REVERSE  ATTENDANCE-->
                                <form action="<?php echo URLROOT?>/attendance/reverse/<?php echo $set?>" method="post" 
                                  data-toggle="tooltip" data-placement="right"
                                  title="Click to reverse or unmark attendance">
                                  <input type="hidden" name="std_id" value="<?php echo $student->id?>">
                                  <input type="hidden" name="fullname" value="<?php echo $student->fullname?>">
                                  <input type="hidden" name="day" value="<?php echo $full_day3?>">
                                  <input type="hidden" name="mitre_set" value="<?php echo $set?>">
                                  <input type="hidden" name="conclave" value="<?php echo $conclave?>">
                                  <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i> Reverse</button>
                                </form>
                              </div>
                            <?php endif;?>
                            </td>
                        </tr>
                        <?php $numbering++; endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
            </div>
     </div>      
  </div><!-- /.container-fluid -->
  </section>

<?php endif;?>
</div>
    <!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
<script type="text/javascript">
  new DataTable('#collective-table', {
    //scrollX: true,
    //scrollY: '60vh',
    //scrollCollapse: true,
    paging:true,
    ordering: false,
    searching: true,
    info: true,
  });
   new DataTable('#kaduna-table', {
    //ordering: false,
    searching: true,
    info: true,
  });
</script>
    
  