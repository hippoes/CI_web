<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 微信 access_token 参数获取
 */
class Memberlist_model extends MY_Model {

	protected $table = 'wxuserlist';


	// 添加一条数据
	public function create_data($data){
		if(!empty($data)){
			$arr['openid'] = $data;
			$arr['addtime'] = time();
			$this->db->set($arr)->insert($this->table);
			return $this->db->affected_rows();
		}
	}
}

/* End of file config_model.php */
/* Location: .//home/http/bocms/adminer/models/config_model.php */