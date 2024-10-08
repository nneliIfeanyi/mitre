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

                    <p class="m-0 lead text-primary">Current Conclave Set 16 : <span style='color: green; font-weight: bold; font-size: 18px; text-transform: uppercase;'>
                            <?php echo S_CONCLAVE ?>
                        </span>
                        &nbsp; | &nbsp; Current Conclave Set 17 : <span style='color: green; font-weight: bold; font-size: 18px; text-transform: uppercase;'><?php echo J_CONCLAVE; ?></span>
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

    require APPROOT . '/views/inc/header.php'; ?>

    <div class="container">
        <div class="bg-light border">
            <div class="lead"> <?php flash('success'); ?></div>
            <div class="px-2 py-5">
                <h1 class="display-3">Ministers Improvement And Training Retreat <span class="text-primary">(MITRE)</span></h1>
                <!-- <p class="lead text-primary fs-3">Registration is closed.</p>  -->
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?php echo URLROOT; ?>/students/login" class="lead fw-bold btn btn-primary rounded-5">
                            Click here to login
                            <i class="fa fa-sign-in fa-1x" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="fw-bold h3 pt-4">Criteria for <span class="text-primary">MITRE</span> Admission</h2>
        <p class="text-muted lead py-3">Please before applying for admission into <span class="text-primary">MITRE</span> carefully read the following conditions:</p>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="d-flex gap-3">
                    <div class="number">
                        <span class="bg-primary py-2 px-4 fs-3 rounded-circle">
                            a
                        </span>
                    </div>
                    <div>
                        <p>
                            The candidate must be born again, and not be a recent convert.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="d-flex gap-3">
                    <div class="number">
                        <span class="bg-primary py-2 px-4 fs-3 rounded-circle">
                            b
                        </span>
                    </div>
                    <div>
                        <p>
                            Candidate should be a church pastor/elder or church leader or a trusted church
                            or fellowship/ministry worker.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="d-flex gap-3">
                    <div class="number">
                        <span class="bg-primary py-2 px-4 fs-3 rounded-circle">
                            c
                        </span>
                    </div>
                    <div>
                        <p>
                            The candidate should be able to write and read English well enough to be able to do the assignments in <span class="text-primary">MITRE</span>. In cases where the candidate is deficient in both reading and writing, a conditional waiver will be made for such.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="d-flex gap-3">
                    <div class="number">
                        <span class="bg-primary py-2 px-4 fs-3 rounded-circle">
                            d
                        </span>
                    </div>
                    <div>
                        <p>
                            Candidate should not be currently undergoing any undergraduate programme.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="d-flex gap-3">
                    <div class="number">
                        <span class="bg-primary py-2 px-4 fs-3 rounded-circle">
                            e
                        </span>
                    </div>
                    <div>
                        <p>
                            Candidates should be aware that attendance at all <span class="text-primary">MITRE</span> conclaves is mandatory.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="d-flex gap-3">
                    <div class="number">
                        <span class="bg-primary py-2 px-4 fs-3 rounded-circle">
                            f
                        </span>
                    </div>
                    <div>
                        <p>
                            Young singles will not be admitted into MITRE unless they are ministers of the gospel and/or in an advanced stage of courtship.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="d-flex gap-3">
                    <div class="number">
                        <span class="bg-primary py-2 px-4 fs-3 rounded-circle">
                            g
                        </span>
                    </div>
                    <div>
                        <p>
                            Every candidate should produce a referee who is either a pastor of a recognized local church denomination, a <span class="text-primary">MITRE</span> instructor, a <span class="text-primary">MITRE</span> graduate or a discipler.
                        </p>
                    </div>
                </div>
            </div>
            <p class="lead"><span class="fw-bold">Note:</span>
                <span class="text-primary">MITRE</span> runs for 6 conclaves of one week each in March and in September. Therefore, the complete course of <span class="text-primary">MITRE</span> takes 3 years.
            </p>
            <div class="row">
                <div class="col-md-6">
                    <a href="<?php echo URLROOT; ?>/students/login" class="lead fw-bold btn btn-primary rounded-5">
                        Click here to Login
                        <i class="fa fa-sign-in fa-1x" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-dark  px-2 py-3 mt-3">

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

            <div class="col-md-6 pt-3">
                <div class="text-center">
                    <p class="lead fs-6 text-light">Copyright &copy; <?php echo date('Y'); ?> <span class="text-white fst-italic fw-semibold">Threshers Team</span>
                        <br>
                        <span class=""> All Rights Reserved</span>
                    </p>
                </div>

            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php';
}
