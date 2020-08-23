<?
include "../../common.php";

$f_keyindex = $_REQUEST['f_keyindex'];
$m_keyindex = $_REQUEST['m_keyindex'];
$n_keyindex = $_REQUEST['n_keyindex'];
$n_keyindex = $_REQUEST['n_keyindex'];
$dateTime = date("Y-m-d A H:i",time());
	
$jbexplode = explode( ',', $n_keyindex );
  	//echo $jbexplode[0];
	foreach( $jbexplode as $key => $value ) {
		//echo "키 : " . $categoryName . ", 값 : " . $value . "<br>";
		
		$sql = "
				insert into order_tb set
					F_KEYINDEX= '".$f_keyindex."',
					M_KEYINDEX='".$m_keyindex."',
					N_KEYINDEX='".$value."',
					DATE='".$dateTime."',
					EA='1'
			";
		mysql_query($sql);
	}





api_error('000','ok', ''); //Á¤»ó


/*
Å×½ºÆ® url
http://snap50.cafe24.com/FoodTruck/web/api/customer/sel_menu.php
*/
?>