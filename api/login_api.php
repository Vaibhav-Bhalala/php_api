<?php
header("Access-Control-Allow-Methods: POST");

include("../config/config.php");

$config = new Config();
if($_SERVER['REQUEST_METHOD'] == POST){
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $responce = $config->loginUser($email,$password);

    if($responce){
        $res['data'] = "Login Successfully...";
    }else{
        $res['error'] = "Login Failed...";
    }
}else{
    $res['error'] = "Only POST http Method is Allowed...";
}

echo json_encode($res);
?>