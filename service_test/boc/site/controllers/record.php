<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Record extends MY_Controller {

	protected $limit = 15;
	protected $rules = array(
		"message_add" => array(
			array(
				'field'   => 'template_id',
				'label'   => '模板id',
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'first_data',
				'label'   => '消息标题',
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'remark_data',
				'label'   => '备注信息',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'sub_ids',
				'label'   => '选泽用户id',
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'redirect_url',
				'label'   => '详情链接',
				'rules'   => 'trim'
			)
		),
		'message_edit' => array(
			array(
				'field'   => 'first_data',
				'label'   => '消息标题',
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'remark_data',
				'label'   => '备注信息',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'sub_ids',
				'label'   => '选泽用户id',
				'rules'   => 'trim|required'
			)
		)
	);
	function __construct(){
		parent::__construct();
		$this->load->model('template_model','template');
		$this->load->model('message_model','message');
		$this->load->model('member_model','member');
	}
	// 待发送消息列表
	public function pending(){
		$data['header']['title'] = '待发送消息列表';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';
		$count = $this->message->get_count_all();
		$res = $this->message->get_all(array('status'=>1),'id,template_id,sub_ids,sub_usernames,addtime');
		$data['count'] = $count;

		$member_count = $this->member->get_count_all();

        if(!empty($res)){
            foreach($res as $k=>$v){
                $template_title = $this->template->get_one(array('id'=>$v['template_id']),'title,content');
                $res[$k]['template_title'] = $template_title['title'];
                $res[$k]['template_content'] = $template_title['content'];
                // $count_ids = empty(trim($v['sub_ids'],',')) ? '0' :count(explode(',',trim($v['sub_ids'],',')));

                if(empty($v['sub_ids']) || $v['sub_ids']== ','){
                    $count_ids = '0/'.$member_count;
                }else{
                    $count_ids = count(explode(',',trim($v['sub_ids'],',')));
                }
                $res[$k]['count_ids'] = $count_ids.'/'.$member_count;

            }
        }
//        echo "<pre>";
//        var_dump($res);
//        echo "</pre>";
		$data['message'] = $res;

		$this->load->view('record/pending',$data);
	}

	// 新增消息
	public function add(){
		$data['header']['title'] = '添加消息列表';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';

		$template = $this->template->get_all(array('status'=>1),'id,title','id desc');
		foreach($template as $k=>$v){
			$title[$v['id']] = $v['title'];
		}
		$data['template'] = $title;

		$userlist = $this->member->get_all(array('status'=>1),'id,nickname,headimgurl');
		$data['userlist'] = $userlist;
		// echo "<pre>";
		// var_dump($userlist);
		// echo "</pre>";

		$this->load->view('record/add',$data);
	}

	// 获取模板标题
	public function tempalte_detail(){
		$post = $this->input->post();

		if(!empty($post)){
			$id = $post['id'];
			for($i=1;$i<=8;$i++){
				$fields[] = 'keywords'.$i;
			}
			$detail = $this->template->get_one(array('id'=>$id,'status'=>1),$fields);
		}
		foreach($detail as $k=>$v){
			if(!empty($v)){
				$field[] = $v;
			}
		}
        echo urldecode(json_encode($field));
	}

	// 保存待发送消息模板
	public function save_module(){
		$post = $this->input->post();
//        echo "<pre>";
//        var_dump($post);
//        echo "</pre>";
//        exit;
		if(!empty($post)){
			$res = $this->form_validation->set_rules($this->rules['message_add']);
			if ($this->form_validation->run() == FALSE)
	        {
	       		echo '<script>alert("提交失败，请联系管理员")</script>';
	        	$this->load->view('record/pending',$data);
	        }else{
	        	$datas = $post;
	        	// 根据 id 查询用户名，拼接后插入字段 sub_usernames
	        	$ids = explode(',',trim($datas['sub_ids'],','));

	        	$first_name = $this->member->get_one(array('id'=>$ids[0],'status'=>'1'),'nickname');
	        	$last_name = $this->member->get_one(array('id'=>$ids[count($ids)-1],'status'=>'1'),'nickname');

	        	$sub_usernames = '##'.$first_name['nickname'].' …… ##'.$last_name['nickname'];

	        	$datas['sub_usernames'] = $sub_usernames;
	        	$content = '';
	        	for($i=0;$i<8;$i++){
	        		if(array_key_exists('keywords'.$i,$datas)){
	        			if(!empty($datas['keywords'.$i])){
	        				$content = $content."##".$datas['keywords'.$i];
	        			}
	        		}
	        	}
	        	$datas['content'] = $content;
				$res = $this->message->create_data($datas);
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
	// 模板修改
	public function edit_module(){
		$post = $this->input->post();
//        echo "<pre>";
//        var_dump($post);
//        echo "</pre>";
//        exit;
		if(!empty($post)){
			$res = $this->form_validation->set_rules($this->rules['message_edit']);
			if ($this->form_validation->run() == FALSE)
	        {
	       		echo '<script>alert("提交失败，请联系管理员")</script>';
	        }else{
	        	$datas = $post;
	        	// 根据 id 查询用户名，拼接后插入字段 sub_usernames
	        	$ids = explode(',',trim($datas['sub_ids'],','));

	        	$first_name = $this->member->get_one(array('id'=>$ids[0],'status'=>'1'),'nickname');
	        	$last_name = $this->member->get_one(array('id'=>max($ids),'status'=>'1'),'nickname');

	        	$sub_usernames = '##'.$first_name['nickname'].' …… ##'.$last_name['nickname'];
	        	$datas['sub_usernames'] = $sub_usernames;

				$content = '';
	        	for($i=0;$i<8;$i++){
	        		if(array_key_exists('keywords'.$i,$datas)){
	        			if(!empty($datas['keywords'.$i])){
	        				$content = $content."##".$datas['keywords'.$i];
	        			}
	        		}
	        	}
	        	$datas['content'] = $content;
	        	$data['edit_time'] = time();
//				 echo "<pre>";
//				 var_dump($datas);
//				 echo "</pre>";
//				 exit;
				$res = $this->message->update($datas,array('id'=>$datas['id']));

				if($res){
		       		echo '<script>alert("修改成功")</script>';
                    echo "<script>var index = parent.layer.getFrameIndex(window.name);parent.$('.btn-refresh').click();parent.layer.close(index);</script>";
                }else{
		      		echo '<script>alert("修改失败")</script>';
                    echo "<script>var index = parent.layer.getFrameIndex(window.name);parent.$('.btn-refresh').click();parent.layer.close(index);</script>";
                }
	        }
		}
	}

	// 消息编辑
	public function edit(){
		$data['header']['title'] = '编辑消息';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';

		$id = $this->input->get('id');
		$message = $this->message->get_one(array('id'=>$id));
		// 获取模板信息
		if(!empty($message['template_id'])){
			$template_id = $message['template_id'];
			$template = $this->template->get_one(array('id'=>$template_id),'title,content');
		}

        // 获取所有用户列表
        $sub_ids = trim($message['sub_ids'],',');
        if(!empty($sub_ids)){
			$ids = explode(',',trim($message['sub_ids'],','));
			$userlists = $this->member->get_all(array('status'=>1),'id,nickname,headimgurl');
			foreach($userlists as $k=>$v){
				if(in_array($v['id'],$ids)){
					$userinfos[$k]['id'] = $v['id'];
					$userinfos[$k]['nickname'] = $v['nickname'];
					$userinfos[$k]['headimgurl'] = $v['headimgurl'];
					unset($userlists[$k]);
				}
			}
		}else{
			$userlists = $this->member->get_all(array('status'=>1),'id,nickname,headimgurl');
			$userinfos = '';
		}

		// 模型名称
		$message['template_title'] = $template['title'];
		$field = explode('##',trim($template['content'],'##'));
		$colors = explode('$$',trim($message['font_colors'],'$$'));

		$message['first_color'] = $colors['0'];
		$message['remark_color'] = $colors[count($colors)-1];

		unset($colors['0']);
        $colors = array_values($colors);
		unset($colors[count($colors)-1]);
		$colors = array_values($colors);
//        echo "<pre>";
//        var_dump($colors);
//        echo "</pre>";
		foreach($field as $k=>$v){
			$fields[$k]['name'] = $v;
			$fields[$k]['value'] = $message['keywords'.$k];
			$fields[$k]['field'] = 'keywords'.$k;
			$fields[$k]['color'] = $colors[$k];
		}
		$message['fields'] = $fields;
		$data['message'] = $message;
		$data['userinfos'] = $userinfos;
		$data['userlists'] = $userlists;

		$this->load->view('record/edit',$data);
	}

	// 模板中添加用户
	public function edit_adduser(){
		$ids = $this->input->post('ids');
		$count_ids = count(explode(',',trim($ids,',')));
		$message_id = $this->input->post('message_id');
		// 数据表中原 用户ids，用户名字符串
		$message = $this->message->get_one(array('id'=>$message_id,'status'=>1),'sub_ids,sub_usernames');
		// 将新增用户id拼接
		$data['sub_ids'] = trim($message['sub_ids'],',').','.$ids;

		// 获取最大 id 的用户名称
		$last_id = max(explode(',',$data['sub_ids']));

		$last_name = $this->member->get_one(array('id'=>$last_id),'nickname');

		$sub_name = explode('##',trim($message['sub_usernames'],'##'));
		$data['sub_usernames'] = '##'.$sub_name[0].'##'.$last_name['nickname'];

		$res = $this->message->update($data,array('id'=>$message_id));
		if($res){
			echo true;
			exit;
		}else{
			echo false;
			exit;
		}
	}

	// 编辑消息删除用户
	public function edit_deluser(){
		$ids = $this->input->post('ids');
		$array_id = explode(',',trim($ids,','));
		$message_id = $this->input->post('message_id');

		// 查询消息中的用户列表id,名称
		$message = $this->message->get_one(array('id'=>$message_id,'status'=>'1'),'sub_ids,sub_usernames');
		$sub_ids = explode(',',trim($message['sub_ids'],','));

		foreach($array_id as $v){
			if(in_array($v,$sub_ids)){
				$key = array_search($v,$sub_ids);
				unset($sub_ids[$key]);
			}
		}
		if(!empty($sub_ids)){
			$last_id = max($sub_ids);
			$last_name = $this->member->get_one(array('id'=>$last_id),'nickname');
			$sub_name = explode('##',trim($message['sub_usernames'],'##'));

			$data['sub_usernames'] = '##'.$sub_name[0].'##'.$last_name['nickname'];
			$data['sub_ids'] = implode(',',$sub_ids).',';

			$res = $this->message->update($data,array('id'=>$message_id));
			if($res){
				echo true;
				exit;
			}else{
				echo false;
				exit;
			}
		}else{
			echo "null";
		}

	}

	// 消息预览
	public function show(){
		$id = $this->input->get('id');
		$template_id = $this->input->get('template_id');
		$message = $this->message->get_one(array('id'=>$id,'status'=>1),'template_id,first_data,remark_data,sub_ids,redirect_url,content,font_colors');
		$template = $this->template->get_one(array('id'=>$template_id),'title,content');
		$key = explode('##',trim($template['content'],'##'));
		$value = explode('##',trim($message['content'],'##'));

        $colors = explode('$$',trim($message['font_colors'],'$$'));
        $data['first_color'] = $colors['0'];
        $data['remark_color'] = $colors[count($colors)-1];
        unset($colors['0']);
        $colors = array_values($colors);
        unset($colors[count($colors)-1]);
        $colors = array_values($colors);

		foreach($key as $k=>$v){
			$content[$k]['keyword'] = $v;
		}
		foreach($value as $k=>$v){
            $content[$k]['value'] = $v;
            $content[$k]['color'] = $colors[$k];
		}

//		 echo "<pre>";
//        var_dump($content);
//		 var_dump($message);
//		 var_dump($template);
//		 echo "</pre>";

		$data['message'] = $message;
		$data['template'] = $template;
		$data['content'] = $content;
		$this->load->view('record/show',$data);
	}

	// 删除待发送消息
	public function pendmessage_del(){
		$id = $this->input->post('id');
		if(!empty($id)){
			$array = explode(',',$id);
			// 删除一个或者一组id
			$res = $this->message->del($array,array('status'=>1));
			if($res){
				echo true;
				exit;
			}else{
				echo false;
				exit;
			}
		}
	}

	// 查询历史消息
	public function history(){
		$data['header']['title'] = '已发送消息列表';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';

		$this->load->view('record/history',$data);
	}
}

?>