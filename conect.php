<?php 

    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        //echo 'use Windows';
        $conexion = new mysqli("localhost", "root", "","proyectodellamadas");
        
    }
    else{    
        //echo 'didnt use Windows';
        $conexion = new mysqli("localhost", "pi", "raspberry","proyectodellamadas");
    }

?>
