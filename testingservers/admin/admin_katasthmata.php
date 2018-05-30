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
	document.getElementById("ypal_trans").removeAttribute("class");
	document.getElementById("katasthmata").setAttribute("class","active"); 
</script>
           <div class="container">  
                <br />   
                <div class="table-responsive">  
                    <h1 align="center" style="color:#111111"> <b>Καταστήματα</b></h1><br />  
                     <div id="live_data"></div>                 
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select_admin_katasthmata.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var ONOMA = $('#ONOMA').text();  
           var TILEFONO = $('#TILEFONO').text();  
		   var ODOS = $('#ODOS').text();
		   var ARITHMOS = $('#ARITHMOS').text();
		   var POLI = $('#POLI').text();
		   var TK = $('#TK').text();
		   var COORX = $('#COORX').text();
		   var COORY = $('#COORY').text();
		  
           if(ONOMA == '')  
           {  
                alert("Εισάγετε Όνομα");  
                return false;  
           }  
           if(TILEFONO == '')  
           {  
                alert("Εισάγετε Τηλέφωνο");  
                return false;  
           }  
		   if(ODOS == '')  
           {  
                alert("Εισάγετε Οδό");  
                return false;  
           } 
		   if(ARITHMOS == '')  
           {  
                alert("Εισάγετε Αριθμό");  
                return false;  
           }  
		  if(POLI == '')  
           {  
                alert("Εισάγετε Πόλη");  
                return false;  
           } 
		  if(TK == '')  
           {  
                alert("Εισάγετε TK");  
                return false;  
           }
		  if(COORX == '')  
           {  
                alert("Εισάγετε Συντεταγμ. Χ");  
                return false;  
           }
		  if(COORY == '')  
           {  
                alert("Εισάγετε Συντεταγμ. Y");  
                return false;  
           }
		 
           $.ajax( {  
                url:"insert_admin_katasthmata.php",  
                method:"POST",  
                data:{ONOMA:ONOMA, TILEFONO:TILEFONO , ODOS:ODOS , ARITHMOS:ARITHMOS , POLI:POLI , TK:TK , COORX:COORX , COORY:COORY},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }
           })  
      });  
     
	 function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit_admin_katasthmata.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){
					
                 if(data=="Λάθος Δεδομένα"){  
					alert(data);
					    location.reload();}
					//fetch_data();
                } 
				  
           });  
      }  
      $(document).on('blur', '.ONOMA', function(){  
           var id = $(this).data("id1");  
           var ONOMA = $(this).text();  
           edit_data(id,ONOMA, "ONOMA");  
      });  
      $(document).on('blur', '.TILEFONO', function(){  
           var id = $(this).data("id2");  
           var TILEFONO = $(this).text();  
           edit_data(id,TILEFONO, "TILEFONO");  
      });  
	   $(document).on('blur', '.ODOS', function(){  
           var id = $(this).data("id3");  
           var ODOS = $(this).text();  
           edit_data(id,ODOS, "ODOS");  
      });  
	   $(document).on('blur', '.ARITHMOS', function(){  
           var id = $(this).data("id4");  
           var ARITHMOS = $(this).text();  
           edit_data(id,ARITHMOS, "ARITHMOS");  
      });
	 $(document).on('blur', '.POLI', function(){  
           var id = $(this).data("id5");  
           var POLI = $(this).text();  
           edit_data(id,POLI, "POLI");  
      });
      $(document).on('blur', '.TK', function(){  
           var id = $(this).data("id6");  
           var TK = $(this).text();  
           edit_data(id,TK, "TK");  
      });
	  $(document).on('blur', '.COORX', function(){  
           var id = $(this).data("id7");  
           var COORX = $(this).text();  
           edit_data(id,COORX, "COORX");  
      });
	  $(document).on('blur', '.COORY', function(){  
           var id = $(this).data("id8");  
           var COORY = $(this).text();  
           edit_data(id,COORY, "COORY");  
      });
	   $(document).on('blur', '.TRANS_ID', function(){  
           var id = $(this).data("id9");  
           var TRANS_ID = $(this).text();  
           edit_data(id,TRANS_ID, "TRANS_ID");  
      });
	 
	 $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id10");  
           if(confirm("Είστε σίγουροι ότι θέλετε να γίνει η διαγραφή"))  
           {  
                $.ajax({  
                     url:"delete_admin_katasthmata.php",  
                     method:"POST",  
                     data:{id:id},  
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
