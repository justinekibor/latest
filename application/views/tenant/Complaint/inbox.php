  <!-- row -->
               
               
                
                <div class="row">
                    <!-- Left sidebar -->
                    <div class="col-md-12">
                        <div class="white-box">
                            <!-- row -->
                            <div class="row">
                                <div class="col-lg-2 col-md-3  col-sm-12 col-xs-12 inbox-panel">
                                    <div> <a href="#" class="btn btn-custom btn-block waves-effect waves-light">Compose</a>
                                        <div class="list-group mail-list m-t-20"> <a href="<<?php echo base_url();?>/tenant/complaint" class="list-group-item active">Inbox </a>  </div>

                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 mail_listing">
                                    <div class="inbox-center">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="30">
                                                        <div class="checkbox m-t-0 m-b-0 ">
                                                            <input id="checkbox0" type="checkbox" class="checkbox-toggle" value="check all">
                                                            <label for="checkbox0"></label>
                                                        </div>
                                                    </th>
                                                    
                                                    <th class="hidden-xs" width="100">
                                                        <div class="btn-group pull-right">
                                                            <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-left"></i></button>
                                                            <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-right"></i></button>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>  
                                             <?php foreach ($inbox as $user): ?>
                    
                                               
                                                <tr>
                                                    <td>
                                                        <div class="checkbox m-t-0 m-b-0">
                                                            <input type="checkbox">
                                                            <label for="checkbox0"></label>
                                                        </div>
                                                    </td>
                                                    <td class="hidden-xs"><i class="fa fa-star-o"></i></td>
                                                    <td class="hidden-xs"><?php echo $user['fname'];?></td>

                                                    <td class="max-texts"><a href="<?php echo base_url();?>tenant/complaint/reply/<?php echo $user['complaint_id'];?>"><span class="label label-success"><?php echo $user['subject'];?></span><?php echo $user['complaint'];?></a></td>
                                                    <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                    <td class="text-right" style="font-size: 3;"><?php echo $user['complaint_date'];?></td>
                                                </tr>
                                                 <?php endforeach ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->   
    