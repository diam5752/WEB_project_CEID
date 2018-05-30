<?php  
 $connect = mysqli_connect("localhost", "root", "", "project");  
 $output = '';  
  mysqli_set_charset($connect,'utf8');
 $sql = "SELECT * FROM ypal_trans ";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>   
                     <th width="auto">Username</th>  
                     <th width="auto">Password</th>  
					 <th width="auto">Transit Hub</th>  
                     <th width="5%">Action</th>  
                </tr>';  

      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td class="username" data-id1="'.$row["TRANS_USERNAME"].'" contenteditable>'.$row["TRANS_USERNAME"].'</td>  
                     <td class="password" data-id2="'.$row["TRANS_USERNAME"].'" contenteditable>'.$row["TRANS_PASSWORD"].'</td>
					 <td class="trans" data-id3="'.$row["TRANS_USERNAME"].'" contenteditable>'.$row["TRANS_NAME"].'</td> 
                     <td align="center"><button type="button" name="delete_btn" data-id4="'.$row["TRANS_USERNAME"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td id="username" contenteditable></td>  
                <td id="password" contenteditable></td> 
				<td id="trans" contenteditable></td>  
                <td align="center"><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>