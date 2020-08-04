<?php

class ReportModel extends CI_Model {

	public function getProductStockReport() {

        $this->db->select('seller.s_name, product.product_name, product.price, product.p_id, stock.*');
        $this->db->from('seller');
        $this->db->join('product_seller', 'product_seller.s_id = seller.s_id');
        $this->db->join('product', 'product_seller.p_id = product.p_id');
        $this->db->join('stock', 'product_seller.stock_id = stock.stock_id');

        $query = $this->db->get();

        return $query->result();
    }


}