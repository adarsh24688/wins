<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "/third_party/razorpay/Razorpay.php");
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Home extends CI_Controller {

	public function index(){
        if ($this->session->has_userdata('paymentStarted')) {
            $this->session->unset_userdata('paymentStarted');
        }
        $data['products'] = $this->ModelCommon->fetch_products_and_tickets();
        $data['user_id'] = $this->session->userdata('user_id');
        $this->load->view('header',$data);
		$this->load->view('index',$data);
        $this->load->view('footer',$data);
	}

	public function loadView($id){
        if(!$this->ModelCommon->checkProductInDB($id)){
            // $this->load->view('404');
            show_404();
        }

        if ($this->session->has_userdata('paymentStarted')) {
            $this->session->unset_userdata('paymentStarted');
        }



        $data['product'] = $this->ModelCommon->fetch_product_and_ticket($id);
		 $data['images'] = $this->ModelCommon->fetch_images($id);
		 $data['products'] = $this->ModelCommon->fetch_products_and_tickets();
		 $x = $data['product']->sold_count;
		 $total = $data['product']->ticket_count;
		 $data['percentage'] = ($x*100)/$total;
         $data['user_id'] = $this->session->userdata('user_id');
         if (isset($_GET['qty'])) {
             $data['quantity'] = $_GET['qty'];
         } else {
             $data['quantity'] = 1;
         }
        $this->load->view('header',$data);
		$this->load->view('product_view',$data);
        $this->load->view('footer',$data);
	}

	public function loginUser(){
		$username = $this->input->post('phone');
        $password = $this->input->post('password');
        $product_id = $_GET['prod'];
        $product_qty = $_GET['qty'];
		$query = $this->db->get_where('users',array('phone' => $username, 'password' => $password));
		if($query->num_rows() == 1){
			$user_array=array(
				'user_id' => $query->row()->id,
				'name' => $username
			);

			$this->session->set_userdata($user_array);
            // print_r($this->session->userdata());
            if (isset($_GET['prod']) && isset($_GET['qty'])) {
                redirect('index.php/Home/loadView/'.$_GET['prod'].'?qty='.$_GET['qty']);
            } else {
                redirect('index.php/Home');
            }
		}else{
            $this->session->set_flashdata('login_msg','Please try Again');
            redirect('index.php/Home/loadPage/login');
        }
	}

	public function registerUser(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('phone','Phone','min_length[10]|max_length[10]|is_unique[users.phone]|numeric');
        $this->form_validation->set_rules('name','Name','regex_match[/^[a-zA-Z ]*$/]');
        $this->form_validation->set_message('regex_match','{field} Should contain Alphabets only');
        if ($this->form_validation->run() == TRUE){
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $phone = $this->input->post('phone');
            $state = (int)$this->input->post('state');
            $address = $this->input->post('address');
            $data = array(
                'name' => $name, 
                'email' => $email, 
                'password' => $password, 
                'phone'=> $phone,
                'address' => $address,
                'state_id' => $state
            );
            $user_id = $this->ModelCommon->insertData('users',$data);
            // echo $password;die();
            if($this->db->affected_rows()>0){
                if($this->session->has_userdata('error')){
                    $this->session->unset_userdata('error');
                }
                $this->session->set_flashdata('registered','Registered Successfully');
                redirect('index.php/Home/loadPage/login');
            }	
        }else{
            $data['states'] = $this->ModelCommon->getMultipleData('state');
            $data['user_id'] = $this->session->userdata('user_id');
            $this->load->view('register',$data);
        }
	}

    public function UpdateUser(){
        $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $data = array( 
                'email' => $email,  
                'phone'=> $phone,
                'name' => $name,
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
        if (isset($_GET['prod'])) {
            $product_id = $_GET['prod'];
            $data['productId'] = $product_id;
        }    

        if (isset($_GET['qty'])) {
            $product_qty = $_GET['qty'];
            $data['productQty'] = $product_qty;
        }    

		if($page === 'login' && $this->session->has_userdata('user_id')){
			redirect(base_url('index.php/Home'));
		}
        elseif($page === 'user_profile'){
            $data['tickets'] = $this->ModelCommon->fetchSoldTicketsWithProduct();
            $data['count'] = $this->ModelCommon->countRow('sold_tickets',array('user_id'=>$this->session->userdata('user_id')));
        }
        elseif($page === 'winners'){
            $data['winners'] = $this->ModelCommon->getWinners();
        }elseif($page === 'register'){
            $data['user_id'] = $this->session->userdata('user_id');
            $data['states'] = $this->ModelCommon->getMultipleData('state');
            $this->load->view($page,$data);
        }
        // print_r($data);die();
        if($page !== 'register'){
            $data['user'] = $this->ModelCommon->getMyProfile();
            $data['user_id'] = $this->session->userdata('user_id');
            $this->load->view('header',$data);
            $this->load->view($page,$data);
            $this->load->view('footer');
        }

        // print_r($this->ModelCommon->getWinners());
	}

	public function checkUserLogin($id){
        // echo gettype((int)$this->input->post('quantity'));die();
        $productQuantity = $this->input->post('quantity');
		if($this->session->has_userdata('user_id')){
			$tickets = $this->ModelCommon->getSingleData('tickets',array('product_id'=>$id));
			if($tickets['sold_count'] !== $tickets['ticket_count']){
                $this->session->set_userdata('quantity',$this->input->post('quantity'));
                $this->session->set_userdata('paymentStarted', true);
				redirect('index.php/Home/makePaymentForTicket/'.$id);
			}else{
				redirect('index.php/Home');
			}
			
		}else{
			redirect('index.php/Home/loadPage/login?prod='.$id.'&qty='.$productQuantity);
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
        if (!$this->session->userdata('paymentStarted')) {
            if ($id) {
                redirect('index.php/Home/loadView/'.$id);
            } else {
                redirect('index.php/Home');
            }
            return;
        }



        if($this->authenticateUserLogin()){
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
                        "name"              => $userDetails->name,
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
                $data['user_id'] = $this->session->userdata('user_id');
                $this->load->view('header',$data);
                $this->load->view('razorpay',$data);
                $this->load->view('footer');
        }else{
            redirect('index.php/Home');
        }

        if ($this->session->has_userdata('paymentStarted')) {
            $this->session->unset_userdata('paymentStarted');
        }
                
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

            $token_array = array();
            //here goes the logic if quantity is greater than 1
            //generating token for multiple quantity
            //if its 1 then token with '#' => #token
            // more than 1 
            //#token, #token+1, #token+2......
            for($i=0; $i<(int)$this->session->userdata('quantity');$i++){
                $value = $this->ModelCommon->fetchTicketValue();
                $token_array[] = $value;
                $this->ModelCommon->updateData('ticket_number',array('value'=> $value+1),array('id'=>1));
                
            }
            
            foreach($token_array as $token){
                echo $token.'<br>';
                $this->ModelCommon->insertData('sold_tickets',array(
                     'product_id' => $product_id,
                     'user_id' => $this->session->userdata('user_id'),
                     'token' => $token
                    ));
            }
            $this->session->set_flashdata('payment_msg','Payment Is Successful. PLease check your Email');
            $this->session->unset_userdata('razorpay_payment_id');
            $this->session->unset_userdata('payment_method');
            // $this->session->set_userdata('succmsg','You have been successfully added money to your wallet');

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
        $this->session->unset_userdata('paymentStarted');
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

    private function authenticateUserLogin(){
        if($this->session->has_userdata('user_id')){
            return true;
        }else{
            return false;
        }
    }

    public function clearError(){
        $this->session->unset_userdata('error');
        json_encode(1);
    }
	
}
