<!DOCTYPE html>
<html>
<head>
    <title>Tabla</title>
</head>
<body>
    <center> 
        <table bgcolo="green" border =2> 
            <thead> 
             <th colspan="1"><a href='register.php'> Nuevo </a> </th>
             <th colspan ="7"> Lista de Usuarios </th>   
            </thead>
            <tbody>
                <tr>
                    <td>ID </td>
                    <td>Nombre </td>
                    <td>Correo </td>
                    <td>Telefono </td>
                    <td>Contraseña </td>
                    <td>Perfil </td>
                    <td>Editar </td>
                    <td>Eliminar </td>
                </tr>
                <?php 
                include("conect.php");
                $query="SELECT * FROM users";
                $answer = $conexion -> query($query);
                while ($row=$answer->fetch_assoc()){
                ?>
                <tr>
                    <td> <?php echo $row['id']; ?></td>
                    <td> <?php echo $row['username']; ?></td>
                    <td> <?php echo $row['email']; ?></td>
                    <td> <?php echo $row['phone']; ?></td>
                    <td> <?php echo $row['password']; ?></td>
                    <td> <?php echo $row['perfil']; ?></td>
                    <td> <a href="modificar.php?id=<?php echo $row ['id'];?>">Modificar </a></td>
                    <td> <a href="#">Eliminar </a></td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    </center>    
</body>
</html>