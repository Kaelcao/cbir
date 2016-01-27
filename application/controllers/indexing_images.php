<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Indexing_images extends CI_Controller
{
    public function show_histogram($name = '301.jpg')
    {

        $data = $this->indexer->convert($name);
        $this->load->view('chart', $data);
    }


    public function run()
    {
        ini_set('max_execution_time', 300); //300 seconds = 5 minutes
        $this->indexer->convert_all($this->indexer->get_all_image('./images/'));
    }
    public function test(){
        echo 'hello';
    }
}
