<?php
    $id = $_POST['excluiRamo'];

    include_once '../conexao.php';                      
    $conn = new conexao();

    $sql = mysqli_query($conn, "DELETE FROM ramo WHERE id_ramo = '$id'");
    $sql2 = mysqli_query($conn, "DELETE FROM empresa_ramo WHERE id_ramo = '$id'");
        
    header("Location: ../f4610aa514477222afac2b77f971d069780ca2846f375849f3dfa3c0047ebbd1.php");
?>