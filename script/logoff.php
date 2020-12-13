<?php
if (!isset($_SESSION))
{
  session_start();
}

if(session_destroy()){
    echo "Sessão destruida";
} else {
    echo "Erro na DEVASTAÇÃO";
}

header('location:../index.php?pagina=home&status=desconectado')
?>