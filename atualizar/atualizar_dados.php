	<?php
	include ("../sessao.php");
	include("../conexao.php");
	$id=$_SESSION['id'];
	$senha_nova=$_POST['senha_nova'];
	$nome=$_POST['nome'];
	$email=$_POST['email'];
		
		$atualizar= mysql_query("update usuario set senha='$senha_nova',nome='$nome',email='$email' where id='$id'");
	$_SESSION['mensagem']="Senha atualizada com sucesso";

			header("Location:../configuracao.php");

		

				  
				  





		
		
		mysql_close($con);
	?>