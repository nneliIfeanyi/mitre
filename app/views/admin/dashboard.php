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
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>&nbsp;</h3>

                        <p>New Mitre Registration</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-pen"></i>
                      </div>
                      <a href="<?= URLROOT ;?>/students/registration" class="small-box-footer">Register Now <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <!-- <div class="small-box bg-success">
                      <div class="inner">
                        <h3>&nbsp;</h3>

                        <p>View Attendance</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div> -->
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3><?= $data['total'];?></h3>

                        <p>All Registrations</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-users"></i>
                      </div>
                      <a href="<?= URLROOT?>/admin/all_registered" class="small-box-footer">View database <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <!-- <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>&nbsp;</h3>

                        <p>Uploaded Media</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-camera"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div> -->
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