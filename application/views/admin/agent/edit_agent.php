<?php
$verification_key= $this->uri->segment(3);
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
                    <form method="post" action="<?php echo base_url('admin/agent/update/'.$agent->agent_id) ?>" class="form-horizontal" novalidate>
                       <div class="form-group">
                  <label class="col-md-12" for="example-text">First Name</label>
                    <div class="col-sm-12">
                                            <input type="text" name="fname" value="<?php echo $agent->Fname; ?>" class="form-control required" >
                                        </div>
                                        <span class="text-danger"><?php echo form_error('fname'); ?></span>
                                    </div>                             

                           <div class="form-group">
                  <label class="col-md-12" for="example-text">Last Name</label>
                    <div class="col-sm-12">
                                            <input type="text" name="lname" value="<?php echo $agent->lname; ?>"  class="form-control" required data-validation-required-message="Last Name is required">
                                        </div>
                                         <span class="text-danger"><?php echo form_error('lname'); ?></span>

                                    </div>
                          <div class="form-group">
                  <label class="col-md-12" for="example-text">Other Name</label>
                    <div class="col-sm-12">
                                            <input type="text" name="oname"  value="<?php echo $agent->oname; ?>" class="form-control" required data-validation-required-message="Last Name is required">
                                        </div>
                                      
                                    </div>      
                                                              <div class="form-group">
                  <label class="col-md-12" for="example-text">Gender</label>
                    <div class="col-sm-12">
                                                <select class="form-control custom-select" value="<?php echo $agent->gender; ?>" name="gender" aria-invalid="false">
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
                                            <input value="<?php echo $agent->id_no; ?>" type="text" name="nid" class="form-control">
                                        </div>
                                           <span class="text-danger"><?php echo form_error('nid'); ?></span>
                                    </div>            
                  
                           <div class="form-group">
                  <label class="col-md-12" for="example-text">Phone Number</label>
                    <div class="col-sm-12">
                                            <input type="text" value="<?php echo $agent->phone_no; ?>" name="mobile" class="form-control">
                                        </div>
                                           <span class="text-danger"><?php echo form_error('mobile'); ?></span>
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