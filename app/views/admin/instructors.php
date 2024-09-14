<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/top.php'; ?>
<?php require APPROOT . '/views/inc/admin/sidebar.php'; ?>
<?php flash('msg'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mitre Instructors Database</h1>
          <p>A Total of <span class="text-primary"><?php echo $data['rowCount']; ?></span> Registered</p>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= URLROOT; ?>/admin">Home</a></li>
            <li class="breadcrumb-item active">Instructors</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- <style type="text/css">
    .zoom {
      transition: transform .3s;
      border-radius: 50%;
    }

    .zoom:hover {
      transform: scale(2.7);
      border-radius: 0%;
    }
  </style> -->






  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="container-fluid">
        <div class="card card-body">
          <table class="table table-striped" id="example">
            <thead>
              <tr class="">
                <th>S|N</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Zone</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Ministry</th>
                <th>Action</th>

              </tr>
            </thead>

            <tbody>
              <?php $numbering = 1;
              foreach ($data['students'] as $student) : ?>
                <tr>
                  <td><?php echo $numbering; ?></td>
                  <td>
                    <a href="<?= URLROOT; ?>/instructors/update_photo/<?= $student->id ?>">
                      <?php echo $student->name ?>
                    </a>
                  </td>
                  <td>
                    <div class="">
                      <?php if (empty($student->photo)) : ?>
                        <img src="<?php echo URLROOT ?>/img/default.png" class="" style="width: 100%;">
                      <?php else : ?>
                        <a href="<?php echo URLROOT . '/' . $student->photo ?>">
                          <img src="<?php echo URLROOT . '/' . $student->photo ?>" class="zoom" style="width: 100%;">
                        </a>
                      <?php endif; ?>
                    </div>
                  </td>
                  <td><?php echo $student->zone ?></td>
                  <td><?php echo $student->address ?></td>
                  <td><?php echo $student->phone ?></td>
                  <td><?php echo $student->ministry ?></td>
                  <td><a href="<?php echo URLROOT ?>/instructors/edit/<?= $student->id; ?>" class="btn btn-sm btn-success">More</a></td>
                </tr>
              <?php $numbering++;
              endforeach; ?>
            </tbody>
            <tfoot>
              <tr class="">
                <th>S|N</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Zone</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Ministry</th>
                <th>Action</th>
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

<script>
  new DataTable('#example', {
    scrollX: true,
    paging: false,
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
            messageTop: 'message',
            exportOptions: {
              columns: [0, ':visible']
            }
          },
          {
            extend: 'print',
            messageTop: 'message',
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