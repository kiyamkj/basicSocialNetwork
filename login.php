<?php
session_start();

include_once("php_includes/db_conx.php");
include_once("php_includes/utils.php");

$errors = array();

if(isset($_POST['login'])){
    

    $email = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $query = "SELECT id, username, email 
              FROM users
              WHERE (email = ? OR username = ?)
                AND password = SHA1(?) 
                AND activated = 1";

    $prepared_statement = $db->prepare($query);
    $prepared_statement->bind_param('sss', $email, $email, $password);

    $prepared_statement->execute();

    $result = $prepared_statement->get_result();

    if($result->num_rows == 0){
        $errors[] = "Username or password is not valid";
    } else {
        $user = $result->fetch_assoc();

        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['username'];
        $_SESSION['user_email'] = $user['email'];
        

        header("Location: index.php");
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

    <title>YourSite Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/login.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="container">
  <div class="login-container">
            <div id="output"></div>
            <div class="avatar"></div>
            <div class="form-box">
                <form action="login.php" method="post">
                    <input name="username" type="text" id="disabledTextInput" class="form-control" placeholder="username or e-mail">
                    <input name="password" type="password" placeholder="password" class="form-control">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" value=""> Remember me
                      </label>
                    </div>
                    <button class="btn btn-info btn-block login" type="submit" name="login">Login</button>
                    <a href="register.php" style="text-decoration: none">
                    <button name="create" class="btn btn-info btn-block create" type="button">Create new account</button>
                    </a>
                    <a href="" class="btn btn-link pull-right">Forgot Password?</a>
                </form>
            </div>
        </div>
        
</div>
</body>
</html>