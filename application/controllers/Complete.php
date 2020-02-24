<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Complete extends CI_Controller {  
       public function __construct()


 {
  parent::__construct();
  $this->load->model('common_model');
 } 
      public function index(){  
        $data = array();
        $data['page_title'] = 'Agent';

        }
        
         
      public function agent(){
        $verification_key = $this->uri->segment(3);
        $verification= array(
          'is_verified'=> 'Yes'
        );
        $this->common_model->edit_option($verification, $verification_key,'users', 'reg_key');
        $data['verify'] = $verification_key;
         $this->load->view("agent/auth", $data);  
         
      }
      public function profile(){
        $verification_key= $this->uri->segment(3);
        $this->load->view("agent/agent_complete");
      }
          public function auth(){
        
        $verification_key= $_POST['verify'];
        $pass= $_POST['password'];
        $cpass =$_POST['cpassword'];
        $data = array(
            'password' => md5($pass)
              
        );
        if($pass == $cpass){
          $this->common_model->edit_option($data, $verification_key,'users', 'reg_key');
          $data['verify'] = $this->common_model->get_single_user_id($verification_key, 'users', 'reg_key');
          $data['key'] = $verification_key;
          //$this->load->view('agent/auth', $data
             $this->session->set_flashdata('msg', "Successfully set you password, complete your profile");
             //redirect(base_url()."Complete/profile/".$verify->id);
             $this->load->view('agent/agent_complete', $data);
}
        
        else{
          $this->session->set_flashdata('error_msg', "please ensure that your passwords match");
            redirect(base_url()."Complete/agent/".$verification_key);
        }
      
       }
       public function signup(){
        $verification_key = $_POST['key'];
         $this->load->library('form_validation');
      
                if ($_POST) {
                    $this->form_validation->set_rules('fname', 'First name', 'required|min_length[3]|max_length[15]|trim');
                    $this->form_validation->set_rules('lname', 'Last name', 'required|min_length[3]|max_length[15]|trim');
                    $this->form_validation->set_rules('nid', 'National ID', 'required|numeric|min_length[6]|max_length[8]|trim');
                    $this->form_validation->set_rules('mobile', 'Phone number', 'required|numeric|min_length[10]|max_length[13]|trim');
                    $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
             if($this->form_validation->run())
  {
               $data = array(
                'agent_id'=> $_POST['id'],
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'oname' => $_POST['oname'],
                'gender' => $_POST['gender'],
                'id_no' => $_POST['nid'],
                'phone_no' => $_POST['mobile']
            );
            $verification= array(
          'is_complete'=> 'Yes'
        );

            $data = $this->security->xss_clean($data);
            $verification = $this->security->xss_clean($verification);

          $this->common_model->insert($data, 'agents');
                 $this->common_model->edit_option($verification, $verification_key,'users', 'reg_key');
                $this->session->set_flashdata('msg', 'You have Successfully completed your profile');
                redirect(base_url('/'));
        
            
            
            

        }
        else{
          $Rdata['verify'] = $this->common_model->get_single_user_id($verification_key, 'users', 'reg_key');
           $Rdata['key'] = $verification_key;
            $this->session->set_flashdata('msg', "Successfully set you password, complete your profile");
           $this->load->view('agent/agent_complete', $Rdata);

        }
      }


       }
       public function test(){
      //  $verification_key = $this->uri->segment(3);
//);
       }
       //////////////////////////////////////////////////////////////////////////////////////////////////////////
       //////tenant///////////////////////////////////////////////////////////////////////////////////////////
        public function tenant(){
        $verification_key = $this->uri->segment(3);
                $verification= array(
          'is_verified'=> 'Yes'
        );
        $this->common_model->edit_option($verification, $verification_key,'users', 'reg_key');
        $data['verify'] = $verification_key;
         $this->load->view("tenant/auth", $data);  
         
      }
      public function prof(){
        $verification_key= $this->uri->segment(3);
        $this->load->view("tenant/tenant_complete");
      }
          public function auths(){
        
        $verification_key= $_POST['verify'];
        $pass= $_POST['password'];
        $cpass =$_POST['cpassword'];
        $data = array(
            'password' => md5($pass)
              
        );
        if($pass == $cpass){
          $this->common_model->edit_option($data, $verification_key,'users', 'reg_key');
          $data['verify'] = $this->common_model->get_single_user_id($verification_key, 'users', 'reg_key');
          $data['key'] = $verification_key;
          //$this->load->view('agent/auth', $data
             $this->session->set_flashdata('msg', "Successfully set you password, complete your profile");
             //redirect(base_url()."Complete/profile/".$verify->id);
             $this->load->view('tenant/tenant_complete', $data);
}
        
        else{
          $this->session->set_flashdata('error_msg', "please ensure that your passwords match");
            redirect(base_url()."Complete/tenant/".$verification_key);
        }
      
       }
       public function signups(){
        $verification_key = $_POST['key'];
         $this->load->library('form_validation');
      
                if ($_POST) {
                    $this->form_validation->set_rules('fname', 'First name', 'required|min_length[3]|max_length[15]|trim');
                    $this->form_validation->set_rules('lname', 'Last name', 'required|min_length[3]|max_length[15]|trim');
                    $this->form_validation->set_rules('nid', 'National ID', 'required|numeric|min_length[6]|max_length[8]|trim');
                    $this->form_validation->set_rules('mobile', 'Phone number', 'required|numeric|min_length[10]|max_length[13]|trim');
                    $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
             if($this->form_validation->run())
  {
               $data = array(
                'tenant_id'=> $_POST['id'],
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'oname' => $_POST['oname'],
                'gender' => $_POST['gender'],
                'id_no' => $_POST['nid'],
                'phone_no' => $_POST['mobile']
            );
          $verification= array(
          'is_complete'=> 'Yes'
        );
           $data = $this->security->xss_clean($data);
           $verification = $this->security->xss_clean($verification);
            $this->common_model->insert($data, 'tenant');
             $this->common_model->edit_option($verification, $verification_key,'users', 'reg_key');
           $this->session->set_flashdata('msg', 'You have Successfully completed your profile, You can now login');
               redirect(base_url()."auth");
        }
        else{
          $Rdata['verify'] = $this->common_model->get_single_user_id($verification_key, 'users', 'reg_key');
           $Rdata['key'] = $verification_key;
            $this->session->set_flashdata('msg', "Successfully set you password, complete your profile");
           $this->load->view('agent/agent_complete', $Rdata);

        }
      }


       }
}
?>

