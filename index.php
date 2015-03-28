<?php
session_start();

include("php_includes/db_conx.php");
include("php_includes/utils.php");

ensure_loggedin();

if(isset($_GET['action']) && $_GET['action'] == "logout"){
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_rights']);

    session_destroy();
    if (!empty($_SERVER['HTTP_REFERER'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Basic Social Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                
                <li class="sidebar-brand">
                    <a href="#">Jeremy Strobble</a>
                </li>
                <li>
                <img class="img-circle img-responsive img-center" src="happy_avatar.png" alt="Smiley face" height="100" width="100">
                </li>
                <li>
                    <a href="index.html">My Profile</a>
                </li>
                <li>
                    <a href="friends.html">Friend List</a>
                </li>
                <li>
                    <a href="messages.html">Messages <span class="badge badge-info">3 new</span></a>
                </li>                
                <li>
                    <a href="pictures.html">Pictures</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Settings 
                        <span class="caret"></span>
                    </a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Change Password</a></li>
                        <li><a href="#">Deactivate Account</a></li>
                        <li><a href="#">Delete Account</a></li>
                      </ul>
                </li>
                <li>
                    <a href="index.php?action=logout">Log out</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-9" id="middle">
                        <div class="well"> 
                           <form class="form-horizontal" role="form">
                            <h4>What's New</h4>
                             <div class="form-group" style="padding:14px;">
                              <textarea class="form-control" placeholder="Post a new article"></textarea>
                            </div>
                            <button class="btn btn-primary pull-right" type="button">Post</button>
                            <ul class="list-inline">
                                <li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li>
                                <li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li>
                            </ul>
                          </form>
                        </div>
                        <div>
                            <button class="btn btn-primary pull-left" type="button">Edit Profile</button>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <h2>Article Heading</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                              Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                              dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                              Aliquam in felis sit amet augue.</p>
                            <p class="lead"><button class="btn btn-default">Read More</button>
                                <button class="btn btn-default">Delete Post</button></p>                            
                            <ul class="list-inline"><li><a href="#">2 Days Ago</a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> 2 Comments</a></li><li><a href="#"><i class="glyphicon glyphicon-share"></i> 14 Shares</a></li></ul>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-xs-12">
                            <h2>Article Heading</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                              Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                              dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                              Aliquam in felis sit amet augue.</p>
                            <p class="lead"><button class="btn btn-default">Read More</button>
                                <button class="btn btn-default">Delete Post</button></p>                            
                            <ul class="list-inline"><li><a href="#">2 Days Ago</a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> 2 Comments</a></li><li><a href="#"><i class="glyphicon glyphicon-share"></i> 14 Shares</a></li></ul>
                          </div>
                        </div>
                         <br>
                         <div class="row">
                          <div class="col-xs-12">
                            <h2>Article Heading</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                              Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                              dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                              Aliquam in felis sit amet augue.</p>
                            <p class="lead"><button class="btn btn-default">Read More</button>
                                <button class="btn btn-default">Delete Post</button></p>                            
                            <ul class="list-inline"><li><a href="#">2 Days Ago</a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> 2 Comments</a></li><li><a href="#"><i class="glyphicon glyphicon-share"></i> 14 Shares</a></li></ul>
                          </div>
                        </div>
                        <br>
                         <div class="row">
                          <div class="col-xs-12">
                            <h2>Article Heading</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                              Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                              dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                              Aliquam in felis sit amet augue.</p>
                            <p class="lead"><button class="btn btn-default">Read More</button>
                                <button class="btn btn-default">Delete Post</button></p>                            
                            <ul class="list-inline"><li><a href="#">2 Days Ago</a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> 2 Comments</a></li><li><a href="#"><i class="glyphicon glyphicon-share"></i> 14 Shares</a></li></ul>
                          </div>
                        </div>
                        <br>
                         <div class="row">
                          <div class="col-xs-12">
                            <h2>Article Heading</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                              Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                              dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                              Aliquam in felis sit amet augue.</p>
                            <p class="lead"><button class="btn btn-default">Read More</button>
                                <button class="btn btn-default">Delete Post</button></p>
                            <ul class="list-inline"><li><a href="#">2 Days Ago</a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> 2 Comments</a></li><li><a href="#"><i class="glyphicon glyphicon-share"></i> 14 Shares</a></li></ul>
                          </div>
                        </div>   
                    </div>
                    <div class="col-xs-3" id="sidebar">
                        <div>
                        <h1>Current Happenings</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        </div>
                        <br>
                        <div>
                        <h1>Trending<br>on Google</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $("#")
    });
    </script>

</body>

</html>
