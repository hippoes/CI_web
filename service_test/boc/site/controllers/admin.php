<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('manager_model','manager');
        $this->load->library('pagination');
	}
	protected $limit =20;
	protected $rules = array(
		"admin_add" => array(
			array(
				'field'   => 'username', 
				'label'   => '管理员', 
				'rules'   => 'trim|required|alpha_dash|strtolower|callback_uname_check'
				// 验证用户名是否存在 callback_uname_check
			),
			array(
				'field'   => 'password', 
				'label'   => '密码', 
				'rules'   => 'trim|required|min_length[6]|matches[repassword]'
			),
			array(
				'field'   => 'repassword', 
				'label'   => '确认密码', 
				'rules'   => 'trim|required|min_length[6]'
			),
			array(
				'field'   => 'email', 
				'label'   => '邮件地址', 
				'rules'   => 'trim|valid_email'
			),
			array(
				'field'   => 'phone', 
				'label'   => '手机', 
				'rules'   => 'trim|numeric'
			),
			array(
				'field'   => 'remark', 
				'label'   => '备注信息', 
				'rules'   => 'trim|htmlspecialchars'
			)
		)
	);

	public function admin_list(){
		$data['header']['title'] = '管理员列表';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';

		$count = $this->manager->get_count_all();
		$res = $this->manager->get_list($this->limit,'','','','id,username,nickname,group_id,email,phone,status,addtime');

		// $config['base_url'] = site_url('admin/admin_list');
		// $config['total_rows'] = $count;
		// $config['per_page'] = $this->limit;
		
		// $this->pagination->initialize($config);
		// $pages = $this->pagination->create_links();
		// $data['pages'] = $pages;
		// 
		$data['admin_list'] = $res;
		$data['count'] = $count;


		// show_404();
		$this->load->view('admin/list',$data);
	}

	public function admin_add(){
		$data['header']['title'] = '添加管理员';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';

		$post = $this->input->post();
		if(empty($post)){
			// show_404();
			$this->load->view('admin/admin_add',$data);
		}else{
			$res = $this->form_validation->set_rules($this->rules['admin_add']);
		
	        if ($this->form_validation->run() == FALSE)
	        {
	       		echo '<script>alert("提交失败")</script>';
	        	$this->load->view('admin/admin_add',$data);
	        }else{
		        $data = $post;
		        unset($data['repassword']);
		        $data['addtime'] = time();

		        $res = $this->manager->create_data($data);
		       	if($res){
		       		echo '<script>alert("添加成功")</script>';
		      	}else{
		      		echo '<script>alert("添加失败")</script>';
		       	}
	        }
			
		}
	}

	public function admin_edit(){
		$data['header']['title'] = '修改管理员信息';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';

		$post = $this->input->post();
		$data = $post;
		if(!empty($data)){
			if(empty($data['password'])){
				unset($data['password']);
				unset($data['repassword']);
			}else{
				unset($data['repassword']);
			}

			$res = $this->manager->update($data,array('id'=>$data['id']));
			if($res){
		      	echo '<script>alert("修改成功")</script>';
			}else{
		      	echo '<script>alert("修改失败")</script>';
			}
		}else{
			$id = $this->input->get('id');
			$res = $this->manager->get_one(array('id'=>$id),'id,username,nickname,group_id,sex,email,phone,status,addtime,remark');
			$data['admin_info'] = $res;
			$this->load->view('admin/admin_edit',$data);
		}
	}

	// 修改管理员状态
	public function change_status(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		if(!empty($id) && ($status==2 || $status==1)){
			$res = $this->manager->update(array('status'=>$status),array('id'=>$id));
		}
		echo $res;
	}

	// 删除管理员
	public function admin_del(){
		$id = $this->input->post('id');
		if(!empty($id)){
			$array = explode(',',$id);
			foreach($array as $v){
				$status = $this->manager->get_one(array('id'=>$v),'status');
				if($status['status'] == '1'){
					echo false;
					exit;
				}
			}

			$res = $this->manager->del($array,array('status'=>2));
			if($res){
				echo true;
				exit;
			}else{
				echo false;
				exit;
			}
			
		}
	}

	// 验证username
	public function uname_check($str)
	{
		$res = $this->manager->get_list('','','','','username');
		if(!empty($res)){
			foreach($res as $v){
				$array[] = $v['username'];
			}
		}else{
			$array[] = '';
		}
		if(in_array($str,$array)){
			$this->form_validation->set_message('uname_check', '<span class="Validform_checktip Validform_wrong">'.$str.' 已经被使用了。</span>');
			return FALSE;
		}else{
			return TRUE;
		}
	}
}

?>