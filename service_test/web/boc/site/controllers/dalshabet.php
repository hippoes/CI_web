<?php
/**
 * 美妍中心
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dalshabet extends MY_Controller{
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
        $banner=$this->banners->get_one(array('id'=>14,'cid'=>67,'audit'=>1),'photo,photo1');
        $data['banner']=$banner;

        // 美妍中心简介
        $dalshabet_introduce=$this->page->get_one(array('id'=>20,'cid'=>68),'field1,outline,content');
        $data['dalshabet_introduce']=$dalshabet_introduce;

        // 四位一体
        $system = $this->gallery->get_all(array('cid'=>69,'audit'=>1),'title,photo');
        $data['system'] = $system;

        // 妊娠期介绍
        $preg_introduce = $this->page->get_one(array('id'=>21,'cid'=>71),'title,content');
        $data['preg_introduce'] = $preg_introduce;
        // 妊娠期列表
        $preg_list = $this->infos->get_all(array('cid'=>72,'audit'=>1),'title,outline,photo');
        foreach ($preg_list as $k=>$v){
            $preg_list[$k]['outline']=handle_isolation_str_to_arr($v['outline'],'##');
        }
        $data['preg_list'] = $preg_list;

        // 产褥期
        $preium_introduce = $this->page->get_one(array('id'=>22,'cid'=>74),'title,content');
        $data['preium_introduce'] = $preium_introduce;
        // 产褥期列表
        $preium_list = $this->infos->get_all(array('cid'=>75,'audit'=>1),'title,outline,photo');
        foreach ($preium_list as $k=>$v){
            $preium_list[$k]['outline']=handle_isolation_str_to_arr($v['outline'],'##');
        }
        $data['preium_list'] = $preium_list;

        // 产后调理
        $nursing_introduce = $this->page->get_one(array('id'=>23,'cid'=>77),'title,content');
        $data['nursing_introduce'] = $nursing_introduce;
        // 产后调理列表
        $nursing_list = $this->infos->get_all(array('cid'=>78,'audit'=>1),'title,outline,photo');
        foreach ($nursing_list as $k=>$v){
            $nursing_list[$k]['outline']=handle_isolation_str_to_arr($v['outline'],'##');
        }
        $data['nursing_list'] = $nursing_list;

        // 盆底康复
        $recovery_introduce =  $list=$this->infos->get_all(array('cid'=>81,'audit'=>1),'title,content,pics');
        foreach($recovery_introduce as $k=>$v){
            $pics = explode(',',$v['pics']);
            $recovery_introduce[$k]['pics'] = array_slice($pics,0,3);
        }
        $data['recovery_introduce'] = $recovery_introduce[0];

        //四大问题介绍
        $problem_introduce = $this->page->get_one(array('id'=>24,'cid'=>80),'title,content');
        $data['problem_introduce'] = $problem_introduce;
        //四大问题列表
        $problem_lists = $this->gallery->get_all(array('cid'=>82,'audit'=>1),'title,photo');
        $data['problem_lists'] = $problem_lists;

        // 孕产运动
        $movement_introduce = $this->page->get_one(array('id'=>25,'cid'=>84),'outline,content');
        $data['movement_introduce'] = $movement_introduce;
        // 孕产运动列表
        $movement_list = $this->infos->get_all(array('cid'=>85,'audit'=>1),'title,outline,photo');
        foreach ($movement_list as $k=>$v){
            $movement_list[$k]['outline']=handle_isolation_str_to_arr($v['outline'],'##');
        }
        $data['movement_list'] = $movement_list;
        // 运动专家详情
        $expert_introduce = $this->page->get_one(array('id'=>26,'cid'=>86),'title,outline,content,photo');
        $data['expert_introduce'] = $expert_introduce;

        // 六大板块
        $six_model = $this->gallery->get_all(array('cid'=>88,'audit'=>1),'title,photo');
        $data['six_model'] = $six_model;
        // 背景图
        $six_modelbg = $this->page->get_one(array('id'=>27,'cid'=>89),'title,outline,photo');
        $six_modelbg['outline']=handle_isolation_str_to_arr($six_modelbg['outline'],'##');
        $data['six_modelbg'] = $six_modelbg;
        // 右侧浮动块
        $rf_block = $this->infos->get_all(array('cid'=>90,'audit'=>1),'title,field1');
        $data['rf_block'] = $rf_block;
        

        // 选择Hibaby
        $change_lists = $this->infos->get_all(array('cid'=>91,'audit'=>1),'title,outline,photo');
        $data['change_lists'] = $change_lists;


        // echo "<pre>";
        // var_dump($rf_block);
        // echo "</pre>";

        // seo
        $header=header_seoinfo(66,0);
        $data['header']=$header;
        $data['nav'] = '66';

        $this->load->view('dalshabet',$data);

    }

}