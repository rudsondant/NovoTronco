<?php
include ("../sessao.php");
include("../conexao.php");

		$id= $_GET['id'];
			$caminho_arquivo = mysql_query ("Select caminho from arquivo where peca='$id' ");
			while($consulta=mysql_fetch_array($caminho_arquivo)){
					$arquivo = "../cadastrar/".$consulta['caminho'];
					
			}
			unlink($arquivo);
			$excluir_arquivo= mysql_query("delete  from arquivo  where  peca = $id ");
			
		$excluir_peca= mysql_query("delete  from peca where  id = $id ");
	if($excluir_peca){
		header("Location:../listar_pecas.php");

	}




?>