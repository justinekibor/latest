  <!-- row -->
                    <div class="row">
                    <!-- Left sidebar -->
                    <div class="col-md-12">
                        <div class="white-box">
                            <!-- row -->
                            <div class="row">
                                <div class="col-lg-2 col-md-3  col-sm-12 col-xs-12 inbox-panel">
                                    <div> 
                                        <div class="list-group mail-list m-t-20"> <a href="<?php echo base_url()?>admin/testimony" class="list-group-item active">Testimonies </a>  </div>

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
                    
                        <?php if($user['status']== "pending"){?>                       
                     <tr class="approve" id="<?php echo $user['testimonial_id'];?>">
                     <?php } else{?>
                      <tr class="disapprove" id="<?php echo $user['testimonial_id'];?>">
                    <?php }?>
                      <td>
                     <div class="checkbox m-t-0 m-b-0">
                    <input type="checkbox">
                      <label for="checkbox0"></label>
                                                        </div>
                    </td>
                    <td class="hidden-xs"><i class="fa fa-star-o"></i></td>
                     <td class="hidden-xs"><?php echo $user['fname'];?></td>

                  <td class="max-texts"><a href="#">
                                                        <?php if($user['status']=="pending"){?>
                                                        <span class="label label-warning"><?php echo $user['status'];?></span>
                                                    <?php }
                                                     else if($user['status']=="Approved"){?>
                                                        <span class="label label-success"><?php echo $user['status'];?></span>

                                                    <?php }
                                                    ?>

                                                        <?php echo $user['testimonial'];?></a></td>
                                                    <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                    <td class="text-right" style="font-size: 3;"><?php echo $user['date'];?></td>
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
             
                <script> 
     $(document).on('click', '.approve', function(){
  var user_id = $(this).attr("id");
  if(confirm("Are you sure you want to approve this testimonial?"))
  {
   $.ajax({
    url:"<?php echo base_url();?>/admin/testimony/approve",
    method:"POST",
    data:{user_id:user_id},
    success:function(data)
    {
        window.location ="<?php echo base_url();?>admin/testimony";
    }
   });
  }
  else
  {
   return false; 
  }
 });
 $(document).on('click', '.disapprove', function(){
  var user_id = $(this).attr("id");
  if(confirm("Are you sure you want to disapprove this testimonial?"))
  {
   $.ajax({
    url:"<?php echo base_url();?>/admin/testimony/disapprove",
    method:"POST",
    data:{user_id:user_id},
    success:function(data)
    {
        window.location ="<?php echo base_url();?>admin/testimony";
    }
   });
  }
  else
  {
   return false; 
  }
 });
  
    </script>