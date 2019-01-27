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
    <link rel="stylesheet" href="css/usuario.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    <link rel="stylesheet" href="css/tabelaEmpresas.css" type="text/css">
    <link rel="stylesheet" href="css/navbar.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script src="jquery.tablesorter.min.js"></script>
    <script src="jquery.tablesorter.pager.js"></script>
    
    
    <!-- ICONES --> 
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
    
    <!--<script type="text/javascript">
    $(document).ready(function(){
         $('#cmbFiltro').change(function(){
            $.ajax({
                type: 'post',
                data: {empresa : $(this).val()},
                url: "listaLanches.php",
                dataType: "json",
                success: function(data){
                    var options = $('#tbl');
                    options.find('td').remove();
                    $.each(data, function (key, value){
                        $('<td>').val(key).text(value).appendTo(options);
                    });
                }
            });
         });        
    });
    </script> -->
    
    <script>
    $(function() {
    var action;
    $(".number-spinner button").mousedown(function () {
        btn = $(this);
        input = btn.closest('.number-spinner').find('input');
        btn.closest('.number-spinner').find('button').prop("disabled", false);
        
    	if (btn.attr('data-dir') == 'up') {
            action = setInterval(function(){
                if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
                    input.val(parseInt(input.val())+1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	} else {
            action = setInterval(function(){
                if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
                    input.val(parseInt(input.val())-1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	}
    }).mouseup(function(){
        clearInterval(action);
    });
});
    </script>
    
    <script type="text/javascript"> 
        $(document).ready(function(){
            $('.botao').click(function(){
                
                var valor = $("#preco_unidade").html(); //Html traz texto que ja esta imbutido
                var quantidade = $("#txtQtd").val(); //Val traz texto que vai ser inserido    
                
                var resultado = (valor * quantidade);
                
                document.getElementById("valor_total").value = resultado; 
                $("#valor_total").html(resultado);
            });
        });
    </script> 
    
    <script>
    $(document).ready(function(){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('a[href="#top"]').fadeIn();
        } else {
            $('a[href="#top"]').fadeOut();
        }
    });

    $('a[href="#top"]').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
    });
    </script>
    
</head>


<body id = "cor">
    <a href="#top" class="glyphicon glyphicon-chevron-up"></a>
    
    <div class = "row">
        <div class = "col-md-12">
            <nav class="navbar" id = "cssmenu">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">ComeKeto</a>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="active"><a href="user.php">Home</a></li>
                            <li><a href="#comentario" data-toggle="modal" data-target="#comentario">Avaliar Empresa</a></li>
                            <li><a href="#com4me" data-toggle="modal" data-target="#com4me">Comentários Sobre Mim</a></li>
                            <li><a href="#meusComents" data-toggle="modal" data-target="#meusComents">Minhas Avaliações</a></li>
                        </ul>
                    
                    
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
                        </ul>
                    </div>
                </div>
            </nav>        
        </div>
    </div>
    
    <div class="modal fade" id="comentario" role="dialog"> <!-- COMEÇO DO TERCEIRO MODAL -->
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

                    <form class = "formComent" name = "formComent" method = "POST" action = "user/comentario.php">
                    <div class="modal-body">
                        <center>
                            
                            <div class = "form-group">
                                <select name = "cmbEmpresa" id = "combo">
                                        <?php   
                                        try{
                                            include_once 'conexao.php'; 
                                            $conn = new conexao();
                                            $busca = "SELECT * FROM empresa";
                                            $resultado = mysqli_query($conn, $busca);

                                            while($registro = mysqli_fetch_assoc($resultado)){
                                                echo '<option value="'. $registro['id'].'">'.$registro['nome'].'</option>';
                                            }

                                        }
                                        catch (Exception $e) {
                                            echo 'Erro ao preencher combo de Empresa do Pedido: ',  $e->getMessage(), "\n";
                                            }
                                        ?>
                                </select>
                            </div>
                            
                            <div class = "form-group">
                                <textarea class="form-control" name = "coment" rows="4" id="coment" required></textarea>
                            </div>                            
                            
                            <h3>
                            <div class="estrelas">
                                
                                <input type="radio" id="vazio" name="estrela" value="" checked>
				
                                <label for="estrela_um"><i class="fa"></i></label>
                                <input type="radio" id="estrela_um" name="estrela" value="1">

                                <label for="estrela_dois"><i class="fa"></i></label>
                                <input type="radio" id="estrela_dois" name="estrela" value="2">

                                <label for="estrela_tres"><i class="fa"></i></label>
                                <input type="radio" id="estrela_tres" name="estrela" value="3">

                                <label for="estrela_quatro"><i class="fa"></i></label>
                                <input type="radio" id="estrela_quatro" name="estrela" value="4">

                                <label for="estrela_cinco"><i class="fa"></i></label>
                                <input type="radio" id="estrela_cinco" name="estrela" value="5">
                                
                            </div>
                            </h3>
                                
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
    
    <div class="modal fade" id="com4me" role="dialog"> <!-- COMEÇO DO TERCEIRO MODAL -->
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
                            <th id="coluna">Empresa</th>
                            <th id="coluna">Comentários</th>
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
                                            $comentarios = "SELECT * FROM coment_empresa WHERE id_usuario = '" .$usuario['id']."'";
                                            $resultado2 = mysqli_query($conn, $comentarios);

                                            while($registro = mysqli_fetch_assoc($resultado2)){
                                                
                                                $empresa = "SELECT * FROM empresa WHERE id = '" .$registro['id']."'";
                                                $resultado3 = mysqli_query($conn, $empresa);

                                                while($nome = mysqli_fetch_assoc($resultado3)){
                                                
                                                    echo '<tr class="info">
                                                        <td>'.$nome['nome'].'</td>
                                                        <td>'.$registro['comentario'].'</td>
                                                        </tr>';
                                                    }
                                            }
                                        }
                                }
                                catch (Exception $e) {
                                    echo 'Erro ao preencher tabela Comentario (usuário - empresa): ',  $e->getMessage(), "\n";
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
        </div> <!-- FIM DO TERCEIRO MODAL -->
    
    <div class="modal fade" id="meusComents" role="dialog"> <!-- COMEÇO DO TERCEIRO MODAL -->
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
                            <th id="coluna">Comentários</th>
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
                                            $comentarios = "SELECT * FROM coment_usuario WHERE id_usuario = '" .$usuario['id']."'";
                                            $resultado2 = mysqli_query($conn, $comentarios);

                                            while($registro = mysqli_fetch_assoc($resultado2)){
                                                
                                                $empresa = "SELECT * FROM empresa WHERE id = '" .$registro['id_empresa']."'";
                                                $resultado3 = mysqli_query($conn, $empresa);

                                                while($nome = mysqli_fetch_assoc($resultado3)){
                                                
                                                    echo '<tr class="info">
                                                        <td>'.$nome['nome'].'</td>
                                                        <td>'.$registro['comentario'].'</td>
                                                        </tr>';
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
        </div> <!-- FIM DO TERCEIRO MODAL -->
    
    
    
    
    <div class = "row">
        <div class = "col-md-2">
        </div>
        
        <div class = "col-md-9">
            <div class = "row">
                
                <div class = "col-md-2">
                    <?php
                        include_once 'conexao.php';                      
                        $conn = new conexao();

                        $sql = mysqli_query($conn, "SELECT * FROM empresa"); 
                        $row = mysqli_num_rows($sql);

                        echo '<center><h4 id = "conteudo2">'.$row.' empresas disponiveis</h4><center>'
                    ?>
                </div>
                
                <div class = "col-md-7">
                    <center>
                        <form method="post" id="frm-filtro">
                        <div class="input-group">
                            <input type="text" class="form-control" id = "pesquisar" name = "pesquisar" placeholder="Pesquisar Estabelecimento">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>    
                        </div>
                        </form>
                    </center>
                </div>
                
                <div class = "col-md-3">
                    <select class = "form-control" name = "cmbFiltro">
                    <option value="" selected>Filtrar por ...</option>
                        <?php   
                        try{
                            include_once 'conexao.php'; 
                            $conn = new conexao();
                            $busca = "SELECT * FROM ramo";
                            $resultado = mysqli_query($conn, $busca);

                            while($ramos = mysqli_fetch_assoc($resultado)){
                                echo '<option value="'. $ramos['id_ramo'].'">'.$ramos['ramo'].'</option>';
                                }
                            }
                            catch (Exception $e) {
                                echo 'Erro ao preencher combo de Empresa do Pedido: ',  $e->getMessage(), "\n";
                                }
                        ?>
                    </select>
                </div>
                
            </div>
        </div>
    </div>
    
    
    <div class = "row">
        <div class = "col-md-2">
        </div>
        
        <div class = "col-md-9">
            <table cellspacing="0" class = "tbl" id = "tbl">
                    <tbody>
                        <?php   
                            try{
                                include_once 'conexao.php'; 
                                $conn = new conexao();
                                $busca = "SELECT * FROM empresa ORDER BY nota DESC;";
                                $resultado = mysqli_query($conn, $busca);

                                while($registro = mysqli_fetch_assoc($resultado)){
                                echo '<tr>
                                    <td>
                                    <div class = "row">
                                    
                                        <div class = "col-md-1">
                                        </div>
                                        
                                        <div class = "col-md-2">
                                        <br>
                                        <center>
                                            <img id = "foto_empresas" name = "foto_empresas" src="uploads/'.$registro['foto'].'"/>
                                        </center>
                                        </div>
                                        
                                        <div class = "col-md-4">
                                        <br>
                                            <center>
                                                <h2 id = "conteudo">'.$registro['nome'].' - '.$registro['cidade'].'</h2>
                                                <h4 id = "conteudo">'.$registro['rua'].', '.$registro['numero'].' - '.$registro['bairro'].' ('.$registro['especific'].')</h4>
                                                <h4 id = "conteudo">'.$registro['telefone1'].' / '.$registro['telefone2'].'</h4>
                                            </center>
                                        </div>
                                        
                                        <div class = "col-md-5">                                               
                                            <br><br>
                                            
                                            <div class = "row">
                                                <div class = "col-md-8">
                                                    <div class = "row">
                                                        <div class = "col-md-12">
                                                        <form method="GET" enctype="multipart/form-data" action="user/cardapio.php">
                                                            <button id = "btnEmp" class = "btn btn-primary btn-block" type="submit>"<li class="list-group-item list-group-item-info" value="'.$registro['id'].'" name="pegaId"><h4>Cardápio</h4></li></button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class = "row">
                                                        <div class = "col-md-12">
                                                            <button type="button" id = "btnEmp" class="btn btn-success btn-block" data-toggle="modal" data-target="#mapa_'.$registro['id'].'"><h4>Ver no Google Maps</h4></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class = "col-md-4">
                                                <br><br>  '; // FIM DO ECHO PARA FAZER O IF E ELSE DAS ESTRELAS
                                                    if ($registro['nota'] == 0){
                                                        echo '<center><h4 id = "nota">Sem avaliação</h4></center>';
                                                    }
                                                    else if($registro['nota'] >= 1 && $registro['nota'] < 2){
                                                        echo '<center><img id = "starNota" src = "img/star/1star.png"></center>';
                                                    }
                                                    else if($registro['nota'] >= 2 && $registro['nota'] < 3){
                                                        echo '<center><img id = "starNota" src = "img/star/2star.png"></center>';
                                                    }
                                                    else if ($registro['nota'] >= 3 && $registro['nota'] < 4){
                                                        echo '<center><img id = "starNota" src = "img/star/3star.png"></center>';
                                                    }
                                                    else if ($registro['nota'] >= 4 && $registro['nota'] < 4.5){
                                                        echo '<center><img id = "starNota" src = "img/star/4star.png"></center>';
                                                    }
                                                    else if ($registro['nota'] > 4.5){
                                                        echo '<center><img id = "starNota" src = "img/star/5star.png"></center>';
                                                    }
                                                echo '  
                                                </div>
                                                
                                                <div class="modal fade" id="mapa_'.$registro['id'].'" role="dialog"> <!-- COMEÇO DO MODAL AVISO-->
                                                    <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <center>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <img src = "img/logo.png" id = "logo"> 
                                                                    <h4 class = "modal-title">Empresa ('.$registro['nome'].') - Localização</h4>
                                                                </center>
                                                            </div>

                                                            <div class="modal-body">
                                                                <iframe src="'.$registro['mapa'].'" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <center>
                                                                    <button type="submit" class = "btn btn-default" data-dismiss="modal">Sair</button>
                                                                </center>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div> <!-- FIM DO MODAL AVISO -->
                                            </div>
                                        </div>   
                                        </div>
                                    </div>
                                    </td>                                    
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
    
    <script>
    $('#pesquisar').keydown(function(){
        var encontrou = false;
        var termo = $(this).val().toLowerCase();
        $('table > tbody > tr').each(function(){
          $(this).find('td').each(function(){
            if($(this).text().toLowerCase().indexOf(termo) > -1) encontrou = true;
          });
          if(!encontrou) $(this).hide();
          else $(this).show();
          encontrou = false;
        });
      });
    </script>
    
</body>
</html>