
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date('Y') ?> <a href="<?= URLROOT?>/admin">Threshers Team</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= URLROOT ;?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= URLROOT ;?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  //$.widget.bridge('uibutton', $.ui.button);

  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script src="<?= URLROOT ;?>/js/parsley.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= URLROOT ;?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="<?= URLROOT ;?>/js/jquery.dataTables.min.js"></script>
<script src="<?= URLROOT ;?>/js/dataTables.bootstrap5.min.js"></script>
<!-- ChartJS -->
<script src="<?= URLROOT ;?>/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= URLROOT ;?>/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= URLROOT ;?>/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= URLROOT ;?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= URLROOT ;?>/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= URLROOT ;?>/plugins/moment/moment.min.js"></script>
<script src="<?= URLROOT ;?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= URLROOT ;?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= URLROOT ;?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= URLROOT ;?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= URLROOT ;?>/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= URLROOT ;?>/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= URLROOT ;?>/dist/js/pages/dashboard.js"></script>
</body>
</html>