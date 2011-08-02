<?php
require_once 'bd.php';
function cargarProductos(){
    $lol = conectar();
    $query = "SELECT Distinct categoria, producto FROM producto";
    $result =& $lol->query($query);
    while ($row = $result->fetchRow()){
    switch ($row[0])
    {
        case 'Carnes':
            {
                
                $total[0]=$total[0].$row[1]."#";
                break;
            }
            case 'Pescados':
            {
                $total[1]=$total[1].$row[1]."#";;
                break;
            }
            case 'Verduras':
            {
                $total[2]=$total[2].$row[1]."#";;
                $k++;
                break;
            }
            case 'Frutas':
            {
                $total[3]=$total[3].$row[1]."#";;
                break;
            }
            case 'Cereales':
            {
                $total[4]=$total[4].$row[1]."#";;
                break;
            }
            case 'Congelados':
            {
                $total[5]=$total[5].$row[1]."#";;
                break;
            }
            case 'Lacteos':
            {
                $total[6]=$total[6].$row[1]."#";
                break;
            }
            case 'Legumbres':
            {
                $total[7]=$total[7].$row[1]."#";
                break;
            }
    }
    }
    return $total;

}

function insertarLista($id, $nick, $producto)
{
    $lol = conectar();
    $query = "INSERT INTO lista (id_lista, nick, producto) VALUES ('$id', '$nick', '$producto')";
    return realizarExec($lol, $query);
}

function getNumLista($nick)
{
    $lol = conectar();
    $query = "SELECT count(DISTINCT id_lista) as total from lista WHERE nick = '$nick'";
    $result =& $lol->query($query);
    $row = $result->fetchRow();
    return $row[0];
}
function getProductosFromLista($id, $nick)
{
    $lista="";
    $i = 0;
    $lol = conectar();
    $query = "SELECT producto FROM lista  WHERE nick = '$nick' AND id_lista='$id'";
    $result =& $lol->query($query);
    while ($row = $result->fetchRow()){
        $lista[$i] = $row[0];
        $i++;
    }
    return $lista;
}

function borrarLista($id, $nick)
        {
    $lol = conectar();
    $query = "DELETE FROM lista  WHERE nick = '$nick' AND id_lista='$id'";
    return realizarExec($lol, $query);
        }
?>
