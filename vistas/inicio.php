<?php 
    session_start();
    if (isset($_SESSION['usuario'])){
        include "../include/navegacion.php"; 
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            
            </div>
        </div>
    </div>


<?php 
    include "../include/footer.php";
    }else{
        header("location: ../index.php");
    }
?>