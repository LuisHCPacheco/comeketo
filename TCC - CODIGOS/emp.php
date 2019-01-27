<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ComeKeto</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/emp.css" type="text/css">
    <link rel="stylesheet" href="css/navbar.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- ICONES --> <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> <!-- ICONES -->
    <!-- ICONES --> <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!-- ICONES -->
    <!-- JS -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
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
                
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="emp.php">Home</a></li>
                        <li><a href="#aviso" data-toggle="modal" data-target="#aviso">Pedidos</a></li>
                        <li><a href="emp/cardapio.php">Cardápio</a></li>
                        <li><a href="#coment" data-toggle="modal" data-target="#coment">Comentar sobre Cliente</a></li>
                        <li><a href="#com4me" data-toggle="modal" data-target="#com4me">Comentarios Sobre Mim</a></li>
                        <li><a href="#meusComents" data-toggle="modal" data-target="#meusComents">Meus Comentarios</a></li>
                    </ul>
                    
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">                            
                            <li><a href="#perfil" data-toggle="modal" data-target="#perfil"><span class="glyphicon glyphicon-user"></span> Meu Perfil</a></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
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
                            <img src = "img/logo.png" id = "logo"> 
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
                            <img src = "img/logo.png" id = "logo"> 
                            <h4 class = "modal-title">Realizar Comentario</h4>
                        </center>
                    </div>

                    <form class = "formComent" name = "formComent" method = "POST" action = "emp/comentario.php">
                    <div class="modal-body">
                        <center>
                            
                            <div class = "form-group">
                                <select name = "cmbUsuario" id = "combo">
                                        <?php   
                                        try{
                                            include_once 'conexao.php'; 
                                            $conn = new conexao();
                                            $busca = "SELECT * FROM usuario WHERE id_perfil = 3";
                                            $resultado = mysqli_query($conn, $busca);

                                            while($registro = mysqli_fetch_assoc($resultado)){
                                                echo '<option value="'. $registro['id'].'">'.$registro['nome'].'</option>';
                                            }

                                        }
                                        catch (Exception $e) {
                                            echo 'Erro ao preencher combo de User do Comentario: ',  $e->getMessage(), "\n";
                                            }
                                        ?>
                                </select>
                            </div>
                            
                            <div class = "form-group">
                                <textarea class="form-control" name = "coment" rows="4" id="coment" required></textarea>
                            </div>
                            
                        </center>
                    </div>
                    
                    <div class="modal-footer">
                        <center>
                            <button type="submit" class = "btn btn-default btn-md">Enviar Comentário</button>
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
                            <img src = "img/logo.png" id = "logo"> 
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
                                    include_once 'conexao.php'; 
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
                                                
                                                    $empresa2 = "SELECT * FROM usuario WHERE id = '" .$nome['id']."'";
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
                            <img src = "img/logo.png" id = "logo"> 
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
                                    include_once 'conexao.php'; 
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
            
            
        <div class="modal fade" id="perfil" role="dialog"> <!-- COMEÇO DO MODAL PERFIL-->
            <div class="modal-dialog modal-lg">
            <!-- Modal content-->
                <div class="modal-content">
                
                    <div class="modal-header">
                        <center>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <?php
                                $usuario = $_SESSION['login'];
                                
                                include_once 'conexao.php';                      
                                $conn = new conexao();
                            
                                $sql = "SELECT * FROM dono WHERE nome = '$usuario'";
                                $resultado = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($resultado);
                                $teste = mysqli_fetch_assoc($resultado);

                                if($row > 0) {
                                    $_SESSION['id_empresa'] = $teste['id_empresa'];
                                    $_SESSION['login_usuario'] = $teste['nome'];
                
                                }
                                else{
                                    echo "FAIO";
                                }
                            ?>
                            <h3>Meu Perfil (<?php echo $_SESSION['login_usuario'] ?>)</h3>
                        </center>
                    </div>

                    <div class="modal-body">
                        <div class = "row">
                            <div class = "col-md-4">
                                <center>
                                    <?php
                                        $usuario = $_SESSION['login'];

                                        include_once 'conexao.php';                      
                                        $conn = new conexao();

                                        $busca = "SELECT * FROM dono WHERE nome = '$usuario'";
                                        $resultado = mysqli_query($conn, $busca);

                                        while($registro = mysqli_fetch_assoc($resultado)){
                                            $busca2 = "SELECT * FROM empresa WHERE id = '" .$registro['id_empresa']."'";
                                            $resultado2 = mysqli_query($conn, $busca2);

                                            while($dados = mysqli_fetch_assoc($resultado2)){
                                                echo '<img id = "foto_perfil" src="uploads/'.$dados['foto'].'"/>';
                                                $_SESSION['fotoAtual'] = $dados['foto'];
                                                
                                            }
                                        }
                                    ?>
                                    
                                    <button type="submit" class = "btn btn-default btn-md btnPerfil" data-toggle="modal" data-target="#mudaFoto">Alterar Foto</button>
                                    <button type="submit" class = "btn btn-default btn-md btnPerfil" data-toggle="modal" data-target="#mudaDados">Alterar Dados</button>
                                </center>
                            </div>
                            
                            <div class = "col-md-1">
                            </div>
                            
                            <div class = "col-md-7" id = "informacoes">
                                <?php
                                    $usuario = $_SESSION['login'];
                                
                                    include_once 'conexao.php';                      
                                    $conn = new conexao();
                                
                                    $busca = "SELECT * FROM dono WHERE nome = '$usuario'";
                                    $resultado = mysqli_query($conn, $busca);

                                    while($registro = mysqli_fetch_assoc($resultado)){
                                        $busca2 = "SELECT * FROM empresa WHERE id = '" .$registro['id_empresa']."'";
                                        $resultado2 = mysqli_query($conn, $busca2);
                                        
                                        while($dados = mysqli_fetch_assoc($resultado2)){
                                            $_SESSION['nomeEmp'] = $dados['nome'];
                                            $_SESSION['nota'] = $dados['nota'];
                                            $_SESSION['cidadeEmp'] = $dados['cidade'];
                                            $_SESSION['bairroEmp'] = $dados['bairro'];
                                            $_SESSION['ruaEmp'] = $dados['rua'];
                                            $_SESSION['numeroEmp'] = $dados['numero'];
                                            $_SESSION['especifEmp'] = $dados['especific'];
                                            $_SESSION['telefone1Emp'] = $dados['telefone1'];
                                            $_SESSION['telefone2Emp'] = $dados['telefone2'];
                                            $_SESSION['mapa'] = $dados['mapa'];
                                            
                                        }
                                    }
                                ?>
                                
                                <h3 id = "titulo">Gerencia a Empresa: <?php echo $_SESSION['nomeEmp'] ?></h3>
                                <h3 id = "titulo">Endereço da Empresa:</h3>
                                <h4 id = "dados">Cidade: <?php echo $_SESSION['cidadeEmp'] ?></h4>
                                <h4 id = "dados">Bairro: <?php echo $_SESSION['bairroEmp'] ?></h4>
                                <h4 id = "dados">Rua: <?php echo $_SESSION['ruaEmp'] ?>      Nº: <?php echo $_SESSION['numeroEmp'] ?></h4>
                                <h4 id = "dados">Especificação: <?php echo $_SESSION['especifEmp'] ?></h4>
                                <h3 id = "titulo">Telefones:</h4>
                                <h4 id = "dados">Telefone 1: <?php echo $_SESSION['telefone1Emp'] ?></h4>
                                <h4 id = "dados">Telefone 2: <?php echo $_SESSION['telefone2Emp'] ?></h4>
                            </div>
                        </div> 
                    </div>
                    
                    <div class="modal-footer">
                        <center>
                            <button type="submit" class = "btn btn-default btn-lg" data-dismiss="modal">Concluir</button>
                        </center>
                    </div>
                    
                </div>
            </div>
        </div> <!-- FIM DO MODAL PERFIL -->
            
            
        <div class="modal fade" id="mudaFoto" role="dialog"> <!-- COMEÇO DO MODAL TROCA FOTO DE PERFIL-->
            <div class="modal-dialog">
            <!-- Modal content-->
                <div class="modal-content">
                
                    <div class="modal-header">
                        <center>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3><span class="glyphicon glyphicon-camera"></span>  Alterar Foto de Perfil</h3> 
                        </center>
                    </div>
                    
                    <form method="post" action="recebe_upload.php" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class = "row">
                                <div class = "col-md-12">
                                    <center>
                                        <h4> Selecione a foto que deseja colocar:</h4>
                                        <input type="file" name = "arquivo" id = "arquivo" required>
                                    </center>
                                </div>
                            </div> 
                        </div>

                        <div class="modal-footer">
                            <center>
                                <button type="submit" class = "btn btn-default btn-md">Alterar Foto</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- FIM DO MODAL TROCA FOTO DE PERFIL -->
            
        <div class="modal fade" id="mudaDados" role="dialog"> <!-- COMEÇO DO MODAL TROCA FOTO DE PERFIL-->            
            <div class="modal-dialog modal-sm">
            <!-- Modal content-->
                <div class="modal-content">
                
                    <div class="modal-header">
                        <center>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3><span class="glyphicon glyphicon-list-alt"></span>  Alterar Dados</h3> 
                        </center>
                    </div>
                    
                    <form method="post" action="emp/atualizaDados.php">
                        <div class="modal-body">
                            <div class = "row">
                                <div class = "col-md-12">
                                    <center>
                                    <input type="text" name="nomeEmp" class = "form-control" id="nomeEmp" placeholder="Nome da Empresa" value= '<?php echo $_SESSION['nomeEmp'] ?>' required>
                                    <input type="text" name="cidadeEmp" class = "form-control" id="cidadeEmp" placeholder="Cidade" value= '<?php echo $_SESSION['cidadeEmp'] ?>' required>
                                    <input type="text" name="bairroEmp" class = "form-control" id="bairroEmp" placeholder="Bairro" value= '<?php echo $_SESSION['bairroEmp'] ?>' required>
                                    <input type="text" name="ruaEmp" class = "form-control" id="ruaEmp" placeholder="Rua" value= '<?php echo $_SESSION['ruaEmp'] ?>' required>
                                    <input type="text" name="numeroEmp" class = "form-control" id="numeroEmp" placeholder="Numero" value= '<?php echo $_SESSION['numeroEmp'] ?>' required>
                                    <input type="text" name="especificEmp" class = "form-control" id="especificEmp" placeholder="Especificação" value= '<?php echo $_SESSION['especifEmp'] ?>' required>
                                    <input type="text" name="telefone1Emp" class = "form-control" id="telefoneEmp" placeholder="Telefone 1" value= '<?php echo $_SESSION['telefone1Emp'] ?>' required>
                                    <input type="text" name="telefone2Emp" class = "form-control" id="telefoneEmp" placeholder="Telefone 1" value= '<?php echo $_SESSION['telefone2Emp'] ?>' required>
                                    <input type="text" name="mapa" class = "form-control" id="mapa" placeholder="Link do mapa (Pegar no google maps)" value= '<?php echo $_SESSION['mapa'] ?>' required>
                                        
                                    <a href="#expMapa" data-toggle="modal" data-target="#expMapa">Como Pegar Link do Mapa?</a>
                                    <br>
                                    <a href="#senha" data-toggle="modal" data-target="#senha">Mudar Senha</a>
                                    
                                    </center>
                                </div>
                            </div> 
                        </div>

                        <div class="modal-footer">
                            <center>
                                <button type="submit" class = "btn btn-default btn-md">Atualizar Dados</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- FIM DO MODAL PERFIL -->
            
        <div class="modal fade" id="expMapa" role="dialog"> <!-- COMEÇO DO TERCEIRO MODAL -->
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <img src = "img/logo.png" id = "logo">
                    </center>
                </div>

                <div class="modal-body">
                    <p>- Entre no Google Maps;</p>
                    <p>- Localize sua Empresa;</p>
                    <p>- Na tela da esquerda, clique em partilhar;</p>
                    <p>- Na janela que abrir, clique em partilhar mapa;</p>
                    <p>- Ira aparecer o link para incorporar o mapa, copie somente o link (de https até o fim das "", do lado esquerdo de WIDTH;</p>
                </div>

            </div>
        </div>
        </div> <!-- FIM DO TERCEIRO MODAL -->
            
            
        <div class="modal fade" id="senha" role="dialog"> <!-- COMEÇO DO TERCEIRO MODAL -->
        <div class="modal-dialog modal-sm">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <img src = "img/logo.png" id = "logo">
                    </center>
                </div>
                <form method="post" action="emp/atualizaSenha.php">
                    <div class="modal-body">
                        <input type="text" name="senha" class = "form-control" id="senha" placeholder="Nova Senha" required>
                    </div>
                    
                    <div class="modal-footer">
                        <center>
                            <button type="submit" class = "btn btn-default btn-md">Atualizar Senha</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
        </div> <!-- FIM DO TERCEIRO MODAL -->
            
        </div>
    </div>
    
    
    <div class = "row">
        <div class = "col-md-12">
            <?php
            $oi = $_SESSION['login'];
            
            include_once 'conexao.php';                      
            $conn = new conexao();

            $sql = "SELECT * FROM dono WHERE nome = '$oi'";
            
            $resultado = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($resultado);
            $teste = mysqli_fetch_assoc($resultado);

            if($row > 0) {
                $_SESSION['id_empresa'] = $teste['id_empresa'];
                $_SESSION['login_usuario'] = $teste['nome'];

                //Coloque aqui uns prints para ver o conteudo da variavel ...
                echo $_SESSION['id_empresa'];
                echo $_SESSION['login_usuario'];
                
            }
            else{
                echo "TU NAO TEM EMPRESA";
            }
            ?>
        </div>
    </div>
    
    <div class = "row">
        <div class = "col-md-12">
            <center>
            <h3> CONTEUDO AINDA EM DESENVOLVIMENTO</h3>
            </center>
        </div>
    </div>
</body>

</html>