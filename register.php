<?php
    require_once("./conf/conf.php")
?>
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
	$username ='';
    $email ='';
    $password = '';
    $name= '';
    $phone= '';
    $address = '';
    $salary = '';
    // $check = false;
    $success = '';
    if (isset($_POST['username']) && isset($_POST['email']) &&  isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['name'])
    && isset($_POST['address']))
    {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        
		
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
        <form method="post">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="username" name="username" placeholder="Username">
            </div>
            
            <div class="form-group">
                <input type="email" class="form-control item" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="name" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="number" class="form-control item" id="phone" name="phone" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="address" name="address" placeholder="address">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="salary" name="salary" placeholder="salary">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Create Account</button>
            </div>
        </form>
       
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="./assets/js/loginU.js"></script>
</body>
</html>