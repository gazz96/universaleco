<div class="main-homepages kontak-banner penawaran-banner">
	<div class="penawaran-content">
		<h1 class="big-title"><?php echo isset($content[0]->ue_content_title) ? $content[0]->ue_content_title : ''; ?></h1>
		<?php echo isset($content[0]->ue_content_description) ? $content[0]->ue_content_description : ''; ?>
	</div>
</div>
<!-- Main content -->
<div class="content">
	<div class="support-content">
		<div class="achievement-container contact-container">
			<h2>Kami Siap Menjawab Kebutuhan Anda</h2>
			<h3>Silahkan Tinggalkan Pesan:</h3>
			<?php
			if (isset($this->session->userdata['success']) && !empty($this->session->userdata['success'])) {
			?>
				<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<p><?php echo $this->session->userdata['success']; ?></p>
				</div>
			<?php
				$this->session->set_userdata(array('success' => ''));
			}

			if (isset($this->session->userdata['err']) && !empty($this->session->userdata['err'])) {
			?>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<p><?php echo $this->session->userdata['err']; ?></p>
				</div>
			<?php
				$this->session->set_userdata(array('err' => ''));
			}
			?>
			<div class="row">
				<div class="col-md-7">
					<form method="post" class="contact-form" action="<?php echo base_url(); ?>penawaran">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="name">Nama</label>
									<input type="text" name="name" id="name" class="form-control" maxlength="255" value="<?php echo set_value("name"); ?>">
								</div>
								<?php
								$errorname = form_error('name');

								if (!empty($errorname)) {
								?>
									<div class="alert alert-danger alert-danger-form">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<p><?php echo $errorname; ?></p>
									</div>
								<?php
								}
								?>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="phone">Telp</label>
									<input type="text" name="phone" id="phone" class="form-control" maxlength="35" value="<?php echo set_value("phone"); ?>">
								</div>
								<?php
								$errorphone = form_error('phone');

								if (!empty($errorphone)) {
								?>
									<div class="alert alert-danger alert-danger-form">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<p><?php echo $errorphone; ?></p>
									</div>
								<?php
								}
								?>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="office">Perusahaan/Kantor</label>
									<input type="text" name="office" id="office" class="form-control" maxlength="255" value="<?php echo set_value("office"); ?>">
								</div>
								<?php
								$erroroffice = form_error('office');

								if (!empty($erroroffice)) {
								?>
									<div class="alert alert-danger alert-danger-form">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<p><?php echo $erroroffice; ?></p>
									</div>
								<?php
								}
								?>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="companytype">Jenis Perusahaan</label>
									<input type="text" name="companytype" id="companytype" class="form-control" maxlength="35" value="<?php echo set_value("companytype"); ?>">
								</div>
								<?php
								$errorcompanytype = form_error('companytype');

								if (!empty($errorcompanytype)) {
								?>
									<div class="alert alert-danger alert-danger-form">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<p><?php echo $errorcompanytype; ?></p>
									</div>
								<?php
								}
								?>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="interest">Jenis Layanan</label>
									<div class="checkbox">
										<label><input type="checkbox" name="interest[0]" id="interest-0" value="Extended Producer Responsibility"> Extended Producer Responsibility</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="interest[1]" id="interest-1" value="Daur Ulang Plastik & Kemasan B3"> Daur Ulang Plastik &amp; Kemasan B3</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="interest[2]" id="interest-2" value="Pengolahan Limbah B3"> Pengolahan Limbah B3</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="interest[3]" id="interest-3" value="Pengolahan Limbah Medis & Farmasi"> Pengolahan Limbah Medis &amp; Farmasi</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="interest[4]" id="interest-4" value="Zero Waste Treatment"> Zero Waste Treatment</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="interest[5]" id="interest-5" value="Secure Data Destruction"> Secure Data Destruction</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="interest[6]" id="interest-6" value="Pemanfaatan Oli Bekas & Oil Sludge"> Pemanfaatan Oli Bekas &amp; Oil Sludge</label>
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="interest[7]" id="interest-7" value="Belum Tahu"> Belum Tahu</label>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="estimate">Estimasi Jumlah per Bulan</label>
									<input type="text" name="estimate" id="estimate" class="form-control" maxlength="35" value="<?php echo set_value("estimate"); ?>">
								</div>
								<?php
								$errorestimate = form_error('estimate');

								if (!empty($errorestimate)) {
								?>
									<div class="alert alert-danger alert-danger-form">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<p><?php echo $errorestimate; ?></p>
									</div>
								<?php
								}
								?>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="location">Lokasi Pengangkutan</label>
									<input type="text" name="location" id="location" class="form-control" maxlength="35" value="<?php echo set_value("location"); ?>">
								</div>
								<?php
								$errorlocation = form_error('location');

								if (!empty($errorlocation)) {
								?>
									<div class="alert alert-danger alert-danger-form">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<p><?php echo $errorlocation; ?></p>
									</div>
								<?php
								}
								?>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="description">Deskripsi Limbah</label>
									<textarea name="description" id="description" class="form-control" rows="7"><?php echo set_value("description"); ?></textarea>
								</div>
								<?php
								$errordescription = form_error('description');

								if (!empty($errordescription)) {
								?>
									<div class="alert alert-danger alert-danger-form">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<p><?php echo $errordescription; ?></p>
									</div>
								<?php
								}
								?>
							</div>
							<div class="col-md-12">
								<button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-4 col-md-offset-1">
					<div class="row">
						<div class="col-md-12">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15866.854273711182!2d106.819773!3d-6.169096!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9b5b0e8bd0a43d0d!2sUniversal%20Eco%20%7C%20Jasa%20Pengolahan%20Limbah!5e0!3m2!1sid!2sid!4v1633277693392!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
							<h4>HEAD OFFICE</h4>
							<p>Komplek Majapahit Permai Blok C No.109<br />Jl. Majapahit Jakarta Pusat<br />Telp. 021-351784 / 021-3520701</p>
						</div>
						<div class="col-md-12">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15866.032527333764!2d106.3163452!3d-6.1964883!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xadde575c123badd1!2sPT%20UNIVERSAL%20ECO%20PASIFIC!5e0!3m2!1sid!2sid!4v1633277716783!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
							<h4>PROCESSING FACILITY</h4>
							<p>Jl. Modern Industri XV Blok AD No. 4<br />Desa Sukatani Kecamatan Cikande<br />Serang 42186</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.content -->