
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
                                <tr>
                                    <th>Balance id</th>
                                    <th>Tenant ID</th>
                                    <th>House Name</th>
                                    <th>Rental Balance</th>
                                    <th>Action</th>                                    
                                    </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Balance id</th>
                                    <th>Tenant ID</th>
                                    <th>House Name</th>
                                    <th>Rental Balance</th>
                                    <th>Action</th>
                                    

                                </tr>
                            </tfoot>
                            
                            <tbody>
                            <?php foreach ($payments as $user): 
                           if($user['Rent']>0){
                                ?>

                                
                                <tr>

                                    <td><?php echo $user['balance_id']; ?></td>
                                    <td><?php echo $user['tenant_id']; ?></td>
                                    <td><?php echo $user['house_name']; ?></td>
                                    <?php if($user['Rent']<5000){?>
                                    <td class="text text-warning"><?php echo $user['Rent'];?></td>

                                   <?php }else if($user['Rent']>5000){?>
                                    <td class="" style="color: red;"><?php echo $user['Rent'];?></td>
                                    <?php }?>
                                   
                                    <td class="text-nowrap"> 
										
										<a href="<?php echo base_url('agent/finance/payment_receipt/'.$user['balance_id']) ?>"><button type="button" class="btn btn-info btn-circle btn-sm"><i class="fa fa-edit"></i><b style="color: black;">Receipts</b></button></a>
																				
                                        
                                    </td>
                            <?php 
                               }
                        endforeach ?>

                            </tbody>


                        </table>
                    </div>
					
					 
            </div>
        </div>
    </div>

 </div>

    <!-- End Page Content -->