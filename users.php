<?php
session_start();
if (isset($_SESSION['login'])){


    if(!isset($_SESSION['admin'])){

        header("location: library-dashboard.php");
        exit;

    }

}else{

    header("location: signin.php");
    exit();
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library | usermanagement</title>

    <link href="bst/css/bootstrap.css" rel="stylesheet">
    <link href="bst/css/bootstrap_dataTable.css" rel="stylesheet">


</head>
<body>
<?php include"navbar.php"?>

<div class="container">
    <div class="row">

        <?php
        if(isset($_SESSION['err'])){
            ?>
            <div class="alert alert-danger"> <?php echo $_SESSION['err']?></div>
            <?php
        }
        unset($_SESSION['err'])
        ?>

        <?php
        if(isset($_SESSION['info'])){
            ?>
            <div class="alert alert-success"> <?php echo $_SESSION['info']?></div>
            <?php
        }
        unset($_SESSION['info'])
        ?>
        <h3 style="background: #1b6d85;color: white;text-align: center;line-height: 60px;border-radius: 30px;margin-bottom: 50px"> <span class="glyphicon glyphicon-user"></span>   Available Users </h3>


        <table class="table table-hover" id="userTable">

            <thead>
            <tr>
                <td>User ID</td>
                <td> Name</td>
                <td> Email</td>
                <td> Role</td>
                <td> Join Date</td>
                <td> Actions</td>

            </tr>

            </thead>
            <?php
            include 'user_config.php';
            $users=new User();
            $user=$users->getAllUsers();
            foreach($user as $u):
            ?>

            <tr>
                <td> <?php echo $u['id']?></td>
                <td> <?php echo $u['name']?></td>
                <td> <?php echo $u['email']?></td>
                <td> <?php if($u['role']){echo "admin";}else{echo "standard";} ?></td>
                <td> <?php echo date("d-m-Y h:i A",strtotime('created_at'))?></td>
                <td>
                    <a href="#" data-toggle="modal"  data-target="#e<?php echo $u['id']?>" title="reset password"><span class="glyphicon glyphicon-refresh"></span></a>


                    <div id="e<?php echo $u['id']?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <form method="post" action="user_password_reset.php">

                                    <input type="hidden" name="user_id" value="<?php echo $u['id']?>">

                                    <div class="modal-header">

                                        Reset Password for <b> <?php echo $u['name']?></b>
                                    </div>
                                    <div class="modal-body" >

                                        <div class="form-group">
                                            <label for="new_password">New Password </label>
                                            <input required type="password" name="new_password" id="new_password" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="confirm_new_password">Confirm New Password </label>
                                            <input required type="password" name="confirm_new_password" id="confirm_new_password" class="form-control">
                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel </button>
                                            <button type="submit" class="btn btn-primary">Reset </button>
                                        </div>

                                </form>
                            </div>
                        </div>

                    </div>
    </div>


    <?php if(!$u['role']){
        ?>
        <a href="#" data-toggle="modal" data-target= "#d<?php echo $u['id']?>" title="remove" class="text-danger"><span class="glyphicon glyphicon-trash"></span></a>
        <?php

    }?>

    <div id="d<?php echo $u['id']?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">

                    Confirm
                </div>
                <div class="modal-body text-center text-warning" >
                    <span class="glyphicon glyphicon-alert"> </span>

                    <div>
                        are you sure to delete user <b> <?php echo $u['name'] ?></b>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel </button>

                        <a href="remove_user.php?id= <?php echo $u['id']?> " class="btn btn-primary"> Agree</a>

                    </div>
                </div>
            </div>
        </div>
    </div>



    </td>


    </tr>


    <?php


    endforeach;
    ?>

    </table>


</div>

</div>




<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>

<script src="bst/js/jquery_dataTable.js"></script>
<script src="bst/js/bootstrap_dataTable.js"></script>

<script>
    $(function () {

        $("#userTable").dataTable();

    })
</script>



</body>
