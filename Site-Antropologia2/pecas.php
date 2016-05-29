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
                <div class="col-lg-12 text-center">
                 <?php
	 		include("conexao.php");
		if (isset( $_GET['id'])) {
				$id=(int)$_GET['id'];
				$coletanea = mysql_query("Select c.id id ,c.titulo titulo ,c.descricao descricao from coletanea c where c.id='$id'");
				while($listar_coletanea = mysql_fetch_array($coletanea)) {
					$titulo_coletanea=$listar_coletanea['titulo'];
				}
				echo "<h1 class='page-header text-center'>".$titulo_coletanea."</h1>";
		}else{
				header("Location:coletaneas.php");

		
		}
	?>
        <div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Fotos</a></li>
    <li><a href="#tab2" data-toggle="tab">Documentos</a></li>
	    <li><a href="#tab3" data-toggle="tab">Áudios</a></li>
	    <li><a href="#tab4" data-toggle="tab">Vídeos</a></li>

  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
	<?php
				$peca=mysql_query("Select p.id id,p.descricao descricao,p.titulo titulo,p.autor autor,p.data_criacao data,p.link link from peca p where p.coletanea='$id' and p.objeto=3");
				if((mysql_num_rows($peca))!=0){
						while($listar_peca = mysql_fetch_array($peca)) {
							echo '<div class="col-md-4 portfolio-item">';
							echo'<a href="">';
							$id_peca=$listar_peca['id'];
							$link=$listar_peca['link'];
							if(empty($link)){
								$imagem=mysql_query("Select a.caminho caminho from arquivo a where a.peca='$id_peca'");
								while($listar_imagem = mysql_fetch_array($imagem)) {
								$caminho='../Projeto_Antropologia/cadastrar/'.$listar_imagem['caminho'];
								}
								echo '<img class="img-responsive" src="'.$caminho.'" alt="" width="300" height="50" ></a>';
							}else{
								echo '<img class="img-responsive" src="'.$link.'" alt="" width="300" height="50" ></a>';

							
							}
							echo'<h3>'.$listar_peca['titulo'].'</h3>';
							echo'<p class="text-justify">'.$listar_peca['descricao'].'</p>';
							echo '<p class="text-justify">Autor: '.$listar_peca['autor'].'</p>';
							echo '<p class="text-justify"><i class="fa fa-clock-o" aria-hidden="true"> </i> '.$listar_peca['data'].'</p>';
							if(empty($link)){
								echo'<p class="text-justify"><a href="'.$caminho.'" download="'.$listar_peca['titulo'].'"><i class="fa  fa-download" aria-hidden="true"></i>    Baixar</a>';
							}else{
								echo'<p class="text-justify"><a href="'.$link.'" download="'.$listar_peca['titulo'].'"><i class="fa  fa-download" aria-hidden="true"></i>    Baixar</a>';

							}
							echo'</div>';
						}
				
				}
	?>
    </div>
    <div class="tab-pane" id="tab2">
	<?php
				$peca=mysql_query("Select p.id id,p.descricao descricao,p.titulo titulo,p.autor autor,p.data_criacao data,p.link link from peca p where p.coletanea='$id' and p.objeto=1");
				if((mysql_num_rows($peca))!=0){
						while($listar_peca = mysql_fetch_array($peca)) {
							echo '<div class="col-md-4 portfolio-item">';
							echo'<a href="">';
							$id_peca=$listar_peca['id'];
							$link=$listar_peca['link'];
							if(empty($link)){
								$arquivo=mysql_query("Select a.caminho caminho from arquivo a where a.peca='$id_peca'");
								while($listar_arquivo = mysql_fetch_array($arquivo)) {
								$caminho='../Projeto_Antropologia/cadastrar/'.$listar_arquivo['caminho'];
								}
								echo'<h3><a href="'.$caminho.'" download="'.$listar_peca['titulo'].'">'.$listar_peca['titulo'].'</a></h3>';
							}else{
								echo'<h3><a href="'.$link.'" download="'.$listar_peca['titulo'].'">'.$listar_peca['titulo'].'</a></h3>';

							}
							echo'<p class="text-justify">'.$listar_peca['descricao'].'</p>';
							echo '<p class="text-justify">Autor: '.$listar_peca['autor'].'</p>';
							echo '<p class="text-justify"><i class="fa fa-clock-o" aria-hidden="true"> </i> '.$listar_peca['data'].'</p>';
							if(empty($link)){
								echo'<p class="text-justify"><a href="'.$caminho.'" download="'.$listar_peca['titulo'].'"><i class="fa  fa-download" aria-hidden="true"></i>    Baixar</a>';
							}else{
								echo'<p class="text-justify"><a href="'.$link.'"><i class="fa  fa-download" aria-hidden="true"></i>    Baixar</a>';

							}
							echo "</div>";
						}
				
				}
	?>
	
    </div>
	<div class="tab-pane" id="tab3">
