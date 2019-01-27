<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ComeKeto</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon" />
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/admin.css" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
</head>

<body class = "corpo">
    <div class = "row"> <!-- Inicia a Linha -->
        <div class = "col-md-1">
        </div>
        
        <div class = "col-md-10" id = "titulo"> <!-- Inicia a col-md-12 -->
            <h3> Bem-Vindo Administrador!</h3>
        </div> <!-- Termina a col-md-12 -->
    
        <div class = "col-md-1">
        </div>
    </div> <!-- Termina a Linha -->
    
    
    <!-- GEREN PERFIL --> <div class = "row"> <!-- Começo da Linha -->
        <div class = "col-md-1">
        </div>
        
        <div class = "col-md-5">
            <h2 id = "margem"> Não é permitido adicionar outro Perfil</h2>
        </div>
        
        
        <div class = "col-md-5"> <!-- Começo da 2ª Coluna MD5 -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#excluiPer"><span class="glyphicon glyphicon-trash"></span> Excluir Perfil</a> 
                        </h4>
                    </div>

                    <div id="excluiPer" class="panel-collapse collapse"> <!-- Inicio do Form de Registro -->

                        <form class = "formExcluiPerfil" name = "formExcluiPerfil" method = "POST" action = "pagAdm/excluiPerfil.php">
                               
                            <input type="text" name="excluiPerfil" class = "form-control" id="excluiPerfil" placeholder="Informe o ID do perfil" autofocus required>
                            
                            <center>
                                <button type="submit" class = "btn btn-default btn-lg" text-align="center">Excluir Perfil</button> 
                            </center>
                        </form>

                        <table class="table" border=0>
                            <thead>
                                <tr>
                                <th id="coluna">Código</th>
                                <th id="coluna">Perfil</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM perfil;";
                                    $resultado = mysqli_query($conn, $busca);

                                    while($registro = mysqli_fetch_assoc($resultado)){

                                    echo '<tr class="info">
                                        <td>'.$registro['id_perfil'].'</td>
                                        <td>'.$registro['tipo'].'</td>
                                        </tr>';
                                        }

                                    }
                                    catch (Exception $e) {
                                        echo 'Erro ao preencher tabela Perfil: ',  $e->getMessage(), "\n";
                                        }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Começo da 2ª Coluna MD5 -->
        
    </div> <!-- Fim da Linha -->
    
    
    <!-- GEREN USER --> <div class = "row"> <!-- Começo da Linha -->
        
        <div class = "col-md-1">
        </div>
        
        <div class = "col-md-5"> <!-- Começo da 1ª Coluna MD5 -->  
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#addUser"><span class="glyphicon glyphicon-plus"></span> Adicionar Usuário</a> 
                        </h4>
                    </div>
                            
                    <div id="addUser" class="panel-collapse collapse"> <!-- Inicio do Form de Registro -->
                        
                        <form class = "formCad" name = "formCad" method = "POST" action = "cadastro.php">
                        
                            <input type="text" name="nomeCad" class = "form-control" id="nomeCad" placeholder="Nome de Usuário" autofocus required>
                            <input type="text" name="emailCad" class = "form-control" id="emailCad" placeholder="Email" required>
                            <input type="password" name="senhaCad" class = "form-control" id="senha" placeholder="Informe uma senha" required>
                            <input type="password" name="cSenha" class = "form-control" id="cSenha" placeholder="Confirme a senha" required>

                            <button type="submit" class = "btn btn-default btn-lg" text-align="center">Registrar-se</button> 
                        
                        </form> <!-- Fim do Form de Registro -->
                        
                        <table class="table" border=0.5>
                            <thead>
                                <tr>
                                    <th id="coluna">ID</th>
                                    <th id="coluna">Login</th>
                                    <th id="coluna">ID Perfil</th>
                                    <th id="coluna">Email</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php   
                                try{
                                include_once 'conexao.php'; 
                                $conn = new conexao();
                                $busca = "SELECT * FROM usuario WHERE id_perfil = 3;";
                                $resultado = mysqli_query($conn, $busca);

                                while($registro = mysqli_fetch_assoc($resultado)){

                                echo '<tr class="info">
                                <td>'.$registro['id'].'</td>
                                <td>'.$registro['id_perfil'].'</td>
                                <td>'.$registro['nome'].'</td>
                                <td>'.$registro['email'].'</td>
                                </tr>';
                                    }
                                }
                                
                                catch (Exception $e) {
                                echo 'Erro ao preencher tabela User: ',  $e->getMessage(), "\n";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Fim da 1ª Coluna MD5 -->
        
        
        <div class = "col-md-5"> <!-- Começo da 2ª Coluna MD5 -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#excluiUser"><span class="glyphicon glyphicon-trash"></span> Excluir Usuário</a> 
                        </h4>
                    </div>
                            
                    <div id="excluiUser" class="panel-collapse collapse"> <!-- Inicio do Form de Registro -->
                        
                        <form class = "formExcluir" name = "formExcluir" method = "POST" action = "pagAdm/excluiUser.php"> 
                
                            <input type="text" name="excluiUser" class = "form-control" placeholder="ID do usuário" autofocus required>
                            <button type="submit" class = "btn btn-default btn-lg" text-align="center">Excluir Usuário</button>
            
                        </form>
                        
                        <table class="table" border=0.5>
                            <thead>
                                <tr>
                                    <th id="coluna">ID</th>
                                    <th id="coluna">Login</th>
                                    <th id="coluna">ID Perfil</th>
                                    <th id="coluna">Email</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php   
                                try{
                                include_once 'conexao.php'; 
                                $conn = new conexao();
                                $busca = "SELECT * FROM usuario WHERE id_perfil = 3;";
                                $resultado = mysqli_query($conn, $busca);

                                while($registro = mysqli_fetch_assoc($resultado)){

                                echo '<tr class="info">
                                <td>'.$registro['id'].'</td>
                                <td>'.$registro['id_perfil'].'</td>
                                <td>'.$registro['nome'].'</td>
                                <td>'.$registro['email'].'</td>
                                </tr>';
                                    }
                                }
                                
                                catch (Exception $e) {
                                echo 'Erro ao preencher tabela User: ',  $e->getMessage(), "\n";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Fim da 2ª Coluna MD5 -->   
        
    </div> <!-- Fim da Linha -->
    
    
    <!-- GEREN RAMOS --> <div class = "row"> <!-- Começo da Linha -->
        
        <div class = "col-md-1">
        </div>
        
        <div class = "col-md-5"> <!-- Começo da 1ª Coluna MD5 -->  
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#addRamo"><span class="glyphicon glyphicon-plus"></span> Adicionar Ramo</a> 
                        </h4>
                    </div>
                            
                    <div id="addRamo" class="panel-collapse collapse"> <!-- Inicio do Form de Registro -->
                        
                        <form class = "formAddRamo" name = "formAddRamo" method = "POST" action = "pagAdm/addRamo.php">
                               
                        <input type="text" name="addRamo" class = "form-control" id="addRamo" placeholder="Informe o Nome do Ramo" required>
                        <button type="submit" class = "btn btn-default btn-lg" id = "botaoAdd" text-align="center">Adicionar Ramo</button>
                        
                        </form>

                        
                        <table class="table" border=0>
                            <thead>
                                <tr>
                                <th id="coluna">Código</th>
                                <th id="coluna">Ramo</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM ramo;";
                                    $resultado = mysqli_query($conn, $busca);

                                    while($registro = mysqli_fetch_assoc($resultado)){

                                    echo '<tr class="info">
                                        <td>'.$registro['id_ramo'].'</td>
                                        <td>'.$registro['ramo'].'</td>
                                        </tr>';
                                        }                   
                                    }
                                    catch (Exception $e) {
                                        echo 'Erro ao preencher tabela Perfil: ',  $e->getMessage(), "\n";
                                        }
                                ?>                          
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Fim da 1ª Coluna MD5 -->
        
        
        <div class = "col-md-5"> <!-- Começo da 2ª Coluna MD5 -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#excluiRamo"><span class="glyphicon glyphicon-trash"></span> Excluir Ramo</a> 
                        </h4>
                    </div>
                            
                    <div id="excluiRamo" class="panel-collapse collapse"> <!-- Inicio do Form de Registro -->
                        
                        <form class = "formExcluiRamo" name = "formExcluiRamo" method = "POST" action = "pagAdm/excluiRamo.php">
                               
                        <input type="text" name="excluiRamo" class = "form-control" id="excluiRamo" placeholder="Informe o ID do ramo" size="20%" style="height: 40px;" autofocus required>
                        <button type="submit" id = "botaoEx" text-align="center">Excluir Ramo</button> 
                
                        </form>
                        
                        <table class="table" border=0>
                            <thead>
                                <tr>
                                <th id="coluna">Código</th>
                                <th id="coluna">Ramo</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM ramo;";
                                    $resultado = mysqli_query($conn, $busca);

                                    while($registro = mysqli_fetch_assoc($resultado)){

                                    echo '<tr class="info">
                                        <td>'.$registro['id_ramo'].'</td>
                                        <td>'.$registro['ramo'].'</td>
                                        </tr>';
                                        }                   
                                    }
                                    catch (Exception $e) {
                                        echo 'Erro ao preencher tabela Perfil: ',  $e->getMessage(), "\n";
                                        }
                                ?>                          
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Fim da 2ª Coluna MD5 -->   
        
    </div> <!-- Fim da Linha -->
    
    
    <!-- GEREN DONOS --> <div class = "row"> <!-- Começo da Linha -->
        
        <div class = "col-md-1">
        </div>   
        
        <div class = "col-md-5"> <!-- Começo da 1ª Coluna MD5 -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#addDono"><span class="glyphicon glyphicon-plus"></span> Adicionar Dono</a> 
                        </h4>
                    </div>
                            
                    <div id="addDono" class="panel-collapse collapse"> <!-- Inicio do Form de Registro -->
                        <form class = "formCad" name = "formCad" method = "POST" action = "pagAdm/caDono.php">
                        
                            <input type="text" name="nomeCad" class = "form-control" id="nomeCad" placeholder="Nome de Usuário" size="55%" style="height: 40px;" required>
                            
                            <input type="text" name="emailCad" class = "form-control" id="emailCad" placeholder="Email" size="55%" style="height: 40px;" required>

                            <input type="password" name="senhaCad" class = "form-control" id="senha" placeholder="Informe uma senha" size="55%" style="height: 40px;" required>

                            <input type="password" name="cSenha" class = "form-control" id="cSenha" placeholder="Confirme a senha" size="55%" style="height: 40px;" required>

                            <button type="submit" class = "btn" id = "botaoCad" text-align="center">Registrar Dono</button> 
                        
                        </form> <!-- Fim do Form de Registro -->
                        
                        <table class = "table table-hover table-inverse" border=0>
                            <thead>
                                <tr>
                                <th id="coluna">Login</th>
                                <th id="coluna">ID Perfil</th>
                                <th id="coluna">Email</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM usuario WHERE id_perfil = 2;";
                                    $resultado = mysqli_query($conn, $busca);
                                   
                                while($registro = mysqli_fetch_assoc($resultado)){
                                    
                                echo '<tr class="info">
                                <td>'.$registro['nome'].'</td>
                                <td>'.$registro['id_perfil'].'</td>
                                <td>'.$registro['email'].'</td>
                                </tr>';
                                }              
                            }
                            catch (Exception $e) {
                                echo 'Erro ao preencher tabela User: ',  $e->getMessage(), "\n";
                            }
                            ?>                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Fim da 1ª Coluna MD5 -->
        
        
        <div class = "col-md-5"> <!-- Começo da 2ª Coluna MD5 -->  
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#exDono"><span class="glyphicon glyphicon-trash"></span> Excluir Dono</a> 
                        </h4>
                    </div>
                            
                    <div id="exDono" class="panel-collapse collapse"> <!-- Inicio do Form de Registro -->
                        
                        <form class = "formExcluir" name = "formExcluir" method = "POST" action = "pagAdm/excluiUser.php"> 
                
                            <input type="text" name="excluiUser" class = "form-control" id="excluiUser" placeholder="ID do usuário" size="15%" style="height: 40px;" autofocus required>
                            <button type="submit" id = "botaoEx" text-align="center">Excluir Usuário</button>
            
                        </form>

                        
                        <table class = "table table-hover table-inverse" border=0>
                            <thead>
                                <tr>
                                <th id="coluna">Login</th>
                                <th id="coluna">ID Perfil</th>
                                <th id="coluna">Email</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM usuario WHERE id_perfil = 2;";
                                    $resultado = mysqli_query($conn, $busca);
                                   
                                while($registro = mysqli_fetch_assoc($resultado)){
                                    
                                echo '<tr class="info">
                                <td>'.$registro['nome'].'</td>
                                <td>'.$registro['id_perfil'].'</td>
                                <td>'.$registro['email'].'</td>
                                </tr>';
                                }              
                            }
                            catch (Exception $e) {
                                echo 'Erro ao preencher tabela User: ',  $e->getMessage(), "\n";
                            }
                            ?>                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Fim da 2ª Coluna MD5 -->
    
    </div> <!-- Fim da Linha -->
    
    
    <!-- GEREN EMP --> <div class = "row"> <!-- Começo da Linha -->
        
        <div class = "col-md-1">
        </div>
        
        <div class = "col-md-5"> <!-- Começo da 1ª Coluna MD5 -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#addEmp"><span class="glyphicon glyphicon-plus"></span> Adicionar Empresa</a> 
                        </h4>
                    </div>
                            
                    <div id="addEmp" class="panel-collapse collapse"> <!-- Inicio do Form de Registro de Empresas -->
                        <form class = "formCad" name = "formCad" method = "POST" action = "pagAdm/caEmp.php">
                        
                            <input type="text" name="nomeEmp" class = "form-control" id="nomeEmp" placeholder="Nome da Empresa" autofocus required>
                            <input type="text" name="cidadeEmp" class = "form-control" id="cidadeEmp" placeholder="Cidade" required>
                            <input type="text" name="bairroEmp" class = "form-control" id="bairroEmp" placeholder="Bairro" required>
                            <input type="text" name="ruaEmp" class = "form-control" id="ruaEmp" placeholder="Rua" required>
                            <input type="text" name="numeroEmp" class = "form-control" id="numeroEmp" placeholder="Numero" required>
                            <input type="text" name="especificEmp" class = "form-control" id="especificEmp" placeholder="Especificação" required>
                            <input type="text" name="telefone1Emp" class = "form-control" id="telefone1Emp" placeholder="Telefone 1" required>
                            <input type="text" name="telefone2Emp" class = "form-control" id="telefone2Emp" placeholder="Telefone 2" required>
                            
                            <center>
                                <button type="submit" class = "btn btn-default" text-align="center">Registrar Empresa</button>
                            </center>
                        
                        </form> <!-- Fim do Form de Registro de Empresas-->
                        
                        <table class="table table-hover table-inverse" border = 0>
                            <thead>
                            <tr>
                            <th id="coluna">Código</th>
                            <th id="coluna">Lanchonete</th>
                            <th id="coluna">Cidade</th>
                            <th id="coluna">Bairro</th>
                            <th id="coluna">Rua</th>
                            <th id="coluna">Numero</th>
                            <th id="coluna">Especificacao</th>
                            <th id="coluna">Telefone 1</th>
                            <th id="coluna">Telefone 2</th>
                            </tr>
                            </thead>
                
                            <tbody>
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM empresa;";
                                    $resultado = mysqli_query($conn, $busca);
                                   
                                    while($registro = mysqli_fetch_assoc($resultado)){
                                    
                                    echo '<tr class="info">
                                    <td>'.$registro['id'].'</td>
                                    <td>'.$registro['nome'].'</td>
                                    <td>'.$registro['cidade'].'</td>
                                    <td>'.$registro['bairro'].'</td>
                                    <td>'.$registro['rua'].'</td>
                                    <td>'.$registro['numero'].'</td>
                                    <td>'.$registro['especific'].'</td>
                                    <td>'.$registro['telefone1'].'</td>
                                    <td>'.$registro['telefone2'].'</td>
                                    </tr>';
                                    }
                                          
                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher tabela Empresa: ',  $e->getMessage(), "\n";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Fim da 1ª Coluna MD5 -->
        
        
        <div class = "col-md-5"> <!-- Começo da 2ª Coluna MD5 -->  
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#exEmp"><span class="glyphicon glyphicon-trash"></span> Excluir Empresa</a> 
                        </h4>
                    </div>
                            
                    <div id="exEmp" class="panel-collapse collapse"> <!-- Inicio do Form de Registro -->
                        
                        <form class = "formExcluir" name = "formExcluir" method = "POST" action = "pagAdm/excluiEmp.php"> 
                
                            <input type="text" name="excluiEmp" class = "excluir" id="excluiEmp" placeholder="ID da Empresa" autofocus required>
                            <button type="submit" class = "btn btn-default btn-lg" text-align="center">Excluir Empresa</button>
            
                        </form>

                        
                        <table class="table table-hover table-inverse" border = 0>
                            <thead>
                            <tr>
                            <th id="coluna">Código</th>
                            <th id="coluna">Lanchonete</th>
                            </tr>
                            </thead>
                
                            <tbody>
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM empresa;";
                                    $resultado = mysqli_query($conn, $busca);
                                   
                                    while($registro = mysqli_fetch_assoc($resultado)){
                                    
                                    echo '<tr class="info">
                                    <td>'.$registro['id'].'</td>
                                    <td>'.$registro['nome'].'</td>
                                    </tr>';
                                    }
                                          
                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher tabela Empresa: ',  $e->getMessage(), "\n";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Fim da 2ª Coluna MD5 -->
         
    </div> <!-- Fim da Linha -->
            
            
    <!-- GEREN EMP + RAMO --> <div class = "row"> <!-- Começo da Linha -->
        
        <div class = "col-md-1">
        </div>  
        
        <div class = "col-md-5"> <!-- Começo da 1ª Coluna MD5 -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#compEmp"><span class="glyphicon glyphicon-plus"></span> Adicionar Empresa + Ramo</a> 
                        </h4>
                    </div>
                            
                    <div id="compEmp" class="panel-collapse collapse"> <!-- Inicio do Form de Empresa + Ramo -->
                        <form class = "formCad" name = "formCad" method = "POST" action = "pagAdm/emp_ramo.php">
                        
                            <select name = "cmbEmpresa" id = "combo">
                                <?php   
                                try{
                                    include_once '../conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM empresa;";
                                    $resultado = mysqli_query($conn, $busca);
                                   
                                    while($registro = mysqli_fetch_assoc($resultado)){
                                    
                                    echo '<option value="'. $registro['id'].'">'.$registro['id'].' - '.$registro['nome'].'</option>';
                                    }
                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher combo de Empresa: ',  $e->getMessage(), "\n";
                                    }
                                ?>
                            </select>

                            
                            <select name = "cmbRamo" id = "combo">
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM ramo;";
                                    $resultado = mysqli_query($conn, $busca);
                                   
                                    while($registro = mysqli_fetch_assoc($resultado)){
                                    
                                    echo '<option value="'. $registro['id_ramo'].'">'.$registro['id_ramo'].' - '.$registro['ramo'].'</option>';
                                    }
                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher combo de Ramos: ',  $e->getMessage(), "\n";
                                    }
                                ?>
                            </select>
                            
                            <button type="submit" class = "btn btn-default btn-lg" text-align="center">Finalizar</button> 
                        
                        </form> <!-- Fim do Form de Empresa + Ramo -->
                        
                        <table class = "table table-hover table-inverse" border=0>
                            <thead>
                                <tr>
                                <th id="coluna">Empresa</th>
                                <th id="coluna">Ramo</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM empresa_ramo;";
                                    $resultado = mysqli_query($conn, $busca);

                                    while($registro = mysqli_fetch_assoc($resultado)){
                                    
                                    echo '<tr class="info">
                                    <td>'.$registro['id_empresa'].'</td>
                                    <td>'.$registro['id_ramo'].'</td>
                                    </tr>';
                                    }                    
                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher tabela Empresa + Ramo: ',  $e->getMessage(), "\n";
                                    }
                                ?>                  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Fim da 1ª Coluna MD5 --> 
        
        
        <div class = "col-md-5"> <!-- Começo da 2ª Coluna MD5 -->  
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#exCompEmp"><span class="glyphicon glyphicon-trash"></span> Excluir Empresa + Ramo</a> 
                        </h4>
                    </div>
                            
                    <div id="exCompEmp" class="panel-collapse collapse"> <!-- Inicio do Form de Empresa + Ramo -->
                        <form class = "formCad" name = "formCad" method = "POST" action = "ex_emp_ramo.php">
                        
                            <select name = "cmbEmpresa" id = "combo">
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM tbl_empresa;";
                                    $resultado = mysqli_query($conn, $busca);
                                   
                                    while($registro = mysqli_fetch_assoc($resultado)){
                                    
                                    echo '<option value="'. $registro['id'].'">'.$registro['id'].' - '.$registro['nome'].'</option>';
                                    }
                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher combo de Empresa: ',  $e->getMessage(), "\n";
                                    }
                                ?>
                            </select>

                            
                            <select name = "cmbRamo" id = "combo">
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM ramo;";
                                    $resultado = mysqli_query($conn, $busca);
                                   
                                    while($registro = mysqli_fetch_assoc($resultado)){
                                    
                                    echo '<option value="'. $registro['id_ramo'].'">'.$registro['id_ramo'].' - '.$registro['ramo'].'</option>';
                                    }
                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher combo de Ramos: ',  $e->getMessage(), "\n";
                                    }
                                ?>
                            </select>
                            
                            <button type="submit" class = "btn btn-default btn-lg" text-align="center">Finalizar</button> 
                        
                        </form> <!-- Fim do Form de Empresa + Ramo -->
                        
                        <table class = "table table-hover table-inverse" border=0>
                            <thead>
                                <tr>
                                <th id="coluna">Empresa</th>
                                <th id="coluna">Ramo</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM empresa_ramo;";
                                    $resultado = mysqli_query($conn, $busca);

                                    while($registro = mysqli_fetch_assoc($resultado)){
                                    
                                    echo '<tr class="info">
                                    <td>'.$registro['id_empresa'].'</td>
                                    <td>'.$registro['id_ramo'].'</td>
                                    </tr>';
                                    }                    
                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher tabela Empresa + Ramo: ',  $e->getMessage(), "\n";
                                    }
                                ?>                  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Fim da 2ª Coluna MD5 -->
        
    </div> <!-- Fim da Linha -->

    
    <!-- GEREN EMP + DONO --> <div class = "row"> <!-- Começo da Linha -->
        
        <div class = "col-md-1">
        </div>  
        
        <div class = "col-md-5"> <!-- Começo da 1ª Coluna MD5 -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#compDono"><span class="glyphicon glyphicon-plus"></span> Adicionar Dono + Empresa</a> 
                        </h4>
                    </div>
                            
                    <div id="compDono" class="panel-collapse collapse"> <!-- Inicio do Form de Empresa + Ramo -->
                        <form class = "formCad" name = "formCad" method = "POST" action = "pagAdm/dono_emp.php">
                            
                            <select name = "cmbEmp" id = "combo">
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM empresa;";
                                    $resultado = mysqli_query($conn, $busca);
                                   
                                    while($registro = mysqli_fetch_assoc($resultado)){
                                    
                                    echo '<option value="'. $registro['id'].'">'.$registro['id'].' - '.$registro['nome'].'</option>';
                                    }
                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher combo de empresas: ',  $e->getMessage(), "\n";
                                    }
                                ?>
                            </select>
                            
                            <select name = "cmbDono" id = "combo">
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM usuario WHERE id_perfil = 2;";
                                    $resultado = mysqli_query($conn, $busca);
                                   
                                    while($registro = mysqli_fetch_assoc($resultado)){
                                    
                                    echo '<option value="'. $registro['nome'].'">'.$registro['nome'].'</option>';
                                    }
                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher combo de Dono: ',  $e->getMessage(), "\n";
                                    }
                                ?>
                            </select>
                            
                            <button type="submit" class = "btn btn-default btn-lg" text-align="center">Finalizar</button> 
                        
                        </form> <!-- Fim do Form de Dono + Empresa -->
                        
                        <table class = "table table-hover table-inverse" border=0>
                            <thead>
                                <tr>
                                <th id="coluna">ID_Empresa</th>
                                <th id="coluna">Usuário</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php   
                                try{
                                include_once 'conexao.php'; 
                                $conn = new conexao();
                                $busca = "SELECT * FROM dono;";
                                $resultado = mysqli_query($conn, $busca);

                                while($registro = mysqli_fetch_assoc($resultado)){

                                echo '<tr class="info">
                                    <td>'.$registro['id_empresa'].'</td>
                                    <td>'.$registro['login_usuario'].'</td>
                                    </tr>';
                                    }

                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher tabela Dono + Empresa: ',  $e->getMessage(), "\n";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Fim da 1ª Coluna MD5 -->
        
        
        <div class = "col-md-5"> <!-- Começo da 2ª Coluna MD5 -->  
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#exDonoEmp"><span class="glyphicon glyphicon-trash"></span> Excluir Dono + Empresa</a> 
                        </h4>
                    </div>
                            
                    <div id="exDonoEmp" class="panel-collapse collapse"> <!-- Inicio do Form de Empresa + Ramo -->
                        <form class = "formCad" name = "formCad" method = "POST" action = "pagAdm/ex_dono_emp.php">
                            
                            <select name = "cmbEmp" id = "combo">
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM empresa;";
                                    $resultado = mysqli_query($conn, $busca);
                                   
                                    while($registro = mysqli_fetch_assoc($resultado)){
                                    
                                    echo '<option value="'. $registro['id'].'">'.$registro['id'].' - '.$registro['nome'].'</option>';
                                    }
                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher combo de empresas: ',  $e->getMessage(), "\n";
                                    }
                                ?>
                            </select>
                            
                            <select name = "cmbDono" id = "combo">
                                <?php   
                                try{
                                    include_once 'conexao.php'; 
                                    $conn = new conexao();
                                    $busca = "SELECT * FROM usuario WHERE id_perfil = 2;";
                                    $resultado = mysqli_query($conn, $busca);
                                   
                                    while($registro = mysqli_fetch_assoc($resultado)){
                                    
                                    echo '<option value="'. $registro['nome'].'">'.$registro['nome'].'</option>';
                                    }
                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher combo de Dono: ',  $e->getMessage(), "\n";
                                    }
                                ?>
                            </select>
                            
                            <button type="submit" class = "btn btn-default btn-lg" text-align="center">Finalizar</button> 
                        
                        </form> <!-- Fim do Form de Dono + Empresa -->
                        
                        <table class = "table table-hover table-inverse" border=0>
                            <thead>
                                <tr>
                                <th id="coluna">ID_Empresa</th>
                                <th id="coluna">Usuário</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php   
                                try{
                                include_once 'conexao.php'; 
                                $conn = new conexao();
                                $busca = "SELECT * FROM dono;";
                                $resultado = mysqli_query($conn, $busca);

                                while($registro = mysqli_fetch_assoc($resultado)){

                                echo '<tr class="info">
                                    <td>'.$registro['id_empresa'].'</td>
                                    <td>'.$registro['login_usuario'].'</td>
                                    </tr>';
                                    }

                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher tabela Dono + Empresa: ',  $e->getMessage(), "\n";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Fim da 2ª Coluna MD5 --> 
    </div> <!-- Fim da Linha -->
    
</body>
</html>