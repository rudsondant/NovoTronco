<?php
    session_start();
		include("../conexao.php");

	$id= $_POST['id'];
	$titulo=$_POST['titulo'];
	$descricao=$_POST['descricao'];
	$data=  date('d/m/y');

	$atualizar_noticia= mysql_query("update noticia set titulo='$titulo', descricao='$descricao', data_publicacao= '$data' where id='$id'");
	if($atualizar_noticia){

			if(!empty($_FILES['img_descricao']['name'])) {
			if(isset($_FILES['img_descricao'])){
				$arquivo= $_FILES['img_descricao']['name']; // nome do arquivo//
				$pastaarquivo= $_FILES['img_descricao']['tmp_name'];// pasta temporaria do arquivo//
				$extensao = substr($arquivo,-3);
				$extensao = strtolower ( $extensao );
			 if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
						$caminho_imagem = mysql_query ("Select caminho from imagem_noticia where noticia='$id' ");
				while($consulta=mysql_fetch_array($caminho_imagem)){
				$imagem_noticia = $consulta['caminho'];
				
			}
					if(isset($imagem_noticia)){
					unlink($imagem_noticia);
				$excluir_imagem= mysql_query("delete  from imagem_noticia  where  noticia = $id ");
					}
					move_uploaded_file($pastaarquivo,"fotos/".$arquivo);
					$imagem="fotos/".$arquivo;
					$cadastrando_caminho_imagem=mysql_query("insert into imagem_noticia(caminho,noticia) values ('$imagem','$id')");
					if($cadastrando_caminho_imagem){
		header("Location:../editar_noticia.php");

			}
			}else{
					header("Location:../editar_noticia.php");

			}
			
			}
			}
		header("Location:../listar_noticia.php");

	}else{
		header("Location:../editar_noticia.php");

	}
			  
			  





	
	
	mysql_close($con);
?>