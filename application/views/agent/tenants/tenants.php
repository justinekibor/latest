
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            
           <div class="panel panel-info">
                <div class="panel-heading"> <i class="fa fa-list"></i> All agents
                    <a href="<?php echo base_url('admin/agent') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i>&nbsp;New Agent</a> &nbsp;
				
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>phone No</th>
                                    <th>house ID</th>
                                    <th>date added</th>
                                    <th>plot ID</th>
                                    <th>Action</th>
                                    </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>phone No</th>
                                    <th>house ID</th>
                                    <th>date added</th>
                                    <th>National ID</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                            
                            <tbody>
                            <?php foreach ($tenants as $agent): ?>
                                
                                <tr>

                                    <td><?php echo $agent['tenant_id']; ?></td>
                                    <td><?php echo $agent['fname']; ?></td>
                                    <td><?php echo $agent['email']; ?></td>
                                    <td><?php echo $agent['phone_no']; ?></td>
                                    <td><?php echo $agent['house_id']; ?></td>
                                    <td><?php echo $agent['assignment_date']; ?></td>
                                    <td><?php echo $agent['id_no']; ?></td>


                                   
                                    <td class="text-nowrap"> 
										
										<a href="<?php echo base_url('admin/agent/update/'.$agent['tenant_id']) ?>"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></button></a>
																				
											<a href="<?php echo base_url('admin/agent/delete/'.$agent['tenant_id']) ?>" onClick="return doconfirm();" data-toggle="tooltip" data-original-title="Delete"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
                                        
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