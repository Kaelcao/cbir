<?php

/**
 * Created by PhpStorm.
 * User: Do Son Tung
 * Date: 2/1/2016
 * Time: 5:25 PM
 */
class UI extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dataset');
        $this->load->model('Image');
    }

    function index()
    {
        $data['content'] = 'welcome_message';
        $data['title'] = 'Welcome to CBIR';
        $this->load->view('template/header', $data);
    }

    function documentation()
    {
        $data['content'] = 'documentation';
        $data['nav'] = 'documentation';
        $data['title'] = 'Documentation';
        $this->load->view('template/header', $data);
    }

    function dataset()
    {
        $data['all_data_set'] = $this->Dataset->GetAllDataSet();
        $data['total_instance'] = $this->Dataset->GetTotalInstance();
        $data['content'] = 'dataset';
        $data['nav'] = 'dataset';
        $data['title'] = "Data Set";

        $this->load->view('template/header', $data);
    }

    function datasetof($id,  $page = 1, $limit = 8)
    {
//        $id = $this->input->post('dataset');
        $data['content'] = 'dataset';
        $data['nav'] = 'dataset';
        $data['title'] = $this->Dataset->GetDataSet($id)[0]['dataset_name'];

        $data['all_data_set'] = $this->Dataset->GetAllDataSet();
        $data['total_instance'] = $this->Dataset->GetTotalInstance();

        $result_image = $this->Image->GetAllImageOfDataSet($id, $page,$limit);
        $data['number_of_image'] = count($this->Image->GetAllImageOfDataSet($id, $page, $limit));
        $data['total_page'] = ceil(count($this->Image->GetAllImageOfDataSet($id, 1, 0))/8);
        $data['image_of_dataset'] = $result_image;
        $data['isSelected'] = $id;
        $data['current_page'] = $page;

        $this->load->view('template/header', $data);
    }

    function datasetedit($id)
    {
        $data['content'] = 'dataset-edit';
        $data['nav'] = 'dataset';
        $data['title'] = 'Edit Data Set';

        $data['dataset'] = $this->Dataset->GetDataSet($id);

        if ($this->input->post()) {
            $datasetname = $this->input->post('datasetname');
            $id = $this->input->post('datasetid');


            $num_rows = $this->db->where('dataset_name', $datasetname)->from('dataset')->count_all_results();
            if ($num_rows > 0) {
                $data['status'] = 0;
                $data['message'] = $datasetname . ' has already existed';

            } else {
                $data['status'] = 1;
                $data['message'] = 'Dataset successfully change to ' . $datasetname;
                $this->db->where('id', $id);
                $this->db->update('dataset', array('dataset_name' => $datasetname));
            }
        }


        $this->load->view('/template/header', $data);
    }

    function new_dataset()
    {
        $data['content'] = 'dataset-new';
        $data['nav'] = 'dataset';
        $data['title'] = 'Add Data Set';

        if ($this->input->post()) {
            $dataset = array(
                'dataset_name' => $this->input->post('datasetname'),
                'create_at' => get_current_time()
            );
            if ($dataset['dataset_name'] == "") {
                $data['status'] = 0;
                $data['message'] = 'The name of dataset cannot be empty';
            } else {
                $num_rows = $this->db->where('dataset_name', $dataset['dataset_name'])->from('dataset')->count_all_results();
                if ($num_rows > 0) {
                    $data['status'] = 0;
                    $data['message'] = $dataset['dataset_name'] . ' has already existed';

                } else {
                    $data['status'] = 1;
                    $data['message'] = $dataset['dataset_name'] . ' dataset added successfully';
                    $this->db->insert('dataset', $dataset);
                }
            }
        }


        $this->load->view('/template/header', $data);
    }

    public function uploads($dataset_id)
    {
        error_reporting(E_ERROR | E_PARSE);
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = time() . random(10, true) . $_FILES['file']['name'];
            $targetPath = getcwd() . '/images/';
            $targetFile = $targetPath . $fileName;
//            $path = $this->db->select('baigiuaki')->from('regis')->where('studentid', $this->auth['id'])->get()->row_array()['baigiuaki'];
//            deleteFiles($path);
            move_uploaded_file($tempFile, $targetFile);

            //Image Resizing
            $config['source_image'] = $targetFile;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 500;
            $config['height'] = 500;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            //add to database
            $histogram = json_encode($this->indexer->convert($fileName));

            $grayscale = json_encode($this->indexer->convert_grayscale($fileName));

            $url = base_url('images/' . $fileName);
            $url_grayscale = base_url('images/grayscale/' . $fileName);


            $data = array(
                'name' => $fileName,
                'histogram' => $histogram,
                'url' => $url,
                'url_grayscale' => $url_grayscale,
                'grayscale' => $grayscale,
                'dataset_id' => $dataset_id
            );
            $this->db->insert('cbir_index', $data);
            //            <div class='btn-group-xoa' id='$id'style='position: relative;margin-left:10px;margin-top:10px;top:48px;'>
//            <button type='button' class='btn btn-primary' style='float: left' data-toggle='collapse' data-target='#btn-xac-nhan-$id'>Xóa</button>
//                    <div id='btn-xac-nhan-$id' class='collapse'>
//                        <button class='btn btn-danger' onclick='xoaBaiCk($id)'>Xác nhận</button>
//                    </div>
//            </div>


            echo "success";
        }
    }
}