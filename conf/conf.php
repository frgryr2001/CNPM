<?php
    require_once('db.php');
    
    function login($email,$pass){
        $sql = "select * from account where email = ?";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('s',$email);
        if (!$stm->execute()){
            return array(
                "status" => false,
                "response" => "",
            );
        }
        $result = $stm->get_result();
        if($result->num_rows==0){
            return array(
                "status" => false,
                "response" => "",
            );
        }
        $data = $result->fetch_assoc();
        if (!password_verify($pass,$data['password'])){
            return array(
                "status" => false,
                "response" => "Password invalid!",
            );
        } else{
            return array(
                "status" => true,
                "response" => $data,
            );
        }
    };

    function getAllUser(){
        $conn = open_database();
        $sql = 'SELECT * FROM account';
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
    };

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
    };

    function is_email_exists($email){
        $sql = "select * from account where email = ?";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('s',$email);
        $stm->execute();
        $result = $stm->fetch();
        if ($result > 0) {
            return true;
        } else {
            return false;
        };
    };

    function is_username_exists($username){
        $sql = "select * from account where username = ?";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('s',$username);
        $stm->execute();
        $result = $stm->fetch();
        if ($result > 0) {
            return true;
        } else {
            return false;
        };
    };
    function register($email, $password, $username, $given_name, $family_name, $phone, $address){
        // $_id = bin2hex(random_bytes(10));
        $fullname = $given_name." ".$family_name;
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'insert into account(email, password, username, given_name, family_name, phone, address)
                 values(?,?,?,?,?,?,?)';  
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('sssssss', $email, $password, $username, $given_name, $family_name, $phone, $address);
        try {
            if ($stm->execute()) {
                return array(
                    "status" => true,
                    "response" => "",
                );
            } else {
                return array(
                    "status" => false,
                    "response" => "Failed to register account!",
                );
            };
        } catch (Exception $e) {
            return array(
                "status" => false,
                "response" => $e,
            );
        }
    };

    // function is_username_exists($user){
	// 	$sql = "select * from account where username = ?";
	// 	$conn = open_database();
	// 	$stm = $conn->prepare($sql);
	// 	$stm->bind_param('s',$user);
	// 	if (!$stm ->execute()){
	// 		die('Query error: '.$stm->error);
	// 	}
	// 	$result = $stm->get_result();
	// 	if($result->num_rows >0){
	// 		return true;
	// 	}
	// };
?>