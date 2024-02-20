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
            <h1 class="m-0">Add Mark</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
              <li class="breadcrumb-item active">Add Scores</li>
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
    <div class="col-12">
      
      <!-- <div class="text-center border py-3">
        <h2>Ministers Improvement And Training Retreat<span class="text-primary"> (MITRE)</span></h2>
        <p class="lead fs-6">Thresher's Team P.O. Box 7332, Kaduna 062245471</p>
          <div class="h2 text-primary">SET 16 REGISTRATION</div>
        <!-- <p>This form should be completed and submitted on or before 13 FEB. 2024</p> --
        
      </div> -->
      <form action="" method="POST" id="mark-add">

        <div class="col-lg-6">
          <?= flash('msg')?>
        </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group shadow p-1">
              <label>Set:</label>
              <select name="set" id="set" required class="form-control">
                <option value="">Select set</option>
                <option value="<?= SENIOR?>"><?= SENIOR?></option>
                <option value="<?= JUNIOR?>"><?= JUNIOR?></option> 
              </select>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group shadow p-1">
              <label>Conclave:</label>
              <select name="conclave" id="conclave" class="form-control">
                <option value="">---</option>
              </select>
            </div>
          </div>
          <div class="col-lg-3">
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
          <div class="col-lg-3">
            <div class="form-group shadow p-1">
              <label>Paper:</label>
              <select name="paper" required class="form-control">
                <option value="">Select paper</option>
                <option value="Summary">Summary</option>
                  <option value="short_paper">Short Paper</option>
                  <option value="long_paper">Long Paper</option>
                  <option value="term_paper">Term Paper</option>
            </select>
            </div>
          </div>
          <div class=" d-grid col-md-4 offset-md-4 my-2">
            <input type="submit" id="mark" class="btn btn-primary btn-block rounded-5 fw-bold" value="Add Mark">
          </div>
          
        </div>
      </form>
    </div>
    <div class="mt-3 col-12" id="msg"></div>
  </div>
</div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
<script>
$(function(){
 
    $('#set').on('change', function(){
        var set = $(this).val();
        var senior = <?php echo SENIOR ?>;
        var junior = <?php echo JUNIOR ?>;
        if(set == junior){
           $('#conclave').html('<option value="<?php echo J_CONCLAVE ?>"><?php echo J_CONCLAVE ?></option>'); 
        }else if(set == senior){
            $('#conclave').html('<option value="<?php echo S_CONCLAVE ?>"><?php echo S_CONCLAVE ?></option>');
        }else{
          $('#conclave').html('<option value="">Choose..</option>');
        }
    })


})

</script>
<script>
    $('#mark-add').parsley();
    $('#mark-add').on('submit', function(event){
        event.preventDefault();
        if($('#mark-add').parsley().isValid()){
            $.ajax({
                url: "<?php echo URLROOT; ?>/application/add_mark",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#mark').attr('disabled', 'disabled');
                    $('#mark').val('Fetching details, pls wait ......');

                },
                success:function (data) {
                    $('#mark-add').parsley().reset();
                    $('#mark').attr('disabled', false);
                    $('#mark').val('Mark');
                    $('#msg').html(data);
                }
            })
        }

    })
</script>


