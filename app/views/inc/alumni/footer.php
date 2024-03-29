
<script src="<?= URLROOT ;?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= URLROOT ;?>/js/script.js"></script>
<script src="<?= URLROOT ;?>/js/jquery.js"></script>
<script src="<?= URLROOT ;?>/js/parsley.min.js"></script>
<script src="<?= URLROOT ;?>/js/jquery.dataTables.min.js"></script>
<script src="<?= URLROOT ;?>/js/dataTables.bootstrap5.min.js"></script>
<script>
    $('#register_form').parsley();
    $('#register_form').on('submit', function(event){
        event.preventDefault();

        if($('#register_form').parsley().isValid()){
            let formData = $(this).serialize();
            $.ajax({
                url: "<?php echo URLROOT;?>/alumni/register",
                method: "POST",
                data: formData,
    
                beforeSend: function () {
                    $('#submit').attr('disabled', 'disabled');
                    $('#submit').val('Processing Submission, pls wait ......');

                },
                success:function (response) {
                    $('#register_form').parsley().reset();
                    $('#submit').attr('disabled', false);
                    $('#submit').val('Submit');
                    $('#msg').html(response);
                }
            })
        }

    })
</script>
<script>
  // document.addEventListener('DOMContentLoaded', userScroll);
    const tooltip = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltip].map((tooltipTrigger) => new bootstrap.Tooltip(tooltipTrigger));
    //popover
    const popover = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popover].map((popoverTrigger) => new bootstrap.Popover(popoverTrigger));
</script>
</body>
</html>