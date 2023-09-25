<?php require APPROOT . '/views/inc/header2.php'; ?>
<div class="container-fluid">
<div class="card-body"  style="overflow: scroll;">
<h3 class="text-primary"><?php flash('del_msg'); ?></h3>
        <h2 class="text-center">A total of <span class="text-light bg-primary rounded-5 p-1 fw-bold"><?php echo $data['total'] ?></span> Registered</h2>
        <table class="table table-light">
          <thead>
             <tr class="">
               <th>S/N</th>
               <th><b>Full Name</b></th>
               <th><b>Phone</b></th>
               <th><b>WhatsApp_num</b></th>
               <th><b>Region</b></th>
               <th><b>Address</b></th>
               <th><b>Church</b></th>
               <th><b>Reg_dateTime</b></th>
               <th><b>Action</b></th>
             </tr>
          </thead>

           <tbody>
           <?php foreach($data['students'] as $student) : ?>
            <tr>
                <td><?php echo $student->id?></td>
                <td><?php echo $student->fullname?></td>
                <td><?php echo $student->mobile_num?></td>
                <td><?php echo $student->whatsApp_num?></td>
                <td><?php echo $student->s_o_r?></td>
                <td><?php echo $student->address?></td>
                <td><?php echo $student->church?></td>
                <td><?php echo $student->created_at?></td>
                <td><a class="" href="<?php echo URLROOT; ?>/admin/more_details/<?php echo $student->id; ?>">More</a></td>

            </tr>
            <?php endforeach; ?>
           </tbody>
         </table>
         </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>


    
  