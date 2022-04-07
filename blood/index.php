<?php

include('includes/config.php');

 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blood And Donor Management System</title>
    <link rel="stylesheet" href="css/modern-business.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style media="screen">
      .navbar-toggler{
        z-index: 1;
      }
      @media (max-width:576px){
        nav > .container{
          width : 100%;
        }
      }
      .carousel-item.active,
      .carousel-item-next,
      .carousel-item-prev{
        display : block;
      }
    </style>
  </head>
  <body>

    <?php
       include('includes/header.php');
     ?>
     <?php
      include('includes/slider.php');
      ?>



    <div class="container">
      <h1 class="my-4">Welcome to BloodBank And Donor Management System</h1>

      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card">
            <h4 class="card-header">The need for blood</h4>
            <a href="#"><img src="images/blood-donor.jpg" class="card-img-top img-fluid" alt=""></a>

            <p class="card-text" style="padding-left:2%">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

          </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card">
              <h4 class="card-header">Blood Tips</h4>
              <a href="#"><img src="images/blood-donor.jpg" class="card-img-top img-fluid" alt=""></a>

              <p class="card-text" style="padding-left:2%">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card">
            <h4 class="card-header">Who you could help</h4>
            <a href="#"><img src="images/blood-donor.jpg" class="card-img-top img-fluid" alt=""></a>

            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
      </div>

      <h2>Some of the Donor</h2>


       <div class="row">

         <?php
            $status=1;
            $fullname = $_POST['FullName'];
            $gender = $_GET['Gender'];
            $bloodgroup = $_GET['BloodGroup'];
            $sql = ("SELECT * FROM tblblooddonars WHERE id='$status'  LIMIT 6");
            $result = mysqli_query($conn,$sql) or die( mysqli_error($conn));
            $rows = mysqli_fetch_array($result);
            if($rows> 0){
              foreach ($rows as $row) {
                ?>
                // code...
                <div class="col-lg-4 col-sm-6 portfolio-item">
                  <div class="card h-100">
                    <a href="#"><img src="images/blood-donor.jpg" class="card-img-top img-fluid" alt=""></a>
                    <div class="card-block">
                      <h4 class="card-title"><a href="#"><?php echo ($fullname); ?></a></h4>
                      <p class="card-text"><b> Gender :</b><?php echo ($gender); ?></p>
                      <p class="card-text"><b>Blood Group :</b><?php echo ($bloodgroup); ?></p>
                    </div>
                  </div>
                </div>

              <?php  }}?>



       </div>


      <div class="row">
        <div class="col-lg-6">
          <h2>BLOOD GROUPS</h2>
          <p> blood groups of any human being will fall in anyone of the following groups.</p>
          <ul>
            <li>A positive or A negative</li>
            <li>B positive or B negative</li>
            <li>AB positive or AB negative</li>
          </ul>
          <p>A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to ear prior to your donation.</p>

        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="images/blood-donor (1).jpg" alt="">
        </div>
      </div>

      <hr>

      <div class="row mb-4">
        <div class="col-md-8">
          <h4>UNIVERSAL DONORS AND RECIPENTS</h4>
          <p>
            The most common blood type is O, followed by type A.

            Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. Those with type AB blood are called "universal recipients" because they can recieve blood of any type.
          </p>

        </div>
      </div>
    </div>
     <?php
       include('includes/footer.php');
      ?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js" integrity="sha512-X7kCKQJMwapt5FCOl2+ilyuHJp+6ISxFTVrx+nkrhgplZozodT9taV2GuGHxBgKKpOJZ4je77OuPooJg9FJLvw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>
</html>
