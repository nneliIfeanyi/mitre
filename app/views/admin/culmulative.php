<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/top.php'; ?>
<?php require APPROOT . '/views/inc/admin/sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Added Scores</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
              <li class="breadcrumb-item active">Culmulative Scores</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">
<?php //EVERYTHING GOES HERE, Start coding from here.?>

<div class="card card-body">
  
  <div class="row">
    <div class="col-lg-6">
    <?= flash('msg')?>
    </div>
  </div>
    <form action="" method="POST" id="mark-add">
      <div class="row">
          <div class="col-lg-4">
            <div class="form-group shadow p-1">
              <label>Set:</label>
              <select name="set" required class="form-control">
                <option value="">Select set</option>
                <option value="<?= SENIOR?>"><?= SENIOR?></option>
                <option value="<?= JUNIOR?>"><?= JUNIOR?></option> 
              </select>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group shadow p-1">
              <label>Conclave:</label>
              <select name="conclave" required class="form-control">
                <option value="">---</option>
                <?php foreach ($data['conclaves'] as $conclave):?>
                  <option value="<?php echo $conclave->conclave;?>"><?php echo $conclave->conclave;?></option>
                 <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group shadow p-1">
              <label>Zone:</label>
              <select name="zone" required class="form-control">
                <option value="">Select zone</option>
                <option value="Ufuma">East</option>
                <option value="Minna">Niger</option>
                <option value="Kaduna">Kaduna</option>
              </select>
            </div>
          </div>
          <div class=" d-grid col-md-4 offset-md-4 my-1">
            <input type="submit" id="mark" class="btn btn-primary btn-block rounded-5 fw-bold" value="Submit">
          </div>
        </div>
      </form>

  </div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
<script>
$(function(){

    $('#mark-add').parsley();
    // $('#set').on('change', function(){
    //     var set = $(this).val();
    //     var senior = <?php echo SENIOR ?>;
    //     var junior = <?php echo JUNIOR ?>;
    //     if(set == junior){
    //        $('#conclave').html('<option value="<?php echo J_CONCLAVE ?>"><?php echo J_CONCLAVE ?></option>'); 
    //     }else if(set == senior){
    //         $('#conclave').html('<option value="<?php echo S_CONCLAVE ?>"><?php echo S_CONCLAVE ?></option>');
    //     }else{
    //       $('#conclave').html('<option value="">Choose..</option>');
    //     }
    // })


})

</script>
