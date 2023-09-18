<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row r mb-5 pb-3">
  <div class="col-12">
    
    <div class="text-center shadow border py-3">
      <h2>Ministers Improvement And Training Retreat<span class="text-primary"> (MITRE)</span></h2>
      <p class="lead fs-6">Thresher's Team P.O. Box 7332, Kaduna 062245471</p>
        <div class="h2 text-primary">APPLICATION FORM</div>
      <p>This form should be completed and submitted on or before 31 JAN. 2024</p>
    </div>
      <form action="<?php echo URLROOT; ?>/students/registration" method="post" enctype="multipart/form-data">

        <!-- Names Row -->
        <div class="row  shadow border mx-1 pt-2 pb-4">
        <div class="col-6">
            <p class="bg-light badge text-dark">SurName</p>
            <input type="text" required name="surname" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['surname']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div> 

        <div class="col-6">
            <p class="bg-light badge text-dark">Other Names</p>
            <input type="text" required name="other_names" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['other_names']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div> 
        </div>
         
         <!-- Age gender & marital status Row -->
        <div class="row border shadow mx-1 py-2">
          <div class="col-6 col-md-4 mb-2">
            <p class="bg-light badge text-dark">Age</p>
            <input type="number" name="age" style="width:60%;" class="form-control form-control-lg" value="<?php echo $data['age']; ?>">
          </div>

        <div class="col-6 col-md-4 mb-2">
          <p class="bg-light badge text-dark">Gender</p>
         <div class="form-check">
           <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if (isset($data['gender']) && $data['gender']=="male") echo "checked";?>>
           <label class="form-check-label" for="male">
             Male
           </label>
         </div>
         <div class="form-check">
           <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php if (isset($data['gender']) && $data['gender']=="female") echo "checked";?>>
           <label class="form-check-label" for="female">
             Female
           </label>
         </div>
        </div>

        <div class="col-md-4">
          <p class="bg-light badge text-dark">Marital Status</p>
         <div class="form-check">
           <input class="form-check-input"  type="radio" name="m_status" id="Single" value="Single" <?php if (isset($data['m_status']) && $data['m_status']=="Single") echo "checked";?>>
           <label class="form-check-label" for="Single">
             Single
           </label>
         </div>
         <div class="form-check">
           <input class="form-check-input" type="radio" name="m_status" id="Married" value="Married" <?php if (isset($data['m_status']) && $data['m_status']=="Married") echo "checked";?>>
           <label class="form-check-label" for="Married">
             Married
           </label>
         </div>
         <div class="form-check">
           <input class="form-check-input" type="radio" name="m_status" id="Widow" value="Widow" <?php if (isset($data['m_status']) && $data['m_status']=="Widow") echo "checked";?>>
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
            <input type="text" required name="s_o_r" class="form-control form-control-lg <?php echo (!empty($data['s_o_r_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['s_o_r']; ?>">
            <span class="invalid-feedback"><?php echo $data['s_o_r_err']; ?>
          </div> 
          <div class="col-md-6 mt-1">
            <p class="bg-light badge text-dark">Contact Address</p>
            <input type="text" name="address" class="form-control form-control-lg" value="<?php echo $data['address']; ?>">
          </div> 
        </div>

        <!-- Phone Numbers Row -->
        <div class="row shadow border mx-1 pt-2 pb-4">
          <div class="col-6">
            <p class="bg-light badge text-dark">Mobile number</p>
            <input type="number" required name="mobile_num" class="form-control form-control-lg <?php echo (!empty($data['num_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mobile_num']; ?>">
            <span class="invalid-feedback"><?php echo $data['num_err']; ?></span>
          </div> 

          <div class="col-6">
            <p class="bg-light badge text-dark">WhatsApp number</p>
            <input type="number" name="whatsapp_num" class="form-control form-control-lg" value="<?php echo $data['whatsapp_num']; ?>">
          </div> 
        </div>

        <!-- church Row -->
        <div class="row shadow border mx-1 pt-2 pb-4">
          <div class="col-12">
            <p class="bg-light badge text-dark">Church / Local Assembly</p>
            <input type="text" name="church" class="form-control form-control-lg" value="<?php echo $data['church']; ?>">
          </div> 
        </div>

        <!-- function Row -->
        <div class="row shadow border mx-1 pt-2 pb-4">
          <div class="col-12">
            <p class="bg-light badge text-dark">Your function or post in Church</p>
            <input type="text" name="church_role" class="form-control form-control-lg" value="<?php echo $data['church_role']; ?>">
          </div> 
        </div>

        <!-- Born again Row -->
        <div class="row border shadow mx-1 py-2">
          <div class="col-md-4 mb-2">
            <p class="bg-light badge text-dark">When were you born again</p>
            <input type="number" name="new_birth" class="form-control form-control-lg" value="<?php echo $data['new_birth']; ?>">
          </div>

        <div class="col-md-4 mb-2">
          <p class="bg-light badge text-dark">Have you been Baptised into The Holy Ghost</p>
         <div class="form-check">
           <input class="form-check-input" type="radio" name="H_baptism" id="Yes" value="yes" <?php if (isset($data['H_baptism']) && $data['H_baptism']=="yes") echo "checked";?>>
           <label class="form-check-label" for="Yes">
             Yes, i have
           </label>
         </div>
         <div class="form-check">
           <input class="form-check-input" type="radio" name="H_baptism" id="No" value="No" <?php if (isset($data['H_baptism']) && $data['H_baptism']=="No") echo "checked";?>>
           <label class="form-check-label" for="No">
             Not Yet
           </label>
         </div>
         <div class="form-check">
           <input class="form-check-input" type="radio" name="H_baptism" id="uncertain" value="uncertain" <?php if (isset($data['H_baptism']) && $data['H_baptism']=="uncertain") echo "checked";?>>
           <label class="form-check-label" for="uncertain">
             Uncertain
           </label>
         </div>
        </div>
        </div>

        <div class="row shadow border mx-1 pt-2 pb-4">
          <div class="col-6">
            <p class="bg-light badge text-dark">What did you sence is God's calling upon your life ?</p>
            <input type="text" name="call_sensed" class="form-control form-control-lg" value="<?php echo $data['call_sensed']; ?>">
          </div>
        </div> 

        <div class="row shadow border mx-1 pt-2 pb-4">
          <div class="col-md-4">
            <p class="bg-light badge text-dark">Are you into it now ? </p>
          <div class="form-check">
           <input class="form-check-input" type="radio" name="into_calling" id="Yes" value="yes" <?php if (isset($data['into_calling']) && $data['into_calling']=="yes") echo "checked";?>>
           <label class="form-check-label" for="Yes">
             Yes
           </label>
         </div>
         <div class="form-check">
           <input class="form-check-input" type="radio" name="into_calling" id="No" value="No" <?php if (isset($data['into_calling']) && $data['into_calling']=="No") echo "checked";?>>
           <label class="form-check-label" for="No">
             No
           </label>
         </div>
         <div class="form-check">
           <input class="form-check-input" type="radio" name="into_calling" id="not sure" value="Not sure" <?php if (isset($data['into_calling']) && $data['into_calling']=="Not sure") echo "checked";?>>
           <label class="form-check-label" for="not sure">
             Not sure
           </label>
         </div>
          </div>

          <div class="col-md-4">
            <p class="fs-6">When can you say you enterd into it ?</p>
            <input type="text" name="c_r_t" class="form-control form-control-lg" value="<?php echo $data['c_r_t']; ?>">
          </div>
        </div>

        <!-- Work experience Row -->
        <div class="row shadow border mx-1 pt-2 pb-4">
          <div class="col-md-6 mb-2">
            <p class="fs-6">Have you attended MITRE before ? </p>
            <div class="form-check">
           <input class="form-check-input" type="radio" name="prior_mitre" id="Yes, but did not graduate" value="Yes, but did not graduate" <?php if (isset($data['prior_mitre']) && $data['prior_mitre']=="Yes, but did not graduate") echo "checked";?>>
           <label class="form-check-label" for="Yes, but did not graduate">
             Yes, but did not graduate
           </label>
         </div>
         <div class="form-check">
           <input class="form-check-input" type="radio" name="prior_mitre" id="No, not at all" value="No, not at all" <?php if (isset($data['prior_mitre']) && $data['prior_mitre']=="No, not at all") echo "checked";?>>
           <label class="form-check-label" for="No, not at all">
             No, not at all
           </label>
         </div>
          </div>

          <div class="col-md-6 mb-2">
            <p class="fs-6">Why do you want to attend MITRE ? </p>
           <input type="text" name="why_mitre" class="form-control form-control-lg" value="<?php echo $data['why_mitre']; ?>">
          </div>
        </div>
       

        <div class="row shadow border mx-1 pt-2 pb-4">
        <div class="col-md-6">
            <p class="bg-light badge text-dark">Working experience (ocupation)</p>
            <input type="text" name="occupation" class="form-control form-control-lg" value="<?php echo $data['occupation']; ?>">
          </div> 
        </div> 
        <!-- Languages Row -->
        <div class="row shadow border mx-1 pt-2 pb-4">
          <div class="col-6">
            <p class="bg-light badge text-dark">Languages you speak </p>
            <input type="text" name="lang_speak" class="form-control form-control-lg" value="<?php echo $data['lang_speak']; ?>">
          </div> 

          <div class="col-6">
            <p class="bg-light badge text-dark">Languages you write</p>
            <input type="text" name="lang_write" class="form-control form-control-lg" value="<?php echo $data['lang_write']; ?>">
          </div>
          <small class="text-muted">if more than one language seperate each language with a comma(,) as you type
        </div>

        <!-- Litracy Row -->
        <div class="row border shadow mx-1 py-2">
          <div class="col-12">
            <p class="">In <span class="text-primary">MITRE</span> you are expected to do all assignments, sit down through the meetings, etc. Can you read and write in English Language effectively?</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="litracy" value="yes" id="Yes" <?php if (isset($data['litracy']) && $data['litracy']=="yes") echo "checked";?>>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="litracy" value="No" id="No" <?php if (isset($data['litracy']) && $data['litracy']=="No") echo "checked";?>>
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
                <input class="form-check-input" type="radio" name="edu_qual" id="FSLC" value="FSLC" <?php if (isset($data['edu_qual']) && $data['edu_qual']=="FSLC") echo "checked";?>>
                <label class="form-check-label" for="FSLC">
                  FSLC
                </label>
              </div>
              <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="edu_qual" id="O'level" value="Olevel" <?php if (isset($data['edu_qual']) && $data['edu_qual']=="Olevel") echo "checked";?>>
                <label class="form-check-label" for="O'level">
                  O'level
                </label>
              </div>
              <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="edu_qual" id="NCE" value="NCE" <?php if (isset($data['edu_qual']) && $data['edu_qual']=="NCE") echo "checked";?>>
                <label class="form-check-label" for="NCE">
                  NCE
                </label>
              </div>
              <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="edu_qual" id="ND" value="ND" <?php if (isset($data['edu_qual']) && $data['edu_qual']=="ND") echo "checked";?>>
                <label class="form-check-label" for="ND">
                  ND
                </label>
              </div>
              <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="edu_qual" id="HND" value="HND" <?php if (isset($data['edu_qual']) && $data['edu_qual']=="HND") echo "checked";?>>
                <label class="form-check-label" for="HND">
                  HND
                </label>
              </div>
              <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="edu_qual" id="Degree" value="Degree" <?php if (isset($data['edu_qual']) && $data['edu_qual']=="Degree") echo "checked";?>>
                <label class="form-check-label" for="Degree">
                  Degree
                </label>
              </div>
              <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="edu_qual" id="phd" value="PHD" <?php if (isset($data['edu_qual']) && $data['edu_qual']=="PHD") echo "checked";?>>
                <label class="form-check-label" for="phd">
                  PHD
                </label>
              </div>
              <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="edu_qual" id="Masters" value="Masters" <?php if (isset($data['edu_qual']) && $data['edu_qual']=="Masters") echo "checked";?>>
                <label class="form-check-label" for="Masters">
                  Masters
                </label>
              </div>
              </div>

              <div class="row mx-1 pt-2 pb-4">
                <div class="col-md-6">
                  <p class="">What year did you obtain it</p>
                  <input type="number" name="grad_year" class="form-control form-control-lg" value="<?php echo $data['grad_year']; ?>">
                </div> 

                <div class="col-md-6">
                  <p class="">Under Which school / institution</p>
                  <input type="text" name="institution" class="form-control form-control-lg " value="<?php echo $data['institution']; ?>">
                </div> 
              </div>
          </div>
        </div>

        <div class="row shadow border mx-1 pt-2 pb-4">
          <div class="col-md-6">
            <p class="bg-light badge text-dark">Who has / had spiritual oversight / influence over you</p>
            <input type="text" name="discipler" class="form-control form-control-lg" value="<?php echo $data['discipler']; ?>">
          </div>
        </div>

        <div class="row shadow border mx-1 pt-2 pb-4">
            <div class="mb-2"><i class="fas fa-user fa-3x"></i></div>
            <p class="">Passport photograph</p>
            <input type="file" name="passport" class="w3-input">

        </div>
        
        <div class="row shadow border mx-1 pt-2 pb-4">
          <div class="lead fs-6 text-primary">REFEREE'S COLUMN</div>
          <div class="col-md-6">
            <p class="bg-light badge text-dark">Referals name</p>
            <input type="text" name="ref_name" class="form-control form-control-lg" value="<?php echo $data['ref_name']; ?>">
          </div>
          <div class="col-md-6">
            <p class="bg-light badge text-dark">Referals phone number</p>
            <input type="number" name="ref_phone" class="form-control form-control-lg" value="<?php echo $data['ref_phone']; ?>">
          </div>
          <div class="col-md-6">
            <p class="bg-light badge text-dark">Referals address</p>
            <input type="text" name="ref_address" class="form-control form-control-lg" value="<?php echo $data['ref_address']; ?>">
          </div>
          <div class="col-md-6">
            <p class="bg-light badge text-dark">How long have you known each other</p>
            <input type="text" name="ref_duration" class="form-control form-control-lg" value="<?php echo $data['ref_duration']; ?>">
          </div>
          <div class="col-md-6">
            <p class="bg-light badge text-dark">Any specific information about the candidate ?</p>
            <input type="text" name="ref_info" class="form-control form-control-lg" value="<?php echo $data['ref_info']; ?>">
          </div>
        </div>

        <div class="row mt-3">
          <div class=" d-grid col-md-6 offset-md-3">
            <input type="submit" class="btn btn-primary rounded-5" value="Submit">
          </div> 
        </div>


      </form>
    </div>
  </div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>