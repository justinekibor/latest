
<?php 
$system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
?>
<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="We ddevelop creative software, eye catching software. We also train to become a creative thinker">
<meta name="author" content="leasehouse LINKUP COMPUTERS">
        <link rel="icon" href="<?php echo base_url(); ?>leasehouse/logo.png" type="image/x-icon" />
        <title><?php echo $system_name; ?></title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>leasehouse/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url(); ?>leasehouse/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>leasehouse/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo base_url(); ?>leasehouse/css/colors/megna.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register"> 
  <div class="login-box login-sidebar">
    <div class="white-box">

               <div align="center">
			   
				<img  width="100" height="100" src="<?php echo base_url(); ?>leasehouse/logo.png">
                    <br><br>
					Welcome to<br> <strong style="color:green">LeaseHouse</strong>. Click on login button to login.
                <div align="center">
                       <?php if (isset($page) && $page == "logout"): ?>
                    <div class="alert alert-success hide_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> Logout Successfully &nbsp;
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
               	 	<?php endif ?>
              <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
            <div class="alert alert-danger hide_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i><?php echo $error_msg;?> &nbsp;
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
            <?php endif ?>
            <!------ reset msg----------->
                <?php $reset_msg = $this->session->flashdata('reset_msg'); ?>
            <?php if (isset($reset_msg)): ?>
            <div class="alert alert-success hide_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i><?php echo $reset_msg;?> &nbsp;
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
            <?php endif ?>
            <!---------------->
                    </div>
		<br><br>
						<form class="form-horizontal form-material" id="loginform" action="<?php echo base_url('auth/log'); ?>" method="post"> 

					<div class="form-group">
                                   
                                    <div class="col-xs-12">
                            <input class="form-control" type="email" name="user_name" required="" placeholder="Email Address" style="width:100%">
                                    </div>
                                </div>
       <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="Password" style="width:100%">
                        </div>
                    </div>
                   
    
	 <!-- CSRF token -->
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
		  
<button class="btn btn-info style1 btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" style="width:100%; color:white">
Login
</button>
<div align="center"><img id="install_progress" src="<?php echo base_url() ?>leasehouse/images/loading.gif" style="margin-left: 20px;  display: none"/></div>
 <a href="javascript:void(0)" id="to-recover" class="text-blue pull-right"><i class="fa fa-lock m-r-7"></i> Forgot password?</a> </div>

                        </div>
						<br><br><br><br><br><br><br><br><br>
                    </div>
					
               
                 </form>
                		
            </div>
        </div>
    </div>
</section>
               
       
        <form class="form-horizontal" id="recoverform" action="<?php echo base_url('auth/reset');?>" method="post"> 
                    <div class="login-box login-sidebar">
             <div align="center">
               
                <img  width="100" height="100" src="<?php echo base_url(); ?>leasehouse/logo.png">
                    <br><br>
                    Welcome to<br> <strong style="color:green">LeaseHouse</strong>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input name="email" class="form-control" type="text" required="" type="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </div>
                </form>
        
   
		
		
		

  
	

<!-- jQuery -->
<script src="<?php echo base_url(); ?>leasehouse/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>leasehouse/bootstrap/dist/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>leasehouse/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>leasehouse/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>

<!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>leasehouse/js/custom.min.js"></script>
    <script src="<?php echo base_url() ?>leasehouse/js/custom.js"></script>
	

	
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>leasehouse/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <link href="<?php echo base_url(); ?>leasehouse/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
 
 <!-- auto hide message div-->
    <script type="text/javascript">
        $( document ).ready(function(){
           $('.hide_msg').delay(2000).slideUp();
        });
    </script>
	
<!--slimscroll JavaScript -->
<script src="<?php echo base_url(); ?>leasehouse/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>leasehouse/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>leasehouse/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="<?php echo base_url(); ?>leasehouse/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

<script>
    $('form').submit(function (e) 
	{
        $('#install_progress').show();
        $('#modal_1').show();
        $('.btn').val('Login...');
        $('form').submit();
        e.preventDefault();
    });
	
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5da48cfdfbec0f2fe3b9a948/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>

</html>
