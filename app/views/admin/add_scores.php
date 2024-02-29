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
            <h1 class="m-0 h3">Add <span class="text-primary"><?= $data['paper']; ?></span> Mark For Set <?= $data['mitre_set']; ?> <?= $data['zone']; ?> Zone</h1>
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
<div class="card card-body">
  <div class="col-lg-6">
    <?= flash('msg')?>
  </div>
  <div id="msg"></div>
  <form action="<?= URLROOT;?>/admin/add_scores" method="GET" id="mark-add">
      <div class="row">
          <div class="col-lg-3">
            <div class="form-group shadow p-1">
              <label>Set:</label>
              <select name="mitre_set" id="set" required class="form-control">
                <option value="">Select set</option>
                <option value="<?= SENIOR?>"><?= SENIOR?></option>
                <option value="<?= JUNIOR?>"><?= JUNIOR?></option> 
              </select>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group shadow p-1">
              <label>Conclave:</label>
               <select name="conclave" required class="form-control">
                  <option value="">Select conclave</option>
                  <?php foreach ($data['conclaves'] as $conclave):?>
                    <option value="<?php echo $conclave->conclave;?>"><?php echo $conclave->conclave;?></option>
                   <?php endforeach;?>
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

      <table class="table table-striped" id="eg">
          <thead>
             <tr class="">
               <th>#</th>
               <th><b>Name</b></th>
               <th><b><?= $data['paper']; ?></b></th>
               <th><b>Action</b></th>
             </tr>
          </thead>

           <tbody>
           <?php $numbering = 1; foreach($data['students'] as $student) : ?>
           
            <tr>
                <td><?php echo $numbering;?></td>
                <td><?php echo $student->fullname?></td>
                <?php if($data['added']):?>
                  <td><?php echo $data['added']->score?></td>
                  <td><button>Added</button></td>
                <?php else:?>
                  <form method="post" action="<?= URLROOT;?>/portal/add_mark" id="register_form">
                    <td><input type="" class="" required placeholder="Enter score"  name="score"></td>
                    <td>
                        <input type="hidden" name="std_id" value="<?= $student->id; ?>">
                        <input type="hidden" name="zone" value="<?= $student->zone; ?>">
                        <input type="hidden" name="fullname" value="<?= $student->fullname; ?>">
                        <input type="hidden" name="mitre_set" value="<?= $student->mitre_set; ?>">
                        <input type="hidden" name="conclave" value="<?= $data['conclave']; ?>">
                        <input type="hidden" name="paper" value="<?= $data['paper']; ?>">
                        <input type='submit' id="submit" name='method2' value='Mark' class='btn btn-dark'>
                    </td>
                  </form>
                <?php endif;?>
            </tr>
            <?php $numbering++; endforeach; ?>
           </tbody>
            <tfoot>
             <tr class="">
               <th>#</th>
               <th><b>Name</b></th>
               <th><b>Paper</b></th>
               <th><b>Action</b></th>
             </tr>
          </tfoot>
        </table>
      

    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
<script>
    $('#register_form').parsley();
    $('#register_form').on('submit', function(event){
        event.preventDefault();

        if($('#register_form').parsley().isValid()){
            let formData = $(this).serialize();
            $.ajax({
                url: "<?php echo URLROOT;?>/portal/add_mark",
                method: "POST",
                data: formData,
    
                beforeSend: function () {
                    $('#submit').attr('disabled', 'disabled');
                    $('#submit').val('Processing Submission, pls wait ......');

                },
                success:function (response) {
                    $('#register_form').parsley().reset();
                    $('#submit').attr('disabled', false);
                    $('#submit').val('Mark');
                    $('#msg').html(response);
                }
            })
        }

    })
</script>


