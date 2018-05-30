<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	tr:hover td{
		background-color: #e0e0d1;
	}
	
	th{
		background-color: #C2C2A3;
	}
	
	
	td{
		background-color: #F7F7F7;
	}
	.logo {
		 margin-top: -15px;
		  margin-left: auto;
		  width:48px;
		  hight:auto;
	}
	.logo:hover{
		 opacity: 0.5;
    	 filter: alpha(opacity=50);
		 transition: all 500ms ease;
	}
	 
	#LogoCenter {
		width:60%;
		height:auto;
    	display: block;
    	margin: 0 auto;
}
	
</style>
</head>
<body>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     <a class="navbar-brand" href="ypal_kat_arxiki.php" > <img class="logo" src="../logo_white.png"  >  </a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li id = "home"  class="active"><a href="ypal_kat_welcome.php">Home</a></li>        
		  <li id = "ypal_kat_new"><a href="ypal_kat_new.php">Δημιουργία νέας αποστολής</a></li>
        <li id = "ypal_kat_parak"><a href="ypal_kat_parak.php">Παρακολούθηση αποστολής</a></li>
        <li id = "ypal_kat_paradosi"><a href="ypal_kat_paradosi.php">Παράδοση δέματος στον πελάτη</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li id = "ypal_trans"><a href = "ypal_kat_logout.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
      </ul>
    </div>
  </div>
</nav>

