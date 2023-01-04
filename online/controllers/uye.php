<?php

class uye extends Controller  {
	
	
	function __construct() {
		parent::__construct();
		
	$this->Modelyukle('uye');
	Session::init();
	
	}	
	

	
	function giris() {
		
	
	$this->view->goster("sayfalar/giris");
		
	}
	
	function hesapOlustur() {
		
	
	$this->view->goster("sayfalar/uyeol");
		
	}
	
	
	
	function kayitkontrol() {
		
	$ad=$this->form->get("ad")->bosmu();
	$soyad=$this->form->get("soyad")->bosmu();
	$mail=$this->form->get("mail")->bosmu();
	$sifre=$this->form->get("sifre")->bosmu();
	$sifretekrar=$this->form->get("sifretekrar")->bosmu();
	$telefon=$this->form->get("telefon")->bosmu();	
	$this->form->GercektenMailmi($mail);	
	$sifre=$this->form->SifreTekrar($sifre,$sifretekrar);
	

	
	if (!empty($this->form->error)) :
	

	$this->view->goster("sayfalar/uyeol",
	array("hata" => $this->form->error));
	
	
	else:
	

	
	$sonuc=$this->model->UyeKayit("uye_panel",
	array("ad","soyad","mail","sifre","telefon"),
	array($ad,$soyad,$mail,$sifre,$telefon));
	
		if ($sonuc==1):
	
	
		$this->view->goster("sayfalar/uyeol",
		array("bilgi" =>$this->bilgi->uyari("success","KAYIT BAŞARILI")));
		
		
		
		else:
		
		$this->view->goster("sayfalar/uyeol",
		array("bilgi" => 
		$this->bilgi->uyari("danger","Kayıt esnasında hata oluştu")));
		
		
		
		
		endif;
	
	endif;
	
	
	
		
	} // KAYIT KONTROL
	
	
	
	function cikis() {
			
			Session::destroy();			
			$this->bilgi->direktYonlen("/market");
		
	} // ÇIKIŞ
	
	
	function giriskontrol() {
		
	$ad=$this->form->get("ad")->bosmu();
	$sifre=$this->form->get("sifre")->bosmu();
	
	
	if (!empty($this->form->error)) :
	// bir hata var demektir.

	$this->view->goster("sayfalar/giris",
	array("bilgi" => $this->bilgi->uyari("danger","Ad ve şifre boş olamaz")));
	
	
	else:
	
	//** burada gelen verileri db ye sorucaz
	
	$sonuc=$this->model->GirisKontrol("uye_panel","ad='$ad' and sifre='$sifre'");
	
		if ($sonuc==1):
		//** kullanıc paneline girecek yükleme OTURUM BAŞLICAK
		
		
		// OLACAK OLAN BU $this->bilgi->basarili("Giriş Başarılı","/uye/panel");
		 $this->bilgi->direktYonlen("/market");
		
		
		
		else:
		
		$this->view->goster("sayfalar/giris",
		array("bilgi" => 
		$this->bilgi->uyari("danger","Kullanıcı adı veya şifresi hatalıdır")));
		
		
		
		
		endif;
	
	endif;
	
	
	
		
	} // GİRİŞ KONTROL
	
	
	
	
	
	
	

	

	
}




?>