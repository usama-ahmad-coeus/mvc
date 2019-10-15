<?php
//we want to redirect the user to te main  if he is already logged in
session_start();
if(isset($_SESSION['user']))
{
    header("Location:add_edit.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta hquiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- Bootstrap core CSS -->

    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

    <!--datatable ends here-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

</head>
<body>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Login <small>Manage Your
                        Site</small></h1>
            </div>
            <div class="col-md-4" style="padding-top: 2rem;">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPage"
                        style="width: 14rem;height: 4rem">Login
                </button>

            </div>
        </div>
    </div>
</header>
<br>
<br>

</body>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div id="content-data"></div>
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
                        <form name="form" method="post" enctype="multipart/form-data" action="index.php">


                            <div class="form-group">
                                <label>Email </label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label>Password </label>
                                <input type="text" name="password" class="form-control" placeholder="Enter Password">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit"  name= "op"  value= "login" class="btn btn-primary">
                            </div>
                        </form>
                    </div>



                </form>
            </div>
        </div>
    </div>
</div>


</body>
</html>
