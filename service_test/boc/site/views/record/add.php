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
    <style>
        .member_list .cont .con p{overflow: hidden;text-overflow: ellipsis;white-space: nowrap;}
    </style>
</head>

<body>

<!-- 内容 -->
<div class="pd-20">
  <!-- <form action="" method="post" class="form form-horizontal" id="form-member-add"> -->
  <?php echo form_open('record/save_module', array('class'=>'form form-horizontal','id'=>'form-member-add'));?>
    <div class="module">
      <!-- row -->
      <div class="row cl">
        <label class="form-label col-3"><span class="c-red">*</span>消息模板：</label>
        <div class="formControls col-5"> <span class="select-box">
          <select class="select" size="1" name="template_id" datatype="*" nullmsg="请选择消息模板！">
            <option value="" selected>请选择消息模板</option>
            <?php if(!empty($template)) :?>
              <?php foreach($template as $k=>$v):?>
                 <option value='<?php echo $k;?>'><?php echo $v;?></option>
              <?php endforeach; ?>
            <?php endif?>
          </select>
          </span> </div>
        <div class="col-4"> </div>
      </div>
      <!-- row -->
      <div class="row cl">
        <label class="form-label col-3"><span class="c-red">*</span>First Data：</label>
        <div class="formControls col-5">
          <input type="text" class="input-text" value="" placeholder="请输入消息标题" id="First-Data" name="first_data" datatype="*" nullmsg="First Data 不能为空">
          <input type='hidden' class="full" value='#000'/>
        </div>
        <div class="col-4"> </div>
      </div>
      <!-- row -->
      <div class="opiton_row">
      </div>
      
      <!-- row -->
      <div class="row cl">
        <label class="form-label col-3">Remark Data：</label>
        <div class="formControls col-5">
          <input type="text" class="input-text" value="" placeholder="请输入消息备注消息" id="Remark-Data" name="remark_data">
          <input type='hidden' class="full" value='#000'/>
        </div>
        <div class="col-4"> </div>
      </div>
      <!-- row -->
      <div class="row cl">
        <label class="form-label col-3">详情链接：</label>
        <div class="formControls col-5">
          <input type="text" class="input-text width-100" value="" placeholder="请输入消息详情跳转链接" id="redirect_url" name="redirect_url" nullmsg="">
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
     <input type="hidden" name="font_colors" id="font_color" value="">
     <div class="member_list">
        <div class="mt-20">
          <?php if(!empty($userlist)) :?>
            <?php foreach($userlist as $k=>$v):?>
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
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});

	$("#form-member-add").Validform({
		tiptype:2,
    btnSubmit:"#check_submit",
    beforeCheck:function(){
        // 选中用户
        var sub_ids = '';
        $('.userlist').find('.check_box').each(function(){
          if($(this).is(":checked")){
            var id = $(this).val();
            sub_ids = sub_ids+id+',';
          }
        });
        
        // 文字颜色
        colors = '';
        $('.row').find('.input-text').each(function(){
          var val = $(this).val();
          var name = $(this).attr('name');
          if(name != 'redirect_url'){
            var color = $(this).attr('color');
            if(color == undefined){
              color = '#000000';
            }
            colors = colors+'$$'+color;
          }
        })
        if(colors){
          $('#font_color').attr('value',colors);
        }
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

  // 下拉选中模板 Ajax 调出模板填写信息
  $('.select').find('option').click(function(){
    var id = $(this).val();
    if(id !== ''){
      //此处请求后台程序，下方是成功后的前台处理……
        var suburl = "<?php echo site_url('record/tempalte_detail');?>";
        $.ajax({
          type: 'POST',
          url: suburl,
          data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&id="+id,
          success:function(msg){
            var json = JSON.parse(msg);
            var str = '';
            for(var i=0;i<json.length;i++){
              str = str+"<div class='row cl'><label class='form-label col-3'><span class='c-red'>*</span>"+json[i]+"：</label><div class='formControls col-5'><input type='text' class='input-text' value='' placeholder='请输入"+json[i]+"' id='member-tel' name='keywords"+i+"'  datatype='*' nullmsg='"+json[i]+"不能为空'> <input type='hidden' class='full' value='#000'/></div><div class='col-4'> </div></div>";
            }
            $('.opiton_row').empty().append(str);
            check_color('.full');
          }
      });
    }
  });

  // 模板内容验证-->下一步
  $("#next_members").click(function(){
    var pass = true;
    var s_val = $('.select-box').find('select').val();
    if(s_val == ''){
      var s_nullmsg = $('.select-box').find('select').attr('nullmsg');
      $('.select-box').find('select').addClass('Validform_error');
      $('.select-box').parent().next().empty().append('<span class="Validform_checktip Validform_wrong">'+s_nullmsg+'</span>');
      pass = false;
    }else{
      var orow = $('.opiton_row').html().trim();
      if(orow == ''){
        $('.select-box').parent().next().empty().append('<span class="Validform_checktip Validform_wrong">请重新选择模板!</span>');
        pass = false;
      }
    }

    var len = $('.module .row').find('.input-text').length;
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

  // 选中用户更改背景色
    $('.userlist').find('.check_box').click(function(){
      if($(this).is(':checked')){
        $(this).parent().css('background-color','#EDEDED');
      }else{
        $(this).parent().css('background-color','');
      }
    });

  // 移除当前用户
    $('.close_box').click(function(){
      var id = $(this).find('i').attr('data-value');
      layer.confirm('确认要移除吗？',function(){
        $('.member_list').find('#user'+id).remove();
        layer.msg('已移除!',{icon:1,time:1000});
      });
    })
  // 全选/全不选
    $('#check_all').click(function(){
      var status = $(this).attr('data-value');
      if(status == 'false'){
        $('.userlist').find('.check_box').prop('checked',true);
        $('.userlist').css('background-color','#EDEDED');
        $(this).attr('data-value','true');
      }else{
        $('.userlist').find('.check_box').prop('checked',false);
        $('.userlist').css('background-color','');
        $(this).attr('data-value','false');
      }
    });

  // 删除选中用户  
    $('#check_del').click(function(){
        var del_ids = '';
        $('.userlist').find('.check_box').each(function(){
          if($(this).is(":checked")){
            var id = $(this).val();
            del_ids = del_ids+id+',';
          }
        });
        if(del_ids){
          layer.confirm('确认要移除选中用户吗？',function(){
            var ids = del_ids.split(',');
            for(var i=0;i<(ids.length-1);i++){
              $('.member_list').find('#user'+ids[i]).remove();
            }
            layer.msg('已移除!',{icon:1,time:1000});
          });
        }else{
          layer.msg('请先选择数据!',{icon:2,time:1500});
        } 
    });
check_color('.full');
    
});

function check_color($dom){
  $($dom).spectrum({
　　allowEmpty:true,
　　color: "#000",
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