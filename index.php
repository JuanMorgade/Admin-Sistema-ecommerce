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

    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Administracion-Sistema-ecommerce/Principal</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
<body>
    

    <article>
        <section class="row">
            <div class="col-12 mt-5">
            <br><br>
            <h2 class="subtitulo mt-5 text-center">INGRESE A SU CUENTA ADMINISTRADORA</h2>
        </div>
        </section>
        <form action="api/login.php" method="POST" class="form_login">
				<h3>Iniciar sesión</h3>
               
				<input type="text" name="emausu" placeholder="Correo">
				<input type="password" name="pasusu" placeholder="Contraseña">
				<?php
					if (isset($_GET['e'])) {
						switch ($_GET['e']) {
							case '1':
								echo '<p>Error de conexión</p>';
								break;	
							case '2':
								echo '<p>Email inválido</p>';
								break;	
							case '3':
								echo '<p>Contraseña incorrecta</p>';
								break;							
							default:
								break;
						}
					}
				?>
				<button type="submit">Ingresar</button>
			</form>
    </article>
        
    <?php include("layouts/footer.php")?>
</body>
</html>