<?php
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$conn= new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('connection faild :'.$conn->connect_error);
}else{
$stmt=$conn->prepare("insert into registration (name,email,phone) values(?,?,?)");
$stmt->bind_param("ssi",$name,$email,$phone);
$stmt->execute();
echo "registration successfully...";
$stmt->close();
$conn->close();
}


?>