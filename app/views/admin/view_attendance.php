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
          <h1 class="m-0">Recorded Attendance for <span class="text-muted"><span class="text-primary">(</span><?php echo $data['zone']?> Set <span class="badge bg-primary"><?php echo $data['set']?></span><span class="text-primary">)</span> Conclave <?php echo $data['conclave']?></span></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
            <li class="breadcrumb-item active">Attendance Sorting</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
 <form action="<?php echo URLROOT;?>/admin/sorting" method="POST" id="mark-add">
          <div class="row">
          <div class="col-md-4">
            <div class="form-group shadow p-1">
              <label>Set:</label>
              <select name="set" required class="form-control">
                <option value="">Select set</option>
                <option value="<?= SENIOR?>"><?= SENIOR?></option>
                <option value="<?= JUNIOR?>"><?= JUNIOR?></option> 
              </select>
            </div>
          </div>
          <div class="col-md-4">
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
          <div class="col-md-4">
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
    <div class="card">
      <div class="card-body">
        <p class="h4 p-2 shadow-sm">A total of <span class="font-weight-bold"><?= $data['count'];?></span> students attended this conclave.</p>
        <div class="table-responsive">
        <table class="table table-striped " id="eg">
          <div class="row"><div class="col-lg-6"><?php flash('msg');?></div></div>
          <thead>
            <tr class="text-primary">
              <th>#</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Reg_no</th>
              <th>Phone</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
          <?php $numbering = 1; foreach($data['scores'] as $student) : 
            $info = $this->userModel->getUserById($student->std_id);
          ?>
          <tr>
            <td><?php echo $numbering;?></td>
            
            <td class="font-weight-bold">
               <?php if(empty($info->passport)):?>
                <img src="<?= URLROOT; ?>/pics/user.jpg" alt="image" class="rounded-circle" width="90" height="90">
               <?php else:?>
                <img src="<?= URLROOT; ?>/<?php echo $info->passport;?>" class="rounded-circle" alt="image" width="90" height="90">
               <?php endif;?>
            </td>
            <td class="font-weight-bold"><?php echo $info->fullname;?></td>
            <td class="font-weight-bold"><?php echo $info->admsn_no;?></td>
            <td class="font-weight-bold"><?php echo $info->mobile_num;?></td>
            <td class="font-weight-bold text-success">Present</td>
            <td class="d-flex">
              <a href="<?= URLROOT;?>/admin/more_details/<?= $info->id;?>">Edit</a>
            </td>
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
  new DataTable('#eg', {
    caption:"Recorded Attendance for <?php echo $data['zone']?> Set <?php echo $data['set']?> Conclave <?php echo $data['conclave']?>",
    paging:false,
    ordering:false,
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel',
              { extend:'pdf',
                messageTop:'Recorded Attendance for <?php echo $data['zone']?> zone Set <?php echo $data['set']?> Conclave <?php echo $data['conclave']?>',
                messageBottom:null
              },
              { extend:'print',
                messageTop:'Recorded Attendance for <?php echo $data['zone']?> zone Set <?php echo $data['set']?> Conclave <?php echo $data['conclave']?>',
                messageBottom:null
              }]
        }
    }
});
</script>
    