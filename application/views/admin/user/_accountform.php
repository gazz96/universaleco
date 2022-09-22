<?php
$ur2 = $this->uri->segment(3);
$ur3 = $this->uri->segment(4);

$id = set_value('id');
$name = set_value('name');
$address = set_value('address');
$phone = set_value('phone');
$email = set_value('email');

if (isset($user) && count($user) > 0) {
  $id = $user[0]->ue_user_id;
  $name = $user[0]->ue_user_name;
  $address = $user[0]->ue_user_address;
  $phone = $user[0]->ue_user_phone;
  $email = $user[0]->ue_user_email;
}

if ($ur2 == "add" && empty($status)) {
  $status = 1;
}

$action = base_url() . "admin/account";
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
                <label for="address">Alamat</label>
                <textarea class="form-control" rows="8" name="address" id="address"><?php echo $address; ?></textarea>
              </div>
              <?php
              $erroraddress = form_error('address');

              if (!empty($erroraddress)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $erroraddress; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">No. Telepon <span class="mandatory"><small>(Format: 62xxxxxxxxxxxx)</small></span></label>
                <input type="text" class="form-control" autocomplete="off" name="phone" id="phone" value="<?php echo $phone; ?>" maxlength="50" />
              </div>
              <?php
              $errorphone = form_error('phone');

              if (!empty($errorphone)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errorphone; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email <span class="mandatory">*</span></label>
                <input type="text" class="form-control" autocomplete="off" name="email" id="email" value="<?php echo $email; ?>" maxlength="255" />
              </div>
              <?php
              $erroremail = form_error('email');

              if (!empty($erroremail)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $erroremail; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" autocomplete="off" name="password" id="password" maxlength="50" />
              </div>
              <?php
              $errorpassword = form_error('password');

              if (!empty($errorpassword)) {
              ?>
                <div class="alert alert-danger alert-danger-form">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><?php echo $errorpassword; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="box-tools">
            <button type="submit" name="submit" value="submit" class="btn btn-primary blue-bg main-button">SIMPAN</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>