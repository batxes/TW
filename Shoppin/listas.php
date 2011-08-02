<?php
    require_once 'PHP/funcionesLista.php';
    $productos = cargarProductos();
    $encode = json_encode($productos);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Shoppin'</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/myCss.css" />
        <link href="CSS/jquery-ui-1.8.11.custom.css" rel="stylesheet" type="text/css"/>
        <link href='http://fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="CSS/mootree.css" type="text/css" media="screen" />

        <script type="text/javascript" src="JS/jquery-1.5.1.js"></script>
        <script type="text/javascript" src="JS/jquery-ui-1.8.11.custom.min.js"></script>

        <script type="text/javascript" src="JS/icons.js"></script>

        <script type="text/javascript" src="JS/mootools-1.2-core.js"></script>
        <script type="text/javascript" src="JS/mootree.js"></script>
        <script type="text/javascript" src="JS/listas.js"></script>


<script type="text/javascript">
function enviar(productos){
var response=jQuery.ajax({
   type: "POST",
   async: false,
   url: "PHP/listajax.php",
   data: "actualiza=true&productos="+productos
 }).responseText;
 alert("Lista guardada con éxito!");
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
            <!--TODO cambiaProductos()-->
            <div id="content">

                <form name="lista" method="post" action="listas.php">
                    <script>var variableJS = <?php echo $encode ?></script>
                    <fieldset>
                        <legend>crearLista</legend>
                        <h2>Crea tu propia lista</h2>
                        <label for="categoria">Categoría</label>
                        <select name="categoria" onchange="cambiaProductos(variableJS)">
                            <option value="0" selected>Seleccione</option>
                            <option value="1">Carnes</option>
                            <option value="2">Pescados</option>
                            <option value="3">Verduras</option>
                            <option value="4">Frutas</option>
                            <option value="5">Cereales</option>
                            <option value="6">Congelados</option>
                            <option value="7">Lacteos</option>
                            <option value="8">Legumbres</option>
                        </select><br>
                        <label for="producto">Producto</label>
                        <select name="producto">
                            <option value="-">-
                        </select><br><br>
                        <!--insertar, borrar, guardar-->
                        <button class="ui-state-default ui-corner-all" type="button" onclick="InsertarProducto()"><span class="ui-icon ui-icon-circle-plus"></span></button>
                        <button class="ui-state-default ui-corner-all" type="button" onclick="BorrarProducto()"><span class="ui-icon ui-icon-circle-minus"></span></button>
                        <button class="ui-state-default ui-corner-all" type="button"><span class="ui-icon ui-icon-disk"></span></button>
                        <br><br>

                        <div id="mytree">
                        </div><br>

                        <p>
                            <button type="button" value=" expand all " onclick="tree.expand()"><span class="ui-icon ui-icon-circle-triangle-e"></span></button>
                            <button type="button" value=" collapse all " onclick="tree.collapse()"><span class="ui-icon ui-icon-circle-triangle-w"></span></button>
                        </p>

                        <p>
                            <input type="text" value="" id="nodeid_input" /><input type="button" value="Find node" onclick="find_node()" />
                        </p>
                        <?php
                            if ($_SESSION['user']):
                        ?>
                        <input type="button" value="Guardar la lista" onclick="enviar(getTreeValues());" name="submit3" />
                        <?php else: ?>
                        <input type="button" value="Guardar la lista" onclick="enviar(getTreeValues());" name="submit3" disabled="disabled"/>
                        <?php endif; ?>
                        <!--<input type="submit" value="Consultar precios" name="submit4" />-->
                    </fieldset>
                </form>

                <?php
                   /* if(isset ($_POST['submit3'])){
                        echo $_COOKIE['productos'];
                        var_dump($_COOKIE['productos']);
                        $datosCookie = "<script> document.write(document.cookie) </script>";
                        echo "datosCookie = ".$datosCookie."\n";
                        $arrayCookie = explode(",",$datosCookie);
                        echo "arrayCookies= ".$arrayCookie[0]."\n";
                        $arrayProductos = split(",",$arrayCookie[0]);
                        echo "arrayProductos= ".$arrayCookie[1]."\n";



                        /*echo "<script>alert ('document Cookies = '+document.cookie)</script>";
                        echo "<script>var variableJSS = getTreeValues();
                            alert('variable = '+variableJSS[0]);
                            </script>";
                        echo "
                                        <script language='JavaScript'>
                                             alert('variable = '+variableJSS[0]);
                                        </script>";
                        $valoresArbol = "<script> document.write(arbolProductos[0]) </script>";
                        require_once "PHP\\bd.php";
                        print "valoresArbol = ".$valoresArbol;
                        $lol = conectar();
                                if (!seleccionarUsuario($lol,$_POST['nick'] ,$_POST['password'])){
                                    echo "
                                        <script language='JavaScript'>
                                             alert('Password incorrecto');
                                        </script>";
                                }
                                else{
                                    session_start();
                                    $_SESSION['user'] = $_POST['nick'];
                                    header("Location: index.php");
                                }

                            }*/
                ?>

            </div>

            <!-- end content -->
            <!-- start sidebar -->
            <div id="sidebar">
                <ul>


                    <li>
                        <h2><b>Panel</b> Administrador</h2>
                        <ul>
                            <li><a href="#">Administrar listas</a></li>
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