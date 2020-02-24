<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expert extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
           }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'EXpert System';
       // $data['plots'] = $this->common_model->get_all_objects('plots', "plot_id");
       $data['main_content'] =$this->load->view('expert/expert', $data, TRUE);
        //$data['notification'] = $this->common_model->get_notification();
        $this->load->view('expert/index', $data);
    }
        public function base(){
        $val = $value=  $this->input->post('value', TRUE);
        if($val== "kids" || $val== "dontknow"){
          $data= array(
            'sawa'=>"python",
            'nope'=>["makemoney","java", "whichos","c","cpp","csharp","end","for","javascript","something","prefer","auto"]
           
          );
          echo  json_encode($data);
         // $this->session->set_language("python");
        }
         else if($val== "easy" || $val== "best"){
          $data= array(
            'sawa'=>"python",
            'nope'=>["makemoney","java", "whichos","c","cpp","csharp","end","for","javascript","something","auto"]
           
          );
          echo  json_encode($data);
         // $this->session->set_language("python");
        }
          else if($val== "harder"){
          $data= array(
            'sawa'=>"auto",
            'nope'=>["makemoney","java", "whichos","c","cpp","csharp","end","for","javascript","something","python"]
           
          );
          echo  json_encode($data);
         // $this->session->set_language("python");
        }
         else if($val== "hard"){
          $data= array(
            'sawa'=>"cpp",
            'nope'=>["makemoney","java", "whichos","c","auto","csharp","end","for","javascript","something","python"]
           
          );
          echo  json_encode($data);
         // $this->session->set_language("python");
        }
        else if($val== "yes"){
          $data= array(
            'sawa'=>"yes",
            'nope'=>"no"
          );
         
        echo  json_encode($data);

        }
        else if($val== "no"){
          $data['sawa'] ="no";
          $data['nope']= "yes";
        echo  json_encode($data);

        } 
                else if($val== "money"){
          $data= array(
            'sawa'=>"makemoney",
            'nope'=>["python","java","justine", "whichos","c","cpp","csharp","end","for","javascript","something","prefer","auto"]
            //'nope'=>""

          );
           echo  json_encode($data);
         }
           else if($val== "forfun" || $val== "interest" || $val=="improve" ){
          $data= array(
            'sawa'=>"prefer",
            'nope'=>["python","java","justine", "whichos","c","cpp","csharp","end","for","javascript","something","makemoney","auto"]
            //'nope'=>""

          );
           echo  json_encode($data);
         }
         else if($val== "3d"){
          $data= array(
            'sawa'=>"cpp",
            'nope'=>["python","java","whichos","c","cpp", "csharp","end","for","javascript","something","prefer","auto"]
            //'nope'=>""

          );
           echo  json_encode($data);
         }
                  else if($val== "auto"){
          $data= array(
            'sawa'=>"java",
            'nope'=>["python","whichos","c","cpp", "csharp","end","for","javascript","something"]
            //'nope'=>""

          );
           echo  json_encode($data);
         }
           else if($val== "manual"){
          $data= array(
            'sawa'=>"c",
            'nope'=>["python","java","whichos","cpp", "csharp","end","for","javascript","something"]
            //'nope'=>""

          );
           echo  json_encode($data);
         }
         else if($val== "notmatter"){
          $data= array(
            'sawa'=>"java",
           'nope'=>["python","java","whichos","c","cpp", "csharp","end","for","javascript","something","prefer","auto"]
            //'nope'=>""
          );

         
        echo  json_encode($data);

        }

         else if($val== "mobile"){
          $data= array(
            'sawa'=>"whichos",
            'nope'=>["python","cpp","c","csharp","prefer","auto","microsoft","javascript"],
            //'nope'=>""
          );
          
         
        echo  json_encode($data);

        }
        else if($val== "android"){
          $data= array(
            'sawa'=>"java",
            'nope'=>["python","c","cpp", "csharp","end","for","javascript","something","prefer","auto","microsoft"]
            //'nope'=>""
          );
          
         
        echo  json_encode($data);

        }
         else if($val== "ios"){
          $data= array(
            'sawa'=>"c",
             'nope'=>["python","java","cpp", "csharp","end","for","javascript","something","prefer","microsoft","auto"]
            //'nope'=>""
          );
          
         
        echo  json_encode($data);

        }
         else if($val== "facebook" || $val== "google"){
          $data= array(
            'sawa'=>"python",
            'nope'=>["","java","cpp", "csharp","end","for","javascript","think","something","microsoft","prefer","auto","whichos"]
          
    
          );
          
         
        echo  json_encode($data);

        }
        else if($val== "microsoft"){
          $data= array(
            'sawa'=>"csharp",
            'nope'=>["cpp","java",'c',"python","whichos","prefer","auto"]
            //'nope'=>""
          );
          
         
        echo  json_encode($data);

        }
         else if($val== "apple"){
          $data= array(
            'sawa'=>"c",
            'nope'=>["cpp","java",'csharp',"python","whichos","for","something","end","think","prefer","auto"],
            //'nope'=>""
          );
          
         
        echo  json_encode($data);

        }
         else if($val== "web"){
          $data= array(
            'sawa'=>"end",
            'nope'=>["cpp","java",'csharp',"python","whichos","c","javascript"],
            //'nope'=>""
          );
          
         
        echo  json_encode($data);

        }
        else if($val== "front"){
          $data= array(
            'sawa'=>"javascript",
            'nope'=>["cpp","java",'csharp',"python","whichos","c","microsoft","prefer","auto","for","something"],
            //'nope'=>""
          );
          
         
        echo  json_encode($data);

        }
         else if($val== "back"){
          $data= array(
            'sawa'=>"for",
            'nope'=>["cpp","java",'csharp',"python","whichos","c","javascript","something"],
            //'nope'=>""
          );
          
         
        echo  json_encode($data);

        }
         else if($val== "startup"){
          $data= array(
            'sawa'=>"something",
            'nope'=>["cpp","java",'csharp',"python","whichos","c","javascript","think"],
            //'nope'=>""
          );
          
         
        echo  json_encode($data);

        }
                 else if($val== "company"){
          $data= array(
            'sawa'=>"think",
            'nope'=>["cpp","java",'csharp',"python","whichos","c","javascript","something"],
            //'nope'=>""
          );
          
         
        echo  json_encode($data);

        }
        else if($val== "new" || $val =="old"){
          $data= array(
            'sawa'=>"javascript",
            'nope'=>["cpp","java",'csharp',"python","whichos","c"],
            //'nope'=>""
          );
          
         
        echo  json_encode($data);

        }
        else if($val == "suck" || $val =="notbad"){
          $data= array(
            'sawa'=>"java",
            'nope'=>["cpp","javascript",'csharp',"python","whichos","c"],
            //'nope'=>""
          );
          
         
        echo  json_encode($data);

        }
         else if($val== "fan"){
          $data= array(
            'sawa'=>"csharp",
            'nope'=>["cpp","javascript",'java',"python","whichos","c"],
            //'nope'=>""
          );
          
         
        echo  json_encode($data);

        }
           else if($val== "enterprise"){
          $data= array(
            'sawa'=>"think",
            'nope'=>["cpp","javascript",'java',"python","whichos","c","csharp","end","something"],
            //'nope'=>""
          );
          
         
        echo  json_encode($data);

        }
   
}                                                                       
public function model(){
  $inputValue = $this->input->post('inputValue', TRUE);
  $data= $inputValue;
   echo  json_encode($data);

}
        
    
}