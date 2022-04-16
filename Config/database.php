<?php 

try{
	$VeritabaniBaglantim =	new PDO("mysql:host=localhost;dbname=authentication;charset=UTF8","root","");
}catch(PDOException $Hata){
	die();
}


	$AyarlarSorgusu		=		$VeritabaniBaglantim->prepare("SELECT * FROM ayarlar LIMIT 1");
	$AyarlarSorgusu->execute();
	$AyarSayisi			=		$AyarlarSorgusu->rowCount();
	$Ayarlar 			=		$AyarlarSorgusu->fetch(PDO::FETCH_ASSOC);


	if($AyarSayisi>0){
		$SiteAdi				=	$Ayarlar["SiteAdi"];
		$SiteTitle				=	$Ayarlar["SiteTitle"];
		$SiteDescription		=	$Ayarlar["SiteDescription"];
		$SiteKeywords			=	$Ayarlar["SiteKeywords"];
		$SiteCopyright			=	$Ayarlar["SiteCopyright"];
		$SiteEmailAdresi		=	$Ayarlar["SiteEmailAdresi"];
		$SiteEmailSifre			=	$Ayarlar["SiteEmailSifre"];
		$SiteEmailHostAdresi	=	$Ayarlar["SiteEmailHostAdresi"];
		$SiteLinki				=	$Ayarlar["SiteLinki"];

	}else{
		
		die();
	}





	if(isset($_SESSION["Kullanici"])){
		$KullaniciSorgusu		=	$VeritabaniBaglantim->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ? LIMIT 1");
		$KullaniciSorgusu->execute([$_SESSION["Kullanici"]]);
		$KullaniciSayisi		=	$KullaniciSorgusu->rowCount();
		$Kullanici				=	$KullaniciSorgusu->fetch(PDO::FETCH_ASSOC);

		if($KullaniciSayisi>0){
			$KullaniciID		=	$Kullanici["id"];
			$EmailAdresi		=	$Kullanici["EmailAdresi"];
			$Ad					=	$Kullanici["Ad"];
			$Soyad 				=	$Kullanici["Soyad"];
			$Sifre				=	$Kullanici["Sifre"];			
			$Durumu				=	$Kullanici["Durumu"];
			$KayitIPAdresi		=	$Kullanici["KayitIPAdresi"];
			$AktivasyonKodu		=	$Kullanici["AktivasyonKodu"];
		
		}else{
			
			die();
		}
	}


	if(isset($_SESSION["Yonetici"])){
	$YoneticiSorgusu		=	$VeritabaniBaglantim->prepare("SELECT * FROM yoneticiler WHERE KullaniciAdi = ? LIMIT 1");
	$YoneticiSorgusu->execute([$_SESSION["Yonetici"]]);
	$YoneticiSayisi			=	$YoneticiSorgusu->rowCount();
	$Yonetici				=	$YoneticiSorgusu->fetch(PDO::FETCH_ASSOC);

	if($YoneticiSayisi>0){
		$YoneticiID					=	$Yonetici["id"];
		$YoneticiKullaniciAdi		=	$Yonetici["KullaniciAdi"];
		$YoneticiSifre				=	$Yonetici["Sifre"];
		$YoneticiIsimSoyisim		=	$Yonetici["IsimSoyisim"];
		$YoneticiEmailAdresi		=	$Yonetici["EmailAdresi"];
		$YoneticiTelefonNumarasi	=	$Yonetici["TelefonNumarasi"];
	}else{
		
		die();
	}
}






?>



