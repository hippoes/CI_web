<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dietary extends My_Controller
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
		$banner = $this->banners->get_one(array('id'=>11,'cid'=>29,'audit'=>1),'photo,photo1');
		$data['banner'] = $banner;
		
		//月子膳食介绍
		$dietary_introduce = $this->page->get_one(array('id'=>5,'cid'=>30),'content');
		$data['introduce'] = $dietary_introduce;
		
		//膳食特色
		$dietary_features = $this->page->get_one(array('id'=>6,'cid'=>31),'title,outline,photo');
		$foutline = explode("##",$dietary_features['outline']);
		unset($foutline[0]);
		$array = array();
		foreach($foutline as $k=>$v)
		{	
			$foutline2 = explode("$$",$v);
			$array[] = $foutline2;
		}
		$dietary_features['outline'] = $array;
		$data['features'] = $dietary_features;

		//膳食特色列表
		$dietary_lists = $this->infos->get_all(array('cid'=>32,'audit'=>1),'title,field1,content,photo');
		$data['dietary_lists'] = $dietary_lists;

		//营养评估
		$assessment = $this->page->get_one(array('id'=>7,'cid'=>33),'content,photo');
		$data['assessment'] = $assessment;

		//月子厨房
		$kitchen = $this->page->get_one(array('id'=>8,'cid'=>34),'title,outline,photo');
		
		$outline = explode('##',$kitchen['outline']);
		unset($outline[0]);
		$kitchen['outline'] = $outline;

		$data['kitchen'] = $kitchen;

		//膳食特色列表
		$kitchen_lists = $this->infos->get_all(array('cid'=>35,'audit'=>1),'title,content,photo');
		$data['kitchen_lists'] = $kitchen_lists;

		// seo
		$data['header']=header_seoinfo(28,0);
		$data['nav']='28';
		// echo "<pre>";
		// var_dump($array);
		// var_dump($dietary_features);
		// echo "</pre>";
		$this->load->view('dietary',$data);
	}
}