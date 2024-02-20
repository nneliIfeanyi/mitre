<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/top.php'; ?>
<?php require APPROOT . '/views/inc/admin/sidebar.php'; ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">General Settings </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo URLROOT;?>/admin">Home</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div id="msg"></div>
                    <div class="col-lg-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Mitre Administrative General Settings </h3>
                            </div>

                            <form action="" class="form-horizontal" id="settings" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Current Senior Set
                                           <span data-toggle="tooltip" title="Enter Current Mitre Senior Set" style="font-size: 11px; position:relative; top: -1px;">
                                               <i class="fa fa-question-circle"></i>
                                           </span>
                                        </label>

                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" required name="senior_set" value="<?php echo SENIOR; ?>" data-parsley-trigger ='keyup'>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Current Junior Set
                                           <span data-toggle="tooltip" title="Enter Current Mitre Junior Set" style="font-size: 11px; position:relative; top: -1px;">
                                               <i class="fa fa-question-circle"></i>
                                           </span>
                                        </label>

                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" required name="junior_set" value="<?php echo JUNIOR; ?>" data-parsley-trigger ='keyup'>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Current Senior Conclave
                                           <span data-toggle="tooltip" title="Enter Current Mitre Senior Set Conclave" style="font-size: 11px; position:relative; top: -1px;">
                                               <i class="fa fa-question-circle"></i>
                                           </span>
                                        </label>

                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" required name="s_conclave" value="<?php echo S_CONCLAVE; ?>" data-parsley-trigger ='keyup'>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Current Junior Conlave
                                           <span data-toggle="tooltip" title="Enter Current Mitre Junior Set Conclave" style="font-size: 11px; position:relative; top: -1px;">
                                               <i class="fa fa-question-circle"></i>
                                           </span>
                                        </label>

                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" required name="j_conclave" value="<?php echo J_CONCLAVE; ?>" data-parsley-trigger ='keyup'>
                                        </div>
                                    </div>
                                    <div class=" d-grid col-md-6 offset-md-3 my-3">
                                      <input type="submit" id="mark" class="btn btn-primary btn-block rounded-5 fw-bold" value="Update settings">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>

<script>
    $('#settings').parsley();
    $('#settings').on('submit', function(event){
        event.preventDefault();
        if($('#settings').parsley().isValid()){
            $.ajax({
                url: "<?php echo URLROOT; ?>/portal/settings",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#mark').attr('disabled', 'disabled');
                    $('#mark').val('Updating settings, pls wait ......');

                },
                success:function (data) {
                    $('#settings').parsley().reset();
                    $('#mark').attr('disabled', false);
                    $('#mark').val('Settings Updated');
                    $('#msg').html(data);
                }
            })
        }

    })
</script>
