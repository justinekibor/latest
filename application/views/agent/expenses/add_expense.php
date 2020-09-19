<?php
?>

    <!-- Start Page Content -->

    <div class="row"> 
        <div class="col-lg-12">
           

             
           <div class="panel panel-info">
                <div class="panel-heading">  
                     <i class="fa fa-plus"></i> &nbsp; Add expense  <a href="<?php echo base_url('agent/expense/all_expense_list') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i> List Expenses</a>

                </div>
                 <div class="panel-body table-responsive">
                  <?php $msg = $this->session->flashdata('msg'); ?>
            <?php if (isset($msg)): ?> 
             <script>
                 $(document).ready(function(){
                  var mess= "<?php echo $msg;?>";
                 swal("Success", mess, "success");
                    });
             </script>
            <?php endif ?>
                 <form method="post" action="<?php echo base_url('agent/expense/add') ?>" class="form-horizontal" novalidate>        

                                       <div class="form-group">
                    <label class="col-md-12" for="example-text">Expense</label>
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('expense'); ?>" id="expense" type="text" name="expense" class="form-control" autocomplete="off">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('expense'); ?></span>
                                    </div>
                                     <div class="form-group">
                    <label class="col-md-12" for="example-text">Description</label>
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('description'); ?>" id="description" type="text" name="description" class="form-control" autocomplete="off">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('description'); ?></span>
                                    </div>
                                    <div class="form-group">
                    <label class="col-md-12" for="example-text">Paid to</label>
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('paywho'); ?>" id="paywho" type="text" name="paywho" class="form-control" autocomplete="off">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('paywho'); ?></span>
                                    </div>
                                     <div class="form-group">
                    <label class="col-md-12" for="example-text">Amount</label>
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('paywho'); ?>" id="amount" type="number" name="amount" class="form-control" autocomplete="off">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                    </div>
 
 
                    <div class="form-group">
                    <label class="col-md-12" for="example-text">Trasaction code</label>
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('transcode'); ?>" id="transcode" type="text" name="transcode" class="form-control" autocomplete="off">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('transcode'); ?></span>
                                    </div>
                              <div class="form-group" id="plotid">
                    <label class="col-md-12" for="example-text">Trasaction code</label>
                    <div class="col-sm-12"> 
                                              <?php foreach ($plotid as $agent): ?>
                                            <input value="<?php echo $agent['plot_id']?>" id="plot_id" type="text" name="plot_id" class="form-control" autocomplete="off">
                                        </div>
                                        <?php endforeach ?>
                                        <span class="text-danger"><?php echo form_error('plot_id'); ?></span>
                                    </div>
                                    <div class="col-sm-offset-3 col-sm-5">
                                  <button id="agent" type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
                            </div>
                              </form>
</div>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div> 
    </div>
    <div id="test"></div>

    <!-- End Page Content -->
    <script>
                     $(document).ready(function(){
                      $('#plotid').hide();
                     });
                     $(document).ready(function(){
                    $('#tenant').change(function(){
                        var tenant_id= $('#tenant').val();
                        if(tenant_id != ''){
                            jQuery.ajax({
                                url:"<?php echo base_url();?>admin/rooms/tenant",
                                type:"POST",  
                                data:{tenant_id:tenant_id},
                                asyn : true,
                                 dataType  : 'json',
                               success:function(data){
                                var water='';
                                var kplc='';
                                var i;
                                var waterb='',kplcb='',garbageb='',otherb='';
                                for(i=0; i<data.length; i++){
                                    water += data[i].auto_water;
                                   kplc= data[i].auto_kplc;
                                    waterb += data[i].water;
                                   kplcb= data[i].kplc;
                                    garbageb += data[i].garbage;
                                   otherb= data[i].others;


                                }
                                 $('#waterb').val(waterb);
                                  $('#otherb').val(otherb);
                                   $('#kplcb').val(kplcb);
                                    $('#garbageb').val(garbageb);
                                if (kplc== "yes" && water=="yes"){
                                  $('#water').hide();
                                  $('#kplc').hide();
                                  $('#other').show();
                                  $('#garbage').show();
                                
                                }
                                 else if (kplc== "no" && water=="no"){
                                  $('#water').show();
                                  $('#kplc').show();
                                  $('#other').show();
                                  $('#garbage').show();
                                }
                                else if (kplc== "no" && water=="yes"){
                                  $('#kplc').show();
                                  $('#water').hide();
                                  $('#other').show();
                                  $('#garbage').show();
                                }
                                else if (kplc== "yes" && water=="no"){
                                  $('#kpl').hide();
                                  $('#water').show();
                                  $('#other').show();
                                  $('#garbage').show();
                                }
                                
                               }          
                            });
                             return false;
                        }

                    }); 

                 });
</script>
<script type="text/javascript">
    $(document).ready(function(){
     
    });

</script>

