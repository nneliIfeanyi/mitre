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
            <h2 class="mb-4">Spiritual & Church Information</h2>
            <?php flash('msg'); ?>
            <form method="POST" action="<?= URLROOT; ?>/application/step2" data-parsley-validate>
                <div class="mb-3">
                    <label class="text-bg-light badge">Church / Local Assembly</label>
                    <input type="text" value="<?= (empty($data['step2']->church)) ? '' : $data['step2']->church; ?>" name="church" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="text-bg-light badge">Your Function or Post in Church</label>
                    <input type="text" value="<?= (empty($data['step2']->post)) ? '' : $data['step2']->post; ?>" name="post" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="text-bg-light badge">When were you born again?</label>
                        <input type="text" value="<?= (empty($data['step2']->born_again)) ? '' : $data['step2']->born_again; ?>" name="born_again" class="form-control" placeholder="eg. 1991" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="text-bg-light badge">Have you been Baptised into the Holy Ghost?</label>
                        <select name="baptism" class="form-control" required>
                            <option value="<?= (empty($data['step2']->baptism)) ? '' : $data['step2']->baptism; ?>">
                                <?= (empty($data['step2']->baptism)) ? '--Select--' : $data['step2']->baptism; ?>
                            </option>
                            <option value="Yes">Yes, I have</option>
                            <option value="No">Not Yet</option>
                            <option value="Uncertain">Uncertain</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="text-bg-light badge">What did you sense is God's call upon your life?</label>
                    <textarea name="calling" class="form-control" required><?= (empty($data['step2']->calling)) ? '' : $data['step2']->calling; ?></textarea>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="text-bg-light badge">Are you into it now?</label>
                        <select name="in_calling" class="form-control" required>
                            <option value="<?= (empty($data['step2']->in_calling)) ? '' : $data['step2']->in_calling; ?>">
                                <?= (empty($data['step2']->in_calling)) ? '--Select--' : $data['step2']->in_calling; ?>
                            </option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="Not sure">Not sure</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="text-bg-light badge">(If yes) When did you enter into it? <span style="font-size: small;">or leave blank</span></label>
                        <input type="text" value="<?= (empty($data['step2']->entered_calling)) ? '' : $data['step2']->entered_calling; ?>" name="entered_calling" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="text-bg-light badge">Have you attended MITRE before?</label>
                    <select name="attended_mitre" class="form-control" required>
                        <option value="<?= (empty($data['step2']->attended_mitre)) ? '' : $data['step2']->attended_mitre; ?>">
                            <?= (empty($data['step2']->attended_mitre)) ? '--Select--' : $data['step2']->attended_mitre; ?>
                        </option>
                        <option value="Yes">Yes, but did not graduate</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="text-bg-light badge">Why do you want to attend MITRE? </label>
                    <textarea name="why_mitre" class="form-control" required><?= (empty($data['step2']->why_mitre)) ? '' : $data['step2']->why_mitre; ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="text-bg-light badge">Who has / had spiritual oversight over you?</label>
                    <input type="text" value="<?= (empty($data['step2']->oversight)) ? '' : $data['step2']->oversight; ?>" name="oversight" class="form-control">
                </div><br />
                <hr />
                <br />
                <div class="mb-3">
                    <label class="text-bg-light badge">Highest Certificate Obtained</label>
                    <select name="certificate" class="form-control" required>
                        <option value="<?= (empty($data['step2']->certificate)) ? '' : $data['step2']->certificate; ?>">
                            <?= (empty($data['step2']->certificate)) ? '' : $data['step2']->certificate; ?>
                        </option>
                        <option value="FSLC">First School Leaving Certificate</option>
                        <option value="O'level">O'Level</option>
                        <option value="NCE">NCE</option>
                        <option value="ND">National Diploma (ND)</option>
                        <option value="HND">Higher National Diploma (HND)</option>
                        <option value="Degree">Degree</option>
                        <option value="Masters">Masters</option>
                        <option value="PhD">PhD</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="text-bg-light badge">What year did you obtain it?</label>
                        <input type="number" value="<?= (empty($data['step2']->cert_year)) ? '' : $data['step2']->cert_year; ?>" name="cert_year" placeholder="eg. 2021" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="text-bg-light badge">School / Institution Certificate was obtained</label>
                        <input type="text" value="<?= (empty($data['step2']->institution)) ? '' : $data['step2']->institution; ?>" name="institution" class="form-control" required>
                    </div>
                </div>
                
                    <?php if (!empty($data['step2']->church)) : ?>
                    <p class="lead fst-italic">You can  make changes and <span class="fw-bold">Update</span> or proceed to <span class="fw-bold">Next</span></p>
                    <div class="d-flex justify-content-center mt-2">
                        <a href="<?= URLROOT; ?>/application/step1" class="btn btn-outline-dark"><i class="bi bi-chevron-left"></i> Prev</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= URLROOT; ?>/application/step3" class="btn btn-outline-dark">Next <i class="bi bi-chevron-right"></i></a>
                    </div>
                    <?php else : ?>
                    <p class="lead fst-italic">Ensure to <span class="fw-bold">Save</span> before proceeding to <span class="fw-bold">Next</span></p>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="<?= URLROOT; ?>/application/step1" class="btn btn-outline-dark"><i class="bi bi-chevron-left"></i> Prev</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="<?= URLROOT; ?>/application/step3" class="btn btn-outline-dark">Next <i class="bi bi-chevron-right"></i></a>
                    </div>
                    <?php endif; ?>
            </form>
        </div>
    </section>
    <!-- Footer -->
 <?php require APPROOT . '/views/application/inc/footer.php'; ?>