<!DOCTYPE html>
<html>
<head>
	<!-- 头部 -->
	<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body>

<!-- 内容部分 -->
<div class="pd-20" style="padding-top:20px;">
  <p class="f-20 text-success">欢迎使用H-ui.admin <span class="f-14">v2.3</span>后台模版！</p>
  <p>登录次数：<?php if(!empty($user['login_number'])){echo $user['login_number'];}else{echo '0';}?> </p>
  <p>登录IP：<?php if(!empty($user['login_ip'])){echo $user['login_ip'];}else{echo get_local_ip();}?>  登录时间：<?php if(!empty($user['login_time'])){echo date('Y-m-d H:i:s',$user['login_time']);}else{ echo date("Y-m-d H:i:s",time());}?></p>
  <table class="table table-border table-bordered table-bg">
    <thead>
      <tr>
        <th colspan="7" scope="col">信息统计</th>
      </tr>
      <tr class="text-c">
        <th>统计</th>
        <th>模板库</th>
        <th>送达消息</th>
        <th>待发送消息</th>
        <th>用户</th>
        <th>删除用户</th>
        <th>管理员</th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-c">
        <td>总数</td>
        <td><?php if(!empty($count['template'])){echo $count['template'];}else{echo '0';}?></td>
        <td><?php if(!empty($count['message_send'])){echo $count['message_send'];}else{echo '0';}?></td>
        <td><?php if(!empty($count['message_sent'])){echo $count['message_sent'];}else{echo '0';}?></td>
        <td><?php if(!empty($count['member'])){echo $count['member'];}else{echo '0';}?></td>
        <td><?php if(!empty($count['userdel'])){echo $count['userdel'];}else{echo '0';}?></td>
        <td><?php if(!empty($count['manager'])){echo $count['manager'];}else{echo '0';}?></td>
      </tr>
    </tbody>
  </table>
  <table class="table table-border table-bordered table-bg mt-20">
    <thead>
      <tr>
        <th colspan="2" scope="col">服务器信息</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $sys_linux = my_sys_linux();
    ?>
      <tr>
        <th width="200">服务器计算机名</th>
        <td><span id="lbServerName"><?php echo gethostbyaddr($_SERVER['REMOTE_ADDR']); ?></span></td>
      </tr>
      <tr>
        <td>服务器IP地址</td>
        <td><?php echo get_local_ip(); ?></td>
    </tr>
      <tr>
        <td>服务器域名</td>
        <td><?php echo $_SERVER['SERVER_NAME'];?></td>
      </tr>
      <tr>
        <td>服务器端口 </td>
        <td><?php echo $_SERVER['SERVER_PORT'];?></td>
      </tr>
      <tr>
        <td>服务器版本 </td>
        <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
      </tr>
      <tr>
        <td>本文件所在文件夹 </td>
        <td><?php echo $_SERVER['DOCUMENT_ROOT'];?></td>
      </tr>
      <tr>
        <td>服务器操作系统 </td>
        <td><?php echo PHP_OS;?></td>
      </tr>
      <!--<tr>
        <td>系统所在文件夹 </td>
        <td>C:\WINDOWS\system32</td>
      </tr>-->
      <tr>
        <td>服务器脚本超时时间 </td>
        <td><?php echo ini_get("max_execution_time"); ?></td>
      </tr>
      <tr>
        <td>服务器的语言种类 </td>
        <td><?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE'];?></td>
      </tr>
      <!--<tr>
        <td>.NET Framework 版本 </td>
        <td>2.050727.3655</td>
      </tr>-->
      <tr>
        <td>服务器当前时间 </td>
        <td><?php echo date('Y-m-d H:i:s',time());?></td>
      </tr>
      <tr>
        <td>访问浏览器版本 </td>
        <td><?php echo $_SERVER['HTTP_USER_AGENT'];?></td>
      </tr>
      <tr>
        <td>服务器上次启动到现在已运行 </td>
        <td><?php $uptime = my_sys_uptime(); if(!empty($uptime)){echo my_sys_uptime();}else{echo Uptime();} ?></td>
      </tr>
      <tr>
        <td>CPU 信息 </td>
        <td><?php if(!empty($sys_linux['cpu'])){echo $sys_linux['cpu']['num'].' '.$sys_linux['cpu']['num_text'].' '.$sys_linux['cpu']['model'];}else{ echo '该函数仅支持linux系统下';}?></td>
      </tr>
      <tr>
        <td>当前Session数量 </td>
        <td><?php /*echo count($_SESSION);*/?></td>
      </tr>
      <tr>
        <td>当前SessionID </td>
        <td>gznhpwmp34004345jz2q3l45</td>
      </tr>
      <tr>
        <td>当前系统用户名 </td>
        <td>NETWORK SERVICE</td>
      </tr>
    </tbody>
  </table>
</div>
<!-- end 内容部分 -->

<!-- 底部 -->
<?php include_once VIEWS.'inc/footer.php'; ?>
<!-- 底部js -->
<?php include_once VIEWS.'inc/footer_js.php'; ?>

<script>

</script>
</body>
</html>