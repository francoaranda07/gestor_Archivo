<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="shortcut icon" href="img/icono.png" type="image/jpg"><!--Para colocar el icono de la pag-->
    <link rel="stylesheet" href="librerias/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
        $("a[title|='Hosted on free web hosting 000webhost.com. Host your own website for       FREE.']").css("display", "none");
        $("img[alt|='www.000webhost.com']").css("display", "none");
        });
    </script>
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
            <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuario">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña">
            <input type="submit" class="fadeIn fourth" value="Iniciar">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="registro">Registrarse</a>
            </div>

        </div>
    </div>
    <script src="librerias/jquery-3.5.1.min.js"></script>
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
                        .then($resultado =>{ //y despues lo redireccione a inicio.php
                            if($resultado.value){
                                window.location.href = 'https://sistemafranco.000webhostapp.com/vistas/inicio';
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