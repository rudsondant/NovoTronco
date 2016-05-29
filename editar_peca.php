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
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
          <?php
			include("menu.php");
		?>
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>

                      Editar Notícia
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

<form role="form" method="post" action="cadastrar/atualizar_peca.php" enctype="multipart/form-data">
 <div class="form-group">
 <?php
 		include("conexao.php");

if (isset( $_GET['id'])) {
	 $id=(int)$_GET['id'];
	 $dados_peca=mysql_query("Select p.id id,p.registro registro,p.data_criacao data_criacao,p.descricao descricao_peca,p.titulo titulo_peca,o.descricao objeto,c.titulo titulo_descricao, p.autor autor,c.id id_coletanea,p.link link from usuario u,peca p, coletanea c,objeto o where p.coletanea=c.id and p.objeto=o.id and p.usuario=u.id and p.id='$id'");

while($listar_peca=mysql_fetch_array($dados_peca)){
	$id_peca=$listar_peca['id'];
	$registro_peca=$listar_peca['registro'];

	$titulo_peca=$listar_peca['titulo_peca'];
	$descricao_peca=$listar_peca['descricao_peca'];
	$autor=$listar_peca['autor'];
	$data_criacao=$listar_peca['data_criacao'];
	$link=$listar_peca['link'];
}
if(!isset($id_peca)){
					header("Location:listar_pecas.php");

}
	
}else{
				header("Location:listar_pecas.php");

}


?>
<div class="form-group">
    <label for="exampleInputEmail1">Autor</label>
    <input type="text" class="form-control input-lg" name="autor" id="autor" placeholder="Autor" value="<?php echo $autor;?>" required>
  </div>
    <label for="exampleInputEmail1">Titulo</label>
    <input type="text" class="form-control input-lg" name="titulo" id="titulo" placeholder="" value="<?php echo $titulo_peca;?> " required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descrição</label>
  <textarea class="form-control" rows="5" name="descricao" id="comment" placeholder="" required><?php echo $descricao_peca;?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Data</label>
    <input type="text" class="form-control input-lg" name="data" id="data" placeholder="Data" value="<?php echo $data_criacao;?>" required>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Link</label>
    <input type="text" class="form-control input-lg" name="link" id="link" placeholder="Opcional" value="<?php echo $link;?>" >
	
  </div>
<div class="form-group">
	<label for="exampleInputEmail1">Coletânea</label>
    <select id="coletanea" name="coletanea" class="form-control input-lg" required="" >
	
	  <?php
	
			$coletanea= mysql_query(" Select  * from coletanea");
				if((mysql_num_rows($coletanea)!=0)){

				while($coletanea1=mysql_fetch_array($coletanea)){
				
				$a = "<option value='{$coletanea1['id']}' >{$coletanea1['titulo']}</option>";
				echo $a ;
		      }
			  				echo '</select></div>';

			 }
				
				?>
	
  
<input type="hidden" name="id" value="<?php if (isset( $_GET['id'])) { echo $id_peca;} ?>" />

  
	 </div>
	 <div class="control-group">
  <label class="control-label" for="img_descricao">Arquivo</label>
  <div class="controls">
    <input id="arquivo" name="arquivo" class="input-file" type="file" >
  </div>
</div>
<br/>
  
  <button type="submit" class="btn btn-default">Alterar</button>
</form>
                           

                          
                                                                                       

                           
                                            

                          
                               
                               
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