 <!-- /.row -->
              <?php foreach ($payment as $user): ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box printableArea">
                            <h3><b>Receipt</b> <span class="pull-right">#00000<?php echo $user['payment_id'];?></span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger">LeaseHouse payment Receipt</b></h3>
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
                                            <h4 class="font-bold">House number <?php echo $user['house_id'];?></h4>
                                            <p class="text-muted m-l-30">E 104, Kenya-2,
                                                <br/> Nairobi - 23465</p>
                                            <p class="m-t-30"><b>Payment  Date :</b> <i class="fa fa-calendar"></i> <?php echo $user['date'];?> </p>
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
                                                    <th>Received Amount(Ksh)</th>
                                                     <th>Balance (Ksh)</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>Rent</td>
                                                    <td ><?php echo $user['Rent'];?></td>
                                                     <td ><?php echo $user['Rentball'];?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td>Deposit</td>
                                                    <td > <?php echo $user['deposit'];?> </td>
                                                     <td ><?php echo $user['depositball'];?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>Water</td>
                                                    <td >  <?php echo $user['water'];?></td>
                                                     <td ><?php echo $user['waterball'];?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td class="text-center">4</td>
                                                    <td>Electricity</td>
                                                    <td > <?php echo $user['kplc'];?> </td>
                                                     <td ><?php echo $user['kplcball'];?></td>
                                                
                                                </tr>
                                                 <tr>
                                                    <td class="text-center">4</td>
                                                    <td>Garbage collection</td>
                                                    <td > <?php echo $user['garbage'];?></td>
                                                     <td ><?php echo $user['garbageball'];?></td>
                                                
                                                </tr>
                                                 <tr>
                                                    <td class="text-center">4</td>
                                                    <td>Others</td>
                                                    <td > <?php echo $user['others'];?></td>
                                                     <td ><?php echo $user['othersball'];?></td>
                                                
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php
                                $total= $user['others']+$user['garbage']+$user['water']+$user['Rent']+$user['deposit']+$user['kplc'];
                                 $bal= $user['othersball']+$user['garbageball']+$user['waterball']+$user['Rentball']+$user['depositball']+$user['kplcball'];
                                ?>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <h3><b>Total Payment :</b><br/><?php echo  "Ksh. ".$total." only"; ?></h3>
                                         <h3><b>Outstanding Balances :</b><br/><?php echo  "Ksh. ".$bal." only"; ?></h3>
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
                </div>
                <!-- .row -->
                <?php endforeach ?> 