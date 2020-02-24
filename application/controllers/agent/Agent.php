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
        $data['main_content'] = $this->load->view('agent/agent/agent_complete', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add new user by admin
    public function complete()
        {   
        $verification_key = $this->uri->segment(4);
        $this->load->view("agent/agent_complete");
    
        if ($_POST) {
            $data = array(
                'email' => $_POST['email'],
                'created_at' => current_datetime(),
                'userRole' => 'Agent',
                'reg_key' =>  $verification_key
            );


            $data = $this->security->xss_clean($data);
            
            //-- check duplicate email
            $email = $this->common_model->check_email($_POST['email']);

            if (empty($email)) {
                $user_id = $this->common_model->insert($data, 'users');

                $data = array(
                    'link' => base_url()."/verify_email/".$verification_key,
                    'name'=> $_POST['email']
                );
               $user_id = $this->common_model->insert($data, 'email');
                  $this->session->set_flashdata('msg', 'Email Verifcation link sent Successfully');
                redirect(base_url('admin/agent/all_agent_list'));
                
            } else {
                $this->session->set_flashdata('error_msg', 'Email already exist, try another email');
                redirect(base_url('admin/agent'));
            }
            
            
            
            

        }
    } 


    public function all_agent_list()
    {
        $data['page_title'] = 'All Registered Agents';
        $data['users'] = $this->common_model->get_all_objects('users','id');
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
                'plot_name' => $_POST['plot_name'],
                'plot_area' => $_POST['plot_size'],
                'plot_code' => $_POST['area_code'],
                'plot_addr' => $_POST['area_address'], 
                'date_created' => current_datetime()
            );
            $data = $this->security->xss_clean($data);
            $this->common_model->edit_option($data, $id, 'plots','plot_id');
            $this->session->set_flashdata('msg', 'Information Updated Successfully');
            redirect(base_url('admin/plot/all_plot_list'));

        }
        
        $data['plot'] = $this->common_model->get_single_object_info($id, 'plots');
       // $data['user_role'] = $this->common_model->get_user_role($id);
      //  $data['power'] = $this->common_model->select('user_power');
       // $data['country'] = $this->common_model->select('country'''''
        $data['main_content'] = $this->load->view('admin/plot/edit_plot', $data, TRUE);
        $data['page_title'] = 'Edit Plots';
        $this->load->view('admin/index', $data);
        
    }

    
    //-- active user
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'user');
        $this->session->set_flashdata('msg', 'User active Successfully');
        redirect(base_url('admin/user/all_user_list'));
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
        $this->common_model->delete($id,'plots', 'plot_id'); 
        $this->session->set_flashdata('msg', 'User deleted Successfully');
        redirect(base_url('admin/plot/all_plot_list'));
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


}