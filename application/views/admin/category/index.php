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

$arrow_name = "fa fa-angle-down";
$arrow_status = "fa fa-angle-down";
$link_name = base_url() . "admin/category/index/" . $ur3 . "/name/desc/" . $ur6 . $search;
$link_status = base_url() . "admin/category/index/" . $ur3 . "/status/desc/" . $ur6 . $search;

if (empty($ur4)) {
	$arrow_name = "fa fa-angle-down";
	$arrow_status = "fa fa-angle-down";
	$link_name = base_url() . "admin/category/index/" . $ur3 . "/name/desc/" . $ur6 . $search;
	$link_status = base_url() . "admin/category/index/" . $ur3 . "/status/desc/" . $ur6 . $search;
} else if ($ur4 == "name" && $ur5 == "asc") {
	$arrow_name = "fa fa-angle-down";
	$link_name = base_url() . "admin/category/index/" . $ur3 . "/name/desc/" . $ur6 . $search;
} else if ($ur4 == "name" && $ur5 == "desc") {
	$arrow_name = "fa fa-angle-up";
	$link_name = base_url() . "admin/category/index/" . $ur3 . "/name/asc/" . $ur6 . $search;
} else if ($ur4 == "status" && $ur5 == "asc") {
	$arrow_status = "fa fa-angle-down";
	$link_status = base_url() . "admin/category/index/" . $ur3 . "/status/desc/" . $ur6 . $search;
} else if ($ur4 == "status" && $ur5 == "desc") {
	$arrow_status = "fa fa-angle-up";
	$link_status = base_url() . "admin/category/index/" . $ur3 . "/status/asc/" . $ur6 . $search;
}
?>

<div class="row mt40 mb20 header-section">
	<div class="col-md-6">
		<a href="<?php echo base_url(); ?>admin/category/add">
			<button class="btn btn-primary blue-bg">Tambah Data Baru</button>
		</a>
	</div>
	<div class="col-md-6" style="text-align: right;">
		<form name="search-form" method="post" action="<?php echo base_url(); ?>admin/category/search/<?php echo $searchlink; ?>">
			<div style="float: right;">
				<div class="input-group input-group-sm" style="width: 150px; float: left; margin-right: 3px;">
					<select name="searchby" class="form-control pull-right" id="searchby">
						<option value="" disabled selected>Cari Berdasarkan</option>
						<option value="name" <?php echo $ur6 == "name" ? ' selected="selected"' : ''; ?>>Nama</option>
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
					<th><a href="<?php echo $link_name; ?>">Nama <i class="<?php echo $arrow_name; ?>"></i></a></th>
					<th>Ikon</th>
					<th><a href="<?php echo $link_status; ?>">Status <i class="<?php echo $arrow_status; ?>"></i></a></th>
					<th colspan="2" width="7%" class="text-center">Aksi</th>
				</tr>
				<?php
				if (isset($category) && count($category) > 0) :
					$x = (($ur3 - 1) * 15) + 1;
					foreach ($category as $categorys) :
				?>
						<tr>
							<td><?php echo $x; ?></td>
							<td><?php echo $categorys->ue_waste_category_name; ?></td>
							<td><img src="<?php echo base_url() . "uploads/category/" . $categorys->ue_waste_category_icon; ?>" alt="" width="150" /></td>
							<td><?php echo $categorys->ue_waste_category_status == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
							<td align="center">
								<a href="<?php echo base_url(); ?>admin/category/detail/<?php echo $categorys->ue_waste_category_id; ?>" class="action-link"><i class="fa fa-pencil" aria-hidden="true"></i></a>
							</td>
							<td align="center">
								<a href="<?php echo base_url(); ?>admin/category/delete/<?php echo $categorys->ue_waste_category_id; ?>" onclick="dialconfirm('<?php echo $categorys->ue_waste_category_id; ?>');return false;" id="del-button<?php echo $categorys->ue_waste_category_id; ?>" class="action-link"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</td>
						</tr>
					<?php
						$x++;
					endforeach;
				else :
					?>
					<tr>
						<td colspan="6" align="center">Kategori panduan limbah B3 tidak dapat ditemukan</td>
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
					<li class="disabled"><a href="#!">??</a></li>
					<li class="active"><a href="#!">1</a></li>
					<li class="disabled"><a href="#!">??</a></li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>
</div>