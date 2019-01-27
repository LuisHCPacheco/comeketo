<?php
    $nome = $_POST['nomeEmp'];
    $cidade = $_POST['cidadeEmp'];
    $bairro = $_POST['bairroEmp'];
    $rua = $_POST['ruaEmp'];
    $numero = $_POST['numeroEmp'];
    $especific = $_POST['especificEmp'];
    $telefone = $_POST['telefone1Emp'];
    $telefone2 = $_POST['telefone2Emp'];


    include_once '../conexao.php';                      
    $conn = new conexao();

    $sql = ("INSERT INTO empresa(nome, nota, foto, cidade, bairro, rua, numero, especific, telefone1, telefone2, mapa) VALUES('$nome', '0', 'perfil.jpg', '$cidade', '$bairro', '$rua', '$numero', '$especific', '$telefone', '$telefone2', 'mapa')");

    $executa = mysqli_query($conn, $sql);
    header("Location: ../f4610aa514477222afac2b77f971d069780ca2846f375849f3dfa3c0047ebbd1.php");
    ?>