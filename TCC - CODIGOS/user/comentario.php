<?php
        session_start();
        
        $user = $_SESSION['id_usuario'];
        $empresa = $_POST['cmbEmpresa'];    
        $comentario = $_POST['coment'];
		$nota = $_POST['estrela'];
		
        include_once '../conexao.php';                      
        $conn = new conexao();
        $notaEmp = "SELECT * FROM empresa WHERE id = '$empresa'";
        $resultado = mysqli_query($conn, $notaEmp);
        
        if($notaEmp == 0) {
            while($registro = mysqli_fetch_assoc($resultado)){
                $_SESSION['nota'] = $registro['nota'];

                if($_SESSION['nota'] == 0){
                    $ins = mysqli_query($conn, "INSERT INTO coment_usuario(id_usuario, id_empresa, comentario, nota) VALUES ('$user', '$empresa', '$comentario', '$nota')");
                    $upd = mysqli_query($conn, "UPDATE empresa SET nota = '$nota' WHERE id = '$empresa'");
                    header("Location: ../user.php");
                }
                else{
                    $novaNota = ($_SESSION['nota'] + $nota)/2;
                    $ins = mysqli_query($conn, "INSERT INTO coment_usuario(id_usuario, id_empresa, comentario, nota) VALUES ('$user', '$empresa', '$comentario', '$nota')");
                    $upd = mysqli_query($conn, "UPDATE empresa SET nota = '$novaNota' WHERE id = '$empresa'");
                    header("Location: ../user.php");
                }
            }
        }
        else{
            $_SESSION['msg'] = "Algo deu errado, tente novamente MAIS TARDE";
            //echo $_SESSION['msg'];
        }
    ?>