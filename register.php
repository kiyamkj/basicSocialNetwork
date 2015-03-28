<?php
session_start();
// If user is logged in, header them in home page
include_once("php_includes/utils.php");
if (is_user_logged_in()) {
    header("location: index.php");
    exit();
}
?>
<?php
if(isset($_POST["register"])){

}

// Ajax calls this User name check code to execute
if(isset($_POST["usernamecheck"])){
    include_once("php_includes/db_conx.php");
    
    $username = preg_replace('#[^a-z0-9]#i', '', $_POST['usernamecheck']);
       
    $sql = "SELECT id FROM users WHERE username='$username' LIMIT 1";
    $query = mysqli_query($db, $sql); 
    $uname_check = mysqli_num_rows($query);

    if (strlen($username) < 3 || strlen($username) > 50) {
        echo '<strong style="color:#F00;">3 - 16 characters please</strong>';
        exit();
    }
    else if (is_numeric($username[0])) {
        echo '<strong style="color:#F00;">Usernames must begin with a letter</strong>';
        exit();
    }
    else if ($uname_check < 1) {
        echo '<strong style="color:#009900;">' . $username . ' is OK</strong>';
        exit();
    } else {
        echo '<strong style="color:#F00;">' . $username . ' is already taken</strong>';
        exit();
    }
    
}

if(isset($_POST["emailcheck"])){
    include_once("php_includes/db_conx.php");
    
    $email = mysqli_real_escape_string($db, $_POST['emailcheck']);
    
    $sql = "SELECT id FROM users WHERE email='$email' LIMIT 1";
    $query = mysqli_query($db, $sql); 
    $email_check = mysqli_num_rows($query);
       if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
            echo '<strong style="color:#F00;">' . $email . ' Please enter a valid email </strong>';
            exit();
        } 
       else if ($email_check < 1) {
            echo '<strong style="color:#009900;">' . $email . ' is OK</strong>';
            exit();
        } 
        else {
            echo '<strong style="color:#F00;">' . $email . ' this email is already in use </strong>';
            exit();
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

    <title>Basic Social Registration</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/ajax.js"></script>
    <!-- Custom CSS -->
    <!-- <link href="css/login.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>

        function _(id){
            return document.getElementById(id);
        }
        
        function checkusername(){
        var u = _("username").value;
        if(u != ""){
            _("unamestatus").innerHTML = 'checking ...';
            var ajax = ajaxObj("POST", "register.php");
            ajax.onreadystatechange = function() {
                if(ajaxReturn(ajax) == true) {
                    _("unamestatus").innerHTML = ajax.responseText;
                }
            }
            ajax.send("usernamecheck="+u);
        }
        }

        function checkemail(){
            var e = _("email").value;
            if(e != ""){
                _("emailstatus").innerHTML = 'checking ...';
                var ajax = ajaxObj("POST", "register.php");
                ajax.onreadystatechange = function() {
                    if(ajaxReturn(ajax) == true) {
                        _("emailstatus").innerHTML = ajax.responseText;
                    }
                }
                ajax.send("emailcheck="+e);
            }
        }
    </script>
</head>
<body>

    <div class="container-fluid">
    <section class="container">
        <form action="register.php" method="POST">
        <div class="container-page">                
            <div class="col-md-6">
                <h3 class="dark-grey">Registration</h3>
                
                <div class="form-group col-lg-12">
                    <label>Username</label>
                    <input type="text" name="username" id="username" onblur="checkusername()" class="form-control" id="" value="" maxlength="50">
                     <span id="unamestatus"></span>
                </div>
                
                <div class="form-group col-lg-6">
                    <label>Password</label>
                    <input type="password" name="password1" class="form-control" id="" value="">
                </div>
                
                <div class="form-group col-lg-6">
                    <label>Repeat Password</label>
                    <input type="password" name="password2" class="form-control" id="" value="">
                </div>
                                
                <div class="form-group col-lg-6">
                    <label>Your Name</label>
                    <input type="text" name="name" class="form-control" id="" value="">
                </div>
                
                <div class="form-group col-lg-6">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" id="email" value=""  onblur="checkemail()">
                    <span id="emailstatus"></span>
                </div>

                <div class="form-group col-lg-6">
                    <label>City</label>
                    <input type="" name="cityname" class="form-control" id="" value="">
                </div>
                
                <div class="form-group col-lg-6">
                    <label>Country</label>
                    <input type="" name="countryname" class="form-control" id="" value="">
                </div>                              
            
            </div>
        
            <div class="col-md-6">
                <h3 class="dark-grey">Terms and Conditions</h3>
                <p>
                    By clicking on "Register" you agree to The Terms and Conditions
                </p>
                <p>
                    While rare, prices are subject to change based on exchange rate fluctuations - 
                    should such a fluctuation happen, we may request an additional payment. You have the option to request a full refund or to pay the new price. (Paragraph 13.5.8)
                </p>
                <p>
                    Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6)
                </p>
                <p>
                    Acceptance of an order by us is dependent on our suppliers ability to provide the product. (Paragraph 13.5.6)
                </p>
                <p>
                    Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6)
                </p>
                
                <button type="submit" name="register" class="btn btn-info btn-block">Register</button>
            </div>
        </div>
        </form>
    </section>
</div>

</body>
</html>