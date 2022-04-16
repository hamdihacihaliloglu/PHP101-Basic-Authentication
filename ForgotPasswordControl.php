<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Lib/PHPMailer/src/Exception.php';
require 'Lib/PHPMailer/src/PHPMailer.php';
require 'Lib/PHPMailer/src/SMTP.php';

if(isset($_POST["EmailAdresi"])){
	$GelenEmailAdresi		=	Guvenlik($_POST["EmailAdresi"]);
}else{
	$GelenEmailAdresi		=	"";
}

if(($GelenEmailAdresi!="")){
	$KontrolSorgusu		=	$VeritabaniBaglantim->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ? AND SilinmeDurumu = ?");
	$KontrolSorgusu->execute([$GelenEmailAdresi, 0]);
	$KullaniciSayisi	=	$KontrolSorgusu->rowCount();
	$KullaniciKaydi		=	$KontrolSorgusu->fetch(PDO::FETCH_ASSOC);

	if($KullaniciSayisi>0){
		$MailIcerigiHazirla		=	"Merhaba Sayın " . $KullaniciKaydi["Soyad"] . "<br /><br />Sitemiz üzerinde bulunan hesabınızın şifresini sıfırlamak için lütfen <a href='" . $SiteLinki . "/index.php?RC=11&AktivasyonKodu=" . $KullaniciKaydi["AktivasyonKodu"] . "&Email=" . $KullaniciKaydi["EmailAdresi"] . "'>BURAYA TIKLAYINIZ</a>.<br /><br />Saygılarımızla, iyi çalışmalar...<br />" . $SiteAdi;

		$MailGonder		=	new PHPMailer(true);

		try{
			$MailGonder->SMTPDebug			=	0;
			$MailGonder->isSMTP();
			$MailGonder->Host				=	DonusumleriGeriDondur($SiteEmailHostAdresi);
			$MailGonder->SMTPAuth			=	true;
			$MailGonder->CharSet			=	"UTF-8";
			$MailGonder->Username			=	DonusumleriGeriDondur($SiteEmailAdresi);
			$MailGonder->Password			=	DonusumleriGeriDondur($SiteEmailSifre);
			$MailGonder->SMTPSecure			=	'tls';
			$MailGonder->Port				=	587;
			$MailGonder->SMTPOptions		=	array(
													'ssl' => array(
														'verify_peer' => false,
														'verify_peer_name' => false,
														'allow_self_signed' => true
													)
												);
			$MailGonder->setFrom(DonusumleriGeriDondur($SiteEmailAdresi), DonusumleriGeriDondur($SiteAdi));
			$MailGonder->addAddress(DonusumleriGeriDondur($KullaniciKaydi["EmailAdresi"]), DonusumleriGeriDondur($KullaniciKaydi["IsimSoyisim"]));					
			$MailGonder->addReplyTo(DonusumleriGeriDondur($SiteEmailAdresi), DonusumleriGeriDondur($SiteAdi));
			$MailGonder->isHTML(true);
			$MailGonder->Subject			=	$SiteAdi . ' Şifre Sıfırlama';
			$MailGonder->MsgHTML($MailIcerigiHazirla);
			$MailGonder->send();

			header("Location:index.php?RC=1");
			exit();
		}catch(Exception $e){
			header("Location:index.php?RC=13");
			exit();
		}			
	}else{
		header("Location:index.php?RC=9");
		exit();
	}
}else{
	header("Location:index.php?RC=9");
	exit();
}
?>