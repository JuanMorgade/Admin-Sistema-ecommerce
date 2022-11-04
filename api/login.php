<?php
//1: ERROR DE CONEXION
//2: EMAIL INVALIDO
//3: CONTRASEÑA INVALIDA
include("../config/conexion.php");
$emausua=$_POST['emausu'];
$sql="SELECT * FROM usuarioadmin WHERE emausua='$emausua'";

$result=mysqli_query($con,$sql);
if($result){
    $row=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);
    if($count!=0){
        $pasusu=$_POST['pasusu'];
        if($row['pasusua']!=$pasusu){
            header('Location: ../index.php?e=3');
        }else{
            session_start();
            $_SESSION['codusu']=$row['codusua'];
            $_SESSION['emausu']=$row['emausua'];
            $_SESSION['nomusu']=$row['nomusua'];
            header('Location: ../main.php');
        }
    }else{
       
        header('Location: ../index.php?e=2');
    }
}else{
    
    header('location: ../index.php?e=1');
}