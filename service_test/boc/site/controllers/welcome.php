<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('manager_model','manager');
        $this->load->model('template_model','template');
        $this->load->model('message_model','message');
        $this->load->model('member_model','member');
        $this->load->model('Memberlist_model','memberlist');
        $this->load->model('userdel_model','userdel');

	}

	public function index()
	{
		$data['header']['title'] = 'Hibaby母婴建康';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';


        // show_404();
		$this->load->view('welcome',$data);
	}

	public function welcome_index(){
	    $data['header']['title'] = '我的桌面';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';
        // 登录用户信息
		$username = get_login_username();
        $user = $this->manager->get_one(array('username'=>$username),'login_ip,login_time,login_number');
        $data['user'] = $user;

        // 模板数量信息
        $c_template_all = $this->template->get_count_all();
        $c_template_normal = $this->template->get_count_all(array('status'=>'1'));
        $count['template'] = $c_template_normal.'/'.$c_template_all;

        // 消息数量信息
        $c_message_send = $this->message->get_count_all(array('status'=>'2'));
        $c_message_sent = $this->message->get_count_all(array('status'=>'1'));
        $count['message_send'] = $c_message_send;
        $count['message_sent'] = $c_message_sent;

        // 用户数量信息
        $c_member_all = $this->memberlist->get_count_all();
        $c_member_normal = $this->member->get_count_all(array('status'=>'1'));
        $count['member'] = $c_member_normal.'/'.$c_member_all;

        // 删除的用户信息
        $c_userdel_all = $this->userdel->get_count_all();
        $count['userdel'] = $c_userdel_all;

        // 管理员数量信息
        $c_manager_all = $this->manager->get_count_all();
        $c_manager_normal = $this->manager->get_count_all(array('status'=>'1'));
        $count['manager'] = $c_manager_normal.'/'.$c_manager_all;

        $data['count'] = $count;


		$this->load->view("welcome_index",$data);
	}
}
