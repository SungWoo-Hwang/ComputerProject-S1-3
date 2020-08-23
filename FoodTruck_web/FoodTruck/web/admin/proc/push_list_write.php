<?
include "../../common.php";
include $admin_path."/admin.common.php";

$sql = "
insert into ".$TBA['PUST_LIST']." set
	signdate='".mktime()."',
	signdate_datetime='".date('Y-m-d H:i:s')."',
	comment='".$_POST['comment']."'
";
mysql_query($sql);


$query = "select * from ".$TBA['MEM_TABLE']." where push_news='0' order by idx desc";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
	$message = $_POST['comment'];
	push_send($row['token'], $message, 10, $row['device'], $row['idx']);	

}


$query = "select * from ".$TBA['MNG_TABLE']." where push_news='0' order by idx desc";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
	$message = $_POST['comment'];
	push_send($row['token'], $message, 10, $row['device'], $row['idx']);	

}


alert("푸시를 전송하였습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");


?>