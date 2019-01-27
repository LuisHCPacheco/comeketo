<?php
    session_start();
    $id_empresa = $_SESSION['id_empresa'];
    $senha = $_POST['senha'];
    $senhaCodificada = hash('sha256', $senha);

    include_once '../conexao.php';                      
    $conn = new conexao();


    $sql = "SELECT * FROM dono WHERE id_empresa = '$id_empresa'";
    $executa = mysqli_query($conn, $sql);

    while($teste = mysqli_fetch_assoc($executa)) {
        $_SESSION['empresa'] = $teste['nome'];
        $sql2 = mysqli_query($conn, "SELECT * FROM usuario WHERE nome = '.$teste['nome'].'");
        
        while($senha2 = mysqli_fetch_assoc($sql2)){
            $att = ("UPDATE usuario SET senha = '$senhaCodificada' WHERE id = '$senha2['id']';");
            header("Location: ../emp.php");
        }        
    }
?>