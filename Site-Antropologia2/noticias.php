<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Museu Virtual- Tronco, Ramos e Raízes</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="brand">Museu Virtual- Tronco, Ramos e Raízes</div>
    <div class="address-bar">Fundado em 10 de Dezembro de 2013 O Museu Virtual “Tronco, ramos e raízes!”, dedica-se à valorização e difusão do patrimônio étnico do Seridó.</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Business Casual</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li>
                        <a href="coletaneas.php">Coletâneas</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="noticias.php?id_inicial=0&id_final=5">Noticías</a>
                    </li>
                    <li>
                        <a href="contact.html">Contato</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Notícias</strong>
                    </h2>
                    <hr>
                </div>
				<?php
				 		include("conexao.php");
						if ((isset( $_GET['id_inicial']))and(isset( $_GET['id_final']))) {
							 $id_inicial=(int)$_GET['id_inicial'];
							 $id_final=(int)$_GET['id_final'];
							 if((!isset( $id_inicial))or(!isset( $id_inicial))){
									header("Location:index.html");

							 }
							 $id_inicial=(int)$_GET['id_inicial'];
							 $id_final=(int)$_GET['id_final'];
							 $dados_noticia=mysql_query("Select * from noticia where id>'$id_inicial' and id<='$id_final'   order by  id DESC");
							 while($listar_noticia=mysql_fetch_array($dados_noticia)){
								$id_noticia=$listar_noticia['id'];
								$titulo_noticia=$listar_noticia['titulo'];
								$descricao_noticia=$listar_noticia['descricao'];
								$data_noticia=$listar_noticia['data_publicacao'];
								$dados_imagem=mysql_query("Select * from imagem_noticia where noticia=$id_noticia");
								if((mysql_num_rows($dados_imagem))!=0){
									while($listar_imagem=mysql_fetch_array($dados_imagem)){
											$caminho_imagem="../Projeto_Antropologia/cadastrar/".$listar_imagem['caminho'];


									}
								}
										echo'<div class="col-lg-12 text-center">';
											if(isset($caminho_imagem)){
												echo '<img class="img-responsive img-border " src="'.$caminho_imagem.'" alt=""  width="510" height="510" >';	
											}
											echo'<h2>'.$titulo_noticia.'';
											echo'<br><small>'.$data_noticia.'</small></h2>';
											echo'<p class="text-justify">'.$descricao_noticia.'</p>';
											echo'<hr>';
											echo'</div>';
												unset($caminho_imagem);

								}
						}else{
									header("Location:index.html");

						}
				?>

               
                <div class="col-lg-12 text-center">
                    <ul class="pager">
                        <li class="previous"><a href="noticias.php?id_inicial=<?php echo $id_inicial-5;?>&id_final=<?php echo $id_final-5;?>">&larr; Anterior</a>
                        </li>
                        <li class="next"><a href="noticias.php?id_inicial=<?php echo $id_inicial+5;?>&id_final=<?php echo $id_final+5;?>">Próxima&rarr;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
