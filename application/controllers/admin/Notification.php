<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {

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
        $data['main_content'] = $this->load->view('admin/notification/reply', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
 
    //-- reply a complaint
        public function replying($id)
    { 
         $this->load->library('form_validation');
         $msg ="";
        if ($_POST) {
                      $this->form_validation->set_rules('reply', 'Reply', 'required|trim');
                    //   $this->form_validation->set_rules('message', 'Complaint', 'required|trim');

                    
             if($this->form_validation->run())
  {
            //$subject = $_POST['subject'];
            $reply = $_POST['reply'];
            $data = array(
                'replying_id' =>$this->session->userdata('id'),
                'reply'    =>$reply,
                'complaint_ids' =>$id,
                'reply_date' =>current_datetime()
            );
                  $data = $this->security->xss_clean($data);
                $this->common_model->insert($data, 'complaintReply'); $data = array();
        $data['page_title'] = 'Reply Complaint';
        $data['complaint_id'] = $id;
        $data['messo'] = $this->common_model->get_conversation($id);
        $data['complaint'] = $this->common_model->get_complaint($id);
        $data['main_content'] = $this->load->view('admin/notification/reply', $data, TRUE);
        $this->load->view('admin/index', $data);
                 $this->session->set_flashdata('msg', 'Successfully replied to the complaint.');
                redirect(base_url('admin/notification/reply/'.$id));
}
  else{ 
    $this->reply($id);
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
        if ($_POST) {
                     $data = array(
                'plot_id' => $_POST['plot'],
                'house_name' => $_POST['name'], 
                'floor' => $_POST['floor'],
                'info_type' => $_POST['type']
               // 'picture' => base_url().'uploads/'.$data["file_name"]
                
            ); 


            $data = $this->security->xss_clean($data);
            $this->common_model->edit_option($data, $id, 'houses','house_id');
            $this->session->set_flashdata('msg', 'Information Updated Successfully');
            redirect(base_url('admin/rooms/all_room_list'));

        }
        
        
         $data['plots'] = $this->common_model->get_all_objects('plots', "plot_id");
         $data['plot'] = $this->common_model->get_room_plot($id, 'houses', "house_id");
        $data['house'] = $this->common_model->get_single_object_info($id, 'houses', 'house_id');
        $data['main_content'] = $this->load->view('admin/rooms/edit_rooms', $data, TRUE);
        $data['page_title'] = 'Edit Rooms';
        $this->load->view('admin/index', $data);
        
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
       public function reply($id){
             $data = array();
        $data['page_title'] = 'Reply Complaint';
        $data['complaint_id'] = $id;
        $data['messo'] = $this->common_model->get_conversation($id);
        $data['complaint'] = $this->common_model->get_complaint($id);
        $data['main_content'] = $this->load->view('admin/notification/reply', $data, TRUE);
        $this->load->view('admin/index', $data);

       }
    
       
}