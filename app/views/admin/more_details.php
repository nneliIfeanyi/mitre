<?php require APPROOT . '/views/inc/header2.php'; ?>
<div class="container-fluid">

<div class="">
<form">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <img src="<?php echo URLROOT .'/'. $data['student']->passport?>" alt="profile-pic" class="rounded-circle" style="height: 350px;width:100%;">
            </div>
        </div>
            
        <!-- Names Row -->
        <div class="row pt-2 pb-4">
        <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">Full Name</p>
            <input type="text" name="surname" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['student']->fullname?>">
            <span class="invalid-feedback"></span> 
        </div>

        <div class="col-md-4 mb-3">
            <p class="bg-light badge text-dark">Age : Gender : Marital stutus</p>
            <input type="text" name="surname" class="form-control form-control-lg" value="<?php echo $data['student']->info ;?>"> 
        </div>

        <div class="col-4 mb-3">
            <p class="bg-light badge text-dark">mitre set</p>
            <input type="text" name="surname" class="form-control form-control-lg" value="<?php echo $data['student']->mitre_set ;?>"> 
        </div>

          <div class="col-8 mb-3">
            <p class="bg-light badge text-dark">State of residence</p>
            <input type="text" name="surname" class="form-control form-control-lg" value="<?php echo $data['student']->s_o_r ;?>">
          </div> 
          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">Contact Address</p>
            <input type="text" name="surname" class="form-control form-control-lg" value="<?php echo $data['student']->address ;?>">
          </div> 
      
          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">Mobile number</p>
            <input type="number" required name="mobile_num" class="form-control form-control-lg " value="<?php echo $data['student']->mobile_num; ?>">
        
          </div> 

          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">WhatsApp number</p>
            <input type="number" name="whatsapp_num" class="form-control form-control-lg" value="<?php echo $data['student']->whatsApp_num; ?>">
          </div> 
    
          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">Church / Local Assembly : function in Church</p>
            <input type="text" name="church" class="form-control form-control-lg" value="<?php echo $data['student']->church ?>">
          </div>
          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">When born again : Holy Ghost Baptism</p>
            <input type="text" name="new_birth" class="form-control form-control-lg" value="<?php echo $data['student']->spiritual ?>">
            </div> 
    
          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">God's calling</p>
            <input type="text" name="call_sensed" class="form-control form-control-lg" value="<?php echo $data['student']->calling; ?>">
          </div>
          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">Already into God's calling : when </p>
            <input type="text" name="call_sensed" class="form-control form-control-lg" value="<?php echo $data['student']->into_call; ?>">
          </div>

          <div class="col-md-6 mb-3">
            <p class="badge text-dark bg-light">Attended MITRE before : Reason for MITRE</p>
           <input type="text" name="" class="form-control form-control-lg" value="<?php echo $data['student']->prior_attended; ?>">
          </div>

          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">Working experience (ocupation)</p>
            <input type="text" name="occupation" class="form-control form-control-lg" value="<?php echo $data['student']->occupation; ?>">
          </div>
 
          <div class="col-md-5 mb-3">
            <p class="bg-light badge text-dark">Languages spoken </p>
            <input type="text" name="lang_speak" class="form-control form-control-lg" value="<?php echo $data['student']->lang_speak; ?>">
          </div> 

          <div class="col-md-5 mb-3">
            <p class="bg-light badge text-dark">Languages written</p>
            <input type="text" name="lang_write" class="form-control form-control-lg" value="<?php echo $data['student']->lang_write; ?>">
          </div>
          <div class="col-md-2 mb-3">
            <p class="bg-light badge text-dark">Litracy</p>
            <input type="text" name="" class="form-control form-control-lg" value="<?php echo $data['student']->litracy; ?>">
          </div>
            <div class="col-md-6 mb-3">
                <p class="bg-light badge text-dark">Education:when:school</p>
                <input type="text" name="" class="form-control form-control-lg" value="<?php echo $data['student']->academics; ?>">
            </div>  
            </div>
          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">Spiritual oversight</p>
            <input type="text" name="discipler" class="form-control form-control-lg" value="<?php echo $data['student']->discipler; ?>">
          </div>
        </div>
        
        <div class="row shadow border mx-1 pt-2 pb-4">
          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">Referals name</p>
            <input type="text" name="ref_name" class="form-control form-control-lg" value="<?php echo $data['student']->refered_by; ?>">
          </div>
          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">Referals phone number</p>
            <input type="number" name="ref_phone" class="form-control form-control-lg" value="<?php echo $data['student']->phone; ?>">
          </div>
          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">Referals address</p>
            <input type="text" name="ref_address" class="form-control form-control-lg" value="<?php echo $data['student']->address_2; ?>">
          </div>
          <div class="col-md-6 mb-3">
            <p class="bg-light badge text-dark">Contact duration : specific info</p>
            <input type="text" name="ref_duration" class="form-control form-control-lg" value="<?php echo $data['student']->relationship; ?>">
          </div>
        </div>

        <div class="row my-3">
        <div class="col-md-6 mb-2">
          <a href="https://wa.me/<?= $data['student']->whatsApp_num;?>" class="btn btn-primary btn-sm"><i class="fab fa-whatsapp" aria-hidden="true"></i> Send WhatsApp Message</a>
          </div>

          <div class="col-6 mb-2">
          <a href="<?php echo URLROOT;?>/admin/all_registered" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
          </div>
        </div> 
      </form>
      <div class="row my-2">
        <div class="col-md-6 border shadow border-primary">
        <p class="h5 pt-1 fw-bold">Danger Zone</p>
            <form class="col-12" action="<?php echo URLROOT; ?>/admin/delete/<?php echo $data['student']->id; ?>" method="post">
                <input type="submit" class="btn btn-danger" value="Delete this candidate">
            </form>
        <p class="fs-6">This action cannot be reversed...</p>
        </div>
      
        </div>
</div>
</div> 

<?php require APPROOT . '/views/inc/footer.php'; ?>