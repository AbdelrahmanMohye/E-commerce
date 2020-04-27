<?php 
  $dsn = 'mysql:host=localhost;dbname=id13230444_shop';
 $user= 'root';//'id13230444_shopus';
 $pass=  '';  //'TSDt@t/]}[Cq8ico';
 $opt = array(
 	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
 	 );
 try{
 	$con = new PDO($dsn, $user, $pass, $opt);
 	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }catch(PDOException $e){
 	echo $e;
 }