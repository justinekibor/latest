 <!-- /.row -->
 <?php include 'layout/css.php';
 $id = $this->uri->segment(3);
$vacated= $this->common_model->get_vacated_tenant($id); 
if($vacated){
        echo'<script>';
       echo'$(document).ready(function(){
        swal("Already Vacated!", "Kindly you have already vacated, Just print your vacation notice","warning");
       });';
     echo ' </script>'; 
 }
 ?>

              <?php foreach ($balance as $user): ?>
                            <?php
                             $total=$user['Rent']+ $user['deposit']+$user['water']+$user['garbage']+ $user['kplc']+$user['others'];
                     
                            ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box printableArea">
                            <h3><b>Vacation</b> <span class="pull-right">#00000<?php echo $user['balance_id'];?></span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger">LeaseHouse Vacation Notice</b></h3>
                                            <p class="text-muted m-l-5">M, 205, Reazi 4,
                                                <br/> KT Moi Avenue Street Monzabe,
                                                <br/> Nick Road,
                                                <br/> Nairobi - 23465</p>
                                        </address>
                                    </div>
                                     <div class="pull-right text-right">
                                        <address>
                                              <br/><br/>
                                            <h4 class="font-bold">Tenancy number <?php echo $user['tenant_id'];?></h4>
                                            <p class="text-muted m-l-30">E 104, Kenya-2,
                                                <br/> Nairobi - 23465</p>
                                            <p class="m-t-30"><b>Vacation  Date :</b> <i class="fa fa-calendar"></i> <?php echo $user['vacation_date'];?> </p>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Description</th>
                                                    <th>Pending Balances(Ksh)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>Rent</td>
                                                    <td ><?php echo $user['Rent'];?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td>Deposit</td>
                                                    <td > <?php echo $user['deposit'];?> </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>Water</td>
                                                    <td >  <?php echo $user['water'];?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">4</td>
                                                    <td>Electricity</td>
                                                    <td > <?php echo $user['kplc'];?> </td>
                                                    
    </tr>
    <tr>
   <td class="text-center">5</td>
   <td>Garbage collection</td>
 <td > <?php echo $user['garbage'];?></td>
    </tr>
     <tr>
     <td class="text-center">5</td>
    <td>Garbage collection</td>
    <td > <?php echo $user['garbage'];?></td>
    </tr>
    <tr>
     <td class="text-center">6</td>
    <td>Others</td>
     <td > <?php echo $user['others'];?></td>
     </tr>
     <tr>
    <td class="text-center text-success">####</td>
    <td style="color: purple;">Total Balances</td>
    <td style="color: red;" > <?php echo $total;?></td>
  </tr>
      <tr>
    <td class="text-center text-info">*****</td>
    <td style="color: purple;">Claim</td>
    <?php $claim = $user['depofixed']-$total;?>
    <td style="color: green;" > <?php echo $claim;?></td>
  </tr>
   </tbody>
                                        </table>
                                    </div>
                                </div>
                                                    <div class="text">
                        <p>

                The tenant of tenancy number <?php echo $user['tenant_id'];?> has been terminated with immediate effect. You are requested to consult the caretaker to clear you before leaving the house.
                        </p>
                </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <button id="print" class="btn btn-rounded btn-sm btn-info" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- .row -->
                <?php endforeach ?> 
                 <?php include 'layout/js.php'; ?>
