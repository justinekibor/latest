<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');

    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Agent';
       // $data['country'] = $this->common_model->select('country');
       // $data['power'] = $this->common_model->get_all_power('user_power');
        $data['notification'] = $this->common_model->get_notification();
        $data['main_content'] = $this->load->view('admin/agent/add_agent', $data, TRUE);
        $this->load->view('admin/index', $data);
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
            $email =$_POST['email'];
         $link =base_url()."complete/agent/".$verification_key;
            $data = array(
                'email' => $_POST['email'],
                'created_at' => current_datetime(),
                'userRole' => 'Agent',
                'reg_key' =>  $verification_key
            );


            $data = $this->security->xss_clean($data); 
                
                $datal = array(
          'link' => base_url()."complete/agent/".$verification_key,
                    'name'=> $_POST['email']
                );
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
        $this->common_model->insert($data, 'users');
     $this->common_model->insert($datal, 'email');
    $this->session->set_flashdata('msg', 'Email Verifcation link sent Successfully');
          redirect(base_url('admin/agent'));
     }
     else
    {
     $error_msg = $this->email->print_debugger();
      $this->session->set_flashdata('server_msg', $error_msg);
       redirect(base_url('admin/agent'));
    }
     
        }
        else{
            $this->index();
        }
    }
    } 

    public function all_agent_list()
    {
        $data['page_title'] = 'All Registered Agents';
        $data['agents'] = $this->common_model->get_all_agents('users','id');
       // $data['country'] = $this->common_model->select('country');
      //  $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/agent/agents', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update users info
    public function update($id)
    {
        if ($_POST) {

                  $data = array(
                'Fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'oname' => $_POST['oname'],
                'gender' => $_POST['gender'],
                'id_no' => $_POST['nid'],
                'phone_no' => $_POST['mobile']
            );
            $data = $this->security->xss_clean($data);
            $this->common_model->edit_option($data, $id, 'agents','agent_id');
            $this->session->set_flashdata('msg', 'Information Updated Successfully');
            redirect(base_url('admin/agent/all_agent_list'));

        }
        
        $data['agent'] = $this->common_model->get_single_object_info($id, 'agents', 'agent_id');
    //  $data['plot'] = $this->common_model->get_single_object_info($id, 'plots', 'agent_id');
        $data['plots'] = $this->common_model->select_options("plots", "plot_id", "agent_id");
        $data['main_content'] = $this->load->view('admin/agent/edit_agent', $data, TRUE);
        $data['page_title'] = 'Edit agent';
        $this->load->view('admin/index', $data);
        
    }

    
    //--assign agent
    public function assign() 
    {
        $data = array();
        $data['page_title'] = 'Assign Agent';
        $data['agents'] = $this->common_model->select_options("agents", "agent_id", "plot_id");
        $data['plots'] = $this->common_model->select_options("plots", "plot_id", "agent_id");
         $data['main_content'] = $this->load->view('admin/agent/assign_agent', $data, TRUE);
        $this->load->view('admin/index', $data);

 
     }
     public function assigning(){
        $plot= $_POST['plot'];
        $agent= $_POST['agent'];
                       if ($_POST) {
            $data = array(
            'incharge_since' =>current_datetime(),
            'agent_id' =>$agent         
             );
            $agentData = array(
                'plot_id' => $plot
            );


            $data = $this->security->xss_clean($data); 
            if ($plot !=0 AND $agent !=0) {
             
                 $this->common_model->edit_option($data, $plot, 'plots','plot_id');
                 $this->common_model->edit_option($agentData, $agent, 'agents','agent_id');
                  $this->session->set_flashdata('msg', 'Assignment Successfully');
                redirect(base_url('admin/agent/all_agent_list'));
                
            } else {
                $this->session->set_flashdata('error_msg', 'Please select agent name and plot before assigning');
                redirect(base_url('admin/agent/assign'));
            }
            
            
            
            

        }

     }

    //-- deactive user
    public function deactive($id) 
    {
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'user');
        $this->session->set_flashdata('msg', 'User deactive Successfully');
        redirect(base_url('admin/user/all_user_list'));
    }

    //-- delete user
    public function delete($id)
    {
        $this->common_model->delete($id,'agents', 'agent_id'); 
        $this->session->set_flashdata('msg', 'Agent deleted Successfully');
        redirect(base_url('admin/agent/all_agent_list'));
    }


    public function power()
    {   
        $data['page_title'] = 'Add User Role';
        $data['powers'] = $this->common_model->get_all_power('user_power');
        $data['main_content'] = $this->load->view('admin/user/user_power', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add user power
    public function add_power()
    {   
        if (isset($_POST)) {
            $data = array(
                'name' => $_POST['name'],
                'power_id' => $_POST['power_id']
            );
            $data = $this->security->xss_clean($data);
            
            //-- check duplicate power id
            $power = $this->common_model->check_exist_power($_POST['power_id']);
            if (empty($power)) {
                $user_id = $this->common_model->insert($data, 'user_power');
                $this->session->set_flashdata('msg', 'Power added Successfully');
            } else {
                $this->session->set_flashdata('error_msg', 'Power id already exist, try another one');
            }
            redirect(base_url('admin/user/power'));
        }
        
    }

    //--update user power
    public function update_power()
    {   
        if (isset($_POST)) {
            $data = array(
                'name' => $_POST['name']
            );
            $data = $this->security->xss_clean($data);
            
            $this->session->set_flashdata('msg', 'Power updated Successfully');
            $user_id = $this->common_model->edit_option($data, $_POST['id'], 'user_power');
            redirect(base_url('admin/user/power'));
        }
        
    }

    public function delete_power($id)
    {
        $this->common_model->delete($id,'user_power'); 
        $this->session->set_flashdata('msg', 'Power deleted Successfully');
        redirect(base_url('admin/user/power'));
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