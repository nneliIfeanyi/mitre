<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/top.php'; ?>
<?php require APPROOT . '/views/inc/admin/sidebar.php'; ?>
<?php if ($data['set'] == JUNIOR ): ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Minna Students Set <span class="badge bg-primary"><?= $data['set']?></span></h1>
            <p>A Total of <span class="text-primary"><?php echo $this->databaseModel->totalMinna($data['set']);?></span> Registered</p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
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
<?php //EVERYTHING GOES HERE, Start coding from here.?>

<div class="card card-body">
  <nav>
    <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist" style="font-weight: bold;">
      <a href="<?php echo URLROOT?>/admin/kaduna/<?php echo $data['set']?>" class="active nav-link" 
          id="nav-kaduna-tab" 
          type="button" role="tab" >Kaduna Zone
      </a>
      <a href="<?php echo URLROOT?>/admin/ufuma/<?php echo $data['set']?>" class="nav-link" 
          id="nav-ufuma-tab" 
          type="button" role="tab" >Ufuma Zone
      </a>
      <a href="<?php echo URLROOT?>/admin/minna/<?php echo $data['set']?>" class="nav-link" 
          id="nav-minna-tab" 
          type="button" role="tab" >Minna Zone
      </a>
      <a href="<?php echo URLROOT?>/admin/students/<?php echo $data['set']?>" class=" nav-link" 
          id="nav-collective-tab" 
          type="button" role="tab" >Collective
      </a>
    </div>
  </nav>
<h3 class="text-primary"><?php flash('del_msg'); ?></h3>
<div class="table-responsive">
        <table class="table table-striped" id="eg">
            <thead>
              <tr class="">
                 <th>S/N</th>
                 <th>Name</th>
                 <th>Reg_No</th>
                 <th>Phone</th>
                 <th>WhatsApp_num</th>
                 <th>Address</th>
                 <th>Church</th>
                 <th>Occupation</th>
                 <th>Action</th>
               </tr>
            </thead>

             <tbody>
             <?php $numbering = 1; foreach($data['students'] as $student) : ?>
              <tr>
                  <td><?php echo $numbering;?></td>
                  <td><?php echo $student->fullname?></td>
                  <td><?php echo $student->admsn_no?></td>
                  <td><?php echo $student->mobile_num?></td>
                  <td><a href="https://wa.me/<?= $student->whatsApp_num;?>" class="btn btn-sm"><i class="fab fa-whatsapp" aria-hidden="true"></i> <?php echo $student->whatsApp_num?></a></td>
                  <td><?php echo $student->address?></td>
                  <td><?php echo $student->church?></td>
                  <td><?php echo $student->occupation?></td>
                  <td><a class="" href="<?php echo URLROOT; ?>/admin/more_details/<?php echo $student->id; ?>">More</a></td>

              </tr>
              <?php $numbering++; endforeach; ?>
             </tbody>
             <tfoot>
             <tr class="">
                 <th>S/N</th>
                 <th>Name</th>
                 <th>Reg_No</th>
                 <th>Phone</th>
                 <th>WhatsApp_num</th>
                 <th>Address</th>
                 <th>Church</th>
                 <th>Occupation</th>
                 <th>Action</th>
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
<?php elseif($data['set'] == SENIOR):?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">All Minna Students Set <span class="badge bg-primary"><?= $data['set']?></span></h1>
            <p>A Total of <span class="text-primary"><?php echo $this->databaseModel->totalMinna($data['set']);?></span> Registered</p>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
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
          <?php //EVERYTHING GOES HERE, Start coding from here.?>

  <div class="card card-body">
    <nav>
      <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist" style="font-weight: bold;">
        <a href="<?php echo URLROOT?>/admin/kaduna/<?php echo $data['set']?>" class="active nav-link" 
            id="nav-kaduna-tab" 
            type="button" role="tab" >Kaduna Zone
        </a>
        <a href="<?php echo URLROOT?>/admin/ufuma/<?php echo $data['set']?>" class="nav-link" 
            id="nav-ufuma-tab" 
            type="button" role="tab" >Ufuma Zone
        </a>
        <a href="<?php echo URLROOT?>/admin/minna/<?php echo $data['set']?>" class="nav-link" 
            id="nav-minna-tab" 
            type="button" role="tab" >Minna Zone
        </a>
        <a href="<?php echo URLROOT?>/admin/students/<?php echo $data['set']?>" class="nav-link" 
            id="nav-collective-tab" 
            type="button" role="tab" >Collective
        </a>
      </div>
    </nav>
  <h3 class="text-primary"><?php flash('del_msg'); ?></h3>
        <div class="table-responsive">
          <table class="table table-striped" id="eg">
            <thead>
              <tr class="">
                 <th>S/N</th>
                 <th>Name</th>
                 <th>Reg_No</th>
                 <th>Phone</th>
                 <th>WhatsApp_num</th>
                 <th>Address</th>
                 <th>Church</th>
                 <th>Occupation</th>
                 <th>Action</th>
               </tr>
            </thead>

             <tbody>
             <?php $numbering = 1; foreach($data['students'] as $student) : ?>
              <tr>
                  <td><?php echo $numbering;?></td>
                  <td><?php echo $student->fullname?></td>
                  <td><?php echo $student->admsn_no?></td>
                  <td><?php echo $student->mobile_num?></td>
                  <td><a href="https://wa.me/<?= $student->whatsApp_num;?>" class="btn btn-sm"><i class="fab fa-whatsapp" aria-hidden="true"></i> <?php echo $student->whatsApp_num?></a></td>
                  <td><?php echo $student->address?></td>
                  <td><?php echo $student->church?></td>
                  <td><?php echo $student->occupation?></td>
                  <td><a class="" href="<?php echo URLROOT; ?>/admin/more_details/<?php echo $student->id; ?>">More</a></td>

              </tr>
              <?php $numbering++; endforeach; ?>
             </tbody>
             <tfoot>
             <tr class="">
                 <th>S/N</th>
                 <th>Name</th>
                 <th>Reg_No</th>
                 <th>Phone</th>
                 <th>WhatsApp_num</th>
                 <th>Address</th>
                 <th>Church</th>
                 <th>Occupation</th>
                 <th>Action</th>
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


<?php endif ?>
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>

<script>
  new DataTable('#eg', {
    layout: {
        topStart: {
            buttons: [
                {
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
                    messageTop:'All Minna Students Set <?= $data['set']?>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'print',
                    messageTop:'All Minna Students Set <?= $data['set']?>',
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