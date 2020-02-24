<?php
echo "";
?>

    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            
           <div class="panel panel-info">
                <div class="panel-heading"> 
                     <i class="fa fa-plus"></i> &nbsp;Assign Tenant<a href="<?php echo base_url('admin/user/all_user_list') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i> List tenants </a>

                </div>
                <div class="panel-body table-responsive">
                
                 <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                             <script>
                 $(document).ready(function(){
                 swal("Warning", "Please select tenant and house before assigning", "warning");
                    });
             </script>
                
            <?php endif ?> 
                           <?php $msg = $this->session->flashdata('msg'); ?>
            <?php if (isset($msg)): ?> 
             <script>
                 $(document).ready(function(){
                 swal("Success", "You have successfully assigned  the tenant", "success");
                    });
             </script>
            <?php endif ?>
            
            
                    <form method="post" action="<?php echo base_url('agent/tenant/assigning') ?>" class="form-horizontal" novalidate>        
                           <div class="form-group">
                    <div class="form-group">
                    <label class="col-md-12" for="example-text">Tenant Name</label> 
                    <div class="col-sm-12">
                                                <select class="form-control custom-select" name="tenant" aria-invalid="false">
                                                    <option value="0">Select</option>
                                                    <?php foreach ($tenants as $cn): ?>
                                                        <option value="<?php echo $cn['tenant_id']; ?>"><?php echo $cn['fname']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                     <div class="form-group">
                    <label class="col-md-12" for="example-text">House Name</label> 
                    <div class="col-sm-12">
                                                <select class="form-control custom-select" id="house" name="house" aria-invalid="false">
                                                    <option value="0">Select</option>
                                                    <?php foreach ($houses as $cn): ?>
                                                        <option value="<?php echo $cn['house_id']; ?>"><?php echo $cn['house_name']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label>Expected Rent and deposit</label>
                                            <select class="form-control" id="rent" name="rent" required="">
                                            <option value="">non selected</option>
                                            </select>
                                        </div>
                                                            
                     
                       
  <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Assign</button>
                                <div name="kwera" id="kwera">
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Page Content -->
    <script>
                           $(document).ready(function(){
                    $('#house').change(function(){
                        var house_id= $('#house').val();
                        if(house_id != ''){
                            jQuery.ajax({
                                url:"<?php echo base_url();?>admin/rooms/fetch_bills",
                                type:"POST",  
                                data:{house_id:house_id},
                                asyn : true,
                                dataType  : 'json',
                               success:function(data){
                                var types='';
                                var floor ='';
                                var i;
                                for(i=0; i<data.length; i++){
                                    types += '<option value='+ data[i].Rent+'>'+data[i].Rent+'</option>';
                                    floor += '<option value='+ data[i].deposit+'>'+data[i].deposit+'</option>'; 

                                }
                                $('#rent').html(types);
                                
                                
                               }          
                            });
                            return false;
                        }

                    }); 

                 });
                
    </script>
                     