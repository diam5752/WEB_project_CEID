<?php 

    include('/phpqrcode/qrlib.php'); 
    //include('config.php'); 

    // how to save PNG codes to server 
     
    $tempDir = getcwd(); 
    $codeContents = $tracking; 
     
    // we need to generate filename somehow,  
    // with md5 or with database ID used to obtains $codeContents... 
    //$fileName = $codeContents.'.png'; 
    
	//if (!is_dir('for_database')) {
  	//		mkdir('for_database');
	//	  	}
    $pngAbsoluteFilePath = $tempDir."\\for_database.png"; 
    //$urlRelativeFilePath = $tempDir."\\".$fileName; 
     
    // generating 
    //if (!file_exists($pngAbsoluteFilePath)) { 
        QRcode::png($codeContents, $pngAbsoluteFilePath); 
        //echo 'File generated!'; 
        //echo '<hr />'; 
		$file = fopen($pngAbsoluteFilePath, "rb");
		$image = fread($file, filesize($pngAbsoluteFilePath));
		fclose($file);
		$img = base64_encode($image);
    //} else { 
        //echo 'File already generated! We can use this cached file to speed up site on common codes!'; 
        //echo '<hr />'; 
    //} 
     
    //echo 'Server PNG File: '.$pngAbsoluteFilePath; 
    //echo '<hr />'; 
     
    // displaying 
    //echo '<img src="'.$urlRelativeFilePath.'" />';

?>