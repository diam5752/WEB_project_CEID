<?php 
	include("pelatis_menu.php"); 
	include("createXML_katast_poli.php")
?>
 <script> 
	document.getElementById("home").removeAttribute("class");
	//document.getElementById("").removeAttribute("class");
	//document.getElementById("").removeAttribute("class");
	document.getElementById("search").setAttribute("class","active"); 
	 </script>
	 
<!DOCTYPE html>
<html>


<body >
<div class="container">
  <h2 align="center">Αναζήτηση Καταστήματος</h2>
  <form id="searchForm" class="form-horizontal" method="get" >
         <br><br>
     <div class="form-group">
      <label class="control-label col-sm-2" for="username">Ταχυδρομικός Κώδικας:</label>
      <div class="col-sm-10">
    	<input type="text" class="form-control" id="username" name="username" placeholder="Εισάγετε ταχυδρομικό κώδικα">
      </div>
    </div>
    
     
     <div class="container">
  <div align="right">
<button  type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="submit"  >Αναζήτηση</button>
</div>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content"  >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center ">Πληροφορίες</h4>
        </div>
        <div class="modal-body">
          <p id="demo" ></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Κλείσιμο</button>
        </div>
      </div>
    </div>
  </div>
</div>
         <br><br>
   
     <div class="form-group">
      <label class="control-label col-sm-2" for="password">Πόλη:</label>
      <div class="col-sm-10">          
       <input type="text" class="form-control" id="password" name="password" placeholder="Εισάγετε Πόλη">
  </div>
	  </div>
     
       <div class="container">
  <div align="right">
 <button  type="button" class=" btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2" id="submit2" >Αναζήτηση</button>
</div>

  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content"  >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Πληροφορίες</h4>
        </div>
        <div class="modal-body">
          <p id="demo2" ></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Κλείσιμο</button>
        </div>
      </div>
    </div>
  </div>
</div>
  </form>    

 <script>
	 $(document).ready(function() {
		
		$("#submit").click(function(){
			var a = document.getElementById('username').value;
	 		$.ajax( {  
                url:"test.php",  
                method:"POST",  
                data:{ a:a },
		 		success:function(data){
			 	if( data == "" ){
					 data = " Δεν βρέθηκε κατάστημα με τον ταχυδρομικό κώδικα που ζητήσατε. "; 
					 }
					 else{	 
					 }
					 document.getElementById("demo").innerHTML = data ;
				} 
	 });
	});	
	});   
	</script>

 <script>
	 $(document).ready(function() {
		
		$("#submit2").click(function(){
			var a = document.getElementById('password').value;
	 		$.ajax( {  
                url:"test2.php",  
                method:"POST",  
                data:{ a:a },
		 		success:function(data){ 
			 		if( data == ""){
						data = " Δεν βρέθηκε κατάστημα στην πόλη που ζητήσατε. ";
			 		}
			 		else{
						//alert(data); 
			 		}
			 		document.getElementById("demo2").innerHTML = data ;
                } 
	 });
	});	
	});   
	</script>
	
	<script>//autocomplete
	$(document).ready(function() {
		var myArr = [];
	
		$.ajax({
			type: "GET",
			url: "katasthmata.xml",
			dataType: "xml",
			success: parseXml,
			complete: setupAC,
			failure: function(data) {
				alert("Δεν βρέθηκε το XML");
				}
		});
	
		function parseXml(xml)
		{
			//find every query value
			$(xml).find("katasthmata").each(function()
			{
				myArr.push($(this).attr("POLI"));
			});	
		}
		
		function setupAC() {
			$("input#password").autocomplete({
					source: myArr,
					minLength: 1,
					select: function(event, ui) {
						$("#password").val(ui.item.value);
						$("#submit2").trigger("click");
					}
			});
		}
	});
</script>

</body>
</html>




