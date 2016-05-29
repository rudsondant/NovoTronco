<!DOCTYPE html>
<html>
    <head>
	<?php
		include ("sessao.php");
		include("conexao.php");

	?>
        <meta charset="UTF-8">
        <title>Gerenciamento do museu virtual</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body class="">
	<?php
 		include("conexao.php");

if (isset( $_GET['id'])) {
	 $id=(int)$_GET['id'];
	 $dados_noticia=mysql_query("Select * from noticia where id=$id");

while($listar_noticia=mysql_fetch_array($dados_noticia)){
$id_noticia=$listar_noticia['id'];
$titulo_noticia=$listar_noticia['titulo'];
$descricao_noticia=$listar_noticia['descricao'];
$data_noticia=$listar_noticia['data_publicacao'];


}
if(!isset($id_noticia)){
				header("Location:listar_noticia.php");

}
	$dados_imagem=mysql_query("Select * from imagem_noticia where noticia=$id");
	while($listar_imagem=mysql_fetch_array($dados_imagem)){
			$caminho_imagem="cadastrar/".$listar_imagem['caminho'];


}
}else{
				header("Location:listar_noticia.php");

}


?>


  <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $titulo_noticia;?></h1>

               

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span><?php echo $data_noticia;?></p>

                <hr>
<?php 
				if(isset($caminho_imagem)){
					echo '<img src="'.$caminho_imagem.'" class="img-rounded img-responsive" >';
				}
			
			?>
                <!-- Preview Image -->

                <hr>
				

                <!-- Post Content -->
                <p class="lead text-justify">
				<?php 
				echo $descricao_noticia;
				?>
				</p>
                <hr>
	</hr>
	<a href="listar_noticia.php">Voltar</a>

    </body>
</html>