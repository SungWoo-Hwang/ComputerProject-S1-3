<?
include "../../common.php";
include $admin_path."/admin.common.php";

$_POST['comment']="Ǫ���׽�Ʈ";
$query = "select * from ".$TBA['MEM_TABLE']." where mb_id='".$mb_id."' order by idx desc";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
	$message = $_POST['comment'];
	push_send($row['token'], $message, 10, $row['device']);	

}



?>