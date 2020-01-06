<?php
session_start();

include "auth.php";

include "config.php";

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>category</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">

</head>
<body>

<?php include "navbar.php"?>
<div class="container">

    <?php
    if(isset($_SESSION['info'])) {
        ?>
        <div class="alert alert-success"><?php echo $_SESSION['info'] ?></div>
        <?php
    }
    unset($_SESSION['info'])
    ?>

<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-heading"><span class="glyphicon glyphicon-plus"> New Category </span></div>
            <div class="panel-body">

                <form method="post" action="post_category.php">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input required type="text" name="category_name" id="category_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>

        </div>


    </div>
    <div class="col-sm-8">
        <div class="panel panel-primary">
            <div class="panel-heading"><span class="glyphicon glyphicon-list"></span> Categories </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tr>
                        <td>ID</td>
                        <td>Category Name</td>
                        <td>Actions</td>
                    </tr>
                    <?php

                    $cats=new Post();
                    $row=$cats->getCategory();
                    foreach ($row as $c):
                    ?>
                    <tr>
                        <td><?php echo $c['id'] ?></td>
                        <td><?php echo $c['category_name'] ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#e<?php echo $c['id'] ?>"><span class="glyphicon glyphicon-edit"></span></a>
                            <div id="e<?php echo $c['id'] ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <form action="update_category.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $c['id'] ?>">
                                            <div class="modal-header">
                                                Update Category
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="category_name">Category Name</label>
                                                    <input value="<?php echo $c['category_name'] ?>" type="text" name="category_name" id="category_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>


                            <a href="#" data-toggle="modal" data-target="#d<?php echo $c['id'] ?>"><span class="glyphicon glyphicon-trash"></span></a>
                            <div id="d<?php echo $c['id'] ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <form action="delete_category.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $c['id'] ?>">
                                            <div class="modal-header">
                                                Delete Category
                                            </div>
                                                      <p> Are you sure to Delete <em><strong><?php echo  $c['category_name'] ?> </strong></em>   ? </p>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-info">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                    <?php
                    endforeach;
                    ?>


    </div>


</div>

</div>

<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>

<script>
    $(function () {
        setTimeout(function () {
            $(".alert").fadeOut();

        }, 2000)

    })

</script>

</body>
</html>