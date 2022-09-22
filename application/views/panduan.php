<div class="main-homepages panduan-banner">
	<h1 class="big-title medium-title" style="font-size: 2.5rem!important;">Disini anda dapat memperoleh panduan<br />pengelolaan limbah B3 dan berbagai<br />peraturan- peraturan lingkungan terkini.</h1>
</div>
<!-- Main content -->
<div class="content">
	<div class="support-content">
		<div class="achievement-container">
			<div class="panduan-row">
				<?php
				if (isset($waste_category) && count($waste_category)) :
					foreach ($waste_category as $waste_categorys) :
				?>
						<div class="panduan-item">
							<a href="<?php echo base_url(); ?>panduan-limbah-b3/detail/<?php echo $waste_categorys->ue_waste_category_id; ?>">
								<div class="panduan-box">
									<?php
									if ($waste_categorys->ue_waste_category_icon != null && file_exists("./uploads/category/" . $waste_categorys->ue_waste_category_icon)) :
									?>
										<img src="<?php echo base_url(); ?>uploads/category/<?php echo $waste_categorys->ue_waste_category_icon; ?>" alt="category-<?php echo $waste_categorys->ue_waste_category_id; ?>" />
									<?php
									endif;
									?>
								</div>
								<div class="panduan-name"><?php echo $waste_categorys->ue_waste_category_name; ?></div>
							</a>
						</div>
				<?php
					endforeach;
				endif;
				?>
			</div>
		</div>
	</div>
</div>
<!-- /.content -->