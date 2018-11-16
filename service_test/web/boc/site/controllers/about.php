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

    protected $limit=2;
    protected $news_type_ids=array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model','page');
        $this->load->model('banners_model','banners');
        $this->load->model('news_model','news');
        $this->load->model('infos_model','infos');
        $this->load->model('recruit_model','recruit');

        $news_types=list_coltypes_fid(63,0);

        foreach ($news_types as $k=>$v){
            $news_type['id'][]=$v['id'];
            $array[$k]['id'] = $v['id'];
            $array[$k]['title'] = $v['title'];
            $array[$k]['icon1'] = $v['icon1'];
            $array[$k]['icon2'] = $v['icon2'];
        }
        $this->news_array=$array;

        $this->news_type=$news_type;
        
    }

    public function index(){
        // banner
        $banner=$this->banners->get_one(array('id'=>13,'cid'=>57,'audit'=>1),'photo,photo1');
        $data['banner']=$banner;

        // 品牌介绍
        $about_introduce=$this->page->get_one(array('id'=>17,'cid'=>58),'content');
        $data['about_introduce']=$about_introduce;

        // Hibaby 家族
        $where=array('cid'=>59,'audit'=>1);
        $plan_count=$this->infos->get_count_all($where);
        $plan_limit_ini=$this->plan_limit_ini;
        $plan_more=$this->plan_more;
        $plan_page_num=ceil(($plan_count-$plan_limit_ini)/$plan_more);
        $data['plan_page_num']=$plan_page_num;

        $plan_list=$this->infos->get_list($plan_limit_ini,0,false,array('cid'=>59,'audit'=>1),'id,title,content,photo,field1');
        $data['plan_count']=$plan_count;
        $data['plan_list']=$plan_list;

        // 品牌文化
        $culture=$this->infos->get_all(array('cid'=>60,'audit'=>1),'title,outline');
        foreach ($culture as $k=>$v){
            $culture[$k]['arr']=handle_isolation_str_to_arr($v['outline'],'##');

        }
        $data['culture'] = $culture;

         // 蜜月简介
        $miyue_introduce=$this->page->get_one(array('id'=>18,'cid'=>61),'content,photo');
        $data['miyue_introduce']=$miyue_introduce;
        
        // 蜜月图集
        $miyue_pics=$this->infos->get_all(array('cid'=>62,'audit'=>1),'content,pics');
        foreach($miyue_pics as $k=>$v){
            $pics = explode(',',$v['pics']);
            $miyue_pics[$k]['pics'] = array_slice($pics,0,4);
        }
        $data['miyue_pics'] = $miyue_pics['0'];

        //活动资讯
        $news_array=$this->news_array;
        $data['news_array'] = $news_array;

        $news_type=$this->news_type;
        $type=$this->uri->segment(3,$news_type['id'][0]);
        if (in_array($type,$news_type['id'])){
            $page=$this->uri->segment(4,1);
            if ($page > 0){
                // 活动资讯列表
                $this->load->library('pagination');
                $where=array('cid'=>63,'ctype'=>$type,'audit'=>1);
                $count=$this->news->get_count_all($where);
                $limit=$this->limit;
                $start=($page-1)*$limit;
                $list=$this->news->get_list($limit,$start,false,$where,'id,title,timeline');
                // $pages=_pages(site_url('news/index/'.$type),$limit,$count,4);
                $onclick = array("prev"=>"ajax_pages('prev')","page"=>"ajax_pages","next"=>"ajax_pages('next')","last"=>"ajax_pages('last')");
                $pages=_pages("",$limit,$count,4,$onclick);
                $maxpage = ceil($count/$limit);
                $data['list']=$list;
                $data['pages']=$pages;
                $data['page']=$page;
                $data['maxpage']=$maxpage;
                $data['type']=$type;
                $data['count']=$count;
                $data['limit']=$limit;

                // echo "<pre>";
                // var_dump($page);
                // echo "</pre>";

                // 定位
                $cur_pos=0;
                foreach ($news_type['id'] as $k=>$v){
                    if ($type==$v) {
                        $cur_pos = $k;
                    }
                }
                $data['cur_pos']=$cur_pos;

                
            }else{
                redirect('404');
            }
        }

        // 联系我们
        $Contact_us = $this->infos->get_all(array('cid'=>64,'audit'=>1),'title,outline,icon');
        $data['other_us'] = $Contact_us;

        //地图设置
        $map_setting=$this->page->get_one(array('id'=>19,'cid'=>65),'title,field1,outline,photo');
        $data['map_setting']=$map_setting;

        // echo "<pre>";
        // var_dump($map_setting);
        // echo "</pre>";
        
        $data['nav'] = 56;
        // seo
        $header=header_seoinfo(56,0);
        $data['header']=$header;

        $this->load->view('about',$data);

    }

    public function newsinfos(){
        
        if (is_ajax()){
            $type=$this->input->get('type');
            $page=$this->input->get('page');

            // 活动资讯列表
            $this->load->library('pagination');
            $where=array('cid'=>63,'ctype'=>$type,'audit'=>1);
            $count=$this->news->get_count_all($where);
            $limit=$this->limit;
            $start=($page-1)*$limit;
            $list=$this->news->get_list($limit,$start,false,$where,'id,title,timeline');
            $onclick = array("prev"=>"ajax_pages('prev')","page"=>"ajax_pages","next"=>"ajax_pages('next')","last"=>"ajax_pages('last')");
            $pages=_pages("",$limit,$count,4,$onclick);
            $maxpage = ceil($count/$limit);

            $return['list'] = $list;
            $return['pages'] = $pages;
            $return['page'] = $page;
            $return['maxpage'] = $maxpage;
            $return['count'] = $count;
            $return['limit'] = $limit;
            echo json_encode($return);

        }
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