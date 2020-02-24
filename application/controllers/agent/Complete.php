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
            'password' => $pass
              
        );
        if($pass == $cpass){
          $this->common_model->edit_option($data, $verification_key,'users', 'reg_key');
          $data['verify'] = $this->common_model->get_single_user_id($verification_key, 'users', 'reg_key');
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
        $verification_key = $this->uri->segment(3);
         $this->load->library('form_validation');
      
                if ($_POST) {
                    $this->form_validation->set_rules('fname', 'Email Address', 'required|trim|valid_email|is_unique[users.email]');
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

            $data = $this->security->xss_clean($data);
            
            //-- check duplicate email

            if ($user_id = $this->common_model->insert($data, 'agents')) {
                
            
                $this->session->set_flashdata('msg', 'You have Successfully completed your profile');
                redirect(base_url('admin/plot/all_plot_list'));
            } 
            else {
                $this->session->set_flashdata('error_msg', 'error while adding');
                redirect(base_url('admin/user'));
            }
            
            
            

        }
        else{
           $data['verify'] = 38;
            $this->session->set_flashdata('msg', "Successfully set you password, complete your profile");
           $this->load->view('agent/agent_complete', $data);

        }
      }


       }
       public function test(){
      //  $verification_key = $this->uri->segment(3);
//);
       }
}
?>

