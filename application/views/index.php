<div class="homepages">
	<?php
	if (isset($homepage_list) && count($homepage_list) > 0) :
	?>
		<div class="owl-carousel owl-theme homepage">
			<?php
			$x = 1;
			foreach ($homepage_list as $homepage_lists) :
				if ($homepage_lists->ue_homepage_url != null && file_exists("./uploads/homepage/" . $homepage_lists->ue_homepage_url)) :
			?>
					<div class="item">
						<img src="<?php echo base_url(); ?>uploads/homepage/<?php echo $homepage_lists->ue_homepage_url; ?>" alt="" />
						<div class="item-text">
							<h1 class="big-title <?php echo $x % 2 == 0 ? "even" : ""; ?>"><?php echo $homepage_lists->ue_homepage_title; ?></h1>
							<?php
							if (!empty($homepage_lists->ue_homepage_description) && $homepage_lists->ue_homepage_description != null) {
							?>
								<p class="big-description <?php echo $x % 2 == 0 ? "even" : ""; ?>"><?php echo $homepage_lists->ue_homepage_description; ?></p>
							<?php
							}

							if ($homepage_lists->ue_homepage_link != null) :
							?>
								<a href="<?php echo $homepage_lists->ue_homepage_link; ?>"><button type="button" class="btn link-button">Pelajari Lebih Lanjut</button></a>
							<?php
							endif;

							if ($homepage_lists->ue_homepage_id == 3) :
							?>
								<button type="button" class="btn contact-button homepage-contact-button">Hubungi Kami</button>
							<?php
							endif;
							?>
						</div>
					</div>
			<?php
					$x++;
				endif;
			endforeach;
			?>
		</div>
	<?php
	endif;
	?>
</div>
<!--<div class="main-homepages">
	<div>
		<img src="<?php //echo base_url(); 
					?>assets/images/mascot.png" />
	</div>
	<h1 class="big-title">Jual Barang Elektronik Bekas Anda &amp; Dapatkan Penghasilan Tambahan</h1>
</div>-->
<!-- Main content -->
<div class="content">
	<div class="main-content">
		<h2>Apa yang kami lakukan</h2>
		<div class="alur">
			<?php
			if (isset($service_list) && count($service_list) > 0) :
				foreach ($service_list as $service_lists) :
			?>
					<div class="alur-item">
						<?php
						if ($service_lists->ue_service_icon != null && file_exists("uploads/service/" . $service_lists->ue_service_icon)) :
						endif;
						?>
						<img src="<?php echo base_url(); ?>uploads/service/<?php echo $service_lists->ue_service_icon; ?>" alt="<?php echo $service_lists->ue_service_id; ?>">
						<p><?php echo $service_lists->ue_service_description; ?></p>
					</div>
			<?php
				endforeach;
			endif;
			?>
		</div>
	</div>

	<div class="layanan-content">
		<div class="layanan-container">
			<h2>Layanan Pengolahan Limbah Kami</h2>
			<div class="layanan-section">
				<div class="layanan-row">
					<?php
					if (isset($product_list) && count($product_list) > 0) :
						$x = 1;
						foreach ($product_list as $product_lists) :
							$urlname = preg_replace("/[^A-Za-z0-9\-]/", "-", str_replace(" ", "-", strtolower($product_lists->ue_product_name)));
							if ($x == 1 || ($x > 4 && $x % 4 == 1)) :
					?>
								<div class="layanan-line">
								<?php
							endif;
								?>
								<div class="col-md-3">
									<div class="layanan-item">
										<div class="layanan-img">
											<?php
											if ($product_lists->ue_product_image != null && file_exists("./uploads/product/" . $product_lists->ue_product_image)) :
											?>
												<img src="<?php echo base_url(); ?>uploads/product/<?php echo $product_lists->ue_product_image; ?>" alt="Product-<?php echo $product_lists->ue_product_id; ?>" />
											<?php
											endif;
											?>
										</div>
										<div class="layanan-data">
											<div class="layanan-title">
												<h3><?php echo $product_lists->ue_product_name; ?></h3>
											</div>
											<div class="layanan-sub" id="sub-<?php echo $product_lists->ue_product_id; ?>">
												<?php echo $product_lists->ue_product_excerpt; ?>
												<?php
												if ($product_lists->ue_product_name == "E-Waste") :
												?>
													<a href="https://jualscrap.universaleco.id/" target="_blank">Pelajari Lebih Lanjut</a>
												<?php
												else :
												?>
													<a href="<?php echo base_url(); ?>content/<?php echo $urlname; ?>/<?php echo $product_lists->ue_product_id; ?>">Pelajari Lebih Lanjut</a>
												<?php
												endif;
												?>
											</div>
										</div>
									</div>
									<div class="layanan-arrow" id="arr-<?php echo $product_lists->ue_product_id; ?>"><i class="fa fa-angle-down"></i></div>
								</div>
								<?php
								if (($x > 1 && $x % 4 == 0) || $x == count($product_list)) :
								?>
								</div>
					<?php
								endif;

								$x++;
							endforeach;
						endif;
					?>
					</>
				</div>
			</div>
		</div>
	</div>
	<div class="achievement-content">
		<div class="achievement-container">
			<h2>Pencapaian Kami</h2>
			<div class="achievement-data">
				<?php
				if (isset($achievement_list) && count($achievement_list) > 0) :
					foreach ($achievement_list as $achievement_lists) :
				?>
						<div class="achievement-item">
							<h3><?php echo $achievement_lists->ue_achievement_value; ?></h3>
							<p><?php echo $achievement_lists->ue_achievement_description; ?></p>
						</div>
				<?php
					endforeach;
				endif;
				?>
			</div>
		</div>
	</div>
	<div class="client-content">
		<div class="achievement-container">
			<h2>Brand yang Telah Mempercayai Kami</h2>
			<div class="client-data">
				<?php
				if (isset($client_list) && count($client_list) > 0) :
					foreach ($client_list as $client_lists) :
				?>
						<div class="col-md-4">
							<div class="client-item">
								<img src="<?php echo base_url(); ?>uploads/client/<?php echo $client_lists->ue_client_icon; ?>" alt="client-<?php echo $client_lists->ue_client_id; ?>">
							</div>
						</div>
				<?php
					endforeach;
				endif;
				?>
			</div>
		</div>
	</div>
	<div class="support-content">
		<div class="achievement-container">
			<h2>Berbagai Ukuran untuk Kebutuhan Pengangkutan Limbah Anda</h2>
			<div class="achievement-data">
				<?php
				if (isset($support_list) && count($support_list) > 0) :
					foreach ($support_list as $support_lists) :
				?>
						<div class="achievement-item">
							<img src="<?php echo base_url(); ?>uploads/support/<?php echo $support_lists->ue_support_icon; ?>" alt="support-<?php echo $support_lists->ue_support_id; ?>">
							<p class="black-text"><?php echo $support_lists->ue_support_name; ?></p>
						</div>
				<?php
					endforeach;
				endif;
				?>
			</div>
			<p class="support-footer">Kami melayani pengolahan dan pengangkutan limbah di wilayah Jakarta, Bekasi, Tangerang, Banten, Karawang, Bogor, Serang, Depok, Bandung,Sukabumi, Purwakarta, Subang, Semarang, Yogyakarta, Jawa Barat dan jawa Tengah.</p>
		</div>
	</div>
	<!-- /.content -->