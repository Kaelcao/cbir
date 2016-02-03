<?php
/**
 * Created by PhpStorm.
 * User: Do Son Tung
 * Date: 2/3/2016
 * Time: 2:54 PM
 */
class Dataset extends CI_Model {
    function GetAllDataSet(){
        $this->load->database();
        $this->db->select();
        $result = $this->db->get("dataset")->result_array();

        return $result;
    }

    function GetDataSet($id) {
        $this->load->database();
        $this->db-select('id', $id);
        $result = $this->db->get('dataset')->result_array();

        return $result;
    }

    function GetTotalInstance(){
        $this->load->database();
        $result = $this->db->count_all('dataset');

        return $result;
    }
}