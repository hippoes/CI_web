<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mexperteam extends My_Controller
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
		$banner = $this->banners->get_one(array('id'=>7,'cid'=>17,'audit'=>1),'photo,photo1');
		$data['banner'] = $banner;
		
		//专家医生介绍
		$expert_introduce = $this->page->get_one(array('id'=>2,'cid'=>21),'content,photo,icon1');
		$data['introduce'] = $expert_introduce;
		
		//专家医生列表
		$expert_lists = $this->infos->get_all(array('cid'=>37,'audit'=>1),'id,title,content,photo,outline');
		foreach($expert_lists as $k=>$v){
			$outline = explode('##',$v['outline']);
			unset($outline[0]);
			$expert_lists[$k]['outline'] = $outline;
		}
		$data['expert_lists'] = $expert_lists;

		// seo
		$data['header']=header_seoinfo(13,0);
		$data['nav'] = 14;
		// echo "<pre>";
		// var_dump($expert_lists);
		// echo "</pre>";
		$this->load->view('m/mexperteam',$data);
	}
}