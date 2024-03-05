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
            <h1 class="m-0">Edit details for <span class="text-muted"><?php echo $data['student']->fullname?></span></h1>
            <p></p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<section class="content">
  <div class="container-fluid">
    <div class="row"><h4 class="col-md-6"><?= flash('msg') ?></h4></div>
    <div class="card card-body">
    <form action="" method="POST" id="details">
        <div class="row">
            <!-- <div class="col-12">
                <img src="<?php echo URLROOT .'/'. $data['student']->passport?>" alt="profile-pic" class="rounded-circle" style="height: 350px;width:100%;">
            </div> -->
       
          
            <div class="col-md-6 mb-3 shadow p-2">
                <p class="bg-light badge text-dark">Full Name</p>
                <input type="text" name="fullname" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['student']->fullname?>">
                <span class="invalid-feedback"></span> 
            </div>

            <div class="col-md-3 mb-3 shadow p-2">
                <p class="bg-light badge text-dark">mitre set</p>
                <input disabled type="text" name="mitre_set" class="form-control form-control-lg" value="<?php echo $data['student']->mitre_set ;?>"> 
            </div>
            <div class="col-md-3 mb-3 shadow p-2">
                <p class="bg-light badge text-dark">mitre zone</p>
                <input disabled type="text" name="zone" class="form-control form-control-lg" value="<?php echo $data['student']->zone ;?>"> 
            </div>
          
      
          <div class="col-md-6 mb-3 shadow p-2">
            <p class="bg-light badge text-dark">Mobile number</p>
            <input type="number"  name="mobile_num" class="form-control form-control-lg " value="<?php echo $data['student']->mobile_num; ?>">
        
          </div> 

          <div class="col-md-6 mb-3 shadow p-2">
            <p class="bg-light badge text-dark">WhatsApp number</p>
            <input type="number" name="whatsapp_num" class="form-control form-control-lg" value="<?php echo $data['student']->whatsApp_num; ?>">
          </div> 
    

          <div class="col-md-5 mb-3 shadow p-2">
            <p class="bg-light badge text-dark">Working experience (ocupation)</p>
            <input  type="text" name="occupation" class="form-control form-control-lg" value="<?php echo $data['student']->occupation; ?>">
          </div>
          <div class="col-md-7 mb-3 shadow p-2">
            <p class="bg-light badge text-dark">Contact Address</p>
            <input type="text" name="address" class="form-control form-control-lg" value="<?php echo $data['student']->address ;?>">
          </div> 
        
       <!--  <div class="row shadow border mx-1 pt-2 pb-4">
          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">Referals name</p>
            <input disabled type="text" name="ref_name" class="form-control form-control-lg" value="<?php echo $data['student']->refered_by; ?>">
          </div>
          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">Referals phone number</p>
            <input disabled type="number" name="ref_phone" class="form-control form-control-lg" value="<?php echo $data['student']->phone; ?>">
          </div>
          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">Referals address</p>
            <input disabled type="text" name="ref_address" class="form-control form-control-lg" value="<?php echo $data['student']->address_2; ?>">
          </div>
          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">Contact duration : specific info</p>
            <input disabled type="text" name="ref_duration" class="form-control form-control-lg" value="<?php echo $data['student']->relationship; ?>">
          </div>
        </div> -->
      </div>
        <div class="row my-3">
          <div class="col-md-4 mb-2">
          <input type="submit" name="submit" class="btn btn-primary" value="Update Details">
          </div>
        <div class="col-md-4 mb-2">
          <a href="https://wa.me/<?= $data['student']->whatsApp_num;?>" class="btn btn-success btn-sm"><i class="fab fa-whatsapp" aria-hidden="true"></i> Send WhatsApp Message</a>
          </div>

          <div class="col-4 mb-2">
          <a href="<?php echo URLROOT;?>/admin/<?= $data['student']->zone;?>/<?= $data['student']->mitre_set;?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
          </div>
        </div> 
      </form>
      <hr>
      <div class="row mt-5">
        <div class="col-md-6 border border-light">
          <p class="h5 py-2 fw-bold">Danger Zone</p>
              <button class="btn btn-danger" 
                data-toggle="modal" data-target="#deleteModal">
                <i class="fas fa-trash"></i> 
                Delete this candidate
              </button>
          <p class="fs-6">This action cannot be reversed...</p>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
        <form action="<?php echo URLROOT; ?>/admin/delete/<?php echo $data['student']->id; ?>" method="post">
          <input type="hidden" name="zone" value="<?php echo $data['student']->zone; ?>">
          <input type="hidden" name="mitre_set" value="<?php echo $data['student']->mitre_set; ?>">
          <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Yes, Continue</button>
        </form>
      </div>
    </div>
  </div>
</div>
      </div>
    </div>
  </section>
</div>
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>