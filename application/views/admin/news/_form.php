<?php
$ur2 = $this->uri->segment(3);
$ur3 = $this->uri->segment(4);

$id = set_value('id');
$title = set_value('title');
$date = set_value('date');
$url = set_value('url');
//$author = set_value('author');
$image = set_value('main_img');
/*$background = set_value('main_bg');
$excerpt = set_value('excerpt');
$description = set_value('description');*/
$status = set_value('status');

if (isset($news) && count($news) > 0) {
  $id = $news[0]->ue_blog_id;
  $title = $news[0]->ue_blog_title;
  $date = date("d-m-Y", strtotime($news[0]->ue_blog_date));
  $url = $news[0]->ue_blog_slug;
  //$author = $news[0]->ue_blog_author;
  $image = $news[0]->ue_blog_image;
  /*$background = $news[0]->ue_blog_bg;
  $excerpt = $news[0]->ue_blog_excerpt;
  $description = $news[0]->ue_blog_description;*/
  $status = $news[0]->ue_blog_status;
}

if ($ur2 == "add" && empty($status)) {
  $status = 1;
}

$action = base_url() . "admin/news/add";
if ($ur2 == "detail") {
  $action = base_url() . "admin/news/detail/" . $ur3;
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
          <!--<input type="hidden" name="main_bg" id="main_bg" value="<?php //echo $background; 
                                                                      ?>" />-->
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
                <label for="date">Tanggal <span class="mandatory">*</span></label>
                <input type="text" autocomplete="off" class="form-control date" name="date" id="date" value="<?php echo $date; ?>" maxlength="10" readonly />
              </div>
              <?php
              $errordate = form_error('date');

              if (!empty($errordate)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errordate; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="url">URL <span class="mandatory">*</span></label>
                <input type="text" autocomplete="off" class="form-control" name="url" id="url" value="<?php echo $url; ?>" />
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
          <?php
          /*
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="author">Penulis <span class="mandatory">*</span></label>
                <input type="text" autocomplete="off" class="form-control" name="author" id="author" value="<?php echo $author; ?>" maxlength="255" />
              </div>
              <?php
              $errorauthor = form_error('author');

              if (!empty($errorauthor)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errorauthor; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <?php
          */
          if ($ur2 == "detail" && !empty($image) && file_exists("./uploads/blog/" . $image)) {
          ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="image">Foto</label><br />
                  <img src="<?php echo base_url(); ?>uploads/blog/<?php echo $image; ?>" alt="<?php echo $image; ?>" width="150" />
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
          /*
          if ($ur2 == "detail" && !empty($background) && file_exists("./uploads/blog/" . $background)) {
          ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="image">Gambar Latar</label><br />
                  <img src="<?php echo base_url(); ?>uploads/blog/<?php echo $background; ?>" alt="<?php echo $background; ?>" width="150" />
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
          */
          ?>
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
              $currentpage = base_url() . "admin/news";
            }
            ?>
            <a href="<?php echo $currentpage; ?>"><button type="button" class="btn btn-danger main-danger-button">BATAL</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>