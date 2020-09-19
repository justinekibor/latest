<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
           }


    public function who()
    {
          $val = $value=  $this->input->post('value', TRUE);
        if($val== "all3"){ 
          $data= array(
            'nope'=>"",
            
           
          );
          echo  json_encode($data);
         // $this->session->set_language("python");
        }
            }

}