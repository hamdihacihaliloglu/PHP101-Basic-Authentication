<?php
 if(isset($_SESSION['Kullanici'])){
?>

<div class="container">
	<div class="row justify-content-center align-items-center">
		<div class="col-lg-6">
			<div class="row">
				<div class=" card card-index col-md-8">
					<div>
						<p>AD: <b><?php echo($Ad) ?></b></p>
					</div>
					<div>
						<p>SOYAD: <b><?php echo($Soyad) ?></b></p>
					</div>
					<div>
						<p>EMAİL ADRESİ: <b><?php echo($EmailAdresi) ?></b></p>
					</div>

					<hr>
					<div class="row">
						<div class=" col-sm-3 mr-4">
							<a href="index.php?RC=14" class="btn bg-gradient-danger btn-block text-white">Çıkış Yap</a>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}else{
	header("Location:index.php?RC=0");
	exit();
}
?>