<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rooms extends My_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("banners_model",'banners');
		$this->load->model("page_model",'page');
		$this->load->model("infos_model",'infos');

	}

	public function index()
	{
		//banner
		$banner = $this->banners->get_one(array('id'=>9,'cid'=>19,'audit'=>1),'photo,photo1');
		$data['banner'] = $banner;
		
		//月子房型介绍
		$care_introduce = $this->page->get_one(array('id'=>4,'cid'=>23),'content');
		$data['introduce'] = $care_introduce;
		
		//月子房型列表
		$rooms_lists = $this->infos->get_all(array('cid'=>26,'audit'=>1),'id,title,content,photo,pics');
		foreach($rooms_lists as $k=>$v){
			$pics = explode(',',$v['pics']);
			$rooms_lists[$k]['pics'] = array_slice($pics,0,3);
		}
		$data['rooms_lists'] = $rooms_lists;

		// seo
		$data['header']=header_seoinfo(15,0);
		$data['nav']='15';
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		$this->load->view('rooms',$data);
	}
}