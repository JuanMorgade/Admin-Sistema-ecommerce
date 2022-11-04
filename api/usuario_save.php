<?php
    include("../config/conexion.php");
    $response=new stdClass();

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $contraseña=$_POST['contraseña'];
    $estado=$_POST['estado'];

    if($nombre ==""){
        $response->state=false;
        $response->detail="Falta Nombre";
        
    }else{
        if($apellido ==""){
            $response->state=false;
            $response->detail="Falta Apellido";
        }else{
            if($email ==""){
                $response->state=false;
                $response->detail="Falta Email";
            }else{
                if($contraseña ==""){
                    $response->state=false;
                    $response->detail="Falta Contraseña";
                    
                }else{
                    if($estado ==""){
                        $response->state=false;
                        $response->detail="Falta Estado";
                        
                    }else{
                        $sql="INSERT INTO usuario (nomusu, apeusu, emausu, pasusu, estado)
                        VALUES ('$nombre','$apellido','$email','$contraseña','$estado')";
                        $result=mysqli_query($con,$sql);
                        if($result){
                            $response->state=true;
                        }else{
                            $response->state=false;
                            $response->detail="No Se Pudo Guardar el Usuario";
                        }
                        
                    }
                }
            }
        }
        
    }

    echo json_encode($response);
