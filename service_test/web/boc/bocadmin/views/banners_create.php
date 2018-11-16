<?php
// $cid=$this->cid;
// $need_link=array(11);
// $need_photo=array(11,12,13,14,15,16,64,65,66);

// $photo_px=array(
    // 11 => '1920x900',
    // 12 => '1920x372',
    // 13 => '1920x372',
    // 14 => '1920x372',
    // 15 => '1920x372',
    // 16 => '1920x372',
    // 64 => '750x347',
    // 65 => '1920x372',
    // 66 => '1400*645'
// );


$cid=$this->cid;
$need_link=array(2);
$need_photo=array(2,17,18,19,20,29,40,57,67);
$need_photo1=array(17,18,19,20,29,40,57,67);

$photo_px=array(
    2  => '1920x800',
    17 => '1920x456',
    18 => '1920x456',
    19 => '1920x456',
    20 => '1920x456',
    29 => '1920x456',
    40 => '1920x456',
    57 => '1920x456',
    67 => '1920x456',
);

$photo1_px=array(
	17 => '640x328',
	18 => '640x328',
	19 => '640x328',
	20 => '640x328',
	29 => '640x328',
	40 => '640x328',
	57 => '640x328',
	67 => '640x328',
);
?>
<div class="btn-group">
	<a href="<?php echo site_urlc('banners/index')?>" class='btn'> <i class="fa fa-arrow-left"></i> <?php echo lang('back_list')?></a>
</div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">
	<h3> <i class="fa fa-plus"></i> <span class="badge badge-success pull-right"><?php echo $title; ?></span> <?php echo lang('add') ?></h3>
	<?php echo form_open(current_urlc(),array("class"=>"form-horizontal","id"=>"frm-create")); ?>

	<div class="boxed-inner seamless">
		<div class="control-group">
			<label class="control-label" for="title"> <?php echo lang('title') ?> </label>
			<div class="controls">
				<input type="text" class='span7' id="title" name="title" value="<?php echo set_value("title") ?>">
<!--				<a href="#seo-modal" role="button" class="btn btn-info" data-toggle="modal">--><?php //echo lang('seo') ?><!--</a>-->
			</div>
		</div>

        <?php if (in_array($cid,$need_link)): ?>
		<div class="control-group">
			<label class="control-label" for="link"> 链接 </label>
			<div class="controls">
				<input type="text" placeholder="类似 http://... 或 https://..." class='span7' id="link" name="link" value="<?php echo set_value("link") ?>">
			</div>
		</div>
        <?php endif; ?>

		<div class="control-group">
			<label for="timeline" class="control-label">时间 </label>
			<div class="controls">
				<div class="input-append date timepicker">
					<input type="text" value="<?php echo date("Y-m-d H:i:s",set_value('timeline',now())); ?>" id="timeline" name="timeline" data-date-format="yyyy-mm-dd hh:ii:ss">
					<span class="add-on"><i class="icon-th"></i></span>
				</div>
			</div>
		</div>


		<!-- ctype -->
		<?php if ($ctype = list_coltypes($this->cid)) { ?>
		<div class="control-group">
			<label class="control-label" for="status"> 所属分类 </label>
			<div class="controls">
				<?php $ctypeid= isset($_GET['ctype']) ? $_GET['ctype'] : 0; ?>
				<?php
				echo ui_btn_select('ctype',set_value("ctype",$ctypeid),$ctype);
				?>
				<span class="help-inline"></span>
			</div>
		</div>
		<?php } ?>

		<!-- 弹出 -->
		<div id="seo-modal" class="modal hide fade">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h3> <i class="fa fa-info-circle"></i><?php echo lang('seo') ?> </h3>
			</div>
			<div class="modal-body seamless">

				<div class="control-group">
					<label for="title_seo" class="control-label"><?php echo lang('title_seo') ?></label>
					<div class="controls">
						<input type="text" id="title_seo" name="title_seo" value="<?php echo set_value("title_seo") ?>" x-webkit-speech>
						<span class="help-inline"></span>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="tags"><?php echo lang('tag') ?></label>
					<div class="controls">
						<input type="text" id="tags" name="tags" value="<?php echo set_value("tags") ?>">
						<span class="help-inline">使用英文标点`,`隔开</span>
					</div>
				</div>

				<div class="control-group">
					<label for="intro"  class="control-label"><?php echo lang('intro') ?></label>
					<div class="controls">
						<textarea name="intro" rows='8' class='span4'> <?php echo set_value('intro') ?> </textarea>
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
			<label for="img" class="control-label"><?php echo lang('photo') ?> </label>
			<div class="controls">
				<div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>[<?php echo $photo_px[$cid] ?>]
						<input class="fileupload" type="file" data-smallsize="100x80" data-size="<?php echo $photo_px[$cid] ?>" accept="">
					</span>
					<input type="hidden" name="photo" class="form-upload" data-more="0" value="<?php echo set_value("photo") ?>">
					<input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo set_value("thumb") ?>">
				</div>
			</div>
		</div>
		<div id="js-photo-show" class="js-img-list-f">
		</div>
		<div class="clear"></div>
		<!-- 图片上传 -->
        <?php endif; ?>

       <?php if (in_array($cid,$need_photo1)): ?>
		<!-- 移动端图片上传 -->
		<div class="control-group">
			<label for="img" class="control-label">移动端图片</label>
			<div class="controls">
				<div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>[<?php echo $photo1_px[$cid] ?>]
						<input class="fileupload" type="file" data-smallsize="100x80" data-size="<?php echo $photo1_px[$cid] ?>" accept="">
					</span>
					<input type="hidden" name="photo1" class="form-upload" data-more="0" value="<?php echo set_value("photo1") ?>">
				</div>
			</div>
		</div>
		<div id="js-photo1-show" class="js-img-list-f">
		</div>
		<div class="clear"></div>
		<!-- 图片上传 -->
        <?php endif; ?>

	</div>

	<div class="boxed-footer">
		<input type="hidden" name="cid" value="<?php echo $this->cid ?>">
		<?php if ($this->ccid): ?>
			<input type="hidden" name="ccid" value="<?php echo $this->ccid ?>">
		<?php endif ?>
		<input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
		<input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
	</div>
</form>
</div>

<?php include_once 'inc_ui_media.php'; ?>

<script type="text/javascript">
	require(['adminer/js/ui','adminer/js/media','bootstrap-datetimepicker.zh'],function(ui,media){
	// timepick
	$('.timepicker').datetimepicker({'language':'zh-CN','format':'yyyy/mm/dd hh:ii:ss','todayHighlight':true});
	// media 上传
	media.init();
	var banners_photos = <?php echo json_encode(one_upload(set_value("photo"))) ?>;
	var banners_photo1 = <?php echo json_encode(one_upload(set_value("photo1"))) ?>;
	media.show(banners_photos,"photo");
	media.show(banners_photo1,"photo1");
});

</script>
