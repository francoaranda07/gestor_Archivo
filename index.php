<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="librerias/bootstrap/bootstrap.min.css">
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
            <img src="img/icono.png" id="icon" alt="User Icon" />
            <h1>Gestor de Archivos</h1>
            </div>

            <!-- Login Form -->
            <form id="frmLogin" method="post" onsubmit=" return logear() ">
            <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuario" required="">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña" required="">
            <input type="submit" class="fadeIn fourth" value="Iniciar">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="registro.php">Registrarse</a>
            </div>

        </div>
    </div>
    <script src="librerias/jquery-3.5.1.min.js"></script>
    <script src="librerias/sweetalert.min.js"></script>
    <script src="librerias/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        function logear(){
            $.ajax({
                type: "POST",
                data:$('#frmLogin').serialize(),
                url:"procesos/usuario/login/login.php",
                success:function(respuesta){
                    if ( respuesta == 1) {
                        $("#frmLogin")[0].reset();
                        swal({//que le salte el aviso OK
                            title: 'Login correcto',
                            text: 'Presiona OK para abrir el Dashboard',
                            type: 'success'
                        })
                        .then($resultado =>{ //y despues lo redireccione a index.php
                            if($resultado.value){
                                window.location.href = 'vistas/inicio.php';
                            }
                        });
                    }else{
                        swal({
                            title: 'Error',
                            text: 'Datos incorrectos',
                            type: 'error'
                        });
                    }
                }
            });
            return false;
        }
    </script>
</body>
</html>