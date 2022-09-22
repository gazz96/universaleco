<?php
$bg = null;
if (isset($product[0]->ue_product_bg) && $product[0]->ue_product_bg != null && file_exists("./uploads/product/" . $product[0]->ue_product_bg)) :
	$bg = 'style="background: url(../../uploads/product/' . $product[0]->ue_product_bg . ');"';
endif;

$style = 'style="font-style: normal!important;"';
$stylep = "";
?>
<div class="main-homepagess" <?php echo $bg; ?>>
	<h1 class="big-title" <?php echo $style; ?>><?php echo isset($product[0]->ue_product_name) ? $product[0]->ue_product_name : ''; ?></h1>
	<p><?php echo isset($product[0]->ue_product_description) ? $product[0]->ue_product_description : ''; ?></p>
</div>
<!-- Main content -->
<div class="content">
	<?php
	if (isset($product[0]->ue_product_id) && $product[0]->ue_product_id == 1) :
	?>
		<div class="main-content layanan-section">
			<h2>Peraturan Pemerintah No. 27 Tahun 2020<br />Tentang Pengelolaan Sampah Spesifik</h2>
			<div class="layanan-item">
				<div class="row">
					<div class="col-md-12">
						<div class="layanan-item-content uu-content">
							<p>Sampah mengandung unsur berbahaya (B3) yang berasal dari rumah tangga, kawasan industri dan fasilitas umum merupakan jenis sampah spesifik. tangga, kawasan industri dan fasilitas umum merupakan jenis sampah spesifik.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="layanan-item">
				<div class="row">
					<div class="col-md-12">
						<div class="layanan-item-content uu-content">
							<p>Sampah mengandung unsur berbahaya (B3) yang berasal dari rumah tangga, kawasan industri dan fasilitas umum merupakan jenis sampah spesifik. tangga, kawasan industri dan fasilitas umum merupakan jenis sampah spesifik.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-content epr-category-content">
			<div class="epr-category-sub">
				<h2>Apa saja kategori sampah spesifik yang perlu ditarik kembali oleh produsen?</h2>
				<div class="alur">
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/epr/icon-retail.png" alt="Retail">
						<p>Produk retil yang mengandung bahan B3</p>
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/epr/icon-elektronik.png" alt="Elektronik">
						<p>Produk Elektronik</p>
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/epr/icon-kemasan.png" alt="Kemasan">
						<p>Kemasan (Bekas B3 / mengandung bahan B3)</p>
					</div>
				</div>
			</div>
		</div>
		<div class="main-content epr-solution-content">
			<h2>Solusi Extended Producer Responsibility</h2>
			<div class="alur">
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/epr/icon-epr-1.png" alt="EPR-1">
					<p>Pengangkutan Limbah B3 Berizin ke TPSSS-B3</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/epr/icon-epr-2.png" alt="EPR-2">
					<p>Pengelolaan limbah B3 di <i>Material Recovery Facility</i> (MRF) kami</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/epr/icon-epr-2.png" alt="EPR-3">
					<p>Laporan data pengelolaan produk anda</p>
				</div>
			</div>
		</div>
	<?php
	elseif (isset($product[0]->ue_product_id) && $product[0]->ue_product_id == 2) :
	?>
		<div class="main-content epr-content">
			<h2>Fasilitas Pengolahan Sampah Plastik & Kemasan</h2>
			<p>Dengan mempercayakan pengolahan Sampah Plastik dan Kemasan B3 kepada Universal Eco, kami menyediakan fasilitas dari pengangkutan hingga pelaporan alur limbah untuk Anda.</p>
			<div class="row">
				<div class="col-md-3">
					<div class="daur-item daur-truck">
						<div class="daur-item-text">
							<p>Pengangkutan Limbah Sesuai Kebutuhan</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item daur-teknologi">
						<div class="daur-item-text">
							<p>Teknologi Ramah Lingkungan</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item daur-izin">
						<div class="daur-item-text">
							<p>Izin Pencucian Kemasan Bekas B3</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item daur-sertifikat">
						<div class="daur-item-text">
							<p>Sertifikat Daur Ulang</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-content daur-content">
			<div class="row">
				<div class="col-md-5">
					<img src="<?php echo base_url(); ?>assets/images/daur/content.jpg" alt="daur-content" />
				</div>
				<div class="col-md-5 col-md-offset-2 daur-text">
					<h2>Mari Bersama Jaga Lingkungan dari Limbah Plastik & Kemasan B3</h2>
					<p>Penggunaan limbah plastik pada kehidupan sehari- hari telah mencemari lingkungan kita dan merusak ekosistem darat maupun laut. Indonesia sebagai negara terbesar ke-2 penghasil limbah plastik diseluruh dunia wajib berperan aktif penggunaan limbah plastik melibatkan masyarakat dan industri dalam mengurangi daur ulang plastik. Mari secara bertanggung jawab bersama Universal Eco.</p>
				</div>
			</div>
		</div>
		<div class="main-content epr-solution-content">
			<h2>Alur Proses Pengolahan Limbah Plastik</h2>
			<div class="alur">
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/daur/icon-daur-1.png" alt="Daur-1">
					<p>Dapatkan penawaran layanan daur ulang limbah plastik dan kemasan sesuai kebutuhan</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/daur/icon-daur-2.png" alt="Daur-2">
					<p>Pilih waktu dan tanggal, kami akan mengonfirmasi jadwal pengangkutan</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/daur/icon-daur-3.png" alt="Daur-3">
					<p>Kami datang dan mengangkut limbah plastik dan kemasan bekas anda dan mendaur ulangnya secara bertanggung jawab</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/daur/icon-daur-4.png" alt="Daur-4">
					<p>Layanan ini dilengkapi dengan laporan alur limbah agar anda dapat memantau kontribusi positif perusahaan anda</p>
				</div>
			</div>
		</div>
		<div class="main-content epr-category-content">
			<div class="epr-category-sub">
				<h2>Jenis Plastik dan Kemasan Yang Dapat Diterima</h2>
				<div class="alur">
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/daur/kemasan-1.png" alt="Kemasan 1">
						<p>Jerigen &amp; Poligen</p>
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/daur/kemasan-2.png" alt="Kemasan 2">
						<p>Botol Oli</p>
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/daur/kemasan-3.png" alt="Kemasan 3">
						<p>Drum Besi</p>
					</div>
				</div>
			</div>
		</div>
	<?php
	elseif (isset($product[0]->ue_product_id) && $product[0]->ue_product_id == 3) :
	?>
		<div class="main-content epr-content">
			<h2>Fasilitas Pengolahan Limbah B3</h2>
			<p>Dengan mempercayakan Pengolahan Limbah B3 kepada Universal Eco, kami menyediakan fasilitas dari pengangkutan hingga pelaporan alur limbah untuk Anda.</p>
			<div class="row">
				<div class="col-md-3">
					<div class="daur-item daur-truck">
						<div class="daur-item-text">
							<p>Pengangkutan Limbah B3 Sesuai Kebutuhan</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item daur-teknologi">
						<div class="daur-item-text">
							<p>Teknologi Ramah Lingkungan</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item limbah-izin">
						<div class="daur-item-text">
							<p>Pengelolaan Limbah B3 Berizin</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item limbah-laporan">
						<div class="daur-item-text">
							<p>Laporan Alur Limbah</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-content epr-category-content">
			<div class="epr-category-sub">
				<h2>Pengelolaan Limbah B3 Dengan Teknologi Ramah Lingkungan</h2>
				<p style="margin: 25px 0;">Universal Eco menggunakan teknologi <i>insinerator Rotary Kiln</i> ramah lingkungan dalam proses pengolahan limbah B3. Insinerator jenis ini memiliki manfaat mengurangi massa atau volume limbah dan menghancurkan patogen berbahaya. Hasil sisa <i>bottom ash</i> dan <i>fly ash</i> dari insinerator ditangani secara bertanggung jawab.</p>
				<div class="alur">
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/limbah/kemasan-1.jpg" alt="Kemasan 1">
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/limbah/kemasan-2.png" alt="Kemasan 2">
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/limbah/kemasan-3.jpg" alt="Kemasan 3">
					</div>
				</div>
			</div>
		</div>
		<div class="main-content epr-solution-content">
			<h2>Alur Proses Pengolahan Limbah B3</h2>
			<div class="alur">
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/limbah/icon-limbah-1.png" alt="Limbah-1">
					<p style="font-size: 1.5rem;">Dapatkan penawaran pengelolaan limbah sesuai dengan kebutuhan anda</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/limbah/icon-limbah-2.png" alt="Limbah-2">
					<p style="font-size: 1.5rem;">Pilih waktu dan tanggal pelayanan, kami akan mengonfirmasi jadwal pengangkutan</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/limbah/icon-limbah-3.png" alt="Limbah-3">
					<p style="font-size: 1.5rem;">Kami datang dan mengangkut limbah industri dan B3 anda dan akan mengelolanya secara bertanggung jawab</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/limbah/icon-limbah-4.png" alt="Limbah-4">
					<p style="font-size: 1.5rem;">Limbah yang dapat didaur ulang akan didaur ulang, dan limbah yang tidak akan dapat didaur ulang akan dimusnahkan. Residu/sisa dari proses pengelolaan akan dikirim ke pihak pengelola residu B3 berizin</p>
				</div>
			</div>
		</div>
		<div class="limbah-content">
			<div class="main-content" style="background-color: #f5f5f5;">
				<div class="row">
					<div class="col-md-5" style="text-align: left;">
						<img src="<?php echo base_url(); ?>assets/images/limbah/content.jpg" alt="limbah-content" style="width: auto;" />
					</div>
					<div class="col-md-7 daur-text">
						<h2 style="font-size: 3rem;">Pengelolaan Limbah Bahan Berbahaya Yang Aman Untuk Lingkungan</h2>
						<p style="font-size: 1.7rem;">Universal Eco telah berpengalaman menangani berbagai macam limbah B3 dari berbagai jenis industri. Karena sifat bahan B3 yang berbahaya maka kami selalu memperhatikan aspek keselamatan kerja dan pengendalian pencemaran dalam setiap penanganannya.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="main-content epr-category-content">
			<div class="epr-category-sub">
				<h2>Cocok Untuk Industri</h2>
				<div class="alur">
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/limbah/industri-1.png" alt="Industri 1">
						<p>Manufaktur</p>
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/limbah/industri-2.png" alt="Industri 2">
						<p>Kimia</p>
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/limbah/industri-3.png" alt="Industri 3">
						<p>Logam</p>
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/limbah/industri-4.png" alt="Industri 4">
						<p>Otomotif</p>
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/limbah/industri-5.png" alt="Industri 5">
						<p>Konstruksi</p>
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/limbah/industri-6.png" alt="Industri 6">
						<p>Makanan &amp; Minuman</p>
					</div>
				</div>
			</div>
		</div>
	<?php
	elseif (isset($product[0]->ue_product_id) && $product[0]->ue_product_id == 4) :
	?>
		<div class="main-content epr-content">
			<h2>Solusi Pengelolaan Limbah Medis & Farmasi<br />Bersama Universal Eco</h2>
			<div class="row">
				<div class="col-md-3">
					<div class="daur-item daur-truck">
						<div class="daur-item-text">
							<p>Pengangkutan Limbah Sesuai Kebutuhan</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item daur-teknologi">
						<div class="daur-item-text">
							<p>Teknologi Ramah Lingkungan</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item limbah-izin">
						<div class="daur-item-text">
							<p>Pengelolaan Limbah Medis Berizin</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item limbah-laporan">
						<div class="daur-item-text">
							<p>Berita Acara Pemusnahan</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="medis-content">
			<div class="main-content" style="background-color: rgba(65, 187, 172, 1);">
				<div class="row">
					<div class="col-md-5">
						<img src="<?php echo base_url(); ?>assets/images/medis/content.jpg" alt="limbah-content" style="width: 100%;" />
					</div>
					<div class="col-md-5 col-md-offset-2 daur-text">
						<h2>Apa Itu Pengolahan Limbah Medis & Farmasi?</h2>
						<p>Limbah medis adalah jenis limbah yang mengandung bahan infeksius yang dapat menyebabkan infeksi, atau mengandung bakteri, virus, dan mikroorganisme. Sedangkan limbah farmasi adalah salah satu limbah dengan tingkat pencemaran lingkungan yang tinggi yang membawa potensi kerusakan lingkungan yang cukup luas. Karena itu limbah medis dan farmasi harus ditangani dengan berhati-hati. Universal Eco adalah perusahaan yang menawarkan pengelolaan limbah medis dan farmasi yang bertanggung jawab dan aman, sehingga fasilitas layanan kesehatan anda dapat beroperasi dengan aman dan tenang.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="main-content epr-solution-content">
			<h2>Alur Proses Pengolahan Limbah Medis</h2>
			<div class="alur">
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/medis/icon-medis-1.png" alt="Medis-1">
					<p>Dapatkan penawaran pengelolaan limbah sesuai dengan kebutuhan anda</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/medis/icon-medis-2.png" alt="Medis-2">
					<p>Pilih waktu dan tanggal pelayanan, kami akan mengonfirmasi jadwal keberangkatan</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/medis/icon-medis-3.png" alt="Medis-3">
					<p>Kami datang dan mengangkut limbah infeksius anda dan memusnahkannya secara bertanggung jawab</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/medis/icon-medis-4.png" alt="Medis-4">
					<p>Abu hasil sisa dari pembakaran limbah medis akan dikirim ke pengelola abu B3 yang berizin</p>
				</div>
			</div>
		</div>
		<div class="main-content epr-category-content">
			<div class="epr-category-sub">
				<h2>Solusi Pengolahan Limbah yang Cocok untuk :</h2>
				<div class="alur">
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/medis/industri-1.png" alt="Industri 1">
						<p>Rumah Sakit</p>
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/medis/industri-2.png" alt="Industri 2">
						<p>Puskesmas &amp; Klinik</p>
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/medis/industri-3.png" alt="Industri 3">
						<p>Farmasi</p>
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/medis/industri-4.png" alt="Industri 1">
						<p>Lab Kesehatan</p>
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/medis/industri-5.png" alt="Industri 2">
						<p>Aktivitas Penanganan COVID-19</p>
					</div>
				</div>
			</div>
		</div>
		<div class="limbah-content medis-content-data">
			<div class="main-content" style="background: transparent;">
				<div class="row">
					<div class="col-md-5 daur-text medis-text">
						<h2>Komitmen Kami Dalam Mengelola Limbah Medis & Farmasi</h2>
						<p style="font-size: 1.7rem;">Mengelola limbah medis dan farmasi membutuhkan komitmen kuat. Segala upaya harus dilakukan demi menjaga lingkungan agar tidak tercemar. Komitmen tersebut selalu menjadi pegangan Universal Eco dalam menjalankan tugasnya. Dengan teknologi ramah lingkungan dan fasilitas yang memadai, Universal Eco selalu berupaya untuk menjadi perusahaan jasa pengelolaan limbah medis dan farmasi yang bertanggungjawab.</p>
					</div>
				</div>
			</div>
		</div>
	<?php
	elseif (isset($product[0]->ue_product_id) && $product[0]->ue_product_id == 5) :
	?>
		<div class="main-content epr-content">
			<h2>Fasilitas Pengolahan Pengolahan Limbah B3</h2>
			<p>Dengan mempercayakan Zero-Waste Treatment kepada Universal Eco,<br />kami menyediakan fasilitas dari pengangkutan hingga pelaporan alur limbah untuk Anda.</p>
			<div class="row">
				<div class="col-md-3">
					<div class="daur-item daur-truck">
						<div class="daur-item-text">
							<p>Pengangkutan Limbah Sesuai Kebutuhan</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item zero-limbah">
						<div class="daur-item-text">
							<p>Wadah Limbah Terpilah</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item daur-teknologi">
						<div class="daur-item-text">
							<p>0 Limbah Tersisa</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item limbah-laporan">
						<div class="daur-item-text">
							<p>Laporan Alur Limbah</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="limbah-content zero-content-data">
			<div class="main-content" style="background: transparent;">
				<div class="row">
					<div class="col-md-3">&nbsp;</div>
					<div class="col-md-9">
						<h2 style="font-size: 2.75rem; text-align: left;">Pengelolaan Limbah Ramah Lingkungan untuk Usaha Anda</h2>
						<p style="text-align: left;">Jadikan perusahaan anda sebagai yang terdepan dengan berkontribusi secara positif bagi lingkungan melalui pengelolaan sampah yang bertanggung jawab bersama Universal Eco</p>
					</div>
				</div>
			</div>
		</div>
		<div class="main-content epr-solution-content">
			<h2>Alur Proses Pengolahan Limbah Medis</h2>
			<div class="alur">
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/zero/icon-zero-1.png" alt="Zero-1">
					<p>Dapatkan penawaran pengelolaan sampah sesuai dengan kebutuhan anda</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/zero/icon-zero-2.png" alt="Zero-2">
					<p>Pilih waktu dan tanggal pelayanan, kami akan mengonfirmasi jadwal pengangkutan</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/zero/icon-zero-3.png" alt="Zero-3">
					<p>Kami datang dan mengangkut sampah dan lokasi usaha atau acara anda dan mengelolanya secara bertanggung jawab</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/zero/icon-zero-4.png" alt="Zero-4">
					<p>Layanan ini dilengkapi dengan laporan alur sampah agar anda dapat memantau jejak lingkungan bisnis anda</p>
				</div>
			</div>
		</div>
		<div class="main-content epr-category-content">
			<div class="epr-category-sub">
				<h2>Proses Menuju Zero-Waste</h2>
				<div class="alur">
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/zero/icon-proses-1.png" alt="Proses 1">
						<p>Pengelolaan limbah menggunakan insinerator</p>
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/zero/icon-proses-2.png" alt="Proses 2">
						<p>Sisa abu hasil insinerasi</p>
					</div>
					<div class="alur-item">
						<img src="<?php echo base_url(); ?>assets/images/zero/icon-proses-3.png" alt="Proses 3">
						<p>Menjadi concrete block</p>
					</div>
				</div>
			</div>
		</div>
		<div class="main-content epr-solution-content">
			<h2>Cocok Untuk</h2>
			<div class="alur">
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/zero/industri-1.jpg" alt="Industri-1">
					<p>Manufaktur</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/zero/industri-2.jpg" alt="Industri-2">
					<p>Bea Cukai</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/zero/industri-3.jpg" alt="Industri-3">
					<p>Retail</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/zero/industri-4.jpg" alt="Industri-4">
					<p>Industri</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/zero/industri-5.jpg" alt="Industri-4">
					<p>Perkantoran</p>
				</div>
			</div>
		</div>
	<?php
	elseif (isset($product[0]->ue_product_id) && $product[0]->ue_product_id == 6) :
	?>
		<div class="main-content epr-content">
			<h2>Fasilitas <i>Secure & Data Destruction</i></h2>
			<p>Dengan mempercayakan <i>Secure & Data Destruction</i> kepada Universal Eco, kami menyediakan fasilitas dari pengangkutan hingga pelaporan alur limbah untuk Anda.</p>
			<div class="row">
				<div class="col-md-3">
					<div class="daur-item daur-truck">
						<div class="daur-item-text">
							<p>Pengangkutan Limbah Sesuai Kebutuhan</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item data-secure">
						<div class="daur-item-text">
							<p>Pengelolaan Dokumen &amp;<br /><i>Harddisk</i> yang Aman</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item daur-teknologi">
						<div class="daur-item-text">
							<p>Teknologi Ramah Lingkungan</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item limbah-laporan">
						<div class="daur-item-text">
							<p>Laporan Alur Limbah</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="medis-content">
			<div class="main-content" style="background-color: rgba(65, 187, 172, 1);">
				<div class="row">
					<div class="col-md-5">
						<img src="<?php echo base_url(); ?>assets/images/data/content.jpg" alt="limbah-content" style="width: 100%;" />
					</div>
					<div class="col-md-5 col-md-offset-2 daur-text">
						<h2 style="font-size: 3rem;">Keamanan Data dan Dokumen Anda Adalah Prioritas Kami</h2>
						<p>Data merupakan sumber informasi dan bahan analisa bagi setiap perusahaan. Bersama Universal Eco akan menjaga dan memastikan kerahasiaan limbah dokumen dan data-data dari perusahaan anda secara aman sehingga anda akan lebih tenang.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="main-content epr-solution-content">
			<h2>Alur Proses Pengolahan Limbah Data &amp; Dokumen Perusahaan</h2>
			<div class="alur">
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/daur/icon-daur-1.png" alt="Secure-Data-1">
					<p style="font-size: 1.75rem;">Dapatkan penawaran pengelolaan limbah sesuai dengan kebutuhan anda</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/daur/icon-daur-2.png" alt="Secure-Data-2">
					<p style="font-size: 1.75rem;">Pilih waktu dan tanggal pelayanan, kami akan mengonfirmasi jadwal pengangkutan</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/data/icon-data-3.png" alt="Secure-Data-3">
					<p style="font-size: 1.75rem;">Kami datang dan mengangkut dokumen dan <i>hard disk</i> anda dan menghancurkannya untuk menjaga kerahasiaan informasi perusahaan anda</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/zero/icon-zero-4.png" alt="Secure-Data-4">
					<p style="font-size: 1.75rem;">Layanan ini dilengkapi dengan sertifikat pengelolaan limbah data &amp; dokumen. Semua kertas yang dihancurkan akan didaur ulang</p>
				</div>
			</div>
		</div>
	<?php
	elseif (isset($product[0]->ue_product_id) && $product[0]->ue_product_id == 7) :
	?>
		<div class="main-content epr-content">
			<h2>Fasilitas Pengelolaan Oli Bekas & Lumpur Minyak</h2>
			<p>Dengan mempercayakan Pengelolaan Oli Bekas dan Lumpur Minyak kepada Universal Eco, kami menyediakan fasilitas dari pengangkutan hingga pelaporan alur limbah untuk Anda.</p>
			<div class="row">
				<div class="col-md-3">
					<div class="daur-item daur-truck">
						<div class="daur-item-text">
							<p>Pengangkutan Limbah Sesuai Kebutuhan</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item daur-teknologi">
						<div class="daur-item-text">
							<p>Teknologi Ramah Lingkungan</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item limbah-izin">
						<div class="daur-item-text">
							<p>Pengelolaan Limbah B3 Berizin</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="daur-item limbah-laporan">
						<div class="daur-item-text">
							<p>Laporan Alur Limbah</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sludge-content">
			<div class="main-content" style="background: transparent;">
				<div class="row">
					<div class="col-md-4">&nbsp;</div>
					<div class="col-md-5 col-md-offset-2 daur-text">
						<h2 style="font-size: 3rem; margin-bottom: 50px;">Perolehan Kembali Minyak Mentah untuk Lingkungan yang Berkelanjutan</h2>
						<p style="font-size: 1.7rem;">Dengan mendaur ulang lumpur minyak dan memperoleh kembali minyak mentah maka eksplorasi produksi minyak di hulu yang rawan akan pencemaran lingkungan dapat berkurang sehingga pemenuhan kebutuhan energi yang berkelanjutan dapat terwujud.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="main-content epr-solution-content">
			<h2>Alur Proses Pengelolaan Limbah Oli Bekas & Lumpur Minyak</h2>
			<div class="alur">
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/sludge/alur-proses-1.png" alt="Sludge-1">
					<p>Limbah lumpur minyak dan oli bekas akan ditampung di tangki penampungan dan dipompa ke sistem decanter</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/sludge/alur-proses-2.png" alt="Sludge-2">
					<p>Sistem Decanter akan memproses limbah minyak dengan intervensi mekanis yang minimal</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/sludge/alur-proses-3.png" alt="Sludge-3">
					<p>Minyak mentah diperoleh kembali dan digunakan sebagai sumber energi baru</p>
				</div>
			</div>
		</div>
		<div class="main-content epr-solution-content">
			<h2>Cocok Untuk</h2>
			<div class="alur" style="justify-content: center">
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/sludge/industri-1.jpg" alt="Industri-1" style="border-radius: 12px; width: 100%;">
					<p>Manufaktur</p>
				</div>
				<div class="alur-item">
					<img src="<?php echo base_url(); ?>assets/images/sludge/industri-2.jpg" alt="Industri-2" style="border-radius: 12px; width: 100%;">
					<p><i>Oil &amp; Gas</i></p>
				</div>
			</div>
		</div>
	<?php
	endif;
	?>
	<!-- /.content -->
</div>