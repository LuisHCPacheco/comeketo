<?php
        session_start();

		$comida = $_POST['cmbComida'];
		$desc = $_POST['desCom'];
		$preco = $_POST['precoCom'];
		$tipo = $_POST['tipoCom'];
        $id_empresa = $_SESSION['id_empresa'];
		
        include_once '../conexao.php';
        $conn = new conexao();
                
        $sql = "UPDATE cardapio SET id_tipo = '$tipo', ingredientes = '$desc', preco = '$preco' WHERE id = '$comida'";
        $executa = mysqli_query($conn, $sql);
        header("Location: cardapio.php");
?>