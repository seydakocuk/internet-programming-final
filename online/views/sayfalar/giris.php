<?php require 'views/header.php'; ?>


  <div class="content">
	<div class="container">
		<div class="login-page">
			    <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="<?php echo URL; ?>" title="Anasayfa">Anasayfa</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Giriş
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="<?php echo URL; ?>">Geri Dön</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="account_grid">
			   <div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 <h2>HEMEN ÜYE OL</h2>
				 <p>Yeni üye olarak, avantajları yakalayabilirisin.</p>
				 <a class="acount-btn" href="<?php echo URL; ?>/uye/hesapOlustur">ÜYE OL</a>
			   </div>
			   <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
			  	<h3>ÜYE GİRİŞİ</h3>
				<p>Üye girişi yaparak, siparişlerinizi hızlı ve kolay bir şekilde verebilirsiniz.</p>
				<form action="<?php echo URL; ?>/uye/giriskontrol" method="POST">
				  <div>
					<span>Kullanıcı Adı<label>*</label></span>
					<input type="text" name="ad"> 
				  </div>
				  <div>
					<span>Şifre<label>*</label></span>
					<input type="password" name="sifre"> 
				  </div>
                  <div>
					            <?php
								
								
								
								if (isset($veri["bilgi"])) :
								
								echo $veri["bilgi"];
								
								endif;
				
			   
			   ?>
				  </div> 
                  
            
                  
				  <a class="forgot" href="#">Şifremi Unuttum?</a>
				  <input type="submit" value="GİRİŞ">
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
		   </div>
</div>

<?php require 'views/footer.php'; ?> 		
        
        
        
       