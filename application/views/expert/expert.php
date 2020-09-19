 <script type="text/javascript">
  var Valuename = <?php echo $expert->language;?>;
  </script>
<?php
      $query = $this->common_model->normal_user($this->session->userdata('id'));
      if(!$query){
        $data= array(
            'id' =>$this->session->userdata('id'),
            'email' =>$this->session->userdata('email')
        );
        $this->common_model->insert($data, 'expert');
      }
      else if($expert->is_okey== "Yes"){
        
      echo'<script>
       ';
       echo'$(document).ready(function(){
                                           swal({
                                title: "Hi, We hope '.$expert->language.' is taking you to your destiny?",
                                 text: "If NOT kindly keep us a reason else cancel",
                               type: "input",
                                 showCancelButton: true,
                                closeOnConfirm: false,
                                 inputPlaceholder: "kindly just write something here"
                                }, function (inputValue) {
                            if (inputValue === false) return false;
                                if (inputValue === "") {
                             swal.showInputError("You need to write something!");
                                 return false
                                            }
                                            $.ajax({
                                 url:"'.base_url().'expert/model",
                                type:"POST",  
                                data:{inputValue:inputValue,nameValue:Valuename},
                                asyn : true,
                                dataType  : "json",
                                       success: function (data) {
                                        swal("Wow!", "Thanks for your feedback.\nwhen you dont create things, you become defined by your tastes rather than ability ", "success");

                                          }
                                          });
                             
                                });});';
     echo ' </script>';
      
        }
         else if($expert->is_okey== "No"){
        
      echo'<script>';
       echo'$(document).ready(function(){
        swal("welcome again", "We noticed you were fit for '.$expert->language.'\nAnd this was your reason of not learning it\n`'.$expert->reason.'`\nWe dont think this can make you not learn '.$expert->language.'\nBut you can still explore more, We got have alot of options for you","info");
       });';
     echo ' </script>';
      
        }
      
 ?>
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="panel panel-default"> 
                            <div class="panel-heading" style="background: wheat;">Choose your Favourite Language here!
 <button class="btn btn-warning pull pull-right"><a href="<?php echo base_url()?>/language/dashboard">Back</a></button>
                            </div>
                            <div class="panel-wrapper p-b-10 collapse in">
                                <div id="owl-demo" class="owl-carousel owl-theme">
                                    <div class="item"><img src="<?php echo base_url(); ?>leasehouse/plugins/images/heading-bg/slide3.jpg" alt="Owl Image"></div>
                                    <div class="item"><img src="<?php echo base_url(); ?>leasehouse/plugins/images/heading-bg/slide2.jpg" alt="Owl Image"></div>
                                    <div class="item"><img src="<?php echo base_url(); ?>leasehouse/plugins/images/heading-bg/slide3.jpg" alt="Owl Image"></div>
                                    <div class="item"><img src="<?php echo base_url(); ?>leasehouse/plugins/images/heading-bg/slide4.jpg" alt="Owl Image"></div>
                                    <div class="item"><img src="<?php echo base_url(); ?>leasehouse/plugins/images/heading-bg/slide6.jpg" alt="Owl Image"></div>
                                    <div class="item"><img src="<?php echo base_url(); ?>leasehouse/plugins/images/heading-bg/slide1.jpg" alt="Owl Image"></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            
               
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="white-box">
                            <div class="skin skin-square">
                                <h3 style="color: blue; font-weight: bolder; font-size: 16">Which programming language should I learn first?
                        To answer, choose a radio buttton below each question.
                    </h3>

                                <form class="form-group">
                                   <!----- quiz one--> 
                                    <div class="form-group">
                                        <label class="text text-info">Why do you want to learn programming?
                                        </label>
                                        <div class="input-group">
                                            
                                            <ul class="icheck-list">
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="kids"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">For my kids</label>
                                            </li>
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="dontknow"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">I dont Know</label>
                                            </li>
                                              <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="money"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">To Make money</label>
                                            </li>
                                             <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="forfun"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Just for fun</label>
                                            </li>
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="interest"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Iam interested</label>
                                            </li>
                                               <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="improve"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">To improve myself</label>
                                            </li>                                                                                                                                                                                                                            

                                                
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end-==------------python-->
                                    
                                    <!-- yes ---->
                                    <div class="yes" id="yes">
                                    <label class="text text-success">Wow!!!.... We just knew. Iam certain you will like it. You will proof us right.
                                        We wish all the best.
                                    </label>
                                </div>
                                <!--no------------------>
                                <div class="no" id="no">
                                <label class="text text-warning">Ghai!!!, anyway here we respect what people decide. Could you mind indicating down here why you dont like this langauge, This is an aid to better our services</label>
                                <input type="text" name="unsatisfied" class="form-control " placeholder="kindly indicate here"><br/>
                                <input type="submit" class="btn btn-primary pull pull-right" name="reason" value="Submit">

                                   </div> 
                                         
                                   <!--- make money----->
                                       <div class="form-group" id="makemoney">
                                        <label class="text text-info">Which platform/field?
                                        </label>
                                        <div class="input-group">
                                            
                                            <ul class="icheck-list">
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="notmatter"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Doesn't matter. just want to make money</label>
                                            </li>
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="3d"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">3D/ Gaming</label>
                                            </li>
                                              <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="mobile"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Mobile</label>
                                            </li>
                                             <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="facebook"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Facebook</label>
                                            </li>
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="google"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Google</label>
                                            </li>
                                               <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="microsoft"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Microsoft</label>
                                            </li> 
                                               <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="web"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Web</label>
                                            </li>
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="enterprise"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Enterprise</label>
                                            </li>
                                               <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="apple"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Apple</label>
                                            </li>                                                                                                                                                                                                                                                                                                                                

                                                
                                                
                                            </ul>
                                        </div>
                                    </div>
                                   <!--- make money----->
                                    <!--- which os----->
                                       <div class="form-group" id="whichos">
                                        <label class="text text-info">Which OS?
                                        </label>
                                        <div class="input-group">
                                            
                                            <ul class="icheck-list">
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="ios"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">IOS</label>
                                            </li>
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="android"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">android</label>
                                            </li>
                                                                                                                                                                               
                                                
                                            </ul>
                                        </div>
                                    </div>
                              <!--- which os----->
                               <!--- end----->
                                       <div class="form-group" id="end">
                                        <label class="text text-info">Which End?
                                        </label>
                                        <div class="input-group">
                                            
                                            <ul class="icheck-list">
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="front"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Front end</label>
                                            </li>
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="back"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Back end</label>
                                            </li>
                                                                                                                                                                               
                                                
                                            </ul>
                                        </div>
                                    </div>
                              <!--- end---->
                                          <!--- end----->
                                       <div class="form-group" id="for">
                                        <label class="text text-info">I want to work for....?
                                        </label>
                                        <div class="input-group">
                                            
                                            <ul class="icheck-list">
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="startup"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Startup</label>
                                            </li>
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="company"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Corporate</label>
                                            </li>
                                                                                                                                                                               
                                                
                                            </ul>
                                        </div>
                                    </div>
                              <!--- end---->
                                <!--- think---->
                                       <div class="form-group" id="think">
                                        <label class="text text-info">What do you think of microsoft?
                                        </label>
                                        <div class="input-group">
                                            
                                            <ul class="icheck-list">
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="fan"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">I am a fan</label>
                                            </li>
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="notbad"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Not bad</label>
                                            </li>
                                             <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="suck"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">suck</label>
                                            </li>
                                                                                                                                                                               
                                                
                                            </ul>
                                        </div>
                                    </div>
                              <!--- think--->
                                                              <!--- prefer---->
                                       <div class="form-group" id="prefer">
                                        <label class="text text-info">I prefer to learn things...
                                        </label>
                                        <div class="input-group">
                                            
                                            <ul class="icheck-list">
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="easy"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">The easy way</label>
                                            </li>
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="best"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">The best way
                                      </label>
                                            </li>
                                             <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="harder"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn"> The slightly harder way
                                  </label>
                                            </li>
                                            <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="hard"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">The really hard way (but easier to <br/> pick up other languages in the future)
                                           </label>
                                            </li>
                                                                                                                                                                               
                                                
                                            </ul>
                                        </div>
                                    </div>
                              <!--- prefer--->
                               <!--- auto---->
                                       <div class="form-group" id="auto">
                                        <label class="text text-info">Auto or manual?
                                        </label>
                                        <div class="input-group">
                                            
                                            <ul class="icheck-list">
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="auto"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Auto</label>
                                            </li>
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="manual"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Manual</label>
                                            </li>
                                                                                                                                                                               
                                                
                                            </ul>
                                        </div>
                                    </div>
                              <!--- auto--->
                               <!--- end----->
                                       <div class="form-group" id="something">
                                        <label class="text text-info">Do you want to try something new, with huge potential, but less mature?
                                        </label>
                                        <div class="input-group">
                                            
                                            <ul class="icheck-list">
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="new"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">Yes</label>
                                            </li>
                                                <li>
                                                <input type="radio" name="why_learn" id="why_learn"  value="old"  onclick="OnChangeRadio (this)" /> 
                                                <label for="why_learn">No</label>
                                            </li>
                                                                                                                                                                               
                                                
                                            </ul>
                                        </div>
                                    </div>
                              <!--- end---->
                               <!----- python---> 
                                    <div class="form-group" id="python">
                                        <label class="text text-success">Python<br/>
                                        Widely regarded as the best programming language for beginners<br/>
                                          Easiest to learn
                                        </label><br/>
                                        <label class="text text-info">Are you comfortable with it?</label>
                                        <div class="input-group">
                                            
                                            <ul class="icheck-list">
                                                <li>
                                                <input type="radio" name="comfortable" id="why_learn" class="text text-success" value="yes"  onclick="OnChangeRadio (this)" /> 
                                                <label for="confort">Yes</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="comfortable" id="why_learn" class="text text-danger" value="no"  onclick="OnChangeRadio (this)" /> 
                                                <label for="confort">No</label>
                                            </li>
                                                                                                                                                                                            
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end-==------------python------->
                                     <!----- javascript---> 
                                    <div class="form-group" id="javascript">
                                        <label class="text text-success">Javascript<br/>
                                            Most popular clients-side web scripting language
                                                 A must learn for front-end web developer (HTML and CSS as well)</label><br/>

                                        <label class="text text-info">Are you comfortable with it?</label>
                                        <div class="input-group">
                                            
                                            <ul class="icheck-list">
                                                <li>
                                                <input type="radio" name="comfortable" id="why_learn" class="text text-success" value="yes"  onclick="OnChangeRadio (this)" /> 
                                                <label for="confort">Yes</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="comfortable" id="why_learn" class="text text-danger" value="no"  onclick="OnChangeRadio (this)" /> 
                                                <label for="confort">No</label>
                                            </li>
                                                                                                                                                                                            
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end-==------------javascript------->

                                     <!-----java --> 
                                    <div class="form-group" id="java">
                                        <label class="text text-success">Java<br/>
                                            One of the most in demand & highest paying programming languages

                                        <br/>
                                        Slogan: write once, work everywhere
                                        </label>
                                        <label class="text text-info">Are you comfortable with it?</label>
                                        <div class="input-group">
                                            
                                            <ul class="icheck-list">
                                                <li>
                                                <input type="radio" name="comfortable" id="why_learn" class="text text-success" value="yes"  onclick="OnChangeRadio (this)" /> 
                                                <label for="confort">Yes</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="comfortable" id="why_learn" class="text text-danger" value="no"  onclick="OnChangeRadio (this)" /> 
                                                <label for="confort">No</label>
                                            </li>
                                                                                                                                                                                            
                                            </ul>
                                        </div>
                                    </div>                                
                                   <!----java -------------->
                                     <!-----cpp --> 
                                    <div class="form-group" id="cpp">
                                        <label class="text text-success">C++<br/>
                                            Complex version of C with a lot more features
                                               Recommended only if you have a mentor to guide you
                                            

                                        <br/>
                                        Slogan: Don’t pay for what you don’t use
                                        </label>
                                        <label class="text text-info">Are you comfortable with it?</label>
                                        <div class="input-group">
                                            
                                            <ul class="icheck-list">
                                                <li>
                                                <input type="radio" name="comfortable" id="why_learn" class="text text-success" value="yes"  onclick="OnChangeRadio (this)" /> 
                                                <label for="confort">Yes</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="comfortable" id="why_learn" class="text text-danger" value="no"  onclick="OnChangeRadio (this)" /> 
                                                <label for="confort">No</label>
                                            </li>
                                                                                                                                                                                            
                                            </ul>
                                        </div>
                                    </div>                                
                                   <!----cpp -------------->
                                    <!-----csharp --> 
                                    <div class="form-group" id="csharp">
                                        <label  class="text text-success">C#<br/>
                                            A popular choice for enterprise to create websites and Windows application using .NET framework
                                        Similar to Java in basic syntax and some features
                                        </label>
                                        <label class="text text-info">Are you comfortable with it?</label>
                                        <div class="input-group">
                                            
                                            <ul class="icheck-list">
                                                <li>
                                                <input type="radio" name="comfortable" id="why_learn" class="text text-success" value="yes"  onclick="OnChangeRadio (this)" /> 
                                                <label for="confort">Yes</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="comfortable" id="why_learn" class="text text-danger" value="no"  onclick="OnChangeRadio (this)" /> 
                                                <label for="confort">No</label>
                                            </li>
                                                                                                                                                                                            
                                            </ul>
                                        </div>
                                    </div>                                
                                   <!----csharp-------------->
                                   <!-----c --> 
                                    <div class="form-group" id="c">
                                        <label class="text text-success"> Objective-C<br/>
                                             Primary language used by Apple for MacOSX & iOS
                                            Choose this if you want to focus on developing iOS or OSX apps only
                                        </label>
                                        <label class="text text-info">Are you comfortable with it?</label>
                                        <div class="input-group">
                                            
                                            <ul class="icheck-list">
                                                <li>
                                                <input type="radio" name="comfortable" id="why_learn" class="text text-success" value="yes"  onclick="OnChangeRadio (this)" /> 
                                                <label for="confort">Yes</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="comfortable" id="why_learn" class="text text-danger" value="no"  onclick="OnChangeRadio (this)" /> 
                                                <label for="confort">No</label>
                                            </li>
                                                                                                                                                                                            
                                            </ul>
                                        </div>
                                    </div>                                
                                   <!----c -------------->



                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <input type="text" name="checked" id="checked">
                
