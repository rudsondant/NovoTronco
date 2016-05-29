<?php
    session_start();
		include("../conexao.php");

	$id= $_POST['id'];
	$funcao=$_POST['funcao'];
	
	
	$atualizar_usuario= mysql_query("update usuario set funcao='$funcao' where id='$id'");
	  
if($atualizar_usuario){
		header("Location:../listar_usuario.php");

	}else{
		header("Location:../editar_usuario.php");

	}	  





	
	
	mysql_close($con);
?>