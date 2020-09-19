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
                     <i class="fa fa-plus"></i> &nbsp; Signup form 
                </div>
                <div class="panel-body table-responsive">
                           <?php $msg = $this->session->flashdata('errmsg'); ?>
            <?php if (isset($msg)): ?>
                <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
                    <form method="post" action="<?php echo base_url('complete/signupexpert/') ?>" class="form-horizontal" novalidate>
                       <div class="form-group">
                 	<label class="col-md-12" for="example-text">Email address</label>
                    <div class="col-sm-12">
                                            <input type="email" autocomplete="off" name="email" value="<?php echo set_value('email'); ?>" class="form-control required" >
                                        </div>
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
                              

                           <div class="form-group">
                 	<label class="col-md-12" for="example-text">Name</label>
                    <div class="col-sm-12">
                                            <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control" required data-validation-required-message="Last Name is required">
                                        </div>
                                         <span class="text-danger"><?php echo form_error('name'); ?></span>
<div class="form-group">
                  <label class="col-md-12" for="example-text">Password</label>
                    <div class="col-sm-12">
                                            <input type="password" name="password" class="form-control" required data-validation-required-message="Password is required">
                                        </div>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                       <div class="form-group">
                  <label class="col-md-12" for="example-text">Confirm Password</label>
                    <div class="col-sm-12">
                                            <input type="password" name="cpassword" class="form-control" required data-validation-required-message="Password is required">
                                        </div>
                                    </div>
 
                                      <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
                                  
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