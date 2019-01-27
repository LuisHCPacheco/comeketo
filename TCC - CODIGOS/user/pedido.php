<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ComeKeto</title>
    <link rel="icon" href="../img/logo.png" type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSS -->
    <link rel="stylesheet" href="../css/tabelaCardapio.css" type="text/css">
    <link rel="stylesheet" href="../css/navbar.css" type="text/css">
    <link rel="stylesheet" href="../css/usuario.css" type="text/css">
    <link rel="stylesheet" href="../css/footer.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <!-- ICONES --> 
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/npm.js"></script>
</head>

<body>
    <div class = "row">
        <div class = "col-md-3">
        </div>
    
        <div class = "col-md-6">
            <center><h2> CONFIRMAÇÃO DE PEDIDO </h2></center>
            <table class="table tbl" id = "tbl" border=0>
                <thead>
                    <tr>
                        <th><center><h4>Quantidade</h4></center></th>
                        <th><center><h4>Item</h4></center></th>
                        <th><center><h4>Valor</h4></center></th>
                    </tr>
                </thead>

                <tbody>
                <?php
                try{
                    include_once '../conexao.php'; 
                    $conn = new conexao();
                    Foreach($_POST as $key => $value){
                        if($value > 0){
                            $id = substr($key, 6);
                            $sql = "SELECT * FROM cardapio WHERE id = '$id'";
                            $executa = mysqli_query($conn, $sql);
                            $teste = mysqli_fetch_assoc($executa);

                            $valor = ($teste['preco'] * $value);
                            
                            $_SESSION['valorTotal'] += $valor;
                            /*echo $teste['nome'];
                            echo ' - ';
                            echo $value;
                            echo ' - ';
                            echo 'R$ '.$valor;
                            echo '<br>';*/

                            echo '<tr id = "testando">
                                <div class = "row">

                                    <div class = "col-md-4">
                                        <td><center><h4>'.$value.'</h4></center></td>
                                    </div>

                                    <div class = "col-md-4">
                                        <td><center><h4>'.$teste['nome'].'</h4></center></td>
                                    </div>

                                    <div class = "col-md-4">
                                        <td><center><h4>R$ '.$valor.'</h4></center></td>
                                    </div>

                                </div>

                                </tr>';
                        }
                    }
                }
                
                catch (Exception $e) {
                    echo 'Erro ao preencher tabela Cardapio: ',  $e->getMessage(), "\n";
                }
                ?>

                </tbody>
            </table>
            
            
            <div class = "row">
                <div class = "col-md-2">
                </div>
                
                <div class = "col-md-6">
                    <h3> Valor Total:</h3>
                </div>

                <div class = "col-md-4">
                    <center>
                        <h3><?php echo 'R$ '.$_SESSION['valorTotal'] ?></h3>
                    </center>
                </div>
            </div>
            
            
            <div class = "row">
                <div class = "col-md-4">
                    <form class = "formVoltar" name = "formVoltar" action = "retorna.php">
                        <button type="submit" class = "btn btn-primary btn-block"><h4> Retornar</h4></button>
                    </form>
                </div>

                <div class = "col-md-8">
                    <button type="submit" class = "btn btn-success btn-block"><h4> Confirmar Pedido</h4></button>
                </div>
            </div>
            
        </div>
    
        <div class = "col-md-3">
        </div>
    </div>

</body>
</html>