<?php 

include("conect.php");
$username=$_POST['username'];
$email=$_POST['email'];
$phone = $_POST['phone'];
$password=$_POST['password'];
$userType=$_POST['perfil'];

$query="INSERT INTO users (username,email,phone,password,perfil) VALUES ('$username','$email','$phone','$password','$userType')";
$answere = $conexion->query($query);

if ($answere){
    header ("Location:tablesTemporal.php");
}else{
    echo "Ha ocurrido un error";
}

?>