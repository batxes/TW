<?php
session_start();
require_once 'funcionesLista.php';
require_once 'bd.php';
$id=getNumLista($_SESSION['user'])+1;
if(isset($_POST['actualiza'])){
    	$productos=explode(",",$_POST['productos']);
    	foreach($productos as $p){
    		echo $p."\n";
                insertarLista($id, $_SESSION['user'], $p);
    	}
    }
   else{
   echo "no hay productos";
   }

 ?>


