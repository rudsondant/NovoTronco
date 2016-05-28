<?php
		include ("../sessao.php");
		include("../conexao.php");
		setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");

		$usuario=$_SESSION['id'];
		$registro= " ";
		$titulo= $_POST['titulo'];
		$data=  $_POST['data'];
		$autor= $_POST['autor'];
		$descricao= $_POST['descricao'];
		$objeto= $_POST['objeto'];
		$link=$_POST['link'];
		$coletanea= $_POST['coletanea'];

		$cadastrando=mysql_query("insert into peca(registro,data_criacao,titulo,descricao,objeto,coletanea,usuario,autor,link) values ('$registro','$data','$titulo','$descricao','$objeto','$coletanea','$usuario','$autor','$link')");
		$id_peca_capturar = mysql_query ("Select id from peca where descricao='$descricao' and titulo='$titulo' and data_criacao='$data' and registro='$registro' and objeto='$objeto' and coletanea='$coletanea' and usuario='$usuario'");
		while($id=mysql_fetch_array($id_peca_capturar)){
				$id_peca = $id['id'];	
		}
		
		
		if($cadastrando){
			if(!empty($_FILES['arquivo']['name'])) {
				$arquivo= $_FILES['arquivo']['name']; // nome do arquivo//
				$pastaarquivo= $_FILES['arquivo']['tmp_name'];// pasta temporaria do arquivo//
			$arquivo_caminho="coletaneas/".$coletanea."/".$arquivo;

				move_uploaded_file($pastaarquivo,"coletaneas/".$coletanea."/".$arquivo);
				$arquivo_caminho="coletaneas/".$coletanea."/".$arquivo;
				$cadastrando_caminho_arquivo=mysql_query("insert into arquivo(caminho,peca) values ('$arquivo_caminho','$id_peca')");
				if($cadastrando_caminho_arquivo){
							header("Location:../listar_pecas.php");
				}
			}else{
										header("Location:../listar_pecas.php");

			}

		}else{

		}

?>