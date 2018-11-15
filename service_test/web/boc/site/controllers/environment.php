<?php
/**
 * 环境介绍
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Environment extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model','page');
        $this->load->model('banners_model','banners');
        $this->load->model('infos_model','infos');
    }

    public function index(){
        // banner
        $banner=$this->banners->get_one(array('id'=>10,'cid'=>20,'audit'=>1),'photo,photo1');
        $data['banner']=$banner;
        //五星环境列表
        $environment_list=$this->infos->get_all(array('cid'=>27,'audit'=>1),'id,title,field1,content,photo,pics');
        foreach($environment_list as $k=>$v){
            $pics = explode(',',$v['pics']);
            $environment_list[$k]['pics'] = array_slice($pics,0,3);
        }
        $data['environment_list']=$environment_list;

        // seo title
        $header=header_seoinfo(16,0);
        $data['header']=$header;
        $data['nav'] = 16;
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        $this->load->view('environment',$data);

    }

}