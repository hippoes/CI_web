<?php
/**
 * 专业团队
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consult extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        
        // seo
        $header=header_seoinfo(43,0);
        $data['header']=$header;

        $this->load->view('consult',$data);
    }

}