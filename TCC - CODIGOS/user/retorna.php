<?php
    session_start();

    $idEmp = $_SESSION['idEmp'];
    
    session_unset($_SESSION['valorTotal']);

    header("Location: cardapio.php?pegaId=$idEmp");
?>