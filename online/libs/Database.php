<?php

class Database extends PDO {


	protected $dizi=array();
	protected $dizi2=array();
	
	
	function __construct() {
			
parent::__construct('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8',DB_USER,DB_PASS);
	
		$this->bilgi= new Bilgi();
		
	}
	
	
	function Ekle($tabloisim,$sutunadlari,$veriler) {		
		
		$sutunsayi=count($sutunadlari);	
		for ($i=0; $i<$sutunsayi; $i++) :		
		$this->dizi[]='?';
		endfor;
		
		$sonVal=join (",",$this->dizi);					
		$sonhal=join (",",$sutunadlari);		
		
		$sorgu=$this->prepare('insert into '.$tabloisim.' ('.$sonhal.') 	
		VALUES('.$sonVal.')'); 
		
		
		if ($sorgu->execute($veriler)) : 
		return 1;	
		//return $this->bilgi->basarili("EKLEME BAŞARILI","/uye/kayitekle");	
		else:		
		return 0;	
		
		endif;
		
		
	} // ekleme 
	
	function listele($tabloisim,$kosul=false) {
		
		
		if ($kosul==false) :
		
		$sorgum="select * from ".$tabloisim;
		
		else:
		
		$sorgum="select * from ".$tabloisim." ".$kosul;
												
		endif;
		
		$son=$this->prepare($sorgum);
		$son->execute();
		
		return $son->fetchAll();
		
		
	} // listeleme
	
	function sil($tabloisim,$kosul) {
		
		$sorgum=$this->prepare("delete from ".$tabloisim. ' where '.$kosul);
		
		if ($sorgum->execute()) :
		
		return $this->bilgi->basarili("SİLME BAŞARILI","/kayit/listele");	
		else:		
		return $this->bilgi->hata("VERİ TABANI HATASI","/kayit/listele");		
		
		endif;
		
	} // silme	
	
	function guncelle($tabloisim,$sutunlar,$veriler,$kosul) {
		
		
		foreach ($sutunlar as $deger) :
		
		$this->dizi2[]=$deger."=?";
		
		endforeach;
		
		$sonSutunlar=join (",",$this->dizi2);			
		
		
		
	$sorgum=$this->prepare("update ".$tabloisim." set ".$sonSutunlar." where ".$kosul);	
		

	if ($sorgum->execute($veriler)) :
		
		return $this->bilgi->basarili("GÜNCELLEME BAŞARILI","/kayit/listele");	
		else:		
		return $this->bilgi->hata("VERİ TABANI HATASI","/kayit/listele");		
		
		endif;


		
	} // güncelleme	
	
	function arama($tabloisim,$kosul) {
		
		
		$sorgum="select * from ".$tabloisim." where ".$kosul;							
		
		
		$son=$this->prepare($sorgum);
		$son->execute();
		
		return $son->fetchAll();
				
		
		
	} // arama		
	
	function giriskontrol($tabloisim,$kosul) {
		
		
		$sorgum="select * from ".$tabloisim." where ".$kosul;
		$son=$this->prepare($sorgum);
		$son->execute();
		
		if ($son->rowCount()>0) :
		
			Session::init();
			Session::set("kulad",true);		
		
		
		endif;
		
		return $son->rowCount(); 
		
	
				
		
		
	} // giriş kontrol
	
	
	
	

	
}




?>