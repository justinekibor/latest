<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Tenancy extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
    }


    public function index()
    {

      $data = array();
            $data['notification'] = $this->common_model->get_reply( $this->session->userdata('id'));
            $data['profile'] = $this->common_model->get_user( $this->session->userdata('id'));
            $data['page_title'] = 'Vacation Request';
           $data['main_content'] = $this->load->view('tenant/tenancy/vacate', $data, TRUE);
           $this->load->view('tenant/index', $data); 
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
    public function agreement()
    {
           $data = array();
            $data['notification'] = $this->common_model->get_reply( $this->session->userdata('id'));
            $data['profile'] = $this->common_model->get_user( $this->session->userdata('id'));
            $data['page_title'] = 'Tenancy agreement';
           $data['main_content'] = $this->load->view('tenant/tenancy/agreement', $data, TRUE);
           $this->load->view('tenant/index', $data);


        }
 
   
   public function vacation(){
    $email = $this->input->post('email', TRUE);
    $inputValue = $this->input->post('inputValue', TRUE);
    $vacation_key= md5(rand());
    $id = $this->session->userdata('id');
    $link= base_url()."vacate/vacate".$vacation_key;
             $data = array(
              'tenant_id' => $id,
              'vacation_reason' => $inputValue,
              'vacation_link' => $vacation_key,
              'claim' => 0,
              'link' => $link,
              'vacation_expiry' => current_datetime()

                );
           $dataupdate = array(
              'vacation_reason' => $inputValue,
              'vacation_link' => $vacation_key,
              'claim' => 0,
              'link' => $link,
              'vacation_expiry' => current_datetime()

                );
        $query = $this->common_model->normal_vacation($email);
        $query1 = $this->common_model->normal_vacated($id);
      if(!$query && !$query1){
     $from = $this->config->item('smtp_user');
   $to =$email; 
 $subject = "Leasehouse Account completion";
      //  $message = $this->input->post('message');
   $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'justinekibor98@gmail.com', // change it to yours
  'smtp_pass' => 'kaplos4514', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);

        $message = '<a href="'.$link.'">Click here to complete your vacation request</a>';
        $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('justinekibor98@gmail.com'); // change it to yours
      $this->email->to($to);// change it to yours
      $this->email->subject($subject);
      $this->email->message($message);
      if($this->email->send())
     {
    //$this->common_model->insert($data, 'users');
   $data = $this->security->xss_clean($dataupdate);
 $this->common_model->edit_option($dataupdate, $id, 'vacation','tenant_id');
     $this->common_model->insert($datal, 'email');
    $this->session->set_flashdata('msg', 'Email Verifcation link sent Successfully');
          redirect(base_url('admin/agent'));
          echo  json_encode($data);
     }
     else
    {
  // $this->common_model->insert($data, 'vacation');
 $data = $this->security->xss_clean($dataupdate);
 $this->common_model->edit_option($dataupdate, $id, 'vacation','tenant_id');
     $error_msg = $this->email->print_debugger();
      $this->session->set_flashdata('server_msg', $error_msg);
       echo  json_encode("Successfully");

    }

    $data = $email;
     echo  json_encode($data);
   }
         else if(!$query && $query1){
     $from = $this->config->item('smtp_user');
   $to =$email; 
 $subject = "Leasehouse Account completion";
      //  $message = $this->input->post('message');
   $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'justinekibor98@gmail.com', // change it to yours
  'smtp_pass' => 'kaplos4514', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);

        $message = '<a href="'.$link.'">Click here to complete your vacation request</a>';
        $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('justinekibor98@gmail.com'); // change it to yours
      $this->email->to($to);// change it to yours
      $this->email->subject($subject);
      $this->email->message($message);
      if($this->email->send())
     {
        $this->common_model->insert($data, 'users');
     $this->common_model->insert($datal, 'email');
    $this->session->set_flashdata('msg', 'Email Verifcation link sent Successfully');
          redirect(base_url('admin/agent'));
          echo  json_encode($data);
     }
     else
    {
      $this->common_model->insert($data, 'vacation');
     $error_msg = $this->email->print_debugger();
      $this->session->set_flashdata('server_msg', $error_msg);
       echo  json_encode("Successfully");

    }

    $data = $email;
     echo  json_encode($data);
   }
   else{

   }
   }


 }