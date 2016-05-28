<?php
    session_start();
		include("../conexao.php");

	$id= $_POST['id'];
	$titulo=$_POST['titulo'];
	$descricao=$_POST['descricao'];

	$atualizar_coletanea= mysql_query("update coletanea set titulo='$titulo', descricao='$descricao' where id='$id'");
if($atualizar_coletanea){
		header("Location:../listar_coletanea.php");

	}else{
		header("Location:../editar_coletanea.php");

	}
			  
			  





	
	
	mysql_close($con);
?>