<?php require APPROOT . '/views/application/inc/header.php'; ?>
<body class="">
    <div id="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"><?= SITENAME; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="<?= URLROOT; ?>/application">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= URLROOT; ?>/application#criteria">Admission Criteria</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= URLROOT; ?>/application#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Hero -->
    <section class="hero">
        <div class="container my-5">
            <div class="card card-body shardow text-center">
                <h1 class="fw-bold display-4">
                    Ministers Improvement And Training Retreat <span class="text-primary">(MITRE)</span>
                </h1>
                <p class="lead fs-6">Thresher's Team P.O. Box 7332, Kaduna. <br>
                    08034530726, 08058455719
                </p>
                <div class="h2 text-primary">APPLICATION FORM</div>
                <p class="fst-italic fw-bold">This form should be completed and submitted on or before 31 January, 2026</p>
            </div>
        </div>
    </section>
    <section>
        <div class="container my-5">
            <h2 class="m-0">Personal Information</h2>
            <?php flash('msg'); ?>
            <p class="fst-italic text-primary fw-semibold">You are required to fill out all fields!</p>
            <?php if (isset($data['step1']->reg_id)) : ?>
                <form method="POST" action="<?= URLROOT; ?>/application/update_step1" data-parsley-validate>
                <?php else : ?>
                    <form method="POST" action="<?= URLROOT; ?>/application/step1" data-parsley-validate>
                    <?php endif; ?>
                    <input type="hidden" name="reg_id" value="<?= (empty($data['reg_id'])) ? '' : $data['reg_id']; ?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-bg-light badge">Surname</label>
                            <input type="text" value="<?= (empty($data['step1']->surname)) ? '' : $data['step1']->surname; ?>" name="surname" class="form-control" required data-parsley-singleword data-parsley-trigger="keyup">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-bg-light badge">Other Name</label>
                            <input type="text" value="<?= (empty($data['step1']->other_name)) ? '' : $data['step1']->other_name; ?>" name="other_name" class="form-control" required data-parsley-singleword data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="text-bg-light badge">Age</label>
                            <input type="number" value="<?= (empty($data['step1']->age)) ? '' : $data['step1']->age; ?>" name="age" class="form-control" required min="10" max="120">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-bg-light badge">Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="<?= (empty($data['step1']->gender)) ? '' : $data['step1']->gender; ?>">
                                    <?= (empty($data['step1']->gender)) ? '-- Select --' : $data['step1']->gender; ?>
                                </option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-bg-light badge">Marital Status</label>
                            <select name="marital_status" class="form-control" required>
                                <option value="<?= (empty($data['step1']->marital_status)) ? '' : $data['step1']->marital_status; ?>">
                                    <?= (empty($data['step1']->marital_status)) ? '--Select--' : $data['step1']->marital_status; ?>
                                </option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widow">Widow</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Seperated">Seperated</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="text-bg-light badge">State of Residence</label>
                        <input type="text" value="<?= (empty($data['step1']->state)) ? '' : $data['step1']->state; ?>" name="state" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="text-bg-light badge">Which zone will you like to attend MITRE?</label>
                        <select name="zone" class="form-control" required>
                            <option value="<?= (empty($data['step1']->zone)) ? '' : $data['step1']->zone; ?>">
                                <?= (empty($data['step1']->zone)) ? '--Select' : $data['step1']->zone; ?>
                            </option>
                            <option value="Minna">Minna (Niger State)</option>
                            <option value="Kaduna">Kaduna (Kaduna State)</option>
                            <option value="Ufuma">Ufuma (Anambra State)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="text-bg-light badge">Contact/Resident Address</label>
                        <textarea name="address" class="form-control" required><?= (empty($data['step1']->address)) ? '' : $data['step1']->address; ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-bg-light badge">Mobile Number/Whatsapp number</label>
                            <input type="number" value="<?= (empty($data['step1']->mobile)) ? '' : $data['step1']->mobile; ?>" name="mobile" class="form-control" required data-parsley-type="digits" data-parsley-length="[11,11]" data-parsley-length-message="Phone number must be exactly 11 digits." data-parsley-trigger="keyup">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-bg-light badge">Alternative Mobile Number</label><span style="font-size:xsmall">(optional)</span>
                            <input type="number" value="<?= (empty($data['step1']->alt_no)) ? '' : $data['step1']->alt_no; ?>" name="alt_no" class="form-control" data-parsley-length="[11,11]" data-parsley-length-message="Phone number must be exactly 11 digits." data-parsley-trigger="keyup" data-parsley-type="digits">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="text-bg-light badge">Email</label><span style="font-size:xsmall">(optional)</span>
                        <input type="email" value="<?= (empty($data['step1']->email)) ? '' : $data['step1']->email; ?>" name="email" class="form-control" data-parsley-type="email">
                    </div>
                    <div class="mb-3">
                        <label class="text-bg-light badge">Working Experience / Occupation</label>
                        <input type="text" value="<?= (empty($data['step1']->occupation)) ? '' : $data['step1']->occupation; ?>" name="occupation" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="text-bg-light badge">Languages you speak</label>
                        <input type="text" value="<?= (empty($data['step1']->lang_speak)) ? '' : $data['step1']->lang_speak; ?>" name="lang_speak" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="text-bg-light badge">Languages you write</label>
                        <input type="text" value="<?= (empty($data['step1']->lang_write)) ? '' : $data['step1']->lang_write; ?>" name="lang_write" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="text-bg-light badge">Can you read & write English effectively?</label>
                        <select name="litracy" class="form-control" required>
                            <option value="<?= (empty($data['step1']->litracy)) ? '' : $data['step1']->litracy; ?>">
                                <?= (empty($data['step1']->litracy)) ? '--Select--' : $data['step1']->litracy; ?>
                            </option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <?php if (isset($data['step1']->reg_id)) : ?>
                        <p class="lead fst-italic">You can  make changes and <span class="fw-bold">Update</span> or proceed to <span class="fw-bold">Next</span></p>
                        <div class="d-flex justify-content-center mt-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?= URLROOT; ?>/application/step2" class="btn btn-outline-dark">Next <i class="bi bi-chevron-right"></i></a>
                        </div>
                    <?php else : ?>
                        <p class="lead fst-italic">Ensure to <span class="fw-bold">Save</span> before proceeding to <span class="fw-bold">Next</span></p>
                        <div class="d-flex justify-content-center mt-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="<?= URLROOT; ?>/application/step2" class="btn btn-outline-dark">Next <i class="bi bi-chevron-right"></i></a>
                        </div>
                    <?php endif; ?>
                    </form>
                    <?php if(isset($_SESSION['admin'])):?>
        <div class="d-flex justify-content-center m-4">
        <a href="<?= URLROOT; ?>/admission/profile/<?php echo $data['step1']->id;?>" class="btn btn-primary rounded-3">Return</a>
      </div>
        <?php endif;?>
                </div>
    </section>
   <?php require APPROOT . '/views/application/inc/footer.php'; ?>