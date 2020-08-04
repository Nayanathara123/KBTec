
<?php

class StockModel extends CI_Model {


	public function getLastStockID($fieldset, $tableName) {

        $this->db->select($fieldset)->from($tableName);
        $this->db->order_by($fieldset, "desc");
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->result();
    }


}