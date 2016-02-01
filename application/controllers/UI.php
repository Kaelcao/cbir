<?php
/**
 * Created by PhpStorm.
 * User: Do Son Tung
 * Date: 2/1/2016
 * Time: 5:25 PM
 */

class UI extends CI_Controller{
    function index(){
        $data['content'] = 'welcome_message';
        $this->load->view('template/header',$data);
    }

    function documentation(){
        $data['content'] = 'documentation';
        $data['nav'] = 'documentation';
        $this->load->view('template/header', $data);
    }

    function dataset(){
        $data['content'] = 'dataset';
        $data['nav'] = 'dataset';
        $this->load->view('template/header', $data);
    }
}