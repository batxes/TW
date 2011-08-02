<?php
require_once "PHP/bd.php";
$lol = conectar();
require_once "PHP/funcionesProducto.php";
?>

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
        <script type="text/javascript" src="JS/productos.js"></script>
        <script type="text/javascript" src="JS/icons.js"></script>

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
                <div class="demo">


                </div><!-- End demo -->
                <!-- <form method="post">
                    <fieldset>
                        <legend>fieldProdcutos</legend>
                        <h2>Lista de productos</h2>
                        <label for="prodcuto">Escribe el nombre</label>
                        <input type="text" name="busqueda" value="" /><br>
                        <label for="Categoria">Categoría</label>
                        <select name="categoria">
                            <option>Cualquiera</option>
                            <option>Carnes</option>
                            <option>Pescados</option>
                            <option>Verduras</option>
                            <option>Frutas</option>
                            <option>Cereales</option>
                            <option>Congelados</option>
                            <option>Lacteos</option>
                            <option>Legumbres</option>
                        </select><br>
                        <label for="supermercado">Supermercado</label>
                        <select name="supermercado">
                            <option>Cualquiera</option>
                            <option>Dia</option>
                            <option>Eroski</option>
                            <option>Mercadona</option>
                            <option>Carrefour</option>
                            <option>Lidle</option>
                            <option>MaxCop</option>
                        </select><br><br>
                        <p><input type="submit" value="Buscar" name="buscar" />
                        </p>
                    </fieldset>
                </form>-->
                <div id="panel">
                    <form method="post">
                        <fieldset>
                            <legend>insertarProducto</legend>

                            <h2>Inserta el producto: </h2>
                            <label for="supermercado">Supermercado</label>
                            <select name="supermercado2">
                                <option></option>
                                <option>Dia</option>
                                <option>Eroski</option>
                                <option>Mercadona</option>
                                <option>Carrefour</option>
                                <option>Lidle</option>
                                <option>MaxCop</option>
                            </select><br>
                            <label for="categoria">Categoría</label>
                            <select name="categoria2">
                                <option></option>
                                <option>Carnes</option>
                                <option>Pescados</option>
                                <option>Verduras</option>
                                <option>Frutas</option>
                                <option>Cereales</option>
                                <option>Congelados</option>
                                <option>Lacteos</option>
                                <option>Legumbres</option>
                            </select><br><br>
                            <label for="producto">Producto</label>
                            <input type="text" name="producto" value="" size="20" /><br>
                            <label for="precio">Precio</label>
                            <input type="text" name="precio" value="" size="20" /><br>
                            <label for="cantidad">Cantidad</label>
                            <input type="text" name="cantidad" value="" size="20" /><select name="unidad">
                                <option></option>
                                <option>kilo</option>
                                <option>litro</option>
                                <option>metro</option>
                                <option>unidad</option>
                            </select><br><br>
                            <input type="submit" value="Insertar" name="submit1" />
                        </fieldset>
                    </form>
                    <?php
                    if(isset ($_POST['submit1'])) {
                        require_once "PHP/bd.php";
                        $lol = conectar();
                        require_once "PHP/funcionesProducto.php";
                        if (!insertarProducto($lol,$_POST['producto'],$_POST['supermercado2'],$_POST['categoria2'],$_POST['precio'],$_POST['cantidad'],$_POST['unidad'])) {
                            echo "<script language='JavaScript'>
                                             alert('Error al insertar el producto');
                                        </script>";
                        }


                    }

                    ?>
                </div>
                <p class="slide"><a href="#" class="btn-slide">Insertar un producto</a></p>
                <div id="tabs">

                        <ul>

                            <li><a href="#fragmentProductos-1"><span>Carne</span></a></li>
                            <li><a href="#fragmentProductos-2"><span>Pescado</span></a></li>
                            <li><a href="#fragmentProductos-3"><span>Verdura</span></a></li>
                            <li><a href="#fragmentProductos-4"><span>Fruta</span></a></li>
                            <li><a href="#fragmentProductos-5"><span>Cereal</span></a></li>
                            <li><a href="#fragmentProductos-6"><span>Congelado</span></a></li>
                            <li><a href="#fragmentProductos-7"><span>Lacteo</span></a></li>
                            <li><a href="#fragmentProductos-8"><span>Legumbre</span></a></li>
                        </ul>
                        <div id="fragmentProductos-1">
                            <p>
                                <?php
                                $valores = cargarCategoria("Carnes");

                                for($i=0;$i < count($valores);$i++) {
                                    echo "<input type='checkbox' name='checkbox%i' value='OFF' />";
                                    echo "<strong>Producto:</strong> ".$valores[$i][1]." ". $valores[$i][2]."€ ". $valores[$i][3]." ". $valores[$i][4]." <strong>Supermercado:</strong> ".$valores[$i][0];
                                    echo "<br>";
                                }
                                ?>
                            </p>
                        </div>
                        <div id="fragmentProductos-2">
                            <p>
                                <?php
                                $valores = cargarCategoria("Pescados");

                                for($i=0;$i < count($valores);$i++) {
                                    echo "<input type='checkbox' name='checkbox%i' value='OFF' />";
                                    echo "<strong>Producto:</strong> ".$valores[$i][1]." ". $valores[$i][2]."€ ". $valores[$i][3]." ". $valores[$i][4]." <strong>Supermercado:</strong> ".$valores[$i][0];
                                    echo "<br>";
                                }
                                ?>
                            </p>
                        </div>
                        <div id="fragmentProductos-3">
                            <p>
                                <?php
                                $valores = cargarCategoria("Verduras");

                                for($i=0;$i < count($valores);$i++) {
                                    echo "<input type='checkbox' name='checkbox%i' value='OFF' />";
                                    echo "<strong>Producto:</strong> ".$valores[$i][1]." ". $valores[$i][2]."€ ". $valores[$i][3]." ". $valores[$i][4]." <strong>Supermercado:</strong> ".$valores[$i][0];
                                    echo "<br>";
                                }
                                ?>
                            </p>
                        </div>
                        <div id="fragmentProductos-4">
                            <p>
                                <?php
                                $valores = cargarCategoria("Frutas");

                                for($i=0;$i < count($valores);$i++) {
                                    echo "<input type='checkbox' name='checkbox%i' value='OFF' />";
                                    echo "<strong>Producto:</strong> ".$valores[$i][1]." ". $valores[$i][2]."€ ". $valores[$i][3]." ". $valores[$i][4]." <strong>Supermercado:</strong> ".$valores[$i][0];
                                    echo "<br>";
                                }
                                ?>
                            </p>
                        </div>
                        <div id="fragmentProductos-5">
                            <p>
                                <?php
                                $valores = cargarCategoria("Cereales");

                                for($i=0;$i < count($valores);$i++) {
                                    echo "<input type='checkbox' name='checkbox%i' value='OFF' />";
                                    echo "<strong>Producto:</strong> ".$valores[$i][1]." ". $valores[$i][2]."€ ". $valores[$i][3]." ". $valores[$i][4]." <strong>Supermercado:</strong> ".$valores[$i][0];
                                    echo "<br>";
                                }
                                ?>
                            </p>
                        </div>
                        <div id="fragmentProductos-6">
                            <p>
                                <?php
                                $valores = cargarCategoria("Congelados");

                                for($i=0;$i < count($valores);$i++) {
                                    echo "<input type='checkbox' name='checkbox%i' value='OFF' />";
                                    echo "<strong>Producto:</strong> ".$valores[$i][1]." ". $valores[$i][2]."€ ". $valores[$i][3]." ". $valores[$i][4]." <strong>Supermercado:</strong> ".$valores[$i][0];
                                    echo "<br>";
                                }
                                ?>
                            </p>
                        </div>
                        <div id="fragmentProductos-7">
                            <p>
                                <?php
                                $valores = cargarCategoria("Lacteos");

                                for($i=0;$i < count($valores);$i++) {
                                    echo "<input type='checkbox' name='checkbox%i' value='OFF' />";
                                    echo "<strong>Producto:</strong> ".$valores[$i][1]." ". $valores[$i][2]."€ ". $valores[$i][3]." ". $valores[$i][4]." <strong>Supermercado:</strong> ".$valores[$i][0];
                                    echo "<br>";
                                }
                                ?>
                            </p>
                        </div>
                        <div id="fragmentProductos-8">
                            <p>
                                <?php
                                $valores = cargarCategoria("Legumbres");

                                for($i=0;$i < count($valores);$i++) {
                                    echo "<input type='checkbox' name='checkbox%i' value='OFF' />";
                                    echo "<strong>Producto:</strong> ".$valores[$i][1]." ". $valores[$i][2]."€ ". $valores[$i][3]." ". $valores[$i][4]." <strong>Supermercado:</strong> ".$valores[$i][0];
                                    echo "<br>";
                                }
                                ?>
                            </p>
                        </div>

                </div>
                


            </div>
            <!-- end content -->
            <!-- start sidebar -->
            <div id="sidebar">
                <ul>

                    <li>
                        <h2><b>Panel</b> Administrador</h2>
                        <ul>
                            <li><a href="#">Administrar productos</a></li>
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
