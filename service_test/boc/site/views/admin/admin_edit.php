<!DOCTYPE html>
<html>
<head>
	<!-- 头部 -->
	<?php include_once VIEWS.'inc/head.php'; ?>
	<?php 
		echo static_file("lib/icheck/icheck.css");
		echo static_file("js/sha1.js");
	?>
</head>
<body>

<!-- 内容 -->
<div class="pd-20">
    <?php echo form_open('admin/admin_edit', array('class'=>'form form-horizontal','id'=>'form-admin-add'));?>
		<!-- 添加管理员 -->
		<div class="row cl">
			<?php if(!empty($admin_info['id'])){echo '<input type="hidden" name="id" value="'.$admin_info['id'].'">';}?>
			<label class="form-label col-3"><span class="c-red">*</span>管理员：</label>
			<div class="formControls col-5">
				<input type="text" class="input-text" placeholder="" id="user-name" name="username" value="<?php if(!empty($admin_info['username'])){echo $admin_info['username'];}?>" datatype="*2-16" nullmsg="用户名不能为空">
			</div>
			<div class="col-4">
				<?php echo form_error('username'); ?>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-3"><span class="c-red">*</span>初始密码：</label>
			<div class="formControls col-5">
				<input type="password" name="password" placeholder="密码" autocomplete="off" value="" class="input-text" dragonfly='true'>
			</div>
			<div class="col-4"> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-3"><span class="c-red">*</span>确认密码：</label>
			<div class="formControls col-5">
				<input type="password" name="repassword" placeholder="确认新密码" autocomplete="off" class="input-text" recheck="password" dragonfly='true' >
			</div>
			<div class="col-4"> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-3"><span class="c-red">*</span>性别：</label>
			<div class="formControls col-5 skin-minimal">
				<div class="radio-box">
					<input type="radio" id="sex-1" name="sex" value='1' datatype="*" nullmsg="请选择性别！" <?php if($admin_info['sex']==1){echo 'checked';}?>>
					<label for="sex-1">男</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="sex" value='2' <?php if($admin_info['sex']==2){echo 'checked';}?>>
					<label for="sex-2">女</label>
				</div>
			</div>
			<div class="col-4"> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-3"><span class="c-red">*</span>手机：</label>
			<div class="formControls col-5">
				<input type="text" class="input-text" name="phone" value="<?php if(!empty($admin_info['phone'])){echo $admin_info['phone']; }?>" placeholder="" id="user-tel" name="user-tel"  datatype="m" nullmsg="手机不能为空">
			</div>
			<div class="col-4"> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-3"><span class="c-red">*</span>邮箱：</label>
			<div class="formControls col-5">
				<input type="text" class="input-text" placeholder="@" name="email" value="<?php if(!empty($admin_info['email'])){echo $admin_info['email']; }?>" id="email" datatype="e" nullmsg="请输入邮箱！">
			</div>
			<div class="col-4"> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-3">角色：</label>
			<div class="formControls col-5"> <span class="select-box" style="width:150px;">
				<select class="select" name="group_id" size="1">
					<option value="1" <?php if($admin_info['group_id']==1){echo 'selected';}?> >超级管理员</option>
					<option value="2" <?php if($admin_info['group_id']==2){echo 'selected';}?> >管理员</option>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-3">备注：</label>
			<div class="formControls col-5">
				<textarea name="remark" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="textarealength(this,100)"><?php if(!empty($admin_info['remark'])){echo $admin_info['remark']; }?></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
			<div class="col-4"> </div>
		</div>
		<div class="row cl">
			<div class="col-9 col-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>
<!-- end 内容 -->

<!-- 底部js -->
<?php include_once VIEWS.'inc/footer_js.php'; ?>
<?php
	echo static_file('lib/icheck/jquery.icheck.min.js');
?>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").Validform({
		tiptype:2,
		beforeSubmit:function(curform){
			var pwd= $("#form-admin-add").find("input[name='password']");
			if(pwd.val() !== ''){
				if(pwd.val().length<6){
					pwd.addClass('Validform_error');
					pwd.parent().next().empty().append('<span class="Validform_checktip Validform_wrong">请填写6到20位任意字符！</span>');
					return false;
				}	
			}

			var repwd= $("#form-admin-add").find("input[name='repassword']");
			if(repwd.val() !== ''){
				if(repwd.val().length<6){
					repwd.addClass('Validform_error');
					repwd.parent().next().empty().append('<span class="Validform_checktip Validform_wrong">请填写6到20位任意字符！</span>');
					return false;
				}else if(pwd.val() !== '' && pwd.val() !== repwd.val()){
					repwd.addClass('Validform_error');
					repwd.parent().next().empty().append('<span class="Validform_checktip Validform_wrong">两次输入的内容不一致！</span>');
					return false;
				}else{
					var sha_pwd = hex_sha1(pwd.val());
					pwd.val(sha_pwd);
					
					var sha_repwd = hex_sha1(repwd.val());
					repwd.val(sha_repwd);
				}
				
			}else if(repwd.val() == '' && pwd.val()!==''){
				repwd.addClass('Validform_error');
				repwd.parent().next().empty().append('<span class="Validform_checktip Validform_wrong">请再输入一次新密码！</span>');
				return false;
			}
		},
		callback:function(form){
			// alert(form);
		}
	});

});
</script>
</body>
</html>