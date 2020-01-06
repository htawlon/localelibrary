
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
    <title>Library| Books </title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">

</head>
<body>
<?php include 'navbar.php'?>


<div class="container-fluid">


    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">

            <?php
            session_start();
            if(isset($_SESSION['err'])){

                ?>
                <div class="alert alert-danger" style="border-radius: 30px;text-decoration-color: white"><?php echo $_SESSION['err']?> </div>
                <?php

            }
            unset($_SESSION['err']);

            ?>


            <?php

            if(isset($_SESSION['info'])){
                ?>

                <div class="alert alert-success"><?php echo $_SESSION['info']?> </div>
                <?php

            }
            unset($_SESSION['info']);

            ?>


        </div>


        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">

                    <span class="glyphicon glyphicon-book"></span> New Book
                    <a class="pull-right" href="books.php" style="color: white"><span class="glyphicon glyphicon-book"> </span> Books</a>
                </div>

                 <div class="panel-body">
                <div class="col-sm-6 col-sm-offset-3">
                    <form enctype="multipart/form-data" method="post" action="post_book.php">
                        <div class="form-group">
                            <label for="title" > Book Title </label>
                            <input required type="text" name="title" id="title" class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="author" > Book Author </label>
                            <input required type="text" name="author" id="author" class="form-control">

                        </div>

                        <div class="form-group">
                            <label for="category_id"> Category </label>
                            <select required name="category_id" id="category_id" class="form-control">
                                <option value=""> Select Category</option>
                                <?php
                                include 'config.php';
                                $products=new Post();
                                $cats=$products->getCategory();
                                foreach ($cats as $c){

                                    ?>
                                    <option value="<?php echo $c['id']?>"><?php echo $c['category_name']?> </option>


                                    <?php
                                }
                                ?>


                            </select>


                        </div>


                        <div class="row">
                           <div class="col-sm-6">

                               <div class="form-group">
                                   <label for="cover" > Book Cover</label>
                                   <input  style="height: auto" required type="file" name="cover" id="cover" class="form-control">

                               </div>


                           </div>

                           <div class="col-sm-6">



                               <div class="form-group">
                                   <label for="book_file" > Book File</label>
                                   <input  style="height: auto" required type="file" name="book_file" id="book_file" class="form-control">

                               </div>






                           </div>

                       </div>



                        <div class="form-group">

                            <button type="submit" class="btn btn-primary btn-lg" >  Save </button>

                        </div>




                    </form>
                </div>

                </div>
            </div>

        </div>

    </div>




</div>



<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>




</body>
</html>