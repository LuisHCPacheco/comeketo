<?php
    session_start();
    $id_empresa = $_SESSION['id_empresa'];
    $nome = $_POST['nomeEmp'];
    $cidade = $_POST['cidadeEmp'];
    $bairro = $_POST['bairroEmp'];
    $rua = $_POST['ruaEmp'];
    $numero = $_POST['numeroEmp'];
    $especific = $_POST['especificEmp'];
    $telefone1 = $_POST['telefone1Emp'];
    $telefone2 = $_POST['telefone2Emp'];
    $mapa = $_POST['mapa'];
        
    include_once '../conexao.php';                      
    $conn = new conexao();

    $att = "UPDATE empresa SET nome = '$nome', cidade = '$cidade', bairro = '$bairro', rua = '$rua', numero = '$numero', especific = '$especific', telefone1 = '$telefone1', telefone2 = '$telefone2', mapa = '$mapa' WHERE id = '$id_empresa';";
        
    $executaNome = mysqli_query($conn, $att);

    header("Location: ../emp.php");
?>