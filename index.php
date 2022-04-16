<?php
    session_start(); ob_start();
    require_once("Config/database.php");
    require_once("Config/function.php");
    require_once("Config/routes.php");
    
    if(isset($_REQUEST["RC"])){
        $RoutesCode  =   IcerikleriFiltrele($_REQUEST["RC"]);
    }else{
        $RoutesCode  =   0;
    }
?>

<!doctype html>
<html>
<head>
	<?php include_once ("Includes/head.php") ?>
</head>
<body>
	
	<div>
	<?php

         if((!$RoutesCode) or ($RoutesCode=="") or ($RoutesCode==0)){
            include($Routes[0]);
         }else{
            include($Routes[$RoutesCode]);
         }

    ?>
	
	</div>
	
	
	
	
	<?php include_once ("Includes/scripts.php") ?>
	
</body>
</html>

<?php
    $VeritabaniBaglantim   =    null;
    ob_end_flush();
?>