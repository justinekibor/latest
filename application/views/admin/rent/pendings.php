 
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            
           <div class="panel panel-info">
                <div class="panel-heading"> <i class="fa fa-list"></i> All pendings
                    <a href="<?php echo base_url('admin/rent/pendings') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i>&nbsp;Pendings</a> &nbsp;
				
				</div>
				
                <div class="panel-body table-responsive">
				
				 <?php $msg = $this->session->flashdata('msg'); ?>
            <?php if (isset($msg)): ?>
                <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>

            <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
							<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Balance id</th>
                                    <th>Tenant ID</th>
                                    <th>House ID</th>
                                    <th>Plot name</th>
                                    <th>First name</th>
                                    <th>Last Name</th>
                                    <th>Rent</th>
                                    <th> Deposit</th>
                                    </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                  <th>Balance id</th>
                                    <th>Tenant ID</th>
                                    <th>House ID</th>
                                    <th>Plot name</th>
                                    <th>First name</th>
                                    <th>Last Name</th>
                                    <th>Rent</th>
                                    <th> Deposit</th>                                    
                                </tr>
                            </tfoot>
                            
                            <tbody>
                            <?php foreach ($payments as $user): ?>
                              <?php if($user['rent']>0 || $user['deposit']>0){?>  
                                <tr>

                                    <td><?php echo $user['balance_id']; ?></td>
                                    <td><?php echo $user['tenant_id']; ?></td>
                                    <td><?php echo $user['house_id']; ?></td>
                                    <td><?php echo $user['plot_name']; ?></td>
                                    <td><?php echo $user['fname']; ?></td>
                                    <td><?php echo $user['lname']; ?></td>
                                    <td><?php echo $user['rent']; ?></td>
                                    <td><?php echo $user['deposit']; ?></td>
                                    <?php
                                }
                                ?>
                            <?php endforeach ?>

                            </tbody>


                        </table>
                    </div>
					
					 
            </div>
        </div>
    </div>

 </div>

    <!-- End Page Content -->