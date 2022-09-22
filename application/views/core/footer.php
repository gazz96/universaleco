<?php
$ur1 = $this->uri->segment(1);
$ur2 = $this->uri->segment(2);
$ur3 = $this->uri->segment(3);

if ($ur1 == "panduan-limbah-b3") :
?>
   <div class="misc-content" style="background: #CCC;">
      <div class="achievement-container">
         <h2 style="color: #000;">Ingin Info Lebih Lanjut ?</h2>
         <a href="<?php echo base_url(); ?>kontak"><button class="btn btn-primary">Hubungi Kami</button></a>
      </div>
   </div>
   <?php
elseif ($ur1 == "content") :
   if ($ur3 == "1") :
   ?>
      <div class="misc-content epr-misc-content" style="background: #000;">
         <div class="achievement-container">
            <h2 style="color: #FFF; line-height: 4rem;">Ingin Informasi Lebih Lanjut Mengenai<br />Layanan <i>Extended Producer Responsibility</i>?</h2>
            <a href="<?php echo base_url(); ?>kontak"><button class="btn btn-primary">Hubungi Kami</button></a>
         </div>
      </div>
   <?php
   elseif ($ur3 == "2") :
   ?>
      <div class="misc-content daur-misc-content" style="background: #000;">
         <div class="achievement-container">
            <h2 style="color: #FFF; line-height: 4rem;">Dapatkan Penawaran <i>Plastic</i> dan <i>Packaging Recycle</i>?</h2>
            <a href="<?php echo base_url(); ?>kontak"><button class="btn btn-primary">Hubungi Kami</button></a>
         </div>
      </div>
      <div class="daur-footer-content">
         <h3>Jasa Daur Ulang Limbah Kemasan B3</h3>
         <p>Dalam era globalisasi yang makin berkembang, penggunaan bahan kimia dalam kehidupan sehari-hari semakin bertambah. Penggunaan bahan kimia dapat membantu proses produksi sebuah barang namun juga dapat menimbulkan efek yang cukup membahayakan juga terhadap manusia ataupun lingkungan sekitar. Setiap bahan baku yang diolah senantiasa akan menghasilkan produk dan hasil samping berupa limbah seperti limbah kemasan B3. Daur ulang limbah kemasan pun menjadi opsi paling ideal demi menekan risiko pencemaran lingkungan.</p>
         <a href="#!" class="link">Selengkapnya</a>
      </div>
   <?php
   elseif ($ur3 == "3") :
   ?>
      <div class="misc-content limbah-misc-content" style="background: #000;">
         <div class="achievement-container">
            <h2 style="color: #FFF; line-height: 4rem;">Siap Menjaga Lingkungan Kita<br />dari Pencemaran Limbah B3?</h2>
            <a href="<?php echo base_url(); ?>kontak"><button class="btn btn-primary">Mulai</button></a>
         </div>
      </div>
      <div class="daur-footer-content">
         <h3>Layanan Jasa Pengolahan Limbah B3</h3>
         <p style="margin-bottom: 20px;">Setiap perusahaan memiliki tanggung jawab dalam mengelola limbah yang dihasilkan. Limbah yang dibuang langsung ke dalam lingkungan hidup dapat menimbulkan bahaya terhadap kesehatan manusia serta mahkluk hidup lainnya. Mengingat risiko tersebut, perlu diupayakan agar setiap usaha dan/atau kegiatan menghasilkan Limbah B3 seminimal mungkin.</p>
         <p>Pengolahan limbah yang baik merupakan salah satu tolak ukur keberhasilan perusahaan dalam menjaga kesehatan dan turut serta dalam mengurangi pencemaran lingkungan. Untuk alasan itulah, pengelolaan dan pemanfaatan limbah harus dilakukan dengan cara yang tepat dan baik oleh perusahaan sesuai dengan peraturan yang berlaku.</p>
         <a href="#!" class="link">Selengkapnya</a>
      </div>
   <?php
   elseif ($ur3 == "4") :
   ?>
      <div class="misc-content medis-misc-content" style="background: #000;">
         <div class="achievement-container">
            <h2 style="color: #FFF; line-height: 4rem;">Siap Menjaga Lingkungan dengan<br />Pengelolaan Limbah Medis dan Farmasi?</h2>
            <a href="<?php echo base_url(); ?>kontak"><button class="btn btn-primary">Mulai</button></a>
         </div>
      </div>
      <div class="daur-footer-content">
         <h3>Jasa Pengelolaan, Pengolahan, Pemusnahan & Pembuangan Limbah Medis & Farmasi</h3>
         <p>Limbah medis adalah buangan hasil proses kegiatan rumah sakit dimana sebagian limbah tersebut merupakan limbah bahan berbahaya dan beracun (B3) yang mengandung mikroorganisme pathogen, infeksius dan radioaktif. Dan Limbah farmasi adalah salah satu limbah dengan tingkat pencemaran lingkungan yang tinggi yang membawa potensi kerusakan lingkungan yang cukup luas. Pembuangan limbah medis dan farmasi tidak dapat dilakukan tanpa penanganan yang tepat. Pengolahan limbah medis dan farmasi hanya boleh dilakukan oleh perusahaan yang telah memiliki izin dan dilaksanakan dengan persyaratan yang berlaku.</p>
         <a href="#!" class="link">Selengkapnya</a>
      </div>
   <?php
   elseif ($ur3 == "5") :
   ?>
      <div class="misc-content zero-misc-content" style="background: #000;">
         <div class="achievement-container">
            <h2 style="color: #FFF; line-height: 4rem;">Dapatkan Penawaran <i>Zero-Waste Treatment</i></h2>
            <a href="<?php echo base_url(); ?>kontak"><button class="btn btn-primary">Hubungi Kami</button></a>
         </div>
      </div>
   <?php
   elseif ($ur3 == "6") :
   ?>
      <div class="misc-content data-misc-content" style="background: #000; border-bottom: 0;">
         <div class="achievement-container">
            <h2 style="color: #FFF; line-height: 4rem;">Dapatkan Penawaran Data &amp; <i>Document Destruction</i></h2>
            <a href="<?php echo base_url(); ?>kontak"><button class="btn btn-primary">Hubungi Kami</button></a>
         </div>
      </div>
   <?php
   elseif ($ur3 == "7") :
   ?>
      <div class="misc-content sludge-misc-content" style="background: #000;">
         <div class="achievement-container">
            <h2 style="color: #FFF; line-height: 4rem;"> Siap Menjaga Lingkungan dengan Pengelolaan Oli Bekas dan <i>Oil Sludge</i>?</h2>
            <a href="<?php echo base_url(); ?>kontak"><button class="btn btn-primary">Mulai</button></a>
         </div>
      </div>
      <div class="daur-footer-content">
         <h3>Jasa Pemusnahan Limbah Sludge</h3>
         <p>Ada beberapa jenis limbah yang umum dijumpai dalam dunia industri. Salah satunya adalah limbah <i>sludge</i>. Limbah jenis ini memiliki bentuk berupa lumpur yang mengandung banyak komponen berharga dan terkadang memiliki potensi bahaya jika tidak dikelola dengan benar. Karena potensi bahaya yang ada, pemusnahan limbah <i>sludge</i> menjadi cara paling ampuh untuk mengatasinya.</p>
         <a href="#!" class="link">Selengkapnya</a>
      </div>
   <?php
   endif;
