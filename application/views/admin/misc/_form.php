<?php
$ur2 = $this->uri->segment(3);
$ur3 = $this->uri->segment(4);
$ur4 = $this->uri->segment(5);

$action = base_url() . "admin/misc";
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
          <?php
          if (isset($misc) && count($misc) > 0) :
            $x = 0;
            foreach ($misc as $miscs) :
          ?>
              <input type="hidden" name="id[<?php echo $x; ?>]" id="id-<?php echo $x; ?>" value="<?php echo $miscs->ue_misc_id; ?>" />
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    if ($miscs->ue_misc_name == "Whatsapp") :
                    ?>
                      <label for="value[<?php echo $x; ?>]"><?php echo $miscs->ue_misc_name; ?> <span class="mandatory"><small>(628xxxxxxxxxx)</small></span></label>
                      <input type="text" autocomplete="off" class="form-control phone" name="value[<?php echo $x; ?>]" id="value-<?php echo $x; ?>" value="<?php echo $miscs->ue_misc_value; ?>" maxlength="255" />
                    <?php
                    elseif ($miscs->ue_misc_name == "Jadwal Buka") :
                    ?>
                      <label for="value[<?php echo $x; ?>]"><?php echo $miscs->ue_misc_name; ?></label>
                      <textarea class="form-control" rows="5" name="value[<?php echo $x; ?>]" id="value-<?php echo $x; ?>"><?php echo str_replace("<br />", "", $miscs->ue_misc_value); ?></textarea>
                    <?php
                    else :
                    ?>
                      <label for="value[<?php echo $x; ?>]"><?php echo $miscs->ue_misc_name; ?></label>
                      <input type="text" autocomplete="off" class="form-control" name="value[<?php echo $x; ?>]" id="value-<?php echo $x; ?>" value="<?php echo $miscs->ue_misc_value; ?>" maxlength="255" />
                    <?php
                    endif;
                    ?>
                  </div>
                  <?php
                  $errorname[$x] = form_error('name[' . $x . ']');

                  if (!empty($errorname[$x])) {
                  ?>
                    <div class="alert alert-danger alert-danger-form">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <p><?php echo $errorname[$x]; ?></p>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            <?php
              $x++;
            endforeach;
            ?>
            <div class="box-tools">
              <button type="submit" name="submit" value="submit" class="btn btn-primary blue-bg main-button">SIMPAN</button>
            </div>
          <?php
          endif;
          ?>
        </form>
      </div>
    </div>
  </div>
</div>