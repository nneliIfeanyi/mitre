<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/top.php'; ?>
<?php require APPROOT . '/views/inc/admin/sidebar.php'; ?>
<?php if ($data['set'] == JUNIOR ): 
$set = $data['set'];
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registered Students Set <span class="badge bg-primary"><?= $data['set']?></span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
              <li class="breadcrumb-item active">Add Students</li>
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
  <div class="row">
    <div class="col-12">
      
      <!-- <div class="text-center border py-3">
        <h2>Ministers Improvement And Training Retreat<span class="text-primary"> (MITRE)</span></h2>
        <p class="lead fs-6">Thresher's Team P.O. Box 7332, Kaduna 062245471</p>
          <div class="h2 text-primary">SET 16 REGISTRATION</div>
        <!-- <p>This form should be completed and submitted on or before 13 FEB. 2024</p> --
        
      </div> -->
      <p class="lead"><?php flash('msg')?></p>
      <form action="" method="post" id="register_form">

        <div class="row border p-2">
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Surname:</label>
              <input type="text" required data-parsley-pattern="^[a-zA-Z' ]+$" data-parsley-trigger="keyup" name="surname" class="form-control form-control-lg" value="<?php echo $data['surname']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Other Name:</label>
              <input type="text" required data-parsley-pattern="^[a-zA-Z' ]+$" data-parsley-trigger="keyup" name="other_names" class="form-control form-control-lg" value="<?php echo $data['other_names']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Gender:</label>
              <select name="gender" required data-parsley-trigger="change" class="form-select">
                <option value="">----</option>
                <option value="male">Male</option>
                <option value="female">Female</option> 
              </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Set:</label>
              <select name="set" class="form-select">
                <option value="<?= $set?>"><?= $set?></option>
              </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Zone:</label>
              <select name="zone" required data-parsley-trigger="change" class="form-select">
                <option value="">----</option>
                <option value="Ufuma">East</option>
                <option value="Minna">Niger</option>
                <option value="Kaduna">Kaduna</option>
              </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Residence|Office Address</label>
              <input type="text" name="address" required data-parsley-pattern="^[a-zA-Z',0-9. ]+$" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['address']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>State of Residence:</label>
              <select name="state" class="form-select">
                <option value="">----</option>
                 <?php foreach ($data['states'] as $states):?>
                  <option value="<?php echo $states->state;?>"><?php echo $states->state;?></option>
                 <?php endforeach;?>
            </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Mobile Phone:</label>
              <input type="number" name="phone" required data-parsley-length="[10, 11]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['phone']; ?>">
              <span class="error"><?= $data['error'] ?></span>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Whatsapp Phone:</label>
              <input type="number" name="whatsapp" data-parsley-length="[10, 11]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['whatsapp']; ?>">
            </div>
          </div>
          <!-- <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Telegram:</label>
              <input type="number" name="telegram" data-parsley-length="[0, 11]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['telegram']; ?>">
            </div>
          </div> -->
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Email:</label>
              <input type="email" name="email" data-parsley-type="email" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['email']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Area of Ministry:</label>
              <input type="text" name="ministry" data-parsley-pattern="^[a-zA-Z' ,.]+$" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['ministry']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Occupation:</label>
              <input type="text" name="occupation" required data-parsley-pattern="^[a-zA-Z',. ]+$" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['occupation']; ?>">
            </div>
          </div>
          <div class="col-12">
            <div class="form-group mb-3 shadow p-3">
              <label>Local Assembly:</label>
              <input type="text" name="assembly" required data-parsley-pattern="^[a-zA-Z',. ]+$" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['assembly']; ?>">
            </div>
          </div>

          <div class=" d-grid col-md-6 offset-md-3 my-3">
            <!-- <button type="submit" id="submit" class="btn btn-primary rounded-5 fw-bold"><i class="fa fa-paper-plane fa-2x" aria-hidden="true"></i> Submit</button> -->
            <input type="submit" id="submit" class="btn btn-primary btn-block rounded-5 fw-bold" value="Register">
          </div>
          <div class="mt-3" id="msg"></div>
        </div>
      </form>
    </div>
  </div>
