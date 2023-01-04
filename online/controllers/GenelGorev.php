<?php

class GenelGorev extends Controller  {
	
	
	function __construct() {
		parent::__construct();
		
	$this->Modelyukle('GenelGorev');

	
	}

	function YorumFormKontrol()
	{

		$ad = $this->form->get("ad")->bosmu();
		$yorum = $this->form->get("yorum")->bosmu();
		$urunid = $this->form->get("urunid")->bosmu();
		$tarih = date("d-m-Y");



		if (!empty($this->form->error)):

		echo $this->bilgi->uyari("danger", "Lütfen boş alan bırakmayınız");
	
		else:



			$sonuc = $this->model->YorumEkleme(
				"yorumlar",
				array( "urunid", "ad", "Icerik" , "tarih"),
				array( $urunid, $ad, $yorum ,$tarih)
			);

			if ($sonuc == 1):

				/*
				$this->view->goster(
				"sayfalar/uyeol",
				array("bilgi" => $this->bilgi->uyari("success", "KAYIT BAŞARILI"))
				);
				*/
			echo $this->bilgi->uyari("success", "KAYIT BAŞARILI" , 'id="ok"');
				
				
			else:
			
			
				echo $this->bilgi->uyari("danger", "Hata oluştu.");

			endif;

		endif;


	}//YORUM KONTROL
	

	
}




?>