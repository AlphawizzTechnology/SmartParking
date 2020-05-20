<?php

class Patient extends CI_Controller {

    public function __construct(){
        parent::__construct();
         if(!$this->login->isLoggedIn()){
         redirect('AdminLogin');
        }
    }

    public function index(){
        $data['patients'] = $this->PatientModel->getAllPatients();
        $this->load->view('common/header');
        $this->load->view('common/sidebar');
        $this->load->view('patient/patient_list',$data);
        $this->load->view('common/footer');
    }


    public function add_patient(){
        if(!empty($this->input->post())){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('username', '', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|matches[password]');
            $this->form_validation->set_rules('dob', 'Date Of birth', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('Country', 'Country', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('postal_code', 'Postal Code', 'required');
            $this->form_validation->set_rules('phone_number', 'Phone number', 'required');
            $this->form_validation->set_rules('disease', 'disease', 'required');
            
           
           
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
            

            if ($this->form_validation->run() == TRUE)
            {
                $patient_data = $this->input->post();
                $config['upload_path'] = './uploads/patients_profiles';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2000;
                $config['max_width'] = 4500;
                $config['max_height'] = 4500;
       


        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('patient_image')) {
            $error = array('error' => $this->upload->display_errors());
        //    print_r($error);
            $patient_data['image'] ='';
           
        } else {
            $image = $this->upload->data()['file_name'];
            $patient_data['image'] = $image;
            
        }
       
        unset($patient_data['cpassword']);

        // print_r($patient_data);
        // exit;

        
         
        // $doctor_data = array('first_name'=>$d['firstname'],'last_name'=>$d['lastname'],'username'=>$d['username'],'email'=>$d['email'],'password'=>$d['password'],'dob'=>$d['dob'],'gender'=>$d['gender'],'address'=>$d['address'],'Country'=>$d['country'],'city'=>$d['city'],'state'=>$d['state'],'postal_code'=>$d['state'],'phone_number'=>$d['phone_number'],'image'=>$image,'biography'=>$d['biography'],'status'=>$d['status'],'profession'=>$d['pro']);
        // if(!$this->PatientModel->isEmailAvailable($patient_data['email'])){
        if($this->PatientModel->AddPatient($patient_data)){
            $this->session->set_flashdata('docter_add_result','Docter Added Successfully');
        }
        
    //    }
    //    else {
    //         $this->session->set_flashdata('patient_add_result','Email is already exist');
    //          echo 'hii';
    //             $this->load->view('common/header');
    //             $this->load->view('common/sidebar');
    //             $this->load->view('patient/add_patient');
    //             $this->load->view('common/footer');  
    //             exit;
    //      }
       redirect('Patient');
        
            }
            else {
                $this->load->view('common/header');
                $this->load->view('common/sidebar');
                $this->load->view('patient/add_patient');
                $this->load->view('common/footer');  
            }
           
        }
        else {

        $this->load->view('common/header');
        $this->load->view('common/sidebar');
        $this->load->view('patient/add_patient');
        $this->load->view('common/footer');  
    }
    }

    public function edit_patient(){
        if(!empty($this->input->post())){
            
            print_r($this->input->post());
             $d = $this->input->post();
            
            $id = $d['id'];
              
             $config['upload_path'] = './uploads/patients_profiles';
             $config['allowed_types'] = 'gif|jpg|png|jpeg';
             $config['max_size'] = 2000;
             $config['max_width'] = 4500;
             $config['max_height'] = 4500;
    


            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload('patient_image')) {
                $error = array('error' => $this->upload->display_errors());
                $image = '';
                
            } else {
                $image = $this->upload->data()['file_name'];
                $d['image'] = $image;
            }
            
        

            // $doctor_update_data = array('first_name'=>$d['first_name'],'last_name'=>$d['last_name'],'username'=>$d['username'],'email'=>$d['email'],'dob'=>$d['dob'],'address'=>$d['address'],'Country'=>$d['country'],'city'=>$d['city'],'state'=>$d['state'],'postal_code'=>$d['state'],'phone_number'=>$d['phone_number'],'image'=>$image,'biography'=>$d['biography'],'status'=>$d['status'],'profession'=>$d['pro']);
            if($this->PatientModel->updatePatient($d,$id)){
              redirect('Patient');
            }
           



        }
        $patient_id = $this->uri->segment(3);
        $data['Patient_data'] = $this->PatientModel->getPatientById($patient_id);
        $this->load->view('common/header');
        $this->load->view('common/sidebar');
        $this->load->view('patient/edit_patient',$data);
        $this->load->view('common/footer');  
    }

    
    public function delete_patient(){
        $id = $this->uri->segment(3);
        $data['Patient_data'] = $this->PatientModel->deletePatientById($id);
        redirect('Patient');
    }

    public function CheckEmail(){
        $email = $this->input->post('email');
        if($this->PatientModel->isEmailAvailable($email)){
           echo TRUE;
        }
        else {
           echo FALSE;
        }
    }
}


