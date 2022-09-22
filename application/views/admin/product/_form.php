<?php
$ur2 = $this->uri->segment(3);
$ur3 = $this->uri->segment(4);

$id = set_value('id');
$name = set_value('name');
$image = set_value('main_img');
$background = set_value('main_bg');
$excerpt = set_value('excerpt');
$description = set_value('description');
$status = set_value('status');

if (isset($product) && count($product) > 0) {
  $id = $product[0]->ue_product_id;
  $name = $product[0]->ue_product_name;
  $image = $product[0]->ue_product_image;
  $background = $product[0]->ue_product_bg;
  $excerpt = $product[0]->ue_product_excerpt;
  $description = $product[0]->ue_product_description;
  $status = $product[0]->ue_product_status;
}

if ($ur2 == "add" && empty($status)) {
  $status = 1;
}

$action = base_url() . "admin/product/add";
if ($ur2 == "detail") {
  $action = base_url() . "admin/product/detail/" . $ur3;
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
          <input type="hidden" name="main_bg" id="main_bg" value="<?php echo $background; ?>" />
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
          if ($ur2 == "detail" && !empty($image) && file_exists("./uploads/product/" . $image)) {
          ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="image">Foto</label><br />
                  <img src="<?php echo base_url(); ?>uploads/product/<?php echo $image; ?>" alt="<?php echo $image; ?>" width="150" />
                </div>
              </div>
            </div>
          <?php
          }
          ?>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="image">Foto <?php echo $ur2 == "add" ? '<span class="mandatory">* <small>(Max. Size: 500KB)</small></span>' : '<span class="mandatory"><small>(Max. Size: 500KB)</small></span>'; ?></label>
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
          if ($ur2 == "detail" && !empty($background) && file_exists("./uploads/product/" . $background)) {
          ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="image">Gambar Latar</label><br />
                  <img src="<?php echo base_url(); ?>uploads/product/<?php echo $background; ?>" alt="<?php echo $background; ?>" width="150" />
                </div>
              </div>
            </div>
          <?php
          }
          ?>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="background">Gambar Latar <?php echo $ur2 == "add" ? '<span class="mandatory">* <small>(Max. Size: 500KB)</small></span>' : '<span class="mandatory"><small>(Max. Size: 500KB)</small></span>'; ?></label>
                <input type="file" class="form-control" name="background" id="background" />
              </div>
              <?php
              $errorbackground = form_error('background');

              if (!empty($errorbackground)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errorbackground; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="excerpt">Ringkasan <span class="mandatory">*</span></label>
                <textarea class="textarea-tinymce" name="excerpt" id="excerpt"><?php echo $excerpt; ?></textarea>
              </div>
              <?php
              $errorexcerpt = form_error('excerpt');

              if (!empty($errorexcerpt)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errorexcerpt; ?></p>
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
                <textarea class="textarea-tinymce" name="description" id="description"><?php echo $description; ?></textarea>
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
              $currentpage = base_url() . "admin/product";
            }
            ?>
            <a href="<?php echo $currentpage; ?>"><button type="button" class="btn btn-danger main-danger-button">BATAL</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>