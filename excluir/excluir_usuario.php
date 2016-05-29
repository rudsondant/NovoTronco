<?php
include ("../sessao.php");
include("../conexao.php");

$id= $_GET['id'];
	$excluir_usuario= mysql_query("delete  from usuario  where  id = $id ");
if($excluir_usuario){
		header("Location:../listar_usuario.php");

	}else{
	}


?>