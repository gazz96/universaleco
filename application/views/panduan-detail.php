<!-- Main content -->
<div class="content">
	<div class="support-content">
		<div class="achievement-container">
			<div class="panduan-detail">
				<h3><?php echo isset($waste[0]->ue_waste_category_name) ? $waste[0]->ue_waste_category_name : ''; ?></h3>
				<div class="table-responsive">
					<table class="table table-panduan">
						<tr>
							<th style="text-align: center">No.</th>
							<th>Panduan</th>
							<th style="text-align: center">Sumber Panduan</th>
							<th>&nbsp;</th>
						</tr>
						<?php
						if (isset($waste) && count($waste) > 0) :
							$x = 1;
							foreach ($waste as $wastes) :
						?>
								<tr>
									<td align="center"><?php echo $x; ?></td>
									<td><?php echo $wastes->ue_waste_name; ?></td>
									<td align="center"><?php echo $wastes->ue_waste_source; ?></td>
									<td align="center">
										<?php
										if ($wastes->ue_waste_url != null && file_exists("./uploads/waste/" . $wastes->ue_waste_url)) :
										?>
											<a href="<?php echo base_url() . "uploads/waste/" . $wastes->ue_waste_url; ?>" class="download-link"><strong>download</strong></a>
										<?php
										else :
										?>
											<a href="!#" class="download-link"><strong>download</strong></a>
										<?php
										endif;
										?>
									</td>
								</tr>
						<?php
								$x++;
							endforeach;
						endif;
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.content -->