<?php
include ('config.php');

$id=$_GET['id'];
$cover=$_GET['covers'];
$book_file=$_GET['book_files'];

$del=new Post();
$del->deletePosts($id,$cover,$book_file);

