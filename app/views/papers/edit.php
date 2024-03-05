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
            <h1 class="m-0 h3">Edit <?= $data['mark']->paper ?> Score for <?= $data['mark']->name ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
              <li class="breadcrumb-item active">Edit Score</li>
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
			<div class="col-md-6">
				<h5><?= flash('msg') ?></h5>
				<div class="card card-body">
					<form class="p-2" method="post" action="">
						<input type="number" name="new_mark" class="form-control mb-2" value="<?= $data['mark']->score?>">
						<button type="submit" class="btn btn-primary">Update Score</button>
						<a href="<?php echo URLROOT?>/papers/<?= $data['mark']->paper?>_<?= $data['mark']->zone?>/<?= $data['mark']->mitre_set?>" class="btn btn-dark "><i class="fas fa-backward"></i> Back</a>
					</form>
		   		</div>
		   	</div>
		   </div>
  	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>