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
        $data['page_title'] = 'Add Room';
        $data['plots'] = $this->common_model->get_all_objects('plots', "plot_id");
        $data['profile'] =$this->common_model->get_profile($this->session->userdata('id'));
        $data['main_content'] = $this->load->view('admin/profile/profile', $data, TRUE);
        $data['notification'] = $this->common_model->get_notification();
        $this->load->view('admin/index', $data);
    }
 
    //-- add new user by admin
    public function add() 
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
                'plot_id' => $_POST['plot'],
                'house_name' => $_POST['name'], 
                'floor' => $_POST['floor'],
                'info_type' => $_POST['type'], 
                'picture' => base_url().'uploads/'.$data["file_name"],
                'date_created' => current_datetime(),
                'auto_water'   => $_POST['water'],
                'auto_kplc'    => $_POST['kplc']
            ); 
              $data = $this->security->xss_clean($data);
            
            //-- check duplicate email

            if ($user_id = $this->common_model->insert($data, 'houses')) {
                
            
                
            } 
                     

                     }
            
                      
                }  
    }
    public function all_room_list()
    {
        $data['page_title'] = 'All Registered rooms';
        $data['rooms'] = $this->common_model->get_all_objects('houses','house_id');
       // $data['country'] = $this->common_model->select('country');
      //  $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/rooms/rooms', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update room info
    public function update($id)
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
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'image' => base_url().'uploads/'.$data["file_name"],

            ); 
              $data = $this->security->xss_clean($data);

            if ($this->common_model->edit_option($data, $id, 'user','id')) {
                echo "Good";
                
            
                
            } 
                     

                     }
            
                      
                }
        
    }
 
     
   

    
    //-- delete room
    public function delete($id)
    {
        $this->common_model->delete($id,'houses', 'house_id'); 
        $this->session->set_flashdata('msg', 'Room deleted Successfully');
        redirect(base_url('admin/rooms/all_room_list'));
    }
    public function fetch_type(){
        $plot_id = $this->input->post('plot_id', TRUE);
        $data= $this->common_model->get_houses($plot_id)->result();
        echo  json_encode($data);
    }
       public function fetch_to_bill(){
        $plot_id = $this->input->post('plot_id', TRUE);
        $data= $this->common_model->get_houses_bill($plot_id)->result();
        echo  json_encode($data);
    }
        public function fetch_house(){
        $house_id = $this->input->post('house_id', TRUE);
        $data= $this->common_model->get_house_details($house_id)->result();
        echo  json_encode($data);
    }
    public function fetch_tenant(){
        $house_id = $this->input->post('house_id', TRUE);
        $data= $this->common_model->get_tenant_details($house_id)->result();
        $data= $this->common_model->get_tenant_balances($house_id)->result();
        echo  json_encode($data);
    }
    public function fetch_bills(){
        $house_id = $this->input->post('house_id', TRUE);
        $data= $this->common_model->get_bills($house_id)->result();
        echo  json_encode($data);
    }
    public function billHouse(){
        $id= $_POST['houses'];
         $this->load->library('form_validation');
      
                if ($_POST) {
                    $this->form_validation->set_rules('rent', 'Rent', 'required|min_length[4]|max_length[6]|trim');
                    $this->form_validation->set_rules('houses', 'House', 'required');
             if($this->form_validation->run())
  {            $data = array(
                'rent' => $_POST['rent'],
                'deposit' => $_POST['rent'],
                'house_id' =>$id
                
            );
                $update = array(
                'billed' => "Yes"
                
                
            );


            $data = $this->security->xss_clean($data);
             $update= $this->security->xss_clean($update);

            $this->common_model->insert($data, 'bills');
            $this->common_model->edit_option($update, $id, 'houses','house_id');
            $this->session->set_flashdata('msg', 'House Successfully billed');
            redirect(base_url('admin/rooms'));
            }
            else{
                $this->index();
            }

        } 

    }
     public function send_mail() { 
         $config['protocol']    = 'mail';
    $config['smtp_host']    = 'justinekibor@gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '7';
    $config['smtp_user']    = 'justinekibor@gmail.com';
    $config['smtp_pass']    = '01011998';
    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not      

    $this->load->library('email', $config);


    $this->email->from('justinekibor@gmail.com', 'myname');
    $this->email->to('justinekibor@gmail.com'); 

    $this->email->subject('Email Test');
    $this->email->message('Testing the email class.');  

    $this->email->send();

    echo $this->email->print_debugger();
    $this->index();
          
       }
    
       
}