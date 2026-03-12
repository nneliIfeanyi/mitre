<?php require APPROOT . '/views/admission/inc/header.php'; ?>
<?php require APPROOT . '/views/admission/inc/nav.php'; ?>
<?php require APPROOT . '/views/admission/inc/sidebar.php'; ?>
<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/admission">All Applications</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/admission/Kaduna">Kaduna Applications</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/admission/Ufuma">Ufuma Applications</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/admission/Minna">Minna Applications</a></li>
            </ul>
        </nav>
        <style>
            /* Bold and shadowed nav links inside pagetitle */
            .pagetitle {
                color: rgba(0, 0, 0, 0.85);
                /* slightly faded overall text */
            }

            .pagetitle .nav-tabs .nav-link {
                font-weight: 700;
                color: rgba(0, 0, 0, 0.85);
                text-shadow: 0 1px 2px rgba(0, 0, 0, .2);
            }

            .pagetitle .nav-tabs .nav-link:hover,
            .pagetitle .nav-tabs .nav-link.active {
                box-shadow: 0 0 5px rgba(0, 0, 0, .3);
            }
        </style>
    </div><!-- End Page Title -->
    <?php if ($data['zone'] == null): ?>
        <section class="section dashboard">
            <div class="container-fluid py-1">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0">All Applications</h3>
                </div>
                <div class="mb-2">
                    <input type="text" id="tableSearch" class="form-control" placeholder="Search applications...">
                </div>
                <table id="usersTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Zone</th>
                            <th>Status</th>
                            <th>Phone</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['registrations'])) : ?>
                            <?php $i = 1;
                            foreach ($data['registrations'] as $user) : ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo htmlspecialchars($user->surname . ' ' . $user->other_name); ?></td>
                                    <td><?php echo htmlspecialchars($user->zone); ?></td>
                                    <td><?php if ($user->status): ?>
                                            <span class="badge bg-success">admitted</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($user->mobile); ?></td>
                                    <td class="text-end">
                                        <?php if (!$user->status): ?>
                                            <a href="<?php echo URLROOT; ?>/admission/admit/<?= $user->id ?>" class="btn btn-sm btn-warning">Admit</a>
                                        <?php else: ?>
                                            <span class="badge bg-success">Admitted</span>
                                        <?php endif; ?>
                                        <a href="<?php echo URLROOT; ?>/admission/edit/<?= $user->id ?>" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                                        <a href="<?php echo URLROOT; ?>/admission/profile/<?= $user->id ?>" class="btn btn-sm btn-outline-dark"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    <?php endif; ?>
    <?php if ($data['zone'] == 'Kaduna'): ?>
        <section class="section dashboard">
            <div class="container-fluid py-1">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0">Kaduna Applications</h3>
                </div>
                <div class="mb-2">
                    <input type="text" id="tableSearch" class="form-control" placeholder="Search applications...">
                </div>
                <table id="usersTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Zone</th>
                            <th>Status</th>
                            <th>Phone</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['kaduna_zone'])) : ?>
                            <?php $i = 1;
                            foreach ($data['kaduna_zone'] as $user) : ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo htmlspecialchars($user->surname . ' ' . $user->other_name); ?></td>
                                    <td><?php echo htmlspecialchars($user->zone); ?></td>
                                    <td><?php if ($user->status): ?>
                                            <span class="badge bg-success">admitted</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($user->mobile); ?></td>
                                    <td class="text-end">
                                        <?php if (!$user->status): ?>
                                            <a href="<?php echo URLROOT; ?>/admission/admit/<?= $user->id ?>" class="btn btn-sm btn-warning">Admit</a>
                                        <?php else: ?>
                                            <span class="badge bg-success">Admitted</span>
                                        <?php endif; ?>
                                        <a href="<?php echo URLROOT; ?>/admission/edit/<?= $user->id ?>" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                                        <a href="<?php echo URLROOT; ?>/admission/profile/<?= $user->id ?>" class="btn btn-sm btn-outline-dark"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    <?php endif; ?>
    <?php if ($data['zone'] == 'Ufuma'): ?>
        <section class="section dashboard">
            <div class="container-fluid py-1">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0">Ufuma Applications</h3>
                </div>
                <div class="mb-2">
                    <input type="text" id="tableSearch" class="form-control" placeholder="Search applications...">
                </div>
                <table id="usersTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Zone</th>
                            <th>Status</th>
                            <th>Phone</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['ufuma_zone'])) : ?>
                            <?php $i = 1;
                            foreach ($data['ufuma_zone'] as $user) : ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo htmlspecialchars($user->surname . ' ' . $user->other_name); ?></td>
                                    <td><?php echo htmlspecialchars($user->zone); ?></td>
                                    <td><?php if ($user->status): ?>
                                            <span class="badge bg-success">admitted</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($user->mobile); ?></td>
                                    <td class="text-end">
                                        <?php if (!$user->status): ?>
                                            <a href="<?php echo URLROOT; ?>/admission/admit/<?= $user->id ?>" class="btn btn-sm btn-warning">Admit</a>
                                        <?php else: ?>
                                            <span class="badge bg-success">Admitted</span>
                                        <?php endif; ?>
                                        <a href="<?php echo URLROOT; ?>/admission/edit/<?= $user->id ?>" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                                        <a href="<?php echo URLROOT; ?>/admission/profile/<?= $user->id ?>" class="btn btn-sm btn-outline-dark"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    <?php endif; ?>
    <?php if ($data['zone'] == 'Minna'): ?>
        <section class="section dashboard">
            <div class="container-fluid py-1">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0">Minna Applications</h3>
                </div>
                <div class="mb-2">
                    <input type="text" id="tableSearch" class="form-control" placeholder="Search applications...">
                </div>
                <table id="usersTable" class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Zone</th>
                            <th>Status</th>
                            <th>Phone</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['minna_zone'])) : ?>
                            <?php $i = 1;
                            foreach ($data['minna_zone'] as $user) : ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo htmlspecialchars($user->surname . ' ' . $user->other_name); ?></td>
                                    <td><?php echo htmlspecialchars($user->zone); ?></td>
                                    <td><?php if ($user->status): ?>
                                            <span class="badge bg-success">admitted</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($user->mobile); ?></td>
                                    <td class="text-end">
                                        <?php if (!$user->status): ?>
                                            <a href="<?php echo URLROOT; ?>/admission/admit/<?= $user->id ?>" class="btn btn-sm btn-warning">Admit</a>
                                        <?php else: ?>
                                            <span class="badge bg-success">Admitted</span>
                                        <?php endif; ?>
                                        <a href="<?php echo URLROOT; ?>/admission/edit/<?= $user->id ?>" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                                        <a href="<?php echo URLROOT; ?>/admission/profile/<?= $user->id ?>" class="btn btn-sm btn-outline-dark"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('tableSearch');
            if (searchInput) {
                searchInput.addEventListener('keyup', function() {
                    var filter = this.value.toLowerCase();
                    var rows = document.querySelectorAll('#usersTable tbody tr');
                    rows.forEach(function(row) {
                        row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
                    });
                });
            }
        });
    </script>
</main>

<?php require APPROOT . '/views/admission/inc/footer.php'; ?>