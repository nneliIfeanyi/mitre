<?php require APPROOT . '/views/admission/inc/header.php'; ?>
<?php require APPROOT . '/views/admission/inc/nav.php'; ?>
<?php require APPROOT . '/views/admission/inc/sidebar.php'; ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Export Registrations</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/admission">Home</a></li>
                <li class="breadcrumb-item active">Export</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="container-fluid py-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">All Registrants</h3>
            </div>

            <!-- DataTables CSS (local) -->
            <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/dataTables.bootstrap5.min.css">
            <link rel="stylesheet" href="<?php echo URLROOT; ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

            <style>
                /* Make DataTables Buttons more visible */
                .dt-btn {
                    color: antiquewhite !important;
                    font-weight: 700 !important;
                    padding: 8px 12px !important;
                    margin-right: 6px !important;
                }

                .dt-btn:focus {
                    box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25);
                }

                #exportTable_wrapper .dt-buttons {
                    margin-bottom: 12px;
                }

                /* Ensure table is scrollable on small screens */
                .table-responsive {
                    overflow-x: auto;
                }
            </style>

            <div class="table-responsive">
                <table id="exportTable" class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Reg No</th>
                            <th>Full Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Marital Status</th>
                            <th>State</th>
                            <th>Zone</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Alt Phone</th>
                            <th>Email</th>
                            <th>Church</th>
                            <th>Post</th>
                            <th>Born Again</th>
                            <th>Baptism</th>
                            <th>Calling</th>
                            <th>In Calling</th>
                            <th>Entered Calling</th>
                            <th>Attended MITRE</th>
                            <th>Why MITRE</th>
                            <th>Occupation</th>
                            <th>Lang Speak</th>
                            <th>Lang Write</th>
                            <th>Litracy</th>
                            <th>Certificate</th>
                            <th>Cert Year</th>
                            <th>Institution</th>
                            <th>Oversight</th>
                            <th>Ref Name</th>
                            <th>Ref Phone</th>
                            <th>Ref Address</th>
                            <th>Ref Email</th>
                            <th>Ref Duration</th>
                            <th>Ref Info</th>
                            <th>Registered At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['registrations'])) : ?>
                            <?php $i = 1;
                            foreach ($data['registrations'] as $user) : ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo htmlspecialchars($user->reg_no ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars(($user->surname ?? '') . ' ' . ($user->other_name ?? '')); ?></td>
                                    <td><?php echo htmlspecialchars($user->age ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->gender ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->marital_status ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->state ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->zone ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->address ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->mobile ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->alt_no ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->email ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->church ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->post ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->born_again ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->baptism ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->calling ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->in_calling ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->entered_calling ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->attended_mitre ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->why_mitre ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->occupation ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->lang_speak ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->lang_write ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->litracy ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->certificate ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->cert_year ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->institution ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->oversight ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->ref_name ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->ref_phone ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->ref_address ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->ref_email ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->ref_duration ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($user->ref_info ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars(isset($user->created_at) ? date('Y-m-d H:i', strtotime($user->created_at)) : ''); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- DataTables & Buttons JS (local) -->
            <script src="<?php echo URLROOT; ?>/js/jquery.js"></script>
            <script src="<?php echo URLROOT; ?>/js/jquery.dataTables.min.js"></script>
            <script src="<?php echo URLROOT; ?>/js/dataTables.bootstrap5.min.js"></script>

            <script src="<?php echo URLROOT; ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
            <script src="<?php echo URLROOT; ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
            <script src="<?php echo URLROOT; ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
            <script src="<?php echo URLROOT; ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>

            <script src="<?php echo URLROOT; ?>/plugins/jszip/jszip.min.js"></script>
            <script src="<?php echo URLROOT; ?>/plugins/pdfmake/pdfmake.min.js"></script>
            <script src="<?php echo URLROOT; ?>/plugins/pdfmake/vfs_fonts.js"></script>

            <script>
                $(document).ready(function() {
                    var table = $('#exportTable').DataTable({
                        dom: "Bfrtip",
                        buttons: [{
                                extend: 'copyHtml5',
                                text: 'Copy',
                                className: 'dt-btn btn btn-sm btn-outline-secondary'
                            },
                            {
                                extend: 'excelHtml5',
                                text: 'Excel',
                                className: 'dt-btn btn btn-sm btn-outline-success'
                            },
                            {
                                extend: 'print',
                                text: 'Print',
                                className: 'dt-btn btn btn-sm btn-outline-info'
                            },
                            {
                                extend: 'pdfHtml5',
                                text: 'PDF',
                                className: 'dt-btn btn btn-sm btn-outline-danger',
                                orientation: 'landscape',
                                pageSize: 'A4'
                            }
                        ],
                        order: [
                            [0, 'desc']
                        ],
                        responsive: true
                    });

                    // Move buttons to a nicer location if needed
                    table.buttons().container().appendTo('#exportTable_wrapper .col-md-6:eq(0)');
                });
            </script>

        </div>
    </section>
</main>

<?php require APPROOT . '/views/admission/inc/footer.php'; ?>