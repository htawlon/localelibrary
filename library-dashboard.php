
<?php

session_start();


include "auth.php";
include "config.php";
$books=new Post();
$b=$books->getBooks();
$c=$books->getCategoryforDB();
$u=$books->getUserforDB();


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library | Dashboard</title>
    <link href="bst/css/bootstrap.css" rel="stylesheet">
</head>
<body>

<?php include "navbar.php" ?>

<div class="container-fluid">


     <div class="row">
         <div class="col-sm-4">

             <div class="panel panel-primary">
                 <div class="panel-body">
                     <div class="page-header">
                         <h3> <i class="glyphicon glyphicon-book"> </i> Books<small class="pull-right"><span class="badge"> <?php echo count($b) ?> </span> items </small></h3>
                     </div>

                         <a href="books.php" style="display: block"> More>> </a>


                 </div>
             </div>

         </div>
         <div class="col-sm-4">

             <div class="panel panel-primary">
                 <div class="panel-body">
                     <div class="page-header">
                         <h3> <i class="glyphicon glyphicon-book"> </i> Category<small class="pull-right"><span class="badge"> <?php echo count($c) ?> </span> items </small></h3>
                     </div>

                     <a href="books.php" style="display: block"> More>> </a>


                 </div>
             </div>

         </div> <div class="col-sm-4">

             <div class="panel panel-primary">
                 <div class="panel-body">
                     <div class="page-header">
                         <h3> <i class="glyphicon glyphicon-book"> </i> Users<small class="pull-right"><span class="badge"> <?php echo count($u) ?> </span> </small></h3>
                     </div>

                     <a href="books.php" style="display: block"> More>> </a>


                 </div>
             </div>

         </div>



     </div>


</div>


<script src="bst/js/jquery.js"></script>
<script src="bst/js/bootstrap.js"></script>
</body>
</html>