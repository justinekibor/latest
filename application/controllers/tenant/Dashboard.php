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
        $data['count'] = $this->common_model->get_user_total();
        $data['notification'] = $this->common_model->get_reply( $this->session->userdata('id'));
        $data['main_content'] = $this->load->view('tenant/home', $data, TRUE);
        $this->load->view('tenant/index', $data);
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