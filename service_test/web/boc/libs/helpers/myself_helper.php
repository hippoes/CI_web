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