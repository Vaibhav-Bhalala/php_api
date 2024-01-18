<?php
  include("config/config.php");

  $config = new Config();

  $res = $config->Connect();

 if(isset($_REQUEST['btn'])){
  $grid = $_REQUEST['grid'];
  $name = $_REQUEST['name'];
  $course = $_REQUEST['course'];
  $city = $_REQUEST['city'];

  $res = $config->insertStudent($grid,$name,$course,$city);
  
  if($res){
    echo "success..";
  }else{
    echo "Failed...";
  }
 }
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home Page</title>
</head>
<body>

<form action="" method="GET">
    <br> GRID :- <input type="number" name="grid"> </br>
    <br> NAME :- <input type="text" name="name"> </br>
    <br> COURSE :- <input type="text" name="course"> </br>
    <br> CITY :- <input type="text" name="city"> </br>
    <button name="btn">SUBMIT</button>


</form>

</body>
</html>