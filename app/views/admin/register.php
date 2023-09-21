<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row border mb-5 pb-3">
  <div class="col-12">
    <div class="text-center">
      <h2>Ministers Improvement And Training Retreat<span class="text-primary"> (MITRE)</span></h2>
      <p class="lead">Thresher's Team P.O. Box 7332, Kaduna 062245471</p>
        <div class="h2 text-primary">APPLICATION FORM</div>
      <p>This form should be completed and submitted on or before 31 JAN. 2024</p>
    </div>
      <form action="<?php echo URLROOT; ?>/students/register" method="post">

        <!-- Names Row -->
        <div class="row  shadow border mx-1 pt-2 pb-4">
        <div class="col-6">
            <p class="bg-light badge text-dark">SurName</p>
            <input type="text" name="surname" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['surname']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div> 

        <div class="col-6">
            <p class="bg-light badge text-dark">Other Names</p>
            <input type="text" name="other_names" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['other_names']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div> 
        </div>
         
         <!-- Age gender & marital status Row -->
        <div class="row border shadow mx-1 py-2">
          <div class="col-6 col-md-4 mb-2">
            <p class="bg-light badge text-dark">Age</p>
            <input type="number" name="age" style="width:60%;" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['age']; ?>">
            <!--<span class="invalid-feedback"><?php echo $data['name_err']; ?></span>-->
          </div>

        <div class="col-6 col-md-4 mb-2">
          <p class="bg-light badge text-dark">Gender</p>
         <div class="form-check">
           <input class="form-check-input" type="radio" name="gender" id="male" value="male">
           <label class="form-check-label" for="male">
             Male
           </label>
         </div>
         <div class="form-check">
           <input class="form-check-input" type="radio" name="gender" id="female" value="female">
           <label class="form-check-label" for="female">
             Female
           </label>
         </div>
        </div>

        <div class="col-md-4">
          <p class="bg-light badge text-dark">Marital Status</p>
         <div class="form-check">
           <input class="form-check-input"  type="radio" name="marital_status" id="male" value="Single">
           <label class="form-check-label" for="male">
             Single
           </label>
         </div>
         <div class="form-check">
           <input class="form-check-input" type="radio" name="marital_status" id="Married" value="Married">
           <label class="form-check-label" for="Married">
             Married
           </label>
         </div>
         <div class="form-check">
           <input class="form-check-input" type="radio" name="marital_status" id="Widow" value="Widow">
           <label class="form-check-label" for="Widow">
             Widow
           </label>
         </div>
        </div>

        </div>
        <!-- Physical Address Row -->
        <div class="row shadow border mx-1 pt-2 pb-4">
          <div class="col-6">
            <p class="bg-light badge text-dark">State of residence</p>
            <input type="text" name="s_o_residence" class="form-control form-control-lg <?php echo (!empty($data['num_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['s_o_residence']; ?>">
            <span class="invalid-feedback"><?php echo $data['num_err']; ?></span>
          </div> 
          <div class="col-6">
            <p class="bg-light badge text-dark">Contact Address</p>
            <input type="text" name="address" class="form-control form-control-lg <?php echo (!empty($data['num_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['address']; ?>">
            <span class="invalid-feedback"><?php echo $data['num_err']; ?></span>
          </div> 
        </div>

        <!-- Phone Numbers Row -->
        <div class="row shadow border mx-1 pt-2 pb-4">
          <div class="col-6">
            <p class="bg-light badge text-dark">Mobile number</p>
            <input type="text" name="mobile_num" class="form-control form-control-lg <?php echo (!empty($data['num_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mobile_num']; ?>">
            <span class="invalid-feedback"><?php echo $data['num_err']; ?></span>
          </div> 

          <div class="col-6">
            <p class="bg-light badge text-dark">WhatsApp number</p>
            <input type="text" name="whatsApp_num" class="form-control form-control-lg <?php echo (!empty($data['num_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['whatsapp_num']; ?>">
            <span class="invalid-feedback"><?php echo $data['num_err']; ?></span>
          </div> 
        </div>

        <!-- Work experience Row -->
        <div class="row shadow border mx-1 pt-2 pb-4">
          <div class="col-12">
            <p class="bg-light badge text-dark">Working experience</p>
            <input type="text" name="occupation" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['occupation']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div> 
        </div>

        <!-- Languages Row -->
        <div class="row shadow border mx-1 pt-2 pb-4">
          <div class="col-6">
            <p class="bg-light badge text-dark">Languages you speak </p>
            <input type="text" name="lang_speak" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lang_speak']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div> 

          <div class="col-6">
            <p class="bg-light badge text-dark">Languages you write</p>
            <input type="text" name="lang_write" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lang_write']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div>
          <small class="text-muted">if more than one language seperate each language with a comma(,) as you type
        </div>

        <!-- Litracy Row -->
        <div class="row border shadow mx-1 py-2">
          <div class="col-12">
            <p class="">In <span class="text-primary">MITRE</span> you are expected to do all assignments, sit down through the meetings, etc. Can you read and write in English Language effectively?</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="Litracy" id="Yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="Litracy" id="No">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>

        <!-- Certificate Row -->
        <div class="row border shadow mx-1 py-2">
          <div class="col-12">
            <p class="badge text-dark bg-light">Highest Certificate obtained</p>
            <div class="row mx-1">
              <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="edu_qual" id="FSLC">
                <label class="form-check-label" for="FSLC">
                  FSLC
                </label>
              </div>
              <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="edu_qual" id="O'level">
                <label class="form-check-label" for="O'level">
                  O'level
                </label>
              </div>
              <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="edu_qual" id="NCE">
                <label class="form-check-label" for="NCE">
                  NCE
                </label>
              </div>
              <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="edu_qual" id="National Diploma">
                <label class="form-check-label" for="National Diploma">
                  ND
                </label>
              </div>
              <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="edu_qual" id="HND">
                <label class="form-check-label" for="HND">
                  HND
                </label>
              </div>
              <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="edu_qual" id="Degree">
                <label class="form-check-label" for="Degree">
                  Degree
                </label>
              </div>
              <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="edu_qual" id="Masters">
                <label class="form-check-label" for="Masters">
                  Masters
                </label>
              </div>
              </div>

              <div class="row mx-1 pt-2 pb-4">
                <div class="col-6">
                  <p class="">What year did you obtain it</p>
                  <input type="number" name="grad_year" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['grad_year']; ?>">
                  <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                </div> 

                <div class="col-6">
                  <p class="">Under Which school/institution</p>
                  <input type="text" name="institution" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['institution']; ?>">
                  <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                </div> 
              </div>
          </div>
        </div>

        



        <div class="row mt-3">
          <div class=" d-grid col-md-6 offset-md-3">
            <input type="submit" class="btn btn-primary rounded-5" value="Register">
          </div> 
        </div>


      </form>
    </div>
  </div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>