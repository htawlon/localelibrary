<?php
session_start();
class Elib
{
    public $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost; dbname=newlibrary', 'root', 'root');

        } catch (PDOException $e) {
            die("Connection failed to database server.");
        }

    }

   public function getAllCategory(){
       $sql="select * from category";
       return $this->db->query($sql);

   }
    public function getAllBooks(){
        $sql="select books.*, category.category_name from books left join category on category.id=books.category_id order by id desc ";
        return $this->db->query($sql);

    }

    public function getBookByCategory($category_id){
        $sql="select books.*, category.category_name from books left join category on category.id=books.category_id where category_id='$category_id' order by id desc ";
        return $this->db->query($sql);

    }


    public function getBookSearch($q){
        $sql="select books.*, category.category_name from books left join category on category.id=books.category_id where title like '%$q%' order by id desc ";
        return $this->db->query($sql);

    }

}