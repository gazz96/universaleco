<!-- Main content -->
<?php
$ur5 = $this->uri->segment(5);
?>
<div class="content" style="padding: 35px 0;">
	<div class="row" style="border-bottom: 1px #CCC solid;">
		<div class="col-md-6">
			<div class="content-block">
				<ul>
					<li>
						<a href="<?php echo base_url(); ?>blog">Blog</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>news">News</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>infografis" class="active">Infografis</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-md-6">
			<form method="post" action="<?php echo base_url(); ?>blog/search/">
				<div style="float: right; margin-right: 15px;" class="blog-search">
					<div class="input-group input-group-sm" style="width: 300px;">
						<input type="text" name="search" class="form-control pull-right" value="<?php echo isset($ur5) ? str_replace("-", " ", $ur5) : ''; ?>" placeholder="type your keywords here">
						<div class="input-group-btn">
							<button type="submit" name="submit" class="btn btn-default blue-bg"><i class="fa fa-search"></i></button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="main-content blog-content">
		<div class="container">
			<h1>Infografis</h1>

			<div class="blog-section">
				<div class="row">
					<div class="col-md-12">
						<?php
						if (isset($infografis) && count($infografis) > 0) :
							$x = 1;
							foreach ($infografis as $infografiss) :
								if ($x == 1 || $x % 3 == 1) :
						?>
									<div class="row">
									<?php
								endif;
									?>
									<div class="col-md-4">
										<div class="blog-item">
											<div class="blog-image">
												<?php
												if ($infografiss->ue_infografis_image != null && file_exists("./uploads/infografis/" . $infografiss->ue_infografis_image)) :
												?>
													<img src="<?php echo base_url(); ?>uploads/infografis/<?php echo $infografiss->ue_infografis_image; ?>" alt="Blog-<?php echo $infografiss->ue_infografis_id; ?>" />
												<?php
												endif;
												?>
											</div>
											<div class="blog-title"><?php echo $infografiss->ue_infografis_name; ?></div>
											<div class="infografis-readmore">
												<?php
												if ($infografiss->ue_infografis_url != null && file_exists("./uploads/infografis/" . $infografiss->ue_infografis_url)) :
												?>
													<a href="<?php echo base_url(); ?>uploads/infografis/<?php echo $infografiss->ue_infografis_url; ?>" class="download-link"><button type="button">Download</button></a>
												<?php
												endif;
												?>
											</div>
										</div>
									</div>
									<?php
									if ($x % 3 == 0 || $x == count($infografis)) :
									?>
									</div>
						<?php
									endif;
								endforeach;
								$x++;
							endif;
						?>
					</div>
				</div>
				<div class="clearfix">
					<ul class="pagination pagination-sm no-margin pull-left">
						<?php
						if (isset($links) && !empty($links)) {
						?>
							<li><?php echo $links; ?></li>
						<?php
						} else {
						?>
							<li class="disabled"><a href="#!">«</a></li>
							<li class="active"><a href="#!">1</a></li>
							<li class="disabled"><a href="#!">»</a></li>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.content -->