<?php
$coletanea = mysql_query("Select c.id id ,c.titulo titulo ,c.descricao descricao from coletanea c");
if((mysql_num_rows($usuario))!=0){
echo "<table id='tabela' class='table table-hover'>";
echo "<thead>";
echo"<tr>";
echo"<th class'text-center'>Id </th>";
echo"<th class'text-center'>Titulo </th>";
echo "<th class'text-center'>Descrição</th>";
echo "<th class'text-center'>Quantidade de Peças</th>";
echo "<th class'text-center'></th>";


echo" </tr>";

echo "</thead>";
echo "<tbody>";
while($listar_coletanea = mysql_fetch_array($coletanea)) {
	
	echo "<tr>";
			echo"<td class'text-center'>";	
		

			echo $listar_coletanea['id'];
			echo"</td>";
					echo"<td class'text-center'>";
			echo $listar_coletanea['titulo'];
					echo"</td>";
					echo"<td class'text-center'>";
			echo $listar_coletanea['descricao'];
					echo"</td>";
					$id=$listar_coletanea['id'];
					$qtr = mysql_query("Select count(p.id) qtr from peca p where p.coletanea='$id'");
			while($listar = mysql_fetch_array($qtr)) {
					$qrt_pecas=$listar['qtr'];
			}
					echo"<td class'text-center'>";
					echo $qrt_pecas;
					echo"</td>";
				 echo "<td class'text-center'>";
				   echo"<a href='editar_coletanea.php?id={$listar_coletanea['id']}' class='fa fa-pencil-square fa-lg'></a>";
	echo"</td>";
	echo "</tr>";
}
echo"<tr>";
echo "<td class'text-center'><a href='cadastrar_coletanea.php'><i class='fa fa-plus-square'></a></td>";
echo "<td></td><td></td><td></td><td></td>";
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