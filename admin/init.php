<?php

    include 'connect.php';
    //Routes
    $tpl ='include/templates/'; //Templates directory
    $lang = 'include/languages/';//Language 
    $func ='include/functions/';
    $css='layout/css/';
    $js='layout/js/';
    $img='layout/images/';
    

    // include important Files
    include $func . 'functions.php';
    include $lang . 'english.php';
    include $tpl . 'header.php';

    if(!isset($noNavbar)){ include $tpl . 'nav.php';}
    if(!isset($noSection)){include $tpl . 'carousel.php' ;include $tpl . 'section.php';}

    
    
    
?>