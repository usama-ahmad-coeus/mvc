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

    function add($name,$email,$department,$salary,$password,$boss,$designation,$file)
    {
        //$user = new AddModel($name);
        //check against database ,does login
        if($this->authenticate_add($name,$email,$department,$salary,$password,$boss,$designation,$file)) {
            return true;
        } else {
            return false;
        }
    }

    static function authenticate_add($name,$email,$department,$salary,$password1,$boss,$designation,$file) {
      $n =  $name;
      $em = $email;
      $dep = $department;
      $sal =  $salary;
      $pas =  $password1;
        $boss=$boss;
        $dest=$designation;
        $file=$file;
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
            $sql = "insert into Users(email,name ,department,salary,password,image,boss,destination,timein,timeout) values('$n' ,'$em' ,'$dep' ,'$sal' ,'$pas','$file','$boss','$dest',0,0)";
            mysqli_query($conn, $sql);
            $authenticating = true;
            mysqli_close($conn);
            }
            return $authenticating;
        }
   }

?>