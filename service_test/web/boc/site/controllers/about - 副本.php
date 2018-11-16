<?php
/**
 * 关于Hibaby
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends MY_Controller{
    protected $plan_limit_ini=6;
    protected $plan_more=2;

    protected $news_limit_ini=2;
    protected $news_more=2;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model','page');
        $this->load->model('banners_model','banners');
        $this->load->model('news_model','news');
        $this->load->model('infos_model','infos');
        $this->load->model('recruit_model','recruit');

    }

    public function index(){
        // banner
        $banner=$this->banners->get_one(array('id'=>9,'cid'=>16,'audit'=>1),'photo');
        $data['banner']=$banner;

        // 企业介绍
        $introduction=$this->page->get_one(array('id'=>16,'cid'=>51),'content');
        $data['introduction']=$introduction;

        // 城市布局
        $where=array('cid'=>52,'audit'=>1);
        $plan_count=$this->infos->get_count_all($where);
        $plan_limit_ini=$this->plan_limit_ini;
        $plan_more=$this->plan_more;
        $plan_page_num=ceil(($plan_count-$plan_limit_ini)/$plan_more);
        $data['plan_page_num']=$plan_page_num;

        $plan_list=$this->infos->get_list($plan_limit_ini,0,false,array('cid'=>52,'audit'=>1),'id,title,content,photo,field1');
        $data['plan_count']=$plan_count;
        $data['plan_list']=$plan_list;

        // 品牌文化
        $culture=$this->infos->get_all(array('cid'=>53,'audit'=>1),'title,outline');
        foreach ($culture as $k=>$v){
            $culture[$k]['arr']=handle_isolation_str_to_arr($v['outline'],'##');

        }
        $data['culture']=$culture;

        // 集团动态
        $where=array('cid'=>58,'audit'=>1);
        $news_count=$this->news->get_count_all($where);
        $news_limit_ini=$this->news_limit_ini;
        $news_more=$this->news_more;
        $news_page_num=ceil(($news_count-$news_limit_ini)/$news_more);
        $data['news_page_num']=$news_page_num;

        $news_list=$this->news->get_list($news_limit_ini,0,false,array('cid'=>58,'audit'=>1),'id,title,content,photo');
        $data['news_list']=$news_list;

        // 加入我们
        $recruit_list=$this->recruit->get_all(array('cid'=>54,'audit'=>1),'id,title,timeline,amount,place,content,requirement');
        $data['recruit_list']=$recruit_list;

        // 简历投递邮箱
        $recruit_email=$this->page->get_one(array('id'=>17,'cid'=>55),'title');
        $data['recruit_email']=$recruit_email;

        // 所在城市
        $city=CUR_CITY;
        if(empty($city)){
            $city='首页';
        }
        $data['city']=$city;
        // echo $city;

        // 头部直营店菜单
        $data['city_menu']=$this->city_menu;

        // seo
        $header=header_seoinfo(16,0);
        $data['header']=$header;

        $this->load->view('about',$data);


    }

    /**
     * 集团动态详情页
     */
    public function newsinfo(){
        $id=$this->uri->segment(3,0);
        $info=$this->news->get_one_pn(array('id'=>$id,'audit'=>1,'cid'=>58),'id,cid,sort_id,title,content,timeline');
        if (!empty($info)){
            $data['info']=$info;

            // banner
            $banner=$this->banners->get_one(array('id'=>9,'cid'=>16,'audit'=>1),'photo');
            $data['banner']=$banner;

            // 所在城市
            $city=CUR_CITY;
            if(empty($city)){
                $city='首页';
            }
            $data['city']=$city;

            // 头部直营店菜单
            $data['city_menu']=$this->city_menu;

            // seo
            $header=header_seoinfo(16,0);
            $header['title']=$info['title'].'-'.$header['title'];
            $data['header']=$header;

            $this->load->view('about/newsinfo',$data);

        }else{
            redirect('404');
        }
    }

    /**
     * 加载城市布局【ajax】
     */
    public function city(){
        if (is_ajax()){
            $page=$this->input->get('page');
            $plan_limit_ini=$this->plan_limit_ini;
            $plan_more=$this->plan_more;
            $start=($page-1)*$plan_more+$plan_limit_ini;
            $list=$this->infos->get_list($plan_more,$start,false,array('cid'=>52,'audit'=>1),'id,title,content,photo');
            $data['list']=$list;

            $this->load->view('ajax/city',$data);
        }
    }


    /**
     * 加载城市布局【ajax】
     */
    public function ab_news(){
        if (is_ajax()){
            $page=$this->input->get('page');
            $news_limit_ini=$this->news_limit_ini;
            $news_more=$this->news_more;
            $start=($page-1)*$news_more+$news_limit_ini;
            $list=$this->news->get_list($news_more,$start,false,array('cid'=>58,'audit'=>1),'id,title,content,photo');
            $data['list']=$list;

            $this->load->view('ajax/ab_news',$data);
        }
    }

}