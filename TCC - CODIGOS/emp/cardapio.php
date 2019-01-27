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
    <link rel="stylesheet" href="../css/emp.css" type="text/css">
    <link rel="stylesheet" href="../css/navbar.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <!-- ICONES --> 
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <!-- JS -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/npm.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<body id = "cor">
    <div class = "row">
        <div class = "col-md-12" id = "cssmenu">
            <nav>
                <div class="container-fluid">
                    
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Comeketo</a>
                    </div>
                    
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="../emp.php">Home</a></li>
                            <li><a href="#aviso" data-toggle="modal" data-target="#aviso">Pedidos</a></li>
                            <li><a href="cardapio.php">Cardápio</a></li>
                            <li><a href="#coment" data-toggle="modal" data-target="#coment">Comentar sobre Cliente</a></li>
                            <li><a href="#com4me" data-toggle="modal" data-target="#com4me">Comentarios Sobre Mim</a></li>
                            <li><a href="#meusComents" data-toggle="modal" data-target="#meusComents">Meus Comentarios</a></li>
                        </ul>
                    
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="../index.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <div class="modal fade" id="aviso" role="dialog"> <!-- COMEÇO DO MODAL AVISO-->
            <div class="modal-dialog modal-sm">
            <!-- Modal content-->
                <div class="modal-content">
                
                    <div class="modal-header">
                        <center>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <img src = "../img/logo.png" id = "logo"> 
                            <h4 class = "modal-title">AVISO</h4>
                        </center>
                    </div>

                    <div class="modal-body">
                        <center>
                            
                            <div class = "form-group">
                                <h4> PAGINA AINDA EM DESENVOLVIMENTO</h4>
                            </div>
                            
                        </center>
                    </div>
                    
                    <div class="modal-footer">
                        <center>
                            <button type="submit" class = "btn btn-default" data-dismiss="modal">Sair</button>
                        </center>
                    </div>
                    
                </div>
            </div>
        </div> <!-- FIM DO MODAL AVISO -->
            
            <div class="modal fade" id="coment" role="dialog"> <!-- COMEÇO DO TERCEIRO MODAL -->
            <div class="modal-dialog modal-sm">
            <!-- Modal content-->
                <div class="modal-content">
                
                    <div class="modal-header">
                        <center>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <img src = "../img/logo.png" id = "logo"> 
                            <h4 class = "modal-title">Realizar Comentario</h4>
                        </center>
                    </div>

                    <form class = "formComent" name = "formComent" method = "POST" action = "comentario.php">
                    <div class="modal-body">
                        <center>
                            
                            <div class = "form-group">
                                <select name = "cmbUsuario" id = "combo">
                                        <?php   
                                        try{
                                            include_once '../conexao.php'; 
                                            $conn = new conexao();
                                            $busca = "SELECT * FROM tbl_usuario WHERE id_perfil = 3";
                                            $resultado = mysqli_query($conn, $busca);

                                            while($registro = mysqli_fetch_assoc($resultado)){
                                                echo '<option value="'. $registro['id_usuario'].'">'.$registro['login'].'</option>';
                                            }

                                        }
                                        catch (Exception $e) {
                                            echo 'Erro ao preencher combo de User do Comentario: ',  $e->getMessage(), "\n";
                                            }
                                        ?>
                                </select>
                            </div>
                            
                            <div class = "form-group">
                                <textarea class="form-control" name = "coment" rows="4" id="coment" placeholder="Digite aqui seu comentario" required></textarea>
                            </div>
                            
                        </center>
                    </div>
                    
                    <div class="modal-footer">
                        <center>
                            <button type="submit" class = "btn btn-default">Enviar Comentário</button>
                        </center>
                    </div>
                    
                    </form>
                    
                </div>
            </div>
        </div> <!-- FIM DO TERCEIRO MODAL -->
        
            <div class="modal fade" id="com4me" role="dialog"> <!-- COMEÇO DO MODAL COMENTARIOS DE MIM -->
            <div class="modal-dialog modal-sm">
            <!-- Modal content-->
                <div class="modal-content">
                
                    <div class="modal-header">
                        <center>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <img src = "../img/logo.png" id = "logo"> 
                            <h4 class = "modal-title">Comentarios Sobre Mim</h4>
                        </center>
                    </div>

                    <div class="modal-body">
                        <center>
                            
                        <div class = "form-group">
                        <table class="table table-hover table-inverse" border = 0>
                            <thead>
                            <tr>
                            <th id="coluna">Usuario</th>
                            <th id="coluna">Comentarios</th>
                            </tr>
                            </thead>
                
                            <tbody>
                                <?php 
                                
                                try{
                                    include_once '../conexao.php'; 
                                        $conn = new conexao();
                                        $oi = $_SESSION['login'];
                                        $busca = "SELECT * FROM usuario WHERE nome = '$oi'";
                                        $resultado = mysqli_query($conn, $busca);

                                        while($usuario = mysqli_fetch_assoc($resultado)){
                                            $empresa = "SELECT * FROM dono WHERE login_usuario = '" .$usuario['nome']."'";
                                            
                                            $resultado2 = mysqli_query($conn, $empresa);

                                            while($registro = mysqli_fetch_assoc($resultado2)){
                                                
                                                $comentario = "SELECT * FROM coment_usuario WHERE id_empresa = '" .$registro['id_empresa']."'";
                                                $resultado3 = mysqli_query($conn, $comentario);

                                                while($nome = mysqli_fetch_assoc($resultado3)){
                                                
                                                    $empresa2 = "SELECT * FROM usuario WHERE id = '" .$nome['id_usuario']."'";
                                                    $resultado4 = mysqli_query($conn, $empresa2);

                                                while($nome2 = mysqli_fetch_assoc($resultado4)){
                                                
                                                    echo '<tr class="info">
                                                        <td>'.$nome2['nome'].'</td>
                                                        <td>'.$nome['comentario'].'</td>
                                                        <td>'.$nome['nota'].' estrelas</td>
                                                        </tr>';
                                                    }
                                                    }
                                            }
                                        }
                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher tabela Comentario (usuario - empresa): ',  $e->getMessage(), "\n";
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                            
                        </center>
                    </div>
                    
                    <div class="modal-footer">
                        <center>
                            <button class = "btn btn-default" data-dismiss="modal">Sair</button>
                        </center>
                    </div>
                    
                </div>
            </div>
        </div> <!-- FIM DO MODAL COMENTARIOS DE MIM-->
        
            <div class="modal fade" id="meusComents" role="dialog"> <!-- COMEÇO DO MODAL COMENTARIOS DE MIM -->
            <div class="modal-dialog modal-sm">
            <!-- Modal content-->
                <div class="modal-content">
                
                    <div class="modal-header">
                        <center>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <img src = "../img/logo.png" id = "logo"> 
                            <h4 class = "modal-title">Meus Comentarios</h4>
                        </center>
                    </div>

                    <div class="modal-body">
                        <center>
                            
                        <div class = "form-group">
                        <table class="table table-hover table-inverse" border = 0>
                            <thead>
                            <tr>
                            <th id="coluna">Para</th>
                            <th id="coluna">Comentario</th>
                            </tr>
                            </thead>
                
                            <tbody>
                                <?php 
                                
                                try{
                                    include_once '../conexao.php'; 
                                        $conn = new conexao();
                                        $oi = $_SESSION['login'];
                                        $busca = "SELECT * FROM usuario WHERE nome = '$oi'";
                                        $resultado = mysqli_query($conn, $busca);

                                        while($usuario = mysqli_fetch_assoc($resultado)){
                                            $empresa = "SELECT * FROM dono WHERE login_usuario = '" .$usuario['nome']."'";
                                            
                                            $resultado2 = mysqli_query($conn, $empresa);

                                            while($registro = mysqli_fetch_assoc($resultado2)){
                                                
                                                $comentario = "SELECT * FROM coment_empresa WHERE id_empresa = '" .$registro['id_empresa']."'";
                                                $resultado3 = mysqli_query($conn, $comentario);

                                                while($nome = mysqli_fetch_assoc($resultado3)){
                                                
                                                    $empresa2 = "SELECT * FROM usuario WHERE id = '" .$nome['id_usuario']."'";
                                                    $resultado4 = mysqli_query($conn, $empresa2);

                                                while($nome2 = mysqli_fetch_assoc($resultado4)){
                                                
                                                    echo '<tr class="info">
                                                        <td>'.$nome2['nome'].'</td>
                                                        <td>'.$nome['comentario'].'</td>
                                                        </tr>';
                                                    }
                                                    }
                                            }
                                        }
                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher tabela Comentario (usuario - empresa): ',  $e->getMessage(), "\n";
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                            
                        </center>
                    </div>
                    
                    <div class="modal-footer">
                        <center>
                            <button class = "btn btn-default" data-dismiss="modal">Sair</button>
                        </center>
                    </div>
                    
                </div>
            </div>
        </div> <!-- FIM DO MODAL COMENTARIOS DE MIM-->
        </div>
    </div>
    
    
    <div class = "row">
       <br><br>
        <div class = "col-md-1">
        </div>
        
        <div class = "col-md-6">
            <table class="table table-hover table-inverse" id = "corTabela">
                <thead>
                <tr>
                    <th id = "coluna">Comida</th>
                    <th id = "coluna">Preço</th>
                    <th id = "coluna">Ingredientes</th>
                    <th id = "coluna">Tipo</th>
                </tr>
                </thead>
                
                <tbody>
                    <?php   
                        try{                            
                            $id = $_SESSION['id_empresa'];
                            
                            include_once '../conexao.php'; 
                            $conn = new conexao();
                            
                            $busca = "SELECT * FROM cardapio WHERE id_empresa = '$id'";
                            $resultado = mysqli_query($conn, $busca);
                                   
                            while($registro = mysqli_fetch_assoc($resultado)){
                                
                                $id_tipo = $registro['id_tipo'];
                                $tipo = "SELECT * FROM tipo_comida WHERE id = '$id_tipo'";
                                $resultado2 = mysqli_query($conn, $tipo);
                                   
                                    while($registro2 = mysqli_fetch_assoc($resultado2)){
                                
                                        echo '<tr class="info">
                                            <td><center>'.$registro['nome'].'</center></td>
                                            <td><center>'.$registro['preco'].'</center></td>
                                            <td><center>'.$registro['ingredientes'].'</center></td>
                                            <td><center>'.$registro2['nome'].'</center></td>
                                            </tr>';
                                    }
                                }
                            }
                            catch (Exception $e) {
                                echo 'Erro ao preencher tabela Comida: ',  $e->getMessage(), "\n";
                            }
                            ?>        
                </tbody>
            </table>
        </div>
        
        <div class = "col-md-1">
        </div>
        
        <div class = "col-md-3">
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#addCom"><span class="glyphicon glyphicon-plus"></span> Adicionar Comida</a> 
                        </h4>
                    </div>
                            
                    <div id="addCom" class="panel-collapse collapse"> <!-- Inicio do Form de Registro -->
                        
                        <div class = "row">
                            <div class = "col-md-1">
                            </div>
                            
                            <div class = "col-md-10">
                            <form class = "formCom" name = "formCom" method = "POST" action = "addCom.php">
                                <center>
                                    <div class = "form-group">
                                        <input type="text" name="nomeCom" class = "form-control" id="nomeCom" placeholder="Nome da Comida" autofocus required>
                                    </div>

                                    <div class = "form-group">
                                        <textarea class="form-control" name = "desCom" rows="4" id="desCom" placeholder="Descrição" required></textarea>
                                    </div>

                                    <div class = "form-group">
                                        <input type="text" name="precoCom" class = "form-control" id="precoCom" placeholder="Preço" required>
                                    </div>

                                    <div class = "form-group">
                                        <select name = "cmbTipo" id = "combo">
                                            <?php   
                                            try{
                                                include_once '../conexao.php'; 
                                                $conn = new conexao();
                                                $busca = "SELECT * FROM tipo_comida;";
                                                $resultado = mysqli_query($conn, $busca);

                                                while($registro = mysqli_fetch_assoc($resultado)){

                                                echo '<option value="'. $registro['id'].'">'.$registro['nome'].'</option>';
                                                }
                                            }
                                            catch (Exception $e) {
                                                echo 'Erro ao preencher combo de Tipo de Comida: ',  $e->getMessage(), "\n";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class = "form-group">
                                        <button type="submit" class = "btn btn-default" text-align="center">Adicionar Comida</button>
                                    </div>
                                </center>
                            </form> <!-- Fim do Form de Registro -->
                            </div>
                            
                            <div class = "col-md-1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#exCom"><span class="glyphicon glyphicon-trash"></span> Remover Comida</a> 
                        </h4>
                    </div>
                            
                    <div id="exCom" class="panel-collapse collapse"> <!-- Inicio do Form de Registro -->
                        
                        <form class = "formExcluir" name = "formExcluir" method = "POST" action = "exCom.php"> 
                            <center>
                                <div class = "form-group">
                                    <input type="text" name="nomeComida" class = "form-control" id="nomeComida" placeholder="Nome da Comida" autofocus required>
                                </div>
                                
                                <div class = "form-group">
                                    <button type="submit" class = "btn btn-default" text-align="center">Excluir Comida</button>
                                </div>
                            </center>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            
            
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#altCom"><span class="glyphicon glyphicon-plus"></span> Alterar Comida</a> 
                        </h4>
                    </div>
                            
                    <div id="altCom" class="panel-collapse collapse"> <!-- Inicio do Form de Registro -->
                        
                        <div class = "row">
                            <div class = "col-md-1">
                            </div>
                            
                            <div class = "col-md-10">
                            <form class = "formCom" name = "formCom" method = "POST" action = "altCom.php">
                                <center>
                                    <div class = "form-group">
                                        <select name = "cmbComida" id = "combo">
                                            <?php   
                                            try{
                                                $id = $_SESSION['id_empresa'];
                                                include_once '../conexao.php'; 
                                                $conn = new conexao();
                                                $busca = "SELECT * FROM cardapio WHERE id_empresa = '$id';";
                                                $resultado = mysqli_query($conn, $busca);

                                                while($registro = mysqli_fetch_assoc($resultado)){

                                                echo '<option value="'. $registro['id'].'">'.$registro['nome'].'</option>';
                                                }
                                            }
                                            catch (Exception $e) {
                                                echo 'Erro ao preencher combo de Tipo de Comida: ',  $e->getMessage(), "\n";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class = "form-group">
                                        <textarea class="form-control" name = "desCom" rows="4" id="desCom" placeholder="Descrição" required></textarea>
                                    </div>

                                    <div class = "form-group">
                                        <input type="text" name="precoCom" class = "form-control" id="precoCom" placeholder="Preço" required>
                                    </div>
                                    
                                    <div class = "form-group">
                                        <select name = "tipoCom" id = "combo">
                                            <?php   
                                            try{
                                                include_once '../conexao.php'; 
                                                $conn = new conexao();
                                                $busca = "SELECT * FROM tipo_comida;";
                                                $resultado = mysqli_query($conn, $busca);

                                                while($registro = mysqli_fetch_assoc($resultado)){

                                                echo '<option value="'. $registro['id'].'">'.$registro['nome'].'</option>';
                                                }
                                            }
                                            catch (Exception $e) {
                                                echo 'Erro ao preencher combo de Tipo de Comida: ',  $e->getMessage(), "\n";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class = "form-group">
                                        <button type="submit" class = "btn btn-default" text-align="center">Alterar Comida</button>
                                    </div>
                                </center>
                            </form> <!-- Fim do Form de Alterar -->
                            </div>
                            
                            <div class = "col-md-1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- FIM DA LINHA DOS PANEL-GROUP -->
            
        <div class = "col-md-1">
        </div>
    </div>
</body>
</html>