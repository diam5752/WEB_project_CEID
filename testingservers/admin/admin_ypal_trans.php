<!doctype html>
<?php
   include('admin_session.php');
?>
<html>
<head>
<?php include('admin_menu.php') ?>
<script> 
	document.getElementById("home").removeAttribute("class");
	document.getElementById("ypal_kat").removeAttribute("class");
	document.getElementById("katasthmata").removeAttribute("class");
	document.getElementById("ypal_trans").setAttribute("class","active"); 
</script>
<div class="container">  
	<br />  
	<div class="table-responsive">  
		 <h1 align="center" style="color:#111111"> <b>Υπάλληλοι trunsit hub</b></h1><br />   
		 <div id="live_data"></div>                 
	</div>  
</div>  
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select_admin_ypal_trans.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var username = $('#username').text();  
           var password = $('#password').text();
		   var trans = $('#trans').text();
           if(username == '')  
           {  
                alert("Εισάγετε Username");  
                return false;  
           }  
           if(password == '')  
           {  
                alert("Εισάγετε Password");  
                return false;  
           }  
		   if(trans == '')  
           {  
                alert("Εισάγετε Transit");  
                return false;  
           }  
           $.ajax({  
                url:"insert_admin_ypal_trans.php",  
                method:"POST",  
                data:{username:username, password:password, trans:trans},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(old_username, text, column_name)  
      {  
           $.ajax({  
                url:"edit_admin_ypal_trans.php",  
                method:"POST",  
                data:{username:old_username, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
	
                } 
           });  
      }  
      $(document).on('blur', '.username', function(){  
           var old_username = $(this).data("id1");  
           var username = $(this).text();  
           edit_data(old_username, username, "TRANS_USERNAME");  
      });  
      $(document).on('blur', '.password', function(){  
           var old_username = $(this).data("id2");  
           var password = $(this).text();  
           edit_data(old_username,password, "TRANS_PASSWORD");  
      });
	  $(document).on('blur', '.trans', function(){  
           var old_username = $(this).data("id3");  
		   var trans = $(this).text();
           edit_data(old_username,trans, "TRANS_NAME");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var username= $(this).data("id4"); 
           if(confirm("Θέλετε σίγουρα να γίνει η διαγρααφή?"))  
           {  
                $.ajax({  
                     url:"delete_admin_ypal_trans.php",  
                     method:"POST",  
                     data:{username:username},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>
</body>
</html>