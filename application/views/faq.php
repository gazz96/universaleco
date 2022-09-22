<div class="main-homepages faq-banner">
	<h1 class="big-title" style="text-align: center;">Frequently Asked Questions (FAQ)</h1>
</div>
<div class="syarat-content">
	<div class="row mb40">
		<div class="col-md-12">
			<?php
			if (isset($faq) && count($faq) > 0) {
			?>
				<div class="accordion" id="accordionExample">
					<?php
					$x = 1;
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
					}
					?>
				</div>
			<?php
			}
			?>
		</div>
		<div class="col-md-12" style="margin-top: 15px;">
			<a href="<?php echo base_url(); ?>kontak" style="color: #000; font-weight: bold; text-decoration: underline; font-size: 1.5rem; margin-left: 45px;">Butuh Info Lainnya ?</a>
		</div>
	</div>
</div>