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
    
    
    <!-- Scripts Necessários -->
    <script type="text/javascript">
    $(document).ready(function(){
         $('#cmbFiltro').change(function(){
            $.ajax({
                type: 'post',
                data: {empresa : $(this).val()},
                url: "../listaLanches.php",
                dataType: "json",
                success: function(data){
                    var options = $('#tbl');
                    options.find('tr').remove();
                    $.each(data, function (key, value){
                        $('<td>').val(key).text(value).appendTo(options);
                    });
                }
            });
         });        
    });
    </script>    
    
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
                            <li class="active"><a href="../user.php">Home</a></li>
                            <li><a href="#comentario" data-toggle="modal" data-target="#comentario">Avaliar Lanche</a></li>
                        </ul>
                    
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
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
                            <img src = "../img/logo.png" id = "logo"> 
                            <h4 class = "modal-title">Realizar Comentario</h4>
                        </center>
                    </div>

                    <form class = "formComent" name = "formComent" method = "POST" action = "comentarioCar.php">
                    <div class="modal-body">
                        <center>
                            
                            <div class = "form-group">
                                <select name = "cmbComida" class = "form-control">
                                        <?php   
                                        try{
                                            $id = $_GET['pegaId'];
                                            $_SESSION['idEmp'] = $id;
                                            include_once '../conexao.php'; 
                                            $conn = new conexao();
                                            $busca = "SELECT * FROM cardapio WHERE id_empresa = '$id'";
                                            $resultado = mysqli_query($conn, $busca);

                                            while($registro = mysqli_fetch_assoc($resultado)){
                                                echo '<option value="'. $registro['id'].'">'.$registro['nome'].'</option>';
                                            }

                                        }
                                        catch (Exception $e) {
                                            echo 'Erro ao preencher combo de Lanches do Pedido: ',  $e->getMessage(), "\n";
                                            }
                                        ?>
                                </select>
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
        
    
    <div class = "row">
        <div class = "col-md-1">
        </div>
        
        <div class = "col-md-3">
            <?php
                $_SESSION['testando'] = $_GET['pegaId'];
                $id = $_GET['pegaId'];
                include_once '../conexao.php'; 
                $conn = new conexao();
                $busca = "SELECT * FROM empresa WHERE id = '$id'";
                $resultado = mysqli_query($conn, $busca);

                while($registro = mysqli_fetch_assoc($resultado)){
                    echo'<center><img id = "foto_cardapio" name = "foto_cardapio" src="../uploads/'.$registro['foto'].'"/></center>';
                }
            ?>
        </div>
        
        <div class = "col-md-4">
            <?php
                $_SESSION['testando'] = $_GET['pegaId'];
                $id = $_GET['pegaId'];
                include_once '../conexao.php'; 
                $conn = new conexao();
                $busca = "SELECT * FROM empresa WHERE id = '$id'";
                $resultado = mysqli_query($conn, $busca);

                while($registro = mysqli_fetch_assoc($resultado)){
                    echo'<center><u id = "titulo"><h1 id = "titulo">'.$registro['nome'].'</h1></u></center>';
                    echo'<center><h3 id = "titulo">'.$registro['rua'].', '.$registro['numero'].' - '.$registro['bairro'].'</h3></center>';
                    echo'<center><h3 id = "titulo">'.$registro['telefone1'].'</h3></center>';
                    echo'<center><h3 id = "titulo">'.$registro['telefone2'].'</h3></center>';
                    //IF E ELSE DAS ESTRELAS
                    if ($registro['nota'] == 0){
                        echo '<center><h2 id = "titulo3">Sem avaliação</h2></center>';
                    }
                    else if($registro['nota'] >= 1 && $registro['nota'] < 2){
                        echo '<center><img id = "starNotaCar" src = "../img/starCar/1star.png"></center>';
                    }
                    else if($registro['nota'] >= 2 && $registro['nota'] < 3){
                        echo '<center><img id = "starNotaCar" src = "../img/starCar/2star.png"></center>';
                    }
                    else if ($registro['nota'] >= 3 && $registro['nota'] < 4){
                        echo '<center><img id = "starNotaCar" src = "../img/starCar/3star.png"></center>';
                    }
                    else if ($registro['nota'] >= 4 && $registro['nota'] < 4.5){
                        echo '<center><img id = "starNotaCar" src = "../img/starCar/4star.png"></center>';
                    }
                    else if ($registro['nota'] > 4.5){
                        echo '<center><img id = "starNotaCar" src = "../img/starCar/5star.png"></center>';
                    }
                }
            ?>
        </div>
        
        <div class = "col-md-3">
            <table class="table tbl" border=0>
                <thead>
                    <tr>
                        <th id = "alinharTop"><h3>Top 5 Lanches</h3></th>
                    </tr>
                </thead>

                <tbody>
                <?php
                try{
                    $id = $_GET['pegaId'];
                    include_once '../conexao.php'; 
                    $conn = new conexao();
                    $busca = "SELECT * FROM cardapio WHERE id_empresa = '$id' ORDER BY nota DESC LIMIT 5";
                    $resultado = mysqli_query($conn, $busca);

                    while($registro = mysqli_fetch_assoc($resultado)){
                         echo '<tr id = "testando">
                            <td><h4 id = "titulo">'.$registro['nome'].'</h4></td>
                            <td><h4 id = "titulo">R$ '.$registro['preco'].'</h4></td>
                        </tr>';
                    }
                }
                catch (Exception $e) {
                    echo 'Erro ao preencher tabela Sugestoes: ',  $e->getMessage(), "\n";
                }
                ?>

                </tbody>
            </table>
        </div>
        
        <div class = "col-md-1">
        </div>
    </div>
    
    
    <br><br>
    <div class = "row">
        <div class = "col-md-1">
        </div>
    
        <div class = "col-md-7">
            <form method="post" id="frm-filtro">
                <div class="input-group">
                    <input type="text" class="form-control" id = "pesquisar" name = "pesquisar" placeholder="Pesquisar Comida">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>    
                </div>
            </form>
        </div>
        
        <div class = "col-md-3">
            <select class="form-control" id="cmbFiltro">
                <?php
                try{
                    include_once '../conexao.php'; 
                    $conn = new conexao();
                    $busca = "SELECT * FROM tipo_comida";
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
    
        <div class = "col-md-1">
        </div>
    </div>
    
    
    
    <div class = "row">
        <div class = "col-md-1">
        </div>
    
        <div class = "col-md-10">
            <form class = "formPed" name = "formPed" method = "POST" action = "pedido.php">
            <table class="table tbl" id = "tbl" border=0>
                <thead>
                    <tr>
                        <th id = "alinhar"><h4>Nome</h4></th>
                        <th id = "alinhar"><h4>Preço</h4></th>
                        <th id = "alinhar"><h4>Quantidade</h4></th>
                    </tr>
                </thead>

                <tbody>
                <?php
                try{
                    $id = $_GET['pegaId'];
                    include_once '../conexao.php';
                    $conn = new conexao();
                    $busca = "SELECT * FROM cardapio WHERE id_empresa = '$id'";
                    $resultado = mysqli_query($conn, $busca);

                    while($registro = mysqli_fetch_assoc($resultado)){
                        echo '<tr id = "testando">
                        <div class = "row">
                        
                            <div class = "col-md-4">
                                <td> <h4 id = "titulo">'.$registro['nome'].'</h4> <h5 id = "titulo">('.$registro['ingredientes'].')</h5></td>
                            </div>
                            
                            <div class = "col-md-2">
                                <td class = "branco teste" name = "preco_unidade" id = "preco_'.$registro['id'].'">'.$registro['preco'].'</td>
                            </div>
                            
                            <div class = "col-md-3">
                                <td id = "titulo"> <center>
                                    <div class="input-group number-spinner">
                                        <span class="input-group-btn data-dwn">
                                            <button class="btn btn-default btn-success botao" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
                                        </span>

                                        <input type="text" name = "txtQtd'.$registro['id'].'" class="form-control text-center" id = "txtQtd_'.$registro['id'].'" value="0" min="0">

                                        <span class="input-group-btn data-up">
                                            <button class="btn btn-default btn-success botao" data-dir="up" value = "'.$registro['id'].'"><span class="glyphicon glyphicon-plus"></span></button>
                                        </span>
                                    </div>
                                    </center>
                                </td>
                            </div>
                            
                            <div class = "col-md-3">
                                <td> 
                                    <div class = "row">
                                        <div class = "col-md-12" id = "titulo">
                                            <div class = "form-group">
                                            <center>
                                                <input type = "text" class = "form-control" name = "valor_total" id = "valor_total_'.$registro['id'].'" disabled>
                                            </div>  
                                        </div>
                                    </div>
                                </td>
                            </div>
                        
                        </div>
                        
                        <script>
                            $(document).ready(function(){
                                $(".botao").click(function(){

                                    var valor = $("#preco_'.$registro['id'].'").html(); //Html traz texto que ja esta imbutido
                                    var quantidade = $("#txtQtd_'.$registro['id'].'").val(); //Val traz texto que vai ser inserido    

                                    var resultado = (valor * quantidade);

                                    document.getElementById("valor_total_'.$registro['id'].'").value = resultado; 
                                    $("#valor_total_'.$registro['id'].'").html(resultado);
                                });
                            });
                        </script>

                        </tr>';
                    }
                }
                catch (Exception $e) {
                    echo 'Erro ao preencher tabela Cardapio: ',  $e->getMessage(), "\n";
                }
                ?>

                </tbody>
            </table>
                <center>
                    <button type="submit" class = "btn btn-success btn-block"><h4>Confirmar Pedido</h4></button>
                </center>
            </form> 
            
        </div>
    
        <div class = "col-md-1">
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












