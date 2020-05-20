<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Authentication extends REST_Controller {

    public function __construct() 
    { 
    	 
        parent::__construct();

        // Load the user model
        $this->load->library('session');
        $this->load->model('Api/LoginApiModel');
        
    }
    
    public function login_old_post() 
    {
        
        $email = $this->post('email');
        $password = $this->post('password');
        $phone_number = $this->post('phone_number');
        $login_type = $this->post('login_type');
        $firebase_token = $this->post('firebase_token');
        
        if((!empty($email)||!empty($phone_number)) && !empty($login_type))
        {
            if(!empty($phone_number))
            {
             $con = array('phone_number' => $phone_number,'password' => $password);
            }
            else 
            {
             $con = array('email' => $email,'password' => $password);
            }
             
             $user = $this->LoginApiModel->getRows($con,$login_type,$firebase_token);
             unset($user['data']->password);
             // unset($user['data']->username);
            if(!empty($user['data']))
            {
                     $this->response([
                    'status' => TRUE,
                    'message' => $user['message'],
                    'loggged_in_as'=>$user['logged_as'],
                    'data' => $user['data']
                ], REST_Controller::HTTP_OK);

            }
            else
            {
                // Set the response and exit
                //BAD_REQUEST (400) being the HTTP response code
                $this->response([
                    'status' => TRUE,
                    'message' => $user['message'],
                    
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }

        else
        {
            // Set the response and exit
            $this->response([
            'status' => FALSE,
            'message' => "Provide email and password.",

            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


     public function login_post() 
    {  
        $email = $this->post('email');
        $password = $this->post('password');
        $phone_number = $this->post('phone_number');
        $login_type = $this->post('user_type');
        
        if(!empty($phone_number) && !empty($login_type))
        {
            if(!empty($phone_number))
            {
             $con = array('phone_number' => $phone_number);
            }
            
             $user = $this->LoginApiModel->getRows($con,$login_type);
             unset($user['data']->password);
             // unset($user['data']->username);
            if(!empty($user['data']))
            {
                     $this->response([
                    'status' => TRUE,
                    'message' => $user['message'],
                    'loggged_in_as'=>$user['logged_as'],
                    'data' => $user['data']
                ], REST_Controller::HTTP_OK);

            }

            else
            {
                // Set the response and exit
                //BAD_REQUEST (400) being the HTTP response code
                $this->response([
                    'status' => TRUE,
                    'message' => $user['message'],
                    
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
        else
        {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => "Provide email and password.",
               
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function generateOtp_post(){
        $phone_number = $this->post('phone');
        $forget_type  = $this->post('user_type');
        $user = $this->LoginApiModel->checkPhoneNumber($forget_type,$phone_number);
        if(!$user)
        {
            $this->response([
            'status' => FALSE,
            'message' => 'Phone number not Exist.',
           ], REST_Controller::HTTP_OK);    
        }
        else 
        {
            // $this->session->set_userdata('mob',$phone_number);
            $otp = rand(1000, 9999);
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "http://trans.smsfresh.co/api/sendmsg.php?user=Live7update&pass=123456&sender=LIVUPD&phone=".$phone_number."&text=".$otp."&priority=ndnd&stype=normal"); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            $output = curl_exec($ch); 
            curl_close($ch); 
            $array_data = array('otp'=>$otp,"Phone"=>$phone_number,"type"=>$forget_type);
            $this->LoginApiModel->UpdateOtp($array_data);
            $this->response([
            'status' => TRUE,
            'message' => 'Your Otp is Valid for 60 seconds',
            'otp' =>$otp,
            'phone_number'=>$phone_number,
           ], REST_Controller::HTTP_OK); 
        }
       
    }


     public function otpVarification_post(){
        
        $otp1 = $this->post('otp');
        $phone_number = $this->post('mobile');
        $forget_type  = $this->post('user_type');
        $fcm_token   = $this->post('fcm_token');

        if($forget_type == 2){
            $table = 'Doctors';
          }
          else {
            $table = 'Patients';
          }
        
        $query = $this->db->query("SELECT id, username, dob, gender, address, image, phone_number,status,Firebase_token,otp FROM $table where phone_number='".$phone_number."'");
        $row = $query->row();
        $session = $this->session->userdata('session_'.$otp1);
        if(!empty($row->otp))
        {
            
            if($forget_type==1){
                $query = $this->db->query("SELECT id, username, dob, gender, address, image, phone_number,status,Firebase_token,otp FROM Patients where phone_number='".$phone_number."'");
                $row = $query->row();

                $whereData  = array('id' =>$row->id , );
                $updateData  = array('Firebase_token' =>$fcm_token , );
                $update_token = $this->LoginApiModel->update('Patients',$updateData,$whereData);

                if ($update_token) {

                    $query1 = $this->db->query("SELECT id, username, dob, gender, address, image, phone_number,status,Firebase_token,otp FROM Patients where phone_number='".$phone_number."'");
                    $row1 = $query1->row();

                    $this->response([
                        'status' => TRUE,
                        'data'=>$row,
                        'message' => 'Correct Otp',
                    ], REST_Controller::HTTP_OK); 
                    $this->session->unset_userdata('session_'.$phone_number);
                    
                }else{
                     $this->response([
                        'status' => FALSE,
                        'message' => 'Fcm token not update ',
                    ], REST_Controller::HTTP_BAD_REQUEST); 
                }


               
            }else if($forget_type==2){
               $query = $this->db->query("SELECT id, username, phone_number,otp,Vehicle_Type FROM Doctors where phone_number='".$phone_number."'");
                $row = $query->row(); 

                $whereData  = array('id' =>$row->id , );
                $updateData  = array('Firebase_token' =>$fcm_token , );
                $update_token = $this->LoginApiModel->update('Doctors',$updateData,$whereData);

                if ($update_token) {

                     $query11 = $this->db->query("SELECT id, username, phone_number,otp,Vehicle_Type,Firebase_token FROM Doctors where phone_number='".$phone_number."'");
                    $row11 = $query11->row(); 

                    $this->response([
                        'status' => TRUE,
                        'data'=>$row11,
                        'message' => 'Correct Otp',
                    ], REST_Controller::HTTP_OK); 
                    $this->session->unset_userdata('session_'.$phone_number);

                }else{

                    $this->response([
                        'status' => FALSE,
                        'message' => 'Fcm token not update ',
                    ], REST_Controller::HTTP_BAD_REQUEST); 

                }

                
            }else{
              $row = array();
              $this->response([
                'status' => TRUE,
                'data'=>$row,
                'message' => 'Correct Otp',
                ], REST_Controller::HTTP_OK); 
                $this->session->unset_userdata('session_'.$phone_number);
            }
            
        }
        else 
        {
            $this->response([
            'status' => FALSE,
            'message' => 'Otp Not Found',
            ], REST_Controller::HTTP_BAD_REQUEST); 
        }
    }

    public function changePassword_post()
    {
        $phone_number = $this->post('phone_number');
        $user_type = $this->post('user_type');
        $new_password = $this->post('password');

        if($this->LoginApiModel->changePassword($phone_number,$new_password,$user_type))
        {
            $this->response([
            'status' => TRUE,
            'message' => 'Password Changed',
            ], REST_Controller::HTTP_OK); 
        }
        else 
        {
            $this->response([
            'status' => FALSE,
            'message' => 'Unknown Phone Number',
            ], REST_Controller::HTTP_OK);
        }

    }

   
  
    public function User_registration_post() 
    {      
                                                 
        $username = strip_tags($this->post('username'));
        $email = strip_tags($this->post('email'));
        $password = strip_tags($this->post('password'));
        $dob = strip_tags($this->post('dob'));
        $gender = strip_tags($this->post('gender'));
        $address = strip_tags($this->post('address'));
        $phone_number = strip_tags($this->post('phone_number'));
        $fcm_token = strip_tags($this->post('fcm_token'));
        $full_name = explode(' ',$username);
        $first_name='';
        $last_name='';
        empty($full_name[0])?$first_name='':$first_name=$full_name[0];
        empty($full_name[1])?$last_name='':$last_name=$full_name[1];

        // $status = strip_tags($this->post('status'));
        if(!empty($username) && !empty($phone_number))
        {

            $userData = array(
            'username' => $username,
            //'last_name' => $last_name,
            'email' => $email,
            'password' => $password,
            'dob' =>$dob,
            'gender'=>$gender,
            'address' =>$address,
            'phone_number'=>$phone_number,
            'Firebase_token'=>$fcm_token
            );  

          
           /* if($this->LoginApiModel->checkEmail($userData['email'],1))
            {
                $this->response([
                'status' => FALSE,
                'message' => 'Email is already exist ',
                ], REST_Controller::HTTP_OK);
            }
            else*/ if($this->LoginApiModel->checkContact($userData['phone_number'],1))
            {
                $this->response([
                'status' => FALSE,
                'message' => 'phone number is already exist ',
                ], REST_Controller::HTTP_OK); 
            }

            else 
            {
                $insert = $this->LoginApiModel->insert_patient($userData);
                if(!$insert['status'])
                {
                    $this->response([
                    'status' => TRUE,
                    'message' => 'User added successfully ',
                    ], REST_Controller::HTTP_OK);
                }
                else
                {
                    $this->response([
                    'status' => FALSE,
                    'message' => 'Unable to add',
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }  

        }
        else 
        {
        $this->response([
        'status' => FALSE,
        'message' => 'Provide proper information ',
        ], REST_Controller::HTTP_OK);
        }       
    }

                
  
    public function driver_registration_post(){
        $username = strip_tags($this->post('username'));
        $email = strip_tags($this->post('email'));
        $password = strip_tags($this->post('password'));
        $dob = strip_tags($this->post('dob'));
        $gender = strip_tags($this->post('gender'));
        $Vehicle_Type = strip_tags($this->post('Vehicle_Type'));
        $address = strip_tags($this->post('address'));
        $phone_number = strip_tags($this->post('phone_number'));
        $fcm_token = strip_tags($this->post('fcm_token'));
        $user_type = strip_tags($this->post('user_type'));
        $full_name = explode(' ',$username);
        $first_name='';
        $last_name='';
        empty($full_name[0])?$first_name='':$first_name=$full_name[0];
        empty($full_name[1])?$last_name='':$last_name=$full_name[1];

        if(!empty($username) && !empty($phone_number))
        {

            $userData = array(
            'username'=>$username,
          //  'first_name' => ($first_name)?$first_name:"",
           // 'last_name' => ($last_name)?$last_name:"",
            'email' => ($email)?$email:"",
            'password' => ($password)?$password:"",
            'dob' =>($dob)?$dob:"",
            'gender'=>($gender)?$gender:"",
            'address' =>($address)?$address:"",
            'phone_number'=>$phone_number,
            'Firebase_token' =>$fcm_token,
            'user_type' => $user_type,
            'Vehicle_Type'=>$Vehicle_Type,
            );  

            if($this->LoginApiModel->checkContact($userData['phone_number'],2))
            {
                $this->response([
                'status' => FALSE,
                'message' => 'phone number is already exist ',
                ], REST_Controller::HTTP_OK); 
            }

            else 
            {
                $insert = $this->LoginApiModel->insert_doctor($userData);
                if(!$insert['status'])
                {
                    $this->response([
                    'status' => TRUE,
                    'message' => 'User added successfully ',
                    ], REST_Controller::HTTP_OK);
                }
                else
                {
                    $this->response([
                    'status' => FALSE,
                    'message' => 'Unable to add',
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }  

        }
        else 
        {
        $this->response([
        'status' => FALSE,
        'message' => 'Provide proper information ',
        ], REST_Controller::HTTP_OK);
        }

    }  




    public function editProfile_post(){
        $user_type = strip_tags($this->post('user_type'));
        $profile_id = strip_tags($this->post('profile_id'));
        $username = strip_tags($this->post('username'));
        $address = strip_tags($this->post('address'));
        $gender = strip_tags($this->post('gender')); 
        $phone_number = strip_tags($this->post('phone_number'));
        $email = strip_tags($this->post('email'));
        $dob = strip_tags($this->post('dob'));
    if(!empty($_FILES['attachment_image']['name'])){
        $config['upload_path'] = './uploads/user_profiles/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $_FILES['attachment_image']['name'];
        
        //Load upload library and initialize configuration
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('attachment_image')){
            $uploadData = $this->upload->data();
            $attachment_image = $uploadData['file_name'];
            $data['attachment_image'] = $attachment_image;
        }else{
            $attachment_image = '';
        }
    }
    else{
        $attachment_image = '';
    }
   
  // requires php5
  /*define('UPLOAD_DIR', './uploads/activity_photos/');
  $img = $_POST['photo'];
  $img = str_replace('data:image/png;base64,', '', $img);
  $img = str_replace(' ', '+', $img);
  $data = base64_decode($img);
  $file = UPLOAD_DIR . uniqid() . '.png';
  $success = file_put_contents($file, $data);
   $success ? $file : 'Unable to save the file.';*/



    if(!empty($profile_id) )

    {


    $profile_data = array('id'=>$profile_id,'username'=>$username,'address'=>$address,'gender'=>$gender,'phone_number'=>$phone_number,'email'=>$email,'dob'=>$dob,'image'=>$attachment_image);

    

      $activity = $this->LoginApiModel->editProfile($user_type,$profile_id,$profile_data);



      if($activity)

      {

        $this->response([

          'status' => TRUE,

          'message' => 'Profile updated successfully',

          'all_activities'=>$profile_data

          ], REST_Controller::HTTP_OK);

      }



      else 

      {

        $this->response([

          'status' => FALSE,

          'message' => 'Something went wrong',

          ], REST_Controller::HTTP_OK);

      }

      }

       else 

        {

        $this->response([

        'status' => FALSE,

        'message' => 'Provide proper information ',

        ], REST_Controller::HTTP_OK);

        }     

    }


 /*Booking Api*/
    public function addBooking_post(){
       	  $id = $this->db->insert_id();
       	  $pick_location = $this->post('pick_location');
       	  $drop_location = $this->post('drop_location');
       	  $vehicle_type = $this->post('vehicle_type');
       	  $pick_time = $this->post('pick_time');
       	  $pick_date = $this->post('pick_date');
       	  $stuf_name = $this->post('stuf_name');
       	  //$floor = $this->post('floor');
       	  $packaging_required = $this->post('packaging_required');
       	  $amount = $this->post('amount');
       	  $payment_type = $this->post('payment_type');
       	  $distance = $this->post('distance');
       	  $receiver_name = $this->post('receiver_name');
       	  $receiver_mobilenumber = $this->post('receiver_mobilenumber');
          $lift_facility = $this->post('lift_facility');
          $landmark = $this->post('landmark');
          $description  = $this->post('description');
          $pick_date_time = $this->post('pick_date_time');
          $user_id = $this->post('user_id');

       	  $data = array('id'=>$id,'pick_location'=>$pick_location,'drop_location'=>$drop_location,'vehicle_type'=>$vehicle_type,'pick_time'=>$pick_time,'pick_date'=>$pick_date,'stuf_name'=>$stuf_name,'packaging_required'=>$packaging_required,'amount'=>$amount,'payment_type'=>$payment_type,'distance'=>$distance,'receiver_name'=>$receiver_name,'receiver_mobilenumber'=>$receiver_mobilenumber,'lift_facility'=>$lift_facility,'landmark'=>$receiver_mobilenumber,'description'=>$description,'pick_date_time'=>$pick_date_time,'user_id'=>$user_id);

       	  /*if(!empty($_FILES['attachment_image']['name'])){
                $config['upload_path'] = './uploads/user_profiles/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['attachment_image']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('attachment_image')){
                    $uploadData = $this->upload->data();
                    $attachment_image = $uploadData['file_name'];
                    $data['attachment_image'] = $attachment_image;
                }else{
                    $attachment_image = '';
                }
          }
          else{
                $attachment_image = '';
          }*/



       	  $id = $this->LoginApiModel->user_booking($data);

       	  $booking_data = array('id'=>$id,'pick_location'=>$pick_location,'drop_location'=>$drop_location,'vehicle_type'=>$vehicle_type,'pick_time'=>$pick_time,'pick_date'=>$pick_date,'stuf_name'=>$stuf_name,'packaging_required'=>$packaging_required,'amount'=>$amount,'payment_type'=>$payment_type,'distance'=>$distance,'receiver_name'=>$receiver_name,'receiver_mobilenumber'=>$receiver_mobilenumber,'lift_facility'=>$lift_facility,'landmark'=>$receiver_mobilenumber,'description'=>$description,'pick_date_time'=>$pick_date_time,'user_id'=>$user_id);


       	  if($id){
       	      
       	      
            $booking_id = $this->db->insert_id();
                $getDoctors = $this->LoginApiModel->select('Doctors');

                if ($getDoctors) {

                    foreach($getDoctors as $key) {
                        $doctor_data[] = array('id' => $key['id']);

                        $title = 'Notification';
                        $message = 'You Have Received New Request';
                        $device_token = $key['Firebase_token'];

                        $doctor_id = $key['id'];
                        $patient_id = $user_id;

                        date_default_timezone_set("Asia/Calcutta");
                        $datetime = date('Y-m-d H:i:s');

                        $this->push_notification_android($device_token, $message, $title, $type ='');

                         $this->firebase->insertBookingMessage(
                            array(
                               'paitent_id'=>$patient_id,
                               'doctor_id'=>$doctor_id,
                               'booking_id'=>$booking_id,
                               'vehicle_type'=>$vehicle_type,
                               'message'=>'You have received a New Booking Request',
                               'title'=>'New Booking',
                               'date_time' => $datetime 
                            )
                        );
                       
                    }
                }
                
	       	  $this->response([

	          'status' => TRUE,

	          'message' => 'Booking successfully',

	          'all_activities'=>$booking_data

	          ], REST_Controller::HTTP_OK);
       	  }
       	  else{
       	  	$this->response([

	        'status' => FALSE,

	        'message' => 'Something went wrong',

	        ], REST_Controller::HTTP_OK);
       	  }

    }


    public function getBookingamount_post(){
       	  $pick_location = $this->post('pick_location');
       	  $drop_location = $this->post('drop_location');
       	  $vehicle_type = $this->post('vehicle_type');
       	  $pick_time = $this->post('pick_time');
       	  $pick_date = $this->post('pick_date');
       	  $stuf_name = $this->post('stuf_name');

       	  $packaging_required = $this->post('packaging_required');
       	  $amount = $this->post('amount');
       	  $payment_type = $this->post('payment_type');
       	  $distance = $this->post('distance');
       	  $receiver_name = $this->post('receiver_name');
       	  $receiver_mobilenumber = $this->post('receiver_mobilenumber');
          $lift_facility = $this->post('lift_facility');
          $landmark = $this->post('landmark');
          $description  = $this->post('description');
          $pick_date_time = $this->post('pick_date_time');
          $user_id = $this->post('user_id');

       	  $data = array('pick_location'=>$pick_location,'drop_location'=>$drop_location,'vehicle_type'=>$vehicle_type,'pick_time'=>$pick_time,'pick_date'=>$pick_date,'stuf_name'=>$stuf_name,'packaging_required'=>$packaging_required,'amount'=>$amount,'payment_type'=>$payment_type,'distance'=>$distance,'receiver_name'=>$receiver_name,'receiver_mobilenumber'=>$receiver_mobilenumber,'lift_facility'=>$lift_facility,'landmark'=>$receiver_mobilenumber,'description'=>$description,'pick_date_time'=>$pick_date_time,'user_id'=>$user_id);




       	  if($data){
	       	  $this->response([

	          'status' => TRUE,

	          'message' => 'Booking Amount',

	          'all_activities'=>$data

	          ], REST_Controller::HTTP_OK);
       	  }
       	  else{
       	  	$this->response([

	        'status' => FALSE,

	        'message' => 'Something went wrong',

	        ], REST_Controller::HTTP_OK);
       	  }

    }

    public function editBooking_post(){
       	  $id = $this->post('id');
       	  $pick_location = $this->post('pick_location');
       	  $drop_location = $this->post('drop_location');
       	  $vehicle_type = $this->post('vehicle_type');
       	  $pick_time = $this->post('pick_time');
       	  $pick_date = $this->post('pick_date');
       	  $stuf_name = $this->post('stuf_name');
       	  $floor = $this->post('floor');
       	  $packaging_required = $this->post('packaging_required');
       	  $amount = $this->post('amount');
       	  $payment_type = $this->post('payment_type');
       	  $distance = $this->post('distance');
       	  $receiver_name = $this->post('receiver_name');
       	  $receiver_mobilenumber = $this->post('receiver_mobilenumber');


       	  $data = array('id'=>$id,'pick_location'=>$pick_location,'drop_location'=>$drop_location,'vehicle_type'=>$vehicle_type,'pick_time'=>$pick_time,'pick_date'=>$pick_date,'stuf_name'=>$stuf_name,'floor'=>$floor,'packaging_required'=>$packaging_required,'amount'=>$amount,'payment_type'=>$payment_type,'distance'=>$distance,'receiver_name'=>$receiver_name,'receiver_mobilenumber'=>$receiver_mobilenumber);

       	  if(!empty($_FILES['attachment_image']['name'])){
                $config['upload_path'] = './uploads/user_profiles/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['attachment_image']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('attachment_image')){
                    $uploadData = $this->upload->data();
                    $attachment_image = $uploadData['file_name'];
                    $data['attachment_image'] = $attachment_image;
                }else{
                    $attachment_image = '';
                }
          }
          else{
                $attachment_image = '';
          }


          $data = array('id'=>$id,'pick_location'=>$pick_location,'drop_location'=>$drop_location,'vehicle_type'=>$vehicle_type,'pick_time'=>$pick_time,'pick_date'=>$pick_date,'stuf_name'=>$stuf_name,'floor'=>$floor,'packaging_required'=>$packaging_required,'amount'=>$amount,'payment_type'=>$payment_type,'distance'=>$distance,'attachment_image'=>$attachment_image,'receiver_name'=>$receiver_name,'receiver_mobilenumber'=>$receiver_mobilenumber);

       	  $id = $this->LoginApiModel->editBooking($data,$id);

       	  if($id){
	       	  $this->response([

	          'status' => TRUE,

	          'message' => 'Booking updated successfully',


	          ], REST_Controller::HTTP_OK);
       	  }
       	  else{
       	  	$this->response([

	        'status' => FALSE,

	        'message' => 'Something went wrong',

	        ], REST_Controller::HTTP_OK);
       	  }

    }

    public function getBooking_get(){
          
          $booking_data = $this->LoginApiModel->getBooking();

          if($booking_data){
              $this->response([

              'status' => TRUE,

              'message' => 'Booking List',

              'all_activities'=>$booking_data

              ], REST_Controller::HTTP_OK);
          }
          else{
            $this->response([

            'status' => FALSE,

            'message' => 'Unable to find the list of booking',

            ], REST_Controller::HTTP_OK);
          }

    }

    public function getProfile_post(){

          $user_type = strip_tags($this->post('user_type'));

    $profile_id = strip_tags($this->post('profile_id'));
          $user_data = $this->LoginApiModel->getprofile($profile_id,$user_type);

          if($user_data){
              $this->response([

              'status' => TRUE,

              'message' => 'User List',

              'all_activities'=>$user_data

              ], REST_Controller::HTTP_OK);
          }
          else{
            $this->response([

            'status' => FALSE,

            'message' => 'Unable to find the list of users',

            ], REST_Controller::HTTP_OK);
          }

    }



    public function getvehiclebycatid_post(){

          $cat_id = strip_tags($this->post('cat_id'));


          $user_data = $this->LoginApiModel->getvehiclebycatid($cat_id);

          if($user_data){
              $this->response([

              'status' => TRUE,

              'message' => 'Vehicle List',

              'all_vehicle'=>$user_data

              ], REST_Controller::HTTP_OK);
          }
          else{
            $this->response([

            'status' => FALSE,

            'message' => 'Unable to find the list of users',

            ], REST_Controller::HTTP_OK);
          }

    }


    public function getBookingbyuserid_post(){
          $user_id = $this->post('user_id');
          $booking_data = $this->LoginApiModel->getBookingByUserid($user_id);

          if($booking_data){
              $this->response([

              'status' => TRUE,

              'message' => 'Booking List',

              'all_activities'=>$booking_data

              ], REST_Controller::HTTP_OK);
          }
          else{
            $this->response([

            'status' => FALSE,

            'message' => 'Unable to find the list of booking',

            ], REST_Controller::HTTP_OK);
          }

    }



    public function deleteBooking_post(){

          $id = $this->post('id');
          
          $data = $this->LoginApiModel->deleteBooking($id);

          if(!empty($data)){
              $this->response([

              'status' => TRUE,

              'message' => 'Delete booking successfully',

              'data'=>$data

              ], REST_Controller::HTTP_OK);
          }
          else{
            $this->response([

            'status' => FALSE,

            'message' => 'Unable to find booking',

            ], REST_Controller::HTTP_OK);
          }

    }
    /*Booking Api*/


    /*Notification API*/
    function push_notification_android($device_id,$message,$message_info='', $type =''){
        //API URL of FCM
        $url = 'https://fcm.googleapis.com/fcm/send';
        $api_key = 'AAAAVNgEe24:APA91bHTul1yu0VI-Jb2nTjrOPW3P_yVzMdZ9p0S7Si380hCvEgqr3OENci3_ni4Mg-Doeba8bx_vBzmLNdO-lrC10s6xtxlxlaR1BugSZaEPb1K81sx2aUxP31SaSP2Q0-5B_p4zx49';

        // $fields = array (
        // 'registration_ids' => array (
        //     $device_id
        // ),
        // 'data' => array (
        //     "message" => $message
        // )
        // );

        $fields = array (
            'registration_ids' => array (
                    $device_id
            ),
            'data' => array (
                    "message" => $message,
                    'message_info' => $message_info,
            ),                
            'priority' => 'high',
            'notification' => array(
                        'title' => "Notification",
                        'body' => $message,                            
            ),
        );
        $fields = json_encode ( $fields );

        //header includes Content type and api key
        $headers = array(
        'Content-Type:application/json',
        'Authorization:key='.$api_key
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $result = curl_exec($ch);
        //echo "<pre>";print_r(json_decode($result));die;
        if ($result === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        return json_decode($result);
    }
    
   public function getBookingByVehicle_post()
  {
     
    $vehicle_type = strip_tags($this->post('vehicle_type'));
    $driver_id = strip_tags($this->post('driver_id'));
    
    $data = $this->LoginApiModel->getBookingByVehicleType($vehicle_type);


    if(!empty($data))
    {
     
      $this->response([
          'status' => TRUE,
          'message'=>'Booking list',
          'data'    =>$data 
        ], REST_Controller::HTTP_OK);
        
     

    }else{
       $this->response([
            'status' => FALSE,
            'message' =>'data not found',
            'data'    =>[]
        ], REST_Controller::HTTP_OK);
     
    }
  }

  public function bookingAcceptReject_post()
   {
     $driver_id    = strip_tags($this->post('driver_id'));
     $booking_id   = strip_tags($this->post('booking_id'));
     $status       = strip_tags($this->post('status'));

     
     if($status == 1)
     {
      $whereData  = array('id' => $booking_id);
      $data = $this->LoginApiModel->singleRowdata($whereData,'booking');
        if($data)
        {
            $whereId = array('id' => $booking_id);
            $updateStatus = array(
                'driver_id' => $driver_id,
                'is_status' => 1
            );
           
            if ($this->LoginApiModel->update('booking',$updateStatus,$whereId)) {
              $this->response([
                'status' => TRUE,
                  'message' =>'Booking Accepted Successfully'
              ], REST_Controller::HTTP_OK);
            }else{
              $this->response([
                  'status' => FALSE,
                  'message' =>'Unable To Accepted',
               
              ], REST_Controller::HTTP_OK);
            }           
        }
        else 
        {
          $this->response([
            'status' => TRUE,
            'message' => 'Data Not found'
          ], REST_Controller::HTTP_OK);
        }
     
     }else if ($status == 2)
     {
        $whereData  = array('id' => $booking_id);

        $data = $this->LoginApiModel->singleRowdata($whereData,'booking');
          if($data)
          {
              $where = array('booking_id' => $booking_id);
              $updateData  = array('is_status' => 1,);
              if ($this->LoginApiModel->update('booking_notificaion',$updateData,$where)) {

                $whereBid = array('id' => $booking_id);
                $driver_id    = strip_tags($this->post('driver_id'));
                $updateBooking  = array('is_status' => 2,'driver_id'=> $driver_id);
                //print_r($updateBooking);die;
                $this->LoginApiModel->update('booking',$updateBooking,$whereBid);

                $this->response([
                    'status' => TRUE,
                    'message' =>'Booking Rejected Successfully'
                ], REST_Controller::HTTP_OK);
              }else{
                $this->response([
                    'status' => FALSE,
                    'message' =>'Unable To Rejected',
                 
                ], REST_Controller::HTTP_OK);
              }           
          }
          else 
          {
            $this->response([
              'status' => FALSE,
              'message' => 'Data Not found'
            ], REST_Controller::HTTP_OK);
          }
     }
     else
     {
      $this->response([
            'status' => FALSE,
            'message' =>'Unable To Update',
         
        ], REST_Controller::HTTP_OK);
     }

   }

   
   
   
   public function getBookingRoute_post()
  {
     
    $booking_id    = strip_tags($this->post('booking_id'));
    $whereData     = array('id' => $booking_id);
    $data          = $this->LoginApiModel->singleRowdata($whereData,'booking');

    $picup_location = json_decode($data->pick_location);

    $drop_location = json_decode($data->drop_location);

    if(!empty($data))
    {
      $pic_lat   =  $picup_location->latitude;
      $pic_long  =  $picup_location->latitude;
      $drop_lat  =  $drop_location->latitude;
      $drop_long =  $drop_location->latitude;

      $GetRoute = $this->GetRoute($pic_lat,$pic_long,$drop_lat,$drop_long);

      if ($GetRoute ) {
        $this->response([
          'status' => TRUE,
          'message'=>'Booking list',
          'data' =>$GetRoute 
        ], REST_Controller::HTTP_OK);
      }
     

    }else{
       $this->response([
            'status' => FALSE,
            'message' =>'data not found',
         
        ], REST_Controller::HTTP_OK);
     
    }
  }

   public function GetRoute($pic_lat,$pic_long,$drop_lat,$drop_long){

    $curl = curl_init();

    curl_setopt_array($curl, array(
      // CURLOPT_URL => "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=40.6655101,-73.89188969999998&destinations=40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.6905615%2C-73.9976592%7C40.659569%2C-73.933783%7C40.729029%2C-73.851524%7C40.6860072%2C-73.6334271%7C40.598566%2C-73.7527626%7C40.659569%2C-73.933783%7C40.729029%2C-73.851524%7C40.6860072%2C-73.6334271%7C40.598566%2C-73.7527626&key=AIzaSyD8JEKiRk3PdB97Bp2AVyv_Npdieu2X7JI",

       CURLOPT_URL => "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$pic_lat.",".$pic_long."&destinations=".$drop_lat.",".$drop_long."&key=AIzaSyD8JEKiRk3PdB97Bp2AVyv_Npdieu2X7JI",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "postman-token: c8fb937a-222e-3181-570a-06b8787892d2"
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $res = json_decode($response);
      return $res;
    }


  }
  
  
   public function getBookingRouteById_post()
  {
     
    $booking_id    = strip_tags($this->post('booking_id'));
    $whereData     = array('id' => $booking_id);
    $data          = $this->LoginApiModel->singleRowdata($whereData,'booking');
    

    if(!empty($data))
    {
      $picup_location = json_decode($data->pick_location);

      $drop_location = json_decode($data->drop_location);

      $data_res = array('picup_location' => $picup_location,'drop_location' =>  $drop_location);

      $this->response([
          'status' => TRUE,
          'message'=>'Booking list',
          'data' =>$data_res 
        ], REST_Controller::HTTP_OK);
        
     

    }else{
       $this->response([
            'status' => FALSE,
            'message' =>'data not found',
         
        ], REST_Controller::HTTP_OK);
     
    }
  }
  
  
 public function driverLocation_post()
  {
     
    $booking_id    = strip_tags($this->post('booking_id'));
    $driver_id     = strip_tags($this->post('driver_id'));

    $driver_location     = strip_tags($this->post('driver_location'));
    $whereData     = array(
      'id'         => $booking_id,
      'driver_id'  => $driver_id,
    );

    $data   = $this->LoginApiModel->singleRowdata($whereData,'booking');
    
    if(!empty($data))
    {
      $driver_loca = json_encode($driver_location);
      $data_res = array('driver_location' => $driver_loca);
      $update   = $this->LoginApiModel->update('booking',$data_res,$whereData);

      if ($update) {
          $this->response([
              'status' => TRUE,
              'message'=>'Location Update Successfully',
              //'data'   =>$data_res 
          ], REST_Controller::HTTP_OK);
      }else
      {
         $this->response([
            'status' => FALSE,
            'message' =>'Location Did not Update',
         
        ], REST_Controller::HTTP_OK);

      }     

    }else{

        $this->response([
            'status' => FALSE,
            'message' =>'You have not accepted any request.',
         
        ], REST_Controller::HTTP_OK);
     
    }
  }


   public function driverNotificationList_post(){

    //$booking_id    = strip_tags($this->post('booking_id'));
    $driver_id     = strip_tags($this->post('driver_id'));
    $where      = array("doctor_id" => $driver_id,'read_status' => 1);
    $results    = $this->LoginApiModel->selectnotification('booking_notificaion',$where);
    if ($results) {
        foreach ($results as $key) {
            $post_date = $key['date_time'];
            $time_ago =strtotime($post_date);
            $time_elapsed = $this->timeAgo($time_ago);

            $where  = array('id' => $key['booking_id']);

            $booking_data  = $this->LoginApiModel->singleRowdata($where,'booking');

            $wherePaitent  = array('id' => $key['paitent_id']);

            $p_data  = $this->LoginApiModel->singleRowdata($wherePaitent,'Patients');
            $data[] = array(
                "notification_id"  => $key['notification_id'],
                "user_id"       => $key['paitent_id'],
                'patients_data' => $p_data,
                "driver_id"       => $key['doctor_id'],
                "booking_id"       => $key['booking_id'],
                'booking_data'  =>$booking_data,
                "title"         => $key['title'],
                "message"       => $key['message'],
                "date_time"     => $time_elapsed,
                "read_status"   => $key['read_status'],
            );
        }  
         $this->response([
              'status' => TRUE,
              'message'=>'Nottification List',
              'data'   =>$data 
          ], REST_Controller::HTTP_OK);
    }else{
         $this->response([
            'status' => FALSE,
            'message' =>' Data not found',
         
        ], REST_Controller::HTTP_OK);
    }
  }


  public function driverNotificationCount_post(){
     $driver_id     = $this->post('driver_id');
     $where      = array("doctor_id" => $driver_id,'read_status' => 0);
     $results    = $this->LoginApiModel->record_count('booking_notificaion',$where);
      if ($results) {
           $this->response([
                'status' => TRUE,
                'message'=>'Nottification Count',
                'data'   =>$results 
            ], REST_Controller::HTTP_OK);
      }else{
           $this->response([
              'status' => TRUE,
              'message'=>'Nottification Count',
              'data' =>'0',
           
          ], REST_Controller::HTTP_OK);
      }   
      
  }

 public function readUnreadNotification_post(){  

    $driver_id           = strip_tags($this->post('driver_id')); 
    //$notification_id     = strip_tags($this->post('notification_id'));

    $where = array('doctor_id' => $driver_id,'read_status' => 0);
    $data   = $this->LoginApiModel->singleRowdata($where,'booking_notificaion');
    if ($data) {
      $data_update  = array('read_status' => 1);
      $results      = $this->LoginApiModel->update('booking_notificaion',$data_update,$where);
      if ($results) {         
          $this->response([
                'status' => TRUE,
                'message'=>'Nottification Read',
          ], REST_Controller::HTTP_OK);
      }else{
           $this->response([
              'status' => FALSE,
              'message' =>' Nottification not Read',
           
          ], REST_Controller::HTTP_OK);
      }   

    }else{
      $this->response([
            'status' => FALSE,
            'message' =>' Data not found',
         
        ], REST_Controller::HTTP_OK);

    }
  }
  
   public function driverBookingDetailsByid_post(){
      
      $driver_id   = strip_tags($this->post('driver_id'));
      //$booking_id   = strip_tags($this->post('booking_id'));

      $where      = array('driver_id' => $driver_id,'is_status' => 1);
      $results    = $this->LoginApiModel->selectdata('booking',$where);
      if ($results) {
           $this->response([
                'status' => TRUE,
                'message'=>'Booking Details',
                'data'   =>$results 
            ], REST_Controller::HTTP_OK);
      }else{
           $this->response([
              'status' => FALSE,
              'message' =>' Data not found',
           
          ], REST_Controller::HTTP_OK);
      }   
      
  }



public function patientNotificationList_post(){

    //$booking_id    = strip_tags($this->post('booking_id'));
    $patient     = strip_tags($this->post('patient_id'));
    $where      = array("user_id" => $patient,'read_status' => 1);
    $results    = $this->LoginApiModel->selectnotification('Notification',$where);
    if ($results) {
        foreach ($results as $key) {
            $post_date = strtotime($key['date_time']);
            $now = time();
            $datetimago= $this->timeAgo($post_date);
            $data[] = array(
                "notification_id"  => $key['notification_id'],
                "user_id"       => $key['user_id'],
                "title"         => $key['title'],
                "message"       => $key['notification'],
                "date_time"     => $key['date_time'],
                "read_status"   => $key['read_status'],
            );
        }  
         $this->response([
              'status' => TRUE,
              'message'=>'Nottification List',
              'data'   =>$data 
          ], REST_Controller::HTTP_OK);
    }else{
         $this->response([
            'status' => FALSE,
            'message' =>' Data not found',
         
        ], REST_Controller::HTTP_OK);
    }   
    //echo json_encode($data_result);
}


public function patientNotificationCount_get(){
    

    $where      = array('read_status' => 1);
    $results    = $this->LoginApiModel->record_count('Notification',$where);
    if ($results) {
       
         $this->response([
              'status' => TRUE,
              'message'=>'Nottification Count',
              'data'   =>$results 
          ], REST_Controller::HTTP_OK);
    }else{
         $this->response([
            'status' => FALSE,
            'message' =>' Data not found',
         
        ], REST_Controller::HTTP_OK);
    }   
    echo json_encode($data_result);
}

public function paitentreadUnreadNotification_post(){  

    $patient_id           = strip_tags($this->post('patient_id')); 
    $notification_id     = strip_tags($this->post('notification_id'));

    $where = array('notification_id'=>$notification_id,'read_status' => 0);
    $data   = $this->DoctorsModel->singleRowdata($where,'Notification');
    if ($data) {
      $data_update  = array('read_status' => 1);
      $results      = $this->DoctorsModel->update('Notification',$data_update,$where);
      if ($results) {         
          $this->response([
                'status' => TRUE,
                'message'=>'Nottification Read',
          ], REST_Controller::HTTP_OK);
      }else{
           $this->response([
              'status' => FALSE,
              'message' =>' Nottification not Read',
           
          ], REST_Controller::HTTP_OK);
      }   

    }else{
      $this->response([
            'status' => FALSE,
            'message' =>' Data not found',
         
        ], REST_Controller::HTTP_OK);

    }
  }

  public function getDriverRoot_post()
  {
     
    $driver_id    = strip_tags($this->post('driver_id'));
    $booking_id    = strip_tags($this->post('booking_id'));
    $whereData     = array('id' => $booking_id,'driver_id' =>$driver_id );
    $data  = $this->LoginApiModel->singleRowdata($whereData,'booking');   

    if(!empty($data))
    {
      $driver_location = json_decode($data->driver_location);

      $data_res = array('driver_location' => $driver_location);

      $this->response([
          'status' => TRUE,
          'message'=>'Driver location',
          'data' =>$data_res 
        ], REST_Controller::HTTP_OK);
        
     

    }else{
       $this->response([
            'status' => FALSE,
            'message' =>'data not found',
         
        ], REST_Controller::HTTP_OK);
     
    }
  }


  public function timeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "one minute ago";
        }
        else{
            return "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "an hour ago";
        }else{
            return "$hours hrs ago";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "yesterday";
        }else{
            return "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "a week ago";
        }else{
            return "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "a month ago";
        }else{
            return "$months months ago";
        }
    }
    //Years
    else{
        if($years==1){
            return "one year ago";
        }else{
            return "$years years ago";
        }
    }
}


}
