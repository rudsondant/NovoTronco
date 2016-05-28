
<?php
		include ("../sessao.php");
		include("../conexao.php");
		setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
		$titulo= $_POST['titulo'];
		$descricao= $_POST['descricao'];
		
		$data=  date('d/m/y');
		$cadastrando=mysql_query("insert into noticia(titulo,descricao,data_publicacao) values ('$titulo','$descricao', '$data')");
		$id_noticia_capturar = mysql_query ("Select id from noticia where descricao='$descricao' and titulo='$titulo' and data_publicacao='$data'");
		while($id=mysql_fetch_array($id_noticia_capturar)){
				$id_noticia = $id['id'];
				
		}
		if($cadastrando){
			
			$arquivo= $_FILES['img_descricao']['name']; // nome do arquivo//
			$pastaarquivo= $_FILES['img_descricao']['tmp_name'];// pasta temporaria do arquivo//
			$extensao = substr($arquivo,-3);
			$extensao = strtolower ( $extensao );
			  if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
						if(!empty($_FILES['img_descricao']['name'])) {
						if(isset($_FILES['img_descricao'])){
								move_uploaded_file($pastaarquivo,"fotos/".$arquivo);
								$imagem="fotos/".$arquivo;
								$cadastrando_caminho_imagem=mysql_query("insert into imagem_noticia(caminho,noticia) values ('$imagem','$id_noticia')");
								if($cadastrando_caminho_imagem){
							header("Location:../listar_noticia.php");

						}
			}
			
			
			}
			}else{
										header("Location:../cadastrar_noticia.php");

			
			}
			if(empty($_FILES['img_descricao']['name'])) {
							header("Location:../listar_noticia.php");

			}
		
			
			

		}else{
			header("Location:../cadastrar_noticia.php");

		}

?>