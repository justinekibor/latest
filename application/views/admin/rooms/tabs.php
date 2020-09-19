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
                     <i class="fa fa-plus"></i> &nbsp;Register New Room<a href="<?php echo base_url('admin/rooms/all_room_list') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i> List rooms </a>

                </div>
            </h3>
                            
                            <!-- Nav tabs -->
                            <ul class="nav customtab nav-tabs" role="tablist">
                                <li role="presentation" class="nav-item"><a href="#home1" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Basics</span></a></li>
                                <li role="presentation" class="nav-item"><a href="#profile1" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Billing</span></a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="home1">
                                                       <form method="post" id="roomsform" name="roomsform" class="form-horizontal" novalidate>
                                                             <div class="form-group">
                    <label class="col-md-12" for="example-text">Plot</label> 
                    <div class="col-sm-12">
                                                <select id="plot" class="form-control custom-select" name="plot" value="<?php echo set_value('plot'); ?>" aria-invalid="false">
                                                    <option value="" >Select</option>
                                                    <?php foreach ($plots as $cn): ?>
                                                        <option  value="<?php echo $cn['plot_id']; ?>"><?php echo $cn['plot_name']; ?></option>
                                                    <?php endforeach ?>
                                                </select> 
                                            </div>
                                            <span class="text-danger"><?php echo form_error('Plot'); ?></span>
                                        </div>
                       <div class="form-group"> 
                    <label class="col-md-12" for="example-text">Name</label>
                    <div class="col-sm-12">
                                            <input type="text" id="name" name="name" value="<?php echo set_value('name'); ?>" class="form-control" autocomplete="off">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                                    </div>
                                     <div class="form-group">
                    <label class="col-md-12" for="example-text">Floor</label> 
                    <div class="col-sm-12">
                                                <select id="floor" class="form-control custom-select" value="<?php echo set_value('floor'); ?>" name="floor" aria-invalid="false">
                                                    <option value="">Select</option>
                                                    <option value="ground">Ground floor</option>
                                                    <option value="first">First floor</option>
                                                    <option value="second">Second floor</option>
                                                    <option value="third">Third floor</option>
                                                    <option value="fourth">Fourth Floor</option>
                                                </select>
                                            </div>
                                            <span class="text-danger"><?php echo form_error('floor'); ?></span>

                                        </div>
