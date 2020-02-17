<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "/third_party/razorpay/Razorpay.php");
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Home extends CI_Controller {


	public function getSoltOutCount($product_id){
		// echo $product_id;
		return $this->db->get_where('sold_tickets',array('product_id' => $product_id))->num_rows();
	}

	public function index()
	{
		
        $data['products'] = $this->fetch_products_and_tickets();
		$this->load->view('index',$data);
	}

	public function loadView($id){
		 $data['product'] = $this->fetch_product_and_ticket($id);
		 $data['images'] = $this-> fetch_images($id);
		 $data['products'] = $this->fetch_products_and_tickets();
		 $x = $data['product']->sold_count;
		 $total = $data['product']->ticket_count;
		 $data['percentage'] = ($x*100)/$total;
		 // echo $data['percentage'];
		$this->load->view('product_view',$data);
	}

	private function fetch_product_and_ticket($product_id){
		$this->load->database();
		$this->db->select('*');
        $this->db->from('products');
        $this->db->join('tickets', 'products.id = tickets.product_id', 'left');
        $this->db->where(['tickets.product_id' =>$product_id]);
        return $this->db->get()->row();
	}

	private function fetch_products_and_tickets(){
		$this->load->database();
		$this->db->select('*');
        $this->db->from('products');
        $this->db->join('tickets', 'products.id = tickets.product_id', 'left');
        return $this->db->get()->result();
	}

	private function fetch_images($product_id){
		$this->load->database();
		$this->db->select('*');
        $this->db->from('images');
        $this->db->where(['images.product_id' =>$product_id]);
        return $this->db->get()->result();
	}

	public function loginUser(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$query = $this->db->get_where('users',array('user_name' => $username, 'password' => $password));
		if($query->num_rows() == 1){
			$user_array=array(
				'user_id' => $query->row()->id,
				'user_name' => $username
			);

			$this->session->set_userdata($user_array);
			// print_r($this->session->userdata());
			redirect('index.php/Homes');
		}
	}

	public function registerUser(){
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$phone = $this->input->post('phone');
		$data = array('user_name' => $username, 'email' => $email, 'password' => $password, 'phone'=> $phone);
		$users = $this->db->insert('users', $data)->row();
		if($this->db->affected_rows()>0){
			redirect('index.php/Home/loadPage/login');
		}
	}

	public function loadPage($page){
		if($page === 'login' && $this->session->has_userdata('user_id')){
			redirect(base_url('index.php/Home'));
		}
		$this->load->view($page);
	}

	public function checkUserLogin($id){
		if($this->session->has_userdata('user_id')){
			$tickets = $this->ModelCommon->getSingleData('tickets',array('product_id'=>$id));
			if($tickets['sold_count'] !== $tickets['ticket_count']){
				redirect('index.php/Home/makePaymentForTicket/'.$id);
			}else{
				redirect('index.php/Home');
			}
			
		}else{
			redirect('index.php/Home/loadPage/login');
		}
	}

	function makePaymentForTicket($id){
        		$member_id=$this->session->userdata('user_id');
        		// echo 'user_id : '.$member_id.'<br>';
		        $userDetails    = $this->ModelCommon->getMyProfile($member_id);
		        // print_r($userDetails);die();
		        // $payment_price=$this->ModelCommon->getPrice($id); //get price from db
		        $payment_price = 1;
		        // echo 'payment price : '.$payment_price.'<br>';die();

		        $keyId = RAZORPAY_KEY_ID;
                $keySecret = RAZORPAY_KEY_SECRET;
                $displayCurrency = 'INR';

                // echo $keyId.' '.$keySecret;die();

                $amount=$payment_price;
                $this->session->set_userdata('amount',$amount);
                $api = new Api($keyId, $keySecret);

                $orderData = [
                    'receipt'         => mt_rand(1000, 9999),
                    'amount'          => $amount * 100, // 2000 rupees in paise
                    'currency'        => 'INR',
                    'payment_capture' => 1 // auto capture
                ];

                $razorpayOrder = $api->order->create($orderData);
                // print_r($razorpayOrder);die();
                $rOrder=array('payment_request_id'=>$razorpayOrder['id'],'user_id'=>$this->session->userdata('user_id'),'product_id' => $id,'amount'=>(float)$amount,'created_date'=>date('Y-m-d H:i:s'),'payment_from'=>'razorpay','status'=>$razorpayOrder['status']);
                // print_r($rOrder);die();
                $rr=$this->ModelCommon->insertData('payment',$rOrder); //insert value in db
                // echo ' rr '.$rr;die();

                $this->session->set_userdata('razorpay_insert_id',$rr);
                $razorpayOrderId = $razorpayOrder['id'];
                $_SESSION['razorpay_order_id'] = $razorpayOrderId;
                $displayAmount = $amount = $orderData['amount'];
                $data = [
                    "key"               => $keyId,
                    "amount"            => $amount,
                    "name"              => "Wins",
                    "description"       => "",
                    "image"             => "",
                    "prefill"           => [
                        "name"              => $userDetails->user_name,
                        "email"             => $userDetails->email,
                        "contact"           => $userDetails->phone,
                    ]            ,
                    "theme"             => [
                        "color"             => "#C79D66"
                    ],
                    "order_id"          => $razorpayOrderId,
                ];

                $json = json_encode($data);



                $html='<form name="razorpay_payment" action="'.base_url().'index.php/Home/razorpayresponse" method="POST">
                       <script src="https://checkout.razorpay.com/v1/checkout.js"
                    data-key="'.$data['key'].'"
                    data-amount="'.$data['amount'].'"
                    data-currency="INR"
                    data-buttontext="Confirm Payment"
                    data-name="'.$data['name'].'"
                    data-image="'.$data['image'].'"
                    data-description="'.$data['description'].'"
                    data-prefill.name="'.$data['prefill']['name'].'"
                    data-prefill.email="'.$data['prefill']['email'].'"
                    data-prefill.contact="'.$data['prefill']['contact'].'"
                    data-order_id="'.$data['order_id'].'"';

                $html.='></script>

                </form>
                ';
               	$data['html']=$html;
	            $this->load->view('razorpay',$data);
			

    }

    public function razorpayresponse(){
        $keyId = RAZORPAY_KEY_ID;
        $keySecret = RAZORPAY_KEY_SECRET;
        $amount=$this->session->userdata('amount');
        // echo $amount;die();
        $success = true;
        $error = "Payment Failed";
        if (empty($_POST['razorpay_payment_id']) === false)
        {
            $api = new Api($keyId, $keySecret);

            try
            {
                $attributes = array(
                    'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                    'razorpay_signature' => $_POST['razorpay_signature']
                );

                $api->utility->verifyPaymentSignature($attributes);
            }
            catch(SignatureVerificationError $e)
            {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
        }
        $response_data=array();
        if ($success === true){

            $p_data=$this->ModelCommon->getSingleData('payment',array('id'=>$this->session->userdata('razorpay_insert_id')));
           	//razorpay_order_id
            $ndata=array();
            $ndata['payment_id']         = $_POST['razorpay_payment_id'];
            $ndata['payment_request_id'] = $_SESSION['razorpay_order_id'];
            $ndata['status']             = 'Paid';
            $ndata['signature']=$_POST['razorpay_signature'];
            // print_r($ndata);die();
            $result=$this->ModelCommon->updateData('payment',$ndata,array('id'=>$this->session->userdata('razorpay_insert_id')));

            // print_r($result);echo $this->session->userdata('razorpay_insert_id');die();
            $payment_data = $this->ModelCommon->getSingleData('payment',array('id'=>$this->session->userdata('razorpay_insert_id')));
            $product_id = $payment_data['product_id'];
            $tx_data = array(
            	'user_id' =>$this->session->userdata('user_id'),
            	'product_id'=>$product_id,
            	'transaction_id'=>$payment_data['payment_id'],
            	'amount' => $amount,
            	'payment_by' => 'User',
            	'status' => 1
            );
            $rr=$this->ModelCommon->insertData('transactions',$tx_data); //insert value in db
            // echo $rr;
             $ticket = $this->ModelCommon->getSingleData('tickets',array('product_id'=> $product_id));
            // print_r($ticket);die();
            if($ticket['sold_count'] < $ticket['ticket_count']){
            	$ndata = array(
            			'sold_count' => $ticket['sold_count']+1
            	); 
            	// print_r($ticket);die();
            	$result=$this->ModelCommon->updateData('tickets',$ndata,array('id'=>$ticket['id']));

            }
            $up_sold = array(
            	'product_id' => $product_id,
            	'user_id' => $this->session->userdata('user_id'),
            	'token' => '#'.$this->random_strings(5)
            );
            $rs = $this->ModelCommon->insertData('sold_tickets',$up_sold);
            $this->session->set_flashdata('payment_msg','Payment Is Successful. PLease chekc your Email');
            $this->session->unset_userdata('razorpay_payment_id');
            $this->session->unset_userdata('payment_method');
            $this->session->set_userdata('succmsg','You have been successfully added money to your wallet');

         //    $params['member_id'] = $this->session->userdata('user_id');
	        // $apiUrl =  API_URL.'getDeviceToken';
	        // $jsonResponce = $this->functions->httpPost($apiUrl,$params);
	        // $updateResponce = json_decode($jsonResponce,true);
	        // if($updateResponce['status']){
	        // 	$device_token = $updateResponce['data']['device_token'];
	        // 	$message="Your transaction done successfully.";
	        // 	$this->push_notification_android($device_token,$message);
	        // }

			redirect(base_url('index.php/Home'));
        }else{

        	$payment_data = $this->ModelCommon->getSingleData('payment',array('id'=>$this->session->userdata('razorpay_insert_id')));
            $tx_data = array(
            	'user_id' =>$this->session->userdata('user_id'),
            	'product_id'=>$payment_data['product_id'],
            	'transaction_id'=>$payment_data['payment_id'],
            	'amount' => $amount,
            	'payment_by' => 'User'
            );
            $rr=$this->ModelCommon->insertData('transactions',$tx_data);

            
        	$this->session->unset_userdata('razorpay_payment_id');
            $this->session->unset_userdata('payment_method');
            $this->session->set_userdata('succmsg','You have been successfully added money to your wallet');
           	$this->session->set_userdata('succmsg','You have been successfully added money to your wallet');
			redirect(base_url('index.php/Home'));
        }

    }

    public function mailUser(){
		    	//Load email library
		$this->load->library('email');
		 
		//SMTP & mail configuration
		$config = array(
		            'protocol' => 'smtp', 
		            'smtp_host' => 'smtp.gmail.com', 
		            'smtp_port' => 587, 
		            'smtp_user' => 'adarshkewat11@gmail.com', 
		            'smtp_pass' => '24688@kewat', 
		            'mailtype' => 'html', 
		            'TLS/SSL required' => true
		);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		 
		//Email content
		$htmlContent = '<h1>Sending email via Gmail SMTP server</h1>';
		$htmlContent .= '<p>This email has sent via Gmail SMTP server from CodeIgniter application.</p>';
		 
		$this->email->to('adarshkewat11@gmail.com');
		$this->email->from('adarshkewat11@gmail.com','MyWebsite');
		$this->email->subject('How to send email via Gmail SMTP server in CodeIgniter');
		$this->email->message($htmlContent);
		 
		//Send email
		$this->email->send();if($this->email->send())
        {
            echo "Mail Sent Successfully";
        }
        else
        {
            echo "Failed to send email";
            show_error($this->email->print_debugger());             
                }
    }

    function random_strings($length_of_string) 
	{ 
	  
	    // String of all alphanumeric character 
	    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
	  
	    // Shufle the $str_result and returns substring 
	    // of specified length 
	    return substr(str_shuffle($str_result),  
	                       0, $length_of_string); 
	} 

	function token(){
		echo "#".$this->random_strings(5)."  ".$this->random_strings(5)." ".$this->random_strings(5);
	}
	
}
