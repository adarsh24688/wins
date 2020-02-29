<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelCommon extends CI_Model {

	public function getMyProfile(){
		return $this->db->get_where('users',array('id'=>$this->session->userdata('user_id')))->row();
	}

	public function getPrice($id){
		$result = $this->db->get_where('tickets',array('product_id'=>$id))->row();
		return $result->ticket_price;
	}

	public function insertData($tbl_name,$data){
		$this->db->insert($tbl_name,$data);
		return $this->db->insert_id();
	}

	public function getSingleData($tbl_name,$where){
		return $this->db->get_where($tbl_name,$where)->row_array();
	}

	public function getMultipleData($tbl_name){
		return $this->db->get_where($tbl_name)->result();
	}

	public function deleteItem($tbl_name,$where){
		$this->db->where($where);
		$this->db->delete($tbl_name);
	}

	public function updateData($tbl_name,$data,$check){
		$result=$this->db->update($tbl_name,$data,$check);
		return true;
	}
	public function fetchSoldTicketsWithProduct(){
		$this->db->select('*');
        $this->db->from('products');
        $this->db->join('sold_tickets', 'products.id = sold_tickets.product_id', 'left');
        $this->db->join('tickets', 'products.id = tickets.product_id', 'left');
        $this->db->where(['sold_tickets.user_id' =>$this->session->userdata('user_id')]);
		return  $this->db->get_where()->result();
	}
	public function countRow($tbl_name,$check){
		$query = $this->db->get_where($tbl_name,$check);
		return $query->num_rows();
	}

	public function fetch_product_and_ticket($product_id){
		$this->db->select('products.id,products.product_name,products.image,products.is_deleted,tickets.ticket_price,tickets.ticket_count,tickets.sold_count,products.description');
        $this->db->from('products');
        $this->db->join('tickets', 'products.id = tickets.product_id', 'left');
        $this->db->where(['tickets.product_id' =>$product_id]);
        return $this->db->get()->row();
	}

	public function fetch_products_and_tickets(){
		$this->db->select('*');
        $this->db->from('products');
        $this->db->join('tickets', 'products.id = tickets.product_id', 'left');
        $this->db->where(['products.is_deleted' => 0]);
        return $this->db->get()->result();
	}

	public function fetch_images($product_id){
		$this->db->select('*');
        $this->db->from('images');
        $this->db->where(['images.product_id' =>$product_id]);
        return $this->db->get()->result();
	}

	public function getWinners(){
		$this->db->select('products.id,products.product_name,products.image,users.first_name,users.last_name');
        $this->db->from('winers');
        $this->db->join('products', 'products.id = winers.product_id', 'left');
        $this->db->join('users', 'users.id = winers.user_id', 'left');
		return  $this->db->get()->result();
	}
}
