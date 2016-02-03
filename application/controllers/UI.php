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
        $this->load->model('Dataset');
        $data['all_data_set'] = $this->Dataset->GetAllDataSet();
        $data['total_instance'] = $this->Dataset->GetTotalInstance();
        $data['content'] = 'dataset';
        $data['nav'] = 'dataset';

        $this->load->view('template/header', $data);
    }

    function datasetof(){
        $id = $this->input->post('dataset');
        $this->load->model('Dataset');
        $this->load->model('Image');
        $data['all_data_set'] = $this->Dataset->GetAllDataSet();
        $data['total_instance'] = $this->Dataset->GetTotalInstance();
        $data['content'] = 'dataset';
        $data['nav'] = 'dataset';

        $result_image = $this->Image->GetAllImageOfDataSet($id);
        $data['number_of_image'] = count($this->Image->GetAllImageOfDataSet($id));
        $data['image_of_dataset'] = $result_image;
        $data['isSelected'] = $id;
//        var_dump($data['image_of_dataset'] = $this->Image->GetAllImageOfDataSet($id));
//        var_dump($this->Image->GetTotalInstance());
//        var_dump($id);
        $this->load->view('template/header', $data);
    }
}