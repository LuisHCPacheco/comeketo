<?php
        session_start();
        
        $empresa = $_SESSION['id_empresa'];
        $user = $_POST['cmbUsuario'];    
        $comentario = $_POST['coment'];
		
        include_once '../conexao.php';                      
        $conn = new conexao();
        
        $sql = ("INSERT INTO coment_empresa(id_empresa, id_usuario, comentario) VALUES('$empresa', '$user', '$comentario')");
        $executa = mysqli_query($conn, $sql);

        header("Location: ../emp.php");
    ?>