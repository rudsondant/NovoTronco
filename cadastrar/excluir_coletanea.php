<?php
include ("../sessao.php");
include("../conexao.php");

		$id= $_GET['id'];
		$pecas=mysql_query ("Select id from peca where coletanea='$id' ");
		while($consulta_pecas=mysql_fetch_array($pecas)){
			$id_peca=$consulta_pecas['id'];
			$caminho_arquivo = mysql_query ("Select caminho from arquivo where peca='$id_peca' ");
			while($consulta=mysql_fetch_array($caminho_arquivo)){
					$arquivo = $consulta['caminho'];
					
			}
			unlink($arquivo);
			$excluir_arquivo= mysql_query("delete  from arquivo  where  peca = $id_peca ");
			$excluir_peca= mysql_query("delete  from peca where  id = $id_peca ");

		}
					$excluir_coletanea= mysql_query("delete  from coletanea where  id = $id ");
		
if(rmdir('coletaneas/'.$id)){
		header("Location:../listar_coletanea.php");

	}else{
	}


?>