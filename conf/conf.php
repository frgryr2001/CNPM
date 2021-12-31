<?php
    require_once('db.php');
    function login($user,$pass){
        $sql = "select * from admin where username = ?";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('s',$user);
        if (!$stm->execute()){
            return array('code' => 1,'error' => 'Can not execute');
        }
        $result = $stm->get_result();
        if($result->num_rows==0){
            return array('code' => 1,'error' => 'User does not exists');
        }
        $data = $result->fetch_assoc();

        // $hashed_password = $data['password'];
        if(($pass != $data['password'])){
            return array('code' => 2,'error' => 'Invalid password');
        }
        // else if ($data['activated']==0){
        //     return array('code' => 3,'error' => 'This account is not activated');
        // }
        else{
            return array('code' => 0,'error' => '','data' => $data);
        }
    }
    function getAllUser(){
        $conn = open_database();
        $sql = 'SELECT * FROM user';
        $stm = $conn->prepare($sql);
        
        if (!$stm->execute()){
            return array('code' => 1,'error' => 'Can not execute');
        }
        $result = $stm -> get_result();
        $data = array();
        while($row = $result -> fetch_assoc() ){
            $data[] = $row;
        }
        return json_encode(array('code' => 0, 'data' => $data));
    }
    function loginUser($user,$pass){
        $sql = "select * from user where username = ?";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('s',$user);
        if (!$stm->execute()){
            return array('code' => 4,'error' => 'Can not execute');
        }
        $result = $stm->get_result();
        if($result->num_rows==0){
            return array('code' => 1,'error' => 'User does not exists');
        }
        $data = $result->fetch_assoc();
        $hashed_password = $data['password'];
        if(!password_verify($pass,$hashed_password)){
            return array('code' => 2,'error' => 'Invalid password');
        // else if ($data['activated']==0){
        //     return array('code' => 3,'error' => 'This account is not activated');
        // }
        }else{
            return array('code' => 0,'error' => '','data' => $data);
        }
    }
    function is_email_exists($email){
        $sql = "select * from user where email = ?";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('s',$email);
        if(!$stm->execute()){
            die('Query error : ' .$conn->error);
        }
        $result = $stm->get_result();
        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }
    function register($user,$pass,$name,$email,$phone,$address){
        if(is_email_exists($email)){
            return array('code' => 1 , 'error' => 'Email exists');
        }
        if(is_username_exists($user)){
            return array('code' => 2 , 'error' => 'username is exists');
        }
        $hash = password_hash($pass,PASSWORD_DEFAULT);
        $sql =  'insert into tbl_user(username,password,name,email,phone,address)
                 values(?,?,?,?,?,?,?,?)';  
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('ssssss',$user,$hash,$name,$email,$phone,$address);
        if (!$stm->execute()){
            return array('code' => 3 , 'error' => 'Can not execute');
        }
        return array('code' => 0 , 'error' => 'Create account successful');
    }
    function is_username_exists($user){
		$sql = "select * from user where username = ?";
		$conn = open_database();
		$stm = $conn->prepare($sql);
		$stm->bind_param('s',$user);
		if (!$stm ->execute()){
			die('Query error: '.$stm->error);
		}
		$result = $stm->get_result();
		if($result->num_rows >0){
			return true;
		}
	}
?>