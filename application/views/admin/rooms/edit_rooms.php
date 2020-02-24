<?php
?>
<?php
$type="";
$floor="";
if($house->floor =="ground"){
	$type= "Ground Floor";
}
else if($house->floor =="first"){
	$type="First Floor";
}
else if($house->floor =="second"){
	$type="Second floor";
}
else if($house->floor =="third"){
	$type="Third Floor";
}
else if($house->floor =="fourth"){
	$type="Fourth Floor";
}
////checking type now
if($house->info_type=="1bedroom"){
	$types= "One Bed room";
}
else if($house->info_type =="single"){
	$types="Single room";
}
else if($house->info_type =="2bedroom"){
	$types="Two bed room";
}
else if($house->info_type =="bedsitter"){
	$types="Bedsitter";
}
else if($house->info_type =="shop"){
	$types="Shop";
}
?>

    <!-- Start Page Content -->

    <div class="row">
   
        <div class="col-lg-12">

            
           <div class="panel panel-info"> 
                <div class="panel-heading"> 
                     <i class="fa fa-plus"></i> &nbsp; Agent Edit 
                </div>
                <div class="panel-body table-responsive">
                           <?php $msg = $this->session->flashdata('msg'); ?>
            <?php if (isset($msg)): ?>
                <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
 <form method="post" id="roomsform" class="form-horizontal" novalidate>
                                                             <div class="form-group">
                    <label class="col-md-12" for="example-text">Plot</label> 
                    <div class="col-sm-12">
                                                <select id="plot" class="form-control custom-select" name="plot" aria-invalid="false">
                                                     <option value="<?php foreach ($plot as $cn): ?>
                                                   <?php echo $cn['plot_id']; ?>"><?php echo $cn['plot_name']; ?></option>
                                                    <?php endforeach ?>">
                                                </option>
                                                    <?php foreach ($plots as $cn): ?>
                                                        <option  value="<?php echo $cn['plot_id']; ?>"><?php echo $cn['plot_name']; ?></option>
                                                    <?php endforeach ?>
                                                </select> 
                                            </div>
                                        </div>
                       <div class="form-group"> 
                    <label class="col-md-12" for="example-text">Name</label>
                    <div class="col-sm-12">
                                            <input type="text" id="name" name="name" value="<?php echo $house->house_name; ?>" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                     <div class="form-group">
                    <label class="col-md-12" for="example-text">Floor</label> 
                    <div class="col-sm-12">
                                                <select id="floor" class="form-control custom-select" name="floor" aria-invalid="false">
                                                    <option value="<?php echo $house->floor;?>"><?php echo  $type;?></option>
                                                    <option value="ground">Ground floor</option>
                                                    <option value="first">First floor</option>
                                                    <option value="second">Second floor</option>
                                                    <option value="third">Third floor</option>
                                                    <option value="fourth">Fourth Floor</option>
                                                </select>
                                            </div>
                                        </div>
                                                                             <div class="form-group">
                    <label class="col-md-12" for="example-text">Type</label> 
                    <div class="col-sm-12">
                                                <select id="type" class="form-control custom-select" name="type" aria-invalid="false">
                                                     <option value="<?php echo $house->info_type;?>"><?php echo  $types;?></option>
                                                    <option value="single">Single room</option>
                                                    <option value="1bedroom">one bed room</option>
                                                    <option value="2bedroom">two bed room</option>
                                                    <option value="bedsitter">bedsitter</option>
                                                    <option value="shop">Shop</option>
                                                </select>
                                            </div>
                                        </div>
                        <div class="col-sm-6 ol-md-6 col-xs-12">
                        <div class="white-box">
                            <label for="input-file-disable-remove">Image</label>
                            <input type="file" id="input-file-disable-remove image_file" class="dropify" data-default-file="<?php echo $house->picture;?>" data-show-remove="false" name="image_file" />
                        </div>
                    </div>
                </div>
                             
                            <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
                            </div>
                        </div>
                            
                        </div>
                
                    </form>
                </div>
            </div>
      
        </div>
    </div>
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
                url:"<?php echo base_url(); ?>admin/rooms/update/"<?php echo $house->house_id;?>,
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


    <!-- End Page Content -->
    <style>
      .required:after {
        content:" *"; 
color: #e32;
position: absolute; 
margin: 0px 0px 0px -20px; 
font-size: xx-large; 
padding: 0 5px 0 0;
  }
    </style>