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
    
    function register($email, $password, $name, $phone, $address, $birthday, $gender){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'insert into account(email, password, fullname, phone, address, birthday, gender) values(?,?,?,?,?,?,?)';  
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('sssssss', $email, $password, $name, $phone, $address, $birthday, $gender);
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
    function update_profile($id,$username,$firstname,$lastname,$fullname,$Address,$phone){
        $sql = 'Update account SET username=?,given_name=?,family_name=?,fullname=?,address=?,phone=?
                where id = ?';  
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('ssssssi',$username,$firstname,$lastname,$fullname,$Address,$phone,$id);
        try {
            if ($stm->execute()) {
                return array(
                    "status" => true,
                    "response" => "",
                );
            } else {
                return array(
                    "status" => false,
                    "response" => "",
                );
            };
        } catch (Exception $e) {
            return array(
                "status" => false,
                "response" => "",
            );
        }
    }


    function is_product_name_exists($product_name) {
        $sql = "select * from product where product_name = ?";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('s',$product_name);
        $stm->execute();
        $result = $stm->fetch();
        if ($result > 0) {
            return true;
        } else {
            return false;
        };
    };

    function is_product_id_exists($id) {
        $sql = "select * from product where id = ?";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('s',$id);
        $stm->execute();
        $result = $stm->fetch();
        if ($result > 0) {
            return true;
        } else {
            return false;
        };
    };

    function create_product($product_name, $id_category, $description, $inital_price, $sale_off, $sell_quantity, $guarantee, $image){
        // $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'insert into product(product_name, id_category, description, inital_price, sale_off, sell_quantity, guarantee, image) 
        values(?,?,?,?,?,?,?,?)';  
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('ssssssss', $product_name, $id_category, $description, $inital_price, $sale_off, $sell_quantity, $guarantee, $image);
        try {
            if ($stm->execute()) {
                return array(
                    "status" => true,
                    "response" => "",
                );
            } else {
                return array(
                    "status" => false,
                    "response" => "Failed to create product!",
                );
            };
        } catch (Exception $e) {
            return array(
                "status" => false,
                "response" => $e,
            );
        }
    };
    function get_product(){
        $sql = 'select * from product';  
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->execute(); 
        try {
            $result = $stm -> get_result();
            $data = array();    
            while($row = $result -> fetch_assoc() ){
                $data[] = $row;
            };
            return $data;
        } catch (Exception $e) {
            return false;
        }
    };
    function get_category(){
        $sql = 'select * from category';  
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->execute(); 
        try {
            $result = $stm -> get_result();
            $data = array();    
            while($row = $result -> fetch_assoc() ){
                $data[] = $row;
            };
            return $data;
        } catch (Exception $e) {
            return false;
        }
    };
    function get_category_byID($id){
        $sql = 'select * from category where id_category = ?';  
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('s',$id);
        $stm->execute();
        return $stm -> get_result() -> fetch_assoc();
    };

    function remove_product_byId($id){
        $sql = 'delete from product where id = ?';  
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('s',$id);
        if ($stm->execute()) {
            return true;
        } else {
            return false;
        }
    };

    function get_product_byID($id){
        $sql = 'select * from product where id = ?';  
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm -> bind_param('s',$id);
        $stm->execute();
        return $stm -> get_result() -> fetch_assoc();
    };



?>