<?php
    require_once('./conf/conf.php');
    session_start();
    if(isset($_SESSION['user'])){
        header('Location: ./admin_dashboard/index.php');
        exit();
    }
    

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <!-- style.css -->
    
    <!-- boottrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./assets/css/login1.css">
</head>

<?php
$error = '';
$user = '';
$pass = '';

if (isset($_POST['user']) && isset($_POST['pass'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if (empty($user)) {
        $error = 'Please enter your username';
    }
    else if (empty($pass)) {
        $error = 'Please enter your password';
    }
    else if (strlen($pass) < 5) {
        $error = 'Password must have at least 6 characters';
    }
    else{
        $result = login($user, $pass);
        if ($result['code'] == 0){
            $data = $result['data'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['user'] = $data['username'];
            header('Location: ./admin_dashboard/index.php');
            exit();
        }else {
            $error = $result['error'];
        }
    }
}
?>
<div class="container">
    <div class="login">
        <h2 class="login-title">Đăng nhập</h2>
        <form action="#" class="login-form" method="post">
            <div class="login-form-group">
                <input class="login-form-group__input" name="user" type="text" placeholder=" " required>
                <span>Tài khoản</span>
            </div>
            <div class="login-form-group">
                <input class="login-form-group__input" name="pass" type="password" placeholder=" " required>
                <span>Mật khẩu</span>
            </div>

            <div class="form-group text-left">
                <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    ?>
                <div class="login-form-group">
                    <input class="login-form-group__input login-form-group__input-submit" type="submit"
                        value="Đăng nhập">
                </div>
            </div>

            <div class="login-form-group login-form-group-register">
                <!-- <p>Chưa có tài khoản? <a href="">Đăng kí ngay</a></p>
                <a href="">Quên mật khẩu</a> -->
            </div>
        </form>
    </div>
</div>


