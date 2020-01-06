<?php
include ("config.php");

$category_name=$_POST['category_name'];

$p=new Post();
$p->newCategory($category_name);

