<?php
$ur2 = $this->uri->segment(3);
$ur3 = $this->uri->segment(4);

$id = set_value('id');
$category = set_value('category');
$code = set_value('code');
$description = set_value('description');
$status = set_value('status');

if (isset($limbah) && count($limbah) > 0) {
  $id = $limbah[0]->ue_limbah_id;
  $category = $limbah[0]->ue_limbah_category_id;
  $code = $limbah[0]->ue_limbah_code;
  $description = $limbah[0]->ue_limbah_description;
  $status = $limbah[0]->ue_limbah_status;
}

if ($ur2 == "add" && empty($status)) {
  $status = 1;
}

$action = base_url() . "admin/limbah/add";
if ($ur2 == "detail") {
  $action = base_url() . "admin/limbah/detail/" . $ur3;
}
?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-default form-body">
      <!--<div class="box-header form-header">
        <h3 class="box-title"><?php //echo $ur2 == "add" ? 'Tambah Baru' : 'Ubah Data'; 
                              ?></h3>
      </div>-->
      <div class="box-body">
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
        <form method="post" autocomplete="off" action="<?php echo $action; ?>">
          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="category">Kategori Kode Limbah <span class="mandatory">*</span></label>
                <select name="category" id="category" class="form-control select-with-select2">
                  <option value="">&nbsp;</option>
                  <?php
                  if (isset($limbahcategory_list) && $limbahcategory_list != null && count($limbahcategory_list) > 0) :
                    foreach ($limbahcategory_list as $limbahcategory_lists) :
                  ?>
                      <option value="<?php echo $limbahcategory_lists->ue_limbah_category_id; ?>" <?php echo $limbahcategory_lists->ue_limbah_category_id == $category ? 'selected' : ''; ?>><?php echo $limbahcategory_lists->ue_limbah_category_name; ?></option>
                  <?php
                    endforeach;
                  endif;
                  ?>
                </select>
              </div>
              <?php
              $errorcategory = form_error('category');

              if (!empty($errorcategory)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errorcategory; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="code">Kode Limbah <span class="mandatory">*</span></label>
                <input type="text" autocomplete="off" class="form-control" name="code" id="code" value="<?php echo $code; ?>" maxlength="255" autofocus />
              </div>
              <?php
              $errorcode = form_error('code');

              if (!empty($errorcode)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errorcode; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="description">Deskripsi <span class="mandatory">*</span></label>
                <input type="text" autocomplete="off" class="form-control" name="description" id="description" value="<?php echo $description; ?>" />
              </div>
              <?php
              $errordescription = form_error('description');

              if (!empty($errordescription)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errordescription; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="status">Status <span class="mandatory">*</span></label>
                <select name="status" id="status" class="form-control">
                  <option value="0" <?php echo $status == 0 ? 'selected' : ''; ?>>Tidak Aktif</option>
                  <option value="1" <?php echo $status == 1 ? 'selected' : ''; ?>>Aktif</option>
                </select>
              </div>
              <?php
              $errorstatus = form_error('status');

              if (!empty($errorstatus)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errorstatus; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="box-tools">
            <button type="submit" name="submit" value="submit" class="btn btn-primary blue-bg main-button">SIMPAN</button>
            <?php
            if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) {
              $currentpage = $this->session->userdata["currentpage"];
            } else {
              $currentpage = base_url() . "admin/limbah";
            }
            ?>
            <a href="<?php echo $currentpage; ?>"><button type="button" class="btn btn-danger main-danger-button">BATAL</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>