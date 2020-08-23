<?
include "../../common.php";


$m_keyindex = $_REQUEST['m_keyindex'];
$name = $_REQUEST['name'];
$price = $_REQUEST['price'];



$ex_name = explode(",", $name);
$ex_price = explode(",", $price);
for($d = 0; $d < count($ex_name); $d++){
	$sql = "
	insert into keepermenu_tb set
		M_KEYINDEX='".$m_keyindex."',
		NAME='".$ex_name[$d]."',
		PRICE='".$ex_price[$d]."'
";
mysql_query($sql);
}




api_error('000','ok', ""); //Á¤»ó

/*
http://snap50.cafe24.com/FoodTruck/web/api/member/register.php?name=È«±æµ¿&phone=01027065914&memberid=snap40&memberemail=snap0425@gmail.com&memberpw=rbdyd3174&shopkeeper=Y

*/

?>
