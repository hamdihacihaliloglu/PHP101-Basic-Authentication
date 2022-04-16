<main>
	<div class="container">
        <div class="row justify-content-center">           
             <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row  justify-content-center align-items-center">                      
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hesap Oluştur!</h1>
                                    </div>
									<!--FORM BAŞLANGIÇ-->
                                    <form class="user" action="index.php?RC=5" method="post">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user"  name="Ad" 
                                                    placeholder="Adınız">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"  name="Soyad" 
                                                    placeholder="Soyadınız">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"  name="EmailAdresi" 
                                                placeholder="Email Addresiniz"> 
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user" name="Sifre" placeholder="Şifre">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user" name="SifreTekrar" placeholder="Şifre Tekrar">
                                            </div>
                                        </div>
                                        <input type="submit" class="btn bg-gradient-primary text-white btn-user btn-block" value="Üye Ol"> 
                                    </form>
									<!--*****FORM BİTİŞ*****-->
                                    <hr>
                                   
                                    <div class="text-center">
                                        <a class="small" href="index.php?RC=0">Zaten bir hesabınız var mı?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>	
</main>
