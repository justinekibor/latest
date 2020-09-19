<?php
$email = $this->session->userdata('email')
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



</body>
</html>
<script>          $(document).ready(function(){
	var email ="<?php echo $email;?>";
	                      swal({
                                title: "Kindly indicate for us why you are leaving",
                                 text: "This will help us improve our services",
                               type: "input",
                                 showCancelButton: true,
                                closeOnConfirm: false,
                                 inputPlaceholder: "kindly just write your reason here"
                                }, function (inputValue) {
                             if (inputValue === false) return false;
                                if (inputValue === "") {
                             swal.showInputError("You need to write something!");
                                 return false
                                            }
                                            $.ajax({
                                 url:"<?php echo base_url();?>tenant/tenancy/vacation",
                                type:"POST",  
                                data:{inputValue:inputValue,email:email },
                                asyn : true,
                                dataType  : 'json',
                                       success: function (data) {
                                       	
                                        swal("success", "Thanks for your response, Further instuctions has been sent to your email you provided during registration "+data, "success");

                                          }
                                          });
                             
                                });
	                  });
    
</script>