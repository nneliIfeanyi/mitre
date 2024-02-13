<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/top.php'; ?>
<?php require APPROOT . '/views/inc/admin/sidebar.php'; ?>
<?php if ($data['set'] == JUNIOR ): ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Minna Students Set <span class="badge bg-primary"><?= $data['set']?></span></h1>
            <p>A Total of <span class="text-primary"><?php echo $this->databaseModel->totalMinna($data['set']);?></span> Registered</p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
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
  <nav>
    <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist" style="font-weight: bold;">
      <a href="<?php echo URLROOT?>/admin/kaduna/<?php echo $data['set']?>" class="nav-link" 
          id="nav-kaduna-tab" 
          type="button" role="tab" >Kaduna Zone
      </a>
      <a href="<?php echo URLROOT?>/admin/ufuma/<?php echo $data['set']?>" class="nav-link" 
          id="nav-ufuma-tab" 
          type="button" role="tab" >Ufuma Zone
      </a>
      <a href="<?php echo URLROOT?>/admin/minna/<?php echo $data['set']?>" class="active nav-link" 
          id="nav-minna-tab" 
          type="button" role="tab" >Minna Zone
      </a>
      <a href="<?php echo URLROOT?>/admin/students/<?php echo $data['set']?>" class="nav-link" 
          id="nav-collective-tab" 
          type="button" role="tab" >Collective
      </a>
    </div>
  </nav>
