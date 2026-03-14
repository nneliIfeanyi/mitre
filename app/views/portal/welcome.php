<?php
if (isset($_COOKIE['student-id'])) {

    require APPROOT . '/views/inc/student/header.php';
    require APPROOT . '/views/inc/student/top.php';
    require APPROOT . '/views/inc/student/sidebar.php';
?>
    <div class="content-wrapper">
        <section class="content py-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 h3"><?php flash('msg') ?></div>
                </div>
                <div class="card card-body px-2 pb-5">
                    <h1 class="display-2 d-none d-lg-block">
                        Ministers Improvement And Training Retreat <span class="text-primary">(MITRE)</span>
                    </h1>
                    <h1 class="d-lg-none" style="font-size:50px;">
                        Ministers Improvement And Training Retreat <span class="text-primary">(MITRE)</span>
                    </h1><span><?= $_COOKIE['student-zone'] ?> Zone</span>
                    <span class="font-weight-bold">Your Reg_no is <span class="text-primary"><?= $_COOKIE['student-reg_no'] ?></span></span>
                    <hr>

                    <p class="m-0 lead text-primary">Current Conclave Set 17 : <span style='color: green; font-weight: bold; font-size: 18px; text-transform: uppercase;'>
                            <?php echo S_CONCLAVE ?>
                        </span>
                        &nbsp; | &nbsp; Current Conclave Set 18 : <span style='color: green; font-weight: bold; font-size: 18px; text-transform: uppercase;'><?php echo J_CONCLAVE; ?></span>
                    </p>

                    <p class="lead"><span style='color: green; font-weight: bold;'> Today : </span><?php echo date('d') . ' ' . date('M') . ',' . ' ' . date('Y') . ' ' . '|' . ' ' . DAY ?>.</p>
                </div>
                <div class="callout callout-danger" style="margin-top: 30px;">
                    <p><span class="fw-bold">Note:</span>
                        <span class="text-primary">MITRE</span> runs for 6 conclaves of one week each in March and in September. Therefore, the complete course of <span class="text-primary">MITRE</span> takes 3 years.
                    </p>
                </div>
            </div>
        </section>
    </div>
    <!-- <div style="margin-bottom: 100px;"></div> -->
<?php
    require APPROOT . '/views/inc/student/footer.php';
} else {

    require APPROOT . '/views/application/inc/header.php';
?>

    <body>
        <!-- Page Loader -->
        <div id="loader">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <style>
            .hero {
                /*background: linear-gradient(135deg, #6f42c1, #6610f2);*/
                color: #fff;
                padding: 100px 0;
                text-align: center;
            }

            .btn-gradient {
                background: linear-gradient(90deg, #6610f2, #6f42c1);
                color: #fff;
                border: none;
            }

            .btn-gradient:hover {
                background: linear-gradient(90deg, #5a0ee5, #5a32b3);
                color: #fff;
            }

            .steps .card {
                border: none;
                border-radius: 1rem;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease;
            }

            .steps .card:hover {
                transform: translateY(-5px);
            }
        </style>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#"><?= SITENAME; ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="<?= URLROOT; ?>/application#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= URLROOT; ?>/application#criteria">Admission Criteria</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= URLROOT; ?>/application#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero -->
        <section class="hero" style="background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9)), url('<?php echo URLROOT; ?>/img/reg-img.jpeg') center/cover no-repeat;">
            <div class="container">
                <h1 class="fw-bold display-4">
                    Ministers Improvement And Training Retreat <span class="text-primary">(MITRE)</span>
                </h1>
                <p class="lead mb-4">Welcome to <span class="text-primary">MITRE</span> Application Portal.</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <!-- <a href="<?= URLROOT; ?>/application/step1" class="btn btn-primary btn-lg px-5 rounded-pill">
                        Start Application
                    </a> -->
                    <a href="javascript:void(0)" class="btn btn-primary btn-lg px-5 rounded-pill">
                        Application closed
                    </a>
                    <a href="<?= URLROOT; ?>/students/login" class="btn btn-outline-light btn-lg px-5 rounded-pill">
                        Click here to Login
                    </a>
                </div>
            </div>
        </section>
        <div class="container">
            <!-- Progress Saving Notice -->
            <div class="alert alert-info alert-dismissible fade show mt-4 shadow-sm" role="alert">
                <strong>Note!</strong> <span class="text-primary">MITRE</span> runs for 6 conclaves of one week each in March and in September. Therefore, the complete course of <span class="text-primary">MITRE</span> takes 3 years.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>

        <!-- Criteria List -->
        <section class="steps criteria-list py-5" id="criteria">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Admission Criteria</h2>
                    <p class="text-muted">Please read carefully before starting your application process.</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="card p-4 h-100">
                            <h5 class="fw-bold">1. </h5>
                            <p class="text-muted">The candidate must be born again, and not be a recent convert.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card p-4 h-100">
                            <h5 class="fw-bold">2. </h5>
                            <p class="text-muted">Candidate should be a church pastor/elder or church leader or a trusted church
                                or fellowship/ministry worker.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card p-4 h-100">
                            <h5 class="fw-bold">3. </h5>
                            <p class="text-muted">The candidate should be able to write and read English well enough to be able to do the assignments in <span class="text-primary">MITRE</span>. In cases where the candidate is deficient in both reading and writing, a conditional waiver will be made for such.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card p-4 h-100">
                            <h5 class="fw-bold">4. </h5>
                            <p class="text-muted">Candidate should not be currently undergoing any undergraduate programme.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card p-4 h-100">
                            <h5 class="fw-bold">6. </h5>
                            <p class="text-muted">Candidates should be aware that attendance at all <span class="text-primary">MITRE</span> conclaves is mandatory..</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card p-4 h-100">
                            <h5 class="fw-bold">7. </h5>
                            <p class="text-muted">Young singles will not be admitted into MITRE unless they are ministers of the gospel and/or in an advanced stage of courtship.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card p-4 h-100">
                            <h5 class="fw-bold">8. </h5>
                            <p class="text-muted"> Every candidate should produce a referee who is either a pastor of a recognized local church denomination, a <span class="text-primary">MITRE</span> instructor, a <span class="text-primary">MITRE</span> graduate or a discipler.</p>
                        </div>
                    </div>
                </div>

                <!-- CTA -->
                <div class="text-center mt-5">
                    <!-- <a href="<?= URLROOT; ?>/application/step1" class="btn btn-primary btn-lg rounded-pill px-5">
                        Apply Now
                    </a> -->
                    <a href="javascript:void(0)" class="btn btn-primary btn-lg rounded-pill px-5">
                        Application closed
                    </a>
                </div>

                <!-- Progress Saving Notice -->
                <div class="alert alert-info alert-dismissible fade show mt-4 shadow-sm" role="alert">
                    Mitre application is officially closed for 2026 intake.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </section>

        <!-- Footer -->
    <?php require APPROOT . '/views/application/inc/footer.php';
}
