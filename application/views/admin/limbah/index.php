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

$arrow_category = "fa fa-angle-down";
$arrow_code = "fa fa-angle-down";
$arrow_description = "fa fa-angle-down";
$arrow_status = "fa fa-angle-down";
$link_category = base_url() . "admin/limbah/index/" . $ur3 . "/category/desc/" . $ur6 . $search;
$link_code = base_url() . "admin/limbah/index/" . $ur3 . "/code/desc/" . $ur6 . $search;
$link_description = base_url() . "admin/limbah/index/" . $ur3 . "/description/desc/" . $ur6 . $search;
$link_status = base_url() . "admin/limbah/index/" . $ur3 . "/status/desc/" . $ur6 . $search;

if (empty($ur4)) {
	$arrow_category = "fa fa-angle-down";
	$arrow_code = "fa fa-angle-down";
	$arrow_description = "fa fa-angle-down";
	$arrow_status = "fa fa-angle-down";
	$link_category = base_url() . "admin/limbah/index/" . $ur3 . "/category/desc/" . $ur6 . $search;
	$link_code = base_url() . "admin/limbah/index/" . $ur3 . "/code/desc/" . $ur6 . $search;
	$link_description = base_url() . "admin/limbah/index/" . $ur3 . "/description/desc/" . $ur6 . $search;
	$link_status = base_url() . "admin/limbah/index/" . $ur3 . "/status/desc/" . $ur6 . $search;
} else if ($ur4 == "category" && $ur5 == "asc") {
	$arrow_category = "fa fa-angle-down";
	$link_category = base_url() . "admin/limbah/index/" . $ur3 . "/category/desc/" . $ur6 . $search;
} else if ($ur4 == "category" && $ur5 == "desc") {
	$arrow_category = "fa fa-angle-up";
	$link_category = base_url() . "admin/limbah/index/" . $ur3 . "/category/asc/" . $ur6 . $search;
} else if ($ur4 == "code" && $ur5 == "asc") {
	$arrow_code = "fa fa-angle-down";
	$link_code = base_url() . "admin/limbah/index/" . $ur3 . "/code/desc/" . $ur6 . $search;
} else if ($ur4 == "code" && $ur5 == "desc") {
	$arrow_code = "fa fa-angle-up";
	$link_code = base_url() . "admin/limbah/index/" . $ur3 . "/code/asc/" . $ur6 . $search;
} else if ($ur4 == "description" && $ur5 == "asc") {
	$arrow_description = "fa fa-angle-down";
	$link_description = base_url() . "admin/limbah/index/" . $ur3 . "/description/desc/" . $ur6 . $search;
} else if ($ur4 == "description" && $ur5 == "desc") {
	$arrow_description = "fa fa-angle-up";
	$link_description = base_url() . "admin/limbah/index/" . $ur3 . "/description/asc/" . $ur6 . $search;
} else if ($ur4 == "status" && $ur5 == "asc") {
	$arrow_status = "fa fa-angle-down";
	$link_status = base_url() . "admin/limbah/index/" . $ur3 . "/status/desc/" . $ur6 . $search;
} else if ($ur4 == "status" && $ur5 == "desc") {
	$arrow_status = "fa fa-angle-up";
	$link_status = base_url() . "admin/limbah/index/" . $ur3 . "/status/asc/" . $ur6 . $search;
}
?>

<div class="row mt40 mb20 header-section">
	<div class="col-md-6">
		<a href="<?php echo base_url(); ?>admin/limbah/add">
			<button class="btn btn-primary blue-bg">Tambah Data Baru</button>
		</a>
	</div>
	<div class="col-md-6" style="text-align: right;">
		<form name="search-form" method="post" action="<?php echo base_url(); ?>admin/limbah/search/<?php echo $searchlink; ?>">
			<div style="float: right;">
				<div class="input-group input-group-sm" style="width: 150px; float: left; margin-right: 3px;">
					<select name="searchby" class="form-control pull-right" id="searchby">
						<option value="" disabled selected>Cari Berdasarkan</option>
						<option value="category" <?php echo $ur6 == "category" ? ' selected="selected"' : ''; ?>>Kategori Kode Limbah</option>
						<option value="code" <?php echo $ur6 == "code" ? ' selected="selected"' : ''; ?>>Kode Limbah</option>
						<option value="description" <?php echo $ur6 == "description" ? ' selected="selected"' : ''; ?>>Deskripsi</option>
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
					<th><a href="<?php echo $link_category; ?>">Kategori Kode Limbah <i class="<?php echo $arrow_category; ?>"></i></a></th>
					<th><a href="<?php echo $link_code; ?>">Kode Limbah <i class="<?php echo $arrow_code; ?>"></i></a></th>
					<th><a href="<?php echo $link_description; ?>">Deskripsi <i class="<?php echo $arrow_description; ?>"></i></a></th>
					<th><a href="<?php echo $link_status; ?>">Status <i class="<?php echo $arrow_status; ?>"></i></a></th>
					<th colspan="2" width="7%" class="text-center">Aksi</th>
				</tr>
				<?php
				if (isset($limbah) && count($limbah) > 0) :
					$x = (($ur3 - 1) * 15) + 1;
					foreach ($limbah as $limbahs) :
				?>
						<tr>
							<td><?php echo $x; ?></td>
							<td><?php echo $limbahs->ue_limbah_category_name; ?></td>
							<td><?php echo $limbahs->ue_limbah_code; ?></td>
							<td><?php echo $limbahs->ue_limbah_description; ?></td>
							<td><?php echo $limbahs->ue_limbah_status == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
							<td align="center">
								<a href="<?php echo base_url(); ?>admin/limbah/detail/<?php echo $limbahs->ue_limbah_id; ?>" class="action-link"><i class="fa fa-pencil" aria-hidden="true"></i></a>
							</td>
							<td align="center">
								<a href="<?php echo base_url(); ?>admin/limbah/delete/<?php echo $limbahs->ue_limbah_id; ?>" onclick="dialconfirm('<?php echo $limbahs->ue_limbah_id; ?>');return false;" id="del-button<?php echo $limbahs->ue_limbah_id; ?>" class="action-link"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</td>
						</tr>
					<?php
						$x++;
					endforeach;
				else :
					?>
					<tr>
						<td colspan="7" align="center">Kode limbah tidak dapat ditemukan</td>
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