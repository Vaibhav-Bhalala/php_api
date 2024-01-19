<?php
header("Access-Control-Allow-Methods: POST");

include("../config/config.php");

$config = new Config();
if($_SERVER['REQUEST_METHOD'] == POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $responce = $config->insertUser($name,$email,$password);

    if($responce){
        $res['data'] = "Signup Successfully...";
    }else{
        $res['error'] = "Signup Failed...";
    }
}else{
    $res['error'] = "Only POST http Method is Allowed...";
}

echo json_encode($res);
?>