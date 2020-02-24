
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendmail extends CI_Controller {
public function index()
		{

			$sender_email = "justinekibor@gmail.com";
			$user_password = "kaplos4514";
			$username = "Howdy";
			$receiver_email = "justinekibor98@gmail.com.com";
			$subject = "Sample";
			$message = "Hello";
			
			$this->emailConfig();

			// Sender email address
			$this->email->from($sender_email, $username);
			// Receiver email address.for single email
			$this->email->to($receiver_email);
			//send multiple email
			$this->email->to("justinekibor@gmail.com");
			// Subject of email
			$this->email->subject($subject);
			// Message in email
			$this->email->message($message);
			// It returns boolean TRUE or FALSE based on success or failure
			
			$mail = ($this->email->send()) ? "Sent" : "Failed" ;
			echo $this->email->print_debugger();
			
			echo $mail;
		}

		
		/**
		 * Email Configurations
		 * ** Please deactivate Second-step verification for the smtp_user **
		 */
		private function emailConfig()
		{
			$config = array(
				'protocol' 	=> 'smtp' , 
				'smtp_host' => 'smtp.googlemail.com' , 
				'smtp_port' => 465 , 
				//'smtp_user' => 'justinekibor@gmail.com.com' ,
				//'smtp_pass' => 'kaplos4514',
				'mailtype'	=> 'html', 
				'charset' 	=> 'utf-8', 
				'newline' 	=> "\r\n",  
				'wordwrap' 	=> TRUE 
				);
			
			// Load email library and passing configured values to email library
			$this->load->library('email',$config);
		}

}