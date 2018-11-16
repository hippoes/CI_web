<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 精致月子服务
 */ 
class Service extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model','page');
        $this->load->model('banners_model','banners');
        $this->load->model('infos_model','infos');
        $this->load->model('gallery_model','gallery');
    }

    public function index(){
        // banner
        $banner=$this->banners->get_one(array('id'=>12,'cid'=>40,'audit'=>1),'photo,photo1');
        $data['banner']=$banner;

        //特有服务介绍
        $server_introduce = $this->page->get_one(array('id'=>9,'cid'=>41),'content,outline');
        $foutline = explode("##",$server_introduce['outline']);
        unset($foutline[0]);
        $array = array();
        foreach($foutline as $k=>$v)
        {   
            $foutline2 = explode("$$",$v);
            $array[] = $foutline2;
        }
        $server_introduce['outline1'] = $array[0]; // 副标题1
        $server_introduce['outline2'] = $array[1]; // 副标题2
        $data['server_introduce'] = $server_introduce;

        // 专家护航列表
        $protect_list=$this->gallery->get_all(array('cid'=>42,'audit'=>1),'title,photo');
        $data['protect_list'] = $protect_list;

        //智能环保列表
        $smart_list = $this->infos->get_all(array('cid'=>44,'audit'=>1), 'title,outline,photo,icon');
        $data['smart_list'] = $smart_list;

        //产前服务介绍
        $prenatal_introduce=$this->page->get_one(array('id'=>11, 'cid'=>45),'content');
        $data['prenatal_introduce'] = $prenatal_introduce; 
        
        //产前服务列表
        $prenatal_list=$this->infos->get_all(array('cid'=>46,'audit'=>1),'id,title,outline,photo');
        foreach($prenatal_list as $k=>$v){
            $outline = explode('##',$v['outline']);
            unset($outline[0]);
            $prenatal_list[$k]['outline'] = $outline;
        }
        $data['prenatal_list'] = $prenatal_list;

        //妈妈服务
        $mom_introduce=$this->page->get_one(array('id'=>12,'cid'=>47),'content');
        $data['mom_introduce'] = $mom_introduce; 

        //妈妈服务文本列表
        $mom_textlist = $this->infos->get_all(array("cid"=>48,'audit'=>1),'title,content');
        $data['mom_textlist'] = $mom_textlist;

        //妈妈服务图文列表
        $mom_piclist = $this->page->get_one(array('id'=>13,'cid'=>49),'title,outline,photo');
        $outline = explode('##',$mom_piclist['outline']);
        unset($outline[0]);
        $mom_piclist['outline'] = $outline;
      
        $data['mom_piclist'] = $mom_piclist;

        //蜜妈课堂
        $class_introduce=$this->page->get_one(array('id'=>14,'cid'=>50),'content');
        $data['class_introduce'] = $class_introduce;

        //蜜妈课堂列表
        $class_list=$this->gallery->get_all(array('cid'=>51,'audit'=>1),'title,photo');
        $data['class_list'] = $class_list;

        //宝宝服务
        $baby_introduce=$this->page->get_one(array('id'=>15,'cid'=>52),'content');
        $data['baby_introduce'] = $baby_introduce;

        //宝宝服务列表
        $baby_list=$this->infos->get_all(array('cid'=>53,'audit'=>1),'title,outline,photo,icon');
        foreach($baby_list as $k=>$v){
            $outline = explode('##',$v['outline']);
            unset($outline[0]);
            $baby_list[$k]['outline'] = $outline;
        }
        $data['baby_list'] = $baby_list;

        //满月party
        $party_infos=$this->infos->get_all(array('cid'=>54,'audit'=>1),'title,outline,content,pics');
        foreach($party_infos as $k=>$v){
            $pics = explode(',',$v['pics']);
            $party_infos[$k]['pics'] = array_slice($pics,0,5);
        }
        $data['party_infos'] = $party_infos[0];

        // //五星环境列表
        // $environment_list=$this->infos->get_all(array('cid'=>27,'audit'=>1),'id,title,field1,content,photo,pics');
        // foreach($environment_list as $k=>$v){
        //     $pics = explode(',',$v['pics']);
        //     $environment_list[$k]['pics'] = array_slice($pics,0,3);
        // }
        // $data['environment_list']=$environment_list;

        // seo title
        $header=header_seoinfo(39,0);
        $data['header']=$header;
        $data['nav'] = 39;
        // echo "<pre>";
        // var_dump($party_infos);
        // echo "</pre>";
        $this->load->view('service',$data);
    }

	

}