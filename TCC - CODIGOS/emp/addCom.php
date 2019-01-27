<?php
        session_start();
		// ADICIONAR QUANTIDADE DA COMIDA
        $nome = $_POST['nomeCom'];
		$descricao = $_POST['desCom'];
        $id_empresa = $_SESSION['id_empresa'];
        $preco = $_POST['precoCom'];
        $tipo = $_POST['cmbTipo'];

        include_once '../conexao.php';                      
        $conn = new conexao();
        
		$sql = ("INSERT INTO cardapio(id_tipo, id_empresa, nome, ingredientes, preco, nota) VALUES('$tipo', '$id_empresa', '$nome', '$descricao', '$preco', '0')");

        $executa = mysqli_query($conn, $sql);
        header("Location: cardapio.php");
    ?>