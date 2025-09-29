<?php require APPROOT . '/views/admission/inc/header.php'; ?>
<?php require APPROOT . '/views/admission/inc/nav.php'; ?>
<?php require APPROOT . '/views/admission/inc/sidebar.php'; ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container-fluid py-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">Registrations</h3>
            </div>
            <table id="usersTable" class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Zone</th>
                        <th>Phone</th>
                        <th class="text-end">View</th>
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
                                <td><?php echo htmlspecialchars($user->mobile); ?></td>
                                <td class="text-end">
                                    <a href="<?php echo URLROOT; ?>/admission/profile/<?= $user->id ?>" class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></a>
                                    <!--  <a href="<?php echo URLROOT; ?>/" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                                    <a href="<?php echo URLROOT; ?>/" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php require APPROOT . '/views/admission/inc/footer.php'; ?>