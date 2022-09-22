<div class="col-md-6 left-bg">
  <div class="logo-top-left">
    <img src="<?php echo base_url(); ?>assets/images/logo-sm-white.png" alt="">
  </div>
  <div>
    <h1>Hello</h1>
    <p class="text-white">Mari bantu kami untuk menjaga lingkungan</p>
  </div>
</div>
<div class="col-md-6 flex-display" style="min-height: 100%;">
  <div class="login-box">
    <div class="mobile-logo">
      <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" /></a>
    </div>
    <h4>Login</h4>
    <div class="login-box-body">
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

      <form action="<?php echo base_url(); ?>admin/login" method="post">
        <div class="form-group has-feedback">
          <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>">
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
        <div class="form-group has-feedback">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" maxlength="50" value="<?php echo set_value('password'); ?>">
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
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-12 center-button">
            <button type="submit" name="submit" value="submit" class="btn btn-primary main-button">SIGN IN</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
</div>