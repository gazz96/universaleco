<!-- Main content -->
<div class="content" style="padding: 35px 0;">
	<div class="row" style="border-bottom: 1px #CCC solid;">
		<div class="col-md-6">
			<div class="content-block">
				<ul>
					<li>
						<a href="<?php echo base_url(); ?>blog">Blog</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>news" class="active">News</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>infografis">Infografis</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-md-6">
			<form method="post" action="<?php echo base_url(); ?>news/search/">
				<div style="float: right; margin-right: 15px;" class="blog-search">
					<div class="input-group input-group-sm" style="width: 300px;">
						<input type="text" name="search" class="form-control pull-right" value="<?php echo isset($ur7) ? $ur7 : ''; ?>" placeholder="type your keywords here">
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
			<h1>News</h1>

			<div class="blog-section">
				<div class="row">
					<div class="col-md-12">
						<?php
						if (isset($blog) && count($blog) > 0) :
							$x = 1;
							foreach ($blog as $blogs) :
								$urlname = preg_replace("/[^A-Za-z0-9\-]/", "-", str_replace(" ", "-", strtolower($blogs->ue_blog_title)));

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
												if ($blogs->ue_blog_image != null && file_exists("./uploads/blog/" . $blogs->ue_blog_image)) :
												?>
													<img src="<?php echo base_url(); ?>uploads/blog/<?php echo $blogs->ue_blog_image; ?>" alt="Blog-<?php echo $blogs->ue_blog_id; ?>" />
												<?php
												endif;
												?>
											</div>
											<div class="blog-date"><?php echo date("d F Y", strtotime($blogs->ue_blog_date)); ?></div>
											<div class="blog-title"><?php echo $blogs->ue_blog_title; ?></div>
											<div class="blog-readmore">
												<a href="<?php echo $blogs->ue_blog_slug; ?>">Read More</a>
											</div>
										</div>
									</div>
									<?php
									if ($x % 3 == 0 || $x == count($blog)) :
									?>
									</div>
						<?php
									endif;
									$x++;
								endforeach;
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