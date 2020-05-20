<?php

class DoctorModel extends CI_Model {
    public function AddDocter($data){
        $this->db->insert('Doctors',$data);
        return true;
    }

    public function isEmailAvailable($email){
     $this->db->select('*');
     $this->db->from('Doctors');
     $this->db->where('email',$email);
     $data = $this->db->get()->result();
     if(!empty($data)){
       return true;
     }
     else {
       return false;
     }
     
    }


    public function getAllDocters(){
        $this->db->select('*');
        $this->db->from('Doctors');
        $data = $this->db->get()->result();
        
        return $data;  
    }
 
    public function getDocterById($id){
      $this->db->select('Doctors.*,Doctor_schedule.from_date,Doctor_schedule.to_date,Doctor_schedule.evening_morning_status');
      $this->db->from('Doctors');
      $this->db->join('Doctor_schedule','Doctors.id = Doctor_schedule.doctor_id','left');
      $this->db->where('Doctors.id',$id);
      $data = $this->db->get()->row();

      return $data;
    }

    public function updateDocter($data,$id)
    {
       $this->db->where('id',$id);
       $this->db->update('Doctors',$data);
       return true;
    }

    public function hospital_list(){
      $this->db->select("*");
      $this->db->from('Hospital');
      $data = $this->db->get()->result();
      
      return $data;
    }

    public function departments(){
      $this->db->select("*");
      $this->db->from('Department');
      return $this->db->get()->result();
    }

    

    public function deleteDocterById($id){
      $this->db->where('id',$id);
    $this->db->delete('Doctors');
    

    }
    
   

}