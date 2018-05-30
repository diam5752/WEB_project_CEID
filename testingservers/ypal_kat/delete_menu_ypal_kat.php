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
                     <th width="12.5%">Χρόνος</th>  
                     <th width="12.5%">Κόστος</th>  
                     <th width="12.5%">Tracking Number</th>
					 <th width="12.5%">Τηλέφωνο αρχικού</th>  
					 <th width="12.5%">Τηλέφωνο τελικού</th>
					 <th width="12.5%">Express</th> 
					 <th width="12.5%">QR</th> 
					 <th width="12.5%">Παράδοση</th>  
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
					 <td class="qr" data-id7="'.$row["TRACKING"].'" ><img src="from_database\\qr_'.$row["TRACKING"].'.png"></td> 
					 <td><button type="button" name="btn_add" id="btn_add" class="btn btn-lg btn-success">Παραδόθηκε</button></td>
                </tr>  
           ';  
		  
      }  
     
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>