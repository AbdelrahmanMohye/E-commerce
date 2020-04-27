<?php
  include "conn.php";
 $tmpl = 'include/templates/';
 $css  = 'layout/css/';
 $js   = 'layout/js/';
 $lang = 'include/languages/';



 include $lang . "arabic.php";
 include $tmpl . "header.php";

 if(!isset($nonavbar)){ include $tmpl . "navbar.php";}