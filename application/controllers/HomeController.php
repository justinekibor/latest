<?php
class HomeController extends CI_Controller {

    public function __construct(){
       parent::__construct();
     //   $this->load->model('login_model');
     $this->load->model('common_model');
       $this->load->model('login_model');
    }


    public function index(){
        $data['rooms'] = $this->common_model->get_all_vacant_rooms();
         $data['happies'] = $this->common_model->get_all_happy_clients();
         $this->load->view('admin/homeindex', $data);
    } 
        public function signup(){
       // $data = array();
     //  $data['page'] = 'Auth';
        $this->load->view('expert/signup');
    }
    public function vacancies(){
        $id= $_GET['id'];
        $data['rooms'] = $this->common_model->get_single_vacant($id);
         $this->load->view('admin/vacancies', $data);

    }
    public function send(){
        $email= $this->input->post('email', TRUE);
        $name= $this->input->post('name', TRUE);
        $prefer= $this->input->post('prefer', TRUE);
        $message= $this->input->post('message', TRUE);
    $query = $this->common_model->normal_person($email);
      if(!$query){
        $data = array(
                'email' =>$email, 
                'interest' =>$prefer,
                'message' =>$message,
                'name' =>$name,
                'date' =>current_datetime()

            ); 
    $data = $this->security->xss_clean($data);
            $this->common_model->insert($data, "emailHarvest");
        echo json_encode("Successfully send your message");
    }
    else{
        $this->common_model->delete($email,'emailHarvest', 'email');
            $data = array(
                'email' =>$email, 
                'interest' =>$prefer,
                'message' =>$message,
                'name' =>$name,
                'date' =>current_datetime()

            ); 
    $data = $this->security->xss_clean($data);
            $this->common_model->insert($data, "emailHarvest");
        echo json_encode("Successfully send your message");

         
    }
    }
}
    ?> 