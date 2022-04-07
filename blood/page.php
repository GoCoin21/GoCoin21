<?php
//session_start();
include('includes/config.php');
 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <meta name="author" content="">
    <title>Moder Business - Start Bootstrap Template</title>
    <link rel="stylesheet" href="css/modern-business.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style media="screen">
      .navbar-toggler{
        z-index: 1;
      }
      @media (max-width : 576px){
        nav > .container{
          width : 100%;
        }
      }
    </style>

  </head>

  <body>
  <?php include('includes/header.php'); ?>
  <?php include('includes/slider.php'); ?>

    <div class="container">

      <?php
       $id = $_GET['id'];
       $sql = "SELECT type from tblpages where id='$id'";
       $result = mysqli_query($conn,$sql)or die( mysqli_error($conn));
      $row = mysqli_fetch_array($result);
      $count = mysqli_num_rows($result);
      if($count == 1){
        $rows = mysqli_fetch_assoc($result);
        $fullname = $rows['PageName'];
        $det = $row['detail'];

          ?>
          <h1 class="mt-4 mb-3"><?php echo ($fullname); ?></h1>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active"><?php echo ($fullname); ?></li>
          </ol>
          <p><?php echo $det; ?></p>
        </div>
    <?php
  }


       ?>

  <?php include('includes/footer.php'); ?>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js" integrity="sha512-X7kCKQJMwapt5FCOl2+ilyuHJp+6ISxFTVrx+nkrhgplZozodT9taV2GuGHxBgKKpOJZ4je77OuPooJg9FJLvw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>
</html>
