<?php
   include('ypal_kat_session.php');
?>
<html>
<head>
  <?php include('ypal_kat_menu.php'); ?>
<title>Δημιουργία νέας αποστολής</title>
<script> 
	document.getElementById("home").removeAttribute("class");
	document.getElementById("ypal_kat_paradosi").removeAttribute("class");
	document.getElementById("ypal_kat_parak").removeAttribute("class");
	document.getElementById("ypal_kat_new").setAttribute("class","active"); 
</script>

<div class="container">  
	<br />  
	<div class="table-responsive">  
		<h1 align="center"> <b> Δημιουργία νέας αποστολής </b> </h1><br />  
		 <div id="live_data"></div>                 
	</div>  
</div>  
 <script>  
	 
 function printImg(address) {
  pwin = window.open(document.getElementById(address.id).src,"_blank");
  pwin.onload = function () {pwin.print();}}
	 
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select_ypal_kat.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
	 
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var tilefono_edw = "<?php echo $tilefwno_here ;?>";
			   /*$('#tilefono_edw').text();*/ 
           var tilefono_ekei = $('#tilefono_ekei').text();
		   if ($('#express').is(":checked")){
			   var express = "True";
		   }
		   else{
			   var express = "False";
		   }
          /* if(tilefono_edw == '')  
           {  
                alert("Εισάγετε τηλέφωνο αρχικού");  
                return false;  
           }  */
		  
           if(tilefono_ekei == '')  
           {  
                alert("Εισάγετε τηλέφωνο τελικού");  
                return false;  
           }  
		   if(tilefono_ekei == tilefono_edw)  
           {  
                alert("Ο αρχικός προορισμός είναι ίδιος με τον τελικό!");  
                return false;  
           }
		   if(tilefono_edw == tilefono_ekei){
			   alert("Ο προορισμός του αρχικού είναι ίδιος με τον τελικό");  
               return false; 
		   }
           $.ajax({  
                url:"insert_ypal_kat.php",  
                method:"POST",  
                data:{express:express, tilefono_edw:tilefono_edw, tilefono_ekei:tilefono_ekei},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
 });  
 </script>
</body>
</html>