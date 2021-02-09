function agregarCategoria() {
    var categoria = $('#nombreCategoria').val();
    if (categoria == "") {
        Swal.fire({
            type: 'warning',
            title: '¡Atención!',
            text: '¡Una categoría no puede ir vacía!'
        })
        return false;
    } else {
        $.ajax({
            type: "POST",
            data: "categoria=" + categoria,
            url: "../procesos/categorias/agregarCategoria.php",
            success: function(respuesta){
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    $('#tablaCategorias').load("categorias/tablaCategoria.php");
                    $('#nombreCategoria').val("");
                    Swal.fire({
                        type: 'success',
                        title: '¡Correcto!',
                        text: '¡Se agregó con éxito!'
                    })
                } else {
                    Swal.fire({
                        type: 'error',
                        title: '¡Hubo un error!',
                        text: 'Falló al agregar'
                    })
                }
            }
        });
    }
}
function eliminarCategorias(idCategoria) {
    idCategoria = parseInt(idCategoria);
    if (idCategoria < 1) {
        swal({
            title: '¡Advertencia!',
            text: 'No se encontró',
            type: 'info'
        });
    } else {
        Swal.fire({
            title: '¿Estás seguro(a)?',
            text: "¡No podrás revertir esto!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, borrar!'
          }).then((resultado) => {
            if (resultado.value) {
                $.ajax({
                    type: "POST",
                    data: "idCategoria=" + idCategoria,
                    url: "../procesos/categorias/eliminarCategoria.php",
                    success:function(respuesta) {
                        respuesta = respuesta.trim();
                        if (respuesta == 1) {
                            $('#tablaCategorias').load("categorias/tablaCategoria.php");
                            swal({//que le salte el aviso OK
                                title: '¡Eliminado!',
                                text: '¡Categoría eliminada correctamente!',
                                type: 'success'
                            });
                        } else {
                            swal({
                                title: 'Error',
                                text: 'Falló al Eliminar',
                                type: 'error'
                            });
                        }

                    }
                });
              
            }
        });
    }
}
function obtenerDatosCategoria(idCategoria) {
    $.ajax({
        type:"POST",
        data:"idCategoria=" + idCategoria,
        url:"../procesos/categorias/obtenerCategoria.php",
        success:function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#idCategoria').val(respuesta['idCategoria']);
            $('#categoriaU').val(respuesta['nombreCategoria']);
        }
    })
}
function actualizaCategoria() {
    if ($('#categoriaU').val() == "") {
        swal({
            title: '¡Atención!',
            text: '¡Una categoría no puede ir vacía!',
            type: 'warning'
        })
        return false;
    } else {
        $.ajax({
            type:"POST",
            data:$('#frmActualizaCategoria').serialize(),
            url:"../procesos/categorias/actualizaCategoria.php",
            success:function(respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    $('#tablaCategorias').load("categorias/tablaCategoria.php");
                    swal({//que le salte el aviso OK
                        title: '¡Actualizada!',
                        text: '¡Categoría actualizada correctamente!',
                        type: 'success'
                    });
                } else {
                    swal({
                        title: 'Error',
                        text: 'Falló al Actualizar',
                        type: 'error'
                    });   
                }
            }
        })
    }
}