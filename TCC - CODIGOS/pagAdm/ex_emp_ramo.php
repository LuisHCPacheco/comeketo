<?php
		$nome = $_POST['cmbEmpresa'];
        $ramo = $_POST['cmbRamo'];

        include_once '../conexao.php';                      
        $conn = new conexao();
        
        $sql = mysqli_query($conn, "DELETE FROM empresa_ramo WHERE id_empresa = '$nome'");
        
        header("Location: ../f4610aa514477222afac2b77f971d069780ca2846f375849f3dfa3c0047ebbd1.php");
?>