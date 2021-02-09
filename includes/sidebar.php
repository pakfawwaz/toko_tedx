<div class="row">
	<div class="box box-solid util-black-100">
	  	<div class="box-header with-border ">
	    	<h3 class="box-title util-text-white"><b>Most Viewed Today</b></h3>
	  	</div>
	  	<div class="box-body">
	  		<ul id="trending">
	  		<?php
	  			$now = date('Y-m-d');
	  			$conn = $pdo->open();

	  			$stmt = $conn->prepare("SELECT * FROM products WHERE date_view=:now ORDER BY counter DESC LIMIT 10");
	  			$stmt->execute(['now'=>$now]);
	  			foreach($stmt as $row){
	  				echo "<li class='util-text-white'><a class='util-text-white' href='product.php?product=".$row['slug']."'>".$row['name']."</a></li>";
	  			}

	  			$pdo->close();
	  		?>
	    	<ul>
	  	</div>
	</div>
</div>

<div class="row">
	<div class="box box-solid util-black-100 util-text-white">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b class="util-text-white">Become a Subscriber</b></h3>
	  	</div>
	  	<div class="box-body">
	    	<p>Get free updates on the latest products and discounts, straight to your inbox.</p>
	    	<form method="POST" action="">
		    	<div class="input-group">
	                <input type="text" class="form-control">
	                <span class="input-group-btn">
	                    <button type="button" class="btn btn-info btn-flat"><i class="fa fa-envelope"></i> </button>
	                </span>
	            </div>
		    </form>
	  	</div>
	</div>
</div>

<div class="row">
	<div class='box box-solid util-black-100'>
	  	<div class='box-header with-border'>
	    	<h3 class='box-title'><b class="util-text-white">Follow us on Social Media</b></h3>
	  	</div>
	  	<div class='box-body'>
	    	<a href="https://www.instagram.com/tedxits/" class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
            <a href="https://www.linkedin.com/company/tedxits/" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
	  	</div>
	</div>
</div>
