<?php
if(empty($_SESSION["Yonetici"])){
	
	if(isset($_POST["YoneticiKullaniciAdi"])){
		$GelenYoneticiKullaniciAdi		=	Guvenlik($_POST["YoneticiKullaniciAdi"]);
	}else{
		$GelenYoneticiKullaniciAdi		=	"";
	}
	if(isset($_POST["YoneticiSifre"])){
		$GelenYoneticiSifre			=	Guvenlik($_POST["YoneticiSifre"]);
	}else{
		$GelenYoneticiSifre			=	"";
	}

	$MD5liSifre					=	md5(md5(md5(md5($GelenYoneticiSifre))));

	if(($GelenYoneticiKullaniciAdi!="") and ($GelenYoneticiSifre!="")){
		$KontrolSorgusu		=	$VeritabaniBaglantim->prepare("SELECT * FROM yoneticiler WHERE KullaniciAdi = ? AND Sifre = ?");
		$KontrolSorgusu->execute([$GelenYoneticiKullaniciAdi, $MD5liSifre]);
		$KullaniciSayisi	=	$KontrolSorgusu->rowCount();
		$KullaniciKaydi		=	$KontrolSorgusu->fetch(PDO::FETCH_ASSOC);

		if($KullaniciSayisi>0){
			$_SESSION["Yonetici"]	=	$GelenYoneticiKullaniciAdi;
				
			header("Location:index.php?ARO=0&AR=0");
			exit();
		}else{
			header("Location:index.php?ARO=3");
			exit();
		}
	}else{
		header("Location:index.php?ARO=1");
		exit();
	}
}else{
	header("Location:index.php?ARO=0");
	exit();
}
?>