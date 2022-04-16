<?php
if(isset($_SESSION["Yonetici"])){
	if(isset($_POST["SiteAdi"])){
		$GelenSiteAdi				=	Guvenlik($_POST["SiteAdi"]);
	}else{
		$GelenSiteAdi				=	"";
	}
	if(isset($_POST["SiteTitle"])){
		$GelenSiteTitle				=	Guvenlik($_POST["SiteTitle"]);
	}else{
		$GelenSiteTitle				=	"";
	}
	if(isset($_POST["SiteDescription"])){
		$GelenSiteDescription		=	Guvenlik($_POST["SiteDescription"]);
	}else{
		$GelenSiteDescription		=	"";
	}
	if(isset($_POST["SiteKeywords"])){
		$GelenSiteKeywords			=	Guvenlik($_POST["SiteKeywords"]);
	}else{
		$GelenSiteKeywords			=	"";
	}
	if(isset($_POST["SiteCopyright"])){
		$GelenSiteCopyright	=	Guvenlik($_POST["SiteCopyright"]);
	}else{
		$GelenSiteCopyright	=	"";
	}
	if(isset($_POST["SiteLinki"])){
		$GelenSiteLinki				=	Guvenlik($_POST["SiteLinki"]);
	}else{
		$GelenSiteLinki				=	"";
	}
	if(isset($_POST["SiteEmailAdresi"])){
		$GelenSiteEmailAdresi		=	Guvenlik($_POST["SiteEmailAdresi"]);
	}else{
		$GelenSiteEmailAdresi		=	"";
	}
	if(isset($_POST["SiteEmailSifre"])){
		$GelenSiteEmailSifre		=	Guvenlik($_POST["SiteEmailSifre"]);
	}else{
		$GelenSiteEmailSifre		=	"";
	}
	if(isset($_POST["SiteEmailHostAdresi"])){
		$GelenSiteEmailHostAdresi	=	Guvenlik($_POST["SiteEmailHostAdresi"]);
	}else{
		$GelenSiteEmailHostAdresi	=	"";
	}
	
	
	

	if(($GelenSiteAdi!="") and ($GelenSiteTitle!="") and ($GelenSiteDescription!="") and ($GelenSiteKeywords!="") and ($GelenSiteCopyright!="") and ($GelenSiteLinki=="") and ($GelenSiteEmailAdresi!="") and ($GelenSiteEmailSifre!="") and ($GelenSiteEmailHostAdresi!="")){
		$AyarlariGuncelle			=	$VeritabaniBaglantim->prepare("UPDATE ayarlar SET SiteAdi = ?, SiteTitle = ?, SiteDescription = ?, SiteKeywords = ?, SiteCopyright = ?, SiteLinki = ?, SiteEmailAdresi = ?, SiteEmailSifre = ?, SiteEmailHostAdresi = ?");
		$AyarlariGuncelle->execute([$GelenSiteAdi, $GelenSiteTitle, $GelenSiteDescription, $GelenSiteKeywords, $GelenSiteCopyright,$GelenSiteLinki, $GelenSiteEmailAdresi, $GelenSiteEmailSifre, $GelenSiteEmailHostAdresi]);
		
		
			
		header("Location:index.php?ARO=0&AR=1");
		exit();
	}else{
		header("Location:index.php?ARO=0&AR=4");
		exit();
	}
}else{
	header("Location:index.php?ARO=1");
	exit();
}
?>