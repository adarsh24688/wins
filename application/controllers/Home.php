<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "/third_party/razorpay/Razorpay.php");
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Home extends CI_Controller {

	public function index(){	
        $data['products'] = $this->ModelCommon->fetch_products_and_tickets();
        $data['user_id'] = $this->session->userdata('user_id');
        $this->load->view('header',$data);
		$this->load->view('index',$data);
        $this->load->view('footer',$data);
	}

	public function loadView($id){
        $data['product'] = $this->ModelCommon->fetch_product_and_ticket($id);
		 $data['images'] = $this->ModelCommon->fetch_images($id);
		 $data['products'] = $this->ModelCommon->fetch_products_and_tickets();
		 $x = $data['product']->sold_count;
		 $total = $data['product']->ticket_count;
		 $data['percentage'] = ($x*100)/$total;
         $data['user_id'] = $this->session->userdata('user_id');
        $this->load->view('header',$data);
		$this->load->view('product_view',$data);
        $this->load->view('footer',$data);
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
			redirect('index.php/Home');
		}else{
            $this->session->set_flashdata('login_msg','Please try Again');
            redirect('index.php/Home/loadPage/login');
        }
	}

	public function registerUser(){
        $config['upload_path'] = "./assets/images/users/";
        $config['allowed_types'] = "png|jpg|jpeg";
        $config['max_size'] = 100;
        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
            $img = $this->upload->data();
            $image = $img['file_name'];
            $username = $this->input->post('user_name');
            $firstname = $this->input->post('first_name');
            $lastname = $this->input->post('last_name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $phone = $this->input->post('phone');
            $data = array(
                'user_name' => $username, 
                'email' => $email, 
                'password' => $password, 
                'phone'=> $phone,
                'first_name' => $firstname,
                'last_name' => $lastname,
                'image' => $image
            );
            $user_id = $this->ModelCommon->insertData('users',$data);
            if($this->db->affected_rows()>0){
                redirect('index.php/Home/loadPage/login');
            }
        }else{
            echo 'error '.$this->upload->display_errors();
        }		
	}

    public function UpdateUser(){
        $firstname = $this->input->post('first_name');
            $lastname = $this->input->post('last_name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $data = array( 
                'email' => $email,  
                'phone'=> $phone,
                'first_name' => $firstname,
                'last_name' => $lastname,
                'updated_date' => date('Y-m-d H:i:s')
            );
            $user_id = $this->ModelCommon->updateData('users',$data,array('id'=> $this->session->userdata('user_id')));
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('user_msg','Profile Updated');
                redirect('index.php/Home/loadPage/user_profile');
            }
        // $config['upload_path'] = "./assets/images/users/";
        // $config['allowed_types'] = "png|jpg|jpeg";
        // $config['max_size'] = 100;
        // $this->load->library('upload',$config);
        // if($this->upload->do_upload('userfile')){
        //     $img = $this->upload->data();
        //     $image = $img['file_name'];
        //     $firstname = $this->input->post('first_name');
        //     $lastname = $this->input->post('last_name');
        //     $email = $this->input->post('email');
        //     $phone = $this->input->post('phone');
        //     $data = array( 
        //         'email' => $email,  
        //         'phone'=> $phone,
        //         'first_name' => $firstname,
        //         'last_name' => $lastname,
        //         'image' => $image
        //     );
        //     $user_id = $this->ModelCommon->updateData('users',$data,array('id'=> $this->session->userdata('user_id')));
        //     if($this->db->affected_rows()>0){
        //         redirect('index.php/Home/loadPage/user_profile');
        //     }
        // }else{
        //     echo 'error '.$this->upload->display_errors();
        // }
    }

	public function loadPage($page){
		if($page === 'login' && $this->session->has_userdata('user_id')){
			redirect(base_url('index.php/Home'));
		}
        elseif($page === 'user_profile'){
            $data['tickets'] = $this->ModelCommon->fetchSoldTicketsWithProduct();
            $data['count'] = $this->ModelCommon->countRow('sold_tickets',array('user_id'=>$this->session->userdata('user_id')));
        }
        elseif($page === 'winners'){
            $data['winners'] = $this->ModelCommon->getWinners();
        }

        $data['user'] = $this->ModelCommon->getMyProfile();
        $data['user_id'] = $this->session->userdata('user_id');
        $this->load->view('header',$data);
		$this->load->view($page,$data);
        $this->load->view('footer');
        // print_r($this->ModelCommon->getWinners());
	}

	public function checkUserLogin($id){
        // echo gettype((int)$this->input->post('quantity'));die();
		if($this->session->has_userdata('user_id')){
			$tickets = $this->ModelCommon->getSingleData('tickets',array('product_id'=>$id));
			if($tickets['sold_count'] !== $tickets['ticket_count']){
                $this->session->set_userdata('quantity',$this->input->post('quantity'));
				redirect('index.php/Home/makePaymentForTicket/'.$id);
			}else{
				redirect('index.php/Home');
			}
			
		}else{
			redirect('index.php/Home/loadPage/login');
		}
        // echo $this->input->post('quantity');
	}

    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');
        // echo 'user_id : '.$this->session->userdata('user_id');
        redirect('index.php/Home');
    }

	function makePaymentForTicket($id){
                //userid from session
        		$member_id=$this->session->userdata('user_id');
        		//user detail from db
		        $userDetails    = $this->ModelCommon->getMyProfile();
		        // print_r($userDetails);die();
                //price for ticket
		        $payment_price=$this->ModelCommon->getPrice($id); //get price from db
		        // $payment_price = 1;
                $payment_price = $payment_price * (int)$this->session->userdata('quantity');
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
            			'sold_count' => $ticket['sold_count'] + (int)$this->session->userdata('quantity')
            	); 
            	// print_r($ticket);die();
            	$result=$this->ModelCommon->updateData('tickets',$ndata,array('id'=>$ticket['id']));

            }

            $token_string = $this->random_strings(5);
            $token_array = array();
            //here goes the logic if quantity is greater than 1
            //generating token for multiple quantity
            //if its 1 then token with '#' => #token
            // more than 1 
            //#token, #token+1, #token+2......
            for($i=0; $i<(int)$this->session->userdata('quantity');$i++){
                if($i == 0){
                    $token_array[] = '#'.$token_string;
                }else{
                    $token_array[] = '#'.$token_string.'+'.$i;
                }
                
            }
            
            foreach($token_array as $token){
                echo $token.'<br>';
                $this->ModelCommon->insertData('sold_tickets',array(
                     'product_id' => $product_id,
                     'user_id' => $this->session->userdata('user_id'),
                     'token' => $token
                    ));
            }
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

    public function mailUser()
    {
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

	function token()
    {
		echo "#".$this->random_strings(5)."  ".$this->random_strings(5)." ".$this->random_strings(5);
	}
	
}
