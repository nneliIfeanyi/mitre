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
            <h1 class="m-0">Alumni Registration <span class="badge bg-primary">(2024)</span></h1>
            <p>A Total of <span class="text-primary"><?php echo $data['rowCount'] ;?></span> Registered</p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
              <li class="breadcrumb-item active">All Registered</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="container-fluid">
       <div class="card-body">
              <table class="table table-striped" id="eg">
                <thead>
                   <tr class="">
                     <th>#</th>
                     <th><b>Name</b></th>
                     <th><b>Gender</b></th>
                     <th><b>Zone</b></th>
                     <th><b>State</b></th>
                     <th><b>Address</b></th>
                     <th><b>Phone</b></th>
                     <th><b>Whatsapp</b></th>
                     <th><b>Telegram</b></th>
                     <th><b>Email</b></th>
                     <th><b>Ministry</b></th>
                     <th><b>Occupation</b></th>
                     <th><b>Assembly</b></th>
                     
                   </tr>
                </thead>

                 <tbody>
                 <?php $numbering = 1; foreach($data['students'] as $student) : ?>
                  <tr>
                      <td><?php echo $numbering;?></td>
                      <td><?php echo $student->name?></td>
                      <td><?php echo $student->gender?></td>
                      
                
                      <td><?php echo $student->zone?></td>
                      <td><?php echo $student->state?></td>
                      <td><?php echo $student->address?></td>
                      <td><?php echo $student->phone?></td>
                      <td><a href="https://wa.me/<?= $student->whatsapp;?>" class="btn btn-sm"><i class="fab fa-whatsapp" aria-hidden="true"></i> <?php echo $student->whatsapp?></a></td>
                      <td><?php echo $student->telegram?></td>
                      <td><?php echo $student->email?></td>
                

                      <td><?php echo $student->ministry?></td>
                      <td><?php echo $student->occupation?></td>
                      <td><?php echo $student->assembly?></td>

                  </tr>
                  <?php $numbering++; endforeach; ?>
                 </tbody>
                  <tfoot>
                   <tr class="">
                     <th>#</th>
                     <th><b>Name</b></th>
                     <th><b>Gender</b></th>
                     <th><b>Zone</b></th>
                     <th><b>State</b></th>
                     <th><b>Address</b></th>
                     <th><b>Phone</b></th>
                     <th><b>Whatsapp</b></th>
                     <th><b>Telegram</b></th>
                     <th><b>Email</b></th>
                     <th><b>Ministry</b></th>
                     <th><b>Occupation</b></th>
                     <th><b>Assembly</b></th>
                     
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
    scrollX: true,
    //scrollY: '60vh',
    scrollCollapse: true,
    ordering: false,
    searching: true,
    info: false,
  });
</script>


    
  