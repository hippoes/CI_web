<!DOCTYPE html>
<html>
<head>
	<!-- 头部 -->
	<?php include_once VIEWS.'inc/head.php'; ?>
	<?php
		echo static_file("css/H-ui.login.css");
	?>
</head>
<body>

<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
  <!-- 表单验证失败返回错误信息 -->
  <!-- <?php echo validation_errors(); ?> -->
  <!-- 登录表单 -->
    <?php echo form_open('login/check_login', 'class="form form-horizontal"');?>
      <div class="row cl">
        <label class="form-label col-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-8">
          <?php echo form_error('username'); ?>
          <input id="" name="username" type="text" placeholder="账户" class="input-text size-L"  value="<?php echo set_value('username'); ?>">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-8">
          <?php echo form_error('password'); ?>
          <input id="" name="password" type="password" placeholder="密码" class="input-text size-L"  value="<?php echo set_value('password'); ?>">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-8 col-offset-3">
          <?php echo form_error('code'); ?>
          <input name="code" class="input-text size-L" type="text" placeholder="验证码" style="width:150px;"  value="<?php echo set_value('code'); ?>">
          <img title="点击刷新" src="<?php echo site_url('login/get_gd_code')?>" align="absbottom" onclick='this.src="<?php echo site_url('login/get_gd_code')?>?"+Math.random();'>
      </div>
      <div class="row">
        <div class="formControls col-8 col-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="">
            使我保持登录状态</label>
        </div>
      </div>
      <div class="row">
        <div class="formControls col-8 col-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  <!-- end 登录表单 -->
  </div>
</div>
<div class="footer">Copyright 你的公司名称 by H-ui.admin.v2.3</div>

<!-- 底部js -->
<?php include_once VIEWS.'inc/footer_js.php'; ?>
</body>
</html>