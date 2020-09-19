                <?php foreach ($profile as $prof);?>
                 <div class="row">
                    

                    <div class="col-lg-12 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                 <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                             <script>
                 $(document).ready(function(){
                 swal("Warning", <?php echo $error_msg;?>, "warning");
                    });
             </script>
                
            <?php endif ?> 
                             <?php $email_sent = $this->session->flashdata('email_sent'); ?>
            <?php if (isset($email_sent)): ?>
                             <script>
                              var x = "<?php echo $email_sent;?>";
                 $(document).ready(function(){
                 swal("Warning", x, "warning");
                    });
             </script>
                
            <?php endif ?> 
                           <?php $msg = $this->session->flashdata('msg'); ?>
            <?php if (isset($msg)): ?> 
             <script>
                 $(document).ready(function(){
                 swal("Success", "House Successfully billed", "success");
                    });
             </script>
            <?php endif ?>
                        <div class="white-box">
                            <h3 class="box-title"> 
                                <div class="panel-heading"> 
                     <i class="fa fa-plus"></i> &nbsp;User Profile<a href="<?php echo base_url('admin/notification/inbox') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i>Inbox </a>

                </div>
            </h3>
          </div>
            <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="<?php echo $prof['image']; ?>">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>optimum/plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white"><?php echo $prof['id'];?></h4>
                                        <h5 class="text-white"><?php echo $prof['email'];?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btn-box">
                                  <div class="col-md-12 col-sm-12 text-center">
                                    <h2 id="timer" style="color: green"></h2>

                                </div>
                            </div>
                        </div>
                    </div>
                            
                            <!-- Nav tabs -->
                              <div class="col-md-8 col-xs-12">
                            <ul class="nav customtab nav-tabs" role="tablist">
                                <li role="presentation" class="nav-item"><a href="#profile1" class="nav-link active" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Profile</span></a></li>
                                <li role="presentation" class="nav-item"><a href="#home1" class="nav-link" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Update profile</span></a></li>
                            </ul>
                            <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="profile1">
  <div class="steamline">
  <div class="sl-item">
   <div class="sl-left"> <img src="<?php echo base_url(); ?>optimum/plugins/images/users/genu.jpg" alt="user" class="img-circle" /> </div>
       <div class="sl-right">

                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                       
                                        <hr>
                                    </div>
                               
      <div role="tabpanel" class="tab-pane fade" id="home1">
         <form name="roomsform" id="roomsform" method="post">
]                                   
      <div class="col-sm-6 ol-md-6 col-xs-12">
                        <div class="white-box">
                            <label for="input-file-disable-remove">Image</label>
                            <input type="file" id="input-file-disable-remove image_file" class="dropify" data-default-file="<?php echo $prof['image'];?>" data-show-remove="false" name="image_file" />
                        </div>
                    </div>

                                
                                 <div class="col-sm-offset-3 col-sm-5 pull-right">
                                <button type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus "></i>&nbsp;&nbsp;update</button>
                            </div>

                                    </form>
                                    
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                     
                </div>
              </div>
            </div>
         <?php  ?>

               <script>
                              $(document).on('submit', '#roomsform', function(event){
              event.preventDefault();
          var form_data = $(this).serialize();
        if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           } 

            $.ajax({
                url:"<?php echo base_url(); ?>admin/profile/update",
                    method:"POST",  
                     data:new FormData(this),  
                     contentType: false,   
                     cache: false,  
                     processData:false,  
                success:function(data) 
                {
                          swal({
                       title: "Good job!", 
                        text: "You clicked the button!", 
                        tyepe: "success"}).then(function(){
                            window.location.href ="<?php echo base_url(); ?>admin/agent"; 

                         
                        });

                }
            });

    
    });  
        var timestamp = '<?=time();?>';
                 function updateTime(){
               $('#timer').html(Date(timestamp));
               timestamp++;
}
              $(function(){
                  setInterval(updateTime, 1000);
});
  </script>