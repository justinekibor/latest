<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plot extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Plot';
         $data['notification'] = $this->common_model->get_notification();
        $data['main_content'] = $this->load->view('admin/plot/add', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add new user by admin
    public function add()
    {    
                 $this->load->library('form_validation');
      
                if ($_POST) {
                    $this->form_validation->set_rules('plot_name', 'Plot name', 'required|min_length[3]|max_length[15]|trim');
                    $this->form_validation->set_rules('plot_size', 'Plot size', 'required|min_length[3]|max_length[15]|trim');
                    $this->form_validation->set_rules('area_code', 'Area code', 'required|numeric|min_length[2]|max_length[8]|trim');
                    $this->form_validation->set_rules('area_address', '`Area address', 'required|numeric|min_length[2]|max_length[13]|trim');
             if($this->form_validation->run())
  {            $data = array(
                'plot_name' => $_POST['plot_name'],
                'plot_area' => $_POST['plot_size'],
                'plot_code' => $_POST['area_code'],
                'plot_addr' => $_POST['area_address'], 
                'date_created' => current_datetime()
            );

            $data = $this->security->xss_clean($data);
            
            //-- check duplicate email

            if ($user_id = $this->common_model->insert($data, 'plots')) {
                
            
                $this->session->set_flashdata('msg', 'Plot added Successfully');
                redirect(base_url('admin/plot/all_plot_list'));
            } 
            else {
                $this->session->set_flashdata('error_msg', 'error while adding');
                redirect(base_url('admin/user'));
            }
            
            
            }
            else{
                $this->index();
            }

        } 
    } 

    public function all_plot_list()
    {
        $data['page_title'] = 'All Registered Plots';
        $data['users'] = $this->common_model->get_all_objects("plots", "plot_id");
       // $data['country'] = $this->common_model->select('country');
      //  $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/plot/plots', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function all_plots_list()
    {
        $data['page_title'] = 'All Registered Plots';
        $data['users'] = $this->common_model->get_all_objects("plots","plot_id" );
       // $data['country'] = $this->common_model->select('country');
      //  $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/plot/plots', $data, TRUE);
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
        
        $data['plot'] = $this->common_model->get_single_object_info($id, 'plots', 'plot_id');
       // $data['user_role'] = $this->common_model->get_user_role($id);
      //  $data['power'] = $this->common_model->select('user_power');
       // $data['country'] = $this->common_model->select('country');
        $data['main_content'] = $this->load->view('admin/plot/edit_plot', $data, TRUE);
        $data['page_title'] = 'Edit Plots';
        $this->load->view('admin/index', $data);
        
    }
   //-- delete user
    public function delete($id)
    {
        $this->common_model->delete($id,'plots', 'plot_id'); 
        $this->session->set_flashdata('msg', 'plot deleted Successfully');
        redirect(base_url('admin/plot/all_plot_list'));
    }

}