<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rent extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
    }


    public function index()
    {
                $data = array();
        $data['page_title'] = 'Tabs';
        $data['plots'] = $this->common_model->get_all_objects('plots', "plot_id");
        $data['balance'] = $this->common_model->get_all_objects('balances', "balance_id");
         $data['notification'] = $this->common_model->get_notification();
        $data['main_content'] = $this->load->view('admin/rent/rent', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- Rent collection done here
     public function collection() 
    {   
         $this->load->library('form_validation');
         $msg ="";
        if ($_POST) {
                      $this->form_validation->set_rules('plot', 'Plot', 'required|trim');
                       $this->form_validation->set_rules('houses', 'House', 'required|trim');
                    $this->form_validation->set_rules('mode', 'Mode', 'required|trim');
                    $this->form_validation->set_rules('year', 'Year', 'required|trim');
                    $this->form_validation->set_rules('month', 'Month', 'required|trim');
                    $this->form_validation->set_rules('amount', 'amount', 'required|numeric|trim');

                    
             if($this->form_validation->run())
  {
            $house_id = $_POST['houses'];
            $mode = $_POST['mode'];
            $year =  $_POST['year'];
            $month = $_POST['month'];
            $amount = $_POST['amount'];
            $tenant_id = $_POST['Ocupant'];
            $depositbal = $_POST['depositbal'];
            $rentbal = $_POST['rentbal'];
            $code = $_POST['code'];
             $waterbal = $_POST['waterbal'];
            $kplcbal = $_POST['kplcbal'];
            $garbagebal = $_POST['garbagebal'];
            $otherbal = $_POST['otherbal'];
            if($depositbal !=0 && $amount <$depositbal){
                $bal= $depositbal-$amount;
                $data = array(
                'tenant_id' => $tenant_id,
                'house_id' => $house_id,
                'year' => $year,
                'month' => $month,
                 'date' => current_datetime(),
                'Amount_paid' => $amount, 
                'mode' => $mode,
                'trans_code' => $code,
                'Bill' => "Deposit",
                 'deposit' => $amount,
                'Rent' => 0,
                'garbage' => 0,
                'water' => 0,
                 'kplc' => 0,
                'others' => 0, 
                 'depositball' => $bal ,
                'Rentball' => $rentbal,
                'garbageBall' => $garbagebal,
                'water' => $waterbal,
                 'kplc' => $kplcbal,
                'others' => $otherbal

               


                );
                $dataUpdate= array(
                 'tenant_id' => $tenant_id,
                'deposit' => $depositbal-$amount
                 

                );
                $bal= $depositbal-$amount;
                $data = $this->security->xss_clean($data);
                $dataUpdate = $this->security->xss_clean($dataUpdate);
                 $this->common_model->insert($data, 'payments');
               $this->common_model->edit_option($dataUpdate, $tenant_id, 'balances','tenant_id');
               $msg= "Successfully updated deposit payment for tenant id ".$tenant_id." new deposit balance is Ksh. ".$bal;

            }
            else if($depositbal !=0 && $amount >=$depositbal){
                 $rmbal = $amount-$depositbal;
                 $bal= $rentbal- $rmbal;
                $data = array(
                'tenant_id' => $tenant_id,
                'house_id' => $house_id,
                'year' => $year,
                'month' => $month,
                 'date' => current_datetime(),
                'Amount_paid' => $amount, 
                'mode' => $mode,
                'trans_code' => $code,
                'Bill' => "Deposit/Rent",
                'deposit' => $depositbal,
                'Rent' => $rmbal,
                'garbage' => 0,
                'water' => 0,
                 'kplc' => 0,
                'others' => 0, 
                 'depositball' => 0,
                'Rentball' => $bal,
                'garbageBall' => $garbagebal,
                'water' => $waterbal,
                 'kplc' => $kplcbal,
                'others' => $otherbal, 

                );
                $dataUpdate= array(
                 'tenant_id' => $tenant_id,
                'deposit' => 0,
                'Rent'   =>$rentbal- $rmbal
                 

                );
                $data = $this->security->xss_clean($data);
                $dataUpdate = $this->security->xss_clean($dataUpdate);
                 $this->common_model->insert($data, 'payments');
               $this->common_model->edit_option($dataUpdate, $tenant_id, 'balances','tenant_id');
               $msg= "Successfully updated deposit payment for tenant id ".$tenant_id." new deposit balance is Ksh. 0, Ksh.  ".$rmbal." carried forward for rent payment. New rent Balance is Ksh ".$bal;

            }
             else if($depositbal ==0 && $amount >= $rentbal){
                $bal= $amount- $rentbal;
                $rmbal = $rentbal - $amount;
                $data = array(
                'tenant_id' => $tenant_id,
                'house_id' => $house_id,
                'year' => $year,
                'month' => $month,
                 'date' => current_datetime(),
                'Amount_paid' => $amount, 
                'mode' => $mode,
                'trans_code' => $code,
                'Bill' => "Rent",
                 'deposit' => 0,
                'Rent' => $amount,
                'garbage' => 0,
                'water' => 0,
                 'kplc' => 0,
                'others' => 0, 
                 'depositball' => 0,
                'Rentball' => $rmbal,
                'garbageBall' => $garbagebal,
                'water' => $waterbal,
                 'kplc' => $kplcbal,
                'others' => $otherbal, 


                );
                $dataUpdate= array(
                 'tenant_id' => $tenant_id,
                'Rent'   =>$rentbal - $amount
                 

                );
                $data = $this->security->xss_clean($data);
                $dataUpdate = $this->security->xss_clean($dataUpdate);
                 $this->common_model->insert($data, 'payments');
               $this->common_model->edit_option($dataUpdate, $tenant_id, 'balances','tenant_id');
               $msg= "Successfully updated rent payment for tenant id ".$tenant_id.", New rent balance is Ksh. 0, Ksh.  ".$bal. " carried forward for next month. Outstanding rent balance is Ksh ".$rmbal;

            }
             else if($depositbal ==0 && $amount <= $rentbal){
                $bal= $rentbal -$amount;
                $rmbal= $rentbal- $amount;
                $data = array(
                'tenant_id' => $tenant_id,
                'house_id' => $house_id,
                'year' => $year,
                'month' => $month,
                 'date' => current_datetime(),
                'Amount_paid' => $amount, 
                'mode' => $mode,
                'trans_code' => $code,
                'Bill' => "Rent",
                 'deposit' => 0,
                'Rent' => $amount,
                'garbage' => 0,
                'water' => 0,
                 'kplc' => 0,
                'others' => 0, 
                 'depositball' => 0,
                'Rentball' => $bal,
                'garbageBall' => $garbagebal,
                'water' => $waterbal,
                 'kplc' => $kplcbal,
                'others' => $otherbal, 

                );
                $dataUpdate= array(
                 'tenant_id' => $tenant_id,
                'Rent'   =>$rentbal - $amount
                 

                );
            
                $data = $this->security->xss_clean($data);
                $dataUpdate = $this->security->xss_clean($dataUpdate);
                 $this->common_model->insert($data, 'payments');
               $this->common_model->edit_option($dataUpdate, $tenant_id, 'balances','tenant_id');
               $msg= "Successfully updated rent payment for tenant id ".$tenant_id." new rent balance is Ksh. ". $bal;

            }
           $this->session->set_flashdata('msg', $msg);
           redirect(base_url('admin/rent'));
            }
                                              
             else {
               // $this->session->set_flashdata('error_msg', 'Email already exist, try another email');
                $this->index();
            }
            }
        else{
            $this->index();
        }
    }
    public function all_room_list()
    {
        $data['page_title'] = 'All Registered rooms';
        $data['rooms'] = $this->common_model->get_all_objects('houses','house_id');
       // $data['country'] = $this->common_model->select('country');
      //  $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/rooms/rooms', $data, TRUE);
        $this->load->view('admin/index', $data);
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
 
   

    
    //-- delete room
    public function delete($id)
    {
        $this->common_model->delete($id,'houses', 'house_id'); 
        $this->session->set_flashdata('msg', 'Room deleted Successfully');
        redirect(base_url('admin/rooms/all_room_list'));
    }
    public function fetch_type(){
        $plot_id = $this->input->post('plot_id', TRUE);
        $data= $this->common_model->get_houses($plot_id)->result();
        echo  json_encode($data);
    }
        public function fetch_house(){
        $house_id = $this->input->post('house_id', TRUE);
        $data= $this->common_model->get_house_details($house_id)->result();
        echo  json_encode($data);
    }
    public function billHouse(){
        $id= $_POST['houses'];
         $this->load->library('form_validation');
      
                if ($_POST) {
                    $this->form_validation->set_rules('rent', 'Rent', 'required|min_length[4]|max_length[6]|trim');
                    $this->form_validation->set_rules('houses', 'House', 'required');
             if($this->form_validation->run())
  {            $data = array(
                'rent' => $_POST['rent'],
                'deposit' => $_POST['rent'],
                'house_id' =>$id
                
            );
                $update = array(
                'billed' => "Yes"
                
                
            );


            $data = $this->security->xss_clean($data);
             $update= $this->security->xss_clean($update);

            $this->common_model->insert($data, 'bills');
            $this->common_model->edit_option($update, $id, 'houses','house_id');
            $this->session->set_flashdata('msg', 'House Successfully billed');
            redirect(base_url('admin/rooms/all_room_list'));
            }
            else{
                $this->index();
            }

        } 

    }


       
}