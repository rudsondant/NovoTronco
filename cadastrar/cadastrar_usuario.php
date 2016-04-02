<?php
		include ("../sessao.php");
		include("../conexao.php");
		$nome= $_POST['nome'];
		$email= $_POST['email'];
		$senha= $_POST['senha'];
		$funcao= $_POST['funcao'];
		$cadastrando=mysql_query("insert into usuario(nome,email,senha,funcao) values ('$nome','$email','$senha','$funcao')");
		if($cadastrando){

			header("Location:../listar_usuario.php");

		}else{
			header("Location:../cadastrar_usuario.php");

		}

?>