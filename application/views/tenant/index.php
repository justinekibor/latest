<?php include 'layout/css.php'; ?>

    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper"> 
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="icon-grid"></i></a>
                <div class="top-left-part"><a class="logo" href="<?php echo base_url('tenant/dashboard/') ?>"><b><img src="<?php echo base_url();?>leasehouse/small.png" alt="LeaseHouse" /></b><span class="hidden-xs">LeaseHouse</span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs"><i class="icon-grid"></i></a></li>
                   
                </ul>
				
				<ul class="nav navbar-top-links navbar-right pull-right">
                <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-fax"></i>
					
          <div class=""><span class=""></span><span class="point"></span></div>
          </a>
                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->
 <ul class="nav navbar-top-links navbar-right pull-right">
     <?php foreach ($notification as $note): ?>

                    <!-- /.dropdown <span class="badge">5</span>-->
					 <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-screen-desktop"> &nbsp; <span class="badge" style="color: red; background: white;"> <?php echo $note['count'];?></span></i>
          <div class="notify"><span class=""></span></div>
          </a>
                        <ul class="dropdown-menu mailbox animated bounceInRight">
                            <li>
                                <div class="drop-title">You have <?php echo $note['count'];?> unread messages</div>
                            </li>
                        <?php endforeach ?>
                             <?php foreach ($notification as $note): ?>
                            <div class="message-center">
                                   
                                    <a href="<?php echo base_url();?>tenant/complaint/reply/<?php echo $note['complaint_id'];?>">
                                        <div class="user-img"> <img src="<?php echo base_url();?>leasehouse/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5><?php echo $note['fname'];?></h5> <span class="mail-desc"><?php echo $note['reply'];?></span> <span class="time"><?php echo $note['reply_date'];?></span> </div>
                                    </a>
                                <?php endforeach?>
                                </div>
                            <li>
                                <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->
					
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-feed"></i>
          <div class="notify"><span class=""></span><span class=""></span></div>
          </a>
                        <ul class="dropdown-menu dropdown-tasks animated bounceInRight">
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Plot one</strong> <span class="pull-right text-muted">40% full</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% full (success)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Plot 2</strong> <span class="pull-right text-muted">20% full</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% full</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Plot 3</strong> <span class="pull-right text-muted">60% full</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% full (warning)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>plot 4</strong> <span class="pull-right text-muted">80% full</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% full</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#"> <strong>See All Plots</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-tasks -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="<?php echo $this->session->userdata('image'); ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $this->session->userdata('email'); ?></b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i>  My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i>  Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i>  Account Setting</a></li>
                            <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-power-off"></i>  Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    	<!--<li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>-->
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar"  role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">


                    <li> <a href="<?php echo base_url('admin/dashboard') ?>" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu">Dashboard</span></a> </li>
                                        <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-product-hunt"></i> <span class="hide-menu">Complaints <span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">2</span></span></a>
                        <ul class="nav nav-second-level">
                             <li> <a href="<?php echo base_url('tenant/complaint') ?>"><i class="fa fa-plus p-r-10"></i><span class="hide-menu">Make Complaint</span></a></li>
                        <li><a href="<?php echo base_url('tenant/complaint/complaints') ?>"><i class="fa fa-list p-r-10"></i><span class="hide-menu">View complaints</span></a></li>
                      </ul>
                    </li> 
                <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-product-hunt"></i> <span class="hide-menu">Payment <span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">1</span></span></a>
                        <ul class="nav nav-second-level">
                        <li><a href="<?php echo base_url('tenant/payment/payments') ?>"><i class="fa fa-list p-r-10"></i><span class="hide-menu">My Payments</span></a></li>
                      </ul>
                    </li> 
                     <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-product-hunt"></i> <span class="hide-menu">Tenancy <span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">2</span></span></a>
                        <ul class="nav nav-second-level">
                        <?php
                        $id= $this->session->userdata('id');
                        $vacated= $this->common_model->get_vacated_tenant($id); 
                        if($vacated){
                        ?>
                             <li> <a href="<?php echo base_url('vacate/download/'.$id) ?>"><i class="fa fa-plus p-r-10"></i><span class="hide-menu">Download Vacation request</span></a></li>
                        <li><a href="<?php echo base_url('tenant/tenancy/agreement') ?>"><i class="fa fa-list p-r-10"></i><span class="hide-menu">Tenancy Agreement</span></a></li>
                        <?php

                    }
                    else{
                        ?>
         <li> <a href="<?php echo base_url('tenant/tenancy') ?>"><i class="fa fa-plus p-r-10"></i><span class="hide-menu">Vacation Request</span></a></li>
         <li><a href="<?php echo base_url('tenant/tenancy/agreement') ?>"><i class="fa fa-list p-r-10"></i>

            <span class="hide-menu">Tenancy Agreement</span></a></li>
            <?php
        }
        ?>
     </ul>
   </li> 
     <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-product-hunt"></i> <span class="hide-menu">Testimonial <span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">2</span></span></a>
                        <ul class="nav nav-second-level">
                             <li> <a href="<?php echo base_url('tenant/testimony') ?>"><i class="fa fa-plus p-r-10"></i><span class="hide-menu">Testify</span></a></li>
                        <li><a href="<?php echo base_url('tenant/testimony/testimonies') ?>"><i class="fa fa-list p-r-10"></i><span class="hide-menu">My testimonies</span></a></li>
                      </ul>
                    </li> 


	                   <li><a href="<?php echo base_url('auth/logout') ?>" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
       
	   
	    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                
			<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">LeaseHouse Tenant</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url();?>tenant/dashboard/">Home</a></li>
                            <li class="active"> <?php echo $page_title; ?></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div> 	
				
				
				
				<!--- Main content goes here-->
				
               <?php echo $main_content; ?>
			
            </div>
            <!-- /.container-fluid -->
           <?php include 'layout/footer.php'; ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
   <?php include 'layout/js.php'; ?>
