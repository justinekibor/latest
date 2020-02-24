<?php
include("layout/css.php");
?>

    <!-- Start Page Content -->

    <div class="row">
      <div class="col-lg-3">
      </div>
        <div class="col-lg-6">

            
           <div class="panel panel-info">
                <div class="panel-heading"> 
                     <i class="fa fa-plus"></i> &nbsp; Password 
                </div>
                <div class="panel-body table-responsive">
				
				 <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?> 
			
			
                    <form method="post" action="<?php echo base_url('complete/auths') ?>" class="form-horizontal" novalidate>
                      <div class="form-group">
                 	<label class="col-md-12" for="example-text">Password</label>
                    <div class="col-sm-12">
                                            <input type="password" name="password" class="form-control" required data-validation-required-message="Password is required">
                                        </div>
                                    </div>
                       <div class="form-group">
                  <label class="col-md-12" for="example-text">Confirm Password</label>
                    <div class="col-sm-12">
                                            <input type="password" name="cpassword" class="form-control" required data-validation-required-message="Password is required">
                                        </div>
                                    </div>
									
									        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
                                   <input type="hidden" name="verify" value="<?php echo $verify;?>">
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