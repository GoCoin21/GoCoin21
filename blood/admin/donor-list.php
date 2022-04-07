<?php
include('includes/config.php');
if(strlen($_SESSION['alogin']) == 0){
  header('location : index.php');
}else {
  if(isset($_REQUEST['hidden'])){
    $eid = intval($_GET['hidden']);
    $status = 0;
    $sql = "UPDATE tblblooddonars SET Status = '$status' WHERE id= '$eid'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error());
    $row = mysqli_fetch_array($result);

    $msg = "Booking Successfully Cancelled";
  }

  if(isset($_REQUEST['public'])){
    $aeid = intval($_GET['public']);
    $status = 1;

    $sql = "UPDATE tblblooddonars SET Status='$status' WHERE id='$aeid'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error());
    $row = mysqli_fetch_array($result);
    $msg= "Booking Successfully Confirmed";
  }
  if(isset($_REQUEST['del'])){
    $did = intval($_GET['del']);
    $sql = "DELETE FROM tblblooddonars WHERE id='$did'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error());
    $row = mysqli_fetch_array($result);

    $msg = "Recode Deleted Successfully";
  }



 ?>






<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimun-scale=1,maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name=theme-color content="#3e454c">
    <title>BBDMS | Donor List</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css" integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css" integrity="sha512-sopmFEmRVsWt542K+yzH3FQ1KJfdosOJG+bGLs9ZJT07b/3gUxRA9ICuJg2JtoZ9WeknAUuwJ0ggnmrV1YL6kQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.2/css/fileinput.min.css" integrity="sha512-optaW0zX5RBCFqhNsmzGuHHsD/tdnCcWl8B0OToMY01JVeEcphylF9gCCxpi4BQh0LY47BkJLyNC1J7M5MJMQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/awesome-bootstrap-checkbox/1.0.2/awesome-bootstrap-checkbox.css" integrity="sha512-JqwGPaxnUk6gZF4m9ha/7/D+1d+TjY3Luy6s9Ys1C0yqvnfea5VF0Y3GGIRkLarVsBLENzqjaqIYL3WSllPfgw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <style media="screen">
      .errorWrap{
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow : 0 1px 1px 0 rgba(0,0,0,.1);
        box-shadow: 0 1px 1px 0  rgba(0,0,0,.1);
      }
      .succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
  </head>
  <body>

    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
      <?php include('includes/leftbar.php');  ?>
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12">
            <h2 class="page-title">Donor List</h2>
                <div class="panel panlel-default">
                  <div class="panel-heading">
                    Donors Info
                  </div>
                  <div class="panel-body">
                    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
                  				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                    <a href="download-records.php" style="color:red; font-size:16px;">Download Donor List</a>
                   <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                     <thead>
                       <tr>
                         <th>#</th>
                         <th>Name</th>
                         <th>Mobile No</th>
                         <th>Email</th>
                         <th>Age</th>
                         <th>Gender</th>
                         <th>Blood Group</th>
                         <th>address</th>
                         <th>Message</th>
                         <th>action</th>
                       </tr>
                     </thead>
                     <tfoot>
                       <tr>
                         <th>#</th>
                         <th>Name</th>
                         <th>Mobile No</th>
                         <th>Email</th>
                         <th>Age</th>
                         <th>Gender</th>
                         <th>Blood Group</th>
                         <th>address</th>
                         <th>Message</th>
                         <th>action</th>
                       </tr>
                     </tfoot>
                     <tbody>

<?php
   $sql = "SELECT * FROM tblblooddonars";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result);

   if($row >0){
     ?>
     <tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($FullName);?></td>
											<td><?php echo htmlentities($MobileNumber);?></td>
											<td><?php echo htmlentities($EmailId);?></td>
											<td><?php echo htmlentities($Gender);?></td>
											<td><?php echo htmlentities($Age);?></td>
											<td><?php echo htmlentities($BloodGroup);?></td>
											<td><?php echo htmlentities($Address);?></td>
											<td><?php echo htmlentities($Message);?></td>


										<td>
                      <?php
                      if($status==1){?>
                        <a href="donor-list.php?hidden=<?php echo htmlentities($id);?>" onclick="return confirm('Do you really want to hiidden this detail')"> Make Hidden</a>
                    <?php  } else {?>
                      <a href="donor-list.php?public=<?php echo htmlentities($id);?>" onclick="return confirm('Do you really want to Public this detail')"> Make Public</a>

                    <?php} ?>
                    <a href="donor-list.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to delete this record')"> Delete</a>
                  </td>

                  										</tr>
                  										<?php $cnt=$cnt+1; }} ?>









                     </tbody>
                   </table>

                  </div>
                </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap.min.js" integrity="sha512-F0E+jKGaUC90odiinxkfeS3zm9uUT1/lpusNtgXboaMdA3QFMUez0pBmAeXGXtGxoGZg3bLmrkSkbK1quua4/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js" integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.1/js/fileinput.min.js" integrity="sha512-oFapsmPUaTOIpqTpl5sED2oFCxTFP8Y1VUrd0eGeN9BAPlNNl5J5FqKN6VhgxUgWUqJPJh0ZlcfWMkRM+fiT1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script type="text/javascript" src="js/main.js">
  </body>
</html>
<?php }?>
