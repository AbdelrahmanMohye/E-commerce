<?php

function getNaveActive(){
	global $TP;
	if(isset($TP)){
		echo $TP;
	}else{
		echo "home";
	}
}


?>