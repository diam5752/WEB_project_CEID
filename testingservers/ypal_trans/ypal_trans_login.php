<?php
   include("Config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
	  mysqli_set_charset($db,'utf8');
      $sql = "SELECT TRANS_USERNAME FROM ypal_trans WHERE TRANS_USERNAME = '$myusername' and TRANS_PASSWORD = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        // session_register("myusername");
		   
         $_SESSION['login_user'] = $myusername;
		 header("location: ypal_trans_welcome.php");
         
        
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>


<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<style>
	.center {
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: auto;
  height: 50%;
}
 #logoB {
    display: block;
    margin: 0 auto;
}
	</style>

</head>
<body style="background-color: #30373B">
<img id="logoB" class="logo" src="../logo_white.png"  > 
<div class="center">
<div class="container">
	<h1 align="center"> <font color=#F0F0F0 ><b>Είσοδος Υπαλλήλου Transit Hub</b></font></h1>
  <br>
  <form class="form-horizontal" method="post" >
    <div class="form-group">
      <label class="control-label col-sm-2" for="username"><font color=#F0F0F0 size=4><b>Username:</b></font></label>
      <div class="col-sm-10">
    	<input type="text" class="form-control" id="username" name="username" placeholder="Εισάγετε username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password"><font color=#F0F0F0 size=4 ><b>Password:</b></font></label>
      <div class="col-sm-10">          
      <input type="password" class="form-control" id="password" name="password" placeholder="Εισάγετε password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" name="submit" class="btn btn-lg">Είσοδος</button>
      </div>
    </div>
  </form>
  <div align="right">
  	<button type="button" class="btn btn-primary btn-danger" id="homepage">Επιστροφή στην αρχική σελίδα</button>
  </div>
</div>
	</div>
	   </body>
</html>

<script type="text/javascript">
    document.getElementById("homepage").onclick = function () {
        location.href = "../index.php";
    };
</script>