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
            <div class="text-center shadow p-4">
                <h3 class="text-warning">Warning</h3>
                 <p class="lead fst-italic">
                    You are about to edit and update registered details of <span class="text-primary fw-bold">
                        <?php echo $data['name'];?>
                    </span>
                 </p>
                 <a href="<?php echo URLROOT; ?>/application/step1?reg_id=<?= $data['reg_id']?>" class="btn btn-warning"> Step1</a>
                 <a href="<?php echo URLROOT; ?>/application/step2?reg_id=<?= $data['reg_id']?>" class="btn btn-warning"> Step2</a>
                 <a href="<?php echo URLROOT; ?>/application/step3?reg_id=<?= $data['reg_id']?>" class="btn btn-warning"> Passport</a>
                 <a href="<?php echo URLROOT; ?>/application/step3?reg_id=<?= $data['reg_id']?>" class="btn btn-warning"> Referal</a>
                 <a href="<?php echo URLROOT;?>/admission/profile/<?= $data['user']->id;?>" class="btn btn-dark" >Return</a>
            </div>
        </div>
    </section>
</main>

<?php require APPROOT . '/views/admission/inc/footer.php'; ?>