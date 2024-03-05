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
                <div class="row"><h3 class="col-lg-6"><?php flash('msg');?></h3></div>
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
                                            <select name="s_conclave" class="form-control">
                                            <option value="<?php echo S_CONCLAVE;?>"><?php echo S_CONCLAVE;?></option>
                                            <?php foreach ($data['conclaves'] as $conclave):?>
                                              <option value="<?php echo $conclave->conclave;?>"><?php echo $conclave->conclave;?></option>
                                             <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Current Junior Conlave
                                           <span data-toggle="tooltip" title="Enter Current Mitre Junior Set Conclave" style="font-size: 11px; position:relative; top: -1px;">
                                               <i class="fa fa-question-circle"></i>
                                           </span>
                                        </label>

                                        <div class="col-sm-9">
                                            <select name="j_conclave" class="form-control">
                                            <option value="<?php echo J_CONCLAVE;?>"><?php echo J_CONCLAVE;?></option>
                                            <?php foreach ($data['conclaves'] as $conclave):?>
                                              <option value="<?php echo $conclave->conclave;?>"><?php echo $conclave->conclave;?></option>
                                             <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" d-grid col-md-6 offset-md-3 my-3">
                                      <input type="submit" id="mark" class="btn btn-primary btn-block rounded-5 fw-bold" value="Update settings">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-body">
                            <div class="card-header mb-3">
                                <h3 class="card-title font-weight-bold">Reg-No Auto Generate</h3>
                            </div>
                            <div class="row">
                                <p class="col-6"><a class="btn btn-outline-info" href="<?php echo URLROOT?>/admin/reg_no/<?php echo JUNIOR?>">Set <?= JUNIOR;?> Registration numbers</a></p>
                                <p class="col-6"><a class="btn btn-success" href="<?php echo URLROOT?>/admin/reg_no/<?php echo SENIOR?>">Set <?= SENIOR;?> Registration numbers</a></p>
                            </div>
                            <div class="card-footer my-3">
                                <p class="fs-5">A 5 digit number, being a combination of the student's set and serial number, click above buttons to generate.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        
                        <div class="card card-danger">
                            <div class="card-header mb-3">
                                <h3 class="card-title font-weight-bold">Change Admin Password</h3>
                            </div>
                            <form class="p-2 mb-3" action="<?php echo URLROOT?>/admin/password" method="POST" id="password">
                                <input type="password" name="new-password" required class="form-control mb-3" placeholder="New Password">
                                <div class="mb-3">
                                    <label>Security Question:</label>
                                    <input type="password" placeholder="Your answer" required name="answer" class="form-control">
                                </div>
                                <input type="submit" name="change-password" value="Update" class="btn btn-success">
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


<script>
    $('#password').parsley();
</script>
