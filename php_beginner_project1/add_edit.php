<?php
//we want to redirect the user to te main  if he is already logged in
session_start();
if(!isset($_SESSION['user']))
{
    header("Location:login.php");
}
?>
<?php if (isset($_GET["Message"])): ?>
    <script type="text/javascript">
        alert("<?php echo htmlentities(urldecode($_GET["Message"])); ?>");
    </script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
      <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">

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
            <li><a href="../pages.html">Pages</a></li>
            <li><a href="../posts.html">Posts</a></li>
            <li><a href="../users.html">Users</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <a href="index.php?op=logout" >Logout</a>
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
          <div class="col-md-2">

                <a class=" btn btn-primary" data-toggle="modal" data-target="#addPage">Add Page</a>

          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
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
                          <td>Name</td>
                          <td>Department</td>
                          <td>Salary</td>
                          <td>Password</td>
                          <td>Image</td>
                          <td>Boss</td>
                          <td>Destination</td>
                          <td>TimeIn</td>
                          <td>TimeOut</td>
                      </tr>
                      </thead>
                      <?php

                      $connect = mysqli_connect("localhost", "root", "coeus123", "php_medium_level_MVC");
                      $query = "SELECT * FROM Users where name !='admin'";
                      $result = mysqli_query($connect, $query);

                      while($row = mysqli_fetch_array($result))
                      {
                          echo '
                               <tr>
                                    <td>'.$row["name"].'</td>
                                    <td>'.$row["department"].'</td>
                                    <td>'.$row["salary"].'</td>
                                    <td>'.$row["password"].'</td>
                                    <td><img src="uploads/'.$row["image"].'"  style="width:98px; height:80px;"></td> 
                                    <td>'.$row["boss"].'</td>
                                    <td>'.$row["destination"].'</td>
                                    <td>'.$row["timein"].'</td>
                                    <td>'.$row["timeout"].'</td>
                               </tr>
                               ';
                      }

                      ?>
                  </table>
                  </div>

              </div>
              </div>

              <!-- Latest Users -->
          </div>
        </div>
      </div>
    </section>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


    <footer id="footer">
      <p>Copyright AdminStrap, &copy; 2017</p>
    </footer>

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
                            <form name="form" method="post" enctype="multipart/form-data" action="index.php">

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name1" class="form-control"  placeholder="Name...">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email1" class="form-control"  placeholder="Email...">
                                </div>
                                <div class="form-group">
                                    <label>Department</label>
                                    <input type="text" name="department1" class="form-control"  placeholder="Department...">
                                </div>
                                <div class="form-group">
                                    <label>Salary</label>
                                    <input type="text" name="salary1" class="form-control"  placeholder="Salary">
                                </div>
                                <div class="form-group">
                                    <label>Passsword</label>
                                    <input type="text" name="password1" class="form-control"  placeholder="Password">
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

                                    <div style="overflow: auto " >
                                        <div style="display: inline-block ">
                                            <input type="file" name="file" id="profile-img">
                                        </div>
                                        <img src="http://placehold.it/180" id="profile-img-tag" width="200px" height="100px" />  <!-- script 2-->

                                    </div>
                                </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit"  name="op"  value="add" class="btn btn-primary">
                        </div>
                            </form>
                        </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#employee_data').DataTable();
        });
    </script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
