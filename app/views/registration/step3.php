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

  <title><?= SITENAME; ?> - Registration Portal</title>
  <style>
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
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#"><?= SITENAME; ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="<?= URLROOT; ?>/registration">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= URLROOT; ?>/registration#criteria">Admission Criteria</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= URLROOT; ?>/registration#contact">Contact</a></li>
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
      <h2 class="mb-4">Passport Photograph</h2>
      <form method="POST" action="<?= URLROOT; ?>/registration/passport" enctype="multipart/form-data" data-parsley-validate>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label class="text-bg-light badge">Passport Photograph</label>
              <input type="file" name="photo" class="form-control form-control-lg">
            </div>
          </div>
          <div class="col-md-6">
            <div class="m-4">
              <button type="submit" class="btn btn-primary rounded">Upload</button>
            </div>
          </div>
        </div>

      </form>
      <br />
      <hr /><br />
      <h2 class="mb-4">Referee's Column</h2>
      <div class="alert alert-info alert-dismissible fade show mt-4 shadow-sm" role="alert">
        <strong>Note!</strong> Do not serve as a referee for someone you do not know very well!
      </div>
      <form method="POST" action="<?= URLROOT; ?>/registration/step3" data-parsley-validate>
        <div class="mb-3">
          <label class="text-bg-light badge">Referee's Name</label>
          <input type="text" value="<?= (empty($data['step3']->ref_name)) ? '' : $data['step3']->ref_name; ?>" name="ref_name" class="form-control" required data-parsley-trigger="keyup">
        </div>
        <div class="mb-3">
          <label class="text-bg-light badge">Referee's Phone</label>
          <input type="number" value="<?= (empty($data['step3']->ref_phone)) ? '' : $data['step3']->ref_phone; ?>" name="ref_phone" class="form-control" required data-parsley-type="digits" data-parsley-length="[11,11]" data-parsley-length-message="Phone number must be exactly 11 digits." data-parsley-trigger="keyup">
        </div>
        <div class="mb-3">
          <label class="text-bg-light badge">Referee's Email</label>
          <input type="email" value="<?= (empty($data['step3']->email)) ? '' : $data['step3']->email; ?>" name="ref_email" class="form-control" required data-parsley-type="email">
        </div>
        <div class="mb-3">
          <label class="text-bg-light badge">Referee's Address</label>
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
          <a href="<?= URLROOT; ?>/registration/step2" class="btn btn-outline-dark">Previous</a>
          <button type="submit" class="btn btn-primary">Submit Registration</button>
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
  <script src="https://cdn.jsdelivr.net/npm/parsleyjs"></script>
</body>

</html>