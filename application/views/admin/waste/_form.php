<?php
$ur2 = $this->uri->segment(3);
$ur3 = $this->uri->segment(4);

$id = set_value('id');
$name = set_value('name');
$source = set_value('source');
$url = set_value('main_img');
$category = set_value('category');
$status = set_value('status');

if (isset($waste) && count($waste) > 0) {
  $id = $waste[0]->ue_waste_id;
  $name = $waste[0]->ue_waste_name;
  $source = $waste[0]->ue_waste_source;
  $url = $waste[0]->ue_waste_url;
  $category = $waste[0]->ue_waste_category_id;
  $status = $waste[0]->ue_waste_status;
}

if ($ur2 == "add" && empty($status)) {
  $status = 1;
}

$action = base_url() . "admin/waste/add";
if ($ur2 == "detail") {
  $action = base_url() . "admin/waste/detail/" . $ur3;
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
        <form method="post" autocomplete="off" action="<?php echo $action; ?>" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
          <input type="hidden" name="main_img" id="main_img" value="<?php echo $url; ?>" />
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="category">Kategori <span class="mandatory">*</span></label>
                <select name="category" id="category" class="form-control">
                  <option value="">&nbsp;</option>
                  <?php
                  if (isset($category_list) && count($category_list) > 0) :
                    foreach ($category_list as $categorylists) {
                  ?>
                      <option value="<?php echo $categorylists->ue_waste_category_id; ?>" <?php echo $category == $categorylists->ue_waste_category_id ? 'selected' : ''; ?>><?php echo $categorylists->ue_waste_category_name; ?></option>
                  <?php
                    }
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
                <label for="name">Nama <span class="mandatory">*</span></label>
                <input type="text" autocomplete="off" class="form-control" name="name" id="name" value="<?php echo $name; ?>" maxlength="255" autofocus />
              </div>
              <?php
              $errorname = form_error('name');

              if (!empty($errorname)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errorname; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="source">Sumber <span class="mandatory">*</span></label>
                <input type="text" autocomplete="off" class="form-control" name="source" id="source" value="<?php echo $source; ?>" maxlength="255" />
              </div>
              <?php
              $errorsource = form_error('source');

              if (!empty($errorsource)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errorsource; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <?php
          if ($ur2 == "detail" && file_exists("./uploads/waste/" . $url)) :
          ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="url">File Saat Ini:</label><br />
                  <a href="<?php echo base_url(); ?>uploads/waste/<?php echo $url; ?>" target="_blank"><?php echo $url; ?></a>
                </div>
              </div>
            </div>
          <?php
          endif;
          ?>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="url">File <span class="mandatory"><?php echo $ur2 == "add" ? "*" : ""; ?> <small>(Max Size: 1MB)</small></span></label>
                <input type="file" class="form-control" name="url" id="url" />
              </div>
              <?php
              $errorurl = form_error('url');

              if (!empty($errorurl)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errorurl; ?></p>
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
              $currentpage = base_url() . "admin/waste";
            }
            ?>
            <a href="<?php echo $currentpage; ?>"><button type="button" class="btn btn-danger main-danger-button">BATAL</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>