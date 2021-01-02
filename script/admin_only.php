<!-- Código para impedir usuarios de entrarem em áreas do administrador -->
<?php
if (isset($_SESSION['Usuario']['id_tipo'])) {
        if($_SESSION['Usuario']['id_tipo'] != '1'){
        header('location:index.php?pagina=home&status=naoautorizado');
    }
}

?>
