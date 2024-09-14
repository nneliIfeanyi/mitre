<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/top.php'; ?>
<?php require APPROOT . '/views/inc/admin/sidebar.php'; ?>
<?php if ($data['set'] == JUNIOR) : ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Registered Students Set <span class="badge bg-primary"><?= $data['set'] ?></span></h1>
            <p>A Total of <span class="text-primary"><?php echo $this->databaseModel->totals($data['set']); ?></span> Registered</p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT; ?>/admin">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php //EVERYTHING GOES HERE, Start coding from here.
        ?>

        <div class="card card-body">
          <nav>
            <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist" style="font-weight: bold;">
              <a href="<?php echo URLROOT ?>/admin/kaduna/<?php echo $data['set'] ?>" class="nav-link" id="nav-kaduna-tab" type="button" role="tab">Kaduna Zone
              </a>
              <a href="<?php echo URLROOT ?>/admin/ufuma/<?php echo $data['set'] ?>" class="nav-link" id="nav-ufuma-tab" type="button" role="tab">Ufuma Zone
              </a>
              <a href="<?php echo URLROOT ?>/admin/minna/<?php echo $data['set'] ?>" class="nav-link" id="nav-minna-tab" type="button" role="tab">Minna Zone
              </a>
              <a href="<?php echo URLROOT ?>/admin/students/<?php echo $data['set'] ?>" class="active nav-link" id="nav-collective-tab" type="button" role="tab">Collective
              </a>
            </div>
          </nav>
          <h3 class="text-primary"><?php flash('del_msg'); ?></h3>
          <div class="table-responsive">
          <table class="table table-striped" id="eg">
            <thead>
              <tr class="">
                <th>S|N</th>
                <th><b>Image</b></th>
                <th><b>Name</b></th>
                <th><b>Phone</b></th>
                <th><b>Zone</b></th>
                <th><b>Address</b></th>
                <th><b>Church</b></th>
                <th><b>Action</b></th>
              </tr>
            </thead>

            <tbody>
              <?php $numbering = 1;
              foreach ($data['students'] as $student) : 
                $trash = $this->attendanceModel->get_unreported2($student->id);
                ?>
                <?php if($trash > 0 && $trash < 7):?>
                <tr style="background: rgba(205, 255, 0, 0.6);" data-toggle="tooltip" data-title="This candidate is under probation having missed a full MITRE conclave">
                  <td><?php echo $numbering; ?></td>
                  <td>
                    <?php if (empty($student->passport)) : ?>
                        <img src="<?php echo URLROOT . '/uploaded/user.jpg'; ?>" alt="pic" class="rounded-circle" style="height: 80px;width:90px;">
                    <?php else : ?>
                      <a href="<?php echo URLROOT . '/' . $student->passport ?>">
                        <img src="<?php echo URLROOT . '/' . $student->passport ?>" alt="profile-pic" class="rounded-circle" style="height: 80px;width:90px;">
                      </a>
                    <?php endif; ?>
                  </td>
                  <td><?php echo $student->fullname; ?></td>
                  <td><?php echo $student->mobile_num ?></td>
                  <td><?php echo $student->zone;?></td>
                  <td><?php echo $student->address ?></td>
                  <td><?php echo $student->church ?></td>
                  <td class="d-flex justify-content-around">
                    <a class="btn btn-sm text-success" href="<?php echo URLROOT; ?>/admin/more_details/<?php echo $student->id; ?>">More</a>
                  </td>
                </tr>
              <?php elseif($trash == 0):?>
                <tr style="background: rgba(250, 20, 0, 0.6);" data-toggle="tooltip" data-title="This candidate never reported to MITRE at all after registeration.">
                  <td><?php echo $numbering; ?></td>
                  <td>
                    <?php if (empty($student->passport)) : ?>
                        <img src="<?php echo URLROOT . '/uploaded/user.jpg'; ?>" alt="pic" class="rounded-circle" style="height: 80px;width:90px;">
                    <?php else : ?>
                      <a href="<?php echo URLROOT . '/' . $student->passport ?>">
                        <img src="<?php echo URLROOT . '/' . $student->passport ?>" alt="profile-pic" class="rounded-circle" style="height: 80px;width:90px;">
                      </a>
                    <?php endif; ?>
                  </td>
                  <td><?php echo $student->fullname; ?></td>
                  <td><?php echo $student->mobile_num ?></td>
                  <td><?php echo $student->zone;?></td>
                  <td><?php echo $student->address ?></td>
                  <td><?php echo $student->church ?></td>
                  <td class="d-flex justify-content-around">
                    <form action="<?php echo URLROOT; ?>/admin/delete/<?php echo $student->id; ?>" method="post">
                      <input type="hidden" name="zone" value="<?php echo $student->zone; ?>">
                      <input type="hidden" name="mitre_set" value="<?php echo $student->mitre_set; ?>">
                      <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Trash</button>
                    </form>
                  </td>
                </tr>
              
              <?php elseif($trash >= 7):?>
                <tr class="bg-light" data-toggle="tooltip" data-title="">
                  <td><?php echo $numbering; ?></td>
                  <td>
                    <?php if (empty($student->passport)) : ?>
                        <img src="<?php echo URLROOT . '/uploaded/user.jpg'; ?>" alt="pic" class="rounded-circle" style="height: 80px;width:90px;">
                      </a>
                    <?php else : ?>
                      <a href="<?php echo URLROOT . '/' . $student->passport ?>">
                        <img src="<?php echo URLROOT . '/' . $student->passport ?>" alt="profile-pic" class="rounded-circle" style="height: 80px;width:90px;">
                      </a>
                    <?php endif; ?>
                  </td>
                  <td><?php echo $student->fullname; ?></td>
                  <td><?php echo $student->mobile_num ?></td>
                  <td><?php echo $student->zone;?></td>
                  <td><?php echo $student->address ?></td>
                  <td><?php echo $student->church ?></td>
                  <td class="d-flex justify-content-around">
                    <a class="btn btn-sm text-success" href="<?php echo URLROOT; ?>/admin/more_details/<?php echo $student->id; ?>">More</a>
                  </td>
                </tr>
            <?php endif;?>
              <?php $numbering++;
              endforeach; ?>
            </tbody>
            <tfoot>
              <tr class="">
                <th>S/N</th>
                <th><b>Image</b></th>
                <th><b>Name</b></th>
                <th><b>Phone</b></th>
                <th><b>Zone</b></th>
                <th><b>Address</b></th>
                <th><b>Church</b></th>
                <th><b>Action</b></th>
              </tr>
            </tfoot>
          </table>
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php elseif ($data['set'] == SENIOR) : ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Registered Students Set <span class="badge bg-primary"><?= $data['set'] ?></span></h1>
            <p>A Total of <span class="text-primary"><?php echo $this->databaseModel->totals($data['set']); ?></span> Registered</p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT; ?>/admin">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php //EVERYTHING GOES HERE, Start coding from here.
        ?>

        <div class="card card-body">
          <nav>
            <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist" style="font-weight: bold;">
              <a href="<?php echo URLROOT ?>/admin/kaduna/<?php echo $data['set'] ?>" class="nav-link" id="nav-kaduna-tab" type="button" role="tab">Kaduna Zone
              </a>
              <a href="<?php echo URLROOT ?>/admin/ufuma/<?php echo $data['set'] ?>" class="nav-link" id="nav-ufuma-tab" type="button" role="tab">Ufuma Zone
              </a>
              <a href="<?php echo URLROOT ?>/admin/minna/<?php echo $data['set'] ?>" class="nav-link" id="nav-minna-tab" type="button" role="tab">Minna Zone
              </a>
              <a href="<?php echo URLROOT ?>/admin/students/<?php echo $data['set'] ?>" class="active nav-link" id="nav-collective-tab" type="button" role="tab">Collective
              </a>
            </div>
          </nav>
          <h3 class="text-primary"><?php flash('del_msg'); ?></h3>
          <table class="table table-striped" id="eg">
            <thead>
              <tr class="">
                <th>S/N</th>
                <th><b>Image</b></th>
                <th><b>Name</b></th>
                <th><b>Phone</b></th>
                <th><b>WhatsApp_num</b></th>
                <th><b>Zone</b></th>
                <th><b>Address</b></th>
                <th><b>Church</b></th>
                <th><b>Action</b></th>
              </tr>
            </thead>

            <tbody>
              <?php $numbering = 1;
              foreach ($data['students'] as $student) : ?>
                <tr>
                  <td><?php echo $numbering; ?></td>
                  <td>
                    <?php if (empty($student->passport)) : ?>
                      <a href="<?php echo URLROOT; ?>/admin/add_passport/<?= $student->id; ?>">
                        <img src="<?php echo URLROOT . '/uploaded/user.jpg'; ?>" alt="pic" class="rounded-circle" style="height: 80px;width:90px;">
                      </a>
                    <?php else : ?>
                      <a href="<?php echo URLROOT . '/' . $student->passport ?>">
                        <img src="<?php echo URLROOT . '/' . $student->passport ?>" alt="profile-pic" class="rounded-circle" style="height: 80px;width:90px;">
                      </a>
                    <?php endif; ?>
                  </td>
                  <td><?php echo $student->fullname ?></td>
                  <td><?php echo $student->mobile_num ?></td>
                  <td><?php echo $student->zone ?></td>
                  <td><?php echo $student->address ?></td>
                  <td><?php echo $student->church ?></td>
                  <td><a class="" href="<?php echo URLROOT; ?>/admin/more_details/<?php echo $student->id; ?>">More</a></td>

                </tr>
              <?php $numbering++;
              endforeach; ?>
            </tbody>
            <tfoot>
              <tr class="">
                <th>S/N</th>
                <th><b>Image</b></th>
                <th><b>Name</b></th>
                <th><b>Phone</b></th>
                <th><b>Zone</b></th>
                <th><b>Address</b></th>
                <th><b>Church</b></th>
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


<?php endif ?>
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>

<script>
  new DataTable('#eg', {
    scrollX: true,
    layout: {
      topStart: {
        buttons: [{
            extend: 'copyHtml5',
            exportOptions: {
              columns: [0, ':visible']
            }
          },
          {
            extend: 'excelHtml5',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'pdfHtml5',
            messageTop: 'All Minna Students Set <?= $data['set'] ?>',
            exportOptions: {
              columns: [0, ':visible']
            }
          },
          {
            extend: 'print',
            messageTop: 'All Minna Students Set <?= $data['set'] ?>',
            exportOptions: {
              columns: [0, ':visible']
            }
          },
          'colvis'
        ]
      }
    }
  });
</script>