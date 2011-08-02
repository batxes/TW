
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Shoppin'</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/myCss.css" />
        <link href='http://fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>
        <link href="CSS/jquery-ui-1.8.11.custom.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="JS/jquery-1.5.1.js"></script>
        <script type="text/javascript" src="JS/jquery-ui-1.8.11.custom.min.js"></script>
        <script src="JS/jquery.validate.js" type="text/javascript"></script>
        <script type="text/javascript" src="JS/icons.js"></script>
        <script type="text/javascript" src="JS/perfil.js"></script>
            <script language="Javascript">
function imprSelec(nombre)
{
  var ficha = document.getElementById(nombre);
  var ventimp = window.open(' ', 'popimpr');
  ventimp.document.write( ficha.innerHTML );
  ventimp.document.close();
  ventimp.print( );
  ventimp.close();
}
</script>
    </head>

    <body>
        <!-- start header -->
        <div id="header">
            <div id="titulo">
                <h1>Shoppin'</h1>
                <h2>Designed by Comrad</h2>
            </div>
            <div id="menu">
                <div id="signUp">
                    <form method="get">
                    <ul>
                        <?php
                            session_start();
                            if ($_SESSION['user']):
                        ?>
                        <li>Registrado como <a href="perfil.php"><?php echo $_SESSION['user']; ?></a></li>
                        <li>( <a href="logout.php">Salir</a> )</li>
                        <?php else: ?>
                        <li><a href="sesion.php">Iniciar Sesion</a></li>
                        <li><a href="registro.php">Registrarse</a></li>
                        <?php endif; ?>
                        <li><input type="text" id="s" name="s" value="" /></li>
                        <li><button class="iconSearch ui-state-default ui-corner-all" type="submit">Search button</button></li>
                    </ul>
                        </form>
                </div>
                <div id="menuItems">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <!--<li><a href="index.html"><img class="bottom" alt="home" src="http://www.asuspuestos.com/wp-content/themes/asusv6/images/home.png"/></a></li>-->
                        <?php
                            session_start();
                            if ($_SESSION['user']):
                        ?>
                        <li><a href="perfil.php">Perfil</a></li>
                        <?php endif; ?>
                        <li><a href="productos.php">Productos</a></li>
                        <li><a href="listas.php">Mis Listas</a></li>
                        <li><a href="ubicacion.php">Ubicacion</a></li>
                        <li><a href="usuarios.php">Usuarios</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end header -->
        <!-- start page -->
        <div id="page">
            <!-- start content -->
            <div id="content">
                <h2>Información personal</h2>
                <form id="commentForm" action="" method="post">
                    <fieldset>
                        <legend>fieldPerfil</legend>
                        <label for="cnombre">Nombre</label>
                        <input id="nombre" type="text" name="nombre" size="20m"><br>

                        <label for="cpassword">Contraseña</label>
                        <input id="password" type="password" name="password" value="" size="20"><br>

                        <label for="cpassword2">Repetir Contraseña</label>
                        <input id="password2" type="password" name="password2" value="" size="20"><br><br>
                        <p><input type="submit" name="submit" value="Editar" size="20"></p>
                    </fieldset>
                </form>
                <?php
                    session_start();
                    if(isset ($_POST['submit']))  {
                            if (isset ($_SESSION['user'])){
                               require_once "PHP/bd.php";
                                $lol = conectar();

                                 if (!actualizarUsuario($lol,$_POST['nombre'],$_SESSION['user'] ,$_POST['password'])){
                                    echo "
                                        <script language='JavaScript'>
                                             alert('Error al actualizar usuario');
                                        </script>";
                                }
                            }
                            else {echo "
                                        <script language='JavaScript'>
                                             alert('Sesión no iniciada');
                                        </script>";
                            }
                        }

                    
                ?>
                <h2>Tus listas</h2>
                <form id="tusListas" action="perfil.php" method="post">
                <div id="tabs">
                    <ul>
                        <?php
                            require_once 'PHP/funcionesLista.php';
                            $numeroDeListas = getNumLista($_SESSION['user']);
                            for($i=1;$i<=$numeroDeListas;$i++)
                            {
                                echo "<li><a href='#fragment-".$i."'><span>Lista".$i."</span></a></li>";
                            }
                        ?>
    </ul>
                    <?php
                           require_once 'PHP/funcionesLista.php';
                            $nombre = $_SESSION['user'];
                            $numeroDeListas = getNumLista($_SESSION['user']);
                            for($i=1;$i<=$numeroDeListas;$i++)
                            {
                                echo "<div id='fragment-".$i."'>";
                                $lista = getProductosFromLista($i, $_SESSION['user']);
                                //$lista = $lista.split("#");
                                for ($j=0;$j < sizeof($lista);$j++)
                                {
                                    echo "> $lista[$j]<br/>";
                                }
                                echo "<br/>";
                                echo "<p><strong>Imprime tu lista:</strong> <button class='ui-state-default ui-corner-all' type='button' onclick='imprSelec('fragment-".$i."')'><span class='ui-icon ui-icon-print'></span></button></p>";
                                echo "</div>";
                            }
                        ?>
                    </div><br>
                    Escribe el número de la lista a borrar:<br/>
                    <input  type="text" name="numLista" value="" size="10"><br/>
                <p><input type="submit" name="borrar" value="Borrar" size="20"></p>
                <?php
                    session_start();
                    if(isset ($_POST['borrar']) && $_POST['numLista'])  {
                            if (isset ($_SESSION['user'])){
                               require_once "PHP/bd.php";
                                 if (!borrarLista($_POST['numLista'],$_SESSION['user'])){
                                    echo "
                                        <script language='JavaScript'>
                                             alert('Error al borrar lista');
                                        </script>";
                                }
                                else{
                                    header("Location: index.php");
                                }
                            }
                            else {echo "
                                        <script language='JavaScript'>
                                             alert('Sesión no iniciada');
                                        </script>";
                            }
                    }

                ?>
                </form>
            </div>
            
            <!-- end content -->
            <!-- start sidebar -->
            <div id="sidebar">
                <ul>
                    <li>
                        <h2><b>Panel</b> Administrador</h2>
                        <ul>
                            <li><a href="#">Administrar perfiles</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 4,
  interval: 6000,
  width: 230,
  height: 300,
  theme: {
    shell: {
      background: '#b1b3b5',
      color: '#ffffff'
    },
    tweets: {
      background: '#ffffff',
      color: '#6d6d6d',
      links: '#009be8'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: 'all'
  }
}).render().setUser('Shop_ing').start();
</script>
            </div>
            <!-- end sidebar -->
            <div style="clear: both;"></div>
        </div>
        <!-- end page -->
        <div id="footer">
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                <a class="addthis_button_preferred_1"></a>
                <a class="addthis_button_preferred_2"></a>
                <a class="addthis_button_preferred_3"></a>
                <a class="addthis_button_preferred_4"></a>
                <a class="addthis_button_compact"></a>
            </div>
            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4d808a8671bc9045"></script>
            <!-- AddThis Button END -->
            <div class="footerLinks">
                <a href="acercaDe.html">Acerca de SuperMarket</a>
                /
                <a href="faq.html">FAQ</a>
                /
                <a href="contacto.html">Contacto</a>
                /
                <a href="acercaDe.html">Acerca de SuperMarket</a>
            </div>
            <p id="legal">(c) 2008 YourSite. <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
        </div>
    </body>
</html>
