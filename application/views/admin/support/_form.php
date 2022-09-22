<?php
$ur2 = $this->uri->segment(3);
$ur3 = $this->uri->segment(4);

$id = set_value('id');
$name = set_value('name');
$description = set_value('description');
$image = set_value('main_img');
$status = set_value('status');

if (isset($support) && count($support) > 0) {
  $id = $support[0]->ue_support_id;
  $name = $support[0]->ue_support_name;
  $image = $support[0]->ue_support_icon;
  $description = $support[0]->ue_support_description;
  $status = $support[0]->ue_support_status;
}

if ($ur2 == "add" && empty($status)) {
  $status = 1;
}

$action = base_url() . "admin/support/add";
if ($ur2 == "detail") {
  $action = base_url() . "admin/support/detail/" . $ur3;
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
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Nama <span class="mandatory">* <small>(Cara tulis: 10m&lt;sup&gt;3&lt;/sup&gt; = 10m<sup>3</sup>)</small></span></label>
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
          if (!empty($image) && file_exists("./uploads/support/" . $image)) :
          ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="image">Gambar Saat Ini</label><br />
                  <img src="<?php echo base_url(); ?>uploads/support/<?php echo $image; ?>" alt="" width="350" />
                </div>
              </div>
            </div>
          <?php
          endif;
          ?>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="image">Gambar <?php echo $ur2 == "add" ? '<span class="mandatory">* <small>(Max. Size: 500KB)</small></span>' : '<span class="mandatory"><small>(Max. Size: 500KB)</small></span>'; ?></label>
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
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description" id="description" rows="8"><?php echo $description; ?></textarea>
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
              $currentpage = base_url() . "admin/support";
            }
            ?>
            <a href="<?php echo $currentpage; ?>"><button type="button" class="btn btn-danger main-danger-button">BATAL</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>