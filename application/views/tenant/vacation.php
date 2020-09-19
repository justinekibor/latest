<?php
include("layout/css.php");
 $verification_key = $this->uri->segment(3);
  $query = $this->common_model->very_vacating_person($verification_key);
  if(!$query){
    redirect(base_url(''));

  }
  $data= array(); 
  $datavacate= array();
  $linktime = array();
                foreach($query as $row){
                    $data = array(
                        'id' => $row->tenant_id
                    );
                    $linktime = array(
                    'vacation_expiry' => $row->vacation_expiry
                    );
                  }
    $id= $data['id'];
    $balance = $this->common_model->get_vacating_balances($id);

   foreach($balance as $row){
    $datavacate = array(
      'deposit' => $row['deposit'], 
      'rent' => $row['Rent'],
      'kplc' => $row['kplc'],
      'water' => $row['water'],
      'garbage' => $row['garbage'],
      'depofixed' => $row['depofixed'],
      'others' => $row['others']

    );
   }
   $deposit= $datavacate['deposit'];
   $rent= $datavacate['rent'];
   $kplc= $datavacate['kplc'];
   $water= $datavacate['water'];
   $garbage= $datavacate['garbage'];
   $others= $datavacate['others'];
   $depofixed=  $datavacate['depofixed'];
   ///////////////date diff here/////////////////////
  $date1 = strtotime($linktime['vacation_expiry']); 
$date2 = strtotime(current_datetime()); 
$diff = abs($date2 - $date1);
         if($diff <300){
?>

    <!-- Start Page Content -->

    <div class="row" style="margin-top: 100px;">
      <div class="col-lg-3">
      </div>
        <div class="col-lg-6">
          <form action="<?php echo base_url();?>vacate/download/<?php echo $id?>" method="post">
         <input type="submit" style="border-radius: 10px; width: 100%; background: red;" class="btn btn-danger" value="Click to vacate"/>
       </form>
        <br/>
        <ul style="text-align: justify;"><h2 class="text text-info">Vacating means:</h2>
          <li>Vacancy of the room will be notified</li>
          <li>You will be in position to claim your deposits</li>
          <li>All pending bills shall be deducted from your deposit, you will only receive deposit balance if any </li>
        </ul>
    </div>
    <div class="col-lg-3"></div>
    <?php
  }
  else{
       echo'<script>';
       echo'$(document).ready(function(){
        swal("Link expired!", "Kindly request the vacation link again, This one has expired!","warning");
       });';
     echo ' </script>';
  }
    include("layout/js.php");
    ?>

    <!-- End Page Content -->