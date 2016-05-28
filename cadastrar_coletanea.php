
<?php
		ini_set( 'default_charset', 'utf-8');

		include ("../sessao.php");
		include("../conexao.php");
		$titulo= $_POST['titulo'];
		$descricao= $_POST['descricao'];
		$cadastrando=mysql_query("insert into coletanea(titulo,descricao) values ('$titulo','$descricao')");
		if($cadastrando){
		$coletanea_recuperar=mysql_query("Select id from coletanea where titulo='$titulo' and descricao='$descricao'");
		while($coletanea=mysql_fetch_array($coletanea_recuperar)){
			$id_coletanea=$coletanea['id'];
		}
			mkdir('coletaneas/'.$id_coletanea);
			header("Location:../listar_coletanea.php");

		}else{
			header("Location:../cadastrar_coletanea.php");

		}

?>