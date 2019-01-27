<?php
    session_start();

    $_SESSION['cidade'] = $_POST['cidadePed'];
    $_SESSION['bairro'] = $_POST['bairroPed'];
    $_SESSION['rua'] = $_POST['ruaPed'];
    $_SESSION['numero'] = $_POST['numeroPed'];
    $_SESSION['espec'] = $_POST['especializacao'];
?>