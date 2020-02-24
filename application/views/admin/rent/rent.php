                 <div class="row">
                    

                    <div class="col-lg-12 col-sm-6 col-xs-12">
                        <div class="panel panel-info">
                        <div class="white-box">
                            <h3 class="box-title"> 
                                <div class="panel-heading"> 
                     <i class="fa fa-plus"></i> &nbsp;Register New Room<a href="<?php echo base_url('admin/rooms/all_room_list') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i> List rooms </a>

                </div>
                           <?php $msg = $this->session->flashdata('msg'); ?>
            <?php if (isset($msg)): ?> 
             <script>
                var x= "<?php echo $msg;?>";
                 $(document).ready(function(){
                 swal("Success", x, "success");
                    });
             </script>
            <?php endif ?>
            </h3>
                            
                            <!-- Nav tabs -->
                            <ul class="nav customtab nav-tabs" role="tablist">
                                <li role="presentation" class="nav-item"><a href="#home1" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Payment collection</span></a></li>
                                <li role="presentation" class="nav-item"><a href="#profile1" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Check For Rent balances</span></a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="home1">
                                      <form name="bill" action="<?php echo base_url('admin/rent/collection') ?>" method="POST" id="bill">
                                          <div class="form-group">
                                        <label class="col-md-12" for="example-text">Plot</label> 
                                          <div class="col-sm-12">
                                                <select id="plot1" class="form-control custom-select" name="plot" value="<?php echo set_value('plot'); ?>" aria-invalid="false">
                                                    <option value="" >Select</option>
                                                    <?php foreach ($plots as $cn): ?>
                                                        <option  value="<?php echo $cn['plot_id']; ?>"><?php echo $cn['plot_name']; ?></option>
                                                    <?php endforeach ?>
                                                </select> 
                                            </div>
                                            <span class="text-danger"><?php echo form_error('Plot'); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Houses</label>
                                            <select class="form-control" id="houses"  name="houses" required="">
                                            <option value="">non selected</option>
                                            </select>
                                            <div>
                                                <span class="text-danger"><?php echo form_error('houses'); ?></span>
                                            </div>
                                        </div>
                                             <div class="form-group">
                                            <label>Rental Balance</label>
                                            <select class="form-control" id="rentbal"  name="rentbal" required="">
                                            <option value="">non selected</option>
                                            </select>
                                        </div>

                                              <div class="form-group">
                                            <label>Deposit balance</label>
                                            <select class="form-control" id="depositbal"   name="depositbal" required="">
                                            <option value="">non selected</option>
                                            </select>
                                            <div>
                                                <span class="text-danger"><?php echo form_error('houses'); ?></span>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label>Electricity balance</label>
                                            <select class="form-control" id="kplcbal"   name="kplcbal" required="">
                                            <option value="">non selected</option>
                                            </select>
                                            <div>
                                                <span class="text-danger"><?php echo form_error('houses'); ?></span>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label>Garbage collection balance</label>
                                            <select class="form-control" id="garbagebal"   name="garbagebal" required="">
                                            <option value="">non selected</option>
                                            </select>
                                            <div>
                                                <span class="text-danger"><?php echo form_error('houses'); ?></span>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label>Water bill balance</label>
                                            <select class="form-control" id="waterbal"   name="waterbal" required="">
                                            <option value="">non selected</option>
                                            </select>
                                            <div>
                                                <span class="text-danger"><?php echo form_error('houses'); ?></span>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label>Other balances</label>
                                            <select class="form-control" id="otherbal"   name="otherbal" required="">
                                            <option value="">non selected</option>
                                            </select>
                                            <div>
                                                <span class="text-danger"><?php echo form_error('houses'); ?></span>
                                            </div>
                                        </div>
                                        <label>Occupant</label>
                                            <select class="form-control" id="Ocupant" name="Ocupant"  required="">
                                            <option>non selected</option>
                                            </select>
                                        <div class="form-group">
                                            <label>Mode</label>
                                            <select class="form-control" id="mode"  name="mode" required="">
                                                <option value="">Please Select mode of Payment</option>
                                            <option value="mpesa">M-Pesa</option>
                                            <option value="bank">Bank</option>
                                            <option value="cheque">Cheque</option>
                                            <option value="cash">Cash</option>
                                            </select>
                                            <span class="text-danger"><?php echo form_error('mode'); ?></span>
                                        </div>
                                         <strong>Year :</strong> <input  class="form-control" type="text" name="year" placeholder="click to show datepicker"  id="example1">
                                         <span class="text-danger"><?php echo form_error('year'); ?></span>
                                          <strong>Month :</strong> <input  class="form-control" type="text" name="month" placeholder="click to show datepicker"  id="example2">
                                          <span class="text-danger"><?php echo form_error('month'); ?></span>

    
                                             <div class="form-group"> 
                                  <label class="col-md-12" for="example-text">Enter Transaction code</label>
                                    <div class="col-sm-12">
                                            <input type="text" id="code" name="code" value="<?php echo set_value('code'); ?>" class="form-control" autocomplete="off">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('code'); ?></span>
                                    </div>
                                        <div class="form-group"> 
                                  <label class="col-md-12" for="example-text">Enter Amount paid</label>
                                    <div class="col-sm-12">
                                            <input type="number" id="rent" name="amount"  class="form-control" autocomplete="off">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                    </div>
                                
                                 <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
                            </div>
                            <div id="rento"> </div>

                                    </form>
                                                  
                                </div>
                        
                        
                                <div role="tabpanel" class="tab-pane fade" id="profile1">
                                          <form name="bill" action="<?php echo base_url('admin/rooms/billHouse') ?>" method="POST" id="bill">
                                          <div class="form-group">
                                        <label class="col-md-12" for="example-text">Plot</label> 
                                          <div class="col-sm-12">
                                                <select id="plot1" class="form-control custom-select" name="plot" value="<?php echo set_value('plot'); ?>" aria-invalid="false">
                                                    <option value="" >Select</option>
                                                    <?php foreach ($plots as $cn): ?>
                                                        <option  value="<?php echo $cn['plot_id']; ?>"><?php echo $cn['plot_name']; ?></option>
                                                    <?php endforeach ?>
                                                </select> 
                                            </div>
                                            <span class="text-danger"><?php echo form_error('plot'); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Houses</label>
                                            <select class="form-control" id="houses"  name="houses" required="">
                                            <option value="">non selected</option>
                                            </select>
                                            <div>
                                                <span class="text-danger"><?php echo form_error('houses'); ?></span>
                                            </div>
                                        </div>
                                             <div class="form-group">
                                            <label>Floor</label>
                                            <select class="form-control" id="f" disabled name="floor" required="">
                                            <option>non selected</option>
                                            </select>
                                             <span class="text-danger"><?php echo form_error('rent'); ?></span>
                                        </div>
                                              <div class="form-group">
                                            <label>Type</label>
                                            <select class="form-control" id="t" disabled name="types" required="">
                                            <option>non selected</option>
                                            </select>
                                             <span class="text-danger"><?php echo form_error('rent'); ?></span>
                                        </div>
                                        <div class="form-group"> 
                                  <label class="col-md-12" for="example-text">Rent</label>
                                    <div class="col-sm-12">
                                            <input type="number" id="rent" name="rent" value="<?php echo set_value('rent'); ?>" class="form-control" autocomplete="off">
                                        </div>
                                        <span class="text-danger"><?php echo form_error('rent'); ?></span>
                                    </div>
                                
                                 <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
                            </div>

                                    </form>
                                    
                                   
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="messages1">
                                    <div class="col-md-6">
                                        <h3>Come on you have a lot message</h3>
                                        <h4>you can use it with the small code</h4>
                                    </div>
                                    <div class="col-md-5 pull-right">
                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings1">
                                    <div class="col-md-6">
                                        <h3>Just do Settings</h3>
                                        <h4>you can use it with the small code</h4>
                                    </div>
                                    <div class="col-md-5 pull-right">
                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
         <?php //include 'js.php'; ?>

               <script>
                 $(document).ready(function () {
                
                $('#example1').datepicker({
                    minViewMode: 'years',
                    autoclose: true,
                     format: 'yyyy'
                });  
          $('#example2').datepicker({
           minViewMode: 1,
           autoclose: true,
           format: 'MM'
    });  
            
            });
                $(function() {
              $("#dob").datepicker();
                    });
              $(document).on('submit', '#roomsform', function(event){
              event.preventDefault();
                 var name = $('#name').val();
            var plot= $('#plot').val();
             var type= $('#type').val();
          var floor= $('#floor').val();
           var len= $('input[type=radio][name=water]:checked').length;
           var pl= $('input[type=radio][name=kplc]:checked').length;
          var form_data = $(this).serialize();
        if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           } 
           else{ 
         
        if(name != '' && plot!='' && type!='' && floor!='' && len==1 && pl==1)
        {
            $.ajax({
                url:"<?php echo base_url(); ?>admin/rooms/add",
                    method:"POST",  
                     data:new FormData(this),  
                     contentType: false,   
                     cache: false,  
                     processData:false,  
                success:function(data)
                {
                   // alert(data);

                    window.location="<?php echo base_url(); ?>admin/rooms/all_room_list"; 

                }
            });
        }
        else
        {
            alert("Kindly all the fields are required");
        }
    } 
    }); 
                 $(document).ready(function(){
                    $('#plot1').change(function(){
                        var plot_id= $('#plot1').val();
                        if(plot_id != ''){
                            jQuery.ajax({
                                url:"<?php echo base_url();?>admin/rooms/fetch_to_bill",
                                type:"POST",  
                                data:{plot_id:plot_id},
                                asyn : true,
                                dataType  : 'json',
                               success:function(data){
                                var html='';
                                var i;
                                for(i=0; i<data.length; i++){
                                    html += '<option value='+ data[i].house_id+'>'+data[i].house_name+'</option>';
                                   // html= data[i].house_name;

                                }
                                $('#houses').html(html);
                                
                               }          
                            });
                            return false;
                        }

                    }); 

                 });
                   $(document).ready(function(){
                    $('#houses').change(function(){
                        var house_id= $('#houses').val();
                        if(house_id != ''){
                            jQuery.ajax({
                                url:"<?php echo base_url();?>admin/rooms/fetch_tenant",
                                type:"POST",  
                                data:{house_id:house_id},
                                asyn : true,
                                dataType  : 'json',
                               success:function(data){
                                var types='';
                                var deposit='333';
                                var rent ='4443';
                                 var kplcbal='';
                                var waterbal='333';
                                var garbagebal ='4443';
                                 var otherbal='';
                                
                                var i;
                                for(i=0; i<data.length; i++){
                                    types += '<option value='+ data[i].tenant_id+'>'+data[i].fname+'</option>';                                     
                                    deposit += '<option value='+ data[i].deposit+'>'+data[i].deposit+'</option>';  
                                    rent += '<option value='+ data[i].Rent+'>'+data[i].Rent+'</option>';  
                                    waterbal += '<option value='+ data[i].water+'>'+data[i].water+'</option>';                                     
                                    kplcbal += '<option value='+ data[i].kplc+'>'+data[i].kplc+'</option>';  
                                    garbagebal += '<option value='+ data[i].garbage+'>'+data[i].garbage+'</option>'; 
                                    otherbal += '<option value='+ data[i].others+'>'+data[i].others+'</option>';                                      
                                }
                                $('#Ocupant').html(types);
                               $('#depositbal').html(deposit);
                               $('#rentbal').html(rent);
                                 $('#kplcbal').html(kplcbal);
                               $('#waterbal').html(waterbal);
                               $('#garbagebal').html(garbagebal);
                                 $('#otherbal').html(otherbal);    
                               }          
                            });
                            return false;
                        }

                    }); 

                 });
                     </script>
