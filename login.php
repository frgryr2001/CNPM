<?php
    // require_once('./conf/conf.php');

    session_start();
    if(isset($_SESSION['authenticated']) && ($_SESSION['role']) == 3){
        header('Location: index.php');
        exit();
    } else if (isset($_SESSION['authenticated'])) {
        header('Location: ./admin/index.php');
        exit();
    }

    

    // $error = '';
    // $user = '';
    // $pass = '';

    // if (isset($_POST['user']) && isset($_POST['pass'])) {
    //     $user = $_POST['user'];
    //     $pass = $_POST['pass'];

    //     if (empty($user)) {
    //         $error = 'Please enter your username';
    //     } else if (empty($pass)) {
    //         $error = 'Please enter your password';
    //     } else if (strlen($pass) < 5) {
    //         $error = 'Password must have at least 6 characters';
    //     } else{
    //         $result = login($user, $pass); 
    //         if ($result['code'] == 0){
    //             // login success
    //             $data = $result['data'];
    //             $_SESSION['name'] = $data['name'];
    //             $_SESSION['user'] = $data['username'];
    //             if ($data['role'] == 0) {
    //                 $_SESSION['role'] = "admin";
    //             } else if($data['role'] == 1 ){
    //                 $_SESSION['role'] = "saleAssistant";
    //             }else if($data['role'] == 2){
    //                 $_SESSION['role'] = "warehouseStaff";
    //             }else {
    //                 $_SESSION['role'] = "user";
    //             }
    //             header('Location: ./admin/index.php');
    //             exit();
    //         }else {
    //             $error = $result['error'];
    //         }
    //     }
    // }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="./assets/css/login1.css">
</head>
<body>
    
    <div class="container">
        <div class="login">
            <h2 class="login-title">Đăng nhập</h2>
            <form action="#" id = "loginForm" class="login-form" method="post">
                <div class="login-form-group">
                    <input class="login-form-group__input" name="email" id="email" type="email" placeholder=" " required>
                    <span>Tài khoản</span>
                </div>
                <div class="login-form-group">
                    <input class="login-form-group__input" name="pass" id="password" type="password" placeholder=" " required>
                    <span>Mật khẩu</span>
                </div>
    
                <div class="form-group text-left">
                    
                    <div class="login-form-group">
                        <input class="login-form-group__input login-form-group__input-submit" type="submit"
                            value="Đăng nhập">
                    </div>
                </div>
    
                <div class="login-form-group login-form-group-register">
                </div>
            </form>
        </div>
    </div>
    <script>
        const url = '../api/login_api.php'
        const loginForm = document.querySelector('#loginForm')
        loginForm.addEventListener('submit',function(e){
            e.preventDefault();
            const email = document.querySelector('#email').value;
            const password = document.querySelector('#password').value;
            $.ajax({
                url,
                method: 'POST',
                data: {email, password}
            }).done(response => {
                console.log(response);
                if (!response.status){
                    toastr.error(response.message);
                }else{
                    toastr.success(response.message);
                    window.location.href = response.redirect;
                }
            });
        })
    </script>
</body>


