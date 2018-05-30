<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.5">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
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
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="ypal_trans_arxiki.php" > <img class="logo" src="../logo_white.png"  >  </a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li id = "home"  class="active"><a href="ypal_trans_welcome.php">Home</a></li>        
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li id = "ypal_trans"><a href = "ypal_trans_logout.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
      </ul>
    </div>
  </div>
</nav>

   
  
 