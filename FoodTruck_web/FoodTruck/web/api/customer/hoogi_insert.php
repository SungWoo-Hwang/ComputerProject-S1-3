<?
include "../../common.php";
$m_keyindex = $_REQUEST['m_keyindex'];
$k_keyindex = $_REQUEST['k_keyindex'];
$review = $_REQUEST['review'];
$dateTime = date("Y-m-d A H:i",time());



$sql = "
		insert into review_tb set
			M_KEYINDEX= '".$m_keyindex."',
			K_KEYINDEX='".$k_keyindex."',
			REVIEW='".$review."',
			DATE='".$dateTime."'
	";
mysql_query($sql);
	


api_error('000','ok', ""); //¡§ªÛ

/*
http://wnsti661.cafe24.com/Introduce/web/api/request/insert_request.php?request_id=1&ea=1000
*/

?>
