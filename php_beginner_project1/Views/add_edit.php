<?php

//we want to redirect the user to te main  if he is already logged in
session_start();
if(!isset($_SESSION['user'])) {
    header("Location:login.php");
}

?>

<?php if (isset($_GET["Message"])): ?>
    <script type="text/javascript">
        alert("<?php echo htmlentities(urldecode($_GET["Message"])); ?>");
    </script>
<?php endif; ?>

<?php
//
//$connect = mysqli_connect("localhost", "root", "coeus123", "php_medium_level_MVC");
//$id=intval($_REQUEST['id']);
//$query = "SELECT * FROM Users where name ='$id'";
//
//        $result = mysqli_query($connect, $query);
//        $values = mysqli_fetch_assoc($result);
//
//        $email = $values['email'];
//        $name = $values['name'];
//        $department = $values['department'];
//        $salary = $values['salary'];
//        $image = $values['image'];
//        $boss = $values['boss'];
//        $designation = $values['destination'];
//        $timein = $values['timein'];
//        $timeout = $values['timeout'];
//        $date = $values['date'];
//
//
//
//?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin Area | Dashboard</title>
      <!-- Bootstrap core CSS -->
      <!-- datapicker-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

      <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/style.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dashboard.php">DashBoard</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li class="active"><a  href="add_edit.php">ADD Employees</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
                <li style=" background-color:#ff6666 "><a href="#">Welcome,<?php echo $_SESSION['user'] ;    ?></a></li>
                <li><a href="../index.php?op=logout" style="color: white;background-color:crimson">Logout</a></li>
            </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
