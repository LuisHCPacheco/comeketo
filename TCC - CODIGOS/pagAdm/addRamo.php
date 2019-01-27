<?php
		$nome = $_POST['addRamo'];
		
        include_once '../conexao.php';                      
        $conn = new conexao();
        
		$sql = ("INSERT INTO ramo(ramo) VALUES('$nome')");
        
        $executa = mysqli_query($conn, $sql);
        
        header("Location: ../f4610aa514477222afac2b77f971d069780ca2846f375849f3dfa3c0047ebbd1.php");
?>