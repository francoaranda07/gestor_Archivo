<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="librerias/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="librerias/jquery-ui-1.12.1/jquery-ui.theme.css">
    <link rel="stylesheet" href="librerias/jquery-ui-1.12.1/jquery-ui.css">
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
            
                <h1>Crear Cuenta</h1>
            </div>

            <!-- Login Form -->
            <form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
                <label>Nombre</label>
                <input type="text" id="nombre" class="form-control" name="nombre" required="">
                <label for="">Fecha de Nacimiento</label>
                <input type="text" id="fechaNacimiento" class="form-control" name="fechaNacimiento" required="">
                <label>Email o Correo</label>
                <input type="text" name="correo" id="correo" class="form-control" required="">
                <label>Nombre de usuario</label>
                <input type="text" name="usuario" id="usuario" class="form-control" required="">
                <label> Password o Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required="">  

                <div class="row mt-3">
                    <div class="col-sm-6 text-left">
                        <button class="btn btn-primary">Registrarse</button>
                    </div>
                </div>
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
            <a class="underlineHover" href="index.php">Inicia Sesión</a>
            </div>

        </div>
    </div>
    <script src="librerias/jquery-3.5.1.min.js"></script>
    <script src="librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="librerias/sweetalert.min.js"></script>
    <script src="librerias/sweetalert2.all.min.js"></script>
    <script type="text/javascript">

        $(function() {
            var fechaA = new Date();
            var yyyy = fechaA.getFullYear();
            $("#fechaNacimiento").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: '1900:' + yyyy,
                dateFormat: "dd-mm-yy"
            });
        });

        function agregarUsuarioNuevo() {
            $.ajax({
                method: "POST",
                data: $('#frmRegistro').serialize(),
                url: "procesos/usuario/registro/agregarUsuario.php",
                success:function(respuesta){
                    // console.log(respuesta)
                    respuesta = respuesta.trim();
                    if ( respuesta == 1 ) {
                        $("#frmRegistro")[0].reset();
                        swal({//que le salte el aviso OK
                            title: 'Registro correcto',
                            text: 'Presiona OK para Inciar Sesión',
                            type: 'success'
                        })
                        .then($resultado =>{ //y despues lo redireccione a index.php
                            if($resultado.value){
                                window.location.href = 'index.php';
                            }
                        });
                    }else if( respuesta == 2){
                        swal({
                            title: '¡Advertencia!',
                            text: 'Este usuario ya existe, por favor ingresa otro.',
                            type: 'info'
                        });
                    }else{
                        //hubo un error
                        swal({
                            title: 'Error',
                            text: 'Falló el Registro',
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