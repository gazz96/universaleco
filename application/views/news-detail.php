<?php
$bg = null;
if (isset($blog[0]->ue_blog_bg) && $blog[0]->ue_blog_bg != null && file_exists("./uploads/blog/" . $blog[0]->ue_blog_bg)) :
	$bg = 'style="background: url(../../../uploads/blog/' . $blog[0]->ue_blog_bg . ');"';
endif;
?>
<div class="main-homepagess" <?php echo $bg; ?>></div>
<!-- Main content -->
<div class="content blog-detail-content" style="margin-top: 35px;">
	<div class="container">
		<?php echo isset($blog[0]->ue_blog_title) ? "<h1>" . $blog[0]->ue_blog_title . "</h1>" : ''; ?>
		<?php echo isset($blog[0]->ue_blog_description) ? $blog[0]->ue_blog_description : ''; ?>
	</div>
</div>
<!-- /.content -->