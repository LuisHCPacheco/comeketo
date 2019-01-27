<?php
 	session_start();
    $_UP['pasta'] = 'uploads/';
    $_UP['tamanho'] = 1024 * 1024 * 2; 
    $_UP['extensoes'] = array('jpg', 'png');
    $_UP['renomeia'] = true;
    $_UP['erros'][0] = 'Não houve erro';
    $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
    $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
    $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
    $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

    //echo $_SESSION['fotoAtual'];
    if ($_FILES['arquivo']['error'] != 0) {
        header("Location: ".$_SERVER['HTTP_REFERER']."");
        exit();
    }
    //$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
    $nome = $_FILES[ 'arquivo' ][ 'name' ];
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
    $extensao = strtolower ( $extensao );

    if (strstr ( '.jpg;.png', $extensao ) == false ){
        echo $extensao;
        header("Location: ".$_SERVER['HTTP_REFERER']."");
        exit();
    }
    else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
        echo '1';
        header("Location: ".$_SERVER['HTTP_REFERER']."");
        exit();
    }
    else {
    if ($_UP['renomeia'] == true) {
    $nome_final = time().'.jpg';
    } else {
    $nome_final = $_FILES['arquivo']['name'];
    }
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
        include_once 'conexao.php';
        $conn = new conexao();
        $ft_excluir = $_SESSION['fotoAtual'];
        if($ft_excluir == 'perfil.jpg'){
        }
        else{
            unlink('uploads/'. $ft_excluir);
        }
        $id_empresa = $_SESSION['id_empresa'];
        
        $sql = mysqli_query($conn, "UPDATE empresa SET foto ='{$nome_final}' WHERE id = '{$id_empresa}';") or print mysqli_error($conn);
        
        $sql2 = mysqli_query($conn, "SELECT * from empresa WHERE id = '{$id_empresa}';");
        
        $resultado = mysqli_fetch_assoc($sql2);
        $_SESSION['fotoAtual'] = $resultado['foto'];
        
        
        header("Location: ".$_SERVER['HTTP_REFERER']."");
        exit();		
    } else {
        header("Location: ".$_SERVER['HTTP_REFERER']."");
        exit();
    }
    }
?>


