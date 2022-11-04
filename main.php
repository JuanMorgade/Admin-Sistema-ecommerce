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
            <h2 class="subtitulo mt-5 text-center">USUARIOS A PAGAR</h2>
            <br><br>
        </div>
    </section>
        <table class="table_main">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Usuario</th>
                    <th>Producto</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Teléfono</th>
                    <th class="td-option">Opciones</th>
                </tr>
            </thead>

            <tbody>
            <?php
						$sql="SELECT ped.*,usu.*,pro.*,CASE WHEN ped.estado=2 then 'Por Pagar' ELSE 'Otro' END estadotexto from pedido ped
                        inner join usuario usu
                        on ped.codusu=usu.codusu
                        inner join producto pro
                        on ped.codpro=pro.codpro
                        where ped.estado=2";
						$resultado=mysqli_query($con,$sql);
						while ($row=mysqli_fetch_array($resultado)) {
							echo 
					'<tr>
						<td>'.$row['codped'].'</td>
						<td>'.$row['codusu'].' - '.$row['nomusu'].' '.$row['apeusu'].'</td>
						<td>'.$row['codpro'].' - '.$row['nompro'].' - $'.$row['prepro'].'</td>
						<td>'.$row['fecped'].'</td>
                        <td>'.$row['estadotexto'].'</td>
                        <td>'.$row['telusuped'].'</td>
						<td class="td-option">
							<button onclick="pagado('.$row['codped'].')" class="boton_tabla">PAGADO</button>
						</td>
					</tr>';
						}
			    ?>
            </tbody>
        </table>
                        
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
<script type="text/javascript">
        function pagado(codped){
            let fd = new FormData();
            fd.append('codped',codped);
            
            let request = new XMLHttpRequest();
            request.open('POST','api/curso_confir.php',true);
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
    </script> 
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
    <?php include("layouts/footer.php")?>
</body>

</html>