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
    #flash-message {
      position: absolute;
      top: 20px;
      right: 20px;
      z-index: 9999;
      min-width: 250px;
      padding: 15px 20px;
      border-radius: 6px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
      opacity: 1;
      transition: opacity 0.8s ease;
    }

    #flash-message.fade-out {
      opacity: 0;
    }

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
        <p class="fst-italic fw-bold">This form should be completed and submitted on or before 31 January, 2026</p>
      </div>
    </div>
  </section>
  <section>
    <div class="container my-5">

      <h2 class="mb-4">Passport Photograph</h2>
      <!-- Progress Saving Notice -->
      <div class="alert alert-info alert-dismissible fade show mt-4 shadow-sm" role="alert">
        <strong>Note!</strong> Passport photograph is required before final submission. <br>
        Accepted formats are: JPG, PNG, JPEG. Must not be more than 2MB. <br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php flash('msg'); ?>
      <form method="POST" action="<?= URLROOT; ?>/application/passport" enctype="multipart/form-data" data-parsley-validate>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label class="text-bg-light badge">Passport Photograph</label>
              <input type="file" required accept="image/*" name="photo" class="form-control form-control-lg">
            </div>
          </div>
          <div class="col-md-6">
            <div class="m-4">
              <button type="submit" class="btn btn-primary rounded">Upload</button>
            </div>
          </div>
        </div>
        <!-- Use cookie to display the image -->
        <!-- Card with an image on top -->
        <?php if (!empty($data['step3']->photo)) : ?>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <img src="<?= URLROOT . '/' . $data['step3']->photo ?>" width="320" height="300" class="card-img-top" alt="passport-photograph">
                <div class="card-body">
                  <h5 class="card-title fw-bold" style="font-size: small;">You can re-upload to change the image before final submission.</h5>
                </div>
              </div><!-- End Card with an image on top -->
            </div>
          </div>
        <?php endif; ?>
      </form>
      <br />
      <hr /><br />
      <h2 class="mb-4">Referee's Column</h2>
      <div class="alert alert-info alert-dismissible fade show mt-4 shadow-sm" role="alert">
        <strong>Note!</strong> Do not serve as a referee for someone you do not know very well!
      </div>
      <form method="POST" action="<?= URLROOT; ?>/application/step3" data-parsley-validate>
        <div class="mb-3">
          <label class="text-bg-light badge">Referee's Full Name</label>
          <input type="text" value="<?= (empty($data['step3']->ref_name)) ? '' : $data['step3']->ref_name; ?>" name="ref_name" class="form-control" required data-parsley-trigger="keyup">
        </div>
        <div class="mb-3">
          <label class="text-bg-light badge">Referee's <span class="fst-italic">Whatsapp</span> Phone</label>
          <input type="number" value="<?= (empty($data['step3']->ref_phone)) ? '' : $data['step3']->ref_phone; ?>" name="ref_phone" class="form-control" required data-parsley-type="digits" data-parsley-length="[11,11]" data-parsley-length-message="Phone number must be exactly 11 digits." data-parsley-trigger="keyup">
        </div>
        <div class="mb-3">
          <label class="text-bg-light badge">Referee's Email</label>
          <input type="email" value="<?= (empty($data['step3']->ref_email)) ? '' : $data['step3']->ref_email; ?>" name="ref_email" class="form-control" required data-parsley-type="email">
        </div>
        <div class="mb-3">
          <label class="text-bg-light badge">Referee's Residential Address <span class="fst-italic">(includes town and state)</span></label>
          <textarea name="ref_address" class="form-control" required><?= (empty($data['step3']->ref_address)) ? '' : $data['step3']->ref_address; ?></textarea>
        </div>
        <div class="mb-3">
          <label class="text-bg-light badge">How long have you known each other?</label>
          <input type="text" value="<?= (empty($data['step3']->ref_duration)) ? '' : $data['step3']->ref_duration; ?>" name="ref_duration" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="text-bg-light badge">Why do you think the candidate should attend <span class="text-primary">MITRE</span> </label>
          <textarea name="ref_info" class="form-control"><?= (empty($data['step3']->ref_info)) ? '' : $data['step3']->ref_info; ?></textarea>
        </div>
        <div class="d-flex justify-content-center mt-4">
          <?php if (!empty($data['step3']->ref_name)) : ?>
            <a href="<?= URLROOT; ?>/application/step2" class="btn btn-outline-dark me-3"><i class="bi bi-chevron-left"></i> Prev</a>
            <button type="submit" class="btn btn-primary">Update</button>
          <?php else : ?>
            <a href="<?= URLROOT; ?>/application/step2" class="btn btn-outline-dark"><i class="bi bi-chevron-left"></i> Prev</a>
            <button type="submit" class="btn btn-primary">Save</button>
          <?php endif; ?>
        </div>
      </form>
      <?php if (!empty($data['step3']->photo) && !empty($data['step3']->church) && !empty($data['step3']->ref_name)) : ?>
        <form action="<?php echo URLROOT ?>/application/submit" method="post">
          <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-outline-primary rounded-5 fw-bold">Submit Application <i class="bi bi-send fs-5"></i></button>
          </div>
        </form>
      <?php endif; ?>
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
    });
    // Auto-dismiss flash message after 5 seconds
    setTimeout(function() {
      var flashMessage = document.getElementById('flash-message');
      if (flashMessage) {
        flashMessage.classList.add('fade-out');
        setTimeout(function() {
          flashMessage.remove();
        }, 800); // Match the CSS transition duration
      }
    }, 5000); // 5 seconds
  </script>
</body>

</html>