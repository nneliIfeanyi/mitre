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
            <div class="col-12 col-md-8 col-lg-6 p-5">
              <a href="<?php echo URLROOT;?>/<?php echo $data['student']->passport;?>" download="<?php echo $data['student']->fullname?>">
                <img src="<?php echo URLROOT .'/'. $data['student']->passport?>" alt="profile-pic" class="rounded-circle" style="height: 250px;width:100%;">
                </a>
            </div>
       
          
            <div class="col-md-6">
              <div class="row">
                <div class="col-12 shadow p-2">
                  <p class="bg-light badge text-dark">Full Name</p>
                <input type="text" name="fullname" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['student']->fullname?>">
                <span class="invalid-feedback"></span> 
                </div>

                <div class="col-md-2 col-6 mb-3 shadow p-2">
                  <p class="bg-light badge text-dark">mitre set</p>
                  <input disabled type="text" name="mitre_set" class="form-control form-control-lg" value="<?php echo $data['student']->mitre_set ;?>"> 
                </div>
                <div class="col-md-3 col-6 mb-3 shadow p-2">
                  <p class="bg-light badge text-dark">mitre zone</p>
                  <input disabled type="text" name="zone" class="form-control form-control-lg" value="<?php echo $data['student']->zone ;?>"> 
                </div>
                <div class="col-md-7 mb-3 shadow p-2">
                  <p class="bg-light badge text-dark">Mobile number</p>
                  <input type="number"  name="mobile_num" class="form-control form-control-lg " value="<?php echo $data['student']->mobile_num; ?>">
                </div> 

                <div class="col-md-6 mb-3 shadow p-2">
                  <p class="bg-light badge text-dark">WhatsApp number</p>
                  <input type="number" name="whatsapp_num" class="form-control form-control-lg" value="<?php echo $data['student']->whatsApp_num; ?>">
                </div>
                <div class="col-md-6 mb-3 shadow p-2">
                  <p class="bg-light badge text-dark">Working experience (ocupation)</p>
                  <input  type="text" name="occupation" class="form-control form-control-lg" value="<?php echo $data['student']->occupation; ?>">
                </div>

                <div class="col-12 mb-3 shadow p-2">
                  <p class="bg-light badge text-dark">Local Assembly</p>
                  <input name="church" class="form-control form-control-lg" value="<?php echo $data['student']->church; ?>">
                </div>

                
                <div class="col-12 mb-3 shadow p-2">
                  <p class="bg-light badge text-dark">Contact Address</p>
                  <input type="text" name="address" class="form-control form-control-lg" value="<?php echo $data['student']->address ;?>">
                </div> 
              </div>
            </div>
      </div>
        <div class="d-flex justify-content-between flex-wrap">
          <div class="">
            <p class="px-2"><input type="submit" name="submit" class="btn btn-primary" value="Update Details"></p>
          </div>

          
          <div class="">
            <button class="btn btn-danger" 
              data-toggle="modal" data-target="#deleteModal">
              <i class="fas fa-trash"></i> 
              Delete this candidate
            </button>
          </div>

          <div class="">
            <p class="px-2"><a href="<?php echo URLROOT;?>/admin/<?= $data['student']->zone;?>/<?= $data['student']->mitre_set;?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a></p>
          </div>
        </div> 
      </form>
      <hr>

        <!--Delete post Modal -->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
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