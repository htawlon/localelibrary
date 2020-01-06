<?php
include ('config.php');

$id=$_POST['id'];

$c=new Post();
$c->deleteCategory($id);
