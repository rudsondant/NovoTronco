<?php
    session_start();
		include("../conexao.php");

	$usuario=$_SESSION['id'];
	$id=$_POST['id'];
		$registro= " ";
		$titulo= $_POST['titulo'];
		$data=  $_POST['data'];
		$autor=$_POST['autor'];
		$link=$_POST['link'];
		$descricao= $_POST['descricao'];
		$coletanea= $_POST['coletanea'];

	$atualizar_peca= mysql_query("update peca set titulo='$titulo', descricao='$descricao', data_criacao= '$data',registro='$registro',coletanea='$coletanea', autor='$autor',link='$link' where id='$id'");
	if($atualizar_peca){

			if(!empty($_FILES['arquivo']['name'])) {
			if(isset($_FILES['arquivo'])){
				$arquivo= $_FILES['arquivo']['name']; // nome do arquivo//
				$pastaarquivo= $_FILES['arquivo']['tmp_name'];// pasta temporaria do arquivo//
						$caminho_arquivo = mysql_query ("Select caminho from arquivo where peca='$id' ");
				while($consulta=mysql_fetch_array($caminho_arquivo)){
				$arquivo_peca = $consulta['caminho'];
				}
			
					if(isset($arquivo_peca)){
					unlink($arquivo_peca);
				$excluir_arquivo= mysql_query("delete  from arquivo  where  peca = '$id' ");
					}
					move_uploaded_file($pastaarquivo,"coletaneas/".$coletanea."/".$arquivo);
					$imagem="coletaneas/".$coletanea."/".$arquivo;
					$cadastrando_caminho_arquivo=mysql_query("insert into arquivo(caminho,peca) values ('$imagem','$id')");
					if($cadastrando_caminho_arquivo){
		header("Location:../editar_peca.php");

			}
			}else{
					header("Location:../editar_peca.php");

			}
			
			}
					header("Location:../listar_pecas.php");

			}

	else{
		header("Location:../editar_peca.php");

	}
			  
			  





	
	
	mysql_close($con);
?>