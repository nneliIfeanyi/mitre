 <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>&copy; <?= date('Y') . ' ' . SITENAME; ?>. All rights reserved.</p>
            <p id="contact">
                Need help?
                <a href="https://api.whatsapp.com/send?phone=2348034530726&text=Hi,%20please%20i%20need%20help%20registering%20for%20MITRE!" target="_blank" rel="noopener">
                    Contact Support
                </a>
            </p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs"></script>
    <script>
        $(document).ready(function() {
            // Hide loader once DOM is ready
            $("#loader").fadeOut("slow");

            // Show loader again before unloading (e.g., navigating away)
            $(window).on("beforeunload", function() {
                $("#loader").show();
            });
        });
        // Add custom validator
        window.Parsley.addValidator('singleword', {
            validateString: function(value) {
                return /^\S+$/.test(value); // No whitespace allowed
            },
            messages: {
                en: 'Only one word is allowed.'
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var flashModal = document.getElementById("flashModal");
            if (flashModal) {
                var modal = new bootstrap.Modal(flashModal);
                modal.show();
            }
        });
    </script>


</body>

</html>