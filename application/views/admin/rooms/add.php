<?php
?>

    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

             
           <div class="panel panel-info">
                <div class="panel-heading"> 
                     <i class="fa fa-plus"></i> &nbsp;Register New Room<a href="<?php echo base_url('admin/rooms/all_room_list') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i> List rooms </a>

                </div>
                <div class="panel-body table-responsive">
                
                 <?php $error_msg = $this->session->flashdata('error_msg'); ?> 
            <?php if (isset($error_msg)): ?>
       <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?> 
            
            
                    <form method="post" id="roomsform" class="form-horizontal" novalidate>
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
                                                                             <div class="form-group">
                    <label class="col-md-12" for="example-text">Type</label> 
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
                        <div class="white-box">
                            <label for="input-file-disable-remove">Image</label>
                            <input type="file" id="input-file-disable-remove image_file" class="dropify" data-show-remove="false" name="image_file" />
                        </div>
                    </div>
                </div>
                             
                            <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Add</button>
                            </div>
                        </div>
                            
                        </div>
                
                    </form>
                    <div id="uploaded_image">  
                </div>
            </div>
        </div>
    </div>

    <!-- End Page Content --> 
    <script>
          $(document).on('submit', '#roomsform', function(event){
        event.preventDefault();
        var name = $('#name').val();
        var plot= $('#plot').val();
        var type= $('#type').val();
        var floor= $('#floor').val();
        var form_data = $(this).serialize();
        if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           } 
           else{ 
         
        if(name != '' && plot!='' && type!='' && floor!='')
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
                   // alert(data);

                    window.location="<?php echo base_url(); ?>admin/rooms/all_room_list"; 

                }
            });
        }
        else
        {
            alert("All Fields are Required");
        }
    }
    }); 
    </script>
