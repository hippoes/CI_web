<!DOCTYPE html>
<html>
<head>
	<!-- 头部 -->
	<?php include_once VIEWS.'inc/head.php'; ?>
    <style>
        .text{display:none;}
    </style>
</head>
<body>
<div class="cl pd-20" style=" background-color:#5bacb6">
  <img class="avatar size-XL l" src="<?php echo $userinfo['headimgurl'];?>">
  <dl style="margin-left:80px; color:#fff">
    <dt><span class="f-18"><?php if(!empty($userinfo['nickname'])) echo $userinfo['nickname']; else echo '特殊符号'; ?></span> <span class="pl-10 f-12"><!-- 余额：40 --></span></dt>
    <dd class="pt-10 f-12 remark_intro" style="margin-left:0;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;" title="<?php echo $userinfo['remark'];?>"><?php if(!empty($userinfo['remark'])){echo $userinfo['remark'];}else{echo "没有对用户进行备注";} ?></dd>
  </dl>
</div>
<div class="pd-20">
  <table class="table">

      <tbody>
      <tr>
        <th class="text-r" width="80">性别：</th>
        <td><?php if($userinfo['sex']==1){echo '男'; }elseif($userinfo['sex']==2){echo '女'; }else{echo '未知';} ?></td>
      </tr>
      <tr>
        <th class="text-r">openid：</th>
        <td><?php echo $userinfo['openid']; ?></td>
      </tr>
      <tr>
        <th class="text-r">渠道来源：</th>
        <td><?php echo lang($userinfo['subscribe_scene'])?></td>
      </tr>
      <tr>
        <th class="text-r">地址：</th>
        <td><?php echo $userinfo['country'].'/'.$userinfo['province'].'/'.$userinfo['city']; ?></td>
      </tr>
      <tr>
        <th class="text-r">关注时间：</th>
        <td><?php echo date('Y-m-d H:i:s',$userinfo['subscribe_time']); ?></td>
      </tr>
      <tr>
        <th class="text-r">备注信息：</th>
        <td id="remarks">
            <div class="remark"><?php if(!empty($userinfo['remark'])){ echo $userinfo['remark'];}else{ echo "没有对用户进行备注 <small style='color:#ff5454;'>(点击填写备注信息)</small>";} ?></div>
            <div class="text"><textarea name='' cols='' rows=''  class='textarea' maxlength='200' placeholder='说点什么...最多输入200个字符' data-value="<?php echo $userinfo['remark'];?>"><?php echo $userinfo['remark'];?></textarea><button id='save'>保存</button></div>
        </td>
      </tr>

      </tbody>
  </table>
</div>
<!-- 底部js -->
<?php include_once VIEWS.'inc/footer_js.php'; ?>

<script>
    $(function(){
        // 点击编辑备注信息
        $('.remark').click(function(){
             $(this).empty();
             $(this).next().css('display','block');
        });
        // 备注信息最多200个字符
        $('.text textarea').change(function(){
            var len = $(this).val().length;
            if(len > 200){
                alert('最多输入200个字符');
            }
        })
        $('#save').click(function(){
            var remark = $(this).prev().val().replace(/<[^>]+>/g,"");
            var id = '<?php echo $userinfo['id'];?>';
            //此处请求后台程序，下方是成功后的前台处理……
           var suburl = "<?php echo site_url('member/edit');?>";
            $.ajax({
                type: 'POST',
                url: suburl,
                data: "<?php echo $this->security->get_csrf_token_name().'='.$this->security->get_csrf_hash();?>&id="+id+"&remark="+remark,
                success:function(msg){
                    $('#remarks').find('.text').css('display','none');
                    $('#remarks').find('.remark').text(remark);
                    $('.remark_intro').text(remark);
                    $('.remark_intro').attr('title',remark);
                    if(msg == 'TRUE'){
                        layer.msg('保存成功!', {icon: 6,time:1000});
                    }
                }
            });
        })
    })
</script>

</body>
</html>