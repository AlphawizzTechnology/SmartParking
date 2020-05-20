<?php

class PatientApiModel extends CI_Model {
    public function __construct(){
     
        
    }

    public function getAllPatiens($id=0){
         $this->db->select("*");
         $this->db->from('Patients');
         if($id != 0){
            $this->db->where('id',$id);
         }
         $data = $this->db->get()->result();
         return empty($data)?false:$data;
     }


    public function updatePatientProfile($data,$patient_id){
        $this->db->where('id',$patient_id);
        $this->db->update('Patients',$data);

        return true;
    }

    public function getPatientImage($id){
      $this->db->select('*');
      $this->db->from('Patients');
      $this->db->where('id',$id);
      $data = $this->db->get()->result();
      return $data;

    }


   public function checkPhone($phone_number,$patient_id){
      $this->db->select("*");
      $this->db->from('Patients');
      $this->db->where('phone_number',$phone_number);
      $this->db->where('id !=', $patient_id);
      $count = $this->db->get()->num_rows();

      if($count > 0){
        return true;
      }
      else {
        return false;
      }
    }


    public function checkEmail($email,$patient_id){
        $this->db->select("*");
        $this->db->from('Patients');
        $this->db->where('email',$email);
        $this->db->where('id !=', $patient_id);
        $count = $this->db->get()->num_rows();

        if($count > 0){
            return true;
        }
        else {
            return false;
        }
    }


    public function Appointment($doctor_id,$patient_id){
        $this->db->select("*");
        $this->db->from('Appointment');
        $this->db->where(array('doctor_id'=>$doctor_id,'status'=>0));
        $this->db->order_by('appointment_date');
        return $this->db->get()->result();


    }
    
    public function singleRowdata($where_data,$table){  
    $this->db->where($where_data);
    $query = $this->db->get($table);
    return $query->row();
  }

  public function update($table,$data,$where_data){
    $this->db->where($where_data);
    $insertData=$this->db->update($table,$data);
    if($insertData){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function insert($data,$table){      
      $this->db->set($data);
      $insertData = $this->db->insert($table);
      if($insertData){
        return $this->db->insert_id();;
      }else{
        return FALSE;
      }
  }

   public function selectnotification($table,$wheredata){ 
    $this->db->select('*');
    $this->db->order_by('date_time', 'DESC');
    $this->db->from($table);
    $this->db->where($wheredata);
    $query = $this->db->get();
    return $query->result_array();
  }

   public function record_count($table,$data){
    if(!empty($data))
    {
      $this->db->where($data);
    }
    $this->db->from($table);
    return $this->db->count_all_results();
  }

 }