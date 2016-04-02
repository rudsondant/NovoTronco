<?php
$usuario = mysql_query("Select u.id id ,u.nome nome ,u.email email,f.descricao funcao from usuario u,funcao f where u.funcao=f.id");
if((mysql_num_rows($usuario))!=0){
echo "<table id='tabela' class='table table-hover'>";
echo "<thead>";
echo"<tr>";
echo"<th class'text-center'>Id </th>";
echo"<th class'text-center'>Nome </th>";
echo "<th class'text-center'>Email</th>";
echo "<th class'text-center'>Funcão</th>";


echo" </tr>";

echo "</thead>";
echo "<tbody>";
while($listar_usuario = mysql_fetch_array($usuario)) {
	
	echo "<tr>";
			echo"<td class'text-center'>";	
		

			echo $listar_usuario['id'];
			echo"</td>";
					echo"<td class'text-center'>";
			echo $listar_usuario['nome'];
					echo"</td>";
					echo"<td class'text-center'>";
			echo $listar_usuario['email'];
					echo"</td>";
					echo"<td class'text-center'>";
			echo $listar_usuario['funcao'];
					echo"</td>";
				
	echo "</tr>";
}
echo"<tr>";
echo "<td class'text-center'><a href='cadastrar_usuario.php'><i class='fa fa-plus-square'></a></td>";
echo "<td></td><td></td><td></td>";
echo"</tr>";
echo "</tbody>";

echo "</table>";
}else{
echo "<table class='table table-hover'>";
echo "<tr><td class'text-center> Não há Tópicos cadastrados</td></tr>";
echo "<tr><td class'text-center><a href='cadastrartopico.php'><i class='fa fa-plus-square'></a></td></tr>";
echo "</table>";
}

?>