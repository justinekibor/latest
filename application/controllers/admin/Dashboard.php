<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
        $this->load->model('common_model');
    }


	 
    public function index(){
        $data = array();
        $data['page_title'] = 'Dashboard';
        $data['count_total'] = $this->common_model->get_tenant_total();
        $data['count_units'] = $this->common_model->get_unit_total();
        $data['count_plots'] = $this->common_model->get_plot_total();
        $data['count_agents'] = $this->common_model->get_agent_total();
         $data['count_rent'] = $this->common_model->get_rent_total();
         $data['count_rentp'] = $this->common_model->get_rentp_total();
        $data['count_depositp'] = $this->common_model->get_depositp_total();
         $data['count_deposit'] = $this->common_model->get_deposit_total();
          $data['count_collections'] = $this->common_model->get_collection_total();
          $data['notification'] = $this->common_model->get_notification();
        $data['main_content'] = $this->load->view('admin/home', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

	 
    public function backup($fileName='db_backup.zip'){
        $this->load->dbutil();
        $backup =& $this->dbutil->backup();
        $this->load->helper('file');
        write_file(FCPATH.'/downloads/'.$fileName, $backup);
        $this->load->helper('download');
        force_download($fileName, $backup);
    }

} 