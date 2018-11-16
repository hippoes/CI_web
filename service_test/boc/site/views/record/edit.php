<!DOCTYPE html>
<html>
<head>
	<!-- 头部 -->
	<?php include_once VIEWS.'inc/head.php'; ?>
	<?php
    	echo static_file('lib/icheck/icheck.css');
    	echo static_file('css/spectrum.css');
		echo static_file('css/mycss.css');
	?>
</head>

<body>

<!-- 内容 -->
<div class="pd-20">
  <!-- <form action="" method="post" class="form form-horizontal" id="form-member-add"> -->
  <?php echo form_open('record/edit_module', array('class'=>'form form-horizontal','id'=>'form-member-add'));?>
    <div class="module">
      <!-- row -->
      <div class="row cl">
        <label class="form-label col-3">消息模板：</label>
        <div class="formControls col-5">
	        <input type="hidden" id="message_id" name="id" value="<?php if(!empty($message['id'])){echo $message['id'];}?>">
			<input type="text" class="input-text width-100" value="<?php if(!empty($message['template_title'])){echo $message['template_title'];}?>" placeholder="请输入消息标题" id="template_title" name="template_title" disabled/>
        </div>
        <div class="col-4"> </div>
      </div>
      <!-- row -->
      <div class="row cl">
        <label class="form-label col-3"><span class="c-red">*</span>First Data：</label>
        <div class="formControls col-5">
          <input type="text" class="input-text" value="<?php if(!empty($message['first_data'])){echo $message['first_data'];}?>" placeholder="请输入消息标题" id="First-Data" name="first_data" datatype="*" nullmsg="First Data 不能为空">
          <input type='hidden' class="full" value='<?php if(!empty($message['first_color'])){ echo $message['first_color']; }?>'/>
        </div>
        <div class="col-4"> </div>
      </div>

    <?php if(!empty($message['fields'])) :?>
		<?php foreach($message['fields'] as $v):?>	
		<div class="row cl">
	        <label class="form-label col-3"><span class="c-red">*</span><?php if(!empty($v['name'])){echo $v['name'];}?>：</label>
	        <div class="formControls col-5">
	        	<input type="text" class="input-text" value="<?php if(!empty($v['value'])){echo $v['value'];}?>" placeholder="<?php if(!empty($v['name'])){echo '请输入'.$v['name'];}?>" name="<?php if(!empty($v['field'])){echo $v['field'];}?>" datatype="*" nullmsg="<?php if(!empty($v['name'])){echo $v['name'].' 不能为空';}?> ">
          		<input type='hidden' class="full" value='<?php if(!empty($v['color'])){ echo $v['color']; }?>' />
	        </div>
	        <div class="col-4"> </div>
	    </div>
    	<?php endforeach; ?>
	<?php endif?>

      <!-- row -->
      <div class="row cl">
        <label class="form-label col-3">Remark Data：</label>
        <div class="formControls col-5">
          <input type="text" class="input-text" value="<?php if(!empty($message['remark_data'])){echo $message['remark_data'];}?>" placeholder="请输入消息备注消息" id="Remark-Data" name="remark_data">
          <input type='hidden' class="full" value='<?php if(!empty($message['remark_color'])){ echo $message['remark_color']; }?>'/>
        </div>
        <div class="col-4"> </div>
      </div>
      <!-- row -->
      <div class="row cl">
        <label class="form-label col-3">详情链接：</label>
        <div class="formControls col-5">
          <input type="text" class="input-text width-100" value="<?php if(!empty($message['redirect_url'])){echo $message['redirect_url'];}?>" placeholder="请输入消息详情跳转链接" id="redirect_url" name="redirect_url">
        </div>
        <div class="col-4"> </div>
      </div>

      <!-- row -->
      <div class="row cl">
        <div class="col-9 col-offset-3">
          <button type="button" class="btn btn-primary radius" id="next_members" >&nbsp;&nbsp;下一步&nbsp;&nbsp;</button>
        </div>
      </div>
  </div>

     <!-- ***************** -->
    <div class="check_user" style="display:none;">
     <button type="button" class="btn btn-primary radius" id="check_all" data-value='false'>&nbsp;&nbsp;全选&nbsp;&nbsp;</button>
     <button type="button" class="btn btn-danger radius" id="check_del">&nbsp;&nbsp;删除&nbsp;&nbsp;</button>
     <button type="submit" class="btn btn-success r radius" id="check_submit" style="margin-right:4px;">&nbsp;&nbsp;完成&nbsp;&nbsp;</button>
     <button type="button" class="btn btn-warning r radius" id="go_back" style="margin-right:4px;">&nbsp;&nbsp;上一步&nbsp;&nbsp;</button>
     <input type="hidden" name="sub_ids" id="check_ids" value="">
     <div class="member_list">
        <div class="mt-20">
          <?php if(!empty($userinfos)) :?>
            <?php foreach($userinfos as $k=>$v):?>
             <div class="userlist" id="<?php if(!empty($v['id'])){ echo 'user'.$v['id']; }?>">
              <input type="checkbox" id="<?php if(!empty($v['id'])){ echo 'check'.$v['id']; }?>" class="check_box" value="<?php if(!empty($v['id'])){ echo $v['id']; }?>">
              <div class="close_box"><i title="从当前列表中移除该用户" data-value="<?php if(!empty($v['id'])){ echo $v['id']; }?>"></i></div>
              <div class="cont">
                <label for="<?php if(!empty($v['id'])){ echo 'check'.$v['id']; }?>">
                  <div class="pic">
                    <img src="<?php if(!empty($v['headimgurl'])){ echo $v['headimgurl'];} ?>" width='50px' height='50px'>
                  </div>
                  <div class="con">
                    <p class="title"><?php if(!empty($v['nickname'])){echo $v['nickname'];}?></p>
                  </div>
                </label>
              </div>
             </div>
            <?php endforeach; ?>
          <?php endif?>
          	<div id="user_add" class="userlist" >
            	<div class="cont">
                  	<div class="pic">
                    	<img src="<?php echo static_file('img/image.png')?>" width='88px' height='75px'>
                  	</div>
	                <div class="con">
	                    <p class="title">添加</p>
	                </div>
            	</div>
            </div>
        </div>
     </div>
    </div>

	<div class="clear"></div>
	<div class="userother">
		<button type="button" class="btn btn-primary radius" id="other_check_all" data-value='false'>&nbsp;&nbsp;全选&nbsp;&nbsp;</button>
		<button type="button" class="btn btn-primary r radius" id="check_add" style="margin-right:4px;">&nbsp;&nbsp;添加&nbsp;&nbsp;</button>
		<button type="button" class="btn btn-warning r radius" id="go_back_add" style="margin-right:4px;">&nbsp;&nbsp;上一步&nbsp;&nbsp;</button>
		<div class="member_lists">
       		<div class="mt-20">
				<?php if(!empty($userlists)) :?>
		            <?php foreach($userlists as $k=>$v):?>
		            <div class="other_userlist" id="<?php if(!empty($v['id'])){ echo 'user'.$v['id']; }?>">
		            	<input type="checkbox" id="<?php if(!empty($v['id'])){ echo 'check'.$v['id']; }?>" class="check_box" value="<?php if(!empty($v['id'])){ echo $v['id']; }?>">
		              	<div class="close_box"><i title="从当前列表中移除该用户" data-value="<?php if(!empty($v['id'])){ echo $v['id']; }?>"></i></div>
		              	<div class="cont">
		                	<label for="<?php if(!empty($v['id'])){ echo 'check'.$v['id']; }?>">
			                	<div class="pic">
			                    	<img src="<?php if(!empty($v['headimgurl'])){ echo $v['headimgurl'];} ?>" width='50px' height='50px'>
			                  	</div>
		                  		<div class="con">
		                    		<p class="title"><?php if(!empty($v['nickname'])){echo $v['nickname'];}?></p>
		                  		</div>
		                	</label>
		              	</div>
		            </div>
		            <?php endforeach; ?>
		        <?php endif?>
			</div>
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
	echo static_file('js/spectrum.js');
