 <?php  

 $connect = mysqli_connect("localhost", "root", "", "project");  
 $output = '';  
  mysqli_set_charset($connect,'utf8');
 $sql = "SELECT * FROM ypal_kat ";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" >  
                <tr >   
                     <th  width="auto" style="background-color:#c2c2a3" width="45%">Username</th>  
                     <th  width="auto" style="background-color:#c2c2a3" width="45%">Password</th>  
					 <th  width="auto" style="background-color:#c2c2a3" width="45%">Τηλ Καταστήματος</th>
                     <th  width="5%" style="background-color:#c2c2a3" width="10%">Action</th>  
                </tr>';  
  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td  width="auto" style="border-color:#c2c2a3" class="username" data-id1="'.$row["KAT_USERNAME"].'" contenteditable>'.$row["KAT_USERNAME"].'</td>  
                     <td  width="auto" style="border-color:#c2c2a3 " class="password" data-id2="'.$row["KAT_USERNAME"].'" contenteditable>'.$row["KAT_PASSWORD"].'</td>
					 <td  width="auto" style="border-color:#c2c2a3 " class="kat" data-id3="'.$row["KAT_USERNAME"].'" contenteditable>'.$row["KAT_TIL"].'</td>
                     <td  width="auto" style="border-color:#c2c2a3" align = "center"><button type="button" name="delete_btn" data-id4="'.$row["KAT_USERNAME"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td  width="auto" style="border-color:#c2c2a3" id="username" contenteditable></td>  
                <td  width="auto" style="border-color:#c2c2a3" id="password" contenteditable></td>  
				<td  width="auto" style="border-color:#c2c2a3" id="kat" contenteditable></td>
                <td  width="auto" style="border-color:#c2c2a3" align = "center"><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  

 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>