<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Justine extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
    }

    public function index() {

    $this->load->view('justine');
    }
        public function send() {
            $from = $this->config->item('smtp_user');
        $to = $this->input->post('to');
        $subject = $this->input->post('subject');
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

        $message = '<a href="localhost/house">click</a>';
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
     show_error($this->email->print_debugger());
    }
       // $this->load->view('justine');
    }
    public function mpesa(){
        
    } 

   public function jerop(){
$date1 = strtotime("2016-06-21 22:44:00"); 
$date2 = strtotime("2016-06-21 22:43:01"); 
$diff = abs($date2 - $date1);
echo $diff; 

   }
}