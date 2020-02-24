
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            
           <div class="panel panel-info">
                <div class="panel-heading"> <i class="fa fa-list"></i> All plots
                    <a href="<?php echo base_url('admin/Plot') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i>&nbsp;New Plot</a> &nbsp;
				
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
                                    <th>Plot id</th>
                                    <th>plot Name</th>
                                    <th>Area code</th>
                                    <th>Area address</th>
                                    <th>agent_id</th>
                                    <th>date created</th>
                                    <th>since</th>
                                    <th>Action</th>
                                    </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Plot id</th>
                                    <th>plot Name</th>
                                    <th>Area code</th>
                                    <th>Area address</th>
                                    <th>agent_id</th>
                                    <th>date created</th>
                                    <th>since</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                            
                            <tbody>
                            <?php foreach ($users as $user): ?>
                                
                                <tr>

                                    <td><?php echo $user['plot_id']; ?></td>
                                    <td><?php echo $user['plot_name']; ?></td>
                                    <td><?php echo $user['plot_code']; ?></td>
                                    <td><?php echo $user['plot_addr']; ?></td>
                                    <td><?php echo $user['agent_id']; ?></td>
                                    <td><?php echo $user['date_created']; ?></td>
                                    <td><?php echo $user['incharge_since']; ?></td>


                                   
                                    <td class="text-nowrap"> 
										
										<a href="<?php echo base_url('admin/plot/update/'.$user['plot_id']) ?>"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></button></a>
																				
											<a href="<?php echo base_url('admin/plot/delete/'.$user['plot_id']) ?>" onClick="return doconfirm();" data-toggle="tooltip" data-original-title="Delete"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
                                        
                                    </td>
                            <?php endforeach ?>

                            </tbody>


                        </table>
                    </div>
					
					 
            </div>
        </div>
    </div>

 </div>

    <!-- End Page Content -->