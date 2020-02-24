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

}