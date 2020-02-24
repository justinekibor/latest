<?php
echo "";
?>

    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            
           <div class="panel panel-info">
                <div class="panel-heading"> 
                     <i class="fa fa-plus"></i> &nbsp;Assign Agent<a href="<?php echo base_url('admin/user/all_user_list') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i> List Agents </a>

                </div>
                <div class="panel-body table-responsive">
                
                 <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?> 
            
            
                    <form method="post" action="<?php echo base_url('admin/agent/assigning') ?>" class="form-horizontal" novalidate>        
                           <div class="form-group">
                    <div class="form-group">
                    <label class="col-md-12" for="example-text">Agent Name</label> 
                    <div class="col-sm-12">
                                                <select class="form-control custom-select" name="agent" aria-invalid="false">
                                                    <option value="0">Select</option>
                                                    <?php foreach ($agents as $cn): ?>
                                                        <option value="<?php echo $cn['agent_id']; ?>"><?php echo $cn['Fname']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                     <div class="form-group">
                    <label class="col-md-12" for="example-text">Plot</label> 
                    <div class="col-sm-12">
                                                <select class="form-control custom-select" name="plot" aria-invalid="false">
                                                    <option value="0">Select</option>
                                                    <?php foreach ($plots as $cn): ?>
                                                        <option value="<?php echo $cn['plot_id']; ?>"><?php echo $cn['plot_name']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                     
                       
  <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Assign</button>
                            </div>
                        </div>
                           
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Page Content -->