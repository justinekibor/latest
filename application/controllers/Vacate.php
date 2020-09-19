<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vacate extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
          $this->load->model('common_model');
    }
 

    public function index(){
        
     }
        public function vacate(){
        $data = array(); 
        $data['page'] = 'Auth'; 
        $this->load->view('tenant/vacation', $data);
    }
     public function download(){
        $data = array();
        $data['page'] = 'Vacation Request';
        $dataupdate=array();
        $id = $this->uri->segment(3);
    $dataupdate = array(
        'claim' => 1,
        'vacation_date' => current_datetime()

            );
    $datavacate= array( 
       'status' => "vacant"
    ); 
     $dataupdate = $this->security->xss_clean($dataupdate);
     $datavacate = $this->security->xss_clean($datavacate);
     $vacated= $this->common_model->get_vacated_tenant($id); 
     if(!$vacated){
   $this->common_model->edit_option($dataupdate, $id, 'vacation','tenant_id');
 $this->common_model->edit_option($datavacate, $id, 'houses','tenant_id');
}
        $data['balance'] = $this->common_model->get_vacating_balances($id);
        $this->load->view('tenant/download', $data);
    
    }

 



}