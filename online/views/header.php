<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php $ayarlar= new Ayarlar();  ?>
<!DOCTYPE html>
<html>
<head>


<link href="<?php echo URL; ?>/views/design/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo URL; ?>/views/design/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="<?php echo URL; ?>/views/design/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo URL; ?>/views/design/css/component.css" rel='stylesheet' type='text/css' />


<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />




<title><?php echo $ayarlar->title; ?></title>

<script>

$(document).ready(function(e){
	$("#FormAnasi").hide();
	$("#yorumEkle").click(function(e){
		

		$("#FormAnasi").slideToggle();

	});

	$("#yorumGonder").click(function(e){
		$.ajax({
			type:"POST",
			url:'<?php echo URL ?>/GenelGorev/YorumFormKontrol',
			data:$('#yorumForm').serialize(),
			success: function(donen_veri){	
				$('#yorumForm').trigger("reset");
				$('#FormSonuc').html(donen_veri);
				if ($('#ok').html() == "KAYIT BAŞARILI") {
					$("#FormAnasi").fadeOut();

					
				}
				
			},

		});
	});

		$("[type='number']").keypress(function(evt){
			evt.preventDefault();
		});



});

	</script>


  <meta name="description" content="<?php  echo $ayarlar->sayfaAciklama;  ?> " />
  <meta name="keywords" content="<?php echo $ayarlar->anahtarKelime; ?> " />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<!-- for bootstrap working -->
	<script type="text/javascript" src="<?php echo URL; ?>/views/design/js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- cart -->
	<script src="<?php echo URL; ?>/views/design/js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" href="<?php echo URL; ?>/views/design/css/flexslider.css" type="text/css" media="screen" />
</head>
<body>
	<!-- header-section-starts -->
	<div class="header">
		<div class="header-top-strip">
			<div class="container">
				<div class="header-top-left">
					<ul>
                    
                    <?php
					
					
			if (Session::get("kulad")==true) : ?>
			
            <a href="<?php echo URL; ?>/uye/cikis">ÇIKIŞ YAP</a>
            
            <?php else: ?>
            
            
            <li><a href="<?php echo URL; ?>/uye/giris"><span class="glyphicon glyphicon-user"> </span>Giriş </a></li>
						<li><a href="<?php echo URL; ?>/uye/hesapOlustur"><span class="glyphicon glyphicon-lock"> </span>Hesap Oluştur</a></li>	
			
            
			
			<?php
			endif;
					
					
					?>
                    
								
					</ul>
				</div>
				<div class="header-right">
						<div class="cart box_1">
						<a href="">
							</a>
							<p><a href="javascript:;" class="simpleCart_empty">Sepet Boş</a></p>
							<div class="clearfix"> </div>
						</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- header-section-ends -->
			<div class="banner-top">
		<div class="container">
				<nav class="navbar navbar-default" role="navigation">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
           
				<div class="logo">
					<h1><a href="<?php echo URL; ?>"><span>E</span> -Ticaret</a></h1>
				</div>
	    </div>
	    <!--/.navbar-header-->
	
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	        <ul class="nav navbar-nav">



			<li><a href="index.html">Anasayfa</a></li>
			
			<?php $ayarlar->LinkleriGetir();?>
			
				






					<li><a href="contact.html">İletişim</a></li>
	        </ul>
	    </div>
	    <!--/.navbar-collapse-->
	</nav>
	<!--/.navbar-->
</div>
	</div>
		</div>