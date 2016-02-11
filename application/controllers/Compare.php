<?php

class Compare extends CI_Controller
{
    public function get_test_histogram($name = '300.jpg')
    {
        $query = $this->db->get_where('cbir_index', array('name' => $name));
        $row = $query->result();
        $histogram = json_decode($row[0]->histogram);
        echo 'red: ' . json_encode($histogram->red);
        echo '<br/>green: ' . json_encode($histogram->green);
        echo '<br/>blue: ' . json_encode($histogram->blue);
    }

    public function get_grayscale_histogram($name = '300.jpg')
    {
        $query = $this->db->get_where('cbir_index', array('name' => $name));
        $row = $query->result();
        $grayscale = json_decode($row[0]->grayscale);
        echo 'grayscale: ' . json_encode($grayscale);

    }


    public function receive_show_images()
    {
//        $avg_list = array();
        $message['message'] = 'Wrong Sending Method';
        if (empty($_POST)) {
            echo json_encode($message);
        } else {
            $red = json_decode($this->input->post('red'));
            $green = json_decode($this->input->post('green'));
            $blue = json_decode($this->input->post('blue'));
            $number_images = $this->input->post('number');


            $this->indexer->normalize_array($red);
            $this->indexer->normalize_array($green);
            $this->indexer->normalize_array($blue);

            $images = $this->comparator->get_similar_images($red, $green, $blue, $number_images);
            foreach ($images as $key => $value) {
                echo "<img src='$key'/> Value: $value <br/>";
            }
        }
    }

    public function receive_show_grayscale_images()
    {
//        $avg_list = array();
        $message['message'] = 'Wrong Sending Method';
        if (empty($_POST)) {
            echo json_encode($message);
        } else {
            $grayscale = json_decode($this->input->post('grayscale'));
            $datasets = json_decode($this->input->post('datasets'));
            $number_images = $this->input->post('number');

            $this->indexer->normalize_array($grayscale);
            $images = $this->comparator->get_similar_images_grayscale($grayscale, $number_images, $datasets);

            foreach ($images as $key => $value) {
                echo "<img src='$key'/> Value: $value <br/>";
            }
        }
    }

    public function receive_rgb()
    {
        header('Content-Type: application/json');
//        $avg_list = array();
        $message['message'] = 'Wrong Sending Method';
        if (empty($_POST)) {
            echo json_encode($message);
        } else {
            $temp['images'] = array();
            $red = json_decode($this->input->post('red'));
            $green = json_decode($this->input->post('green'));
            $blue = json_decode($this->input->post('blue'));
            $number_images = $this->input->post('number');
            $datasets = json_decode($this->input->post('datasets'));

            $this->indexer->normalize_array($red);
            $this->indexer->normalize_array($green);
            $this->indexer->normalize_array($blue);

            $images = $this->comparator->get_similar_images($red, $green, $blue, $number_images,$datasets);
            $i = 0;
            foreach ($images as $key => $value) {
                $temp['images'][$i]['url'] = $key;
                $temp['images'][$i]['distance'] = $value;
                $i++;
            }
        }
        echo json_encode($temp);
//        print_r($avg_list_with_url);
    }

    public function test()
    {
        $red = json_decode($this->input->post('red'));
        $green = json_decode($this->input->post('green'));
        $blue = json_decode($this->input->post('blue'));
        $number_images = $this->input->post('number');

        $red = $this->indexer->normalize_array($red);
        $green = $this->indexer->normalize_array($green);
        $blue = $this->indexer->normalize_array($blue);
        $query = $this->db->where('name', '763.jpg')->get('cbir_index');
        $row = $query->row_array();
        $histogram = json_decode($row['histogram']);
        var_dump($this->comparator->euclidean_compare($histogram->red, $red));
        var_dump($this->comparator->euclidean_compare($histogram->green, $green));
        var_dump($this->comparator->euclidean_compare($histogram->blue, $blue));
    }

    public function to_gray_scale($name = "301.jpg")
    {
        echo $this->converter->convert_to_grayscale($name);
    }

    public function receive_grayscale()
    {
        header('Content-Type: application/json');
//        $avg_list = array();
        $message['message'] = 'Wrong Sending Method';
        if (empty($_POST)) {
            echo json_encode($message);
        } else {
            $temp['images'] = array();
            $grayscale = json_decode($this->input->post('grayscale'));
            $datasets = json_decode($this->input->post('datasets'));

            $number_images = $this->input->post('number');

            $this->indexer->normalize_array($grayscale);

            $images = $this->comparator->get_similar_images_grayscale($grayscale, $number_images,$datasets);
            $i = 0;
            foreach ($images as $key => $value) {
                $temp['images'][$i]['url'] = $key;
                $temp['images'][$i]['distance'] = $value;
                $i++;
            }
        }
        echo json_encode($temp);
    }

    public function get_dataset()
    {
		$this->load->model('Dataset');
        header('Content-Type: application/json');
        $result = $this->Dataset->GetAllDataSet();

        echo json_encode($result);
    }
}