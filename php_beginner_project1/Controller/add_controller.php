<?php

class AddController {

    function AddController()
    {
        //constructor
    }

    function  create($usename, $password, $email)
    {
        //create user in database
    }

    function add($email, $name, $department, $salary, $password, $boss, $designation, $file,$date)
    {
        //$user = new AddModel($name);
        //check against database ,does login
        if($this->authenticate_add($email, $name, $department, $salary, $password, $boss, $designation, $file,$date)) {
            return true;
        } else {
            return false;
        }
    }
    function edit_add($email, $name, $department, $salary, $password, $boss, $designation,$image)
    {
        //$user = new AddModel($name);
        //check against database ,does login
        if($this->authenticate_edit_add($email, $name, $department, $salary, $password, $boss, $designation,$image)) {
            return true;
        } else {
            return false;
        }
    }

    static function authenticate_add($email,$name,$department,$salary,$password1,$boss,$designation,$file,$date) {
      $n =  $name;
      $em = $email;
      $dep = $department;
      $sal =  $salary;
      $pas =  $password1;
        $boss=$boss;
        $dest=$designation;
        $file=$file;
        $date=$date;
        $authenticating = false;
        //check against db
        $servername = "localhost";
        $usernamedb = "root";
        $password = "coeus123";
        $dbname = "php_medium_level_MVC";
        // Create connection
        $conn = mysqli_connect($servername, $usernamedb, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            //echo "usama";die();
            $sql = "insert into Users(email,name ,department,salary,password,image,boss,destination,timein,timeout,date) values('$em','$n' ,'$dep' ,'$sal' ,'$pas','$file','$boss','$dest',0,0,'$date')";
            mysqli_query($conn, $sql);
            $authenticating = true;
            mysqli_close($conn);
            }
            return $authenticating;
        }

    static function authenticate_edit_add($email, $name, $department, $salary, $password, $boss, $designation,$image) {
        $n =  $name;
        $em = $email;
        $dep = $department;
        $sal =  $salary;
        $pas =  $password;
        $bos=$boss;
        $dest=$designation;
        $file=$image;
        $authenticating = false;
        //check against db
        $servername = "localhost";
        $usernamedb = "root";
        $password = "coeus123";
        $dbname = "php_medium_level_MVC";
        // Create connection
        $conn = mysqli_connect($servername, $usernamedb, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            //echo "usama";die();
            $sql = "update  Users
set email='$em',
name='$n' ,
department='$dep',
salary='$sal',
password='$pas',
image='$file',
boss='$bos',
destination='$dest'
 where id =2";
            mysqli_query($conn, $sql);
            $authenticating = true;
            mysqli_close($conn);
        }
        return $authenticating;
    }

   }

?>