<?php
    include('config/conexion.php');
    session_start();
?>
<?php
    if($codusu=$_SESSION['codusu']== ''){
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--FONTS DE GOOGLE -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--MI CSS-->
    <!--<link rel="stylesheet" href="css/estilo.css">-->
    <!-- CSS DE AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Administracion-Sistema-ecommerce/Principal</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include("layouts/directorios.php")?>

<article>
    <section class="row">
        <div class="col-12 mt-5">
            <br><br>
            <h2 class="subtitulo mt-5 text-center">LOS USUARIOS</h2>
            <br><br>
        </div>
    </section>
        <table class="table_main">
            <thead>
                <tr>
                    <th>Codigo, Nombre y Apellido</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th class="td-option">Opciones</th>
                </tr>
            </thead>

            <tbody>
            <?php
            
						$sql="SELECT * from usuario";
						$resultado=mysqli_query($con,$sql);
						while ($row=mysqli_fetch_array($resultado)) {
							echo 
					'<tr> 
                        <td>'.$row['codusu'].' - '.$row['nomusu'].' '.$row['apeusu'].'</td>
						<td>'.$row['emausu'].'</td>
                        <td> ******** </td>
						<td class="td-option">
							<div class="div-flex div-td-button">
								<button onclick="edit_usuario('.$row['codusu'].')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
								<button onclick="delete_usuario('.$row['codusu'].')"><i class="fa fa-trash" aria-hidden="true"></i></button>
							</div>
						</td>
					</tr>';
						}
					?>
            </tbody>
        </table>
        <button class="mt10" onclick="modal()">Agregar Nuevo</button>                  
</article>
<script type="text/javascript">
        function mostrar_opciones(){
            if(document.getElementById("ctrl-menu").style.display=="none"){
                document.getElementById("ctrl-menu").style.display="block";
            }else{
                document.getElementById("ctrl-menu").style.display="none";
            } 
        }
    </script>
    <div class="menu-opciones" id="ctrl-menu" style="display: none;">
        <ul>
            <li><a href="api/logout.php">
                    <div class="menu-opcion">Cerrar Sesión</div>
                </a>
            </li>
        </ul>
    </div>
    
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous">
    </script>
    <!--SCRIPT DE AOS-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script type="text/javascript">
        function modal(){
            const { value: formValues } = Swal.fire({
            title: 'Añadir Nuevo Curso',
            html: 
                    '<label style = padding:10px>Nombre:</label>'+
                    '<input   type="text" id="nombre">'+
                    '<br>'+
                    '<label style = padding:10px>Apellido:</label>'+
                    '<input   type="text" id="apellido">'+
                    '<br>'+
                    '<label style = padding:10px>Email:</label>'+
                    '<input  type="text" id="email">'+
                    '<br>'+
                    '<label style = padding:10px>Contraseña:</label>'+
                    '<input  type="password" id="contraseña">'+
                    '<br>'+
                    '<label style = padding:10px>Estado</label>'+
                    '<select id="estado">'+
                        '<option value="1">Activo</option>'+
                        '<option value="0">Inactivo</option>'+
                    '</select>'+
                    '<br>'+
                    '<button onclick="save_usuario()">Guardar</button>',
            confirmButtonText: 'Cerrar',
            width: '70%',
            })

            if (formValues) {
            Swal.fire(JSON.stringify(formValues))
            }
        }

        function modal_edit(){
            const { value: formValues } = Swal.fire({
            title: 'Añadir Nuevo Curso',
            html: 
                    '<label style = padding:10px>Código: </label>'+
                    '<input style = text-align:center type="text" id="codigo-e" disabled>'+
                    '<br>'+
                    '<label style = padding:10px>Nombre:</label>'+
                    '<input   type="text" id="nombre-e">'+
                    '<br>'+
                    '<label style = padding:10px>Apellido:</label>'+
                    '<input   type="text" id="apellido-e">'+
                    '<br>'+
                    '<label style = padding:10px>Email:</label>'+
                    '<input  type="text" id="email-e">'+
                    '<br>'+
                    '<label style = padding:10px>Contraseña:</label>'+
                    '<input  type="number" id="contraseña-e">'+
                    '<br>'+
                    '<label style = padding:10px>Estado</label>'+
                    '<select id="estado-e">'+
                        '<option value="1">Activo</option>'+
                        '<option value="0">Inactivo</option>'+
                    '</select>'+
                    '<br>'+
                    '<button onclick="update_usuario()">Actualizar</button>',
            confirmButtonText: 'Cerrar',
            width: '70%',
            })

            if (formValues) {
            Swal.fire(JSON.stringify(formValues))
            }
        }

        function save_usuario(){
            let fd = new FormData();
            fd.append('nombre',document.getElementById('nombre').value);
            fd.append('apellido',document.getElementById('apellido').value);
            fd.append('email',document.getElementById('email').value);
            fd.append('contraseña',document.getElementById('contraseña').value);
            fd.append('estado',document.getElementById('estado').value);
            let request = new XMLHttpRequest();
            request.open('POST','api/usuario_save.php',true);
            request.onload=function(){
                if(request.readyState == 4 && request.status ==200){
                    let response=JSON.parse(request.responseText);
                    console.log(response);
                    if(response.state){
                        Swal.fire({
                            title: "CORRECTO",
                            icon: "success",
                            timer: 2500
                        });
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    }else{
                        Swal.fire({
                            title: response.detail,
                            icon: "error",
                            timer: 2500
                        });
                        
                    }
                }
                console.log(request);
            }
            request.send(fd);
        }


         function delete_usuario(codusu){
            var c=confirm("Estas Seguro de eliminar el Usuario de Codigo: "+codusu+" ?");
            if(c){
                let fd = new FormData();
            fd.append('codusu',codusu);
            let request = new XMLHttpRequest();
            request.open('POST','api/delete_usuario.php',true);
            request.onload=function(){
                if(request.readyState == 4 && request.status ==200){
                    let response=JSON.parse(request.responseText);
                    console.log(response);
                    if(response.state){
                        Swal.fire({
                            title: "USUARIO ELIMINADO",
                            icon: "success",
                            timer: 2500
                        });
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                        
                    }else{
                        Swal.fire({
                            title: response.detail,
                            icon: "error",
                            timer: 2500
                        });
                        
                    }
                }
                console.log(request);
            }
            request.send(fd);
            }
        }

        function edit_usuario(codusu){
            
            let fd = new FormData();
            fd.append('codusu',codusu);
            let request = new XMLHttpRequest();
            request.open('POST','api/get_usuario.php',true);
            request.onload=function(){
                if(request.readyState == 4 && request.status ==200){
                    let response=JSON.parse(request.responseText);
                    console.log(response);
                    modal_edit();
                    document.getElementById("codigo-e").value=codusu;
                    document.getElementById("nombre-e").value=response.product.nomusu;
                    document.getElementById("apellido-e").value=response.product.apeusu;
                    document.getElementById("email-e").value=response.product.emausu;
                    document.getElementById("contraseña-e").value=response.product.pasusu;
                    document.getElementById("estado-e").value=response.product.estado;
                    
                }
                console.log(request);
            }
            request.send(fd);
            
        }

        function update_usuario(){
            let fd = new FormData();
            fd.append('codigo',document.getElementById('codigo-e').value);
            fd.append('nombre',document.getElementById('nombre-e').value);
            fd.append('apellido',document.getElementById('apellido-e').value);
            fd.append('email',document.getElementById('email-e').value);
            fd.append('contraseña',document.getElementById('contraseña-e').value);
            fd.append('estado',document.getElementById('estado-e').value);
            let request = new XMLHttpRequest();
            request.open('POST','api/usuario_update.php',true);
            request.onload=function(){
                if(request.readyState == 4 && request.status ==200){
                    let response=JSON.parse(request.responseText);
                    console.log(response);
                    if(response.state){
                        Swal.fire({
                            title: "CURSO ACTUALIZADO",
                            icon: "success",
                            timer: 2500
                        });
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    }else{
                        Swal.fire({
                            title: response.detail,
                            icon: "error",
                            timer: 2500
                        });
                        
                    }
                }
                console.log(request);
            }
            request.send(fd);
        }
    </script>
    <?php include("layouts/footer.php")?>
</body>

</html>