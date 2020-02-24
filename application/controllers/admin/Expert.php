<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expert extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
           }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'EXpert System';
       // $data['plots'] = $this->common_model->get_all_objects('plots', "plot_id");
       $this->load->view('admin/rooms/tabs', $data, TRUE);
        //$data['notification'] = $this->common_model->get_notification();
        ///$this->load->view('admin/index', $data);
    }

}