<?php

class ProductCategoryModel extends CI_Model {

    // Common model function to insert data
    public function insertData($table, $data_Arr) {
        $dataRst = $this->db->insert($table, $data_Arr);
        return $dataRst;
    }

    // Common model function to update data
    public function updateData($tableName, $dataArr, $whereArr) {

        $this->db->where($whereArr);
        $this->db->update($tableName, $dataArr);
        $result = $this->db->affected_rows() > 0;
        return $result;
    }

    // Common model function to delete data
    public function deleteData($tablName, $whereArr) {
        $result = $this->db->delete($tablName, $whereArr);
        return $result;
    }

    public function getSelectData($fieldset, $tableName, $where = '') {
        if ($where == "") {
            $this->db->select($fieldset)->from($tableName);
        } else {
            $this->db->select($fieldset)->from($tableName)->where($where);
        }
        $query = $this->db->get();
        return $query->result();
    }


}