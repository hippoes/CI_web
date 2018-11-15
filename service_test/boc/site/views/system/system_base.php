<!DOCTYPE html>
<html>
<head>
	<!-- 头部 -->
	<?php include_once VIEWS.'inc/head.php'; ?>
	<?php
		echo static_file('lib/icheck/icheck.css');
	?>
</head>
<body>

<!-- 面包屑导航 -->
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 
	<a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<!-- 面包屑导航 -->

<!-- 内容 -->
<div class="pd-20">
	<!-- 表单验证失败返回错误信息 -->
  	<?php echo validation_errors(); ?>
	<!-- 系统设置表单 -->
    <?php echo form_open('system/base_save', 'class="form form-horizontal" id="form-article-add"');?>
		<!-- 系统设置提交表单 -->
		<div id="tab-system" class="HuiTab">
			<!-- 选型卡 -->
			<div class="tabBar cl">
				<span>基本设置</span><span>安全设置</span><span>邮件设置</span><span>其他设置</span>
			</div>
			<!-- 基本设置 -->
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-2"><span class="c-red">*</span>网站名称：</label>
					<div class="formControls col-10">
						<input type="text" name="web_name" id="website-title" placeholder="控制在25个字、50个字节以内" value="<?php echo $configs['web_name']; ?>" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2"><span class="c-red">*</span>关键词：</label>
					<div class="formControls col-10">
						<input type="text" name="web_keyword" id="website-Keywords" placeholder="5个左右,8汉字以内,用英文,隔开" value="<?php echo $configs['web_keyword']; ?>" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2"><span class="c-red">*</span>描述：</label>
					<div class="formControls col-10">
						<input type="text" name="web_description" id="website-description" placeholder="空制在80个汉字，160个字符以内" value="<?php echo $configs['web_description']; ?>" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2"><span class="c-red">*</span>css、js、images路径配置：</label>
					<div class="formControls col-10">
						<input type="text" id="website-static" placeholder="默认为空，为相对路径" value="" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2"><span class="c-red">*</span>上传目录配置：</label>
					<div class="formControls col-10">
						<input type="text" id="website-uploadfile" placeholder="默认为uploadfile" value="" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2"><span class="c-red">*</span>底部版权信息：</label>
					<div class="formControls col-10">
						<input type="text" name="web_copyright" id="website-copyright" placeholder="&copy; 2014 H-ui.net" value="<?php echo $configs['web_copyright']; ?>" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2">备案号：</label>
					<div class="formControls col-10">
						<input type="text" name="web_record" id="website-icp" placeholder="京ICP备00000000号" value="<?php echo $configs['web_record']; ?>" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2">统计代码：</label>
					<div class="formControls col-10">
						<textarea class="textarea" name="web_statistical"><?php echo $configs['web_statistical']; ?></textarea>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2">商务通代码：</label>
					<div class="formControls col-10">
						<textarea class="textarea" name="web_commun"><?php echo $configs['web_commun']; ?></textarea>
					</div>
				</div>
			</div>
			<!-- end 基本设置 -->
			
			<!-- 安全设置 -->
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-2">允许访问后台的IP列表：</label>
					<div class="formControls col-10">
						<textarea class="textarea"></textarea>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2">后台登录失败最大次数：</label>
					<div class="formControls col-10">
						<input type="text" id="" value="5" class="input-text">
					</div>
				</div>
			</div>
			<!-- end 安全设置 -->
			
			<!-- 邮件设置 -->
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-2">邮件发送模式：</label>
					<div class="formControls col-10">
						<input type="text" id="" value="" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2">SMTP服务器：</label>
					<div class="formControls col-10">
						<input type="text" id="" value="" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2">SMTP 端口：</label>
					<div class="formControls col-10">
						<input type="text" id="" value="25" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2">邮箱帐号：</label>
					<div class="formControls col-10">
						<input type="text" id="email-name" value="" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2">邮箱密码：</label>
					<div class="formControls col-10">
						<input type="password" id="email-password" value="" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2">收件邮箱地址：</label>
					<div class="formControls col-10">
						<input type="text" id="email-address" value="" class="input-text">
					</div>
				</div>
			</div>
			<!-- end 邮件设置 -->
			
			<!-- 其他设置 -->
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-2">微信appid:</label>
					<div class="formControls col-10">
						<input type="text" name="wx_appid" id="email-address" placeholder="wxb7db*****f02c9" value="<?php echo $configs['wx_appid']; ?>" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-2">微信appsecret:</label>
					<div class="formControls col-10">
						<input type="text" name="wx_appsecret" id="email-address" placeholder="12899b8164d********117e794c" value="<?php echo $configs['wx_appsecret']; ?>" class="input-text">
					</div>
				</div>
			</div>
			<!-- end 其他设置 -->
		</div>
		<!-- 表单提交按钮 -->
		<div class="row cl">
			<div class="col-10 col-offset-2">
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
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
	$.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","0");
});
</script>
</body>
</html>