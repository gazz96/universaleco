<?php
$ur2 = $this->uri->segment(3);
$ur3 = $this->uri->segment(4);
$ur4 = $this->uri->segment(5);

$id = set_value('id');
$type = set_value('type');
$title = set_value('title');
$subtitle = set_value('subtitle');
$description = set_value('description');
$status = set_value('status');

if (isset($content) && count($content) > 0) {
  $id = $content[0]->ue_content_id;
  $type = $content[0]->ue_content_type;
  $title = $content[0]->ue_content_title;
  $subtitle = $content[0]->ue_content_sub_title;
  $description = $content[0]->ue_content_description;
  $status = $content[0]->ue_content_status;
}

if ($ur2 == "add" && empty($status)) {
  $status = 1;
}

$action = base_url() . "admin/content/add";
if ($ur2 == "detail") {
  $action = base_url() . "admin/content/detail/" . $ur3;
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
                <label for="type">Tipe <span class="mandatory">*</span></label>
                <select name="type" id="type" class="form-control">
                  <option value="tentang" <?php echo $type == "tentang" ? 'selected' : ''; ?>>Tentang</option>
                  <option value="kontak" <?php echo $type == "kontak" ? 'selected' : ''; ?>>Hubungi Kami</option>
                  <option value="penawaran" <?php echo $type == "penawaran" ? 'selected' : ''; ?>>Info Penawaran</option>
                </select>
              </div>
              <?php
              $errortype = form_error('type');

              if (!empty($errortype)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errortype; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="title">Judul <span class="mandatory">*</span></label>
                <input type="text" autocomplete="off" class="form-control" name="title" id="title" value="<?php echo $title; ?>" maxlength="255" autofocus />
              </div>
              <?php
              $errortitle = form_error('title');

              if (!empty($errortitle)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errortitle; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="subtitle">Sub Judul</label>
                <input type="text" autocomplete="off" class="form-control" name="subtitle" id="subtitle" value="<?php echo $subtitle; ?>" maxlength="255" />
              </div>
              <?php
              $errorsubtitle = form_error('subtitle');

              if (!empty($errorsubtitle)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errorsubtitle; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="description">Deskripsi <span class="mandatory">*</span></label>
                <textarea class="form-control textarea-tinymce" name="description" id="description" rows="8"><?php echo $description; ?></textarea>
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
              $currentpage = base_url() . "admin/content/index/" . $ur3;
            }
            ?>
            <a href="<?php echo $currentpage; ?>"><button type="button" class="btn btn-danger main-danger-button">BATAL</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>