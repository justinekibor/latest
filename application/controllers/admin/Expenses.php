<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expenses extends CI_Controller {

    public function __construct(){ 
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
           }

    public function index() 
    {
     $data['page_title'] = 'All Expenses';
        $data['payments'] = $this->common_model->get_all_expenses();
        $data['main_content'] = $this->load->view('admin/expenses/expenses', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
 

}