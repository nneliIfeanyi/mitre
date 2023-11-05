<script type="text/javascript">
 	function VerifyUploadSizeIsOk() {
 		var UploadFieldID = "file-upload";
 		var MaxSizeInBytes = 1024024;
 		var fld = document.getElementById(UploadFieldID);
 		if (fld.files && fld.files.length == 1 && fld.files[0].size > MaxSizeInBytes) {

 			alert("Image size too large, The file must be less than 1MB");
 			return false;
 		}
 		return true;
 	}
</script>
<script src="<?= URLROOT ;?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= URLROOT ;?>/js/script.js"></script>
<script src="<?= URLROOT ;?>/js/jquery.js"></script>
<script src="<?= URLROOT ;?>/js/jquery.dataTables.min.js"></script>
</body>
</html>