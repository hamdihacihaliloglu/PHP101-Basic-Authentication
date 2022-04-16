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
if(isset($_POST["Ad"])){
	$GelenAd	=	Guvenlik($_POST["Ad"]);
}else{
	$GelenAd		=	"";
}
if(isset($_POST["Soyad"])){
	$GelenSoyad	=	Guvenlik($_POST["Soyad"]);
}else{
	$GelenSoyad		=	"";
}
if(isset($_POST["Sifre"])){
	$GelenSifre				=	Guvenlik($_POST["Sifre"]);
}else{
	$GelenSifre				=	"";
}
if(isset($_POST["SifreTekrar"])){
	$GelenSifreTekrar		=	Guvenlik($_POST["SifreTekrar"]);
}else{
	$GelenSifreTekrar		=	"";
}



$AktivasyonKodu				=	AktivasyonKoduUret();
$MD5liSifre					=	md5($GelenSifre);

if(($GelenEmailAdresi!="") and ($GelenAd!="") and ($GelenSoyad!="") and ($GelenSifre!="") and ($GelenSifreTekrar!="")  ){
	
		if($GelenSifre!=$GelenSifreTekrar){
			header("Location:index.php?SK=15");
			exit();
		}else{

			$KontrolSorgusu		=	$VeritabaniBaglantim->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ?");
			$KontrolSorgusu->execute([$GelenEmailAdresi]);
			$KullaniciSayisi	=	$KontrolSorgusu->rowCount();
			
			if($KullaniciSayisi>0){
				header("Location:index.php?SK=15");
				exit();
			}else{
				$UyeEklemeSorgusu		=	$VeritabaniBaglantim->prepare("INSERT INTO uyeler (EmailAdresi, Ad ,Soyad, Sifre, Durumu,  KayitIpAdresi, AktivasyonKodu) values (?, ?,  ?, ?, ?,?,?)");
				$UyeEklemeSorgusu->execute([$GelenEmailAdresi, $GelenAd, $GelenSoyad, $MD5liSifre, 0, $IPAdresi, $AktivasyonKodu]);
				$KayitKontrol		=	$UyeEklemeSorgusu->rowCount();
				
				if($KayitKontrol>0){
					
					$MailIcerigiHazirla		=	"Merhaba Sayın " . $GelenAd . $GelenSoyAd."<br /><br />Sitemize yapmış olduğunuz üyelik kaydını tamamlamak için lütfen <a href='" . $SiteLinki . "/ActivationCode.php?AktivasyonKodu=" . $AktivasyonKodu . "&Email=" . $GelenEmailAdresi . "'>BURAYA TIKLAYINIZ</a>.<br /><br />Saygılarımızla, iyi çalışmalar...<br />" . $SiteAdi;
					
					$MailGonder		=	new PHPMailer(true);
					
					try{
							$MailGonder->SMTPDebug			=	0;
							$MailGonder->isSMTP();	
							$MailGonder->Host				=	DonusumleriGeriDondur($SiteEmailHostAdresi);
							$MailGonder->SMTPAuth			=	true;
							$MailGonder->CharSet			=	"UTF-8";
							$MailGonder->Username			=	DonusumleriGeriDondur($SiteEmailAdresi);
							$MailGonder->Password			=	DonusumleriGeriDondur($SiteEmailSifre);
							$MailGonder->SMTPSecure			=	'STARTTLS';
							$MailGonder->Port				=	587;
							$MailGonder->SMTPOptions		=	array(
																'ssl' => array(
																	'verify_peer' => false,
																	'verify_peer_name' => false,
																	'allow_self_signed' => true
																	)
																			
																			);




						$MailGonder->setFrom(DonusumleriGeriDondur($SiteEmailAdresi), DonusumleriGeriDondur($SiteAdi));
						$MailGonder->addAddress(DonusumleriGeriDondur($GelenEmailAdresi), DonusumleriGeriDondur($GelenIsimSoyisim));					
						$MailGonder->addReplyTo(DonusumleriGeriDondur($SiteEmailAdresi), DonusumleriGeriDondur($SiteAdi));
						$MailGonder->isHTML(true);
						$MailGonder->Subject			=	$SiteAdi . ' Yeni Üyelik Aktivasyonu';
						$MailGonder->MsgHTML($MailIcerigiHazirla);
						$MailGonder->send();
						
						header("Location:index.php?SK=14");
						exit();
					}catch(Exception $e){
						header("Location:index.php?SK=15");
						exit();
					}
				}else{
					header("Location:index.php?SK=15");
					exit();
				}
			}
		}
	}
	else{
	header("Location:index.php?SK=15");
	exit();
}

?>