<!DOCTYPE html>
<html>

<head>
    <title>MITRE Registration - Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Fullscreen loader */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body class="container mt-5 text-center">
    <div id="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="alert alert-success p-5 rounded">
        <h2>🎉 Registration Successful!</h2>
        <p>Thank you for registering for MITRE. We will contact you via your email/phone.</p>
        <a href="<?= URLROOT ?>/application" class="btn btn-primary rounded p-2">Return</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Hide loader once DOM is ready
            $("#loader").fadeOut("slow");

            // Show loader again before unloading (e.g., navigating away)
            $(window).on("beforeunload", function() {
                $("#loader").show();
            });

            // Also catch internal link clicks for SPA-like behavior
            $("a").on("click", function(e) {
                var target = $(this).attr("target");
                // avoid opening in new tab/window
                if (!target || target === "_self") {
                    $("#loader").show();
                }
            });
        });
    </script>
</body>

</html>