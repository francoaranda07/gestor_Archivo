function VerCantArchivos(idUsuario){
    $.ajax({
        type:"POST",
        data: "idUsuario=" + idUsuario,
        url:"../procesos/inicio/cantArchivos.php",
        success:function(result) {
            document.querySelector('#CantidadArchivo').innerHTML +=`
                <h3><i class="fas fa-file"></i> ${result}</h3>
            `;  
        }
    })
}
function VerCantCategoria(idUsuario){
    $.ajax({
        type:"POST",
        data: "idUsuario=" + idUsuario,
        url:"../procesos/inicio/cantCategorias.php",
        success:function(result) {
            document.querySelector('#CantidadCategoria').innerHTML +=`
                <h3><i class="fas fa-clipboard"></i> ${result}</h3>
        `;  
        }
    })
    
}
function VerCantArchiPublic(idUsuario){
    $.ajax({
        type:"POST",
        data: "idUsuario=" + idUsuario,
        url:"../procesos/inicio/cantArchiPublic.php",
        success:function(result) {
            document.querySelector('#ContArchiPublico').innerHTML +=`
                <h3><i class="fas fa-globe"></i> ${result}</h3>
        `;
        }
    })
    
}