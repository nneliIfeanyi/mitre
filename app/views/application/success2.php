<?php require APPROOT . '/views/application/inc/header.php'; ?>
<body class="container mt-5 text-center">
    <div id="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="alert alert-success p-5 rounded">
        <h2>🎉 Registration Completed Successfully!</h2>
        <p>Thank you for registering for MITRE. We will contact you via your email/phone.</p>
        <a href="<?= URLROOT ?>/application" class="btn btn-primary rounded p-2">Return</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Hide loader once DOM is ready
            $("#loader").fadeOut("slow");

            // Show loader again before unloading (e.g., navigating away)
            $(window).on("beforeunload", function() {
                $("#loader").show();
            });
        });
    </script>
</body>

</html>