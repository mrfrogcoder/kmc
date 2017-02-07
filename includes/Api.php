<?php
function MyCheckDate( $date ) {
   if ( preg_match('/^(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])-[0-9]{4}$/', $date) ) {
     list($month,$day,$year) = explode('-',$date);
      return checkdate($month , $day , $year);
   } else {
      return false;
   }
} 
 

$res = [];
	if(isset($_POST['name']) && isset($_POST['birthday'])){
		$name = $_POST['name']; 
		$birthday = $_POST['birthday']; 
		if("" == trim($_POST['name'])  || "" == trim($_POST['birthday'])){
			
		   
			$res = array( 'result' => array("error" => 1,"message" => "All form fields are required." ) );	
		}else{
			
			if (!ctype_alpha(str_replace(' ', '', $name))) {
				$res = array( 'result' => array("error" => 1,"message" => "Fields should be alphanumeric for the name." ) );	
			}
			if(!MyCheckDate($birthday)){
		
				$res = array( 'result' => array("error" => 1,"message" => "Invalid date format. " ));
			
			}
			
			/*$myfile = fopen("php_test.txt", "a") or die("Unable to open file!");
			$data = "$name | $birthday ".PHP_EOL;
			fwrite($myfile, $data);
			fclose($myfile);
			
			$res = array( 'result' => array("error" => 0,"message" => "Successful" ) );	*/
		}
	}
	
	header('Content-type: application/json');
	exit(json_encode($res));
?>