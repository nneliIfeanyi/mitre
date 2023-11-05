<?php require APPROOT . '/views/inc/header2.php'; ?>
<style>
.cssmarquee {
height: 20px;
overflow: hidden;
position: relative;
}
.cssmarquee h1 {
font-size: .8em;
position: absolute;
width: 100%;
height: 100%;
margin: 0;
padding: 0;
line-height: 20px;
text-align: center;
transform:translateX(100%);
animation: cssmarquee 12s linear infinite;
}
@keyframes cssmarquee {
0% {
transform: translateX(100%);
}
100% {
transform: translateX(-100%);
}
}
</style>
<div class="cssmarquee">
<h1 style="text-transform: uppercase;font-style: italic;font-weight:bold;">A total of <span class="text-light bg-primary rounded-5 p-1 fw-bold"><?php echo $data['total'] ?></span> Registered</h1>
</div>
<div class="container-fluid">
<!-- <div class="card-body"  style="overflow-x: scroll; height:81.5vh;"> -->
<h3 class="text-primary"><?php flash('del_msg'); ?></h3>
        <table class="table table-striped table-bordered" id="eg" style="width:95%;">
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

                <td><?php echo $student->	spiritual?></td>
                <td><?php echo $student->	calling?></td>
                <td><?php echo $student->into_call?></td>
                <td><?php echo $student->	prior_attended?></td>
                <td><?php echo $student->	occupation?></td>
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
           <!-- <tfoot>
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
          </tfoot> -->
         </table>
         </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script type="text/javascript">
  new DataTable('#eg', {
    scrollX: true,
    scrollY: '60vh',
    scrollCollapse: true,
    ordering: false,
    searching: false,
    info: false
  });
</script>


    
  