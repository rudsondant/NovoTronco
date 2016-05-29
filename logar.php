<?php
    session_start();
	include("conexao.php");
	
	$email= $_POST['email'];
	$senha 		= $_POST['senha'];
	
	$consulta=mysql_query("Select * from usuario u where email='$email' and senha='$senha'");
if((mysql_num_rows($consulta)==1)){
		while($listar = mysql_fetch_array($consulta)) {
		$_SESSION['id']=$listar['id'];
		$_SESSION['mensagem']="";
		/* Modulo igual a 1 é Administrador*/
		/*Modulo igual a 2 é Autor*/
}
			header("Location:home.php");

		
			
			
			
}else{
		header("Location:index.php");

}
	
	
	
	
	mysql_close($con);
?>