<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="content">
    <div class="container-fluid">
        <?php if (!isset($_COOKIE['student-id'])) : ?>
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row text-center text-primary mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0">You need to login to access this feature</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <h2><?php echo flash('msg'); ?></h2>
                    <div class="card card-body bg-light mt-1 mb-5">
                        <h1 class="text-primary">Add profile photo</h1>
                        <?php if (empty($_COOKIE['photo-now'])) : ?>
                            <p class="p-2 text-center" style="width: 50%;"><i class="fa fa-user fa-5x"></i></p>
                        <?php else : ?>
                            <div class="">
                                <img src="<?= URLROOT; ?>/<?= $_COOKIE['photo-now']; ?>" alt="Just uploaded image" width="100%" height="300">
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo URLROOT; ?>/students/edit_profile_pic" method="post" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <input type="file" name="photo" required class="form-control form-control-lg">
                            </div>

                            <div class="row mt-5">
                                <div class="col-6">
                                    <input type="submit" name="upload" class="btn btn-primary rounded-3" value="Upload">
                                </div>

                        </form>

                        <div class="col-6">
                            <a href="javascript:void" onclick="history.back()" class="btn btn-dark rounded-3">Go back</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div><!-- /.container-fluid -->
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
    $('#register_form').parsley();
</script>