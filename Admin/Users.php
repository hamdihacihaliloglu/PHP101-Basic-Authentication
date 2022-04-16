<?php
if(isset($_SESSION["Yonetici"])){
	if(isset($_REQUEST["AramaIcerigi"])){
		$GelenAramaIcerigi	=	Guvenlik($_REQUEST["AramaIcerigi"]);
		$AramaKosulu		=	 " AND (EmailAdresi LIKE '%" . $GelenAramaIcerigi . "%' OR IsimSoyisim LIKE '%" . $GelenAramaIcerigi . "%' OR TelefonNumarasi LIKE '%" . $GelenAramaIcerigi . "%' ) ";
		$SayfalamaKosulu	=	"&AramaIcerigi=" . $GelenAramaIcerigi;
	}else{
		$AramaKosulu		=	"";
		$SayfalamaKosulu	=	"";
	}

	$SayfalamaIcinSolVeSagButonSayisi		=	2;
	$SayfaBasinaGosterilecekKayitSayisi		=	10;
	$ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantim->prepare("SELECT * FROM uyeler WHERE SilinmeDurumu = ? $AramaKosulu ORDER BY id DESC");
	$ToplamKayitSayisiSorgusu->execute([0]);
	$ToplamKayitSayisiSorgusu				=	$ToplamKayitSayisiSorgusu->rowCount();
	$SayfalamayaBaslanacakKayitSayisi		=	($Sayfalama*$SayfaBasinaGosterilecekKayitSayisi)-$SayfaBasinaGosterilecekKayitSayisi;
	$BulunanSayfaSayisi						=	ceil($ToplamKayitSayisiSorgusu/$SayfaBasinaGosterilecekKayitSayisi);
?>
<div class="row justify-content-center">
	<div class="col-lg-7">
		<table class="table">
			<tr height="70" class="bg-gradient-dark">
				<td width="560" bgcolor="#FF9900" style="color: #FFFFFF;" align="left"><h3>&nbsp;ÜYELER</h3></td>
				
			</tr>
			<tr height="10">
				<td colspan="2" style="font-size: 10px;">&nbsp;</td>
			</tr>
			
			<tr height="10">
				<td colspan="2" style="font-size: 10px;">&nbsp;</td>
			</tr>
			<?php
			$UyelerSorgusu		=	$VeritabaniBaglantim->prepare("SELECT * FROM uyeler WHERE SilinmeDurumu = ? $AramaKosulu ORDER BY id DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SayfaBasinaGosterilecekKayitSayisi");
			$UyelerSorgusu->execute([0]);
			$UyelerSayisi		=	$UyelerSorgusu->rowCount();
			$UyelerKayitlari	=	$UyelerSorgusu->fetchAll(PDO::FETCH_ASSOC);
			
			if($UyelerSayisi>0){
				foreach($UyelerKayitlari as $Uyeler){
			?>	
					<tr height="80">
						<td colspan="2" style="border-bottom: 1px dashed #CCCCCC;" valign="top"><table class="table">
							<tr height="30">
								<td width="85"><b>Adı</b></td>
								<td width="10"><b>:</b></td>
								<td width="150"><?php echo DonusumleriGeriDondur($Uyeler["Ad"]); ?></td>
								<td width="85"><b>Soyadı</b></td>
								<td width="10"><b>:</b></td>
								<td width="150"><?php echo DonusumleriGeriDondur($Uyeler["Soyad"]); ?></td>
								<td width="90"><b>E-Mail</b></td>
								<td width="10"><b>:</b></td>
								<td width="200"><?php echo DonusumleriGeriDondur($Uyeler["EmailAdresi"]); ?></td>
								
								
							</tr>
							<tr height="30">
						
								
								<td><b>Kayıt IP</b></td>
								<td><b>:</b></td>
								<td><?php echo DonusumleriGeriDondur($Uyeler["KayitIPAdresi"]); ?></td>
							</tr>
							
						</table></td>
					</tr>
			<?php
				}
				
				

			}else{
			?>
				<tr>
					<td colspan="2"><table class="table">
						<tr>
							<td width="750">Kayıtlı üye bulunmamaktadır.</td>
						</tr>
					</table></td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
</div>

<?php
}else{
	header("Location:index.php?ARO=1");
	exit();
}
?>