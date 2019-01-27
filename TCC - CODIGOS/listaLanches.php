<?php
    
    include_once 'conexao.php';                      
    $conn = new conexao();
    
    $empresa = $_SESSION['testando']
    $id = $_POST['cmbFiltro'];

    $rs = mysqli_query($conn, "SELECT * FROM cardapio WHERE id_empresa = '$empresa' AND id_tipo = '$id'");
    $lanches = array();
    //$emp = array();
    while($reg = mysqli_fetch_assoc($rs)){
        $lanches[$reg['nome']] = $reg['nome'];
        $lanches[$reg['preco']] = $reg['preco'];
    }
    echo json_encode($lanches);
?>