<?php require APPROOT . '/views/admission/inc/header.php'; ?>
<?php require APPROOT . '/views/admission/inc/nav.php'; ?>
<?php require APPROOT . '/views/admission/inc/sidebar.php'; ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo URLROOT ?>/admission">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow-lg border-0 rounded-3">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="bi bi-person-circle"></i> Candidate Details</h5>
                            <a href="<?php echo URLROOT; ?>/admission" class="btn btn-light btn-sm">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>
                        </div>

                        <div class="card-body text-center">
                            <!-- Profile Photo -->
                            <div class="mb-4">
                                <?php
                                $photo = !empty($data['user']->photo)
                                    ? URLROOT . "/" . $data['user']->photo
                                    : "https://via.placeholder.com/150x150.png?text=No+Photo";
                                ?>
                                <a href="<?php echo $photo; ?>" download>
                                    <img src="<?php echo $photo; ?>" alt="Profile Photo" class="rounded-circle shadow-sm" width="150" height="150">
                                </a>
                            </div>

                            <!-- User Details -->
                            <div class="text-start px-3">
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Full Name:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->surname . ' ' . $data['user']->other_name); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Reg. No:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->reg_no); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Email:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->email); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Whatsapp Phone:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->mobile); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Alternative Phone:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->alt_no); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Age | Gender</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->age . ' | ' . $data['user']->gender); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Marital Status:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->marital_status); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">State:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->state); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Zone:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->zone); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Address:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->address); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Occupation:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->occupation); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Lang. Speak:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->lang_speak); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Lang. Write:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->lang_write); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Litracy:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->litracy); ?></div>
                                </div>

                                <hr class="shadow-sm">

                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Church:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->church); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Post:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->post); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Born Again:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->born_again); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Holy Ghost Baptism:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->baptism); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Calling:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->calling); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">In_Calling:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->in_calling); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Entered Calling:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->entered_calling); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Attended Mitre:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->attended_mitre); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Why Mitre:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->why_mitre); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Spiritual Oversight:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->oversight); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Highest Certificate:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->certificate); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Cert. Year:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->cert_year); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Institution:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->institution); ?></div>
                                </div>

                                <hr class="shadow-sm">
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Referee:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->ref_name); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Referee Phone:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->ref_phone); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Referee Email:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->ref_email); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Referee Address:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->ref_address); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Relationship:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->ref_duration); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Referee Opinion:</div>
                                    <div class="col-sm-8"><?php echo htmlspecialchars($data['user']->ref_info); ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4 fw-bold">Date Registered:</div>
                                    <div class="col-sm-8"><?php echo date("Y-m-d H:i", strtotime($data['user']->created_at)); ?></div>
                                </div>
                                <!-- Add more DB fields here -->
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <!-- <a href="javascript:void" data-bs-toggle="modal" data-bs-target="#admit<?php echo $data['user']->id; ?>" class="btn btn-primary">
                             Admit
                            </a> -->
                            <a href="<?php echo URLROOT; ?>/admission/edit/<?php echo $data['user']->id; ?>" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <a href="javascript:void" data-bs-toggle="modal" data-bs-target="#class<?php echo $data['user']->id; ?>" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Delete Modal -->
    <div class="modal fade" id="class<?php echo $data['user']->id; ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure to delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="lead fw-bold fst-italic">This action cannot be reversed.</p>
                </div>
                <div class="modal-footer">
                    <div class="d-flex gap-4">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        <form method="POST" action="<?php echo URLROOT; ?>/admission/delete/<?php echo $data['user']->id; ?>">
                            <input class="btn btn-danger" type="submit" value="Yes Continue">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Delete Modal -->

    <!-- Admit Modal -->
    <div class="modal fade" id="admit<?php echo $data['user']->id; ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure to Admit <span class="text-primary fw-semibold">
                            <?php echo $data['user']->surname . ' ' . $data['user']->other_name; ?>
                        </span> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="lead fw-bold fst-italic">This action would trigger and send SMS to the candidate.</p>
                </div>
                <div class="modal-footer">
                    <div class="d-flex gap-4">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        <a href="<?php echo URLROOT; ?>/admission/admit/<?php echo $data['user']->id; ?>" class="btn btn-success">Yes Continue</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Admit Modal -->
</main>

<?php require APPROOT . '/views/admission/inc/footer.php'; ?>