<?php
require_once 'bd.php';
function insertarProducto($mdb2,$producto,$supermercado,$categoria,$precio,$cantidad,$unidad) {
    $query = "INSERT INTO producto (producto, supermercado, categoria, precio, cantidad, unidad) VALUES ('$producto','$supermercado','$categoria','$precio','$cantidad','$unidad')";
    if(!realizarExec($mdb2, $query)) {
        $query2 = "UPDATE producto SET categoria='$categoria', precio='$precio', cantidad='$cantidad', unidad='$unidad' WHERE producto.producto='$producto' AND producto.supermercado='$supermercado'";
        return realizarExec($mdb2, $query2);
    }
    return true; 
}

function cargarCategoria($categoria){
    $lol = conectar();
    $query = "SELECT supermercado, producto, precio, cantidad, unidad FROM producto WHERE producto.categoria = '$categoria'";
    $result =& $lol->query($query);
    $i = 0;
    $j=0;
    while ($row = $result->fetchRow()){
        foreach ($row as $valor)
            {
                $total[$j][$i] = $valor;
                $i++;
            }
            $i=0;
            $j++;
    }
    return $total;
    
}

?>
