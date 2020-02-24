 <!-- row -->
                <div class="row">
                    <!-- Left sidebar -->
                    <div class="col-md-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-2 col-md-3  col-sm-4 col-xs-12 inbox-panel">
                                    <div> <a href="#" class="btn btn-custom btn-block waves-effect waves-light">Compose</a>
                                        <div class="list-group mail-list m-t-20"> <a href="inbox.html" class="list-group-item active">Inbox <span class="label label-rouded label-success pull-right">5</span></a> </div>
                                         <hr class="m-t-5">
                                    </div>
                                 </div>
                                <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 mail_listing">
                                    <div class="media m-b-30 p-t-20">
                                         <?php foreach ($complaint as $user): ?>
                                        <h4 class="font-bold m-t-0"><?php  echo $user['subject'];?></h4>
                                        <hr>
                                        <a class="pull-left" href="#"> <img class="media-object thumb-sm img-circle" src="<?php echo base_url(); ?>leasehouse/plugins/images/users/pawandeep.jpg" alt=""> </a>
                                        <div class="media-body"> <span class="media-meta pull-right"><?php echo $user['complaint_date'];?></span>
                                            <h4 class="text-danger m-0"><?php echo $user['tenant_ids'];?></h4>
                                            <small class="text-muted">From: <?php echo $user['tenant_ids'];?> </small> </div>
                                            <br/>
                                          <p>
                                 <?php echo $user['complaint'];
                                 $compid= $user['complaint_id'];
                                 ?>
                                 <hr>
                             </p>
                                    </div>

                             <?php endforeach ?> 

                             <?php foreach ($messo as $msg): ?>
                                <div class="media m-b-30 p-t-20">
                                        <hr>
                                        <a class="pull-right" href="#"> <img class="media-object thumb-sm img-circle" src="<?php echo base_url(); ?>leasehouse/plugins/images/users/pawandeep.jpg" alt=""> </a>
                                        <div class="media-body"> <span class="media-meta pull-left"><?php echo $msg['reply_date'];?></span>
                                            <br/>
                                            <?php if ($msg['replying_id']== $this->session->userdata('id')){ ?>
                                             <span style="background: blue; color: white"  class="media-meta pull-left"><?php echo $msg['reply'];?></span>
                                                
                                            <?php 
                                        }
                                             elseif ($msg['replying_id'] != $this->session->userdata('id')) {?>
                                                 <br/>
                                                 <span style="background: blue; color: white"  class="media-meta pull-right"><?php echo $msg['reply'];?></span>
                                            
                                       <?php     } ?>
                                           
                            
                                           
                                           
                                            
                                            </div>
                                    </div>


                             <?php endforeach?>

                             <p>
                                 
                             </p>
                                 
                                    <hr>
                                     


                                    <hr>
                                    <form method="POST" action="<?php echo base_url('tenant/complaint/replying/'.$compid); ?>">
                                             <div class="form-group">
                                        <textarea class="textarea_editor form-control" value="<?php echo set_value('reply'); ?>" name="reply" rows="15" placeholder="Type a reply here..."></textarea>
                                         <span class="text-danger"><?php echo form_error('reply'); ?></span>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o media-meta pull-left"></i> Reply</button>


                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->