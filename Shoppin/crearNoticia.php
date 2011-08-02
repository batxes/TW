<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
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
        <script type="text/javascript" src="JS/index.js"></script>
        <script type="text/javascript" src="JS/icons.js"></script>
        <!--<script type="text/javasript">$(document).ready(function(){
            $("a").click(function(event){
                event.preventDefault();
                $(this).hide("slow");});});
        </script>-->
        <script type="text/javasript">
        </script>
        <!--<script type="text/javasript">
        $('#titulo').mousedown(function(){
    alert('loooool')
});
        </script>-->
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
                        <li><a href="perfil.php">Perfil</a></li>
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
                <form id="formNoticia" action="#">
                    <fieldset>
                        <legend>fieldRegistro</legend>
                        <label for="ctitulo">Titulo</label>

                        <input id="cnombre" type="text" name="nombre" size="43px"><br>
                        <label for="ctitulo"></label>
                        <textarea name="noticia" rows="4" cols="40">
                        </textarea>


                        <p><input type="submit" name="submit" value="submit" size="20"></p>
                    </fieldset>
                </form>
            </div>
            <!-- end content -->
            <!-- start sidebar -->
            <div id="sidebar">
                
                <ul>
                    <li>
                        <h2><strong>Menu</strong> secundario</h2>
                        <ul>
                            <li><a href="#">Leer noticias pasadas</a></li>
                            <li><a href="crearNoticia.php">Crear una noticia</a></li>
                            <li><a href="#">Diselo a tus amigos</a></li>
                            <li><a href="#">Otros enlances interesantes</a></li>
                        </ul>
                    </li>
                    <li>
                        <h2><b>Panel</b> Administrador</h2>
                        <ul>
                            <li><a href="#">Administrar noticias</a></li>
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
}).render().setUser('Batxes').start();
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