<head>
   
</head>
<div id="justine"></div>
<style>
    .checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}
body{
    padding-bottom: 150px;
}
</style>
<script>
    $(document).ready(function(){
    $("#python").hide();
    $("#yes").hide();
    $("#no").hide();
    $("#makemoney").hide();
    $("#java").hide();
    $("#cpp").hide();
     $("#c").hide();
    $("#whichos").hide();
     $("#csharp").hide();
      $("#end").hide();
     $("#javascript").hide();
     $("#for").hide();
     $("#something").hide();
      $("#think").hide();
      $("#auto").hide();
      $("#prefer").hide();
       $("#checked").hide();


    });
</script>
 <script type="text/javascript">
        function OnChangeRadio (radio) {
            var value =radio.value;
            var nameValue = document.getElementById("checked").value;
            jQuery.ajax({
                                url:"<?php echo base_url();?>expert/base",
                                type:"POST",  
                                data:{value:value},
                                asyn : true,
                                dataType  : 'json',
                               success:function(data){
                                if(data.language == "yes"){
                                 
                     setTimeout(function() {
                        swal({
                      title: "Nice one!",
                      text: "We are sure this one will take you to your destiny",
                      type: "success"
                           }, function() {
                                $.ajax({
                                 url:"<?php echo base_url();?>expert/okeymodel",
                                type:"POST",  
                                data:{nameValue:nameValue },
                                asyn : true,
                                dataType  : 'json',
                                       success: function (data) {
                                        window.location ="<?php echo base_url();?>/language/dashboard";
                                          }
                                          });
                     
                      });
                     }, 1000);

                                     
                                }
                                else if(data.language=="no"){
                                    swal({
                                title: "Okey it is fine!, Could you mind telling us why?",
                                 text: "This will help us improve our services",
                               type: "input",
                                 showCancelButton: true,
                                closeOnConfirm: false,
                                 inputPlaceholder: "kindly just write your reason here"
                                }, function (inputValue) {
                            if (inputValue === false) return false;
                                if (inputValue === "") {
                             swal.showInputError("You need to write something!");
                                 return false
                                            }
                                            $.ajax({
                                 url:"<?php echo base_url();?>expert/model",
                                type:"POST",  
                                data:{inputValue:inputValue,nameValue:nameValue },
                                asyn : true,
                                dataType  : 'json',
                                       success: function (data) {
                                        swal("Wow!", "Thanks for your feedback.when you don't create things, you become defined by your tastes rather than ability ", "success");

                                          }
                                          });
                             
                                });
                                  
                                }
                                else{
                               $('#'+data.nope[0]).hide();
                                $('#'+data.nope[1]).hide();
                                $('#'+data.nope[2]).hide();
                                $('#'+data.nope[3]).hide();
                                $('#'+data.nope[4]).hide();
                                $('#'+data.nope[5]).hide();
                                $('#'+data.nope[6]).hide();
                                $('#'+data.nope[7]).hide();
                                $('#'+data.nope[8]).hide();
                                 $('#'+data.nope[9]).hide();
                                $('#'+data.nope[10]).hide();
                                $('#'+data.nope[11]).hide();
                                $('#'+data.nope[12]).hide();
                                $('#'+data.nope[13]).hide();
                                $('#'+data.nope[14]).hide();
                                $('#'+data.nope[15]).hide();
                                $('#'+data.nope[16]).hide();
                                $('#'+data.nope[17]).hide();
                               // alert(data.nope.length);
                                $('#'+data.sawa).show();

                                 $('#checked').val(data.sawa);
                            
                                
                                }
                                
                               }          
                            });
        }
    </script>
