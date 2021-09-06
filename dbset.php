<?php 
$host="localhost";
$dbdriver="mysqli";

	$user="";
	$password="";
	$database="";
switch ($_SERVER['SERVER_NAME']){
    case 'localhost':
		$user="root";
		$password="";
		$database="lara_apj";
        break;
    case 'testing':
        $user="root";
		$password="";
		$database="ca";
        break;
    default:
        $user="u141583395_caexams";
		$password="caexams@123";
		$database="u141583395_caexams";
        break;
}

/*$user="u241772466_ca";
$password="ca@123";
$database="u241772466_ca";*/
$server=TRUE;
if(!$server){
//echo "You Cant Login With Us";
	redirect('404_override');
}