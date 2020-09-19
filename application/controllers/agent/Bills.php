<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bills extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
    }


    public function index()
    {
                $data = array();
        $data['page_title'] = 'Bill Tenant';
        $data['plots'] = $this->common_model->get_all_objects('plots', "plot_id");
        $data['balance'] = $this->common_model->get_all_objects('balances', "balance_id");
         $data['tenants'] = $this->common_model->get_all_plot_tenants($this->session->userdata('id'));
         $data['notification'] = $this->common_model->get_notification();
        $data['main_content'] = $this->load->view('agent/bills/bill', $data, TRUE);
        $this->load->view('agent/index', $data);
    }

    //-- Rent collection done here
    public function all_bills_list()
    {
        $data['page_title'] = 'All Billed tenants';
        $data['bills'] = $this->common_model->get_all_plot_bills($this->session->userdata('id'));
       // $data['country'] = $this->common_model->select('country');
      //  $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('agent/bills/bills', $data, TRUE);
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
        public function add()
    { 
     $tenant_id =$_POST['tenant'];
     $waterb =$_POST['waterb']+$_POST['water'];
     $kplcb =$_POST['kplcb']+$_POST['kplc'];
     $garbageb =$_POST['garbageb']+$_POST['garbage'];
     $otherb =$_POST['otherb']+$_POST['other'];
    if($tenant_id !=0){  
    $data = array(
                'garbage' => $garbageb,
                'kplc' => $kplcb,
                'water' => $waterb, 
                'others' => $otherb
            );

            $data = $this->security->xss_clean($data);
            $this->common_model->edit_option($data, $tenant_id, 'balances','tenant_id');
            $this->session->set_flashdata('msg', 'Information Updated Successfully');
            redirect(base_url('agent/bills'));
        }
        else{
             $this->session->set_flashdata('error_msg', 'You must select the tenant to bill');
                redirect(base_url('agent/bills'));

        } 
    }



       
}