
<?php
include 'frontend-config.php';

$genre=new Elib();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library| index </title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>


<div class="container-fluid">
<?php include 'navbar.php'?>


    <div class="row">
        <div class="col-sm-2">

            <form method="get" action="index.php">
                <div class="form-group">
                    <div class="input-group">
                        <input type="search" name="q" placeholder="search books by title" class="form-control">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-search"> </i>

                        </span>

                    </div>
                </div>

            </form>
            <?php include 'menu.php';



            ?>

        </div>
        <div class="col-sm-10">
          <p> <i class="glyphicon glyphicon-book"> </i> Available Books </p>
            <div class="row">



                <?php
                if($_GET['q']){
                    $q=$_GET['q'];
                    $books=$genre->getBookSearch($q);
                }elseif($_GET['cat']){
                    $category_id=$_GET['cat'];
                    $books=$genre->getBookByCategory($category_id);

                }else{


                    $books=$genre->getAllBooks();

                }

                foreach ($books as $bo){

                 ?>
                    <div class="col-sm-3">
                        <div class="thumbnail">

                            <img src="covers/<?php echo $bo['cover']?>" class="img-responsive img-rounded">
                            <h4 class="text-center text-primary"> <?php echo $bo['title']?> </h4>

                            <p class="text-center"><small> Author</small>: <?php echo $bo['author']?> </p>
                            <p class="text-center"><small> Genre</small>: <?php echo $bo['category_name']?> </p>
                            <?php if(isset($_SESSION['login'])){?>

                            <a class="btn btn-primary btn-block" target="_blank" href="book_files/<?php echo $bo['book_file']?>"> Download</a>

                            <?php

                            }

                            ?>
                        </div>

                    </div>

                    <?php
                }

                ?>


            </div>




        </div>

    </div>


</div>

<div class="panel panel-default">
    <div class="panel panel-footer text-center" style="padding: 50px">

      Copyright &copy; <?php echo date("Y")?> Department of Electronic Engineering <br> (Mawlamyine Technological University)  <br> All rights reserved.

    </div>


</div>



<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>
</body>
</html>