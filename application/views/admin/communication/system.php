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
                                    <div> <a href="<?php echo base_url()?>admin/communication" class="btn btn-custom btn-block waves-effect waves-light">Compose</a>
                                        <div class="list-group mail-list m-t-20"> <a href="<?php echo base_url()?>tenant/testimony/testimonies" class="list-group-item active">Messages <span class="label label-rouded label-success pull-right"></span></a></a> </div>
                                        <hr class="m-t-5">
                                       
                                    </div>
                                </div>
                               
                                <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 mail_listing">
                                    <h3 class="box-title">Compose New Message</h3>
                                     <form method="POST" action="<?php echo base_url('admin/communication'); ?>">
                                    <div class="form-group">
                                        <textarea class="textarea_editor form-control" value="<?php echo set_value('message'); ?>" name="message" rows="15" placeholder="Enter text testimony here"></textarea>
                                         <span class="text-danger"><?php echo form_error('message'); ?></span>
                                    </div>
                                    <hr>
                                    Send to:
                                     <select class="form-control" id="who" name="who"  required="">
                                        <option value="">Select Category</option>
                                        <option value="all3">All</option>
                                        <option value="agents">Agents</option>
                                        <option value="tenants">Tenants</option>

                                            </select>
                                            <hr>
                                     <select class="form-control" id="whos" name="whos"  required="">
                                        <option value="">Select</option>
                                        <option value="all3">All</option>
                                        <option value="agents">{{loop}}</option>

                                            </select>
                                            <hr>


                                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                              </form>
                                    
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <script>
                           $(document).ready(function(){
                    $('#who').change(function(){
                        var value= $('#who').val();
                            jQuery.ajax({
                            url:"<?php echo base_url();?>admin/system/who",
                                type:"POST",  
                                data:{value:value},
                                asyn : true,
                                dataType  : 'json',
                               success:function(data){
                                alert(data);
                                //$('#houses').html(html);
                                
                               }          
                            });
                       

                    }); 

                 });
                                  
               </script>
