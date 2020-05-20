<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Patients extends REST_Controller {

    public function __construct() { 
    	 
        parent::__construct();
        
        // Load the user model
          $this->load->model('Api/PatientApiModel');
        
    }


    public function PatientProfile_post()
    {
     $patient_id = strip_tags($this->post('patient_id'));
     $data = $this->PatientApiModel->getAllPatiens($patient_id);

     if($data){
       $this->response([
        'status' => TRUE,
        'message' => 'patient',
        'data'=>$data
      ], REST_Controller::HTTP_OK);
     }

     else {
     	$this->response([
        'status' => TRUE,
        'message' => 'patient not found',
      ], REST_Controller::HTTP_OK);
     }

    }


    public function getPatientImage_post()
    {
      $patient_id = strip_tags($this->post('patient_id'));
      $data = $this->PatientApiModel->getPatientImage($patient_id);

      if($data)
      {
       $this->response([
        'status' => TRUE,
        'message' => 'your profile',
        'data'=>$data
      ], REST_Controller::HTTP_OK);
     }
     else 
     {
      $this->response([
        'status' => FALSE,
        'message' => 'patient not found',
      ], REST_Controller::HTTP_OK);
     }

      
    }


  public function updateMyProfile_post()
  {
     
    $patient_id =strip_tags($this->post('patient_id'));
    $email = strip_tags($this->post('email'));

    $dob = strip_tags($this->post('dob'));

    $address = strip_tags($this->post('address'));

    $phone_number = strip_tags($this->post('phone_number'));


    $update_patient= array('email'=>$email,
    'dob'=>$dob,'address'=>$address,'phone_number'=>$phone_number);


    if(!empty($_FILES['profile_image']['name'])){
      $config['upload_path'] = './uploads/patients_profiles';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = 20000;
      $config['max_width'] = 45000;
      $config['max_height'] = 45000;



      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('profile_image')) {
        $error = array('error' => $this->upload->display_errors());
        $image = '';


      }
      else {
        $image = $this->upload->data()['file_name'];
        $update_patient['image'] = $image;
      }
      }

      if($this->PatientApiModel->checkPhone($update_patient['phone_number'],$patient_id)){
        $this->response([
          'status' => FALSE,
          'message' =>'Phone Number is already exist',
        ], REST_Controller::HTTP_OK);
        }

      else if($this->PatientApiModel->checkEmail($update_patient['email'],$patient_id))
      {
        $this->response([
          'status' => FALSE,
          'message' =>'Email is already exist',
        ], REST_Controller::HTTP_OK);
      }
      else 
      {
        if(empty($update_patient['image']))
        {
          $update_patient['image'] = '';
        }
        if($this->PatientApiModel->updatePatientProfile($update_patient,$patient_id))
        {
          $this->response([
            'status' => TRUE,
            'message' =>'updated',
            'data'=> $update_patient
          ], REST_Controller::HTTP_OK);
        }
      }
    }

  //     "message" => $message
  //   )
  //   );

  //   //header includes Content type and api key
  //   $headers = array(
  //   'Content-Type:application/json',
  //   'Authorization:key='.$api_key
  //   );

  //   $ch = curl_init();
  //   curl_setopt($ch, CURLOPT_URL, $url);
  //   curl_setopt($ch, CURLOPT_POST, true);
  //   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  //   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  //   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //   curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
  //   $result = curl_exec($ch);
  //   if ($result === FALSE) {
  //   die('FCM Send Error: ' . curl_error($ch));
  //   }
  //   curl_close($ch);
    
  // }





  public function yourAppointment_post()
  {
    $doctor_id = strip_tags($this->post('doctor_id'));
    
    $patient_id = strip_tags($this->post('patient_id'));
    $data = $this->PatientApiModel->Appointment($doctor_id,$patient_id);
    $this->token = 0;
    $this->your_token=0;
    $this->appointment_time='';
    for($i=0;$i<count($data);$i++){
      $this->token++;
      if($data[$i]->patient_id == $patient_id){
        $data[$i]->your_appointment = true;
        $data[$i]->token_number = $this->token;
        $data[$i]->Estimated_time = $data[$i]->appointment_time ; 
        $this->your_token = $this->token;
        $this->appointment_time = $data[$i]->appointment_time;
        if($this->token == 1){
          $data[$i]->isAttending = true;
        }
        else {
          $data[$i]->isAttending = false; 
        }
        
      }
      else {
        if($this->token == 1){
          $data[$i]->isAttending = true;
        }
        else {
          $data[$i]->isAttending = false; 
        }
        $data[$i]->Estimated_time = $data[$i]->appointment_time ; 
        $data[$i]->your_appointment = false; 
        $data[$i]->token_number = $this->token; 
      }
    }


    $this->response([
            'status' => TRUE,
            'message' =>'Appointments List',
            'Your_Token'=>$this->your_token,
            'Appointment_Time'=>$this->appointment_time,
            'data'=> $data
    ], REST_Controller::HTTP_OK); 

  }
  
  
  public function patientNotificationList_post(){

    //$booking_id    = strip_tags($this->post('booking_id'));
    $patient     = strip_tags($this->post('patient_id'));
    $where      = array("user_id" => $patient,'read_status' => 1);
    $results    = $this->PatientApiModel->selectnotification('Notification',$where);
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
    echo json_encode($data_result);
}

function timeAgo($time_ago)
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

public function patientNotificationCount_get(){
    

    $where      = array('read_status' => 1);
    $results    = $this->PatientApiModel->record_count('Notification',$where);
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

public function readUnreadNotification_post(){  

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
    $data  = $this->PatientApiModel->singleRowdata($whereData,'booking');   

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


  // public function cancelAppointment_post(){
    
  // }

  




}