<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
    }


    public function index()
    {
    }

  

        public function payments()
    {
        $data['page_title'] = 'All payment List';
        $data['payments'] = $this->common_model->get_all_house_payment($this->session->userdata('id'));
       // $data['country'] = $this->common_model->select('country');
      //  $data['count'] = $this->common_model->get_user_total();
        $data['notification'] = $this->common_model->get_reply( $this->session->userdata('id'));
        $data['main_content'] = $this->load->view('tenant/payment/payments', $data, TRUE);
        $this->load->view('tenant/index', $data);
    }


    //-- view payment invoice
    public function payment_receipt($id)
    {
           $data = array();
            $data['payment'] = $this->common_model->select_receipt($id, 'payments', 'payment_id');
            $data['notification'] = $this->common_model->get_reply( $this->session->userdata('id'));
            $data['page_title'] = 'Payment Invoice';
           $data['main_content'] = $this->load->view('tenant/payment/receipt', $data, TRUE);
           $this->load->view('tenant/index', $data);


        }
 
   


  

   


       
}