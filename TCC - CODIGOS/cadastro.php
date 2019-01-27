<?php
        session_start();

		$nome = $_POST['nomeCad'];
		$senha = $_POST['senhaCad'];
		$email = $_POST['emailCad'];
        $perfil = '3';
        $senhaCodificada = hash('sha256', $senha);
		
        include_once 'conexao.php';
        $conn = new conexao();
        
        $verifica = "SELECT * FROM usuario WHERE email = '$email'";
        $executa = mysqli_query($conn, $verifica);
        $row = mysqli_num_rows($executa);
        $teste = mysqli_fetch_assoc($executa);
        
            if($row > 0){
                $_SESSION['mensagem'] = "O email informado já existe, tente novamente!";
            }
            else{
                $sql = "INSERT INTO usuario(id_perfil, nome, email, senha) VALUES('$perfil', '$nome', '$email', '$senhaCodificada')";
                $executa2 = mysqli_query($conn, $sql);
                header("Location: index.php");
            }
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <title>ComeKeto</title>
        <link rel="icon" href="img/logo.png" type="image/x-icon" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="css/footer.css" type="text/css">
        <link rel="stylesheet" href="css/navbar.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- ICONES --> <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- JS -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/npm.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <script>
            $(document).ready(function () {
                $('#aviso').modal('show');
            });
        </script>
	</head>
	<body class = "cor">
    
    <div class="modal fade" id="aviso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-exclamation-sign"></span>  Erro ao realizar Cadastro!</h4>
                </div>
                <div class="modal-body">								
                    <?php echo '<center><h5><b>'.$_SESSION['mensagem'].'</b></h5></center>'; ?>
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn btn-default btn-md" data-dismiss="modal">Ok</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
        
        
    <nav class="navbar" id = "cssmenu"> <!-- COMEÇO DA NAVBAR -->
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Bem-Vindo ao Comeketo</a>
                </div>
            </div>
                    
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a id = "link" href="#cadastro" data-toggle="modal" data-target="#cadastro"><span class="glyphicon glyphicon-user"></span> Cadastro</a></li>
                    <li><a id = "link" href="#login" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav> <!-- FIM DA NAVBAR -->
            
    <div class="modal fade" id="login" role="dialog"> <!-- COMEÇO DO PRIMEIRO MODAL -->
        <div class="modal-dialog modal-sm">
        <!-- Modal content-->
            <div class="modal-content">        
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tela de Login</h4>
                </div>
                
                <form class = "formLog" name = "formLog" method = "POST" action = "login.php">
                    <div class="modal-body">
                    <center>
    
                        <div class = "form-group">
                            <label><span class="glyphicon glyphicon-user"></span> Email</label>
                            <input type="text" class="form-control" name="login" id = "login" class="mdl" placeholder="Email" autofocus required>
                        </div>
                        
                        <div class = "form-group">
                            <label><span class="glyphicon glyphicon-asterisk"></span> Senha</label>
                            <input type="password" class="form-control" name="senhaLog" id = "senhaLog" class="mdl" placeholder="Senha" required>    
                        </div>
                        
                    </center>
                    </div>
                    
                    <div class="modal-footer">
                        <center>
                            <button type="submit" class = "btn btn-default btn-md botaoAviso">Entrar</button>
                        </center>
                    </div>
                    </form>
                </div>
        </div>
    </div> <!-- FIM DO PRIMEIRO MODAL -->
            
            
    <div class="modal fade" id="cadastro" role="dialog"> <!-- COMEÇO DO SEGUNDO MODAL -->
        <div class="modal-dialog modal-sm">
        <!-- Modal content-->
            <div class="modal-content">                

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tela de Cadastro</h4>
                </div>

                <form class = "formCad" name = "formCad" method = "POST" action = "cadastro.php">
                <div class="modal-body">

                    <div class = "form-group">
                        <label><span class="glyphicon glyphicon-user"></span> Nome de Usuário</label>
                        <input type="text" name="nomeCad" class="form-control" id="nome" placeholder="Nome de Usuário" autofocus required>
                    </div>

                    <div class = "form-group">
                        <label><span class="glyphicon glyphicon-envelope"></span> Email</label>
                        <input type="email" name="emailCad" class="form-control" id="email" placeholder="Email" required>
                    </div>

                    <div class = "form-group">
                        <label><span class="glyphicon glyphicon-asterisk"></span> Senha</label>
                        <input type="password" name="senhaCad" class="form-control" id="senha" placeholder="Informe uma senha" required>
                    </div>

                    <div class = "form-group">
                        <label><span class="glyphicon glyphicon-check"></span> Confirme a Senha</label>
                        <input type="password" name="cSenha" class="form-control" id="cSenha" placeholder="Confirme a senha" required>
                    </div>

                    <div class="checkbox">
                        <label><input type="checkbox" value="" required>Li e Concordo com os <a href="#termos" data-toggle="modal" data-target="#termos">Termos de Uso</a></label>
                    </div>

                </div>  

                <div class="modal-footer">
                    <center>
                        <button type="submit" class = "btn btn-default btn-md">Registrar-se</button>
                    </center>
                </div>
                </form> <!-- Fim do Form de Registro --> 

            </div>
        </div>
    </div> <!-- FIM DO SEGUNDO MODAL -->   
        
    
    <div class="modal fade" id="termos" role="dialog"> <!-- COMEÇO DO TERCEIRO MODAL -->
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <img src = "img/logo.png" id = "logo"> 
                        <h4 class="modal-title">TERMOS DE USO COMEKETO</h4>
                    </center>
                </div>

                <div class="modal-body">
                    <p>- Os usuários que realizarem pedidos "fake" terão suas contas banidas, podendo até mesmo arcar com os custos da comida feita;</p>
                    <p>- O site (nem o app) terá forma de pagamento;</p>
                    <p>- Informar a forma de pagamento e troco (caso necessário) de forma correta, onde a empresa não terá culpa se a opção estiver errada;</p>
                    <p>- Todos os usuários têm seus dados e suas contas protegidas pelo ComeKeto;</p>
                    <p>- O uso da imagem e conteúdo do próprio site (mais voltado as empresas) é da responsabilidade do estabelecimento;</p>
                    <p>- O ComeKeto não se responsabiliza caso o pedido venha de forma incorreta ao que foi pedido, mas sim a própria empresa.</p>
                </div>

            </div>
        </div>
    </div> <!-- FIM DO TERCEIRO MODAL -->
    
    
    
    
    
    <div class = "row">
                
        <div class = "col-md-1">
        </div>
        
        <div class = "col-md-3">
            <img id = "logoInicio" src = "img/logo.png">
            
            <center>
                <button type="button" id = "btnEmp" class="btn btn-success btn-block" data-toggle="modal" data-target="#colaboradores"><h4>Nossos Colaboradores</h4></button>
                <button type="button" id = "btnEmp" class="btn btn-primary btn-block" data-toggle="modal" data-target="#projeto"><h4>Sobre o Projeto</h4></button>
                <button type="button" id = "btnEmp" class="btn btn-default btn-block" data-toggle="modal" data-target="#participe"><h4>Entre para o Comeketo</h4></button>
                <br>
            </center>
            
            <div class = "row">
                
                <div class = "col-md-12">
                    <center>
                        <a class="img"  href="#" data-toggle="modal" data-target="#formulario"><img id = "logos" src = "img/avaliacao.png" title="Avalie o nosso site"></a>
                        <a class="img"  href="http://www.ifspcapivari.com.br/" target="_blank"><img id = "logos2" src = "img/logoIF.jpg" title="Projeto desenvolvido como parceria do IFSP Capivari"></a>
                        <a class="img"  href="https://www.facebook.com/comeketopgm/" target="_blank"><img id = "logos" src = "img/facebook.png" title="Clique e curta-nos no face"></a>
                        <a class="img" href="#"><img id = "logos" src = "img/gmail.png" title="Email para contato: comeketopgm@gmail.com"></a>
                    </center>
                </div>
                
                
                <div class="modal fade" id="formulario" role="dialog"> <!-- COMEÇO DO MODAL -->
                    <div class="modal-dialog">
                    <!-- Modal content-->
                        <div class="modal-content">

                            <div class="modal-header">
                                <center>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <img src = "img/logo.png" id = "logo">
                                    <h4 class = "modal-title"></h4>
                                </center>
                            </div>

                            <div class="modal-body">
                                <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeGdfnCjBl42AKTOu5PMCBub3kCjxoiaBl5IBtqRrMsHmuhlg/viewform?embedded=true" width="100%" height="500" frameborder="0" marginheight="0" marginwidth="0">A carregar...</iframe>
                            </div>

                            <div class="modal-footer">
                                <center>
                                    <button type="submit" class = "btn btn-success btn-lg" data-dismiss="modal">Sair</button>
                                </center>
                            </div>

                        </div>
                    </div>
                </div> <!-- FIM DO MODAL -->
                
            </div>
        </div>
        
        <div class = "col-md-8">
            <div class = "row">
                <div class = "col-md-12">
                    <center>
                        <u id = "branco">
                            <h1>COMEKETO CHEGOU EM CAPIVARI</h1>
                        </u>
                    </center>
                </div>
            </div>
            
            <br>
            <div class = "row">
                <div class = "col-md-1">
                </div>
                
                <div class = "col-md-5">
                    <center>
                        <div class = "imageBox">
                            <img id = "ramos" src = "img/lanche.jpg">
                            <div class = "textBox" id = "ramos">
                                <img id = "mickey" src = "img/pluto.gif">
                                <h2>Cansado de comer sempre no mesmo lugar?</h2>
                            </div>
                        </div>
                    </center>
                </div>
                                
                <div class = "col-md-5">
                    <center>
                        <div class = "imageBox">
                            <img id = "ramos" src = "img/japa.jpg">
                            <div class = "textBox" id = "ramos">
                                <img id = "mickey" src = "img/minnie.gif">
                                <h2>Avaliação do local antes de pedir?</h2>
                            </div>
                        </div>
                    </center>
                </div>
                
                <div class = "col-md-1">
                </div>
            </div>
            
            <br>
            <div class = "row">
                <div class = "col-md-1">
                </div>
                
                <div class = "col-md-5">
                    <center>
                        <div class = "imageBox">
                            <img id = "ramos" src = "img/pizza.jpg">
                            <div class = "textBox" id = "ramos">
                                <img id = "mickey" src = "img/mickey.gif">
                                <h2>Cansado de ligar e a linha estar ocupada?</h2>
                            </div>
                        </div>
                    </center>
                </div>
                                
                <div class = "col-md-5">
                    <center>
                        <div class = "imageBox">
                            <img id = "tamanho" src = "img/food.jpg">
                            <div class = "textBox" id = "ramos">
                                <img id = "mickey" src = "img/donald.gif">
                                <h2>O ComeKeto resolve pra você!</h2>
                            </div>
                        </div>
                    </center>
                </div>
                
                <div class = "col-md-1">
                </div>
            </div>
        </div>
        
        
        <div class="modal fade" id="colaboradores" role="dialog"> <!-- COMEÇO DO TERCEIRO MODAL -->
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
                        <?php
            
                            include_once 'conexao.php';                      
                            $conn = new conexao();

                            $sql = mysqli_query($conn, "SELECT * FROM empresa");

                            while($registro = mysqli_fetch_assoc($sql)){
                                echo '<img id = "empresas" src = "uploads/'.$registro['foto'].'">';

                            }

                        ?>
                    </div>
                </div>
            </div>
        </div> <!-- FIM DO TERCEIRO MODAL -->
    
    
        <div class="modal fade" id="projeto" role="dialog"> <!-- COMEÇO DO TERCEIRO MODAL -->
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
                        <img id = "if" src = "img/if.jpg">
                        <center><h4>Atualmente em Capivari, muitas lanchonetes são desconhecidas e não possuem uma avaliação, devido a sempre estarem na sombra das mais tradicionais. Com isso, clientes têm suas opções restritas e menos informações sobre várias lanchonetes.  Sendo assim, foi desenvolvido um aplicativo Android com o objetivo de divulgar os estabelecimentos de forma igualitária, com suas devidas informações, avaliação dos usuários e cardápios, possibilitando a realização de pedidos pelos clientes. O aplicativo foi desenvolvido por meio do software Android Studio com a plataforma da Google (Firebase) para Banco de Dados. Foram fechados acordos com 10 estabelecimentos de lanches, pizzas e comida japonesa, que terão disponível um site para gerenciar melhor os pedidos em uma interface maior. Através disso, o usuário, ao acessar sua conta, realizará pedidos delivery de uma forma mais rápida e prática, tendo uma diversidade maior de lanchonetes para escolher.</h4></center>
                    </div>
                </div>
            </div>
        </div> <!-- FIM DO MODAL -->
        
        
        <div class="modal fade" id="participe" role="dialog"> <!-- COMEÇO DO TERCEIRO MODAL -->
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
                        <center><h4>Entre com sua empresa para o Comeketo, basta enviar um email para comeketopgm@gmail.com, e aguardar nossa resposta! Vem pro ComeKeto!</h4></center>
                    </div>
                </div>
            </div>
        </div> <!-- FIM DO MODAL -->
        
    </div>
    
    <br><br>
    <div class="footer-bottom">
        <div class="row">  
            <div class = "col-md-12">
                <center>
                    <p id = "txtFooter"> ComeKeto</p>
                </center>
            </div>    
        </div>
    </div>
    
    <!-- Scripts necessários -->
    <script>
        function validaSenha(){
            var senha = document.getElementById("senha"); 
            var cSenha = document.getElementById("cSenha"); 
        
            if(senha.value == cSenha.value) {
                cSenha.setCustomValidity('');
            } else {
                cSenha.setCustomValidity("Senhas diferentes!");
            }
        }
         senha.onchange = validaSenha; 
         cSenha.onkeyup = validaSenha;
    </script>
</body>
</html>