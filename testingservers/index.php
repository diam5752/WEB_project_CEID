<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Fast Delivery</title>
<!--<style>
	.btn-radio {
	width: 100%;
}
.img-radio {
	opacity: 0.5;
	margin-bottom: 5px;
}

.space-20 {
    margin-top: 20px;
}
	
	</style>-->
<style>
	
	h1{
		font-size: 350%;
		color: aliceblue;
	}
	p{
		font-size: 160%;
		color: aliceblue;
	}
	.selection{
		bottom: 100px;
		cursor : pointer;
		box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.2), 0 8px 22px 0 rgba(0, 0, 0, 0.19);
		display: block;
    	transition: all .4s ease-in-out;
		transform: scale(0.5);
	}
	
	.selection:hover {
		transform: scale(1);
	}
	
	.center {
  position: relative;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: auto;
  height: 50%;
}
	#logoB {
	position: relative;
    display: block;
    margin: auto;
		align: center;
}
	.responsive{
		width: 150%; 
		left: -20%;
		height: 100%;
		display:block
	}
	
		</style>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#admin').click(function() {
            window.location.href = 'admin/admin_welcome.php';
        });
		
		$('#ypalkat').click(function() {
            window.location.href = 'ypal_kat/ypal_kat_login.php';
        });
		
		$('#ypaltrans').click(function() {
            window.location.href = 'ypal_trans/ypal_trans_login.php';
        });
		
		$('#pelatis').click(function() {
            window.location.href = 'pelatis/pelatis_welcome.php';
        });
    });
</script>
</head>
	
<body style="background-color: #30373B">


<div class="center">
 <div class="container-fluid text-center"> 
 <img id="logoB" src="FastDelivery.png" class="img-responsive hidden-xs "  ></img>  
  <img id="logoB" src="FastDelivery.png" class="responsive visible-xs "  ></img>
	 <br> <br>
    <div class="col-sm-3">
    
      <p>Είμαι διαχειριστής</p>
      <img id="admin" src="admin.png" class="img-responsive img-circle selection" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Είμαι υπάλληλος καταστήματος</p>
      <img id="ypalkat" src="ypalkat.jpg" class="img-responsive img-circle selection" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Είμαι υπάλληλος transit hub</p>
      <img id="ypaltrans" src="ypaltrans.png" class="img-responsive img-circle selection" alt="Image">
    </div>
    <div class="col-sm-3">
      <p>Είμαι πελάτης</p>
      <img id="pelatis" src="pelatis.jpg"  class="img-responsive img-circle selection" alt="Image">
    </div>
</div>
</div>

	</body>


</html>