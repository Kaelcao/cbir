<?php
/**
 * Created by PhpStorm.
 * User: Do Son Tung
 * Date: 2/3/2016
 * Time: 3:42 PM
 */
class Image extends CI_Model{
    function GetAllImage(){
        $this->load->database();
        $this->db->select();
        $result = $this->db->get("cbir_index")->result_array();

        return $result;
    }

    function GetAllImageOfDataSet($id, $page = 1, $limit = 10){
        $this->load->database();
        $offset = ($page-1)*10;
        $this->db->select();
        $this->db->where('dataset_id', $id);
        $result = $this->db->get('cbir_index',$limit, $offset)->result_array();
//        $result = $this->db->get_where('cbir_index', array('dataset_id' => $id), $limit, $offset)->result_array();

        return $result;
    }

    function GetImage($id) {
        $this->load->database();
        $this->db-select('id', $id);
        $result = $this->db->get('cbir_index')->result_array();

        return $result;
    }

    function GetTotalInstance(){
        $this->load->database();
        $result = $this->db->count_all('cbir_index');

        return $result;
    }
}