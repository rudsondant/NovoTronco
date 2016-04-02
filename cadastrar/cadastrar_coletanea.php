
<?php
		include ("../sessao.php");
		include("../conexao.php");
		$titulo= $_POST['titulo'];
		$descricao= $_POST['descricao'];
		$cadastrando=mysql_query("insert into coletanea(titulo,descricao) values ('$titulo','$descricao')");
		if($cadastrando){

			header("Location:../listar_coletanea.php");

		}else{
			header("Location:../cadastrar_coletanea.php");

		}

?>