<?php
            $super=$_POST['radio'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Shoppin'</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/myCss.css" />
        <link href='http://fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>
        <link href="CSS/jquery-ui-1.8.11.custom.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/map.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="JS/jquery-1.5.1.js"></script>
        <script type="text/javascript" src="JS/jquery-ui-1.8.11.custom.min.js"></script>
        <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAhOuFd1kAhAA-myGC5MjOQxT2yXp_ZAY8_ufC3CFXhHIE1NvwkxTfqzAGARRUTwW4Pu9OaaDQEBM5fw"
      type="text/javascript"></script>
        
        <script type="text/javascript" src="JS/icons.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="http://code.google.com/apis/gears/gears_init.js"></script>
<script type="text/javascript" src="JS/ubicacion.js"></script>


    </head>
    <body  onload="initialize()">
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
                <strong>Ésta es su ubicación</strong>
                <?php
                            if (isset($_POST['radio'])):
                ?>
                <iframe width="568" height="500" frameborder="1" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.es/maps?q=<?php echo $super; ?>&amp;output=embed"></iframe><br /><small><a href="http://maps.google.es/maps?q=<?php echo $super; ?>" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small>
                <?php else: ?>
                 <div id="map_canvas"></div>
                <!--<div id="map" align="center" style="width: 570px; height: 500px"></div>-->
                    <?php endif; ?>
                <div id="formUbi">
                    
                    <form method="post">
                    <fieldset>
                        <legend>fieldUbicacion</legend>
                <!--<p>Como llegar desde su posicion a los supermercados mas cercanos</p>-->
                <p>Buscar supermercados cerca de tu casa:</p>
                <p>¿Que Supermercados quieres buscar?</p>
                <div id="format">
                <label for="dia">Dia</label>
                <input type="radio" id="dia" name="radio" value="dia">
                <label for="mercadona">Mercadona</label>
                <input type="radio" id="mercadona" name="radio" value="mercadona">
                <label for="eroski">Eroski</label>
                <input type="radio" id="eroski" name="radio" value="eroski">
                <label for="carrefour">Carrefour</label>
                <input type="radio" id="carrefour" name="radio" value="carrefour">
                <label for="lidl">Lidl</label>
                <input type="radio" id="lidl" name="radio" value="lidl">
        </div>
                
                <br><br>

                <!--<p>Inserte su codigo postal o tu dirección:</p>
                <label for="cp">Codigo postal</label>
                <input type="text" name="cp" value=""><br>
                <label for="dir">Direccion</label>
                <input type="text" name="direccion" value=""><br><br>-->
                <p><input type="submit" value="Buscar supermercados" name="submit1"></p>
                <?php
                            if(isset ($_POST['submit1'])){
                                    $super = $_POST['radio'];
                                }
                        ?>
                </fieldset>
                </form>
                    </div>
            </div>
            <!-- end content -->
            <!-- start sidebar -->
            <div id="sidebar">
                <ul>
                    <li>
                        <h2><b>Panel</b> Administrador</h2>
                        <ul>
                            <li><a href="#">Administrar ubicaciones</a></li>
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
