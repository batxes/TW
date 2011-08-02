<?php
require_once 'MDB2.php';
require_once 'usuario.php';

function conectar(){
    #$USER = "root";
    #$PASSWORD = "";
    #$DB_NAME = "shoppin";
    #$dsn = "mysqli://"+$USER+":"+$PASSWORD+"@localhost/"+$DB_NAME;
    $dsn = 'mysqli://root:@localhost/shoppin';
    $conn = MDB2::connect ($dsn);
    if (PEAR::isError ($conn))
        die ("Cannot connect: " . $conn->getMessage() . "\n");
    else
        return $conn;
}

function realizarExec($mdb2, $query){
    $result = $mdb2->exec($query);
    if (PEAR::isError($result)) {
        //echo "error al realizar el query. " . $result->getMessage ()."<br/>";
        return false;
    }
    else{
        //echo "query realizado con exito <br/>";
        return true;
    }
}
function insertarUsuario($mdb2, $nombre, $nick, $password){
    $query = "INSERT INTO usuario (nombre, nick, password) VALUES ('$nombre', '$nick', '$password')";
    return realizarExec($mdb2, $query);
}

function borrarUsuario ($mdb2, $nick){
    $query = "DELETE FROM usuario WHERE nick = '$nick'";
    return realizarExec($mdb2, $query);
}

function seleccionarUsuario ($mdb2, $nick, $password){
    $query = "SELECT password FROM usuario WHERE nick = '$nick'";
    $result =& $mdb2->query($query);
    while ($row = $result->fetchRow()){
            if($row[0] == $password)
                return true;
            else
                return false;
    }
}

function actualizarUsuario($mdb2, $nombre,$nick, $password){
    $query2 = "UPDATE usuario SET nombre='$nombre', password='$password' WHERE usuario.nick='$nick'";
        return realizarExec($mdb2, $query2);
}
?>