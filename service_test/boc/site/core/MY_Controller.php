<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
/**
* MY Controller
*/

/**
 * session 
 * 
 * 添加 session
 * $this->session->set_userdata('item', 'some_value');
 * 同时也可以使用数组添加
 * $array = array('username' => 'username', 'useremail' => 'useremail');
 * $this->session->set_userdata($array);
 * 
 * 获取 session
 * $this->session->userdata('item');
 *
 * 检查 session 是否存在使用 isset() , $this->session->has_userdata()
 *
 * 删除 session  unset() , $this->session->unset_userdata('item')
 * 同时支持用数组删除 session
 * 
 */
class MY_Controller extends CI_Controller{

	protected $access_token = '';
	protected $login_time = '';

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('myself');
		$this->load->helper('language');
		$this->load->model('configs_model','configs');
		$this->load->model('wxelement_model','wxelement');

		// 判断登录是否超时
		$login_time = $this->session->userdata('login_time');

		if($login_time < time()){
			// 判断当前页面是否为登录页
			// current_url() 获取当前页面 url
			// base_url() 获取站点的根 url
			$cur_url = current_url();
			$base_url = base_url();
			$str_url = str_replace($base_url,'',$cur_url);
			$str = substr($str_url,0,strpos($str_url,'.'));
			if($str !== 'login' && $str !== 'login/index' && $str !== 'login/check_login' && $str !== 'login/get_gd_code'){
				redirect('login');
			}
		}else{
			$wx_count = $this->wxelement->get_count_all();

			if(empty($wx_count)){
                $config = $this->configs->get_count_all();
                if(empty($config)){
                    $access_token = '';
                }else{
                    // 获取 access_token 并保存
                    $id = $this->configs->last_id();
                    $cf = $this->configs->get_all(array('id'=>$id),'wx_appid,wx_appsecret');
                    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$cf[0]['wx_appid']."&secret=".$cf[0]['wx_appsecret'];
                    $access_token = get_new_access_token($url);
                    $array['access_token'] = $access_token;

                    $array['addtime'] = time();
                    $array['overdue_time'] = $array['addtime']+7200;

                    $this->db->set($array)-> insert('wxelement');
                    $res = $this->db->affected_rows();
                }
			}else{
				// 查询 access_token  
				$res = $this->wxelement->get_all_limit("",'id,access_token,addtime,overdue_time',1,'id desc');
				$access_token = $res[0]['access_token'];
				$wx_id = $res['0']['id'];
				if(time() >= $res[0]['overdue_time'] || empty($access_token)){
					// 过期重新获取
					$id = $this->configs->last_id();
					$cf = $this->configs->get_all(array('id'=>$id),'wx_appid,wx_appsecret');
					$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$cf[0]['wx_appid']."&secret=".$cf[0]['wx_appsecret'];
					$access_token = get_new_access_token($url);
					$array['access_token'] = $access_token;
					$array['addtime'] = time();
					$array['overdue_time'] = $array['addtime']+7200;
					$this->wxelement->update($array,array('id'=>$wx_id));
				}
			}
            $this->access_token = $access_token;
            $this->login_time = $login_time;
		}
		
	}

	
	function __destruct(){

		
	}
}
