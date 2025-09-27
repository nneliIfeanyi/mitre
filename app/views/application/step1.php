<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="Discipleship, discipleship works, discipleship labour, discipleship in kaduna state Nigeria, MITRE">
    <meta name="description" content="Ministers Improvement And Training Retreat, MITRE, Place of Refuge, Kaduna">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/styles.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= URLROOT; ?>/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= URLROOT; ?>/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= URLROOT; ?>/img/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <title><?= SITENAME; ?> - Application Portal</title>
    <style>
        /* Fullscreen loader */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Parsley Validation Styling */
        input.parsley-error,
        select.parsley-error,
        textarea.parsley-error {
            border-color: #D43F3A;
            box-shadow: none;
        }

        input.parsley-error:focus,
        select.parsley-error:focus,
        textarea.parsley-error:focus {
            border-color: #D43F3A;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #FF8F8A;
        }

        input.parsley-success,
        select.parsley-success,
        textarea.parsley-success {
            border-color: #398439;
            box-shadow: none;
        }

        input.parsley-success:focus,
        select.parsley-success:focus,
        textarea.parsley-success:focus {
            border-color: #398439;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #89D489
        }

        .parsley-errors-list {
            list-style-type: none;
            padding-left: 0;
            margin-top: 5px;
            margin-bottom: 0;
        }

        .parsley-errors-list.filled {
            color: #D43F3A;
            opacity: 1;
        }

        footer {
            background: #212529;
            color: #adb5bd;
            padding: 30px 0;
        }

        footer a {
            color: #f8f9fa;
            text-decoration: none;
        }
    </style>
</head>

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
                <p class="lead fs-6">Thresher's Team P.O. Box 7332, Kaduna 062245471</p>
                <div class="h2 text-primary">APPLICATION FORM</div>
                <p class="fst-italic fw-bold">This form should be completed and submitted on or before FEB. 2026</p>
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
                            <input type="text" value="<?= (empty($data['step1']->surname)) ? '' : $data['step1']->surname; ?>" name="surname" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-bg-light badge">Other Name</label>
                            <input type="text" value="<?= (empty($data['step1']->other_name)) ? '' : $data['step1']->other_name; ?>" name="other_name" class="form-control" required>
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
                            <label class="text-bg-light badge">Alternative Mobile Number</label>
                            <input type="number" value="<?= (empty($data['step1']->alt_no)) ? '' : $data['step1']->alt_no; ?>" name="alt_no" class="form-control" data-parsley-length="[11,11]" data-parsley-length-message="Phone number must be exactly 11 digits." data-parsley-trigger="keyup" required data-parsley-type="digits">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="text-bg-light badge">Email</label>
                        <input type="email" value="<?= (empty($data['step1']->email)) ? '' : $data['step1']->email; ?>" name="email" class="form-control" required data-parsley-type="email">
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
                    <div class="d-flex justify-content-center mt-4">
                        <?php if (isset($data['step1']->reg_id)) : ?>
                            <button type="submit" class="btn btn-primary">Update Changes</button>
                            <a href="<?= URLROOT; ?>/application/step2" class="btn btn-outline-dark">Next <i class="bi bi-chevron-right"></i></a>
                        <?php else : ?>
                            <button type="submit" class="btn btn-primary">Save Progress</button>
                            <a href="<?= URLROOT; ?>/application/step2" class="btn btn-outline-dark">Next <i class="bi bi-chevron-right"></i></a>
                        <?php endif; ?>
                    </div>
                    </form>
        </div>
    </section>
    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>&copy; <?= date('Y') . ' ' . SITENAME; ?>. All rights reserved.</p>
            <p id="contact">
                Need help?
                <a href="https://api.whatsapp.com/send?phone=2348034530726&text=Hi,%20please%20i%20need%20help%20registering%20for%20MITRE!" target="_blank" rel="noopener">
                    Contact Support
                </a>
            </p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs"></script>
    <script>
        $(document).ready(function() {
            // Hide loader once DOM is ready
            $("#loader").fadeOut("slow");

            // Show loader again before unloading (e.g., navigating away)
            $(window).on("beforeunload", function() {
                $("#loader").show();
            });

            // Also catch internal link clicks for SPA-like behavior
            $("a").on("click", function(e) {
                var target = $(this).attr("target");
                // avoid opening in new tab/window
                if (!target || target === "_self") {
                    $("#loader").show();
                }
            });
        });
    </script>
</body>

</html>