<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimony extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
           }
      public function index(){
        $data = array();
        $data['page_title'] = 'Approve testimonies';
        $data['inbox'] = $this->common_model->get_all_testimonies_admin($this->session->userdata('id'),'testimonials', "testimonial_id");
          $data['notification'] = $this->common_model->get_reply( $this->session->userdata('id'));
        $data['main_content'] = $this->load->view('admin/notification/testimonies', $data, TRUE);
        $this->load->view('admin/index', $data);

    } 
public function approve(){
  $status= $this->input->post('user_id', TRUE);
   $data = array(
                'status' => "Approved"
                
                
            ); 
    $data = $this->security->xss_clean($data);
            $this->common_model->edit_option($data, $status , 'testimonials','testimonial_id');
  
   echo  json_encode($data);

}
public function disapprove(){
  $status= $this->input->post('user_id', TRUE);
   $data = array(
                'status' => "pending"
                
                
            ); 
    $data = $this->security->xss_clean($data);
            $this->common_model->edit_option($data, $status , 'testimonials','testimonial_id');
  
   echo  json_encode($data);

}


}