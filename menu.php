 <a href="home.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                                  	<i class="fa fa-hourglass fa-2x"></i>
</a>
<!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                      
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Perfil <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                               <li class="dropdown">
								
									
									<li><a href="configuracao.php"><i class="fa fa-gear fa-fw"></i>Configurações</a>
									</li>
									<li class="divider"></li>
									<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
									</li>
								<!-- /.dropdown-user -->
							</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="home.php">
                                <i class="fa fa-dashboard"></i> <span>Página Principal</span>
                            </a>
                        </li>
                        
                        <li class="treeview">
                            <a href="listardisciplina.php">
                                <i class="fa fa-newspaper-o"></i>
                                <span>Notícias</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                       lll
                            </ul>
                        </li>
						<li class="treeview">
                            <a href="listardisciplina.php">
                                <i class="fa fa-university"></i>
                                <span>Informações do Museu</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                       lll
                            </ul>
                        </li>
						<li class="treeview">
                            <a href="listardisciplina.php">
                                <i class="fa fa-cube"></i>
                                <span>Peças</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                       lll
                            </ul>
                        </li>
						<li class="treeview">
                            <a href="listardisciplina.php">
                                <i class="fa fa-folder-open-o"></i>
                                <span>Coletâneas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                       lll
                            </ul>
                        </li>
                      <?php
							if($_SESSION['modulo']==1){
								$usuario = mysql_query("Select * from usuario  ");

								echo '<li class="treeview">';
								echo '<a href="">';
								echo '<i class="fa fa-user"></i>';
								echo' <span>Usuário</span>';
								echo'<i class="fa fa-angle-left pull-right"></i>';
							    echo'</a>';
							    echo' <ul class="treeview-menu">';
								echo'<li><a href="listar_usuario.php"><i class="fa fa-table"></i>Lista de Usuários</a></li>';
								echo'<li><a href="cadastrar_usuario.php"><i class="fa fa-plus-circle"></i>Cadastrar Usuário</a></li>';
								echo'</ul>';
								echo '</li>';
							
							
							}
							
					  ?>
                       
                       
                        
                        
                        
                    </ul>
                </section>