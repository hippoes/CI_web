<?php
$cid=$this->cid;
$need_content=array(9);
$need_photo=array(7,8,9,10,11);
$photo_px=array(
    7 => '600x400',
    8 => '600x400',
    9 => '800x450',
    10 => '1000x500',
	11 => '570x240',
);
$id=$it['id'];

if ($id==15 || $id==14){
    $photo_px[11]='270x190';
}
if ($id==12){
	$photo_px[11]='570x611';
	$photo1_px[11] = '570x240';
}
// var_dump(set_value('link',$it['link']));
?>
<div class="btn-group">
    <a href="<?php echo site_urlc('links/index')?>" class='btn'> <i class="icon-arrow-left"></i> 返回列表</a>
</div>

<?php include_once 'inc_form_errors.php'; ?>

<div class="boxed">

    <h3> <i class="fa fa-pencil"></i> <?php echo lang('edit'); ?> <span class="badge badge-success pull-right"><?php echo $title; ?></span> </h3>
    <?php echo form_open(current_urlc(),array("class"=>"form-horizontal","id"=>"frm-edit")); ?>

    <div class="boxed-inner seamless">

        <div class="control-group">
            <label class="control-label" for="title"> 标题 </label>
            <div class="controls">
                <input type="text" class="span6" name="title" value="<?php echo set_value('title',$it['title']) ?>" id="title" x-webkit-speech>
            </div>
        </div>

        <?php if($cid==67): ?>
        <div class="control-group">
            <label class="control-label" for="city"> 城市 </label>
            <div class="controls">
                <input type="text" placeholder="城市名必填！" required  class="span6" name="city" value="<?php echo set_value('city',$it['city']) ?>" id="city" x-webkit-speech>
            </div>
        </div>
        <?php endif; ?>

        <div class="control-group">
            <label class="control-label" for="link"> <?php if($cid==67) echo "域名"; else echo "链接"; ?></label>
            <div class="controls">
                <input type="text" <?php if($cid!=67): ?>placeholder="类似 http://... 或 https://..."<?php endif; ?> class='span6' name="link" value="<?php echo set_value('link',$it['link']) ?>" id="link">
            </div>
        </div>

        <?php if (in_array($cid,$need_content)): ?>
        <div class="control-group">
            <label class="control-label" for="content">简介</label>
            <div class="controls">
                <textarea name="content" rows="8" class="input-xxlarge"><?php echo set_value('content',$it['content']) ?></textarea>
            </div>
        </div>
        <?php endif; ?>

        <?php if (in_array($cid,$need_photo)): ?>
        <div class="control-group">
            <label for="img" class="control-label">图片 </label>
            <div class="controls">
                <div class="btn-group">
						<span class="btn btn-success">
							<i class="fa fa-upload"></i>
							<span> <?php echo lang('upload_file') ?> </span>[<?php echo $photo_px[$cid] ?>]
							<input class="fileupload" type="file" data-smallsize="100x80" data-size="<?php echo $photo_px[$cid] ?>" accept="">
						</span>
                    <input type="hidden" name="photo" class="form-upload" data-more="0" value="<?php echo $it['photo'] ?>">
                    <input type="hidden" name="thumb" class="form-upload-thumb" value="<?php echo $it['thumb'] ?>">
                    <span class="help-inline">上传会替换原文件！</span>
                </div>
            </div>
        </div>

        <div id="js-photo-show" class="js-img-list-f">
            <!-- 模板 #tpl-img-list -->
        </div>
        <div class="clear"></div>
        <?php endif; ?>
		
		
		<?php if ($cid == 11 && $id == 12): ?>
            <!-- 图片上传 -->
            <div class="control-group">
                <label for="img" class="control-label">手机端图片</label>
                <div class="controls">
                    <div class="btn-group">
					<span class="btn btn-success">
						<i class="fa fa-upload"></i>
						<span> <?php echo lang('upload_file') ?> </span>[<?php echo $photo1_px[$cid] ?>]
						<input class="fileupload" data-smallsize="100x80" data-size="<?php echo $photo1_px[$cid] ?>" type="file" accept="">
					</span>
                        <input type="hidden" name="photo1" class="form-upload" data-more="0" value="<?php echo set_value("photo1",$it['photo1']) ?>">
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
        <?php if ($this->ccid): ?>
            <input type="hidden" name="ccid" value="<?php echo $this->ccid ?>">
        <?php endif ?>
        <input type="hidden" name="cid" value="<?php echo $this->cid; ?>">
        <input type="hidden" name="id" value="<?php echo $it['id'] ?>" id="id">
        <input type="submit" value=" <?php echo lang('submit'); ?> " class='btn btn-primary'>
        <input type="reset" value=' <?php echo lang('reset'); ?> ' class="btn btn-danger">
    </div>
    </form>
</div>

<?php include_once 'inc_ui_media.php'; ?>
<script type="text/javascript" charset="utf-8">
    require(['tools','adminer/js/media'],function(tools,media){
        var rules = {
            title: {
                required:true,
            },
            link:{
                required:false,
                url:true,
                minlength:6
            }
        };

        var message = {
            title:{
                required: "请输入标题！",
                minlength: jQuery.format("输入字符数不的小于 {0} ！"),
            },
            link:{
                required: "请输入链接！",
                url:"请输入正确的网站！",
            }
        };
        tools.make_validate('frm-edit',rules,message);

        var links_photos = <?php echo json_encode(one_upload(set_value('photo',$it['photo']))) ?>;
        var links_photos1 = <?php echo json_encode(one_upload(set_value('photo1',$it['photo1']))) ?>;
        console.log(links_photos);
        media.init();
        media.show(links_photos,'photo');
        media.show(links_photos1,'photo1');
    });
</script>
