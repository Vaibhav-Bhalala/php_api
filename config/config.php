<?php
class Config{

    public $HOSTNAME = "127.0.0.1";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DATABASE_NAME = "student_details";
    public $con_res;

    public function Connect(){

        $this->con_res = mysqli_connect($this->HOSTNAME,$this->USERNAME,$this->PASSWORD,$this->DATABASE_NAME);
        return $this->con_res;
    }

    public function insertStudent($grid,$name,$course,$city){
        $this->Connect();

        $query = "INSERT INTO student_detail(grid,name,course,city) VALUES ($grid,'$name','$course','$city');";

        $res = mysqli_query($this->con_res,$query);
        return $res;
    }

    public function fetchStudent(){
        $this->Connect();

        $query = "SELECT * FROM student_detail";

        $object = mysqli_query($this->con_res,$query);
        return $object;
    }

    public function DeleteStudent($id){
        $this->Connect();

        $query = "DELETE FROM student_detail WHERE id=$id; ";

        $object = mysqli_query($this->con_res,$query);
        return $res;
    }

    public function UpdateStudent($grid,$name,$course,$city,$id){
        $this->Connect();

        $query = "UPDATE student_detail SET grid='$grid',name='$name',course='$course',city='$city' WHERE id=$id; ";

        $object = mysqli_query($this->con_res,$query);
        return $res;
    }   

    public function insertUser($name,$email,$password){
       $this->Connect();

       $hash_password = password_hash($password,PASSWORD_DEFAULT);
       $query = "INSERT INTO user_details(name,email,password) VALUES ('$name','$email','$hash_password'); ";
       $res = mysqli_query($this->con_res,$query);
       return $res;
    }

    public function loginUser($email,$password){
        $this->Connect();

        $query = "SELECT * FROM user_details WHERE email=$email";
        $object = mysqli_query($this->con_res,$query);
        $record = mysqli_fetch_assoc($object);
        $hash_password = $record['password'];
        $islogin = password_verify($password,$hash_password);

        if($islogin){
            return true;
        }else{
            return false;
        }

    }


}
?>