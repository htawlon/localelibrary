<?php
session_start();
class Post
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

    public function newCategory($category_name){
        $sql="insert into category (category_name) values ('$category_name')";
        $this->db->query($sql);
        $_SESSION['info']="The category has been created.";
        header("location: category.php");
}

public  function updateBook($id, $title, $author, $category_id, $cover, $book_file){
        if((!empty($cover['name']))&&(!empty($book_file['name']))){

            $old_sql="select cover,book_file from books where id='$id'";
            $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
            $old_cover=$old_row['cover'];
            $old_book_file=$old_row['book_file'];

            unlink("covers/$old_cover");
            unlink("book_files/$old_book_file");

            $cover_name=date('d-m-y-h-i-s').$cover['name'];
            $cover_tmp=$cover['tmp_name'];

            $book_file_name=date('d-m-y-h-i-s').$book_file['name'];
            $book_file_tmp=$book_file['tmp_name'];

             $sql="update books set  cover='$cover_name', book_file='$book_file_name', title='$title', author='$author', category_id='$category_id' where id='$id'";




             move_uploaded_file($cover_tmp,"covers/$cover_name");
             move_uploaded_file($book_file_tmp,"book_files/$book_file_name");






        }elseif (!empty($cover['name'])){


            $old_sql="select cover from books where id='$id'";
            $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);
            $old_cover=$old_row['cover'];


            unlink("covers/$old_cover");


            $cover_name=date('d-m-y-h-i-s').$cover['name'];
            $cover_tmp=$cover['tmp_name'];



            $sql="update books set  cover='$cover_name', title='$title', author='$author', category_id='$category_id' where id='$id'";




            move_uploaded_file($cover_tmp,"covers/$cover_name");





        }elseif(!empty($book_file['name'])){

            $old_sql="select book_file from books where id='$id'";
            $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);

            $old_book_file=$old_row['book_file'];


            unlink("book_files/$old_book_file");



            $book_file_name=date('d-m-y-h-i-s').$book_file['name'];
            $book_file_tmp=$book_file['tmp_name'];

            $sql="update books set book_file='$book_file_name', title='$title', author='$author', category_id='$category_id' where id='$id'";





            move_uploaded_file($book_file_tmp,"book_files/$book_file_name");






        }else{

            $sql="update books set title='$title', author='$author', category_id='$category_id' where id='$id'";


        }
        $this->db->query($sql);
    $_SESSION['info']="The selected book has been updated";
    header("location: books.php");



}


public function getBooks(){
        $sql="select category.category_name, books.* from books left join category on category.id=books.category_id order by id desc ";
        return $this->db->query($sql);


}

public function getBooksforDB(){
        $sql="select * from books";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
    public function getCategoryforDB(){
        $sql="select * from category";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUserforDB(){
        $sql="select * from users";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

public function getBookOne ($id){
        $sql="select * from books where id='$id'";
        return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

}


public function newBook($title, $author, $category_id, $cover, $book_file) {
 $cover_name=date('d-m-y-h-i-s').$cover['name'];
 $cover_tmp=$cover['tmp_name'];

    $book_file_name=date('d-m-y-h-i-s').$book_file['name'];
    $book_file_tmp=$book_file['tmp_name'];

   $sql="insert into books (title, author, category_id, cover, book_file, uploaded_at)
         values ('$title' ,'$author', '$category_id','$cover_name', '$book_file_name',now() )";
   $this->db->query($sql);

   move_uploaded_file($cover_tmp,"covers/$cover_name");
   move_uploaded_file($book_file_tmp,"book_files/$book_file_name");


    $_SESSION['info']="A new book has been uploaded.";
   header("location: new-book.php");


}

    public function deletePosts($id,$cover,$book_file)
    {
        unlink("covers/$cover");
        unlink("book_files/$book_file");

        $sql = "delete from books where id='$id'";
        $this->db->query($sql);

        $_SESSION['info'] = "The post have been successfully deleted";
        header("location: books.php");
    }


    public function updateCategory($id, $category_name){
        $sql="update category set category_name='$category_name' where id='$id'";
        $this->db->query($sql);
        $_SESSION['info']="A category name has been updated.";
        header("location: category.php");
    }

    public function deleteCategory($id){

        $sql="delete from category where id='$id'";
        $this->db->query($sql);
        $_SESSION['info']="The category name have been successfully deleted";
        header("location: category.php");
    }

    public function getCategory(){
        $sql="select * from category";
        return $this->db->query($sql);
    }





}