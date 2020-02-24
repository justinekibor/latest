<?php
?>

    <!-- Start Page Content -->

    <div class="row"> 
        <div class="col-lg-12">

             
           <div class="panel panel-info">
                <div class="panel-heading">  
                     <i class="fa fa-plus"></i> &nbsp;Register New Agent<a href="<?php echo base_url('admin/agent/all_agent_list') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i> List Agents </a>

                </div>
                <div class="panel-body table-responsive">
                                   <?php $msg = $this->session->flashdata('msg'); ?>
            <?php if (isset($msg)): ?>
             <script>
                 $(document).ready(function(){
                 swal("Success", "Verification Link send successfully", "success");
                    });
             </script>
            <?php endif ?>

            <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
            
                    <form method="post" action="<?php echo base_url('agent/tenant/add')?>" class="form-horizontal" novalidate id="agentform">
                       <div class="form-group">
                    <label class="col-md-12" for="example-text">Email</label>
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('email'); ?>" id="email" type="email" name="email" class="form-control" autocomplete="off">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>

                            <div class="col-sm-offset-3 col-sm-5">
                                  <button id="agent" type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Register</button>
                            </div>
                        </div>
                           
                        </div>
                        
                    </form>

                </div>
            </div>
        </div> 
    </div>

    <!-- End Page Content -->

