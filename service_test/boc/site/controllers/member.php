<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MY_Controller {

	protected $limit = 15;

	function __construct(){
		parent::__construct();
		$this->load->model('member_model','member');
		$this->load->model('wxelement_model','wxelement');
		$this->load->model('Memberlist_model','memberlist');
		$this->load->model('userdel_model','userdel');
		$this->lang->load('my');
	}

	public function index(){
		$data['header']['title'] = '会员列表';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';

        $list = $this->memberlist->get_count_all();
        $member_list = $this->member->get_count_all();

//        echo '<pre>';
//        var_dump($member_list);
//        echo '<pre>';
        if(empty($list)){
            $this->userlist();
            $this->userinfo();
//            $data['openidlist'] = 'getdata';
        }elseif(empty($member_list)){
            $this->userinfos();
        }else{
            $db_userlist = $this->member->get_list($list);
            $data['userinfos'] = $db_userlist;
        }
        $this->load->view('member/member_list',$data);

	}

    // 第一次加载用户openid
	public function userlist(){
        $list = $this->memberlist->get_count_all();
        if(empty($list)) {
            $access_token = $this->access_token;
            $userlist = get_userlist($access_token);

            echo '用户列表加载中……<br/>';
            foreach ($userlist['data']['openid'] as $k => $v) {
                $res = $this->memberlist->find_one($v,'openid');

                if($res){
                    $this->userinfo();
                    break;
                }
                if(empty($res)){
                    // 添加用户列表数据
                    $res = $this->memberlist->create_data($v);
                    if (empty($res)) {
                        // 添加失败 返回openid
                        $error_arrlist[] = $v;
                    } else {
                        echo '用户列表加载,当前进度：' . ($k+1) . '/' . $userlist['count'] . '<br/>';
                    }
                }

            }
            echo '用户列表加载完毕，用户总数：' . $userlist['count'] . '<br/>';
//            exit;
        }
    }
    // 第一次加载用户详细信息
	public function userinfos(){
        $this->limit = $this->memberlist->get_count_all();
        $db_userlist = $this->member->get_list($this->limit);
        // 第一次加载用户详细信息
        if(empty($db_userlist)){
            $access_token = $this->access_token;
            $openidlist = $this->memberlist->get_list($this->limit,'','','','openid');

            echo '用户详细信息加载中……<br/>';
            foreach($openidlist as $k=>$v){
                $userinfos = get_userinfo($access_token,$v['openid'],'zh_CN');
                $userinfos['tagid_list'] = implode(',',$userinfos['tagid_list']);
                // 添加用户详细信息数据
                $result = $this->member->create_data($userinfos);
                if(empty($result)){
                    // 添加失败 返回openid
                    $error_arrinfos[] = $userinfos['openid'];
                }
                echo '用户详细信息加载,当前进度：'.$k.'/'.count($openidlist).'<br/>';
            }
            echo '用户详细信息加载完毕，用户总数：'.count($openidlist).'<br/>';
        }
    }

	public function add(){
		$data['header']['title'] = '添加用户';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';


		// show_404();
		$this->load->view('member/member_add',$data);
	}

	public function del(){
		$data['header']['title'] = '删除用户';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';
		$del_userlist = $this->userdel->get_list($this->limit);
		$data['del_userlist'] = $del_userlist;
		
		// echo "<pre>";
		// var_dump($del_userlist);
		// echo "</pre>";

		// show_404();
		$this->load->view('member/member_del',$data);
	}

	public function browse(){
		$data['header']['title'] = '浏览记录';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';


		// show_404();
		$this->load->view('member/member_browse',$data);
	}

	public function show(){
		$data['header']['title'] = '查看用户';
		$data['header']['tags'] = '月子会所,月子,月子中心,坐月子,月子中心加盟,月子会所加盟,Hibaby母婴健康,Hibaby,青岛凯贝姆,青岛Hibaby,凯贝姆,月子护理,月子服务,产后康复,月子餐,北京月子中心';
		$data['header']['intro'] = 'Hibaby”是国内领先的母婴健康服务品牌，拥有临床经验丰富的妇、产、儿、中医科专家医生及资深护理团队。我们十数年专注于母婴健康领域，致力于为中国家庭提供高品质的孕期护理、月子期休养、新生儿护理、产后康复等一体化服务。';

		$id = $this->input->get('id');
		$userinfo = $this->member->get_one(array('id'=>$id));
		if(empty($userinfo)){
			$userinfo = $this->userdel->get_one(array('id'=>$id));
		}
		$data['userinfo'] = $userinfo;
		// show_404();
		$this->load->view('member/member_show',$data);	
	}

	// 修改用户状态
	public function change_status(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		if(!empty($id) && ($status==2 || $status==1)){
			$res = $this->member->update(array('status'=>$status),array('id'=>$id));
		}
		echo $res;
	}

	// 删除用户
	public function member_del(){
		$id = $this->input->post('id');
		if(!empty($id)){
			$array = explode(',',$id);
			foreach($array as $v){
				$status = $this->member->get_one(array('id'=>$v),'*');
				if(empty($status['status'])  || $status['status'] == '1'){
					echo false;
					exit;
				}else{
					$this->userdel->create_data($status);
				}
			}

			$res = $this->member->del($array,array('status'=>2));
			if($res){
				echo true;
				exit;
			}else{
				echo false;
				exit;
			}
		}
	}
	// 还原用户
	public function restore(){
		$id = $this->input->post('id');
		if(!empty($id)){
			$array = explode(',',$id);
			foreach($array as $v){
				$data = $this->userdel->get_one(array('id'=>$v),'*');
				if(empty($data['status'])  || $data['status'] == '2'){
					unset($data['deltime']);
					$res = $this->member->create_data($data);
					if(empty($res)){
						echo false;
						exit;
					}else{
						$result[] = $this->userdel->del($v,array('status'=>2));
					}
				}
			}
			if(!in_array('0',$result)){
				echo true;
				exit;
			}
			
		}
	}

	// 获取最新用户
	public function member_new(){
		// 列表中最后一条openid
		$lastdata = $this->memberlist->get_list('1','0','id desc','','id,openid');
		$lastopenid = $lastdata['0']['openid'];
		// 查询 access_token  
		$res = $this->wxelement->get_all_limit("",'id,access_token,getuser_lasttime',1,'id desc');
		$id = $res['0']['id'];
		$access_token = $res['0']['access_token'];
		$lasttime = $res['0']['getuser_lasttime'];

		// 获取用户列表接口 500次/天
		if($lasttime+2700 > time()){
			echo '接口限制，请在 '.date('Y-m-d H:i:s',($lasttime+2700)).' 时获取最新列表';
			exit;
		}else{
			// 更新获取时间
			$this->wxelement->update(array('getuser_lasttime'=>time()),array('id'=>$id));
			// 获取最新会员列表
			$userlist = get_userlist($access_token,$lastopenid);
			// 判断是否存在新会员
			if(!empty($userlist['data'])){
				foreach($userlist['data']['openid'] as $k=>$v){
					$userinfo[$k] = get_userinfo($access_token,$v,'zh_CN');
					$userinfo[$k]['tagid_list'] = implode(',',$userinfo[$k]['tagid_list']);
					$result = $this->member->create_data($userinfo[$k]);
					$res = $this->memberlist->create_data($v);
					if(empty($result)){
						// 添加失败 返回openid 
						$error_arrinfos[] = $userinfos['openid'];
					}
				}
				if($result && $res){
					echo "获取成功!";
				}
			}else{
				echo "暂无最新会员!";
			}
		}

		
	}

}

?>