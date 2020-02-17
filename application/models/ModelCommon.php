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
		$result=$this->db->insert($tbl_name,$data);
		return $this->db->insert_id();
	}

	public function getSingleData($tbl_name,$where){
		return $this->db->get_where($tbl_name,$where)->row_array();
	}

	public function updateData($tbl_name,$data,$check){
		$result=$this->db->update($tbl_name,$data,$check);
		return true;
	}
}