<h3 class="text-primary"><?php flash('del_msg'); ?></h3>
        <table class="table table-striped" id="eg">
          <thead>
             <tr class="">
               <th>S/N</th>
               <th><b>Name</b></th>
               <th><b>Phone</b></th>
               <th><b>WhatsApp_num</b></th>
               <th><b>Image</b></th>
               <th><b>Region</b></th>
               <th><b>Zone</b></th>
               <th><b>Address</b></th>
               <th><b>Email</b></th>
               <th><b>Church</b></th>
               <th><b>B.A:H_baptism</b></th>
               <th><b>Calling</b></th>
               <th><b>Into_call:When</b></th>
               <th><b>Prior:Reason</b></th>
               <th><b>Occupation</b></th>
               <th><b>lang_speak</b></th>
               <th><b>lang_write</b></th>
               <th><b>Litracy</b></th>
               <th><b>Academics</b></th>
               <th><b>Oversight</b></th>
               <th><b>Referal</b></th>
               <th><b>Ref_address</b></th>
               <th><b>Ref_phone</b></th>
               <th><b>relationship</b></th>
               <th><b>Reg_dateTime</b></th>
               <th><b>Action</b></th>
             </tr>
          </thead>

           <tbody>
           <?php $numbering = 1; foreach($data['students'] as $student) : ?>
            <tr>
                <td><?php echo $numbering;?></td>
                <td><?php echo $student->fullname?></td>
                <td><?php echo $student->mobile_num?></td>
                <td><a href="https://wa.me/<?= $student->whatsApp_num;?>" class="btn btn-sm"><i class="fab fa-whatsapp" aria-hidden="true"></i> <?php echo $student->whatsApp_num?></a></td>
                
                <td>
                  <a href="<?php echo URLROOT .'/'. $student->passport?>">
                  <img src="<?php echo URLROOT .'/'. $student->passport?>" alt="profile-pic" class="rounded-circle" style="height: 90px;width:90px;">

                  </a>
                </td>
                <td><?php echo $student->s_o_r?></td>
                <td><?php echo $student->zone?></td>
                <td><?php echo $student->address?></td>
                <td><?php echo $student->email?></td>
                <td><?php echo $student->church?></td>

                <td><?php echo $student-> spiritual?></td>
                <td><?php echo $student-> calling?></td>
                <td><?php echo $student->into_call?></td>
                <td><?php echo $student-> prior_attended?></td>
                <td><?php echo $student-> occupation?></td>
                <td><?php echo $student->lang_speak?></td>
                <td><?php echo $student->lang_write?></td>
                <td><?php echo $student->litracy?></td>
                <td><?php echo $student->academics?></td>
                <td><?php echo $student->discipler?></td>
                <td><?php echo $student->refered_by?></td>
                <td><?php echo $student->address_2?></td>
                <td><?php echo $student->phone?></td>
                <td><?php echo $student->relationship?></td>
                <td><?php echo $student->created_at?></td>
                <td><a class="" href="<?php echo URLROOT; ?>/admin/more_details/<?php echo $student->id; ?>">More</a></td>

            </tr>
            <?php $numbering++; endforeach; ?>
           </tbody>
           <tfoot>
             <tr class="">
               <th>S/N</th>
               <th><b>Name</b></th>
               <th><b>Phone</b></th>
               <th><b>WhatsApp_num</b></th>
               <th><b>Image</b></th>
               <th><b>Region</b></th>
               <th><b>Zone</b></th>
               <th><b>Address</b></th>
               <th><b>Email</b></th>
               <th><b>Church</b></th>
               <th><b>B.A:H_baptism</b></th>
               <th><b>Calling</b></th>
               <th><b>Into_call:When</b></th>
               <th><b>Prior:Reason</b></th>
               <th><b>Occupation</b></th>
               <th><b>lang_speak</b></th>
               <th><b>lang_write</b></th>
               <th><b>Litracy</b></th>
               <th><b>Academics</b></th>
               <th><b>Oversight</b></th>
               <th><b>Referal</b></th>
               <th><b>Ref_address</b></th>
               <th><b>Ref_phone</b></th>
               <th><b>relationship</b></th>
               <th><b>Reg_dateTime</b></th>
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
<?php elseif($data['set'] == SENIOR):?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">All Minna Students Set <span class="badge bg-primary"><?= $data['set']?></span></h1>
            <p>A Total of <span class="text-primary"><?php echo $this->databaseModel->totalMinna($data['set']);?></span> Registered</p>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= URLROOT ;?>/admin">Home</a></li>
                <li class="breadcrumb-item active">Students</li>
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
    <nav>
      <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist" style="font-weight: bold;">
        <a href="<?php echo URLROOT?>/admin/kaduna/<?php echo $data['set']?>" class="nav-link" 
            id="nav-kaduna-tab" 
            type="button" role="tab" >Kaduna Zone
        </a>
        <a href="<?php echo URLROOT?>/admin/ufuma/<?php echo $data['set']?>" class="nav-link" 
            id="nav-ufuma-tab" 
            type="button" role="tab" >Ufuma Zone
        </a>
        <a href="<?php echo URLROOT?>/admin/minna/<?php echo $data['set']?>" class="active nav-link" 
            id="nav-minna-tab" 
            type="button" role="tab" >Minna Zone
        </a>
        <a href="<?php echo URLROOT?>/admin/students/<?php echo $data['set']?>" class="nav-link" 
            id="nav-collective-tab" 
            type="button" role="tab" >Collective
        </a>
      </div>
    </nav>
  <h3 class="text-primary"><?php flash('del_msg'); ?></h3>
          <table class="table table-striped" id="eg">
            <thead>
               <tr class="">
                 <th>S/N</th>
                 <th><b>Name</b></th>
                 <th><b>Phone</b></th>
                 <th><b>WhatsApp_num</b></th>
                 <th><b>Image</b></th>
                 <th><b>Region</b></th>
                 <th><b>Zone</b></th>
                 <th><b>Address</b></th>
                 <th><b>Email</b></th>
                 <th><b>Church</b></th>
                 <th><b>B.A:H_baptism</b></th>
                 <th><b>Calling</b></th>
                 <th><b>Into_call:When</b></th>
                 <th><b>Prior:Reason</b></th>
                 <th><b>Occupation</b></th>
                 <th><b>lang_speak</b></th>
                 <th><b>lang_write</b></th>
                 <th><b>Litracy</b></th>
                 <th><b>Academics</b></th>
                 <th><b>Oversight</b></th>
                 <th><b>Referal</b></th>
                 <th><b>Ref_address</b></th>
                 <th><b>Ref_phone</b></th>
                 <th><b>relationship</b></th>
                 <th><b>Reg_dateTime</b></th>
                 <th><b>Action</b></th>
               </tr>
            </thead>

             <tbody>
             <?php $numbering = 1; foreach($data['students'] as $student) : ?>
              <tr>
                  <td><?php echo $numbering;?></td>
                  <td><?php echo $student->fullname?></td>
                  <td><?php echo $student->mobile_num?></td>
                  <td><a href="https://wa.me/<?= $student->whatsApp_num;?>" class="btn btn-sm"><i class="fab fa-whatsapp" aria-hidden="true"></i> <?php echo $student->whatsApp_num?></a></td>
                  
                  <td>
                    <a href="<?php echo URLROOT .'/'. $student->passport?>">
                    <img src="<?php echo URLROOT .'/'. $student->passport?>" alt="profile-pic" class="rounded-circle" style="height: 90px;width:90px;">

                    </a>
                  </td>
                  <td><?php echo $student->s_o_r?></td>
                  <td><?php echo $student->zone?></td>
                  <td><?php echo $student->address?></td>
                  <td><?php echo $student->email?></td>
                  <td><?php echo $student->church?></td>

                  <td><?php echo $student->spiritual?></td>
                  <td><?php echo $student->calling?></td>
                  <td><?php echo $student->into_call?></td>
                  <td><?php echo $student->prior_attended?></td>
                  <td><?php echo $student->occupation?></td>
                  <td><?php echo $student->lang_speak?></td>
                  <td><?php echo $student->lang_write?></td>
                  <td><?php echo $student->litracy?></td>
                  <td><?php echo $student->academics?></td>
                  <td><?php echo $student->discipler?></td>
                  <td><?php echo $student->refered_by?></td>
                  <td><?php echo $student->address_2?></td>
                  <td><?php echo $student->phone?></td>
                  <td><?php echo $student->relationship?></td>
                  <td><?php echo $student->created_at?></td>
                  <td><a class="" href="<?php echo URLROOT; ?>/admin/more_details/<?php echo $student->id; ?>">More</a></td>

              </tr>
              <?php $numbering++; endforeach; ?>
             </tbody>
             <tfoot>
             <tr class="">
               <th>S/N</th>
               <th><b>Name</b></th>
               <th><b>Phone</b></th>
               <th><b>WhatsApp_num</b></th>
               <th><b>Image</b></th>
               <th><b>Region</b></th>
               <th><b>Zone</b></th>
               <th><b>Address</b></th>
               <th><b>Email</b></th>
               <th><b>Church</b></th>
               <th><b>B.A:H_baptism</b></th>
               <th><b>Calling</b></th>
               <th><b>Into_call:When</b></th>
               <th><b>Prior:Reason</b></th>
               <th><b>Occupation</b></th>
               <th><b>lang_speak</b></th>
               <th><b>lang_write</b></th>
               <th><b>Litracy</b></th>
               <th><b>Academics</b></th>
               <th><b>Oversight</b></th>
               <th><b>Referal</b></th>
               <th><b>Ref_address</b></th>
               <th><b>Ref_phone</b></th>
               <th><b>relationship</b></th>
               <th><b>Reg_dateTime</b></th>
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


<?php endif ?>
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
<script type="text/javascript">
  new DataTable('#eg', {
    scrollX: true,
    //scrollY: '60vh',
    scrollCollapse: true,
    ordering: false,
    searching: true,
    info: true,
  });
</script>