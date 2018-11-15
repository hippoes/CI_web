<?php
if(!function_exists('colty_name')){
	/**
	 * 根据类型id获取对应分类名称
	 * @param int $id ,分类id
	 * @return string 分类名称
	 */
    function colty_name($id)
    {
        $id=intval($id);
        $CI=&get_instance();
        $CI->load->database();
        $query =$CI->db->get_where('coltypes',array('id'=>$id));

        $res = $query->result_array();
//        var_dump($res);exit;
        if (!empty($res)){
            return $res[0]['title'];
        }else{
            return '';
        }
    }
}

if (!function_exists('get_pic_alt')) {
    /**
     * 获取提图片的seo——alt
     * @param  int $id 图片id
     * @return string
     */
    function get_pic_alt($id)
    {
        $CI =& get_instance();
        if (!isset($CI->mupload)) {
            $CI->load->model('Upload_model','mupload');
        }
        $res = $CI->mupload->get_one(array('id' => $id),'alt');
        if (!empty($res)) {
            return $res['alt'];
        } else {
            return '';
        }
    }
}

if (!function_exists('curl_post')){
    /**
     * curl接口调用【post】
     * @param $api , 接口地址
     * @param $data , 要传输提交的数据
     * @return 成功返回数据，失败返回false
     */
    function curl_post($api,$data){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);        #设置头文件的信息作为数据流输出
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);        #设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($ch, CURLOPT_POST, TRUE);      #设置post方式提交
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);       #提交数据

        $res=curl_exec($ch);

        curl_close($ch);

        return $res;
    }
}

if (!function_exists('curl_get')){
    /**
     * curl接口调用【get】
     * @param $api , 接口地址
     * @return 成功返回数据，失败返回false
     */
    function curl_get($api){
        $ch=curl_init();

        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch,CURLOPT_HEADER,FALSE);       #设置头文件的信息作为数据流输出
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);   #设置获取的信息以文件流的形式返回，而不是直接输出。

        $res=curl_exec($ch);

        curl_close($ch);

        return $res;
    }
}

if (!function_exists('get_filecontents')){
    /**
     * file_get_contents获取网页内容
     * @param $url , 接口地址
     * @return 成功返回数据，失败返回false
     */
    function get_filecontents($url){
        $res=file_get_contents($url);

        return $res;
    }
}

if (!function_exists('handle_isolation_str_to_arr')){
    /**
     * 将一个字符串通过一个特定的分割符拆分成多个字符串
     * @param str $str , 要处理的字符串
     * @param str $delimiter, 分隔符
     * @return arr
     */
    function handle_isolation_str_to_arr($str,$delimiter){
        if ($str){
            $res=explode($delimiter,$str);
            $i=0;
            foreach ($res as $k=>$v){
                if (empty($v)){
                    array_splice($res,($k-$i),1);
                    ++$i;
                }
            }

            return $res;
        }else{
            return false;
        }
    }
}

if (!function_exists('get_contact_us')) {
    /**
     * 获取底部联系我们信息
     * @return array
     */
    function get_contact_us()
    {
        $CI =& get_instance();
        if (!isset($CI->page)) {
            $CI->load->model('page_model','page');
        }
        $res = $CI->page->get_one(array('id' => 18),'field1,field2,field3');
        return $res;
    }
}

if (!function_exists('get_qr_list')) {
    /**
     * 获取底部二维码信息
     * @return array
     */
    function get_qr_list()
    {
        $CI =& get_instance();
        if (!isset($CI->gallery)) {
            $CI->load->model('gallery_model','gallery');
        }
        $res = $CI->gallery->get_all(array('cid' => 8,'audit'=>1),'title,photo');
        return $res;
    }
}

if (!function_exists('get_sidebar_info')) {
    /**
     * 获取侧边栏信息
     * @return array
     */
    function get_sidebar_info()
    {
        $CI =& get_instance();
        if (!isset($CI->page)) {
            $CI->load->model('page_model','page');
        }
        $res = $CI->page->get_one(array('id' => 19),'field1,field2,photo');
        return $res;
    }
}

if (!function_exists('get_sidebar_qr')) {
    /**
     * 获取底部二维码信息
     * @return array
     */
    function get_sidebar_qr()
    {
        $CI =& get_instance();
        if (!isset($CI->gallery)) {
            $CI->load->model('gallery_model','gallery');
        }
        $res = $CI->gallery->get_all(array('cid' => 68,'audit'=>1),'title,photo');
        return $res;
    }
}

