
<?php

class ProductModel extends CI_Model {

	public function getProductBySeller($id) 
	{
        $this->db->select('product.*');
        $this->db->from('product');
        $this->db->join('product_seller', 'product_seller.p_id = product.p_id');
        $this->db->where('product_seller.s_id', $id);

        $query = $this->db->get();

        return $query->result();    
    }
    

    public function SellerDataProduct($id)
    {
    	$this->db->select('seller.*');
        $this->db->from('seller');
        $this->db->join('product_seller', 'product_seller.s_id = seller.s_id');
        $this->db->join('product', 'product_seller.p_id = product.p_id');
        $this->db->where('product.p_id', $id);

        $query = $this->db->get();

        return $query->result();
    }

    public function ProductDetailsWithSellers()
    {
    	$this->db->select('seller.*, product.*, product_seller.stock_id');
        $this->db->from('seller');
        $this->db->join('product_seller', 'product_seller.s_id = seller.s_id');
        $this->db->join('product', 'product_seller.p_id = product.p_id');

        $query = $this->db->get();

        return $query->result();
    }


}