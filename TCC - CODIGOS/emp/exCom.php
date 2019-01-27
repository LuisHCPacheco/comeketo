<?php
    session_start();

    $nome = $_POST['nomeComida'];
    $id_empresa = $_SESSION['id_empresa'];

    include_once '../conexao.php';                      
    $conn = new conexao();

    $sql = "DELETE FROM cardapio WHERE nome = '$nome' AND id_empresa = '$id_empresa'";
    $resultado = mysqli_query($conn, $sql);
    
    header("Location: cardapio.php");
?>