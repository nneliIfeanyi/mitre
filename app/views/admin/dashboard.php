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
            <h1 class="m-0">Dashboard</h1>
            <p class="m-0 lead text-primary">Current Conclave Set 16 : <span style='color: green; font-weight: bold; font-size: 18px; text-transform: uppercase;'>
                  <?php echo S_CONCLAVE?>
                </span>
                  &nbsp; | &nbsp; Current Conclave Set 17 : <span style='color: green; font-weight: bold; font-size: 18px; text-transform: uppercase;'><?php echo J_CONCLAVE; ?></span>
            </p>
            
            <p class="lead"><span style='color: green; font-weight: bold;'> Today : </span><?php echo date('d').' '.date('M').','.' '.date('Y').' '.'|'.' '. DAY ?>.</p>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
              <li class="breadcrumb-item active">Welcome Admin</li>
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
       <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                      <div class="inner">
                        <h4>Set <?php echo SENIOR ?></h4>

                        <p>Students <span class="badge bg-primary"><?= $this->databaseModel->totals(SENIOR);?></span></p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-users"></i>
                      </div>
                      <a href="<?= URLROOT ;?>/admin/students/<?php echo SENIOR ?>" class="small-box-footer">View Database <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                      <div class="inner">
                        <h4>Set <?php echo JUNIOR?> </h4>

                        <p>Students <span class="badge bg-primary"><?= $this->databaseModel->totals(JUNIOR);?></span></p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-users"></i>
                      </div>
                      <a href="<?= URLROOT?>/admin/students/<?php echo JUNIOR ?>" class="small-box-footer">View database <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                      <div class="inner">
                        <h4>Set <?= SENIOR?></h4>

                        <p>Add Student</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user"></i>
                      </div>
                      <a href="<?= URLROOT?>/admin/add/<?php echo SENIOR ?>" class="small-box-footer">Register <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                      <div class="inner">
                        <h4>Set <?= JUNIOR?></h4>

                        <p>Add Student</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user"></i>
                      </div>
                      <a href="<?= URLROOT?>/admin/add/<?php echo JUNIOR ?>" class="small-box-footer">Register <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                      <div class="inner">
                        <h4>Set <?php echo SENIOR ?></h4>

                        <p>Uploaded Media <span class="badge bg-primary">0</span></p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-camera"></i>
                      </div>
                      <a href="#" class="small-box-footer">Add media <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                      <div class="inner">
                        <h4>Set <?php echo JUNIOR ?></h4>

                        <p>Uploaded Media <span class="badge bg-primary">0</span></p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-camera"></i>
                      </div>
                      <a href="#" class="small-box-footer">Add media <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
           
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>