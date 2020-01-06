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
include 'config.php';

$title=$_POST['title'];
$author=$_POST['author'];
$category_id=$_POST['category_id'];
$cover=$_FILES['cover'];
$book_file=$_FILES['book_file'];
$book=new Post();
$book->newBook($title, $author, $category_id, $cover, $book_file);


?>