<?php
				$peca=mysql_query("Select p.id id,p.descricao descricao,p.titulo titulo,p.autor autor,p.data_criacao data,p.link link from peca p where p.coletanea='$id' and p.objeto=4");
				if((mysql_num_rows($peca))!=0){
						while($listar_peca = mysql_fetch_array($peca)) {
							echo '<div class="col-md-4 portfolio-item">';
							$id_peca=$listar_peca['id'];
							$link=$listar_peca['link'];
							if(empty($link)){
								$audio=mysql_query("Select a.caminho caminho from arquivo a where a.peca='$id_peca'");
								while($listar_audio = mysql_fetch_array($audio)) {
								$caminho='../Projeto_Antropologia/cadastrar/'.$listar_audio['caminho'];
								}
								echo '<audio width="400" height="200" controls="controls">';
								echo'<source src="'.$caminho.'" type="audio/mp3">';
								echo'<object data="" width="400" height="200">';

								echo '<embed  width="400" height="200" src="'.$caminho.'" alt=""></embed>';
								echo'</object></audio>';
							}else{
									echo '<audio width="400" height="200" controls="controls">';
										echo'<source src="'.$link.'" type="audio/mp3">';
										echo'<object data="" width="400" height="200">';

										echo '<embed  width="400" height="200" src="'.$link.'" alt=""></embed>';
										echo'</object></audio>';
							
							}
							echo'<h3>'.$listar_peca['titulo'].'</h3>';
							echo'<p class="text-justify">'.$listar_peca['descricao'].'</p>';
							echo '<p class="text-justify">Autor: '.$listar_peca['autor'].'</p>';
							echo '<p class="text-justify"><i class="fa fa-clock-o" aria-hidden="true"> </i> '.$listar_peca['data'].'</p>';
							if(empty($link)){
								echo'<p class="text-justify"><a href="'.$caminho.'" download="'.$listar_peca['titulo'].'"><i class="fa  fa-download" aria-hidden="true"></i>    Baixar</a>';
							}else{
								echo'<p class="text-justify"><a href="'.$link.'"><i class="fa  fa-download" aria-hidden="true"></i>    Baixar</a>';

							}
							echo'</div>';
						}
				
				}
	?>      </div>
	<div class="tab-pane" id="tab4">
<?php
				$peca=mysql_query("Select p.id id,p.descricao descricao,p.titulo titulo,p.autor autor,p.data_criacao data,p.link link from peca p where p.coletanea='$id' and p.objeto=2");
				if((mysql_num_rows($peca))!=0){
						while($listar_peca = mysql_fetch_array($peca)) {
							echo '<div class="col-md-6 portfolio-item">';
							$id_peca=$listar_peca['id'];
							$link=$listar_peca['link'];
							if(empty($link)){
								$video=mysql_query("Select a.caminho caminho from arquivo a where a.peca='$id_peca'");
								while($listar_video = mysql_fetch_array($video)) {
								$caminho='../Projeto_Antropologia/cadastrar/'.$listar_video['caminho'];
								}
								echo '<video width="400" height="200" controls="controls">';
								echo'<source src="'.$caminho.'" type="video/mp4">';
								echo'<object data="" width="400" height="200">';

								echo '<embed  width="400" height="200" src="'.$caminho.'" alt=""></embed>';
								echo'</object></video>';
							}else{

								echo '<iframe  width="400" height="200" src="'.$link.'" alt="" frameborder="0" allowfullscreen></iframe>';
							}
							echo'<h3>'.$listar_peca['titulo'].'</h3>';
							echo'<p class="text-justify">'.$listar_peca['descricao'].'</p>';
							echo '<p class="text-justify">Autor: '.$listar_peca['autor'].'</p>';
							echo '<p class="text-justify"><i class="fa fa-clock-o" aria-hidden="true"> </i> '.$listar_peca['data'].'</p>';
							if(empty($link)){
												echo'<p class="text-justify"><a href="'.$caminho.'" download="'.$listar_peca['titulo'].'"><i class="fa  fa-download" aria-hidden="true"></i>    Baixar</a>';
							}else{
														echo'<p class="text-justify"><a href="'.$link.'"><i class="fa  fa-download" aria-hidden="true"></i>    Ir</a>';

							
							}
							echo'</div>';
						}
				
				}
	?>   
	</div>
  </div>
</div>
               
   
                   
                </div>
            </div>
        </div>

        

       

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>© 2015 GTMV. Todos os direitos reservados aos respectivos autores.</p>
                </div>
				
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
