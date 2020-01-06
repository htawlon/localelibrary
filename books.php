
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
    <link href="bst/css/bootstrap_dataTable.css" rel="stylesheet">

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
              <span class="glyphicon glyphicon-book"></span> Books
              <a class="pull-right" href="new-book.php" style="color: white"><span class="glyphicon glyphicon-plus-sign"> </span> New Book</a>
          </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="userTable">
                       <thead>
                        <tr>

                            <td> Images</td>
                            <td> Files </td>
                            <td> Title</td>
                            <td> Author</td>
                            <td> Category</td>
                            <td> Action</td>

                        </tr>
                       </thead>

                        <?php
                        include 'config.php';
                        $obj=new Post();
                        $books=$obj->getBooks();
                        foreach ($books as $b):
                        ?>

                        <tr>
                            <td class="col-xs-1"> <img src="covers/<?php echo $b['cover']?>" class="img-responsive"> </td>
                            <td><a target="_blank" href="book_files/<?php echo $b['book_file']?>" class="btn btn-link"> Download </a> </td>
                            <td> <?php echo $b['title']?></td>
                            <td> <?php echo $b['author']?></td>
                            <td><?php echo $b ['category_name']?>  </td>

                            <td>
                                <a href="edit-book.php?id=<?php echo $b['id']?>" class="text-primary "><i class="glyphicon glyphicon-edit"></i>


                            </td>


                            <td>


                                <a href="#" data-toggle="modal" data-target="#d<?php echo $b['id'] ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                <div id="d<?php echo $b['id'] ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog modal-sm" role="document">

                                        <div class="modal-content">
                                            <form action="delete_book.php" method="post">

                                                <input type="hidden" name="id" value="<?php echo $b['id'] ?>">
                                                <div class="modal-header">
                                                    Delete Book
                                                </div>



                                                <div class="modal-body">

                                                    <p> Are you sure to Delete <em><strong><?php echo  $b['category_name'] ?> </strong></em>   ? </p>

                                                </div>





                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                                    <a class="btn btn-primary" href="delete_book.php?id=<?php echo $b['id'] ?>& covers=<?php echo $b['cover']?>&book_files=<?php echo $b['book_file']?>"> Agree </a>
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

                    </table>

                </div>


            </div>
        </div>




      </div>

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
</html>