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
        <p class="fst-italic fw-bold">This form should be completed and submitted on or before 31 January, 2026</p>
      </div>
    </div>
  </section>
  <section>
    <div class="container my-5">
      <?php flash('msg'); ?>
      <h2 class="mb-4">Referee's Column 
        <span class="fs-5 fst-italic text-secondary">
            (For <?= htmlspecialchars($data['details']->surname . ' '. $data['details']->other_name); ?>)
        </span>
      </h2>
      <div class="alert alert-info alert-dismissible fade show mt-4 shadow-sm" role="alert">
        <strong>Note!</strong> Do not serve as a referee for someone you do not know very well!
      </div>
      <form method="POST" action="<?= URLROOT; ?>/application/ref_link_submit" data-parsley-validate>
        <input type="hidden" name="reg_id" value="<?php echo $data['details']->reg_id;?>">
        <div class="mb-3">
          <label class="text-bg-light badge">Referee's Full Name</label>
          <input type="text" value="" name="ref_name" class="form-control" required data-parsley-trigger="keyup">
        </div>
        <div class="mb-3">
          <label class="text-bg-light badge">Referee's <span class="fst-italic">Whatsapp</span> Phone</label>
          <input type="number" value="" name="ref_phone" class="form-control" required data-parsley-type="digits" data-parsley-length="[11,11]" data-parsley-length-message="Phone number must be exactly 11 digits." data-parsley-trigger="keyup">
        </div>
        <div class="mb-3">
          <label class="text-bg-light badge">Referee's Email</label>
          <input type="email" value="" name="ref_email" class="form-control" required data-parsley-type="email">
        </div>
        <div class="mb-3">
          <label class="text-bg-light badge">Referee's Residential Address <span class="fst-italic">(includes town and state)</span></label>
          <textarea name="ref_address" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
          <label class="text-bg-light badge">How long have you known each other?</label>
          <input type="text" name="ref_duration" value="" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="text-bg-light badge">Why do you think the candidate should attend <span class="text-primary">MITRE</span> </label>
          <textarea name="ref_info" class="form-control"></textarea>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary rounded-3">Submit Application</button>
        </div>
      </form>
    </div>
  </section>
  <!-- Footer -->
   <?php require APPROOT . '/views/application/inc/footer.php'; ?>