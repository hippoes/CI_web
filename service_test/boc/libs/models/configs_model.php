<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configs_model extends MY_Model {

	protected $table = 'configs';

	/**
	 * 获取category分类一组数据
	 * @param  string $category 分类
	 * @return array 
	 */
	public function get_cate($category)
	{
		$query = $this->db->select('key,value,intor,label')
			->where('category',$category)
			->from('configs')
			->order_by('sort_id')
			->get();
		return $query->result_array();
	}

	/**
	 * 获取分类下的某个键值的值
	 * @param  string $category 分类
	 * @param  string $key      键值
	 * @return string / false
	 */
	public function get($category,$key)	
	{
		$query = $this->db->select('value')
			-> where(array('category'=>$category,'key'=>$key))
			-> from('configs')
			-> get();
		if ($row = $query->row_array()) {
			return $row['value'];
		}else{
			return FALSE;
		}
	}

	// get的同名函数
	public function get_config($category,$key)	
	{
		if (!$this->db) {
			return false;
		}
		// return "";
		$query = $this->db->select('value')
			-> where(array('category'=>$category,'key'=>$key))
			-> from('configs')
			-> get();
		if ($row = $query->row_array()) {
			return $row['value'];
		}else{
			return FALSE;
		}
	}

	/**
	 * 修改配置
	 * @param string $category 分类
	 * @param string $key      键值
	 * @param string $value    值
	 */
	public function set($category,$key,$value)
	{
		$this->db->set('value',$value)
			-> where(array('category'=>$category,'key'=>$key))
			-> update('configs');
		return $this->db->affected_rows();
	}

	// 对 MY_Model->create 重写
	public function create($category,$key,$value)
	{
		if ($this->db->having(array('category ='=>$category,'key ='=>$key))) {
			return false;
		}else{
			$this->db->set(array('category'=>$category,'key'=>$key,'value'=>$value))
			-> insert('configs');
			return $this->db->affected_rows();
		}
	}

// *********** 2018 09 05 **********
	// 添加一条数据
	public function create_data($data){
		if(!empty($data)){
			$data['add_time'] = time();

			$this->db->set($data)-> insert('configs');
			return $this->db->affected_rows();
		}
	}

	// 获取总条数
	public function get_count(){
		
		$count = count($this->db->select('id')->from('configs')->get()->result_array());
		return $count;
	}

	// 获取最后一条数据的 id
	public function last_id(){
		$id = $this->db->select('id')->from('configs')->order_by('id','desc')->limit(1)->get()->result_array();
		return $id['0']['id'];
	}

	// 修改系统配置 
	public function edit_data($data,$id){
		if(!empty($data)){
			$this->db->set($data)->where(array('id'=>$id))->update('configs');
			return $this->db->affected_rows();
		}
	}

	// 查询系统配置
	public function select_data($id){
		$query = $this->db->select('web_name,web_keyword,web_description,web_copyright,web_record,web_statistical,web_commun,wx_appid,wx_appsecret')
			->where('id',$id)
			->from('configs')
			->get();
		return $query->result_array();
	}

}

/* End of file config_model.php */
/* Location: .//home/http/bocms/adminer/models/config_model.php */