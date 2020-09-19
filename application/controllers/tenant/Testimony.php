<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimony extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
           }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Make Testimony';
    $data['notification'] = $this->common_model->get_reply( $this->session->userdata('id'));
        $data['main_content'] = $this->load->view('tenant/Complaint/testimony', $data, TRUE);
        $this->load->view('tenant/index', $data);
    }
 
    //-- add new user by admin
    public function add()
    { 
         $this->load->library('form_validation');
         $msg ="";
        if ($_POST) {
                       $this->form_validation->set_rules('message', 'Testimony', 'required|trim');

                    
             if($this->form_validation->run())
  {
            $message = $_POST['message'];
            $data = array(
                'tenant_id' =>$this->session->userdata('id'),
                'status'    =>"pending",
                'testimonial' =>$message,
                'date' =>current_datetime()
            );
                  $data = $this->security->xss_clean($data);
                $this->common_model->insert($data, 'testimonials');
                 $this->session->set_flashdata('msg', 'Successfully made your Testimony, Thanks for your continous support');
                redirect(base_url('tenant/testimony'));
}
  else{ 
    $this->index();
  }
    }
}  

    public function testimonies(){
        $data = array();
        $data['page_title'] = 'My testimonies';
        $data['inbox'] = $this->common_model->get_all_testimonies_admin($this->session->userdata('id'),'testimonials', "testimonial_id");
          $data['notification'] = $this->common_model->get_reply( $this->session->userdata('id'));
        $data['main_content'] = $this->load->view('tenant/Complaint/testimonies', $data, TRUE);
        $this->load->view('tenant/index', $data);

    }
}