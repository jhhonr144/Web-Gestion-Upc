<?php
session_start(); 
$_SESSION = array(); 
 SESSION_destroy(); 
 $url = './..';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';
    die; 
?>