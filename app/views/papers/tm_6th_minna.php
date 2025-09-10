<?php
$conclave = S_CONCLAVE;
$set = SENIOR;
$paper1 = 'term_paper_1';
$paper2 = 'term_paper_2';
$zone = 'Minna';
$added_count = $this->attendanceModel->count_added($set, $conclave, $paper1, $zone);
$added_count2 = $this->attendanceModel->count_added2($set, $conclave, $paper2, $zone);
?>

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
                    <h1 class="m-0 h3">Add Term_Paper Set <?= $set ?> Minna Zone</h1>
                    <p class="lead text-primary">Paper 1 Total Added <span class="font-weight-bold text-dark"><?= $added_count; ?></span></p>
                    <p class="lead text-primary">Paper 2 Total Added <span class="font-weight-bold text-dark"><?= $added_count2; ?></span></p>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= URLROOT; ?>/admin">Home</a></li>
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
                <nav>
                    <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                        <a href="<?php echo URLROOT ?>/papers/term_paper_kaduna/<?php echo $set ?>" class="nav-link" id="nav-kaduna-tab" type="button" role="tab">Kaduna Zone
                        </a>
                        <a href="<?php echo URLROOT ?>/papers/term_paper_ufuma/<?php echo $set ?>" class="nav-link" id="nav-ufuma-tab" type="button" role="tab">Ufuma Zone
                        </a>
                        <a href="<?php echo URLROOT ?>/papers/term_paper_minna/<?php echo $set ?>" class="active nav-link" id="nav-minna-tab" type="button" role="tab">Minna Zone
                        </a>
                    </div>
                </nav>
                <div class="col-lg-6">
                    <h5><?= flash('msg') ?></h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="eg">
                        <thead>
                            <tr class="">
                                <th>#</th>
                                <th><b>Name</b></th>
                                <th><b><?= $paper1 ?></b></th>
                                <th><b>Action</b></th>
                                <th><b><?= $paper2 ?></b></th>
                                <th><b>Action2</b></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $numbering = 1;

                            foreach ($data['students'] as $student) :
                                $added = $this->attendanceModel->check_mark($set, $conclave, $paper1, $student->id);
                                $added2 = $this->attendanceModel->check_mark($set, $conclave, $paper2, $student->id);
                            ?>

                                <tr>
                                    <td><?php echo $numbering; ?></td>
                                    <td><?php echo $student->fullname ?></td>
                                    <?php if ($added) : ?>
                                        <td><?= $added->score ?></td>
                                        <td><a href="<?php echo URLROOT ?>/papers/edit6th/<?php echo $added->id; ?>" class="btn btn-sm btn-success"> Edit</a></td>
                                    <?php else : ?>
                                        <form method="POST" action="<?= URLROOT; ?>/portal/add_mark" class="submit">
                                            <td><input type="number" class="" required placeholder="Discipleship" max="10" name="score"></td>
                                            <td>
                                                <input type="hidden" name="std_id" value="<?= $student->id; ?>">
                                                <input type="hidden" name="zone" value="<?= $student->zone; ?>">
                                                <input type="hidden" name="fullname" value="<?= $student->fullname; ?>">
                                                <input type="hidden" name="mitre_set" value="<?= $student->mitre_set; ?>">
                                                <input type="hidden" name="conclave" value="<?= $conclave; ?>">
                                                <input type="hidden" name="paper" value="<?= $paper1; ?>">
                                                <input type='submit' id="submit" value="Mark" class='btn btn-dark'>
                                            </td>
                                        </form>
                                    <?php endif; ?>
                                    <?php if ($added2) : ?>
                                        <td><?= $added2->score ?></td>
                                        <td><a href="<?php echo URLROOT ?>/papers/edit6th/<?php echo $added2->id; ?>" class="btn btn-sm btn-success"> Edit</a></td>
                                    <?php else : ?>
                                        <form method="POST" action="<?= URLROOT; ?>/portal/add_mark" class="submit">
                                            <td><input type="number" class="" required placeholder="Ministry" max="20" name="score"></td>
                                            <td>
                                                <input type="hidden" name="std_id" value="<?= $student->id; ?>">
                                                <input type="hidden" name="zone" value="<?= $student->zone; ?>">
                                                <input type="hidden" name="fullname" value="<?= $student->fullname; ?>">
                                                <input type="hidden" name="mitre_set" value="<?= $student->mitre_set; ?>">
                                                <input type="hidden" name="conclave" value="<?= $conclave; ?>">
                                                <input type="hidden" name="paper" value="<?= $paper2; ?>">
                                                <button type='submit' id="submit" class='btn btn-dark'>Mark</button>
                                            </td>
                                        </form>
                                    <?php endif; ?>
                                </tr>

                            <?php $numbering++;
                            endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr class="">
                                <th>#</th>
                                <th><b>Name</b></th>
                                <th><b><?= $paper ?></b></th>
                                <th><b>Action</b></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>
<script>
    // Loop through all forms with class 'ajaxForm'
    $(".submit").each(function(index, element) {
        $(this).on("submit", function(e) {
            e.preventDefault(); // stop default form submission

            let form = $(this);
            let formData = form.serialize();
            let actionUrl = form.attr("action"); // get form action

            // Optional: show loading state
            let submitBtn = form.find("button[type='submit']");
            let oldText = submitBtn.text();
            submitBtn.prop("disabled", true).text("Processing...");
            console.log(submitBtn);
            // AJAX call
            $.ajax({
                url: actionUrl,
                type: form.attr("method"), // GET or POST
                data: formData,
                success: function(response) {
                    //alert("Form " + (index + 1) + " says: " + response);
                    $('#msg').append(response);
                },
                error: function(xhr, status, error) {
                    alert("Error in form " + (index + 1) + ": " + error);
                },
                complete: function() {
                    // reset button
                    submitBtn.prop("disabled", false).text('Marked');
                }
            });

        });
    });
</script>
<script type="text/javascript">
    new DataTable('#eg', {
        ordering: true,
        searching: true,
        paging: false,
    });
</script>