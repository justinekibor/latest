<?php
class HomeController extends CI_Controller {

    public function __construct(){
       parent::__construct();
     //   $this->load->model('login_model');
    }


    public function index(){
       // $data = array();
     //  $data['page'] = 'Auth';
        $this->load->view('admin/homeindex');
    }
}
    ?>