<?php
echo "";
?>

    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            
           <div class="panel panel-info">
                <div class="panel-heading"> 
                     <i class="fa fa-plus"></i> &nbsp;Add New Plot <a href="<?php echo base_url('admin/plot/all_plots_list') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i> List Plots </a>

                </div>
                <div class="panel-body table-responsive">
				
				 <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
			
			
                    <form method="post" action="<?php echo base_url('admin/plot/update/'.$plot->plot_id) ?>" class="form-horizontal" novalidate>
                       <div class="form-group">
                 	<label class="col-md-12" for="example-text">Plot Name</label> 
                    <div class="col-sm-12">
                                            <input type="text" name="plot_name" class="form-control" value="<?php echo $plot->plot_name; ?>"required data-validation-required-message="Please plot name is required">
                                        </div>
                                    </div>
                              

                           <div class="form-group">
                 	<label class="col-md-12" for="example-text">Plot Size</label>
                    <div class="col-sm-12">
                                            <input type="text" name="plot_size" class="form-control" value="<?php echo $plot->plot_area; ?>" required data-validation-required-message="Please plot Size is required">
                                        </div>
                                    </div>
                              

                           <div class="form-group">
                 	<label class="col-md-12" for="example-text">Area Code</label>
                    <div class="col-sm-12">
                                            <input type="text" name="area_code" class="form-control" value="<?php echo $plot->plot_code; ?>" required data-validation-required-message=" Please area code is required">
                                        </div>
                                    </div>
                     <div class="form-group">
                  <label class="col-md-12" for="example-text">Area Address</label>
                    <div class="col-sm-12"> 
                                            <input type="email" name="area_address" class="form-control" value="<?php echo $plot->plot_addr; ?>" required data-validation-required-message=" Please area address is required">
                                        </div>
                                    </div>
                                                               <div class="form-group">
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