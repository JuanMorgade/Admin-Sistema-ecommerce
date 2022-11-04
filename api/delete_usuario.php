<?php
    include("../config/conexion.php");
    $response=new stdClass();

    $codusu=$_POST['codusu'];
    $sql=" DELETE from usuario
    where codusu=$codusu";
    $result=mysqli_query($con, $sql);
    if($result){
        $response->state=true;
    }else{
        $response->state=false;
        $response->detail="NO SE PUEDE ELIMINAR EL USUARIO";
    }

    echo json_encode($response);
    
        