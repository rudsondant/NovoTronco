<!DOCTYPE html>
<html>
    <head>
	<?php
		include ("sessao.php");
		include("conexao.php");

	?>
        <meta charset="UTF-8">
        <title>Gerenciamento do museu virtual</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		   <script type="text/javascript" src="jquery.js"></script> 
		           <script type="text/javascript" src="jquery.tablesorter.js"></script> 
        <script type="text/javascript" src="jquery.latest.js"></script> 

        <script type="text/javascript" src="jquery.tablesorter.js"></script> 

<style>
	/* Sortable tables */
	table.sortable thead {
    background-color:#eee;
    color:#666666;
    font-weight: bold;
    cursor: default;
	}
	</style>
	<script src="sorttable.js"></script>
<script type="text/javascript">
  function confirmar(){
    // só permitirá o envio se o usuário responder OK
    var resposta = confirm("Deseja mesmo" + 
                   " excluir este usuário?");
    if(resposta)
      return true;
    else
      return false; 
  }
</script>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <?php
			include("menu.php");
		?>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>

                       Lista de Usuários
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                       
                    </div><!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">   
<form role="form" method="post" action="listar_usuario.php" enctype="multipart/form-data">
						
    <div class="input-group">
      <input type="text" class="form-control" name="pesquisar" placeholder="Pesquisar...">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="button"><i class='fa fa-search'></i></button>
      </span>
    </div><!-- /input-group -->
</br>
</form>
<?php
if((!isset( $_POST['pesquisar']))||(empty($_POST['pesquisar']))){
	$usuario = mysql_query("Select u.id id ,u.nome nome ,u.email email from usuario u");
	if((mysql_num_rows($usuario))!=0){
	echo "<table id='tabela' class='table table-striped sortable'>";
	echo "<thead>";
	echo"<tr>";
	echo"<th data-field='id' class='text-center'>Id </th>";
	echo"<th data-field='name' class='text-center'>Nome </th>";
	echo "<th data-field='name' class='text-center'>Email</th>";
	echo "<th class='text-center'> Ações</th>";
	echo" </tr>";

	echo "</thead>";
	echo "<tbody>";
	while($listar_usuario = mysql_fetch_array($usuario)) {
		
		echo "<tr>";
				echo"<td class='text-center'>";	
			

				echo $listar_usuario['id'];
				echo"</td>";
						echo"<td class='text-center'>";
				echo $listar_usuario['nome'];
						echo"</td>";
						echo"<td class='text-center'>";
				echo $listar_usuario['email'];
						echo"</td>";
						
						 echo "<td class='text-center'>";
					   echo"<a href='editar_usuario.php?id={$listar_usuario['id']}' class='fa fa-pencil-square fa-lg'></a>";
						echo "   ";
						$mensagem="Tem certeza que deseja excluir este usuário?";
					   echo"<a href='excluir/excluir_usuario.php?id={$listar_usuario['id']}' onclick='return confirmar();' class='fa fa-trash fa-lg fa-danger fa-center' style='color:red'></a>";
		echo"</td>";
	  }

	echo "</tbody>";
	echo "<tfoot>";
	echo"<tr>";
	echo "<td class='text-center'><a href='cadastrar_usuario.php'><i class='fa fa-plus-square'></a></td><td></td>";
	echo "<td></td> <td></td>";
	echo"</tr>";
	echo "</tfoot>";
	echo "</table>";
	}else{
	echo "<table class='table table-hover'>";
	echo "<tr><td class='text-center> Não há Usuários cadastrados</td></tr>";
	echo "<tr><td class='text-center><a href='cadastrar_usuario.php'><i class='fa fa-plus-square'></i></a></td></tr>";
	echo "</table>";
	}
}else{
/*
Pesquisando
*/
$pesquisa=$_POST['pesquisar'];
$usuario = mysql_query("Select u.id id ,u.nome nome ,u.email email from usuario u where u.nome like '%".$pesquisa."%' ");
	if((mysql_num_rows($usuario))!=0){
	echo "<table id='tabela' class='table table-striped sortable'>";
	echo "<thead>";
	echo"<tr>";
	echo"<th data-field='id' class='text-center'>Id </th>";
	echo"<th data-field='name' class='text-center'>Nome </th>";
	echo "<th data-field='name' class='text-center'>Email</th>";
	echo "<th class='text-center'> Ações</th>";
	echo" </tr>";

	echo "</thead>";
	echo "<tbody>";
	while($listar_usuario = mysql_fetch_array($usuario)) {
		
		echo "<tr>";
				echo"<td class='text-center'>";	
			

				echo $listar_usuario['id'];
				echo"</td>";
						echo"<td class='text-center'>";
				echo $listar_usuario['nome'];
						echo"</td>";
						echo"<td class='text-center'>";
				echo $listar_usuario['email'];
						echo"</td>";
					
						 echo "<td class='text-center'>";
					   echo"<a href='editar_usuario.php?id={$listar_usuario['id']}' class='fa fa-pencil-square fa-lg'></a>";
						echo "   ";
					  echo"<a href='excluir/excluir_usuario.php?id={$listar_usuario['id']}' onclick='return confirmar();'  class='fa fa-trash fa-lg fa-danger' style='color:red'></a>";
		echo"</td>";
	  }

	echo "</tbody>";
	echo "<tfoot>";
	echo"<tr>";
	echo "<td class='text-center'><a href='cadastrar_usuario.php'><i class='fa fa-plus-square'></a></td><td></td>";
	echo "<td></td> <td></td>";
	echo"</tr>";
	echo "</tfoot>";
	echo "</table>";
	}else{
	echo "<table class='table table-hover'>";
	echo "<tr><td class='text-center> Usuários nao encontrados</td></tr>";
	echo "<tr><td class='text-center><a href='cadastrar_usuario.php'><i class='fa fa-plus-square'></a></td></tr>";
	echo "</table>";
	}

}
?>							 
						 						 


                           

                                                                  

                           
                                            

                          
                               
                               
                                    </div><!-- /.row -->                                                                        
                                </div>
                            </div><!-- /.box -->                            

                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>

    </body>
</html>