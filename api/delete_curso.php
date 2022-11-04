<?php
    include("../config/conexion.php");
    $response=new stdClass();

    $codpro=$_POST['codpro'];
    $sql=" DELETE from producto
    where codpro=$codpro";
    $result=mysqli_query($con, $sql);
    if($result){
        $response->state=true;
    }else{
        $response->state=false;
        $response->detail="NO SE PUEDE ELIMINAR EL CURSO";
    }

    echo json_encode($response);    