if (!function_exists('get_cities')) {
    /**
     * 获取城市列表
     * @return array
     */
    function get_cities()
    {
        $CI =& get_instance();
        if (!isset($CI->lists)) {
            $CI->load->model('lists_model','lists');
        }
        $res = $CI->lists->get_all(array('cid' => 10,'audit'=>1),'id,title');
        return $res;
    }
}

if (!function_exists('get_city_name_by_id')) {
    /**
     * 通过城市id获取对应城市名称
     * @param $id
     * @return array
     */
    function get_city_name_by_id($id)
    {
        $CI =& get_instance();
        if (!isset($CI->lists)) {
            $CI->load->model('lists_model','lists');
        }
        $res = $CI->lists->get_one(array('id'=>$id,'cid' => 10,'audit'=>1),'title');
        return $res['title'];
    }
}

if (!function_exists('get_dalshabet')) {
    /**
     * 获取美妍中心列表信息
     * @return array
     */
    function get_dalshabet()
    {
        $CI =& get_instance();
        if (!isset($CI->infos)) {
            $CI->load->model('infos_model','infos');
        }
        $res = $CI->infos->get_all(array('cid' => 47, 'audit'=>1),'title');
        return $res;
    }
}


// ******************************* 2018 09 05 **************************************

if (!function_exists('https_request')) {
    /**
     * [https_request  POST传参 curl调用接口链接返回状态]
     * @param  [type] $url  [访问的接口链接]
     * @param  [type] $data [传参数据]
     * @return [type]       [返回url处理后的json数据]
     */
    function https_request($url,$data = null){  
          $curl = curl_init();  
          curl_setopt($curl,CURLOPT_URL,$url);  
          curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);  
          curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);  
          if(!empty($data)){  
              curl_setopt($curl,CURLOPT_POST,1);  
              curl_setopt($curl,CURLOPT_POSTFIELDS,$data);  
          }  
          curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);  
          $output = curl_exec($curl);  
          curl_close($curl); 

          return $output;  
    }
}

if (!function_exists('get_new_access_token')) {
    /**
     * [get_new_access_token 重新获取 access_token ]
     * @param  [type] $url [ 微信提供 access_token 接口链接 ]
     * @return [type]      [ 返回 access_token=157位字符串 get_time=当前时间 ]
     */
    function get_new_access_token($url){
        // 函数处理接口获取 access_token，return[type = json]
        $output = https_request($url);
        // json_decode 处理json数据，return[type = array]
        $jsoninfo = json_decode($output,true);  
        $access_token = $jsoninfo["access_token"]; 
        
        return $access_token;
    }
}

if (!function_exists('get_userlist')) {
    /**
     * [get_userlist 获取公众号用户列表（用户的 openid）]
     * @param  [type] $next_openid [ 拉取列表的最后一个用户的OPENID ]
     * @param  [type] $access_token [ 调用接口凭证 ]
     * @return [type]              [ array(); total 关注的总人数，count 拉取的openid数，data 
     *                               openid数组，next_openid 拉取列表最后一个用户的openid]
     */
    function get_userlist($access_token,$next_openid=''){
        $userlists_url = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$access_token.'&next_openid='.$next_openid;
        $outline = https_request($userlists_url);
        $userlists = json_decode($outline,true);

        if(!empty($userlists['total']) && $userlists['total']>10000){
            $c = intval($userlists['total']/10000);
            if($c > 0){
                $next_openid = $userlists['next_openid'];
                for($i=0;$i<$c;$i++){
                    $next_userlist = get_userlist($access_token,$next_openid);
                    if(!empty($next_userlist['data']['openid'])){
                        foreach($next_userlist['data']['openid'] as $k => $v){
                            array_push($userlists['data']['openid'],$v);
                        }
                    }
                    $next_openid = $next_userlist['next_openid'];
                }
            }
        }

        // $userlists['data']['openid'] = array('o1uuC0XkSuEyOVnDFahiwrXW7RVQ','o1uuC0TUTOE4znOk-yXpStF2LTzA','o1uuC0aCFfuyYnIfistXY_7rU6BU','o1uuC0cWXJTlO-V6ON0_RZTKOWP0','o1uuC0f7peg3v-gsJKjg9WfT-IyM','o1uuC0fcZYsiMDyMwYV9zkvm5KGA','o1uuC0SamkCOl65Z9LQYXvrnZD50','o1uuC0RUPo4Ed0OaGsngl7MQlNjs','o1uuC0bp7fR8GgzlMZSZybtuJTQg','o1uuC0fnq7K1pg7kbA3dLoiMyADg');

        return $userlists;
    }
}

