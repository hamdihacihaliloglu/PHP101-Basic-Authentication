<?php
require_once("Config/database.php");
require_once("Config/function.php");

if(isset($_GET["AktivasyonKodu"])){
	$GelenAktivasyonKodu	=	Guvenlik($_GET["AktivasyonKodu"]);
}else{
	$GelenAktivasyonKodu	=	"";
}
if(isset($_GET["Email"])){
	$GelenEmail				=	Guvenlik($_GET["Email"]);
}else{
	$GelenEmail				=	"";
}

if(($GelenAktivasyonKodu!="") and ($GelenEmail!="")){
	$KontrolSorgusu		=	$VeritabaniBaglantim->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ? AND AktivasyonKodu = ? AND Durumu = ?");
	$KontrolSorgusu->execute([$GelenEmail, $GelenAktivasyonKodu, 0]);
	$KullaniciSayisi	=	$KontrolSorgusu->rowCount();

	if($KullaniciSayisi>0){
		$UyeGuncellemeSorgusu		=	$VeritabaniBaglantim->prepare("UPDATE uyeler SET Durumu = 1");
		$UyeGuncellemeSorgusu->execute();
		$Kontrol		=	$UyeGuncellemeSorgusu->rowCount();

		if($Kontrol>0){
			header("Location:index.php?RC=0");
			exit();
		}else{
			header("Location:" . $SiteLinki);
			exit();
		}
	}else{
		header("Location:" . $SiteLinki);
		exit();
	}
}else{
	header("Location:" . $SiteLinki);
	exit();
}

$VeritabaniBaglantisi	=	null;
?>