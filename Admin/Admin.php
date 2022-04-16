

<form action="index.php?ARO=0&AR=3" method="post" enctype="multipart/form-data">
	<table class="table">
		<tr height="70">
			<td class="bg-gradient-dark text-white"><h3>&nbsp;SİTE AYARLARI</h3></td>
		</tr>
		<tr height="10">
			<td style="font-size: 10px;">&nbsp;</td>
		</tr>
		<tr>
			<td><table class="table">
				<tr >
					<td width="200">Site Adı</td>
					<td width="20">:</td>
					<td width="500"><input type="text" name="SiteAdi" value="<?php echo DonusumleriGeriDondur($SiteAdi); ?>" class="form-control"></td>
				</tr>
				<tr height="40">
					<td>Site Title</td>
					<td>:</td>
					<td><input type="text" name="SiteTitle" value="<?php echo DonusumleriGeriDondur($SiteTitle); ?>" class="form-control"></td>
				</tr>
				<tr height="40">
					<td>Site Description</td>
					<td>:</td>
					<td><input type="text" name="SiteDescription" value="<?php echo DonusumleriGeriDondur($SiteDescription); ?>" class="form-control"></td>
				</tr>
				<tr height="40">
					<td>Site Keywords</td>
					<td>:</td>
					<td><input type="text" name="SiteKeywords" value="<?php echo DonusumleriGeriDondur($SiteKeywords); ?>" class="form-control"></td>
				</tr>
				<tr height="40">
					<td>Site Copyright Metni</td>
					<td>:</td>
					<td><input type="text" name="SiteCopyright" value="<?php echo DonusumleriGeriDondur($SiteCopyright); ?>" class="form-control"></td>
				</tr>
				
				<tr height="40">
					<td>Site Linki</td>
					<td>:</td>
					<td><input type="text" name="SiteLinki" value="<?php echo DonusumleriGeriDondur($SiteLinki); ?>" class="form-control"></td>
				</tr>
				<tr height="40">
					<td>Site Email Adresi</td>
					<td>:</td>
					<td><input type="text" name="SiteEmailAdresi" value="<?php echo DonusumleriGeriDondur($SiteEmailAdresi); ?>" class="form-control"></td>
				</tr>
				<tr height="40">
					<td>Site Email Şifresi</td>
					<td>:</td>
					<td><input type="text" name="SiteEmailSifre" value="<?php echo DonusumleriGeriDondur($SiteEmailSifre); ?>" class="form-control"></td>
				</tr>
				<tr height="40">
					<td>Site Email Host Adresi</td>
					<td>:</td>
					<td><input type="text" name="SiteEmailHostAdresi" value="<?php echo DonusumleriGeriDondur($SiteEmailHostAdresi); ?>" class="form-control"></td>
				</tr>
			
				<tr height="40">
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><input type="submit" value="Ayarları Kaydet" class="bg-gradient-success text-white btn-user btn btn-block"></td>
				</tr>
			</table></td>
		</tr>
	</table>
</form>