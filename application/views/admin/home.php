
 <!--row -->
 <?php
 $Occupied= $count_total->total/$count_units->total*100;
 $PaidUpRent = $count_rentp->total/($count_rentp->total+$count_rent->total)*100;
  $PaidUpDeposit = $count_depositp->total/($count_depositp->total+$count_deposit->total)*100;
 ?>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user"></i>
                                <div class="bodystate">
                                    <h4 style="color:red"><?php echo $count_collections->total; ?></h4>
                                    <span class="text-muted"><a href="">
Total collection Collections<b></b></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-shopping-cart"></i>
                                <div class="bodystate">
                                    <h4 style="color:red">Ksh. <?php echo $count_rent->total; ?></h4>
                                    <span class="text-muted"><a href="">
Current Rent Balances<br/><b></b><br/></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box ">
                            <div class="r-icon-stats">
                                <i class="ti-wallet"></i>
                                <div class="bodystate">
                                    <h4 style="color:red">Ksh. <?php echo $count_deposit->total; ?></h4>
                                    <span class="text-muted"><a href="">
Deposit Balances<br/><b></b><br/></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                         <div class="col-md-3 col-sm-6">
                        <div class="white-box ">
                            <div class="r-icon-stats">
                                <i class="ti-wallet"></i>
                                <div class="bodystate">
                                    <h4 style="color:red">Ksh. <?php echo $count_deposit->total; ?></h4>
                                    <span class="text-muted"><a href="">
Rental total Expense<br/><b></b><br/></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                                       
                    
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-wallet"></i>
                                <div class="bodystate">
                                    <h4 style="color:red"><?php echo $count_agents->total; ?></h4>
                                    <span class="text-muted"><a href="">
Agents<br/><b></b></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					
					
					
					
					
					       <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user"></i>
                                <div class="bodystate">
                                    <h4 style="color:red"><?php echo $count_plots->total; ?></h4>
                                    <span class="text-muted"><a href="" >
Plots <br/><b> </b></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-shopping-cart"></i>
                                <div class="bodystate">
                                    <h4 style="color:red"><?php echo $count_units->total; ?></h4>
                                    <span class="text-muted"><a href="" >
Units <br/><b></b></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-wallet"></i>
                                <div class="bodystate">
                                    <h4 style="color:red"><?php echo $count_total->total; ?></h4>
                                    <span class="text-muted"><a href="" >
Tenants <br/><b> </b></a></span>
                             </div>
                            </div>
                        </div>
                    </div>
					
                </div>
                <div class="row">
                                                    <div class="col-md-12">
                                    <div class="card card-inverse card-success text-center text-white">
                                        <div class="card-block">
                                           <?php echo date(current_datetime());?> Recap Report
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-md-12">
                                <div class="pull-center" style="text-align: center;">
                                    Goal Completion
                                </div>
                            </div>
                     <div class="col-lg-12">
                        <div class="white-box">
                             <h5>PaidUp Rent<span class="pull-right"><?php echo $PaidUpRent;?>%</span></h5>

                                             <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-info active progress-bar-striped" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $PaidUpRent;?>%" role="progressbar"> <span class="sr-only"><?php echo $PaidUpRent;?>% Complete (success)</span> </div>
                                    </div>
                                </div>
                                                     <div class="col-lg-12">
                        <div class="white-box">
                             <h5>PaidUp Deposit <span class="pull-right"><?php echo  $PaidUpDeposit;?>%</span></h5>

                                             <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-info active progress-bar-striped" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo  $PaidUpDeposit;?>%" role="progressbar"> <span class="sr-only"><?php echo  $PaidUpDeposit;?>% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                                                 <div class="col-lg-12">
                        <div class="white-box"> 
                             <h5>Occupied units<span class="pull-right"><?php echo $Occupied;?>%</span></h5>

                                             <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-info active progress-bar-striped" aria-valuenow="96" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $Occupied;?>%" role="progressbar"> <span class="sr-only"><?php echo $Occupied;?>% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                <!--/row -->

               <!-- .row -->
               
                <!-- /.row -->
               <!--row -->
 
                <!-- /.row -->
				
				 <!-- Row -->

    <!-- Row -->
    