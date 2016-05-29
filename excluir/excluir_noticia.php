<?php
include ("../sessao.php");
include("../conexao.php");

		$id= $_GET['id'];
		$caminho_imagem = mysql_query ("Select caminho from imagem_noticia where noticia='$id' ");
		while($consulta=mysql_fetch_array($caminho_imagem)){
				$imagem_noticia = "../cadastrar/".$consulta['caminho'];
				
		}
		unlink($imagem_noticia);
		$excluir_imagem= mysql_query("delete  from imagem_noticia  where  noticia = $id ");
		
	$excluir_noticia= mysql_query("delete  from noticia  where  id = $id ");
if($excluir_noticia){
		header("Location:../listar_noticia.php");

	}else{
	}


?>