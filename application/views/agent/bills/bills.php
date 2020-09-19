
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
                                    <th>Tenant ID</th>
                                    <th>House Name</th>
                                    <th>Water</th>
                                    <th>KPLC</th>
                                    <th>Garbage</th>
                                    <th>Others</th>
                                    <th class="text text-success">Total</th>
 
                                </tr>
                                
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tenant ID</th>
                                    <th>House Name</th>
                                    <th>Water</th>
                                    <th>KPLC</th>
                                    <th>Garbage</th>
                                    <th>Others</th>
                                    <th class="text text-success">Total</th>

                                </tr>
                            </tfoot>
                            
                            <tbody>
                            <?php foreach ($bills as $agent): 
                           $total= $agent['water']+$agent['kplc']+$agent['garbage']+$agent['others'];
                                ?>
                                
                                <tr>

                                    <td><?php echo $agent['tenant_id']; ?></td>
                                    <td><?php echo $agent['house_name']; ?></td>
                                    <td><?php echo $agent['water']; ?></td>
                                    <td><?php echo $agent['kplc']; ?></td>
                                    <td><?php echo $agent['garbage']; ?></td>
                                    <td><?php echo $agent['others']; ?></td>
                                    <td class="text text-success"><?php echo $total; ?></td>
                            <?php endforeach ?>

                            </tbody>


                        </table>
                    </div>
					
					 
            </div>
        </div>
    </div>

 </div>

    <!-- End Page Content -->