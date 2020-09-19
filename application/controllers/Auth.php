<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// *************************************************************************
// *                                                                       *
// * leasehouse LinkupComputers                              *
// * Copyright (c) leasehouse LinkupComputers. All Rights Reserved                     *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: info@leasehouselinkupsoftware.com                                 *
// * Website: https://leasehouselinkup.com.ng								   *
// * 		  https://leasehouselinkupsoftware.com							   *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// *                                                                       *
// *************************************************************************

//LOCATION : application - controller - Auth.php

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
          $this->load->model('common_model');
    }
 

    public function index(){
        $data = array();
        $data['page'] = 'Auth';
        $this->load->view('admin/login', $data);
    }



 /****************Function login**********************************
     * @type            : Function
     * @function name   : log
     * @description     : Authenticatte when uset try lo login. 
     *                    if autheticated redirected to logged in user dashboard.
     *                    Also set some session date for logged in user.   
     * @param           : null 
     * @return          : null 
     * ********************************************************** */
    public function log(){
         $data = array();

        if($_POST){ 
            $query = $this->login_model->validate_user();
            
              
            if($query){
                foreach($query as $row){
                    $link="";
                    $data = array(
                        'id' => $row->id,
                        //'name' => $row->first_name,
                        'email' =>$row->email,
                        'is_verified' =>$row->is_verified,
                        'is_complete' => $row->is_complete,
                        'role' =>$row->userRole,
                        'image'=>$row->image,
                        'is_login' => TRUE
                    );
                    if($row->is_verified == "No"){
                        $this->session->set_flashdata('error_msg', 'Please make sure that you have verified your email first');
                         redirect(base_url('auth'));

                    }
                    else if($row->is_complete== "No"){
                        $this->session->set_flashdata('error_msg', 'Please kindly complete your account first using the link send to your email');
                         redirect(base_url('auth'));

                    }
                    else if($row->is_banned == "Yes"){
                        $this->session->set_flashdata('error_msg', 'your account has been temporarily banned, please conduct the admin');
                         redirect(base_url('auth'));

                    }
                    else{
                    if($row->userRole == 'Admin'){
                    $this->session->set_userdata($data);
                    $url = base_url('admin/dashboard');
                    $link="admin";

                } 
                    else if($row->userRole == 'Agent'){
                    $this->session->set_userdata($data);
                    $url = base_url('agent/dashboard');
                    $link = "agent";
                } 
                else if($row->userRole == 'Tenant'){
                    $this->session->set_userdata($data);
                    $url = base_url('tenant/dashboard');
                    $link = "tenant";
                } 
                     else if($row->userRole == 'expert'){
                    $this->session->set_userdata($data);
                    $url = base_url('expert');
                    $link = "language";
                } 
            }

                }
				redirect(base_url() . $link.'/dashboard', 'refresh');
            }
            else{
               redirect(base_url() . 'auth', 'refresh');
            }
            
        }else{
            $this->load->view('auth',$data);
        }
    }

 /*     * ***************Function logout**********************************
     * @type            : Function
     * @function name   : logout
     * @description     : Log Out the logged in user and redirected to Login page  
     * @param           : null 
     * @return          : null 
     * ********************************************************** */
    
    function logout(){
        $this->session->sess_destroy();
        $data = array();
        $data['page'] = 'logout';
        $this->load->view('admin/login', $data);
    }
            public function signup(){
                        $data = array();
        $data['page_title'] = 'EXpert System';
      $data['main_content'] =$this->load->view('expert/signup', $data, TRUE);
        $this->load->view('expert/index', $data);
    }
    public function reset(){
        $email = $_POST['email'];
        $query = $this->common_model->very_normal_person($email);
        if($query){
            $reset_key= md5(rand());
            $data = array(
                'password_reset_key' =>  $reset_key,
                'password_reset_expiry' => current_datetime()
            );
        $data = $this->security->xss_clean($data);
         $this->common_model->edit_option($data, $email, 'users','email');
         $link= base_url()."auth/change/".$reset_key;
         $from = $this->config->item('smtp_user');
        $to =$email;
        $subject = "LeaseHouse Password reset Link";
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

        $message = '<a href="'.$link.'">Click here to reset password</a>';
        $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('justinekibor98@gmail.com'); // change it to yours
      $this->email->to($to);// change it to yours
      $this->email->subject($subject);
      $this->email->message($message);
      if($this->email->send())
     {
      echo 'Email sent.';
     }
     else
    {
     $error_msg = $this->email->print_debugger();
      $this->session->set_flashdata('error_msg', $error_msg);
     redirect(base_url('auth'));
    }

                   
        }
        else{
     $this->session->set_flashdata('error_msg', 'User does not exist, kindly check your mail again');
     redirect(base_url('auth'));

        }



    }
    public function change(){
       $data = array();
        $data['page'] = 'Auth';
        $data['key'] = $this->uri->segment(3);
        $this->load->view('admin/recover', $data);

    }
    public function changing(){
        $verification_key = $this->uri->segment(3);
         $cpassword = $_POST['cpassword'];
         $password = $_POST['password'];
         if($cpassword != $password){
     $this->session->set_flashdata('error_msg', "Passwords do not change");
     redirect(base_url('auth/change'));

         }
         else{
            $password= ($password);
            $data = array(
                'password' => $password,
            );
        $data = $this->security->xss_clean($data);
         $this->common_model->edit_option($data, $verification_key, 'users','password_reset_key');
          $this->session->set_flashdata('reset_msg', "Successfully changed your password");
     redirect(base_url('auth'));
        

         }
    }
    public function vacate(){
        
    }


}