if (!function_exists('get_userinfo')) {
    /**
     * [get_userinfo 通过openid获取用户信息 ]
     * @param  [type] $access_token [ 调用接口凭证 ]
     * @param  [type] $openid       [ 用户的标识id，对当前公众号唯一 ]
     * @param  [type] $lang         [ 国家地区语言版本，zh_CN 简体，zh_TW 繁体，en 英语 ]
     * @return [type]               [ array(); subscribe 是否订阅该公众号标识，openid 标识，nickname 昵称，sex 性别，city 所在城市，country 所在国家，province 所在省份，language用户的语言，language 头像，subscribe_time关注的时间，remark备注，groupid所在分组id，tagid_list 标签，subscribe_scene 渠道来源 ]
     */
    function get_userinfo($access_token,$openid,$lang){
        $userinfo_url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$openid.'&lang='.$lang;
        $outline = https_request($userinfo_url);
        $userinfo = json_decode($outline,true);

        return $userinfo;
    }
}

if (!function_exists('get_userinfos')) {
    /**
     * [get_userinfos 获取一组用户详细信息]
     * @param  [type] $access_token [ 调用接口凭证 ]
     * @param  [type] $openidlists  [ 获取详细信息的openid列表 ]
     * @param  [type] $lang         [ 语言 ]
     * @return [type]               [ array(); 返回用户信息数组 ]
     */
    function get_userinfos($access_token,$openidlists,$lang){
        foreach($openidlists as $v){
            $array['openid'] = $v;
            $array['lang'] = $lang;
            $OpenidArray[] = $array;
        }
        $json = json_encode($OpenidArray);

        $userdata = '{"user_list":'.$json.'}';

        $userinfos_url = 'https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token='.$access_token;

        $outline = https_request($userinfos_url,$userdata);
        $userinfos = json_decode($outline,true);

        return $userinfos;
    }
}

if (!function_exists('get_title')) {
    /**
     * 获取页面标题
     * @return array
     */
    function get_title()
    {
        $CI =& get_instance();
        if (!isset($CI->configs)) {
            $CI->load->model('configs_model','configs');
        }
        $id = $CI->configs->last_id();
        $res = $CI->configs->get_one(array('id'=>$id),'web_name,web_keyword,web_description');
        return $res;
    }
}

if (!function_exists('get_admin_uname')) {
    /**
     * 获取页面标题
     * @return array
     */
    function get_admin_uname()
    {
        $CI =& get_instance();
        if (!isset($CI->manager)) {
            $CI->load->model('manager_model','manager');
        }
        $res = $CI->manager->get_list('','','','','username');

        if(!empty($res)){
            foreach($res as $v){
                $array[] = $v['username'];
            }
        }else{
            $array[] = '';
        }
        return $array;
    }
}
if (!function_exists('get_user_status')){
    function get_user_status($str){
         $CI =& get_instance();
        if (!isset($CI->manager)) {
            $CI->load->model('manager_model','manager');
        }
        $status = $CI->manager->get_one(array('username'=>$str),'status');

        return $status['status'];
    }
}


if (!function_exists('get_yzm')) {
    /**
     * 获取页面标题
     * @return array
     */
    function get_yzm()
    {

        $CI =& get_instance();
        $CI->load->library('validatecode');
        $code = $CI->validatecode->getCode();
        $CI->validatecode->doimg();

        return $code;

    }
}

if(!function_exists('get_login_time')){
    /*
     * 获取登陆时间
     * */
    function get_login_time()
    {
        $CI =& get_instance();
        $CI->load->library('session');

        return $CI->session->userdata('login_time');
    }
}

if(!function_exists('get_login_username')){
    /*
     * 获取登陆用户名
     * */
    function get_login_username()
    {
        $CI =& get_instance();
        $CI->load->library('session');

        return $CI->session->userdata('login_username');
    }
}

if(!function_exists('get_local_ip')){
    /*
     * 获取登录ip
     * */
    function get_local_ip()
    {
        $ip=getenv('REMOTE_ADDR');
        $ip_ = getenv('HTTP_X_FORWARDED_FOR');
        if (($ip_ != "") && ($ip_ != "unknown"))
        {
            $ip=$ip_;
        }
        else if($ip == '::1')
        {
            $ip = '127.0.0.1';
        }
        return $ip;
    }
}

