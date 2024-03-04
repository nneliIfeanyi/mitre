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
            <h1 class="m-0">Upload Media</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
              <li class="breadcrumb-item active">Media</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="">
  <form action="<?= URLROOT;?>/admin/media" method="POST" enctype="multipart/form-data" id="media">
    <h3><?php flash('msg');?></h3>
      <div class="row">
          <div class="col-lg-3">
            <div class="form-group shadow p-1">
              <label>Set:</label>
              <select name="mitre_set" id="set" required class="form-control">
                <option value="">Select set</option>
                <option value="<?= SENIOR?>"><?= SENIOR?></option>
                <option value="<?= JUNIOR?>"><?= JUNIOR?></option> 
              </select>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group shadow p-1">
              <label>Conclave:</label>
               <select name="conclave" required class="form-control">
                  <option value="">Select conclave</option>
                  <?php foreach ($data['conclaves'] as $conclave):?>
                    <option value="<?php echo $conclave->conclave;?>"><?php echo $conclave->conclave;?></option>
                   <?php endforeach;?>
                </select>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group shadow p-1">
              <label>Slot:</label>
              <select name="slot" required class="form-control">
                <option value=""><b>---</b></option>
                <option value="Basic Doctrine">Basic Doctrine</option>
                <option value="P.P.M.">P.P.M.</option>
                <option value="Spiritual Man">Spiritual Man</option>
                <option value="Discipleship">Discipleship</option>
                <option value="Church History">Church History</option>
                <option value="Spiritual Leadership">Spiritual Leadership</option>
                <option value="Ministers Home">Minister's Home</option>
                <option value="Man Of God">Man Of God</option>
                <option value="Long_paper Briefing">Long_paper Briefing</option>
                <option value="Term_paper Briefing">Term_paper Briefing</option>
                 <option value="Long_paper Debrief">Long_paper Debrief</option>
                <option value="Term_paper Debrief">Term_paper Debrief</option>
                <option value="Summary">Summary</option>
                <option value="Talk 1">Talk 1</option>
                <option value="Talk 2">Talk 2</option>
                <option value="Talk 3">Talk 3</option>
              </select>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group shadow p-2">
              <label>Audio:</label>
              <input type="file" name="media" required class="">
            </div>
          </div>
          <div class=" d-grid col-md-3 mt-2 mb-5">
            <input type="submit" id="mark" class="btn btn-primary btn-block rounded-5 fw-bold" value="Upload Media">
          </div>
          
        </div>
      </form>
      <div class="card card-info">
        <div class="card-header">
          <h4 class="card-title font-weight-bold">Uploaded Media</h4>
        </div>
   
      <div class="p-2">
        <table class="table table-striped" id="eg">
            <thead>
               <tr class="">
                 <th>#</th>
                 <th><b>Slot</b></th>
                 <th><b>Set</b></th>
                 <th><b>Conclave</b></th>
                 <th><b>Action</b></th>
               </tr>
            </thead>

             <tbody>
             <?php $num = 1; foreach($data['media'] as $media):?>
              <tr>
               <td><?= $num?></td>
               <td><?= $media->slot?></td>
               <td><?= $media->mitre_set?></td>
               <td><?= $media->conclave?></td> 
               <td class="d-flex">
                 
                 <button class="btn btn-sm" data-toggle="tooltip" data-title="Play">
                  <i class="fas fa-play text-success"></i>
                 </button>
                 <form action="<?php echo URLROOT?>/admin/del_media/<?php echo $media->id;?>"  method="POST">
                   <button type="submit" class="btn btn-sm" data-toggle="tooltip" data-title="Delete">
                      <i class="fas fa-trash text-danger"></i>
                    </button>
                  </form>
               </td>
              </tr>
            <?php $num++; endforeach;?>
             </tbody>
          </table>
        </div>
    </div>

    <!--Delete post Modal -->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash text-danger"></i> This Action cannot be reveresed..</h5>
       <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        This Action cannot be reveresed..
        <p class="lead">Do you wish to Continue?</p>
      </div>
      <div class="modal-footer d-flex justify-content-around">
        <button type="button" class="btn btn-secondary float-start" data-bs-dismiss="modal">&times; Close</button>
        <form class="float-end" action="<?php echo URLROOT; ?>/admin/del_media/<?php echo $media->id; ?>" method="post">
          <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Yes, Continue</button>
        </form>
      </div>
    </div>
  </div>
</div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
<script>
    $('#media').parsley();
</script>

<script type="text/javascript">
  new DataTable('#eg', {
    //scrollX: true,
    //scrollY: '60vh',
    //scrollCollapse: true,
   ordering: true,
   // searching: false,
   // info: false,
   // paging:false,
  });
</script>



