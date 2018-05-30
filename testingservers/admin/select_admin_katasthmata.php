<?php  
 $connect = mysqli_connect("localhost", "root", "", "project");  
 $output = '';  
 
 mysqli_set_charset($connect,'utf8');
 $sql = "SELECT * FROM katasthmata ORDER BY TILEFONO DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>    
                     <th width="auto">Όνομα</th>  
                     <th width="auto">Τηλέφωνο</th> 
					  <th width="auto">Όδος</th> 
					  <th width="auto">Αριθμός</th> 
					  <th width="auto">Πόλη</th> 
					  <th width="auto">ΤΚ</th>
					    <th width="auto">Συντεταγμ. X</th> 
						  <th width="auto">Συντεταγμ. Y</th> 
						    <th width="auto">Transit Hub</th> 
                     <th width="5%" >Action</th>  
                </tr>';
  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td class="ONOMA" data-id1="'.$row["TILEFONO"].'" contenteditable>'.$row["ONOMA"].'</td>  
                     <td class="TILEFONO" data-id2="'.$row["TILEFONO"].'" contenteditable>'.$row["TILEFONO"].'</td>  
					 <td class="ODOS" data-id3="'.$row["TILEFONO"].'" contenteditable>'.$row["ODOS"].'</td>  
					 <td class="ARITHMOS" data-id4="'.$row["TILEFONO"].'" contenteditable>'.$row["ARITHMOS"].'</td>  
					 <td class="POLI" data-id5="'.$row["TILEFONO"].'" contenteditable>'.$row["POLI"].'</td> 
					 <td class="TK" data-id6="'.$row["TILEFONO"].'" contenteditable>'.$row["TK"].'</td> 
					 <td class="COORX" data-id7="'.$row["TILEFONO"].'" contenteditable>'.$row["COORX"].'</td> 
				     <td class="COORY" data-id8="'.$row["TILEFONO"].'" contenteditable>'.$row["COORY"].'</td> 
					 <td class="TRANS_ID" data-id9="'.$row["TILEFONO"].'">'.$row["TRANS_ID"].'</td> 
                     <td  align = "center"><button type="button" name="delete_btn" data-id10="'.$row["TILEFONO"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>';  
      }  

      $output .= '  
           <tr>
                <td id="ONOMA" contenteditable></td>  
                <td id="TILEFONO" contenteditable></td>  
				<td id="ODOS" contenteditable></td> 
				<td id="ARITHMOS" contenteditable></td> 
				<td id="POLI" contenteditable></td>
				<td id="TK" contenteditable></td>
				<td id="COORX" contenteditable></td>
				<td id="COORY" contenteditable></td>
				<td id="TRANS_ID" style="background-color:#FFE0D1"></td>
                <td  align = "center"><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>';  

 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>