if(!function_exists('get_system')){
    /*
     * 获取服务器操作系统 （echo PHP_OS; 获取值 更方便哈！）
     * */
    function get_system()
    {
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $os = false;
        if (stristr($agent,'win')) {
            $os = 'Windows';
        }
        else if (stristr($agent,'win') && stristr($agent, '95')) {
            $os = 'Windows 95';
        }
        else if (stristr($agent,'win 9x') && stristr($agent, '4.90')) {
            $os = 'Windows ME';
        }
        else if (stristr($agent,'win') && stristr($agent,'98')) {
            $os = 'Windows 98';
        }
        else if (stristr($agent,'win') && stristr($agent,'nt 5.1')) {
            $os = 'Windows XP';
        }
        else if (stristr($agent,'win') && stristr($agent,'nt 5')) {
            $os = 'Windows 2000';
        }
        else if (stristr($agent,'win') && stristr($agent,'nt')) {
            $os = 'Windows NT';
        }
        else if (stristr($agent,'win') && stristr($agent,'32')) {
            $os = 'Windows 32';
        } else if (stristr($agent,'linux')) {
            $os = 'Linux';
        }
        else if (stristr($agent,'unix')) {
            $os = 'Unix';
        }
        else if (stristr($agent,'sun') && stristr($agent,'os')) {
            $os = 'SunOS';
        }
        else if (stristr($agent,'ibm') && stristr($agent,'os')) {
            $os = 'IBM OS/2';
        }
        else if (stristr($agent,'Mac')) {
            $os = 'Mac OS X';
        }
        else if (stristr($agent,'PowerPC')) {
            $os = 'PowerPC';
        }
        else if (stristr($agent,'AIX')) {
            $os = 'AIX';
        }
        else if (stristr($agent,'HPUX')) {
            $os = 'HPUX';
        }
        else if (stristr($agent,'NetBSD')) {
            $os = 'NetBSD';
        }
        else if (stristr($agent,'BSD')) {
            $os = 'BSD';
        }
        else if (stristr($agent,'OSF1')) {
            $os = 'OSF1';
        }
        else if (stristr($agent,'IRIX')) {
            $os = 'IRIX';
        }
        else if (stristr($agent,'FreeBSD')) {
            $os = 'FreeBSD';
        }
        else if (stristr($agent,'teleport')) {
            $os = 'teleport';
        }
        else if (stristr($agent,'flashget')) {
            $os = 'flashget';
        }
        else if (stristr($agent,'webzip')) {
            $os = 'webzip';
        }
        else if (stristr($agent,'offline')) {
            $os = 'offline';
        }
        else{
            $os = 'Unknown';
        }
        return $os;
    }
}

if (!function_exists( 'my_sys_uptime' ) ) {
    /*
     * 获取服务器运行时间
     * */
    function my_sys_uptime() {
        $output='';
        if (false === ($str = @file("/proc/uptime"))) return false;
        $str = explode(" ", implode("", $str));
        $str = trim($str[0]);
        $min = $str / 60;
        $hours = $min / 60;
        $days = floor($hours / 24);
        $hours = floor($hours - ($days * 24));
        $min = floor($min - ($days * 60 * 24) - ($hours * 60));
        if ($days !== 0) $output .= $days."天";
        if ($hours !== 0) $output .= $hours."小时";
        if ($min !== 0) $output .= $min."分钟";
        return $output;
    }
}

if(!function_exists('Uptime')){
    function Uptime() {
        $uptime = @file_get_contents( "/proc/uptime");

        $uptime = explode(" ",$uptime);
        $uptime = $uptime[0];
        $days = explode(".",(($uptime % 31556926) / 86400));
        $hours = explode(".",((($uptime % 31556926) % 86400) / 3600));
        $minutes = explode(".",(((($uptime % 31556926) % 86400) % 3600) / 60));
        $seconds = explode(".",((((($uptime % 31556926) % 86400) % 3600) / 60) / 60));

        $time = $days[0].":".$hours[0].":".$minutes[0].":".$seconds[0];
        return $time;
    }
}


