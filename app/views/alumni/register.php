<?php require APPROOT . '/views/inc/alumni/header.php'; ?>
<div class="container">
  <div class="row">
    <div class="col-12">
      
      <div class="text-center border py-3">
        <h2>Ministers Improvement And Training Retreat<span class="text-primary"> (MITRE)</span></h2>
        <p class="lead fs-6">Thresher's Team P.O. Box 7332, Kaduna 062245471</p>
          <div class="h2 text-primary">MARCH 2024 ALUMNI REGISTRATION</div>
        <!-- <p>This form should be completed and submitted on or before 13 FEB. 2024</p> -->
      </div>

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
              <label>Other Names:</label>
              <input type="text" required data-parsley-pattern="^[a-zA-Z' ]+$" data-parsley-trigger="keyup" name="other_names" class="form-control form-control-lg" value="<?php echo $data['other_names']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Gender:</label>
              <select name="gender" data-parsley-trigger="change" class="form-select">
                <option value="">----</option>
                <option value="male">Male</option>
                <option value="female">Female</option> 
              </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Zone:</label>
              <select name="zone" data-parsley-trigger="change" class="form-select">
                <option value="">----</option>
                <option value="East">East</option>
                <option value="Niger">Niger</option>
                <option value="Kaduna">Kaduna</option>
                <option value="Southern_Kaduna">Southern Kaduna</option>
                <option value="Zaria">Zaria</option>
                <option value="Gombe">Gombe</option>
                <option value="others">Others</option>
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
              <select name="state" data-parsley-trigger="change" class="form-select">
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
              <input type="number" name="phone" required data-parsley-length="[0, 11]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['phone']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Whatsapp Phone:</label>
              <input type="number" name="whatsapp" data-parsley-length="[0, 11]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['whatsapp']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3 shadow p-3">
              <label>Telegram:</label>
              <input type="number" name="telegram" data-parsley-length="[0, 11]" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['telegram']; ?>">
            </div>
          </div>
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
              <input type="text" name="occupation" data-parsley-pattern="^[a-zA-Z',. ]+$" data-parsley-trigger="keyup" class="form-control form-control-lg" value="<?php echo $data['occupation']; ?>">
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

<!-- FOOTER HERE -->
<div class="bg-dark  px-2 py-3 mt-1">
  <div class="row">
    <div class="col-md-6 shadow">
        <h2 class="h4 text-light">Inquiries</h2>
        <ul class="list-unstyled text-light footer-link-list">
            <li>
            <i class="fa fa-envelope fa-fw"></i>
            <a style="text-decoration:none;color:antiquewhite;" href="mailto:mitreaffairs@gmail.com">mitreaffairs@gmail.com</a>
            </li>
        </ul>
    </div>

    <div class="col-md-6 pt-3 ">
      <div class="text-center">
        <p class="lead fs-6 text-light">Copyright &copy; <?php echo date('Y');?> <span class="text-white fst-italic fw-semibold">Threshers Team</span>
        <br>
        <span class=""> All Rights Reserved</span></p>
      </div>  
    </div>
  </div>
</div>
  
<?php require APPROOT . '/views/inc/alumni/footer.php'; ?>