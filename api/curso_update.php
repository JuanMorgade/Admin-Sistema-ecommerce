<?php
    include("../config/conexion.php");
    $response=new stdClass();

    //$response->state = true;

    $codpro=$_POST['codigo'];
    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    $precio=$_POST['precio'];
    $estado=$_POST['estado'];

    if($nombre ==""){
        $response->state=false;
        $response->detail="Falta Nombre";
        
    }else{
        if($descripcion ==""){
            $response->state=false;
            $response->detail="Falta Descripcion";
        }else{
            if($precio ==""){
                $response->state=false;
                $response->detail="Falta Precio";
                
            }else{
                if($estado ==""){
                    $response->state=false;
                    $response->detail="Falta Estado";
                    
                }else{
                    $sql="UPDATE producto SET nompro='$nombre', despro='$descripcion', prepro='$precio', estado='$estado'
                    WHERE codpro=$codpro";
                    $result=mysqli_query($con,$sql);
                    if($result){
                        $response->state=true;
                    }else{
                        $response->state=false;
                        $response->detail="No Se Pudo Guardar el Producto";
                    }
                    
                }
            }
        }
    }

    echo json_encode($response);