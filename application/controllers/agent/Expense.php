<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expense extends CI_Controller {

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

    //-- Rent collection done here
    public function all_expense_list()
    {
        $data['page_title'] = 'All Billed tenants';
        $data['expense'] = $this->common_model->get_all_plot_expenses($this->session->userdata('id'));
       // $data['country'] = $this->common_model->select('country');
      //  $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('agent/expenses/expenses', $data, TRUE);
        $this->load->view('agent/index', $data);
    }
        public function payments()
    {
        $data['page_title'] = 'All payment List';
        $data['payments'] = $this->common_model->get_all_objects('payments','payment_id');
       // $data['country'] = $this->common_model->select('country');
      //  $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/rent/payments', $data, TRUE);
        $this->load->view('admin/index', $data);
    }


    //-- view payment invoice
    public function payment_receipt($id)
    {
           $data = array();
            $data['payment'] = $this->common_model->select_receipt($id, 'payments', 'payment_id');
            $data['page_title'] = 'Payment Invoice';
           $data['main_content'] = $this->load->view('admin/rent/receipt', $data, TRUE);
           $this->load->view('admin/index', $data);


        }
        public function add()
    { 
    $this->load->library('form_validation');
       if ($_POST) {
     $this->form_validation->set_rules('expense', 'Expense', 'required|trim');
    $this->form_validation->set_rules('amount', 'Amount', 'required|trim');
     $this->form_validation->set_rules('paywho', 'Pay to', 'required|trim');
    $this->form_validation->set_rules('description', 'Description', 'required|trim');
    $this->form_validation->set_rules('transcode', 'Transaction code', 'required|trim');
    if($this->form_validation->run())
  {
     $expense =$_POST['expense'];
     $amount =$_POST['amount'];
     $paidWho =$_POST['paywho'];
     $description =$_POST['description'];
     $transcode =$_POST['transcode'];
     $agent_id = $this->session->userdata('id');
     $plotid =$_POST['plot_id'];
     $expensedate = current_datetime();
    $data = array(
                'expense' => $expense,
                'amount' => $amount,
                'Expense_date' => $expensedate, 
                'underWho' => $agent_id,
                'description' => $description,
                'paidWho' => $paidWho,
                'plot_id' => $plotid, 
                'Transcode' => $transcode
            );

            $data = $this->security->xss_clean($data);
            $this->common_model->insert($data, 'expenses');
            $this->session->set_flashdata('msg', 'Successfully added new expense');
            redirect(base_url('agent/expense'));
    }
    else{
        $this->index();
    }
}
}



       
}
?>
