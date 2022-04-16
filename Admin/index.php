<?php
session_start(); ob_start();
require_once("../Config/database.php");
require_once("../Config/function.php");
require_once("../Config/adminroutes.php");
require_once("../Config/adminroutesout.php");

//Admin Dış Sayfa kodu Değeri(adminlogin,adminlogout...)
if(isset($_REQUEST["ARO"])){
    $AdminRoutesOutCode =   IcerikleriFiltrele($_REQUEST["ARO"]);
}else{
    $AdminRoutesOutCode =   0;
}

//Admin İç Sayfa Kodu Değeri (admin,users..)
if(isset($_REQUEST["AR"])){
    $AdminRoutesCode  =    IcerikleriFiltrele($_REQUEST["AR"]);
}else{
    $AdminRoutesCode  =   0;

}

if(isset($_REQUEST["SYF"])){
    $Sayfalama          =   IcerikleriFiltrele($_REQUEST["SYF"]);
}else{
    $Sayfalama          =   1;
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include("Includes/head.php") ?>
</head>

<body id="page-top">

		<?php
		//Admin Paneline Sayfaların Çekilmesi İşlemi
		if(empty($_SESSION["Yonetici"])){
			if((!$AdminRoutesOutCode) or ($AdminRoutesOutCode=="") or ($AdminRoutesOutCode==0)){
				include($AdminRoutesOut[1]);
			}else{
				include($AdminRoutesOut[$AdminRoutesOutCode]);
			}                   
				}else{
					 if((!$AdminRoutesOutCode) or ($AdminRoutesOutCode=="") or ($AdminRoutesOutCode==0)){
						include($AdminRoutesOut[0]);
					}else{
						include($AdminRoutesOut[$AdminRoutesOut]);
					}
				}

	   ?>           
</body>
</html>



<?php
    $VeritabaniBaglantim   =    null;
    ob_end_flush();
?>