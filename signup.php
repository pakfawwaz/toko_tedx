<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }



?>
<?php include 'includes/header.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
<body class="hold-transition register-page util-gray-100">
<div class="register-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="register-box-body util-red-100">
    	<p class="login-box-msg util-text-white">Register a new membership</p>

    	<form action="register.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          
          
          <hr>
          
      		<div class="row">
      		    <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                
            </div>
            <div class="col-md-12 text-center">
                <br/>
                
            </div>
            <div>
            <div class="util-black-100 util-text-white" style="border:none" id="results">Your captured image will appear here...</div>
            </div>
            
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="signup"><i class="fa fa-pencil" ></i> Sign Up</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a class="util-text-white" href="login.php">I already have a membership</a><br>
      <a class="util-text-white" href="index.php"><i class="fa fa-home"></i> Home</a>
  	</div>
  	<div class="container">
    
   
    
</div>
<script language="JavaScript">
    Webcam.set({
        width: 300,
        height: 250,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>