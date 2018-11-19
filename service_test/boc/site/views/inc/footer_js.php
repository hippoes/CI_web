<?php
	echo static_file('lib/jquery/1.9.1/jquery.min.js');
	echo static_file('lib/Validform/5.3.2/Validform.min.js');
	echo static_file('lib/layer/1.9.3/layer.js');
	echo static_file('js/H-ui.admin.js');
	echo static_file('js/H-ui.js');

    $cur_url = current_url();
    $base_url = base_url();
    $str_url = str_replace($base_url,'',$cur_url);
    $str = substr($str_url,0,strpos($str_url,'.'));
    if($str !== 'login' && $str !== 'login/index' && $str !== 'login/check_login'){
        $login_time = get_login_time();
    }
?>
<script>

$(function(){
    check_login();

    $("body").click(function(){
        check_login();
    });
})


// 验证登录是否过期
function check_login(){
    var login_time = '<?php if(!empty($login_time)){echo $login_time;} ?>';
    var timestamp = parseInt(Date.parse(new Date())/1000);
    // alert(login_time);
    if(login_time !== ''){
        // alert('a');
        if(timestamp > login_time){
            window.location.href='<?echo GLOBAL_URL;?>';
        }
    }
}
</script>