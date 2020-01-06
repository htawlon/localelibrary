<?php
session_start();


class User
{

    public $db;

    public function __construct()
    {

        try {
            $this->db = new PDO('mysql:host=localhost; dbname=newlibrary', 'root', 'root');

        } catch (PDOException $e) {

            die("connection failed to database");
        }
    }


    public function resetUserPassword($id,$password,$confirm_password){

        if($password==$confirm_password){


            $enc_password=md5($password);
            $sql="update users set password='$enc_password' where id='$id'";
            $this->db->query($sql);
            $_SESSION['info']="Your password has been changed! ";
            header("location: users.php");


        }else
            $_SESSION['err']="Please ensure that your passwords match ! ";
        header("location: users.php");


    }
    public function removeUser($id){
        $sql="delete from users where id='$id'";
        $this->db->query($sql);
        header("location: users.php");

    }


    public function getAllUsers(){


        $sql="select * from users order by id desc ";
        return $this->db->query($sql);

    }

    public function getProfile(){

        $id=$_SESSION['id'];
        $sql="select * from users where id='$id'";
        return $this->db->query($sql);

    }



    public function login($email, $password){

        $old_sql="select * from users where email='$email'";
        $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);

        if(!empty($old_row)){

            $enc_password=md5($password);
            $db_password=$old_row['password'];


           if($enc_password==$db_password) {
               if($old_row['role']){

                   $_SESSION['admin']=true;

               }


               $name=$old_row['name'];
               $_SESSION['login']=$name;
               $_SESSION['id']=$old_row['id'];
               header("location: library-dashboard.php");





            } else{$_SESSION['err']="Invalid password! ";
                    header("location: signin.php");


            }
        }else{$_SESSION['err']="The selected email was not found!";
        header("location: signin.php");


        }




        }


    public function register($name, $email, $password, $confirm_password){

        $old_sql="select email from users where email='$email'";
        $old_row=$this->db->query($old_sql)->fetch(PDO::FETCH_ASSOC);

        if(empty($old_row)){

            if($password==$confirm_password){
                $enc_password=md5($password);
                $sql="insert into users (name,email,password,created_at)
                    value ('$name','$email','$enc_password',now())";
                $result=$this->db->query($sql);

                if(!result){
                    $_SESSION['err']="the user acc created failed";
                    header("location: register.php");

                }else{

                    $_SESSION['info']="acc hv been created";
                    header("location: register.php");
                }
                
            }else{

                $_SESSION['err']="password must match";
                header("location: register.php");
            }
        }else{

            $_SESSION['err']="this email is in use";
            header("location: register.php");
        }

    }


}