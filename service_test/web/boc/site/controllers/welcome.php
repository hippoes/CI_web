<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('banners_model','banners');
        $this->load->model('page_model','page');
        $this->load->model('links_model','links');
        $this->load->model('gallery_model','gallery');
        $this->load->model('infos_model','infos');
		
        // $this->load->model('news_model','news');
	}

	public function index()
	{
        // banner
        $banners = $this->banners->get_all(array('cid'=>2,'audit'=>1),'link,photo');
        $data['banners']=$banners;
		
		//动态新闻（dynamic） 
		//honeymoon
		$honeymoon = $this->links->get_all(array('cid'=>7,'audit'=>1),'title,link,photo');
		$data['honeymoon'] = $honeymoon;
		//dynamic_video
		$dynamic_video = $this->links->get_all(array('cid'=>8,'audit'=>1),'title,link,photo');
		$data['dynamic_video'] = $dynamic_video;
		//quality
		$quality = $this->links->get_all(array('cid'=>9,'audit'=>1),'title,link,content,photo');
		$data['quality'] = $quality;
		
		//server_box
		$server_box = $this->links->get_all(array('cid'=>11,'audit'=>1),'title,link,photo,photo1');
		$data['server_box'] = $server_box;
		
        $team_list = $this->infos->get_all(array('cid'=>36,'audit'=>1),'title,content,icon,photo');
        $data['team_list'] = $team_list;
        
		// echo "<pre>";
		// var_dump($team_list);
		// echo "</pre>";
		
		// 环境介绍
        $environment_txt=$this->page->get_one(array('id'=>1,'cid'=>5),'content');
        $data['environment_txt']=$environment_txt;
        $environment_list=$this->gallery->get_all(array('cid'=>6,'audit'=>1),'title,photo,link');
        $data['environment_list']=$environment_list;
		
		//合作伙伴
		$cooperation = $this->links->get_all(array('cid'=>10,'audit'=>1),'link,photo');
		$data['cooperation'] = $cooperation['0'];
		
		

        // 栏目导航
        // $navigation=$this->links->get_all(array('cid'=>17,'audit'=>1),'title,link,photo');
        // $data['navigation']=$navigation;

        // 专业团队
        // $expert_info=$this->page->get_one(array('id'=>13,'cid'=>43),'id,icon2,icon3');
        // $team_list=$this->infos->get_all(array('cid'=>45,'audit'=>1),'id,title,icon1,icon2');
        // $data['expert_info']=$expert_info;
        // $data['team_list']=$team_list;


        // 新闻动态
        // $dt_flag_one=$this->news->get_one(array('cid'=>48,'audit'=>1,'flag1'=>1,'ctype'=>2),'id,title,content,photo,timeline');
        // $data['dt_flag_one']=$dt_flag_one;
        // $dt_flag=$this->news->get_list(4,0,false,array('cid'=>48,'audit'=>1,'flag'=>1,'ctype'=>2),'id,title,timeline');
        // $data['dt_flag']=$dt_flag;

        // 活动招募
        // $zm_flag_one=$this->news->get_one(array('cid'=>48,'audit'=>1,'flag1'=>1,'ctype'=>1),'id,title,content,photo,timeline');
        // $data['zm_flag_one']=$zm_flag_one;
        // $zm_flag=$this->news->get_list(4,0,false,array('cid'=>48,'audit'=>1,'flag'=>1,'ctype'=>1),'id,title,timeline');
        // $data['zm_flag']=$zm_flag;

        

        // 品牌旗舰店
        $flagship=$this->gallery->get_all(array('cid'=>20,'audit'=>1),'title,photo,link');
        $data['flagship']=$flagship;

        // 所在城市
        $city=CUR_CITY;
        if(empty($city)){
            $city='首页';
        }
        $data['city']=$city;

        // 头部直营店菜单
        $data['city_menu']=$this->city_menu;

    	// seo
		$data['header']=header_seoinfo(0,0);

		$this->load->view('welcome',$data);
	}

	/**
     * 团队信息加载【ajax】
     */
	public function wel_team(){
	    if (is_ajax()){
	        $id=$this->uri->segment(3,0);
	        if ($id==0){
	            $info=$this->page->get_one(array('id'=>13,'cid'=>43),'photo1,icon1,content');
	            $cur_pos='';
            }else{
                $info=$this->infos->get_one(array('id'=>$id,'cid'=>45,'audit'=>1),'id,title,photo1,content,icon');
                $list=$this->infos->get_all(array('cid'=>45,'audit'=>1),'id');
                $cur_pos=0;
                foreach ($list as $k=>$v){
                    if ($info['id']==$v['id']){
                        $cur_pos=$k;
                    }
                }
            }
            $data['id']=$id;
	        $data['cur_pos']=$cur_pos;
	        $data['info']=$info;

	        $this->load->view('ajax/wel_team',$data);
        }
    }


}
