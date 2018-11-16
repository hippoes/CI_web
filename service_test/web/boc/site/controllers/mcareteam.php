<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcareteam extends My_Controller
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
		$banner = $this->banners->get_one(array('id'=>8,'cid'=>18,'audit'=>1),'photo,photo1');
		$data['banner'] = $banner;
		
		//专业护理介绍
		$care_introduce = $this->page->get_one(array('id'=>3,'cid'=>22),'content,photo,icon1');
		$data['introduce'] = $care_introduce;
		
		//护理团队列表
		$careteam_lists = $this->infos->get_all(array('cid'=>38,'audit'=>1),'id,title,content,photo,outline');
		foreach($careteam_lists as $k=>$v){
			$outline = explode('##',$v['outline']);
			unset($outline[0]);
			$careteam_lists[$k]['outline'] = $outline;
		}
		$data['careteam_lists'] = $careteam_lists;

		// seo
		$data['header']=header_seoinfo(14,0);
		$data['nav'] = 14;
		// echo "<pre>";
		// var_dump($careteam_lists);
		// echo "</pre>";
		$this->load->view('m/mcareteam',$data);
	}
}