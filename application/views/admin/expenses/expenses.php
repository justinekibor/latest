 
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            
           <div class="panel panel-info">
                <div class="panel-heading"> <i class="fa fa-list"></i> All expenses
                    <a href="<?php echo base_url('admin/expenses') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i>&nbsp;Expenses</a> &nbsp;
				
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
                                    <th>Expense id</th>
                                    <th>Expense</th>
                                    <th>Description</th>
                                    <th>Paid by</th>
                                    <th>Paid to</th>
                                    <th>Amount</th>
                                    <th>Transaction code</th>
                                    <th> Expense date</th>    
                                    </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                  <th>Expense id</th>
                                    <th>Expense</th>
                                    <th>Description</th>
                                    <th>Paid by</th>
                                    <th>Paid to</th>
                                    <th>Amount</th>
                                    <th>Transaction code</th>
                                    <th> Expense date</th>                                    
                                </tr>
                            </tfoot>
                            
                            <tbody>
                            <?php foreach ($payments as $user): ?>  
                                <tr>

                                    <td><?php echo $user['expense_id']; ?></td>
                                    <td><?php echo $user['expense']; ?></td>
                                    <td><?php echo $user['description']; ?></td>
                                    <td><?php echo $user['underWho']; ?></td>
                                    <td><?php echo $user['paidWho']; ?></td>
                                    <td><?php echo $user['amount']; ?></td>
                                    <td><?php echo $user['Transcode']; ?></td>
                                    <td><?php echo $user['Expense_date']; ?></td>
                                  
                            <?php endforeach ?>

                            </tbody>


                        </table>
                    </div>
					
					 
            </div>
        </div>
    </div>

 </div>

    <!-- End Page Content -->