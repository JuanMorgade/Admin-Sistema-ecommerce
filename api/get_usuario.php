<?php
    include("../config/conexion.php");
    $response=new stdClass();

    $codusu=$_POST['codusu'];
    $sql="SELECT * from usuario WHERE codusu=$codusu";
    $result=mysqli_query($con, $sql);
    $row=mysqli_fetch_array($result);
    $obj=new stdClass();
    $obj->nomusu=utf8_encode($row['nomusu']);
    $obj->apeusu=utf8_encode($row['apeusu']);
    $obj->emausu=utf8_encode($row['emausu']);
    $obj->pasusu=$row['pasusu'];
    $obj->estado=$row['estado'];
    $response->product=$obj;

echo json_encode($response);    