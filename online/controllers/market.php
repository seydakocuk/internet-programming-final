<?php

class market extends Controller  {
	
	
	function __construct() {
		parent::__construct();
		
		
	Session::init();	
	
	$this->Modelyukle('market');

	$this->view->goster("sayfalar/index",
	array(
	"data1" => $this->model->anasayfaUrunler("urunler","where durum=0 order by id desc"),	
	"data2" => $this->model->anasayfaUrunler("urunler","where durum=1 order by id desc")
	
	));
	
	
		
	}	
	
	
	
	
	
	

	

	
}




?>