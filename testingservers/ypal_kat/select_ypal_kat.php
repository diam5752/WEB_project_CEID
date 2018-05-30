<?php  
 $connect = mysqli_connect("localhost", "root", "", "project");  
 $output = '';  
mysqli_set_charset($connect,'utf8');
 $sql = "SELECT * FROM apostoles ";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>   
                     <th   width="auto">Χρόνος</th>  
                     <th   width="auto">Κόστος</th>  
                     <th  width="auto">Tracking Number</th>
					 <th   width="auto">Τηλέφωνο αρχικού</th>  
					 <th  width="auto">Τηλέφωνο τελικού</th>
					 <th   width="auto">Express</th> 
					 <th   width="auto">QR</th> 
					 <th  width="auto">Δημιουργία</th>  
                </tr>';   
  if (!is_dir('from_database')) {
  			mkdir('from_database');
		  	}
      while($row = mysqli_fetch_array($result))  
      {  
		  
		  file_put_contents('from_database\\qr_'.$row["TRACKING"].'.png', base64_decode($row["QR"]));
		   $output .= '  
                <tr>  
                     <td class="xronos" data-id1="'.$row["TRACKING"].'" >'.$row["XRONOS"].'</td>  
                     <td class="kostos" data-id2="'.$row["TRACKING"].'" >'.$row["KOSTOS"].'</td>
					 <td class="tracking" data-id3="'.$row["TRACKING"].'" >'.$row["TRACKING"].'</td> 
					 <td class="tilefono_edw" data-id4="'.$row["TRACKING"].'" >'.$row["TILEFONO"].'</td> 
					 <td class="tilefono_ekei" data-id5="'.$row["TRACKING"].'" >'.$row["KAT_TILEFONO"].'</td>
					 <td class="express" data-id6="'.$row["TRACKING"].'" >'.$row["EXPRESS"].'</td>
					 <td class="qr" data-id7="'.$row["TRACKING"].'" ><img id="'.$row["TRACKING"].'" src="from_database\\qr_'.$row["TRACKING"].'.png" onclick="printImg(this)" style="cursor:pointer"></td> 
                </tr>  
           ';  
		  
      }  
      $output .= '  
           <tr>  
                <td id="xronos" style="background-color:#ffe0d1;"></td>  
                <td id="kostos" style="background-color:#ffe0d1;"></td>
				<td id="tracking" style="background-color:#ffe0d1;"></td> 
				<td id="tilefono_edw" style="background-color:#ffe0d1;"></td> 
				<td id="tilefono_ekei" contenteditable></td>
				<td id="exp"><input id="express" type="checkbox" name="express" /></td>
				<td id="qr" style="background-color:#ffe0d1;"></td>  
                <td width=auto align="center"><button type="button" name="btn_add" id="btn_add" class="btn btn-s btn-success">+</button></td>  
           </tr>  
      ';  

 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>