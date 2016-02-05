<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Indexing_images extends CI_Controller
{
    public function show_histogram($name = '301.jpg')
    {
        $data['content'] = 'chart';
        $data['nav'] = 'dataset';
        $data['title'] = 'Image detail';

        $data['rgb_histogram'] = $this->indexer->convert($name);
        $data['grayscale_histogram'] = $this->indexer->convert_grayscale($name);
        $data['image_name'] = $name;
        $this->load->view('/template/header', $data);
    }


    public function run()
    {
        ini_set('max_execution_time', 300); //300 seconds = 5 minutes
        $this->indexer->convert_all($this->indexer->get_all_image('./images/'));
    }

    // chay ham nay de convert het tat ca anh sang grayscale histogram va luu vao
    public function convert_all_grayscale()
    {
        ini_set('max_execution_time', 300); //300 seconds = 5 minutes
        $this->indexer->convert_all_grayscale($this->indexer->get_all_image('./images/'));
    }

    public function test()
    {
        echo 'hello';
    }

    public function test_grayscale($name = '300.jpg')
    {
        $grayscale = $this->indexer->convert_grayscale($name);
        echo json_encode($grayscale);

    }
}
