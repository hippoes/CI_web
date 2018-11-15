<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('login_model','login');
        $this->load->model('manager_model','manager');
        $this->load->library('validatecode','valcode');
        $this->load->helper('captcha','captcha');
	}

	protected $username = '';

	protected $rules = array(
		"login" => array(
			array(
				'field'   => 'username', 
				'label'   => '帐号', 
				'rules'   => 'trim|required|strtolower|callback_username_check'
			),
			array(
				'field'   => 'code', 
				'label'   => '验证码', 
				'rules'   => 'trim|required|callback_code_check'
			),
			// 密码验证放在最后
			array(
				'field'   => 'password', 
				'label'   => '密码', 
				'rules'   => 'trim|required|callback_pwd_check'
			)
		)
	);

	// 登录页面
	public function index(){
		$data['header']['title'] = '后台登录';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';

		// show_404();
		$this->load->view('login/login',$data);
	}

    //验证码
	public function get_gd_code(){
        $code = $this->validatecode->getCode();
        $this->session->set_userdata('session_code',$code);
        $this->validatecode->doimg();
    }

	// 退出登录
	public function login_out(){
		$data['header']['title'] = '退出登录';

        // 删除有效登录时间
        $this->session->unset_userdata('login_time');
        $this->session->unset_userdata('login_username');

		redirect('login');
	}	

	// 登录验证
	public function check_login(){

		$res = $this->form_validation->set_rules($this->rules['login']);
		
        if ($this->form_validation->run() == FALSE)
        {
        	$data['header']['title'] = '后台登录';
        	$this->load->view('login/login',$data);
        }
        else
        {
            // 登陆成功，设置登录过期时间
            $this->session->set_userdata('login_time',time()+7200);


            $username = $this->input->post('username');
            $num = $this->manager->get_one(array('username'=>$username),'login_number');
            $number = intval($num['login_number']) + 1;
            $login_data['login_number'] = $number;
            $login_data['login_time'] = time();
            $login_data['login_ip'] = get_local_ip();

            $res = $this->manager->update($login_data,array('username'=>$username));

            $this->session->set_userdata('login_username',$username);

			redirect('welcome');
        }
	}

	public function username_check($str)
    {

    	$array = get_admin_uname();

		if(!in_array($str,$array)){
			$this->form_validation->set_message('username_check', '账号输入错误,'.$str.'用户不存在');
			return FALSE;
		}else{
			$status = get_user_status($str);
			if($status !== '1'){
				$this->form_validation->set_message('username_check', '账号'.$str.'禁止登陆');
				return FALSE;
			}
			$this->username = $str;
			return TRUE;
		}
    }

    public function pwd_check($str){
    	$username = $this->username;
    	$array = get_admin_uname();

    	if(!in_array($username,$array)){
    		$this->form_validation->set_message("pwd_check","账号错误，请联系管理员!");
    		return FALSE;
    	}else{
    		$pwd = $this->manager->get_one(array('username'=>$username),array('password'));
    	}
    	if(sha1($str) !== $pwd['password']){
    		$this->form_validation->set_message("pwd_check","密码输入错误");
    		return FALSE;
    	}else{
    		return TRUE;
    	}
    }

    public function code_check($str){
        $code = $this->session->userdata('session_code');
        if($str !== $code && $str !== 'test'){
    		$this->form_validation->set_message("code_check","验证码输入错误,test 为测试验证码");
    		return FALSE;
    	}else{
    		return TRUE;
    	}
    }
}

?>