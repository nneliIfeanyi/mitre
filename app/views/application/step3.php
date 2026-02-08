<?php require APPROOT . '/views/application/inc/header.php'; ?>

<body class="">
  <!-- Page Loader -->
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
        <p class="fst-italic fw-bold">This form should be completed and submitted on or before 28 February, 2026</p>
      </div>
    </div>
  </section>
  <section>
    <div class="container my-5">

      <h2 class="mb-4">Passport Photograph</h2>
      <!-- Progress Saving Notice -->
      <div class="alert alert-info alert-dismissible fade show mt-4 shadow-sm" role="alert">
        <strong>Note!</strong> Passport photograph is required before final submission. <br>
        Accepted formats are: JPG, PNG, JPEG. Must not be more than 5MB. <br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php flash('msg'); ?>
      <form method="POST" action="<?= URLROOT; ?>/application/passport" enctype="multipart/form-data" data-parsley-validate>
        <input type="hidden" name="reg_id" value="<?= (empty($data['reg_id'])) ? '' : $data['reg_id']; ?>">
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
          <style>
            .copy-btn {
              cursor: pointer;
              color: #2563eb;
              text-decoration: underline;
            }

            /* Toast styling */
            .toast {
              visibility: hidden;
              min-width: 200px;
              background-color: #333;
              color: #fff;
              text-align: center;
              border-radius: 8px;
              padding: 12px;
              position: fixed;
              bottom: 30px;
              right: 30px;
              z-index: 1000;
              opacity: 0;
              transform: translateY(20px);
              transition: all 0.3s ease;
            }

            .toast.show {
              visibility: visible;
              opacity: 1;
              transform: translateY(0);
            }
          </style>
          <div id="toast" class="toast">Link copied!</div>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <img src="<?= URLROOT . '/' . $data['step3']->photo ?>" width="320" height="300" class="card-img-top" alt="passport-photograph">
                <div class="card-body">
                  <h5 class="card-title fw-bold" style="font-size: small;">You can re-upload to change the image before final submission.</h5>
                </div>
              </div><!-- End Card with an image on top -->
              <p class="mt-3">
                <span class="fw-bold fst-italic">
                  At this stage, if your referee is miles away you can forward link below to your referee, else you should go to him/her to fill in the details personally in the next section(Referee's Column).:
                </span>
                <span class="fst-italic">
                  (Click the link to Copy)
                </span> <br />
                <!-- Display the link -->
                <span class="copy-btn" id="copyLink"><?= URLROOT; ?>/application/referee/<?= $data['step3']->reg_id; ?></span>
              </p>
            </div>
          </div>
          <script>
            const copyLink = document.getElementById('copyLink');
            const toast = document.getElementById('toast');

            copyLink.addEventListener('click', () => {
              const textToCopy = copyLink.textContent;
              navigator.clipboard.writeText(textToCopy).then(() => {
                // Show toast
                toast.classList.add('show');
                setTimeout(() => toast.classList.remove('show'), 2000);
              });
            });
          </script>
          <div class="alert alert-info alert-dismissible fade show mt-4 shadow-sm" role="alert">
            <strong>Note!</strong> That link above is unique to your application. You can send it to your referee via WhatsApp, Email, SMS, or any other means.
            Only use this method if your referee is miles away. Your registration is incomplete until your referee fills in their details. <br>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
        <input type="hidden" name="reg_id" value="<?= (empty($data['reg_id'])) ? '' : $data['reg_id']; ?>">
        <div class="mb-3">
          <label class="text-bg-light badge">Referee's Full Name</label>
          <input type="text" value="<?= (empty($data['step3']->ref_name)) ? '' : $data['step3']->ref_name; ?>" name="ref_name" class="form-control" required data-parsley-trigger="keyup">
        </div>
        <div class="mb-3">
          <label class="text-bg-light badge">Referee's <span class="fst-italic">Whatsapp</span> Phone</label>
          <input type="number" value="<?= (empty($data['step3']->ref_phone)) ? '' : $data['step3']->ref_phone; ?>" name="ref_phone" class="form-control" required data-parsley-type="digits" data-parsley-length="[11,11]" data-parsley-length-message="Phone number must be exactly 11 digits." data-parsley-trigger="keyup">
        </div>
        <div class="mb-3">
          <label class="text-bg-light badge">Referee's Email</label><span style="font-size:xsmall">(optional)</span>
          <input type="email" value="<?= (empty($data['step3']->ref_email)) ? '' : $data['step3']->ref_email; ?>" name="ref_email" class="form-control" data-parsley-type="email">
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
            <?php if (!isset($_SESSION['admin'])): ?>
              <a href="<?= URLROOT; ?>/application/step2" class="btn btn-outline-dark me-3"><i class="bi bi-chevron-left"></i> Prev</a>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Update</button>
          <?php else : ?>
            <a href="<?= URLROOT; ?>/application/step2" class="btn btn-outline-dark"><i class="bi bi-chevron-left"></i> Prev</a>
            <button type="submit" class="btn btn-primary">Submit Details</button>
          <?php endif; ?>
        </div>
      </form>
      <?php if (!empty($data['step3']->photo) && !empty($data['step3']->church) && !empty($data['step3']->ref_name) && !isset($_SESSION['admin'])): ?>
        <div class="alert alert-info alert-dismissible fade show mt-4 shadow-sm" role="alert">
          <strong>Note!</strong> You can now submit your application!
        </div>
        <div class="d-flex justify-content-center m-4">
          <a href="<?= URLROOT; ?>/application/success/1" class="btn btn-primary rounded-3">Submit Application</a>
        </div>
      <?php endif; ?>
      <?php if (isset($_SESSION['admin'])): ?>
        <div class="d-flex justify-content-center m-4">
          <a href="<?= URLROOT; ?>/admission/profile/<?php echo $data['step3']->id; ?>" class="btn btn-primary rounded-3">Return</a>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <!-- Footer -->
  <?php require APPROOT . '/views/application/inc/footer.php'; ?>