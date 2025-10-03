<?php require APPROOT . '/views/application/inc/header.php'; ?>
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
        <a href="<?= URLROOT; ?>/application/step1" class="btn btn-primary btn-lg px-5 rounded-pill">
          Start Application
        </a>
        <a href="<?= URLROOT; ?>/application#criteria" class="btn btn-outline-light btn-lg px-5 rounded-pill">
          Read Admission Criteria
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
        <a href="<?= URLROOT; ?>/application/step1" class="btn btn-primary btn-lg rounded-pill px-5">
          Apply Now
        </a>
      </div>

      <!-- Progress Saving Notice -->
      <div class="alert alert-info alert-dismissible fade show mt-4 shadow-sm" role="alert">
        <strong>Note!</strong> Your application progress is automatically saved. You can close your browser and return later to continue where you left off. Do not be in a hurry!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  </section>

  <!-- Footer -->
   <?php require APPROOT . '/views/application/inc/footer.php'; ?>