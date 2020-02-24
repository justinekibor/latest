<?php
?>

    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            
           <div class="panel panel-info">
                <div class="panel-heading"> <i class="fa fa-list"></i> All rooms
                    <a href="<?php echo base_url('admin/rooms') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i>&nbsp;New room</a> &nbsp;
				
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
                                    <th>floor</th>
                                    <th>Plot id</th>
                                    <th>house type</th>
                                    <th>Date added</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>floor</th>
                                    <th>Plot id</th>
                                    <th>house type</th>
                                    <th>Date added</th>
                                    <th>Image</th>

                                </tr>
                            </tfoot>
                            
                            <tbody>
                            <?php foreach ($rooms as $room): ?>
                                
                                <tr>

                                    <td><?php echo $room['house_id']; ?></td>
                                    <td><?php echo $room['house_name']; ?></td>
                                    <td><?php echo $room['floor']; ?></td>
                                    <td><?php echo $room['plot_id']; ?></td>
                                    <td><?php echo $room['info_type']; ?></td>
                                    <td><?php echo $room['date_created']; ?></td>
                                    <td> <?php echo '<img src="'.$room['picture'].'" width="20" height="20 class="img-thumbnail" />'; ?> </td>



                                   
                                    <td class="text-nowrap"> 
										
										<a href="<?php echo base_url('admin/rooms/update/'.$room['house_id']) ?>"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></button></a>
																				
											<a href="<?php echo base_url('admin/rooms/delete/'.$room['house_id']) ?>" onClick="return doconfirm();" data-toggle="tooltip" data-original-title="Delete"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
                                        
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