<?php
		$nome = $_POST['nomeCad'];
		$senha = $_POST['senhaCad'];
		$email = $_POST['emailCad'];
        $perfil = '2';
        $senhaCodificada = hash('sha256', $senha);
		
        include_once '../conexao.php';                      
        $conn = new conexao();
        
		$sql = ("INSERT INTO usuario(id_perfil, nome, email, senha) VALUES('$perfil', '$nome', '$email', '$senhaCodificada')");
        
        $executa = mysqli_query($conn, $sql);
        
        header("Location: ../f4610aa514477222afac2b77f971d069780ca2846f375849f3dfa3c0047ebbd1.php");
    ?>