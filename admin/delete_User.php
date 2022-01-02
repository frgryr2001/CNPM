<?php
    require_once('../conf/db.php');
    print_r($_POST['delete_idUser']);
    if(isset($_POST['delete_idUser'])){
        $id = $_POST['delete_idUser'];
        $conn = open_database();
        $sql = 'DELETE from user where userId = ? ';
        $stm = $conn->prepare($sql);
        $stm -> bind_param('s',$id);
        $stm -> execute();
        if($stm->execute()){
            echo '<script> alert("Data deleted");</script>';
            header('Location: ./index.php?page=user');
            exit();
        }else{
            echo '<script> alert("Data not deleted");</script>';
        }
    }
?>