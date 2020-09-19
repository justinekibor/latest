
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            
           <div class="panel panel-info">
                <div class="panel-heading"> <i class="fa fa-list"></i> All Expenses
                    <a href="<?php echo base_url('agent/expense') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i>&nbsp;New expense</a> &nbsp;
				
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
                                    <th>Expense ID</th>
                                    <th>Expense</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Receiver</th>
                                    <th>Date</th>
                                    <th>Transaction code</th>
 
                                </tr>
                                
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Expense ID</th>
                                    <th>Expense</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Receiver</th>
                                    <th>Date</th>
                                    <th>Transaction code</th>
 
                                </tr> 
                            </tfoot>
                            
                            <tbody>
                            <?php foreach ($expense as $agent): ?>
                                
                                <tr>

                                    <td><?php echo $agent['expense_id']; ?></td>
                                    <td><?php echo $agent['expense']; ?></td>
                                    <td><?php echo $agent['description']; ?></td>
                                    <td><?php echo $agent['amount']; ?></td>
                                    <td><?php echo $agent['paidWho']; ?></td>
                                    <td><?php echo $agent['Expense_date']; ?></td>
                                     <td><?php echo $agent['Transcode']; ?></td>
                            <?php endforeach ?>

                            </tbody>


                        </table>
                    </div>
					
					 
            </div>
        </div>
    </div>

 </div>

    <!-- End Page Content -->