elseif ($ur1 == "blog" || $ur1 == "news" || $ur1 == "infografis") :
else :
   ?>
   <div class="misc-content">
      <div class="achievement-container">
         <h2>Siap untuk Mengelola Limbah Secara Bertanggung Jawab</h2>
         <a href="<?php echo base_url(); ?>kontak"><button class="btn btn-primary">Mulai</button></a>
      </div>
   </div>
<?php
endif;
?>
</div>
<!-- /.content-wrapper -->

<div class="whatsapp-iconx">
   <a href="https://wa.me/<?php echo isset($misc_data["Whatsapp"]) ? $misc_data["Whatsapp"] : ''; ?>" target="_blank"><i class="fa fa-whatsapp"></i></a>
</div>

<footer class="main-footer">
   <div class="block-1">
      <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo-sm-white.png" alt="Logo"></a>
      <p><strong>UNIVERSAL ECO</strong> adalah perusahaan pengelola limbah yang bertanggung jawab dan ramah lingkungan. Misi kami adalah membantu mewujudkan Indonesia bebas limbah dan mendorong pertumbuhan ekonomi melalui penerapan ekonomi sirkular bagi bisnis dan industri.</p>
      <h2 style="font-size: 2.3rem;">Sertifikasi</h2>
      <?php
      if (isset($certificate_list) && count($certificate_list) > 0) :
         $x = 0;
         foreach ($certificate_list as $certificate_lists) :
            if (!empty($certificate_lists->ue_certificate_icon) && $certificate_lists->ue_certificate_icon != null && file_exists("./uploads/certificate/" . $certificate_lists->ue_certificate_icon)) :
      ?>
               <img src="<?php echo base_url(); ?>uploads/certificate/<?php echo $certificate_lists->ue_certificate_icon; ?>" alt="Certificate-<?php echo $certificate_lists->ue_certificate_id; ?>" width="75" <?php echo $x == 0 ? 'class="first-child"' : ''; ?> />
      <?php
            endif;
            $x++;
         endforeach;
      endif;
      ?>
   </div>
   <div class="block-2">
      <ul>
         <li><a href="<?php echo base_url(); ?>tentang">Tentang</a></li>
         <li><a href="https://www.universaleco.id/karir">Karir</a></li>
         <li><a href="https://jualscrap.universaleco.id">Jual E-Waste</a></li>
         <?php
         if (isset($product_list) && $product_list != null && count($product_list) > 0) :
            foreach ($product_list as $product_lists) :
               $urlname = preg_replace("/[^A-Za-z0-9\-]/", "-", str_replace(" ", "-", strtolower($product_lists->ue_product_name)));
         ?>
               <li><a href="<?php echo base_url(); ?>content/<?php echo $urlname; ?>/<?php echo $product_lists->ue_product_id; ?>"><?php echo $product_lists->ue_product_name; ?></a></li>
         <?php
            endforeach;
         endif;
         ?>
      </ul>
   </div>
   <div class="block-3">
      <div class="address-section address-sections">
         <h4>HEAD OFFICE</h4>
         <p>Komplek Majapahit Permai Blok C-109 Jl. Majapahit, Jakarta Pusat</p>
         <p>Telp 021-3517984 / 021-3520701</p>
         <p>Whatsapp: +6282110896311</p>
         <p>E-mail: <a href="mailto:contact@universaleco.id">contact@universaleco.id</a></p>
      </div>
      <div class="address-section" style="margin-top: 25px;">
         <h4>Material Recovery Facility</h4>
         <p>Jl. Modern Industri XV Blok AD No.4 Desa Sukatani, Kecamatan Cikande, Serang, Banten 42186</p>
      </div>
      <a href="https://www.instagram.com/universaleco.id/" style="color: #FFF; font-size: 3.5rem; margin-right: 15px;"><i class="fa fa-instagram"></i></a>
      <a href="https://www.linkedin.com/company/pt-universal-eco/" style="color: #FFF; font-size: 3.5rem; margin-right: 15px;"><i class="fa fa-linkedin"></i></a>
      <a href="https://www.youtube.com/channel/UCrN6xfUKj0r0O_Dqo6nKyEQ" style="color: #FFF; font-size: 3.5rem; margin-right: 15px;"><i class="fa fa-youtube"></i></a>
   </div>