?>

<script type="text/javascript">
/*消息-编辑*/
function user_add(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户选择-改变背景*/ 
function check_bg($dom,$find_dom){
	$($dom).find($find_dom).click(function(){
		if($(this).is(':checked')){
			$(this).parent().css('background-color','#EDEDED');
		}else{
			$(this).parent().css('background-color','');
		}
    });
}
/*用户选择-全选*/ 
function check_all($btn,$data,$dom,$find_dom){
    $($btn).click(function(){
      	var status = $(this).attr($data);
      	if(status == 'false'){
        	$($dom).find($find_dom).prop('checked',true);
        	$($dom).css('background-color','#EDEDED');
        	$(this).attr('data-value','true');
      	}else{
        	$($dom).find($find_dom).prop('checked',false);
        	$($dom).css('background-color','');
       	 $(this).attr($data,'false');
      	}
    });	
}
/*用户-删除单个用户*/ 
function del_user($dom,$appdom,$deldom,preclass,suburl,message_id){
	$($dom).click(function(){
      	var id = $(this).find('i').attr('data-value');
     	var prefix = "<div class='"+preclass+"' id='user"+id+"'>";
	    var suffix = "</div>";
	    var html = $(this).parent().html();
	    html = prefix+html+suffix;
		layer.confirm('确认要移除吗？',function(){
			//此处请求后台程序，下方是成功后的前台处理……
			$.ajax({
			    type: 'POST',
			    url: suburl,
			    data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&ids="+id+"&message_id="+message_id,
			    success:function(msg){
			    	// alert(msg);
			       	if(msg == 1){
						$($appdom).find('.mt-20').append(html);
						$($deldom).find('#user'+id).remove();
						check_bg('.'+preclass,'.check_box');
				        layer.msg('已移除!',{icon:1,time:1000});
					}else if(msg == 'null'){
						layer.msg('删除失败，您不能清空所有用户！',{icon:1,time:1500});
					}else {
						layer.msg('删除失败，请联系管理员！',{icon:1,time:1500});
					}
				}
			});
      	});
    });
}
/********* 我是分隔符 *********/
// 初始化
$(function(){
	// 模板 id
	var message_id = $('#message_id').val();

	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	// 表单提交
	$("#form-member-add").Validform({
		tiptype:2,
	    btnSubmit:"#check_submit",
	    beforeCheck:function(){
	      // 完成 
	        var sub_ids = '';
	        $('.userlist').find('.check_box').each(function(){
	          if($(this).is(":checked")){
	            var id = $(this).val();
	            sub_ids = sub_ids+id+',';
	          }
	        });
	        if(sub_ids){
	            $('#check_ids').attr('value',sub_ids);
	        }else{
	          layer.msg('请选择用户!',{icon:2,time:1500});
	          return false;
	        }
	    },
		callback:function(form){

		}
	});


  // 模板内容验证-->下一步
  $("#next_members").click(function(){
    var pass = true;

    var len = $('.row').find('.input-text').length;
    $('.row').find('.input-text').each(function(){
    	var name = $(this).attr('name').trim().toString();
    	if(name != 'remark_data' && name != 'redirect_url'){
	      if($(this).val() == ''){
	        nullmsg = $(this).attr('nullmsg');
	        $(this).addClass('Validform_error');
	        $(this).parent().next().empty().append('<span class="Validform_checktip Validform_wrong">'+nullmsg+'</span>');
	        pass = false;
	      }
	   	}
    });
    if(pass){
      $('.module').css('display','none');
      $('.check_user').css('display','block');
    }
  })

	// 上一步
	$('#go_back').click(function(){
	  $('.module').css('display','block');
	  $('.check_user').css('display','none');
	});

	// 全选/全不选-选中用户
    check_all('#check_all','data-value','.userlist','.check_box');
  	
  	// 选中用户更改背景色
    check_bg('.userlist','.check_box');

	// 删除单个用户
    del_user('.close_box','.member_lists','.member_list','other_userlist',"<?php echo site_url('record/edit_deluser');?>",message_id);

  	// 删除选中用户-多选  
    $('#check_del').click(function(){
        var del_ids = '';
        var del_htmls = '';
        $('.userlist').find('.check_box').each(function(){
          if($(this).is(":checked")){
            var id = $(this).val();
            del_ids = del_ids+id+',';
            var prefix = "<div class='other_userlist' id='user"+id+"'>";
		    var suffix = "</div>";
		    var html = $(this).parent().html();
		    html = prefix+html+suffix;
			del_htmls = del_htmls+html;
          }
        });
        // alert(del_htmls);
        // alert(del_ids);
        if(del_ids){
        	layer.confirm('确认要移除选中用户吗？',function(){
        		//此处请求后台程序，下方是成功后的前台处理……
				var suburl = "<?php echo site_url('record/edit_deluser');?>";
				$.ajax({
				    type: 'POST',
				    url: suburl,
				    data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&ids="+del_ids+"&message_id="+message_id,
				    success:function(msg){
				    	// alert(msg);
				       	if(msg == 1){
				       		var ids = del_ids.split(',');
			            	for(var i=0;i<(ids.length-1);i++){
			            	  	$('.member_list').find('#user'+ids[i]).remove();
			            	}
							$('.member_lists').find('.mt-20').append(del_htmls);
							check_bg('.other_userlist','.check_box');
					        layer.msg('已移除!',{icon:1,time:1000});
						}else if(msg == 'null'){
							layer.msg('删除失败，您不能清空所有用户！',{icon:1,time:1500});
						}else {
							layer.msg('删除失败，请联系管理员！',{icon:1,time:1500});
						}
					}
				});
          	});
        }else{
          layer.msg('请先选择数据!',{icon:2,time:1500});
        } 
    });

    $('#user_add').click(function(){
    	$('.check_user').css('display','none');
      	$('.userother').css('display','block');
    })

    // 上一步
	$('#go_back_add').click(function(){
	  $('.check_user').css('display','block');
	  $('.userother').css('display','none');
	});

// *****************************
    // 全选/全不选-未选中用户
    check_all('#other_check_all','data-value','.other_userlist','.check_box');

    // 选中用户更改背景色
    check_bg('.other_userlist','.check_box');

    // 添加所选用户
    $('#check_add').click(function(){
    	var addhtml = '';
    	var add_ids = '';
        $('.other_userlist').find('.check_box').each(function(){
          if($(this).is(":checked")){
          	var id = $(this).val();
          	add_ids = add_ids+id+',';
            var html = $(this).parent().html();
            var prefix = "<div class='userlist' id='user"+id+"'>";
            var suffix = "</div>";
            html = prefix+html+suffix;
            addhtml = addhtml+html;
          }
        });
        if(add_ids !=='' && addhtml !==''){
        	layer.confirm('确认要添加这些用户吗？',function(index){
				//此处请求后台程序，下方是成功后的前台处理……
				var suburl = "<?php echo site_url('record/edit_adduser');?>";
				$.ajax({
		            type: 'POST',
		            url: suburl,
		            data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&ids="+add_ids+"&message_id="+message_id,
		            success:function(msg){
		            	// alert(msg);
		               if(msg == 1){
			               	var	id = add_ids.split(',');
		            		for(var i=0;i<id.length;i++){
			            		$(".member_lists").find('#user'+id[i]).remove();
		            		}
			    			$('#user_add').before(addhtml);
			    			check_bg('.userlist','.check_box');
							layer.msg('已添加!',{icon:1,time:1000});
						}else {
							layer.msg('添加失败，请联系管理员！',{icon:1,time:1500});
						}
		       		}
		       });
			});
        }else{
        	layer.msg('请先选择用户!',{icon:1,time:1500});
        }
    });
    alert($('.full').length);
	$('.full').each(function(){
		// var color = $(this).attr('value');
		// alert(color);
		check_color('.full');
		updateBorders(color);
	});
});


function check_color($dom){
  $($dom).spectrum({
　　allowEmpty:true,
　　color: '#000',
　　showInput: true,
　　containerClassName: "full-spectrum",
　　showInitial: true,
　　showPalette: true,
　　showSelectionPalette: true,
　　showAlpha: true,
　　maxPaletteSize: 7,
　　preferredFormat: "hex",
　　localStorageKey: "spectrum.demo",
    cancelText: "取消",//取消按钮,按钮文字
    chooseText: "确定",//选择按钮,按钮文字
　　move: function (color) {
　　　　updateBorders(color);
　　},
　　show: function () {

　　},
　　beforeShow: function () {

　　},
　　hide: function (color) {
　　　　updateBorders(color);
        // 对应 input 添加color属性
        $(this).prev().attr('color',color);
        $(this).val(color);
　　},

　　palette: [
　　　　["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)", "rgb(153, 153, 153)","rgb(183, 183, 183)",
　　　　"rgb(204, 204, 204)", "rgb(217, 217, 217)", "rgb(239, 239, 239)", "rgb(243, 243, 243)", "rgb(255, 255, 255)"],
　　　　["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
　　　　"rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"],
　　　　["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)",
　　　　"rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)",
　　　　"rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)",
　　　　"rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)",
　　　　"rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)",
　　　　"rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
　　　　"rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
　　　　"rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
　　　　"rgb(133, 32, 12)", "rgb(153, 0, 0)", "rgb(180, 95, 6)", "rgb(191, 144, 0)", "rgb(56, 118, 29)",
　　　　"rgb(19, 79, 92)", "rgb(17, 85, 204)", "rgb(11, 83, 148)", "rgb(53, 28, 117)", "rgb(116, 27, 71)",
　　　　"rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)",
　　　　"rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
　　　　]
    });
}

function updateBorders(color) {
  var hexColor = "transparent";
  if(color) {
    hexColor = color.toHexString();
  }
  $("#docs-content").css("border-color", hexColor);
}
</script>
</body>
</html>