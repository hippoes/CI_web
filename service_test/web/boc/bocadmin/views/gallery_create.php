<?php
$cid=$this->cid;
$need_photo=array(6,42,51,69,82,88);
$need_link=array(6);
$photo_no_size=array();

$photo_px=array(
    6 => '480x340',
    42 => '180x180',
    51 => '350x270',
    69 => '350x270',
    82 => '80x70',
    88 => '108x108',
);


?>
<div class="btn-group">
	<a href="<?php echo site_urlc($this->class.'/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> <?php echo lang('back_list') ?></a>
</div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">

	<h3> <?php echo lang('create') ?> <span class="badge badge-success pull-right"><?php echo $title; ?></span></h3>
	<?php echo form_open(current_urlc(),array("class"=>"form-horizontal","id"=>"frm-create")); ?>

	<div class="boxed-inner seamless">
		<div class="control-group">
			<label class="control-label" for="title"><?php echo lang('title') ?></label>
			<div class="controls">
				<input type="text" id="title" name="title" class='span7' value="<?php echo set_value('title') ?>">
<!--				<a href="#seo-modal" role="button" class="btn btn-info" data-toggle="modal">SEO</a>-->
				<span class="help-inline"></span>
			</div>
		</div>

		<?php if(in_array($cid, $need_link)): ?>
	        <div class="control-group">
	            <label class="control-label" for="link"> 链接</label>
	            <div class="controls">
	                <input type="text" placeholder="类似 http://... 或 https://..." class='span7' name="link" value="<?php echo set_value('link') ?>" id="link">
	            </div>
	        </div>
		<?php endif; ?>

		<!-- 弹出 -->
		<div id="seo-modal" class="modal hide fade">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <i class="fa fa-times"></i> </button>
				<h3> <i class="fa fa-info-circle"></i> <?php echo lang('seo') ?> </h3>
			</div>
			<div class="modal-body seamless">

				<div class="control-group">
					<label for="title_seo" class="control-label"><?php echo lang('title_seo') ?></label>
					<div class="controls">
						<input type="text" id="title_seo" name="title_seo" value="<?php echo set_value('title_seo') ?>" x-webkit-speech>
						<span class="help-inline"></span>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="tag"><?php echo lang('tag') ?></label>
					<div class="controls">
						<input type="text" id="tags" name="tags"  placeholder="tag1,tag2" value="<?php echo set_value('tags') ?>">
						<span class="help-inline">使用英文标点`,`隔开</span>
					</div>
				</div>

				<div class="control-group">
					<label for="intro"  class="control-label"><?php echo lang('intro') ?></label>
					<div class="controls">
						<textarea name="intro" rows='8' class='span4'><?php echo set_value('intro') ?></textarea>
						<span class="help-inline"></span>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<a href="#"  data-dismiss="modal" aria-hidden="true" class="btn"><?php echo lang('close') ?></a>
			</div>
		</div>

        <?php if (in_array($cid,$need_photo)): ?>
		<!-- 图片上传 -->
		<div class="control-group">
			<label for="img" class="control-label"><?php echo lang('photo') ?></label>
			<div class="controls">
				<div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>[<?php echo $photo_px[$cid] ?>]
						<input class="fileupload" type="file" data-smallsize="100x80" data-size="<?php echo $photo_px[$cid] ?>" accept="" data-for="photo" data-size="">
					</span>
					<input type="hidden" name="photo" class="form-upload" data-more="0" value="<?php echo set_value('photo') ?>">
					<input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo set_value('thumb') ?>">
				</div>
			</div>
		</div>

		<div id="js-photo-show" class="js-img-list-f">
			<!-- 模板 #tpl-img-list -->
		</div>
		<div class="clear"></div>
        <?php endif; ?>

        <?php if (in_array($cid,$photo_no_size)): ?>
            <!-- 图片上传 -->
            <div class="control-group">
                <label for="img" class="control-label"> 图片 </label>
                <div class="controls">
                    <div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>[<?php echo $photo_px[$cid] ?>]
						<input class="fileupload" type="file" accept="" data-for="photo">
					</span>
                        <input type="hidden" id="photo" name="photo" class="form-upload" data-more='0' value="<?php echo set_value('photo') ?>">
                        <input type="hidden" id="thumb" name="thumb" class="form-upload-thumb" value="<?php echo set_value('thumb') ?>">
                    </div>
                </div>
            </div>

            <div id="js-photo-show" class="js-img-list-f">
                <!-- 模板 #tpl-img-list -->
            </div>
            <div class="clear"></div>
        <?php endif; ?>

	</div>
	<!-- end less -->

	<div class="boxed-footer">
		<?php if ($this->ccid): ?>
			<input type="hidden" name="ccid" value="<?php echo $this->ccid ?>">
		<?php endif ?>
		<input type="hidden" name="cid" value="<?php echo $this->cid ?>">
		<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
		<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
	</div>

</form>
</div>

<?php include_once 'inc_ui_media.php'; ?>
<script type="text/javascript">
	require(['tools','adminer/js/media','jquery'],function(tools,media,$){
	// 表单规则
	var rules = {
		title: {
			required:true,
			minlength:1
		}
	};
	var message = {
		title: {
			required: "请输入标题！",
			minlength: jQuery.format("输入字符数不的小于 {0} ！"),
		}
	};
	// 验证
	tools.make_validate('frm-create',rules,message);

	media.init();
	var gallery_photos = <?php echo json_encode(one_upload(set_value('photo'))) ?>;
	media.show(gallery_photos,"photo");
//	media.sort('photo');

});
</script>
