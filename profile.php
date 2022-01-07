<?php 
    session_start();
    if(!isset($_SESSION['email'])){
        header('Location: ./login.php');
        exit();
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS -->
    <link rel="shortcut icon" href="favi.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/icon.css">
</head>

<body>
    <?php include('./inc/header.php') ?>
    <?php
        require_once('./conf/db.php');
        require_once('./conf/conf.php');
        $error = '';
        $username='';
        $firstname ='';
        $lastname ='';
        $fullname='';
        $Address ='';
        $phone = '';
        $success = '';
                if (isset($_POST['username']) && isset($_POST['firstname']) 
            &&  isset($_POST['lastname']) && isset($_POST['fullname']) && isset($_POST['Address'])
            && isset($_POST['phone'])&& isset($_POST['id']))
            {
                    $username = $_POST['username'];
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $fullname = $_POST['fullname'];
                    $Address = $_POST['Address'];
                    $phone = $_POST['phone'];
                    $id = $_POST['id'];
                
                if (empty($username)) {
                    $error = 'Please enter your username';
                }
                else if (empty($firstname)) {
                    $error = 'Please enter your firstname';
                }
                else if (empty($lastname)) {
                    $error = 'Please enter your lastname ';
                }
                else if(empty($fullname)){
                    $error = 'Please enter your fullname ';
                }
                else if(empty($Address)){
                    $error = 'Please enter your Address ';
                }
                else if(empty($phone)){
                    $error = 'Please enter your phone ';
                }
                else {
                    // update profile
                    $result = update_profile($id,$username,$firstname,$lastname,$fullname,$Address,$phone);
                    if ($result['status'] == true){
                        $success = 'Cập nhật thành công ';
                    }else{
                        $error = 'Error! An error occurred. Please try again later';
                    }
                }
            }
        
        
    ?>
    <?php 
        $id_user = $_SESSION['id'];
        $conn = open_database();
        $sql = "select * from account where id = '$id_user'";
        $result = $conn-> query($sql);
        $row = $result -> fetch_assoc();
    
    ?>
    <div class="container border rounded p-3 w-50 mt-2 bg-light">
        <h1 class="text-center">Thông tin cá nhân</h1>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group ">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="username" value="<?= $row['username']?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstname">Fisrt name</label>
                    <input type="text" class="form-control" name="firstname" value=<?= $row['given_name']?>>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastname">Last name</label>
                    <input type="text" class="form-control" name="lastname" value="<?= $row['family_name']?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="fullname">Full name</label>
                <input type="text" class="form-control" name="fullname" placeholder="Lê văn tèo" value="<?= $row['fullname']?>">
            </div>
            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" class="form-control" name="Address" placeholder="1234 Main St" value="<?= $row['address']?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone"  placeholder="09..." value="<?=$row['phone']?>">
            </div>
            <input type="hidden" name="id" value="<?=$_SESSION['id']?>">
            <?php
                if(!empty($error)){
                    echo "<div class='alert alert-danger'>$error</div>";
                }
                if(!empty($success)){
                    echo "<div class='alert alert-success text-center'>$success</div>";
                }
                    
            ?>
            <button type="submit" name="submit" class="btn btn-primary">Thay đổi</button>
        </form>
        
    </div>

</body>
</html>