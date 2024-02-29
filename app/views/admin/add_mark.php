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
<div class="card card-body">
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
               <th><b>Paper</b></th>
               <th><b>Action</b></th>
             </tr>
          </thead>

           <tbody>
           
            <tr>
             <td colspan="4" class="text-danger lead">No data to display, select above fields to add scores.</td>
               
            </tr>
           </tbody>
        </table>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
<script>
    $('#mark-add').parsley();
</script>



