<?php

$filename = "php_test.txt";


if (file_exists($filename)) {
$members = file($filename);
$dom = new DOMDocument;

$data = $dom->createElement('community');

$dom->appendChild($data);

foreach($members as $member) {
 list($fname, $bday) = explode("|", $member);

  $fname = $dom->createTextNode(trim($fname));
  $bday = $dom->createTextNode(trim($bday));
  
  $memberElement = $dom->createElement('member');
  $nameElement = $dom->createElement('name');
  $birthdayElement = $dom->createElement('birthday');
  
  $memberElement->appendChild($nameElement);
	 $nameElement->appendChild( $fname);
	  
	   $memberElement->appendChild($birthdayElement);
		 $birthdayElement->appendChild( $bday);
  $data->appendChild($memberElement);

}


file_put_contents('php_test.xml', $dom->saveXML());


header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="php_test.xml"');

echo $dom->saveXML();
exit();
} else {
    
	
	



header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="php_test.xml"');

echo "The file $filename does not exist. Please complete the following fields.";
exit();
}


?>