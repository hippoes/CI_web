<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MY_Controller {

	protected $limit = 15;
	protected $rules = array(
		"template_add" => array(
			array(
				'field'   => 'title', 
				'label'   => '标题', 
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'template_id', 
				'label'   => '模板id', 
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'industry', 
				'label'   => '行业', 
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'content', 
				'label'   => '模板字段', 
				'rules'   => 'trim|required'
			)
		)
	);

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->model('template_model','template');
		$this->load->library('pagination');
	}

	public function index(){
		$data['header']['title'] = '消息模板列表';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';
		// $this->template->get_list();

		$count = $this->template->get_count_all();
		$res = $this->template->get_all('','id,title,template_id,industry,content,sort_id,status,addtime');
		$data['template_list'] = $res;
		$data['count'] = $count;
//        echo '<pre>';
//        var_dump($res);
//        echo '</pre>';

		$this->load->view('template/template_list',$data);
	}

	public function add(){
		$data['header']['title'] = '新增消息模板';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';
		
		// show_404();
		$this->load->view('template/template_add',$data);
	}

	public function edit(){
		$data['header']['title'] = '修改消息模板';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';
		$id = $this->input->get('id');
		$post = $this->input->post();

		if(!empty($post)){
			$res = $this->form_validation->set_rules($this->rules['template_add']);
		
	        if ($this->form_validation->run() == FALSE)
	        {
	       		echo '<script>alert("修改失败")</script>';
	        	$this->load->view('template',$data);
	        }else{
		        $datas = $post;
	        	$template = $this->template->get_one(array('id'=>$datas['id']),'*');
	        	for($i=1;$i<=8;$i++){
	        		if(!empty($template['keywords'.$i])){
	        			$datas['keywords'.$i] = '';
	        		}
	        	}
				if(!empty($datas['content'])){
					$field = explode('##',$datas['content']);
					foreach($field as $k=>$v){
						if($k > 8){
							echo '<script>alert("字段数超过容量");</script>';
							exit;
						}else{
							$datas['keywords'.($k+1)] = $v;
						}
					}
				}
		        $res = $this->template->update($datas,array('id'=>$datas['id']));
		       	if($res){
                    echo '<script>alert("修改成功")</script>';
                    echo "<script>var index = parent.layer.getFrameIndex(window.name);parent.$('.btn-refresh').click();parent.layer.close(index);</script>";
		      	}else{
                    echo '<script>alert("修改失败")</script>';
                    echo "<script>var index = parent.layer.getFrameIndex(window.name);parent.$('.btn-refresh').click();parent.layer.close(index);</script>";
		       	}
	        }

		}else{
			if(!empty($id)){
				$template = $this->template->get_one(array('id'=>$id),'id,title,template_id,industry,content');
				$data['template'] = $template;
			}
			// show_404();
			$this->load->view('template/template_edit',$data);
		}
		
		
	}

	public function template_add(){
		$data['header']['title'] = '添加模板';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';

		$post = $this->input->post();

		if(empty($post)){
			// show_404();
			$this->load->view('template/template_add',$data);
		}else{
			
			$res = $this->form_validation->set_rules($this->rules['template_add']);
		
	        if ($this->form_validation->run() == FALSE)
	        {
	       		echo '<script>alert("提交失败")</script>';
	        	$this->load->view('template/template_add',$data);
	        }else{
		        $datas = $post;

				if(!empty($datas['content'])){
					$field = explode('##',$datas['content']);
					foreach($field as $k=>$v){
						$datas['keywords'.($k+1)] = $v;
					}
				}
		        $res = $this->template->create_data($datas);
		       	if($res){
		       	    echo '<script>alert("添加成功")</script>';
                    echo "<script>var index = parent.layer.getFrameIndex(window.name);parent.$('.btn-refresh').click();parent.layer.close(index);</script>";
		      	}else{
		       	    echo '<script>alert("添加失败")</script>';
                    echo "<script>var index = parent.layer.getFrameIndex(window.name);parent.$('.btn-refresh').click();parent.layer.close(index);</script>";
		       	}
	        }
			
		}
	}

	// 修改模板状态
	public function change_status(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		if(!empty($id) && ($status==2 || $status==1)){
			$res = $this->template->update(array('status'=>$status),array('id'=>$id));
		}
		echo $res;
	}

	// 删除模板
	public function member_del(){
		$id = $this->input->post('id');
		if(!empty($id)){
			$array = explode(',',$id);
			foreach($array as $v){
				$status = $this->template->get_one(array('id'=>$v),'*');
				if(empty($status['status'])  || $status['status'] == '1'){
					echo false;
					exit;
				}
			}

			$res = $this->template->del($array,array('status'=>2));
			if($res){
				echo true;
				exit;
			}else{
				echo false;
				exit;
			}
		}
	}


}

?>