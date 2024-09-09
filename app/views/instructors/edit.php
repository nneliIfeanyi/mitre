<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/top.php'; ?>
<?php require APPROOT . '/views/inc/admin/sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row text-primary mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">You are editing <span class="font-weight-bold text-muted"><?= $data['student']->name; ?></span></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
      <div class="col-12 card card-body">
        <div class="row">
          <div class="h3 col-lg-6"><?php flash('msg') ?></div>
        </div>
        <form action="#" method="post" id="editInstructor">

          <div class="row border p-2">
            <div class="col-lg-4">
              <?php if (empty($data['student']->photo)) : ?>
                <div class="p-3">
                  <img src="<?= URLROOT; ?>/pics/user.jpg" style="height: 80px;width: 100px;" class="img-fluid" alt="profile_photo">
                </div>
              <?php else : ?>
                <div class="" style="height: 200px;">
                  <img src="<?= URLROOT; ?>/<?= $data['student']->photo; ?>" alt="profile_photo">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-lg-8">
              <div class="form-group mb-3 shadow p-3">
                <label>Fullname <span class="font-weight-light" style="font-size:12px">(surname first)</span></label>
                <input type="text" required data-parsley-pattern="^[a-zA-Z' ]+$" data-parsley-trigger="keyup" name="fullname" class="form-control form-control-lg" value="<?php echo $data['student']->name; ?>">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group mb-3 shadow p-3">
                <label>Gender:</label>
                <select name="gender" data-parsley-trigger="change" class="form-control">
                  <option value="<?= $data['student']->gender; ?>"><?= $data['student']->gender; ?></option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group mb-3 shadow p-3">
                <label>Zone:</label>
                <select name="zone" required data-parsley-trigger="change" class="form-control">
                  <option value="<?= $data['student']->zone; ?>"><?= $data['student']->zone; ?></option>
                  <option value="Ufuma">Ufuma</option>
                  <option value="Minna">Minna</option>
                  <option value="Kaduna">Kaduna</option>
                </select>
              </div>
            </div>


            <div class="col-lg-6">
              <div class="form-group mb-3 shadow p-3">
                <label>Mobile Phone:</label>
                <input type="number" name="phone" required data-parsley-length="[10, 11]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['student']->phone; ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group mb-3 shadow p-3">
                <label>Whatsapp Phone:</label>
                <input type="number" name="whatsapp" data-parsley-length="[10, 11]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['student']->whatsapp; ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group mb-3 shadow p-3">
                <label>Telegram:</label>
                <input type="number" name="telegram" data-parsley-length="[0, 11]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['student']->telegram; ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group mb-3 shadow p-3">
                <label>Email:</label>
                <input type="email" name="email" data-parsley-type="email" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['student']->email; ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group mb-3 shadow p-3">
                <label>Detailed Address</label>
                <input type="text" name="address" required class="form-control form-control-lg" value="<?php echo $data['student']->address; ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group mb-3 shadow p-3">
                <label>Area of Ministry:</label>
                <input type="text" name="ministry" class="form-control form-control-lg" value="<?php echo $data['student']->ministry; ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group mb-3 shadow p-3">
                <label>Secular Occupation(<span class="font-weight-light" style="font-size:15px">If any</span>):</label>
                <input type="text" name="occupation" class="form-control form-control-lg" value="<?= $data['student']->occupation; ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group mb-3 shadow p-3">
                <label>Local Assembly:</label>
                <input type="text" name="assembly" class="form-control form-control-lg" value="<?= $data['student']->assembly; ?>">
              </div>
            </div>
          </div>
        </form>
        <div class="d-flex justify-content-around">
          <div class="my-3">
            <input type="submit" form="editInstructor" id="submit" disabled class="btn btn-primary btn-block rounded-5 fw-bold" value="Save Changes">
          </div>

          <div class="my-3">
            <a href="javascript:void()" class="btn btn-dark">Update Photo</a>
          </div>
          <div class="my-3">
            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
              <i class="fas fa-trash"></i>
              Delete Entry
            </button>
          </div>
          <div class="my-3">
            <a href="<?php echo URLROOT; ?>/admin/instructors" class="btn btn-outline-dark"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
          </div>
        </div>
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
            <form action="<?php echo URLROOT; ?>/instructors/delete/<?php echo $data['student']->id; ?>" method="post">
              <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Yes, Continue</button>
            </form>
          </div>
        </div>
      </div>
    </div>


  </div><!-- /.container-fluid -->
</div>
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
<script>
  $('#register_form').parsley();
</script>