/***************************************/
if(!function_exists('my_sys_linux')){
    function my_sys_linux() {
        // CPU
        if (false === ($str = @file("/proc/cpuinfo"))) return false;
        $str = implode("", $str);
        @preg_match_all("/model\s+name\s{0,}\:+\s{0,}([\w\s\)\(\@.-]+)([\r\n]+)/s", $str, $model);
        @preg_match_all("/cpu\s+MHz\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $mhz);
        @preg_match_all("/cache\s+size\s{0,}\:+\s{0,}([\d\.]+\s{0,}[A-Z]+[\r\n]+)/", $str, $cache);
        @preg_match_all("/bogomips\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $bogomips);
        if (false !== is_array($model[1]))    {
            $res['cpu']['num'] = sizeof($model[1]);
            $res['cpu']['num_text'] = str_replace(array(1,2,4,8,16), array('单','双','四','八','十六'), $res['cpu']['num']).'核';
            /*
            for($i = 0; $i < $res['cpu']['num']; $i++) {
                $res['cpu']['model'][] = $model[1][$i].' ('.$mhz[1][$i].')';
                $res['cpu']['mhz'][] = $mhz[1][$i];
                $res['cpu']['cache'][] = $cache[1][$i];
                $res['cpu']['bogomips'][] = $bogomips[1][$i];
            }*/
            $x1 = ($res['cpu']['num']==1) ? '' : ' ×'.$res['cpu']['num'];
            $mhz[1][0] = ' | 频率:'.$mhz[1][0];
            $cache[1][0] = ' | 二级缓存:'.$cache[1][0];
            $bogomips[1][0] = ' | Bogomips:'.$bogomips[1][0];
            $res['cpu']['model'][] = $model[1][0].$mhz[1][0].$cache[1][0].$bogomips[1][0].$x1;
            if (false !== is_array($res['cpu']['model'])) $res['cpu']['model'] = implode("<br />", $res['cpu']['model']);
            if (false !== is_array($res['cpu']['mhz'])) $res['cpu']['mhz'] = implode("<br />", $res['cpu']['mhz']);
            if (false !== is_array($res['cpu']['cache'])) $res['cpu']['cache'] = implode("<br />", $res['cpu']['cache']);
            if (false !== is_array($res['cpu']['bogomips'])) $res['cpu']['bogomips'] = implode("<br />", $res['cpu']['bogomips']);
        }
        // NETWORK
        // UPTIME
        if (false === ($str = @file("/proc/uptime"))) return false;
        $str = explode(' ', implode("", $str));
        $str = trim($str[0]);
        $min = $str / 60;
        $hours = $min / 60;
        $days = floor($hours / 24);
        $hours = floor($hours - ($days * 24));
        $min = floor($min - ($days * 60 * 24) - ($hours * 60));
        if ($days !== 0) $res['uptime'] = $days."天";
        if ($hours !== 0) $res['uptime'] .= $hours."小时";
        $res['uptime'] .= $min."分钟";
        // MEMORY
        if(false === ($str = @file("/proc/meminfo"))) return false;
        $str = implode("", $str);
        preg_match_all("/MemTotal\s{0,}\:+\s{0,}([\d\.]+).+?MemFree\s{0,}\:+\s{0,}([\d\.]+).+?Cached\s{0,}\:+\s{0,}([\d\.]+).+?SwapTotal\s{0,}\:+\s{0,}([\d\.]+).+?SwapFree\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buf);
        preg_match_all("/Buffers\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buffers);
        $res['mem_total'] = round($buf[1][0]/1024, 2);
        $res['mem_free'] = round($buf[2][0]/1024, 2);
        $res['mem_buffers'] = round($buffers[1][0]/1024, 2);
        $res['mem_cached'] = round($buf[3][0]/1024, 2);
        $res['mem_used'] = $res['mem_total']-$res['mem_free'];
        $res['mem_percent'] = (floatval($res['mem_total'])!=0)?round($res['mem_used']/$res['mem_total']*100,2):0;
        $res['mem_real_used'] = $res['mem_total'] - $res['mem_free'] - $res['mem_cached'] - $res['mem_buffers']; //真实内存使用
        $res['mem_real_free'] = $res['mem_total'] - $res['mem_real_used']; //真实空闲
        $res['mem_real_percent'] = (floatval($res['mem_total'])!=0)?round($res['mem_real_used']/$res['mem_total']*100,2):0; //真实内存使用率
        $res['mem_cached_percent'] = (floatval($res['mem_cached'])!=0)?round($res['mem_cached']/$res['mem_total']*100,2):0; //Cached内存使用率
        $res['swap_total'] = round($buf[4][0]/1024, 2);
        $res['swap_free'] = round($buf[5][0]/1024, 2);
        $res['swap_used'] = round($res['swap_total']-$res['swap_free'], 2);
        $res['swap_percent'] = (floatval($res['swap_total'])!=0)?round($res['swap_used']/$res['swap_total']*100,2):0;
        // LOAD AVG
        if (false === ($str = @file("/proc/loadavg"))) return false;
        $str = explode(' ', implode("", $str));
        $str = array_chunk($str, 4);
        $res['load_avg'] = implode(' ', $str[0]);
        return $res;
    }
}

