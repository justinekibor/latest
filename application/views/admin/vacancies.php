 <?php include 'layout/css.php'; ?>

    <!-- Preloader -->
    <body>
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
                            <div class="row" style="margin-top: 50px; margin-bottom: 0px; background: wheat">
                              <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <img height="300" width="100%" class="card-img-top image-responsive" src="<?php echo $rooms->picture; ?>" alt="House image appear here">
                                        <div class="card-block" style="color: purple;">
                                           <ul>Plot &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rooms->plot_name;?></ul>
                                            <ul>Postal area &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rooms->plot_code. "  ".$rooms->plot_name;?></ul>
                                             <ul> Name:&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rooms->house_name;?></ul>
                                             <ul>Type &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rooms->info_type;?></ul>
                                              <ul>Rent &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rooms->rent;?></ul>
                                               <ul>Deposit &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rooms->rent;?></ul>
                                                <ul>Floor &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rooms->floor;?></ul>
                                                <ul style="color: blue;">Call &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rooms->phone_no;?></ul>
                                                 <ul style="color: green;">Welcome to our apartments, We value you so much our esteemed Customer.<?php echo "  ".$rooms->plot_name. " is one of the best plots in the region";?> </ul>
                                                  
                                           
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-3"></div>
                            </div>
                             <?php include 'layout/js.php'; ?>
                           </body>
                           <style type="text/css">
                             body{
                              background: wheat;
                             }
                           </style>
