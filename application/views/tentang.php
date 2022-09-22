<div class="main-homepages tentang-banner">
	<h1 class="big-title" style="font-size: 2.75rem; width: 55%;"><?php echo isset($content[0]->ue_content_title) ? $content[0]->ue_content_title : ''; ?></h1>
</div>
<!-- Main content -->
<div class="content">
	<div class="tentang-content">
		<div class="main-content">
			<h2><?php echo isset($content[0]->ue_content_sub_title) ? $content[0]->ue_content_sub_title : ''; ?></h2>
			<?php echo isset($content[0]->ue_content_description) ? $content[0]->ue_content_description : ''; ?>
		</div>
	</div>
	<div class="client-content">
		<div class="achievement-container">
			<h2>Sertifikasi</h2>
			<div class="client-data">
				<?php
				if (isset($certificate_list) && count($certificate_list) > 0) :
					foreach ($certificate_list as $certificate_lists) :
						if ($certificate_lists->ue_certificate_id != 1) :
				?>
							<div class="col-md-4">
								<div class="certificate-item">
									<img src="<?php echo base_url(); ?>uploads/certificate/<?php echo $certificate_lists->ue_certificate_icon; ?>" alt="certificate-<?php echo $certificate_lists->ue_certificate_id; ?>">
								</div>
							</div>
				<?php
						endif;
					endforeach;
				endif;
				?>
			</div>
		</div>
	</div>
	<div class="support-content">
		<div class="achievement-container">
			<h2>Kode Limbah Universal Eco</h2>
			<div class="achievement-data limbah-data">
				<?php
				if (isset($limbahcategory_list) && count($limbahcategory_list) > 0) :
				?>
					<div class="accordion accordion-tentang" id="accordionExample">
						<?php
						foreach ($limbahcategory_list as $limbahcategory_lists) :
						?>
							<div class="card">
								<div class="card-header" id="headingOne">
									<h5>
										<button class="btn btn-link collapse-title collapsed" data-toggle="collapse" data-target="#collapseOne-<?php echo $limbahcategory_lists->ue_limbah_category_id; ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo $limbahcategory_lists->ue_limbah_category_id; ?>" style="padding-right: 30px;">
											<div><?php echo $limbahcategory_lists->ue_limbah_category_name; ?></div>
										</button>
									</h5>
								</div>

								<div id="collapseOne-<?php echo $limbahcategory_lists->ue_limbah_category_id; ?>" class="collapse collapse-content" aria-labelledby="headingOne-<?php echo $limbahcategory_lists->ue_limbah_category_id; ?>" data-parent="#accordion">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered">
												<tr>
													<th align="center">No</th>
													<th>Kode Pengangkutan</th>
													<th>Uraian/Jenis Limbah</th>
												</tr>
												<?php
												if (isset($limbah_list[$limbahcategory_lists->ue_limbah_category_id]) && count($limbah_list[$limbahcategory_lists->ue_limbah_category_id]) > 0 && $limbah_list[$limbahcategory_lists->ue_limbah_category_id] != null) :
													$no = 1;
													foreach ($limbah_list[$limbahcategory_lists->ue_limbah_category_id] as $limbah_lists) :
												?>
														<tr>
															<td><?php echo $no; ?></td>
															<td><?php echo $limbah_lists->ue_limbah_code; ?></td>
															<td><?php echo $limbah_lists->ue_limbah_description; ?></td>
														</tr>
												<?php
														$no++;
													endforeach;
												endif;
												?>
											</table>
										</div>
									</div>
								</div>
							</div>
						<?php
						endforeach;
						/*$x = 1;
					foreach ($faq as $faqs) {
					?>
						<div class="card">
							<div class="card-header" id="headingOne">
								<h5 class="mb-0">
									<button class="btn btn-link collapse-title collapsed" data-toggle="collapse" data-target="#collapseOne-<?php echo $x; ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo $x; ?>" style="padding-right: 20px;">
										<div><?php echo $faqs->ue_faq_title; ?></div>
									</button>
								</h5>
							</div>

							<div id="collapseOne-<?php echo $x; ?>" class="collapse collapse-content" aria-labelledby="headingOne-<?php echo $x; ?>" data-parent="#accordion">
								<div class="card-body">
									<?php echo $faqs->ue_faq_description; ?>
								</div>
							</div>
						</div>
					<?php
						$x++;
					}*/
						?>
					</div>
				<?php
				endif;
				?>
			</div>
		</div>
	</div>
</div>
<!-- /.content -->