<?php
include("layout/css.php");
$verification_key= $this->uri->segment(3);
?>

    <!-- Start Page Content -->

    <div class="row">
      <div class="col-lg-3">
      </div>
        <div class="col-lg-6">

            
           <div class="panel panel-info"> 
                <div class="panel-heading">  
                     <i class="fa fa-plus"></i> &nbsp; Agent signup 
                </div>
                <div class="panel-body table-responsive">
                           <?php $msg = $this->session->flashdata('msg'); ?>
            <?php if (isset($msg)): ?>
                <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
                    <form method="post" action="<?php echo base_url('complete/signup/'.$verification_key) ?>" class="form-horizontal" novalidate>
                       <div class="form-group">
                 	<label class="col-md-12" for="example-text">First Name</label>
                    <div class="col-sm-12">
                                            <input type="text" name="fname" value="<?php echo set_value('fname'); ?>" class="form-control required" >
                                        </div>
                                        <span class="text-danger"><?php echo form_error('fname'); ?></span>
                                    </div>
                              

                           <div class="form-group">
                 	<label class="col-md-12" for="example-text">Last Name</label>
                    <div class="col-sm-12">
                                            <input type="text" name="lname" value="<?php echo set_value('lname'); ?>" class="form-control" required data-validation-required-message="Last Name is required">
                                        </div>
                                         <span class="text-danger"><?php echo form_error('lname'); ?></span>

                                    </div>
                          <div class="form-group">
                  <label class="col-md-12" for="example-text">Other Name</label>
                    <div class="col-sm-12">
                                            <input type="text" name="oname"  class="form-control" required data-validation-required-message="Last Name is required">
                                        </div>
                                      
                                    </div>			
                                                              <div class="form-group">
                  <label class="col-md-12" for="example-text">Gender</label>
                    <div class="col-sm-12">
                                                <select class="form-control custom-select" value="<?php echo set_value('gender'); ?>" name="gender" aria-invalid="false">
                                                    <option value="">Select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                             <span class="text-danger"><?php echo form_error('gender'); ?></span>
                                        </div>
                                        <div class="form-group">
                  <label class="col-md-12" for="example-text">National ID</label>
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('nid'); ?>" type="text" name="nid" class="form-control">
                                        </div>
                                           <span class="text-danger"><?php echo form_error('nid'); ?></span>
                                    </div>						
									
                           <div class="form-group">
                 	<label class="col-md-12" for="example-text">Phone Number</label>
                    <div class="col-sm-12">
                                            <input type="text" value="<?php echo set_value('mobile'); ?>" name="mobile" class="form-control">
                                        </div>
                                           <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                                    </div>
                                      <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
                                   <input type="hidden" name="id" value= '<?php echo $verify->id ?>'>
                                   <input type="hidden" name="key" value= '<?php echo $key ?>'>
                            </div>
                        </div>
                
                           
                        </div>
                        
                    </form>
                </div>
            </div>
         <div class="col-lg-3">
      </div>
        </div>
    </div>
    <?php
    include("layout/js.php");
    ?>

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