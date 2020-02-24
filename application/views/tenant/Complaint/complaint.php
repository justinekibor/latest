 <!-- row -->
                <div class="row">
                    <!-- Left sidebar -->

                 <?php $msg = $this->session->flashdata('msg'); ?>
            <?php if (isset($msg)): ?> 
             <script>
                var x= "<?php echo $msg;?>";
                 $(document).ready(function(){
                 swal("Success", x, "success");
                    });
             </script>
            <?php endif ?>
                    <div class="col-md-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-2 col-md-3  col-sm-4 col-xs-12 inbox-panel">
                                    <div> <a href="#" class="btn btn-custom btn-block waves-effect waves-light">Compose</a>
                                        <div class="list-group mail-list m-t-20"> <a href="inbox.html" class="list-group-item active">Inbox <span class="label label-rouded label-success pull-right">5</span></a></a> </div>
                                        <hr class="m-t-5">
                                       
                                    </div>
                                </div>
                               
                                <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 mail_listing">
                                    <h3 class="box-title">Compose New Complaint</h3>
                                     <form method="POST" action="<?php echo base_url('tenant/complaint/add'); ?>">
                                        <div class="form-group">
                                        <input class="form-control" name="subject" value="<?php echo set_value('subject'); ?>" placeholder="Type Subject here">
                                         <span class="text-danger"><?php echo form_error('subject'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="textarea_editor form-control" value="<?php echo set_value('message'); ?>" name="message" rows="15" placeholder="Enter text Complaint here"></textarea>
                                         <span class="text-danger"><?php echo form_error('message'); ?></span>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                              </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->