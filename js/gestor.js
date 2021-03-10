function agregarArchivosGestor() {
    var formData = new FormData(document.getElementById('frmArchivos'));
    $.ajax({
        url:"../procesos/gestor/guardarArchivos.php",
        type: "POST",
        datatype: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#frmArchivos')[0].reset();
                $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
                swal({//que le salte el aviso OK
                    title: '¡Agregado!',
                    text: '¡Archivo agregado correctamente!',
                    type: 'success'
                });
            } else {
                swal({
                    title: 'Error',
                    text: 'Falló al Agregar',
                    type: 'error'
                });  
            }
        }
    });
}
function aliminarArchivo(idArchivo) {
    Swal.fire({
        title: '¿Estás seguro(a)?',
        text: "¡No podrás revertir esto!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, borrar!'
    })
    .then((resultado) => {
        if (resultado.value) {
            $.ajax({
                type: "POST",
                data: "idArchivo=" + idArchivo,
                url: "../procesos/gestor/eliminaArchivos.php",
                success:function(respuesta){
                    respuesta = respuesta.trim();
                    if (respuesta == 1) {
                        $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
                        Swal.fire({
                            title: '¡Eliminado!',
                            text: '¡Categoría eliminada correctamente!',
                            type: 'success'
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: 'Falló al Eliminar',
                            type: 'error'
                        });
                    }
                }
            })
        }
      })
}
function obtenerArchivoPorId(idArchivo) {
    $.ajax({
        type: "POST",
        data: "idArchivo=" + idArchivo,
        url: "../procesos/gestor/obtenerArchivo.php",
        success:function(respuesta){
            $('#archivoObtenido').html(respuesta);
        }
    });
}