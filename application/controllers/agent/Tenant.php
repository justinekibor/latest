<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tenant extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Add tenant';
        $data['plots'] = $this->common_model->get_all_objects('tenant', "tenant_id");
        $data['main_content'] = $this->load->view('agent/tenants/add', $data, TRUE);
        $this->load->view('agent/index', $data);
    }

    //-- add new user by admin
 public function add()
    {   
         $this->load->library('form_validation');
        if ($_POST) {
            $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[users.email]');
             if($this->form_validation->run())
  {
            $verification_key= md5(rand());
            $email = $_POST['email'];
              $link = base_url()."complete/tenant/".$verification_key;
            $data = array(
                'email' => $_POST['email'],
                'created_at' => current_datetime(),
                'userRole' => 'Tenant',
                'reg_key' =>  $verification_key
            );
                $datal = array(
                    'link' => base_url()."complete/tenant/".$verification_key,
                    'name'=> $_POST['email']
                );
                 $data = $this->security->xss_clean($data);
                 $datal = $this->security->xss_clean($datal);
                $this->common_model->insert($data, 'users');
                 $this->common_model->insert($datal, 'email');
     $from = $this->config->item('smtp_user');
   $to =$email;
 $subject = "Leasehouse Account completion";
      //  $message = $this->input->post('message');
   $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'justinekibor98@gmail.com', // change it to yours
  'smtp_pass' => 'kaplos4514', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);

        $message = '<a href="'.$link.'">Click here to reset password</a>';
        $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('justinekibor98@gmail.com'); // change it to yours
      $this->email->to($to);// change it to yours
      $this->email->subject($subject);
      $this->email->message($message);
      if($this->email->send())
     {
      $this->session->set_flashdata('msg', 'Email Verifcation link sent Successfully');
       redirect(base_url('agent/tenant'));
     }
     else
    {
     $error_msg = $this->email->print_debugger();
      $this->session->set_flashdata('server_msg', $error_msg);
       redirect(base_url('agent/tenant'));
    }

                  
            }
                                              
             else {
               // $this->session->set_flashdata('error_msg', 'Email already exist, try another email');
                $this->index();
            }
            }
        else{
            $this->index();
        }
    }
    
    public function all_tenant_list()
    {
         $data['page_title'] = 'Al Registered Tenants';
        $data['tenants'] = $this->common_model->get_all_Tenants('tenant','tenant_id',$this->session->userdata('id'));
       // $data['country'] = $this->common_model->select('country');
      //  $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('agent/tenants/tenants', $data, TRUE);
        $this->load->view('agent/index', $data);
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
        $this->load->view('agent/index', $data);
        
    }
    //load unassigned tenantss and rooms




    
      public function assign()   
    {
        $data = array();
        $data['page_title'] = 'Assign Tenant';
        $data['tenants'] = $this->common_model->select_options("tenant", "tenant_id", "house_id");
        $data['houses'] = $this->common_model->get_all_Plot_houses("houses", "house_id", $this->session->userdata('id'));
         $data['main_content'] = $this->load->view('agent/tenants/assign_tenant', $data, TRUE);
        $this->load->view('agent/index', $data);
 
     }
         public function assigning(){
        $tenant= $_POST['tenant'];
        $house= $_POST['house'];
                       if ($_POST) {
            $data = array(
            'assignment_date' =>current_datetime(),
            'house_id' =>$house,
            'assigned_by' => $this->session->userdata('id')         
             );
            $houseData = array(
                'tenant_id' => $tenant
            );
            $balance= array(
              'tenant_id' => $tenant,
              'deposit' => $_POST['rent'],
              'rent' =>    $_POST['rent']

            );


            $data = $this->security->xss_clean($data); 
            if ($tenant !=0 AND $house !=0) {
             
                 $this->common_model->edit_option($data, $tenant, 'tenant','tenant_id');
                 $this->common_model->edit_option($houseData, $house, 'houses','house_id');
                 $this->common_model->insert($balance, 'balances');
                 $this->session->set_flashdata('msg', 'Please select tenant and house before assigning');
                redirect(base_url('agent/tenant/assign'));
                
                
            } else {
                $this->session->set_flashdata('error_msg', 'Please select tenant and house before assigning');
                redirect(base_url('agent/tenant/assign'));
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
    public function fetch_house(){
        $house_id = $this->input->post('house_id', TRUE);
        $data= $this->common_model->get_bills($house_id)->result();
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
            redirect(base_url('admin/rooms/all_room_list'));
            }
            else{
                $this->index();
            }

        } 

    }
       
}
?>
<script type="text/javascript">
    
</script>