</div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php elseif($data['set'] == SENIOR):
$set = $data['set'];
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Register Students Set <span class="badge bg-primary"><?= $data['set']?></span></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
                <li class="breadcrumb-item active">Add Students</li>
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
  <div class="row">
    <div class="col-12">
      
      <!-- <div class="text-center border py-3">
        <h2>Ministers Improvement And Training Retreat<span class="text-primary"> (MITRE)</span></h2>
        <p class="lead fs-6">Thresher's Team P.O. Box 7332, Kaduna 062245471</p>
          <div class="h2 text-primary">SET 16 REGISTRATION</div>
        <!-- <p>This form should be completed and submitted on or before 13 FEB. 2024</p> --
        <p class="lead"><?php flash('msg')?></p>
      </div> -->
    <p class="lead"><?php flash('msg')?></p>
      <form action="" method="post" id="register_form">

        <div class="row border p-2">
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Surname:</label>
              <input type="text" required data-parsley-pattern="^[a-zA-Z' ]+$" data-parsley-trigger="keyup" name="surname" class="form-control form-control-lg" value="<?php echo $data['surname']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Other Name:</label>
              <input type="text" required data-parsley-pattern="^[a-zA-Z' ]+$" data-parsley-trigger="keyup" name="other_names" class="form-control form-control-lg" value="<?php echo $data['other_names']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Gender:</label>
              <select name="gender" required data-parsley-trigger="change" class="form-select">
                <option value="">----</option>
                <option value="male">Male</option>
                <option value="female">Female</option> 
              </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Set:</label>
              <select name="set" class="form-select">
                <option value="<?= $set?>"><?= $set?></option>
              </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Zone:</label>
              <select name="zone" required data-parsley-trigger="change" class="form-select">
                <option value="">----</option>
                <option value="Ufuma">East</option>
                <option value="Minna">Niger</option>
                <option value="Kaduna">Kaduna</option>
              </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Residence|Office Address</label>
              <input type="text" name="address" required data-parsley-pattern="^[a-zA-Z',0-9. ]+$" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['address']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>State of Residence:</label>
              <select name="state" class="form-select">
                <option value="">----</option>
                 <?php foreach ($data['states'] as $states):?>
                  <option value="<?php echo $states->state;?>"><?php echo $states->state;?></option>
                 <?php endforeach;?>
            </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Mobile Phone:</label>
              <input type="number" name="phone" required data-parsley-length="[10, 11]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['phone']; ?>">
              <span class="error"><?= $data['error'] ?></span>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Whatsapp Phone:</label>
              <input type="number" name="whatsapp" data-parsley-length="[10, 11]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['whatsapp']; ?>">
            </div>
          </div>
          <!-- <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Telegram:</label>
              <input type="number" name="telegram" data-parsley-length="[0, 11]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['telegram']; ?>">
            </div>
          </div> -->
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Email:</label>
              <input type="email" name="email" data-parsley-type="email" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['email']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Area of Ministry:</label>
              <input type="text" name="ministry" data-parsley-pattern="^[a-zA-Z' ,.]+$" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['ministry']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Occupation:</label>
              <input type="text" name="occupation" required data-parsley-pattern="^[a-zA-Z',. ]+$" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['occupation']; ?>">
            </div>
          </div>
          <div class="col-12">
            <div class="form-group mb-3 shadow p-3">
              <label>Local Assembly:</label>
              <input type="text" name="assembly" required data-parsley-pattern="^[a-zA-Z',. ]+$" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['assembly']; ?>">
            </div>
          </div>

          <div class=" d-grid col-md-6 offset-md-3 my-3">
            <!-- <button type="submit" id="submit" class="btn btn-primary rounded-5 fw-bold"><i class="fa fa-paper-plane fa-2x" aria-hidden="true"></i> Submit</button> -->
            <input type="submit" id="submit" class="btn btn-primary btn-block rounded-5 fw-bold" value="Register">
          </div>
          <div class="mt-3" id="msg"></div>
        </div>
      </form>
    </div>
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
   $('#register_form').parsley();
</script>

