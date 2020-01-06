<?php
session_start();
include ('auth.php');
include "user_config.php";
$user=new User();
$u=$user->getProfile()->fetch(PDO::FETCH_ASSOC);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>store /profile</title>

    <link href="bst/css/bootstrap.css" rel="stylesheet">

</head>
<body>
<?php include"navbar.php"?>



<div class="container-fluid">
    <div class="row">

        <div class="col-sm-12 col-sm-offset-2">
            <h2 style="background: #1b6d85 ;text-align: center ;border-radius: 30px;color: white"> <?php if($_SESSION['admin']){echo "Administrator";} ?></h2>
            <h2 style="background: #1b6d85 ;border-radius: 30px;text-align: center ;color: white"> <?php if(!$_SESSION['admin']){echo "Standard User";} ?></h2>
            <h3 style="text-align: center;margin-top: 100px" ><span class="glyphicon glyphicon-user"> </span> User Profile</h3>


            <hr>
        <div class="text-center" style="margin-top: 80px">
                <p> <span class="glyphicon glyphicon-ok-circle"> </span><b> User Name:  </b>    <em><?php echo $u['name']?></em></p>
                <hr>
                <p> <span class="glyphicon glyphicon-home"> </span><b> Email Address : </b> <em><?php echo $u['email']?></em></p>
                <hr>
                <p> <span class="glyphicon glyphicon-star"> </span> <b> Identification No :</b>  <em><?php echo $u['id']?></em></p>
                <hr>

                <p> <span class="glyphicon glyphicon-registration-mark"> </span><b> Registration Date:</b> <em><?php  echo date("d-m-Y h:i A",strtotime('created_at'))?></em></p>

        </div>


        </div>

    </div>


</div>






<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>

</body>
</html>