<?php

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
	$KontrolSorgusu		=	$VeritabaniBaglantim->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ? AND AktivasyonKodu = ?");
	$KontrolSorgusu->execute([$GelenEmail, $GelenAktivasyonKodu]);
	$KullaniciSayisi	=	$KontrolSorgusu->rowCount();
	$KullaniciKaydi		=	$KontrolSorgusu->fetch(PDO::FETCH_ASSOC);
	
	if($KullaniciSayisi>0){
?>	
<div class="container">
  	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg-6">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Şifremi Unuttum</h1>
						</div>
						<form class="user" action="index.php?RC=12&EmailAdresi=<?php echo $GelenEmail; ?>&AktivasyonKodu=<?php echo $GelenAktivasyonKodu; ?>" method="post">
							<div class="form-group">
								<input type="password" class="form-control form-control-user" name="Sifre" placeholder="Lütfen Yeni Şİfrenizi Giriniz.">
							</div>
							<div class="form-group">
								<input type="password" class="form-control form-control-user" name="SifreTekrar" placeholder="Lütfen Yeni Şifrenizi Tekrar Giriniz.">
							</div>
							<input type="submit" class="btn bg-gradient-primary btn-user text-white btn-block" value="Gönder">
						</form>
					</div>
				</div>
				<div class="col-lg-6 d-none d-lg-block">
					<div class="text-center p-5">
						<p class="h5 text-gray-900">Yeni Şifre Belirleme Kuralları</p>
					</div>
					<div>
						<div><i class="fas fa-people-arrows"></i> Bilgi Kontrolü<br></div>
						 <div>Kullanıcının form alanına girmiş olduğu değer veya değerler veritabanımızda tam detaylı olarak filtrelenerek kontrol edilir.</div><br>
					</div>
					<div>
						<div><i class="fas fa-envelope"></i> E-Mail Gönderimi & İçerik<br></div>
						 <div>Bilgi kontrolü başarılı olur ise, kullanıcının veritabanımızda kayıtlı olan e-mail adresine yeni şifre oluşturma içerikli bir mail gönderilir.</div><br>
					</div>
					<div>
						<div><i class="fas fa-user-lock"></i> Şifre Sıfırlama & Oluşturma<br></div>
						<div>
						Kullanıcı, kendisine iletilen mail içerisindeki "Yeni Şifre Oluştur" metnine tıklayacak olur ise, site yeni şifre oluşturma sayfası açılır ve kullanıcıdan, yeni hesap şifresini oluşturması istenir.
					</div><br>
					</div>
					<div>
						<div><i class="fas fa-child"></i> Sonuç<br></div>
						<div>
							Kullanıcı yeni oluşturmuş olduğu hesap şifresi ile siteye giriş yapmaya hazırdır.
						</div><br>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	}else{
		header("Location:index.php");
		exit();
	}
}else{
	header("Location:index.php");
	exit();
}
?>
