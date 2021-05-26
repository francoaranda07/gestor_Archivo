function VerCantArchivos(idUsuario){
    $.ajax({
        type:"POST",
        data: "idUsuario=" + idUsuario,
        url:"../procesos/inicio/cantArchivos.php",
        success:function(result) {
            document.querySelector('#CantidadArchivo').innerHTML +=`
                <div class="card-body"><h3><i class="fas fa-file"></i> ${result}</h3>Archivos</div>
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
                <div class="card-body"><h3><i class="fas fa-clipboard"></i> ${result}</h3>Categorías</div>
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
                <div class="card-body"><h3><i class="fas fa-globe"></i> ${result}</h3>Archivos públicos</div> 
        `;
        }
    })
    
}