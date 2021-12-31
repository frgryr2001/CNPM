<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/loginU.css">
</head>
<?php
    $error = '';
	$user ='';
    $name= '';
    $phone= '';
    $email ='';
    $pass = '';
    $pass_confirm = '';
    // $check = false;
    $success = '';
    if (isset($_POST['username']) && isset($_POST['email']) &&  isset($_POST['pass']) && isset($_POST['pass-confirm']) && isset($_POST['phonenumber'])
    && isset($_POST['ngaysinh']) && isset($_POST['fullname']))
    {
		$user = $_POST['username'];
		$ngaysinh = $_POST['ngaysinh'];
		$phonenumber = $_POST['phonenumber'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $pass_confirm = $_POST['pass-confirm'];
        $avatar = 'img/avatar.png';
		
		if (empty($user)) {
            $error = 'Please enter your username';
        }
		else if (empty($fullname)) {
            $error = 'Please enter your fullname';
        }
        else if (empty($ngaysinh)) {
            $error = 'Please enter your birthday ';
        }
        else if (empty($email)) {
            $error = 'Please enter your email';
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $error = 'Not an email address ';
        }
        else if (empty($pass)) {
            $error = 'Please enter your password';
        }
        else if (strlen($pass) < 6) {
            $error = 'Your password must least 6 character';
        }
        else if ($pass != $pass_confirm) {
            $error = 'Your password does not match ';
        }else if(empty($phonenumber)){
            $error = 'Please enter your phonenumber ';
        }else {
            // register a new account
           $result = register($user,$fullname,$ngaysinh,$email,$pass,$phonenumber,$avatar,$level);
		   if ($result['code'] == 0){
               $check = true;
		        echo"<script>alert('Đăng kí thành công')</script>";
                header('Location: login.php');
                exit(); 
		   }else if ($result['code'] ==1){
				$error = 'Email already exists';
		   }else if ($result['code'] ==2){
				$error = 'username already exists ';
		   }else{
			   $error = 'Error! An error occurred. Please try again later';
		   }
        
        }
    }
?>
<body>
    <div class="registration-form">
        <form>
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="phone-number" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="birth-date" placeholder="Birth Date">
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-block create-account">Create Account</button>
            </div>
        </form>
        <div class="social-media">
            <h5>Sign up with social media</h5>
            <div class="social-icons">
                <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
                <a href="#"><i class="icon-social-google" title="Google"></i></a>
                <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="./assets/js/loginU.js"></script>
</body>
</html>