p                    <label class="col-md-12" for="example-text">Type</label> 
                    <div class="col-sm-12">
                                                <select id="type" class="form-control custom-select" value="<?php echo set_value('type'); ?>" name="type" aria-invalid="false">
                                                    <option value="">Select</option>
                                                    <option value="0">Select</option>
                                                    <option value="single">Single room</option>
                                                    <option value="1bedroom">one bed room</option>
                                                    <option value="2bedroom">two bed room</option>
                                                    <option value="bedsitter">bedsitter</option>
                                                    <option value="shop">Shop</option>
                                                </select>
                                            </div>
                                            <span class="text-danger"><?php echo form_error('type'); ?></span>
                                        </div>
                                        <div class="col-sm-6 ol-md-6 col-xs-12">
                                        </div>

                                              <div class="m-b-30 bt-switch">
                                        <div class="form-group">
                                            <label for="water1">Automatic Water Billing</label>
                                            <input id="water1" type="radio" name="water" value="yes" class="radio-switch form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="water2">Manual Water Billing</label>
                                            <input id="water2" type="radio" name="water" value="no" class="radio-switch form-control">
                                        </div>
                                    </div>
                                     <div class="m-b-30 bt-switch">
                                        <div class="form-group">
                                            <label for="kplc1">Automatic KPLC Billing</label>
                                            <input id="kplc1" type="radio" name="kplc" value="yes" class="radio-switch form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="kplc2">Manual KPLC Billing</label>
                                            <input id="kplc2" type="radio" name="kplc" value="no" class="radio-switch form-control">
                                        </div>
                                    </div>
                        <div class="col-sm-6 ol-md-6 col-xs-12">
                        <div class="white-box">
                            <label for="input-file-disable-remove">Image</label>
                            <input type="file" id="input-file-disable-remove image_file" class="dropify" data-show-remove="false" name="image_file" />
                        </div>
                    </div>
                
                             
                            <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Add</button>
                            </div>

                        
                            
                        
                
                    </form>
                                </div>
                        
                        
                                <div role="tabpanel" class="tab-pane fade" id="profile1">
                                          <form name="bill" action="<?php echo base_url('admin/rooms/billHouse') ?>" method="POST" id="bill">
                                          <div class="form-group">
                                        <label class="col-md-12" for="example-text">Plot</label> 
                                          <div class="col-sm-12">
                                                <select id="plot1" class="form-control custom-select" name="plot" value="<?php echo set_value('plot'); ?>" aria-invalid="false">
                                                    <option value="" >Select</option>
                                                    <?php foreach ($plots as $cn): ?>
                                                        <option  value="<?php echo $cn['plot_id']; ?>"><?php echo $cn['plot_name']; ?></option>
                                                    <?php endforeach ?>
                                                </select> 
                                            </div>
                                            <span class="text-danger"><?php echo form_error('Plot'); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Houses</label>
                                            <select class="form-control" id="houses"  name="houses" required="">
                                            <option value="">non selected</option>
                                            </select>
                                            <div>
                                                <span class="text-danger"><?php echo form_error('houses'); ?></span>
                                            </div>
    </div>
                                             <div class="form-group">
                                            <label>Floor</label>
                                            <select class="form-control" id="f" disabled name="floor" required="">
                                            <option>non selected</option>
                                            </select>
                                        </div>
                                              <div class="form-group">
                                            <label>Type</label>
                                            <select class="form-control" id="t" disabled name="types" required="">
                                            <option>non selected</option>
                                            </select>
                                        </div>
                                        <div class="form-group"> 
                                  <label class="col-md-12" for="example-text">Rent</label>
                                    <div class="col-sm-12">
                                            <input type="number" id="rent" name="rent" value="<?php echo set_value('rent'); ?>" class="form-control" autocomplete="off">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('rent'); ?></span>
                                    </div>
                                
                                 <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
                            </div>

                                    </form>
                                    
                                   
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="messages1">
                                  <form method="post" id="opps" name="roomsform" action="<?php echo base_url('admin/rooms/send_mail') ?>" class="form-horizontal" novalidate>
                                                          
                
                             
                            <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Add</button>
                            </div>

                        
                            
                        
                
                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings1">
                                    <div class="col-md-6">
                                        <h3>Just do Settings</h3>
                                        <h4>you can use it with the small code</h4>
                                    </div>
                                    <div class="col-md-5 pull-right">
                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
         <?php //include 'js.php'; ?>

               <script>
              $(document).on('submit', '#roomsform', function(event){
              event.preventDefault();
                 var name = $('#name').val();
            var plot= $('#plot').val();
             var type= $('#type').val();
          var floor= $('#floor').val();
           var len= $('input[type=radio][name=water]:checked').length;
           var pl= $('input[type=radio][name=kplc]:checked').length;
          var form_data = $(this).serialize();
        if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           } 
           else{ 
         
        if(name != '' && plot!='' && type!='' && floor!='' && len==1 && pl==1)
        {
            $.ajax({
                url:"<?php echo base_url(); ?>admin/rooms/add",
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
        }
        else
        {
            swal("Alert!", "All fileds are required", "warning");
        }
    }
    }); 
                 $(document).ready(function(){
                    $('#plot1').change(function(){
                        var plot_id= $('#plot1').val();
                        if(plot_id != ''){
                            jQuery.ajax({
                                url:"<?php echo base_url();?>admin/rooms/fetch_type",
                                type:"POST",  
                                data:{plot_id:plot_id},
                                asyn : true,
                                dataType  : 'json',
                               success:function(data){
                                var html='';
                                var i;
                                for(i=0; i<data.length; i++){
                                    html += '<option value='+ data[i].house_id+'>'+data[i].house_name+'</option>';
                                   // html= data[i].house_name;

                                }
                                $('#houses').html(html);
                                
                               }          
                            });
                            return false;
                        }

                    }); 

                 });
                   $(document).ready(function(){
                    $('#houses').change(function(){
                        var house_id= $('#houses').val();
                        if(house_id != ''){
                            jQuery.ajax({
                                url:"<?php echo base_url();?>admin/rooms/fetch_house",
                                type:"POST",  
                                data:{house_id:house_id},
                                asyn : true,
                                dataType  : 'json',
                               success:function(data){
                                var types='';
                                var floor ='';
                                var i;
                                for(i=0; i<data.length; i++){
                                    types += '<option value='+ data[i].info_type+'>'+data[i].info_type+'</option>';
                                    floor += '<option value='+ data[i].floor+'>'+data[i].floor+'</option>'; 

                                }
                                $('#t').html(types);
                                $('#f').html(floor);
                                
                               }          
                            });
                            return false;
                        }

                    }); 

                 });

                
                     </script>
