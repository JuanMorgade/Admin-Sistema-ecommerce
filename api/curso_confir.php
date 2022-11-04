<?php
    include("../config/conexion.php");
    $response=new stdClass();

    $codped=$_POST['codped'];
    $sql="UPDATE pedido set estado=3
    where codped=$codped";
    $result=mysqli_query($con, $sql);
    if($result){
        $response->state=true;
    }else{
        $response->state=false;
        $response->detail="NO SE ACTUALIZO EL ESTADO";
    }

    echo json_encode($response);    