</footer>
<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<div class="modal fade dialog-confirm" id="homepage-contact-dialog" role="dialog">
   <div class="modal-dialog modal-md" style="margin: 15px auto;">
      <div class="modal-content">
         <div class="row">
            <button type="button" class="close" data-dismiss="modal" style="color: #FFF; margin-right: 20px; opacity: 1; z-index: 9999;">&times;</button>
            <div class="col-md-10 col-md-offset-3">
               <h2 style="text-align: center;">LAYANAN CALL CENTER UNIVERSAL ECO</h2>
            </div>
            <div class="col-md-10 col-md-offset-3">
               <div class="row">
                  <div class="col-md-6 call-center-item">
                     <div class="call-center-icon">
                        <img src="<?php echo base_url(); ?>assets/images/hotline-call-center.png" alt="">
                     </div>
                     <a href="<?php echo isset($misc_data["Call Center"]) ? "tel:" . $misc_data["Call Center"] : ''; ?>" target="_blank">Hotline</a>
                  </div>
                  <div class="col-md-6 call-center-item">
                     <div class="call-center-icon">
                        <img src="<?php echo base_url(); ?>assets/images/whatsapp-call-center.png" alt="">
                     </div>
                     <a href="https://wa.me/<?php echo isset($misc_data["Whatsapp"]) ? $misc_data["Whatsapp"] : ''; ?>" target="_blank">Whatsapp</a>
                  </div>
               </div>
            </div>
            <div class="col-md-10 col-md-offset-3 text-center">
               <p>Senin - Jumat</p>
               <p>Pukul 08.00 - 17.00 WIB</p>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade dialog-confirm" id="download-dialog" role="dialog">
   <button type="button" class="close" data-dismiss="modal" style="color: #FFF; margin-right: 20px; margin-top: 20px; opacity: 1; z-index: 9999;">&times;</button>
   <input type="hidden" id="url-data">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="row">
            <div class="col-md-12" style="margin-bottom: 20px;">
               <div class="row">
                  <div class="col-md-2">
                     <img src="<?php echo base_url(); ?>assets/images/logo-sm-white.png" alt="Logo-white" width="100%">
                  </div>
                  <div class="col-md-10">
                     <h2 style="font-size: 3rem;">UNIVERSAL ECO</h2>
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-9">
                     <div class="form-group">
                        <input type="email" id="email-download" class="form-control" placeholder="Email Anda" maxlength="255">
                     </div>
                  </div>
                  <div class="col-md-3">
                     <button id="download-btn" class="btn main-button">Download</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
   var base_url = '<?php echo base_url(); ?>'
