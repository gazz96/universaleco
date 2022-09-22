<?php
$ur2 = $this->uri->segment(3);
$ur3 = $this->uri->segment(4);

$id = set_value('id');
$name = set_value('name');
$image = set_value('main_img');
$url = set_value('main_url');
$status = set_value('status');

if (isset($infografis) && count($infografis) > 0) {
  $id = $infografis[0]->ue_infografis_id;
  $name = $infografis[0]->ue_infografis_name;
  $image = $infografis[0]->ue_infografis_image;
  $url = $infografis[0]->ue_infografis_url;
  $status = $infografis[0]->ue_infografis_status;
}

if ($ur2 == "add" && empty($status)) {
  $status = 1;
}

$action = base_url() . "admin/infografis/add";
if ($ur2 == "detail") {
  $action = base_url() . "admin/infografis/detail/" . $ur3;
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
          <input type="hidden" name="main_img" id="main_img" value="<?php echo $image; ?>" />
          <input type="hidden" name="main_url" id="main_url" value="<?php echo $url; ?>" />
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
          <?php
          if ($ur2 == "detail" && file_exists("./uploads/infografis/" . $image)) :
          ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="url">Gambar Saat Ini:</label><br />
                  <img src="<?php echo base_url(); ?>uploads/infografis/<?php echo $image; ?>" alt="" width="150">
                </div>
              </div>
            </div>
          <?php
          endif;
          ?>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="image">File Gambar <span class="mandatory"><?php echo $ur2 == "add" ? "*" : ""; ?> <small>(Max Size: 1MB)</small></span></label>
                <input type="file" class="form-control" name="image" id="image" />
              </div>
              <?php
              $errorimage = form_error('image');

              if (!empty($errorimage)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errorimage; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <?php
          if ($ur2 == "detail" && file_exists("./uploads/infografis/" . $url)) :
          ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="url">File Saat Ini:</label><br />
                  <a href="<?php echo base_url(); ?>uploads/infografis/<?php echo $url; ?>" target="_blank"><?php echo $url; ?></a>
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
              $currentpage = base_url() . "admin/infografis";
            }
            ?>
            <a href="<?php echo $currentpage; ?>"><button type="button" class="btn btn-danger main-danger-button">BATAL</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>