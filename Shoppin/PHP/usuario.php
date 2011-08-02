<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author Ibai
 */
class usuario {
    var $nombre;
    var $nick;
    var $password;

    function setNombre($nombre){
        this.$nombre = $nombre;
    }
    function setNick($nick){
        this.$nick = $nick;
    }
    function setPassword($password){
        this.$password = $password;
    }
    function getNombre(){
        return $nombre;
    }
    function getNick(){
        return $nick;
    }
    function getPassword(){
        return $password;
    }
}
?>
