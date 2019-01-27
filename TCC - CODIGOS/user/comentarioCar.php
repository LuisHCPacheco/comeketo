<?php
        session_start();

        $idEmp = $_SESSION['idEmp'];
        $comida = $_POST['cmbComida'];
        $user = $_SESSION['id_usuario'];
		$nota = $_POST['estrela'];
		
        include_once '../conexao.php';                      
        $conn = new conexao();
        $notaEmp = "SELECT * FROM cardapio WHERE id = '$comida'";
        $resultado = mysqli_query($conn, $notaEmp);
        
        if($notaEmp == 0) {
            while($registro = mysqli_fetch_assoc($resultado)){
                $_SESSION['nota'] = $registro['nota'];

                if($_SESSION['nota'] == 0){
                    $ins = mysqli_query($conn, "INSERT INTO coment_cardapio(id_empresa, id_comida, id_usuario, nota) VALUES ('$idEmp', '$comida', '$user', '$nota')");
                    $upd = mysqli_query($conn, "UPDATE cardapio SET nota = '$nota' WHERE id = '$comida'");
                    
                    header("Location: cardapio.php?pegaId=$idEmp");
                }
                else{
                    $novaNota = ($_SESSION['nota'] + $nota)/2;
                    $ins = mysqli_query($conn, "INSERT INTO coment_cardapio(id_empresa, id_comida, id_usuario, nota) VALUES ('$idEmp', '$comida', '$user', '$nota')");
                    $upd = mysqli_query($conn, "UPDATE cardapio SET nota = '$novaNota' WHERE id = '$comida'");
                    
                    header("Location: cardapio.php?pegaId=$idEmp");
                }
            }
        }
        else{
            $_SESSION['msg'] = "Algo deu errado, tente novamente MAIS TARDE";
        }
    ?>