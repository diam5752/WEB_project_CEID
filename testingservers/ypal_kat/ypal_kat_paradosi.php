
 <?php
   include('ypal_kat_session.php');
?>
<html>
<head>
  <?php include('ypal_kat_menu.php'); ?>
<title>Παράδωση αποστολής</title>
<script> 
	document.getElementById("home").removeAttribute("class");
	document.getElementById("ypal_kat_new").removeAttribute("class");
	document.getElementById("ypal_kat_parak").removeAttribute("class");
	document.getElementById("ypal_kat_paradosi").setAttribute("class","active");
</script>

	
<div class="container">  
 
	<br />  
	<div class="table-responsive">  
		<h1 align="center">  <b> Παράδοση νέας αποστολής </b> </h1><br />  
		 <div id="live_data"></div>                 
	</div>  
</div>  
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"delete_menu_ypal_kat.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
	
		   var id = $(this).parent().siblings('.tracking').text();
	
	 window.location.href = "ypal_kat_php_delete.php?id=" + id; 
	 
      });
	 
 });  
 </script>
 
</body>
</html>