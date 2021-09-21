<?php 

include("conect.php");


$id=$_REQUEST['id'];
$username=$_POST['username'];
$email=$_POST['email'];
$phone = $_POST['phone'];
$password=$_POST['password'];
$userType=$_POST['perfil'];

echo $id;


    $query = "UPDATE users SET username='$username' , email='$email', phone='$phone',password='$password', perfil='$userType' WHERE id = '$id' ";
    
    
    //echo $query;

    
    $answer = $conexion -> query($query);
    

    if ($answer){
        header ("Location:dashboard.php");
    }else{
        echo "Ha ocurrido un error";
        echo "  Seleccione un perfil para el usuario Administrador / usuario";
        echo $query;
    }

?>
