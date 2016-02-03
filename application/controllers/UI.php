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
        $data['title'] = 'Welcome to CBIR';
        $this->load->view('template/header',$data);
    }

    function documentation(){
        $data['content'] = 'documentation';
        $data['nav'] = 'documentation';
        $data['title'] = 'Documentation';
        $this->load->view('template/header', $data);
    }

    function dataset(){
        $this->load->model('Dataset');
        $data['all_data_set'] = $this->Dataset->GetAllDataSet();
        $data['total_instance'] = $this->Dataset->GetTotalInstance();
        $data['content'] = 'dataset';
        $data['nav'] = 'dataset';
        $data['title'] = "Data Set";

        $this->load->view('template/header', $data);
    }

    function datasetof(){
        $id = $this->input->post('dataset');
        $this->load->model('Dataset');
        $this->load->model('Image');

        $data['content'] = 'dataset';
        $data['nav'] = 'dataset';
        $data['title'] = $this->Dataset->GetDataSet($id)[0]['dataset_name'];

        $data['all_data_set'] = $this->Dataset->GetAllDataSet();
        $data['total_instance'] = $this->Dataset->GetTotalInstance();

        $result_image = $this->Image->GetAllImageOfDataSet($id);
        $data['number_of_image'] = count($this->Image->GetAllImageOfDataSet($id));
        $data['image_of_dataset'] = $result_image;
        $data['isSelected'] = $id;
//        var_dump($data['image_of_dataset'] = $this->Image->GetAllImageOfDataSet($id));
//        var_dump($this->Image->GetTotalInstance());
//        var_dump($id);
        $this->load->view('template/header', $data);
    }

    function datasetedit(){
        $data['content'] = 'dataset-edit';
        $data['nav'] = 'dataset';
        $data['title'] = 'Edit Data Set';


        $this->load->view('/template/header', $data);
    }
}