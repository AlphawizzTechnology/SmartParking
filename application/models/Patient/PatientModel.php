<?php

class PatientModel extends CI_Model {
    public function AddPatient($data){
        $this->db->insert('Patients',$data);
        return true;
    }

    public function isEmailAvailable($email){
     $this->db->select('*');
     $this->db->from('Patients');
     $this->db->where('email',$email);
     $data = $this->db->get()->result();
     if(!empty($data)){
       return true;
     }
     else {
       return false;
     }
     
    }

    public function getAllPatients(){
        $this->db->select('*');
        $this->db->from('Patients');
        $data = $this->db->get()->result();
        
        return $data;  
    }

    public function getPatientById($id){
      $this->db->select('*');
      $this->db->from('Patients');
      $this->db->where('id',$id);
      $data = $this->db->get()->row();
      return $data;
    }

    public function updatePatient($data,$id)
    {
       $this->db->where('id',$id);
       $this->db->update('Patients',$data);
      
       return true;
    }

    public function deletePatientById($id){
      $this->db->where('id',$id);
    $this->db->delete('Patients');
    

    }

}