<?php
session_start();

require_once('Controller/login_controller.php');
require_once('Controller/add_controller.php');
require_once('Model/login_model.php');
require_once('Model/add_model.php');
require_once('Controller/add_time_controller.php');

$op = $_REQUEST['op'];
$user_controller = new LoginController();
$add_controller = new AddController();
$add_time_controller = new AddTimeController();
switch ($op) {
    case  'login':
        $name = $_POST['name'];
        $password = $_POST['password'];
        $_SESSION['variable'] = $name;
       $connect = mysqli_connect("localhost", "root", "coeus123", "php_medium_level_MVC");
        $query = "SELECT destination FROM Users where name ='$name'";
        $result = mysqli_query($connect, $query);
        $values = mysqli_fetch_assoc($result);

        $designation = $values['destination'];
        $_SESSION['designation'] =  $designation;
        //$r = $_GET['$userr'];
           //echo $name;die();
        if ($user_controller->login($name, $password)) {//true or false
            header("Location:Views/dashboard.php");//for true
        } else header("Location:Views/login.php?err=1");
        break;
    case  'add':
        $name = $_POST['name1'];
        $email = $_POST['email1'];
        $department = $_POST['department1'];
        $salary = $_POST['salary1'];
        $password = $_POST['password1'];
        $boss = $_POST['boss'];
        $designation = $_POST['designation'];
        $date= $_POST['date'];

            //require 'fileupload.php?var=$file';//get $variable = $_GET["var"]// for upload to folder
        $file = $_FILES['file']['name'];
        $filewe = $file;

        require 'fileupload.php';

        if ($add_controller->add($email, $name, $department, $salary, $password, $boss, $designation, $file,$date)) {//true or false
            header("Location:Views/add_edit.php");//for true
        } else
            header("Location:Views/add_edit.php?err=1");
        break;
    case  'add_time':
        $sign_out_time = 0;
        $sign_in_time = 0;
                //0 mean not selected yet (one is selected and other is not)
        if (isset($_POST['timepicker']) && isset($_POST['timepicker1'])) {
                //isset for variable to exists or not
            if (!empty($_POST['timepicker']) && empty($_POST['timepicker1'])) {
                $sign_in_time = $_POST['timepicker'];
                $sign_out_time = 0;
                if ($add_time_controller->add_in_time($sign_in_time, $_SESSION['variable'])) {
                    $message = "Successfully Entered LoggedIn Time";
                    header("Location:Views/dashboard.php?Message=" . urlencode($message));//for true
                } else {
                    header("Location:Views/add_edit.php?err=1");
                }
            } else if (empty($_POST['timepicker']) && !empty($_POST['timepicker1'])) {
                     //want to logout
                     //check already loggedin or not if logged in then ok otherwise
                if ($add_time_controller->check_log_in_or_nt($_SESSION['variable']))
                {   //true means timein!=0 in db means he loggedin already
                    $sign_out_time = $_POST['timepicker1'];
                    //so add timeout time in db
                    if ($add_time_controller->add_out_time($sign_out_time, $_SESSION['variable'])) {
                        $message = "Successfully Entered Loggedout Time";
                        header("Location:Views/dashboard.php?Message=" . urlencode($message));
                        //for true
                    }
                } else {
                    $message = "unSuccessfully Entered Loggedout Time";
                    header("Location:Views/dashboard.php?Message=" . urlencode($message));
                    //for true
                }
            } else if ((!empty($_POST['timepicker'])) && (!empty($_POST['timepicker1']))) {
                $message = "can't login/logout at one time first login then logout";
                header("Location:Views/dashboard.php?Message=" . urlencode($message));
            }
        }
        break;
        case  'edit_employees':
            $name = $_POST['name2'];
            $email = $_POST['email1'];
            $department = $_POST['department1'];
            $salary = $_POST['salary1'];
            $password = $_POST['password1'];
            $boss = $_POST['boss'];
            $designation = $_POST['designation'];
            //$image= $_POST['image2'];

            //require 'fileupload.php?var=$file';//get $variable = $_GET["var"]// for upload to folder
            $file = $_FILES['file']['name'];
            $filewe = $file;

            require 'fileupload_for_edit.php';

            if ($add_controller->edit_add($email, $name, $department, $salary, $password, $boss, $designation,$file)) {//true or false
                header("Location:Views/add_edit.php");//for true
            } else
                header("Location:Views/add_edit.php?err=1");
            break;

    case 'logout':
        $user_controller->logout();
        header("Location:Views/login.php");
        break;
    default:
        header("Location:Views/login.php");
        break;
}

?>