<?php
$ur2 = $this->uri->segment(3);
$ur3 = $this->uri->segment(4);
$ur4 = $this->uri->segment(5);
$ur5 = $this->uri->segment(6);
$ur6 = $this->uri->segment(7);
$ur7 = $this->uri->segment(8);
$ur8 = $this->uri->segment(9);

if (empty($ur4)) {
	$searchlink = "";
} else if (empty($ur5)) {
	$searchlink = $ur4;
} else {
	$searchlink = $ur4 . "/" . $ur5;
}

$search = null;
if (!empty($ur7)) {
	$search = "/" . $ur7;
}

$arrow_type = "fa fa-angle-down";
$arrow_title = "fa fa-angle-down";
$arrow_sub_title = "fa fa-angle-down";
$arrow_status = "fa fa-angle-down";
$link_type = base_url() . "admin/content/index/" . $ur3 . "/type/desc/" . $ur6 . $search;
$link_title = base_url() . "admin/content/index/" . $ur3 . "/title/desc/" . $ur6 . $search;
$link_sub_title = base_url() . "admin/content/index/" . $ur3 . "/subtitle/desc/" . $ur6 . $search;
$link_status = base_url() . "admin/content/index/" . $ur3 . "/status/desc/" . $ur6 . $search;

if (empty($ur4)) {
	$arrow_type = "fa fa-angle-down";
	$arrow_title = "fa fa-angle-down";
	$arrow_sub_title = "fa fa-angle-down";
	$arrow_status = "fa fa-angle-down";
	$link_type = base_url() . "admin/content/index/" . $ur3 . "/type/desc/" . $ur6 . $search;
	$link_title = base_url() . "admin/content/index/" . $ur3 . "/title/desc/" . $ur6 . $search;
	$link_sub_title = base_url() . "admin/content/index/" . $ur3 . "/subtitle/desc/" . $ur6 . $search;
	$link_status = base_url() . "admin/content/index/" . $ur3 . "/status/desc/" . $ur6 . $search;
} else if ($ur4 == "type" && $ur5 == "asc") {
	$arrow_type = "fa fa-angle-down";
	$link_type = base_url() . "admin/content/index/" . $ur3 . "/type/desc/" . $ur6 . $search;
} else if ($ur4 == "type" && $ur5 == "desc") {
	$arrow_type = "fa fa-angle-up";
	$link_type = base_url() . "admin/content/index/" . $ur3 . "/type/asc/" . $ur6 . $search;
} else if ($ur4 == "title" && $ur5 == "asc") {
	$arrow_title = "fa fa-angle-down";
	$link_title = base_url() . "admin/content/index/" . $ur3 . "/title/desc/" . $ur6 . $search;
} else if ($ur4 == "title" && $ur5 == "desc") {
	$arrow_title = "fa fa-angle-up";
	$link_title = base_url() . "admin/content/index/" . $ur3 . "/title/asc/" . $ur6 . $search;
} else if ($ur4 == "subtitle" && $ur5 == "asc") {
	$arrow_sub_title = "fa fa-angle-down";
	$link_sub_title = base_url() . "admin/content/index/" . $ur3 . "/subtitle/desc/" . $ur6 . $search;
} else if ($ur4 == "subtitle" && $ur5 == "desc") {
	$arrow_sub_title = "fa fa-angle-up";
	$link_sub_title = base_url() . "admin/content/index/" . $ur3 . "/subtitle/asc/" . $ur6 . $search;
} else if ($ur4 == "status" && $ur5 == "asc") {
	$arrow_status = "fa fa-angle-down";
	$link_status = base_url() . "admin/content/index/" . $ur3 . "/status/desc/" . $ur6 . $search;
} else if ($ur4 == "status" && $ur5 == "desc") {
	$arrow_status = "fa fa-angle-up";
	$link_status = base_url() . "admin/content/index/" . $ur3 . "/status/asc/" . $ur6 . $search;
}
?>

<div class="row mt40 mb20 header-section">
	<div class="col-md-6">
		<a href="<?php echo base_url(); ?>admin/content/add">
			<button class="btn btn-primary blue-bg">Tambah Konten Baru</button>
		</a>
	</div>
	<div class="col-md-6" style="text-align: right;">
		<form name="search-form" method="post" action="<?php echo base_url(); ?>admin/content/search/<?php echo $searchlink; ?>">
			<div style="float: right;">
				<div class="input-group input-group-sm" style="width: 150px; float: left; margin-right: 3px;">
					<select name="searchby" class="form-control pull-right" id="searchby">
						<option value="" disabled selected>Cari Berdasarkan</option>
						<option value="type" <?php echo $ur6 == "type" ? ' selected="selected"' : ''; ?>>Tipe</option>
						<option value="title" <?php echo $ur6 == "title" ? ' selected="selected"' : ''; ?>>Judul</option>
						<option value="subtitle" <?php echo $ur6 == "subtitle" ? ' selected="selected"' : ''; ?>>Sub Judul</option>
					</select>
				</div>
				<div class="input-group input-group-sm" style="width: 200px;">
					<input type="text" name="search" class="form-control pull-right" placeholder="Cari" value="<?php echo isset($ur7) ? $ur7 : ''; ?>">
					<div class="input-group-btn">
						<button type="submit" name="submit" class="btn btn-default blue-bg"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="row" style="margin-left: 0; margin-right: 0;">
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
	<div class="col-md-12 white-section">
		<div class="table-responsive">
			<table class="table table-grey">
				<tr>
					<th>&nbsp;</th>
					<th><a href="<?php echo $link_type; ?>">Tipe <i class="<?php echo $arrow_type; ?>"></i></a></th>
					<th><a href="<?php echo $link_title; ?>">Judul <i class="<?php echo $arrow_title; ?>"></i></a></th>
					<th><a href="<?php echo $link_sub_title; ?>">Sub Judul <i class="<?php echo $arrow_sub_title; ?>"></i></a></th>
					<th><a href="<?php echo $link_status; ?>">Status <i class="<?php echo $arrow_status; ?>"></i></a></th>
					<th width="7%" class="text-center">Aksi</th>
				</tr>
				<?php
				if (isset($content) && count($content) > 0) :
					$x = (($ur3 - 1) * 15) + 1;
					foreach ($content as $contents) :
				?>
						<tr>
							<td><?php echo $x; ?></td>
							<td><?php echo ucwords($contents->ue_content_type); ?></td>
							<td><?php echo $contents->ue_content_title; ?></td>
							<td><?php echo $contents->ue_content_sub_title; ?></td>
							<td><?php echo $contents->ue_content_status == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
							<td align="center">
								<a href="<?php echo base_url(); ?>admin/content/detail/<?php echo $contents->ue_content_id; ?>" class="action-link"><i class="fa fa-pencil" aria-hidden="true"></i></a>
							</td>
						</tr>
					<?php
						$x++;
					endforeach;
				else :
					?>
					<tr>
						<td colspan="6" align="center">Konten tidak dapat ditemukan</td>
					</tr>
				<?php
				endif;
				?>
			</table>
		</div>
		<div class="clearfix">
			<ul class="pagination pagination-sm no-margin pull-right">
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