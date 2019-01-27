<?php
		$empresa = $_POST['cmbEmp'];
        $dono = $_POST['cmbDono'];

        include_once '../conexao.php';                      
        $conn = new conexao();
        
		$sql = ("INSERT INTO dono VALUES('$empresa', '$dono')");
        
        $executa = mysqli_query($conn, $sql);
        
        header("Location: ../f4610aa514477222afac2b77f971d069780ca2846f375849f3dfa3c0047ebbd1.php");
?>