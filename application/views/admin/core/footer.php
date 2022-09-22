<?php
$ur1 = $this->uri->segment(2);
$ur2 = $this->uri->segment(3);
$ur3 = $this->uri->segment(4);

if (!empty($ur1) && $ur1 != "login" && $ur1 != "sukses") :
?>
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2020</strong> All rights reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->
<?php
endif;

if ($ur1 == "homepage") :
  $message = 'Apakah anda yakin ingin menghapus beranda ini secara permanen?';
elseif ($ur1 == "service") :
  $message = 'Apakah anda yakin ingin menghapus layanan ini secara permanen?';
elseif ($ur1 == "product") :
  $message = 'Apakah anda yakin ingin menghapus produk ini secara permanen?';
elseif ($ur1 == "achievement") :
  $message = 'Apakah anda yakin ingin menghapus pencapaian ini secara permanen?';
elseif ($ur1 == "client") :
  $message = 'Apakah anda yakin ingin menghapus klien ini secara permanen?';
elseif ($ur1 == "support") :
  $message = 'Apakah anda yakin ingin menghapus transportasi ini secara permanen?';
elseif ($ur1 == "certificate") :
  $message = 'Apakah anda yakin ingin menghapus sertifikat ini secara permanen?';
elseif ($ur1 == "content") :
  $message = 'Apakah anda yakin ingin menghapus konten ini secara permanen?';
elseif ($ur1 == "social") :
  $message = 'Apakah anda yakin ingin menghapus sosial media ini secara permanen?';
elseif ($ur1 == "category") :
  $message = 'Apakah anda yakin ingin menghapus kategori panduan limbah B3 ini secara permanen?';
elseif ($ur1 == "waste") :
  $message = 'Apakah anda yakin ingin menghapus file panduan limbah B3 ini secara permanen?';
elseif ($ur1 == "limbah-category") :
  $message = 'Apakah anda yakin ingin menghapus kategori kode limbah ini secara permanen?';
elseif ($ur1 == "limbah") :
  $message = 'Apakah anda yakin ingin menghapus kode limbah ini secara permanen?';
elseif ($ur1 == "faq") :
  $message = 'Apakah anda yakin ingin menghapus pertanyaan ini secara permanen?';
elseif ($ur1 == "blog") :
  $message = 'Apakah anda yakin ingin menghapus blog ini secara permanen?';
elseif ($ur1 == "news") :
  $message = 'Apakah anda yakin ingin menghapus news ini secara permanen?';
elseif ($ur1 == "infografis") :
  $message = 'Apakah anda yakin ingin menghapus infografis ini secara permanen?';
elseif ($ur1 == "user") :
  $message = 'Apakah anda yakin ingin menghapus pengguna ini secara permanen?';
else :
  $message = "";
endif;
?>
<div class="modal fade dialog-confirm" id="dialog-confirm" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">PERINGATAN</h4>
      </div>
      <div class="modal-body">
        <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?php echo $message; ?></p>
      </div>
      <div class="modal-footer">
        <a href="#" id="del-button-dialog"><button type="button" class="btn btn-default">HAPUS</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
      </div>
    </div>
  </div>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<?php
if (!empty($ur1) && $ur1 != "login" && $ur1 != "sukses") {
?>
  <!-- SlimScroll -->
  <script src="<?php echo base_url(); ?>assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url(); ?>assets/libs/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/select2-4.0.3/js/select2.min.js"></script>
  <script>
    var base_url = '<?php echo base_url(); ?>'
  </script>
  <script src="<?php echo base_url(); ?>assets/libs/datepicker-1.6.4/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/timepicker/bootstrap-timepicker.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/magnific-popup/jquery.magnific-popup.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/mainjsfunction.js"></script>
<?php
}
?>
</body>

</html>