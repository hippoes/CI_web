<!DOCTYPE html>
<html>
<head>
	<!-- 头部 -->
	<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body>

<div class="cl pd-20" style=" background-color:#5bacb6">
  <img class="avatar size-XL l" src="<?php echo $userinfo['headimgurl'];?>">
  <dl style="margin-left:80px; color:#fff">
    <dt><span class="f-18"><?php if(!empty($userinfo['nickname'])) echo $userinfo['nickname']; else echo '特殊符号'; ?></span> <span class="pl-10 f-12"><!-- 余额：40 --></span></dt>
    <dd class="pt-10 f-12" style="margin-left:0"><?php if(!empty($userinfo['remark'])){echo $userinfo['remark'];}else{echo "没有对用户进行备注";} ?></dd>
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
        <th class="text-r">积分：</th>
        <td>330</td>
      </tr>
    </tbody>
  </table>
</div>
<!-- 底部js -->
<?php include_once VIEWS.'inc/footer_js.php'; ?>

</body>
</html>