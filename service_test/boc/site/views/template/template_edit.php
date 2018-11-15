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

<!-- 内容 -->
<div class="pd-20">
  <?php echo form_open('template/edit', array('class'=>'form form-horizontal','id'=>'form-member-add'));?>
  	<!-- row -->
	<div class="row cl">
		<input type="hidden" name='id' value='<?php if(!empty($template['id'])){echo $template['id'];}?>'>
      <label class="form-label col-3"><span class="c-red">*</span>标题：</label>
      <div class="formControls col-5">
        <input type="text" class="input-text" value="<?php if(!empty($template['title'])){echo $template['title'];} else{ echo set_value('title'); }?>" placeholder="" id="title" name="title" datatype="*" nullmsg="模板标题不能为空">
      </div>
      <div class="col-4"> </div>
    </div>
    <!-- row -->
    <div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>模板id：</label>
      <div class="formControls col-5">
        <input type="text" class="input-text" value="<?php if(!empty($template['template_id'])){echo $template['template_id'];} else{ echo set_value('template_id'); }?>" placeholder="" id="template_id" name="template_id" datatype="*" nullmsg="模板id不能为空">
      </div>
      <div class="col-4"> </div>
    </div>
    
	<!-- row -->
	<div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>行业：</label>
      <div class="formControls col-5">
        <input type="text" class="input-text" value="<?php if(!empty($template['industry'])){echo $template['industry'];} else{ echo set_value('industry'); }?>" placeholder="" id="industry" name="industry" datatype="*" nullmsg="行业领域不能为空">
      </div>
      <div class="col-4"> </div>
    </div>
	<!-- row -->
	<div class="row cl">
      <label class="form-label col-3"><span class="c-red">*</span>模板字段：</label>
      <div class="formControls col-5">
      <textarea name="content" cols="" rows="" class="textarea"  placeholder="请输入模板中固定字段名，使用'##'隔开" datatype="*" nullmsg="模板字段不能为空"><?php if(!empty($template['content'])){echo $template['content'];} else{ echo set_value('content'); }?></textarea>
      </div>
      <div class="col-4"> </div>
    </div>
    <!-- row -->
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
	echo static_file('lib/Validform/5.3.2/Validform.min.js');
?>

<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	// $("#form-member-add").Validform({
	// 	tiptype:2,
	// 	callback:function(form){
	// 		form[0].submit();
	// 		var index = parent.layer.getFrameIndex(window.name);
	// 		parent.$('.btn-refresh').click();
	// 		parent.layer.close(index);
	// 	}
	// });

	$("#form-member-add").Validform({
		tiptype:2,
		callback:function(form){
			// alert(form);
		}
	});
});
</script>
</body>
</html>