<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 11/22/2015
 * Time: 3:05 PM
 */
class Comparator
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function euclidean_compare($data_1, $data_2)
    {
        if (!is_array($data_1) || !is_array($data_2)) {
            return 1000;
        }
        $temp = 0;
        $length = count($data_1);
        for ($i = 0; $i < $length; $i++) {
            $temp += pow($data_1[$i] - $data_2[$i], 2);
        }
        return sqrt($temp);
    }

    public function get_similar_images($red, $green, $blue, $number_images, $datasets)
    {
        $avg_list_with_url = array();
        foreach ($datasets as $dataset) {
            $query = $this->CI->db->where('dataset_id', $dataset->id)->get('cbir_index');
            foreach ($query->result() as $row) {

                $histogram = json_decode($row->histogram);
                $red_diff = $this->euclidean_compare((array)$histogram->red, $red);
                $green_diff = $this->euclidean_compare((array)$histogram->green, $green);
                $blue_diff = $this->euclidean_compare((array)$histogram->blue, $blue);
                $diff_avg = ($red_diff + $green_diff + $blue_diff) / 3;
                $avg_list_with_url[$row->url] = $diff_avg;
//            $avg_list[] = $diff_avg;
            }
        }
        //$this->CI->indexer->normalize_array($avg_list_with_url);
        asort($avg_list_with_url);
        return array_slice($avg_list_with_url, 0, $number_images);
    }

    public function get_similar_images_grayscale($grayscale, $number_images, $datasets)
    {
        $avg_list_with_url = array();

        foreach ($datasets as $dataset) {
            $query = $this->CI->db->where('dataset_id', $dataset->id)->get('cbir_index');
//            echo json_encode($query->result());
            foreach ($query->result() as $row) {
                $histogram = json_decode($row->grayscale);
//                var_dump($grayscale);

                $diff = $this->euclidean_compare($histogram, $grayscale);
//                var_dump($diff);

                $avg_list_with_url[$row->url] = $diff;
//            $avg_list[] = $diff_avg;
            }
        }

        //$this->CI->indexer->normalize_array($avg_list_with_url);
        asort($avg_list_with_url);
        return array_slice($avg_list_with_url, 0, $number_images);
    }
}