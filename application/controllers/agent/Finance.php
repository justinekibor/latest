<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Finance extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
    }


    public function index()
    {
                $data = array();
    $data['page_title'] = 'Add expense';
     $data['tenants'] = $this->common_model->get_all_plot_tenants($this->session->userdata('id'));
     $data['notification'] = $this->common_model->get_notification();
      $data['plotid'] = $this->common_model->get_plot_id($this->session->userdata('id'));
    $data['main_content'] = $this->load->view('agent/expenses/add_expense', $data, TRUE);
        $this->load->view('agent/index', $data);
    }

 
        public function paid_rent()
    {
        $data['page_title'] = 'All plot payment List';
        $data['payments'] = $this->common_model->get_all_plot_payment($this->session->userdata('id'));
        $data['main_content'] = $this->load->view('agent/finance/payments', $data, TRUE);
        $this->load->view('agent/index', $data);
    }
            public function paid_deposit()
    {
        $data['page_title'] = 'All plot payment List';
        $data['payments'] = $this->common_model->get_all_plot_payment($this->session->userdata('id'));
        $data['main_content'] = $this->load->view('agent/finance/paiddeposit', $data, TRUE);
        $this->load->view('agent/index', $data);
    }
     public function sheet()
    {
        $data['page_title'] = 'Plot Balance Sheet';
        $data['payments'] = $this->common_model->get_all_plot_payment($this->session->userdata('id'));
        $data['main_content'] = $this->load->view('agent/finance/paiddeposit', $data, TRUE);
        $this->load->view('agent/index', $data);
    }
    public function pending_rent()
    {
        $data['page_title'] = 'All plot pending rent List';
        $data['payments'] = $this->common_model->get_all_plot_pending_payment($this->session->userdata('id'));
        $data['main_content'] = $this->load->view('agent/finance/rentalbal', $data, TRUE);
        $this->load->view('agent/index', $data);
    }
    public function pending_deposit()
    {
        $data['page_title'] = 'All plot pending deposit List';
        $data['payments'] = $this->common_model->get_all_plot_pending_payment($this->session->userdata('id'));
        $data['main_content'] = $this->load->view('agent/finance/depositbal', $data, TRUE);
        $this->load->view('agent/index', $data);
    }


    //-- view payment invoice
    public function payment($id)
    {
           $data = array();
            $data['payment'] = $this->common_model->select_receipt($id, 'payments', 'payment_id');
            $data['page_title'] = 'Payment Invoice';
           $data['main_content'] = $this->load->view('admin/rent/receipt', $data, TRUE);
           $this->load->view('agent/index', $data);


        }
        
    public function payment_receipt($id)
    {
           $data = array();
            $data['payment'] = $this->common_model->select_receipt($id, 'payments', 'payment_id');
            $data['page_title'] = 'Payment Invoice';
           $data['main_content'] = $this->load->view('admin/rent/receipt', $data, TRUE);
           $this->load->view('agent/index', $data);


        }



       
}
?>
