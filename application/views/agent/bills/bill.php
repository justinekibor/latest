<?php
?>

    <!-- Start Page Content -->

    <div class="row"> 
        <div class="col-lg-12">

             
           <div class="panel panel-info">
                <div class="panel-heading">  
                     <i class="fa fa-plus"></i> &nbsp; Bill tenant  <a href="<?php echo base_url('agent/bills/all_bills_list') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i> List bills</a>

                </div>
                 <div class="panel-body table-responsive">
                 <form method="post" action="<?php echo base_url('agent/bills/add') ?>" class="form-horizontal" novalidate>        
                           <div class="form-group">
                    <div class="form-group">
                    <label class="col-md-12" for="example-text">Tenant Name</label> 
                    <div class="col-sm-12">
                                                <select class="form-control custom-select" name="tenant" aria-invalid="false" required="" id="tenant">
                                                    <option value="0">Select</option>
                                                    <?php foreach ($tenants as $cn): ?>
                                                        <option value="<?php echo $cn['tenant_id']; ?>"><?php echo $cn['fname']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('tenant'); ?></span>
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group" id="water">
                    <label class="col-md-12" for="example-text">WATER</label>
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('email'); ?>" id="email" type="number" name="water" class="form-control" autocomplete="off" placeholder="enter water bill amount here">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
                                     <div class="form-group" id="kplc">
                    <label class="col-md-12" for="example-text">KPLC</label>
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('email'); ?>" id="email" type="number" name="kplc" class="form-control" autocomplete="off" placeholder="Enter kplc bill amount here">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('number'); ?></span>
                                    </div>
                                      <div class="form-group" id="garbage">
                    <label class="col-md-12" for="example-text">Garbage Collection</label>
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('email'); ?>" id="email" type="number" name="garbage" class="form-control" autocomplete="off" placeholder="Enter garbage Collection bill amount here">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('number'); ?></span>
                                    </div>
                                    <div id="other">
                                     <div class="form-group">
                    <label class="col-md-12" for="example-text">OTHER BILLS</label>
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('email'); ?>" id="email" type="text" name="otherd" class="form-control" autocomplete="off" placeholder="please enter description here">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
                                    <div class="form-group">
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('email'); ?>" id="email" type="number" name="other" class="form-control" autocomplete="off" placeholder="please enter other bills amount here">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
                                  </div>
                                    <div class="col-sm-offset-3 col-sm-5">
                                  <button id="agent" type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
                            </div>
                            
                            
                          
                                       <div class="form-group" id="watert">
                    <label class="col-md-12" for="example-text">WATER</label>
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('email'); ?>" id="waterb" type="number" name="waterb" class="form-control" autocomplete="off" placeholder="enter water bill amount here">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
                                     <div class="form-group" id="kplct">
                    <label class="col-md-12" for="example-text">KPLC</label>
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('email'); ?>" id="kplcb" type="number" name="kplcb" class="form-control" autocomplete="off" placeholder="Enter kplc bill amount here">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('number'); ?></span>
                                    </div>
                                      <div class="form-group" id="garbaget">
                    <label class="col-md-12" for="example-text">Garbage Collection</label>
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('email'); ?>" id="garbageb" type="number" name="garbageb" class="form-control" autocomplete="off" placeholder="Enter garbage Collection bill amount here">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('number'); ?></span>
                                    </div>
                                    <div id="othert">
                                     <div class="form-group">
                    <label class="col-md-12" for="example-text">OTHER BILLS</label>
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('email'); ?>" id="email" type="text" name="oth" class="form-control" autocomplete="off" placeholder="please enter description here">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
                                    <div class="form-group">
                    <div class="col-sm-12">
                                            <input value="<?php echo set_value('email'); ?>" id="otherb" type="number" name="otherb" class="form-control" autocomplete="off" placeholder="please enter other bills amount here">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
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
    $("#water").hide();
    $("#kplc").hide();
    $("#other").hide();
    $("#garbage").hide();
    $("#watert").hide();
    $("#kplct").hide();
    $("#othert").hide();
    $("#garbaget").hide();

   

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