</script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/libs/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/select2-4.0.3/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/datepicker-1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/timepicker/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/magnific-popup/jquery.magnific-popup.js"></script>
<script src="<?php echo base_url(); ?>assets/js/mainjsfunction.js"></script>
<?php
if (empty($ur1) || $ur1 == "main") :
?>
   <script src="<?php echo base_url(); ?>assets/libs/owlcarousel/owl.carousel.js"></script>
   <script>
      $('.homepage').owlCarousel({
         loop: true,
         margin: 10,
         autoplay: true,
         autoplayTimeout: 5000,
         autoplayHoverPause: true,
         responsiveClass: true,
         responsive: {
            0: {
               items: 1,
               nav: false
            },
            600: {
               items: 1,
               nav: false
            },
            1000: {
               items: 1,
               nav: false
            }
         }
      });

      $(function() {
         $(".homepage-contact-button").on("click", function() {
            console.log("Test");
            $("#homepage-contact-dialog").modal("show");
         })
      })

      var downStat = 0;

      $(function() {
         $(".layanan-arrow").each(function() {
            $(this).on("click", function() {
               var id = $(this).prop("id").split("-");
               $("#sub-" + id[1]).slideToggle();

               if (downStat == 0) {
                  $(this).html('<i class="fa fa-angle-up"></i>');
                  downStat = 1;
               } else {
                  $(this).html("<i class=\"fa fa-angle-down\"></i>");
                  downStat = 0;
               }
            });
         });
      });
   </script>
<?php
elseif ($ur1 == "panduan-limbah-b3" || $ur1 == "infografis") :
?>
   <script>
      var base_url = '<?php echo base_url() . "" . $ur1; ?>';

      function validateEmail(email) {
         const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
         return re.test(String(email).toLowerCase());
      }

      $(function() {
         $(".download-link").each(function() {
            $(this).on("click", function(e) {
               e.preventDefault();

               var url = $(this).prop("href");

               $("#url-data").val(url);

               $("#download-dialog").modal("show");
            })
         })

         $("#download-btn").on('click', function() {
            var url = $("#url-data").val();
            var email = $("#email-download").val();

            if ($("#email-download").val() && validateEmail(email)) {
               $.ajax({
                  url: base_url + '/download',
                  method: 'POST',
                  dataType: "json",
                  data: {
                     email: email,
                  },
                  success: function(data) {
                     if (data == true) {
                        window.open(url);
                     }
                  },
               });
            } else {
               alert("Harap mengisi email anda dengan format yang tepat.");
            }
         })
      })
   </script>
<?php
endif;
?>
</body>

</html>