<script>
</script>
    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small>Manage Your Site</small></h1>
          </div>
          <div class="col-md-2" style="padding-top: 3rem">
                <a class=" btn btn-primary" data-toggle="modal" data-target="#addPage" >Add Employees</a>
          </div>
        </div>
      </div>
    </header>
    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Page</li>


        </ol>
      </div>
    </section>
    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Website Overview</h3>
              </div>
              <div class="panel-body">
                  <div class="table-responsive">
                  <table id="employee_data" class="table table-striped table-bordered">
                      <thead>
                      <tr>
                          <td>id</td>
                          <td>Name</td>
                          <td>Email</td>
                          <td>Department</td>
                          <td>Salary</td>
                          <td>Password</td>
                          <td>Image</td>
                          <td>Boss</td>
                          <td>Destination</td>
                          <td>TimeIn</td>
                          <td>TimeOut</td>
                          <td>Date</td>
                          <td>Edit</td>
                          <td>Delete</td>
                      </tr>
                      </thead>
                      <?php

                      $connect = mysqli_connect("localhost", "root", "coeus123", "php_medium_level_MVC");
                      $query = "SELECT * FROM Users where name !='Admin'";
                      $result = mysqli_query($connect, $query);
                      while($row = mysqli_fetch_array($result)) {
                          ?>
                          <tbody>
                               <tr>
                                     <td><?php echo $row["id"] ;?></td>
                                    <td><?php echo $row["name"];?></td>
                                    <td><?php echo $row["email"];?></td>
                                    <td><?php echo $row["department"];?></td>
                                    <td><?php echo $row["salary"];?></td>
                                    <td><?php echo $row["password"];?></td>
                                    <td><img src="../uploads/<?php echo $row["image"]?>"  style="width:98px; height:80px;"></td>
                                    <td><?php echo $row["boss"];?></td>
                                    <td><?php echo $row["destination"];?></td>
                                    <td><?php echo $row["timein"];?></td>
                                    <td><?php echo $row["timeout"];?></td>
                                    <td><?php echo $row["date"];?></td>
                                   <td><button type="button"  class="btn btn-primary btn-xs editbtn"  data-id=<?php echo $row["id"];?> ><i class="glyphicon glyphicon-pencil">&nbsp;</i>Edit</button></td>
                <td><button type="button" name="delete" class="btn btn-danger btn-xs delete"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Delete</button></td>
                               </tr>
                          </tbody>
                               <?php
                      }
                      ?>
                  </table>
                  </div>
              </div>
              </div>
          </div>
        </div>
      </div>
    </section>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer id="footer">
      <p>Copyright AdminStrap, &copy; 2017</p>
    </footer>

    <!-- Modals -->
    <!-- Add Attendence -->
    <div class="modal fade" id="attendence" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:dodgerblue;color:black;text-align: center;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">LogIn Form</h4>
                    <!-- Show error message if the controller sets err=1 in the url query string -->
                    <?php if($_GET['err'] == 1) { ?>
                        <div class ="error-text">Login Incorrect. Please try again</div>
                    <?php } ?>
                </div>

                <!--<div class="modal-body">action="index.php?user=--><?php //echo $name_user; ?>
                <form  name="form" method="post" enctype="multipart/form-data" action="../index.php">
                    <div class="container">
                        <div class="form-group">
                            <label>Time In:</label>
                            <input name ="timepicker" id="timepicker" width="276" />
                            <p>Please select SignedIn time</p>
                            <script>
                                $('#timepicker').timepicker();
                                $('#timepicker').attr('readonly', 'readonly');
                            </script>
                            <br>
                            <br>
                            <label>Time Out:</label>
                            <input id="timepicker1" name="timepicker1" width="276"  />
                            <p>Please select SignedOut time</p>
                            <script>
                                $('#timepicker1').timepicker();
                                $("#timepicker1").attr('readonly', 'readonly');
                            </script>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit"  name="op"  value="add_time" class="btn btn-primary">
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>

    <!-- Modals -->
    <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:dodgerblue;color:black;text-align: center;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">LogIn Form</h4>
                    <!-- Show error message if the controller sets err=1 in the url query string -->
                    <?php if($_GET['err'] == 1) { ?>
                        <div class ="error-text">Login Incorrect. Please try again</div>
                    <?php } ?>
                </div>
                <div class="modal-body">
                    <form name="form" method="post" enctype="multipart/form-data" action="../index.php">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name1" class="form-control" placeholder="Name...">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email1" class="form-control" placeholder="Email...">
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" name="department1" class="form-control" placeholder="Department...">
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary1" class="form-control" placeholder="Salary">
                        </div>
                        <div class="form-group">
                            <label>Passsword</label>
                            <input type="text" name="password1" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Your Boss</label>
                            <select class="form-control" name="boss" id="exampleFormControlSelect1">
                                <option value="CEO">CEO</option>
                                <option value="Incharge Manager">Incharge Manager</option>
                                <option value="Project Manager">Project Manager</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Your Designation</label>
                            <select class="form-control" name="designation" id="exampleFormControlSelect1">
                                <option value="CEO">CEO</option>
                                <option value="Incharge Manager">Incharge Manager</option>
                                <option value="Developer">Developer</option>
                                <option value="Project Manager">Project Manager</option>
                            </select>
                        </div>
                        <div>
                            <div style="overflow: auto ">
                                <div style="display: inline-block ">
                                    <input type="file" name="file" id="profile-img">
                                </div>
                                <img src="http://placehold.it/180" id="profile-img-tag" width="200px" height="100px"/>
                                <!-- script 2-->
                            </div>
                        </div>
                        <input name="date" type="hidden" value="<?php

                        echo date("d/m/Y");
                        ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" name="op" value="add" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- Modals -->
    <!-- Edit Employees -->
    <div class="modal fade" id="edit_employees" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:dodgerblue;color:black;text-align: center;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">LogIn Form</h4>
                    <!-- Show error message if the controller sets err=1 in the url query string -->
                    <?php if($_GET['err'] == 1) { ?>
                        <div class ="error-text">Login Incorrect. Please try again</div>
                    <?php } ?>
                </div>


                <div class="modal-body">
                    <form name="form" method="post" enctype="multipart/form-data" action="../index.php">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="name2" name="name2" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" id="email" name="email1" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" id="department" name="department1" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" id="salary" name="salary1" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label>Passsword</label>
                            <input type="text" id="password2" name="password1" class="form-control"  ">
                        </div>
                        <div class="form-group">
                            <label>Select Your Boss</label>
                            <select class="form-control" name="boss" id="boss2">
                                <option value="CEO">CEO</option>
                                <option value="Incharge Manager">Incharge Manager</option>
                                <option value="Project Manager">Project Manager</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Your Designation</label>
                            <select class="form-control" name="designation" id="destination2">
                                <option value="CEO">CEO</option>
                                <option value="Incharge Manager">Incharge Manager</option>
                                <option value="Developer">Developer</option>
                                <option value="Project Manager">Project Manager</option>
                            </select>
                        </div>
                        <div>
                            <div style="overflow: auto ">
                                <div style="display: inline-block ">
                                    <input type="file" name="file" id="profile-img">
                                </div>
                                <img src="http://placehold.it/180" id="profile-img-tag" width="200px" height="100px"/>
                                <!-- script 2-->
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit"  name="op"  value="edit_employees" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


<script>

$(document).ready(function () {
    $('.editbtn').on('click',function () {
        $('#edit_employees').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        // console.log(data);
        // console.log(data[0]);
        $('#id2').val(data[0]);
        $('#name2').val(data[1]);
        $('#email').val(data[2]);
        $('#department').val(data[3]);
        $('#salary').val(data[4]);
        $('#password2').val(data[5]);
        $('#image2').val(data[6]);
        $('#boss2').val(data[7]);
        $('#destination2').val(data[8]);
        $('#timein').val(data[9]);
        $('#timeout2').val(data[10]);
        $('#date2').val(data[11]);
    });
});

</script>

<script>
        $(document).ready(function(){
            $('#employee_data').DataTable();
        });
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
