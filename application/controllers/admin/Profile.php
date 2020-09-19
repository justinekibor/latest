<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct(){ 
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
           }

    public function index() 
    {
        $data = array();
        $data['page_title'] = 'Update profile';
        $data['profile'] =$this->common_model->get_profile($this->session->userdata('id'));
        $data['main_content'] = $this->load->view('admin/profile/profile',$data, TRUE);
        $data['notification'] = $this->common_model->get_notification();
        $this->load->view('admin/index', $data); 
    }
 

        public function update()
    { 
    if(isset($_FILES["image_file"]["name"]))   
           {  
                $config['upload_path'] = './uploads/';  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('image_file'))  
                {  
                     echo $this->upload->display_errors();  
                } 
                 
                else  
                {  
              $data = $this->upload->data(); 
         $data = array(
            'image' => base_url().'uploads/'.$data["file_name"]
            ); 
         $id= $this->session->userdata('id');
              $data = $this->security->xss_clean($data);
   $this->common_model->edit_option($data, $id, 'users','id');
                     }
                }  
    }
}