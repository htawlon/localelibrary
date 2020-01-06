<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>store | login</title>


    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>



<?php include "navbar.php" ?>


<div class="container">

    <div class="row">

        <p></p>

        <div class="col-sm-6 col-sm-offset-3">




            <h4 class="text-center" style="color:white;background: steelblue; line-height: 40px;border-radius: 40px"> The Little Sanctuary Library</h4>


            <?php
            session_start();
            if(isset($_SESSION['err'])){

                ?>
                <div class="alert alert-danger"><?php echo $_SESSION['err']?> </div>
                <?php

            }
            unset($_SESSION['err']);  
            ?>
            <br><br>

                <form method="post" action="post_login.php">
                <div class="form-group">
                    <label for="email" class="control-label"> Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label"> Password</label>
                    <input type="password" name="password" id="password"  class="form-control" required>
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-primary btn-lg"> Signin </button>
                </div>





            </form>


            Dont hv an acc? <a href="register.php">  Signup <span class="glyphicon glyphicon-registration-mark"> </span> </a>

        </div>


    </div>


</div>
<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>
</body>
</html>