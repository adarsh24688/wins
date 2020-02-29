<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index(){
		$this->load->helper('text');
		$data['products'] = $this->ModelCommon->getMultipleData('products',array());
		$data['tickets'] = $this->ModelCommon->fetch_products_and_tickets();
		$data['user_is'] = $this->session->userdata('user_id');
		// print_r(count($data['products']));die();
		$this->load->view('admin/header');
		$this->load->view('admin/admin_home',$data);
		$this->load->view('admin/footer');
	}

	public function fetchProductDetails(){
		$data = $this->ModelCommon->fetch_product_and_ticket($this->input->post('product_id'));
		echo json_encode($data);
	}

	public function deleteProduct(){
		$data = array('is_deleted'=>1,'updated_date' => date('Y-m-d H:i:s'));
		$this->ModelCommon->UpdateData('products',$data,array('id'=>$this->input->post('product_id')));
		echo json_encode("deleted");
	}

	public function addProduct(){
		// print_r($this->input->post('userfile[]'));
		$this->load->library('upload');
	    $dataInfo = array();
	    $files = $_FILES;
	    $cpt = count($_FILES['userfile']['name']);
	    for($i=0; $i<$cpt; $i++)
	    {           
	        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

	        $this->upload->initialize($this->set_upload_options());
	        $this->upload->do_upload();
	        $dataInfo[] = $this->upload->data();
	    }
	    // print_r($dataInfo[1]['file_name']);
	    // echo $dataInfo[0]['file_name'];
	    $pdata = array(
	    	'product_name' => $this->input->post('product_name'),
	    	'image' => $dataInfo[0]['file_name'],
	    	'description' => $this->input->post('description')
	    );
	    $pid = $this->ModelCommon->insertData('products',$pdata);
	    $tdata = array(
	    	'product_id' => $pid,
	    	'ticket_price' => $this->input->post('ticket_price'),
	    	'ticket_count'=> $this->input->post('ticket_count')
	    );
	    $tid = $this->ModelCommon->insertData('tickets',$tdata);
	    for($i=0;$i<count($dataInfo);$i++){
	    	$data = array('product_id'=>$pid,'image_name'=>$dataInfo[$i]['file_name']);
	    	$this->ModelCommon->insertData('images',$data);
	    }
	    $this->session->set_flashdata('product_insert_msg','Product Added Successfully');
	    redirect(base_url('index.php/Admin'));
	}

	public function updateProduct($product_id){
		// echo gettype((int)$this->input->post('is_deleted'));
		$pdata = array(
	    	'product_name' => $this->input->post('product_name'),
	    	'is_deleted' => (int)$this->input->post('is_deleted'),
	    	'description' => $this->input->post('description'),
	    	'updated_date' => date('Y-m-d')
	    );
	    $this->ModelCommon->updateData('products',$pdata,array('id'=>$product_id));
	    $tdata = array(
	    	'product_id' => $product_id,
	    	'ticket_price' => $this->input->post('ticket_price'),
	    	'ticket_count'=> $this->input->post('ticket_count'),
	    	'updated_date' => date('Y-m-d')
	    );
	    $this->ModelCommon->updateData('tickets',$tdata,array('id'=>$product_id));
	    $this->session->set_flashdata('product_update_msg','Product Updated Successfully');
	    redirect('index.php/Admin');
	}

	public function authenticateLogin(){
		if($this->session->has_userdata('admin_id')){
			return true;
		}else{
			return false;
		}
	}

	private function set_upload_options(){   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = './assets/images/products/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $config['max_size']      = '0';
	    $config['overwrite']     = TRUE;

	    return $config;
	}
}
