<?
include "../../common.php";

//$type = $_REQUEST['type'];		//0 : ��ü , 1 : �Ұ���
	
//if($type == "") api_error('001','type �����ϴ�.'); 


$query = "select * from mem_tb ";
//echo $query;
$result = mysql_query($query);
$i = 0;
while($row = @mysql_fetch_assoc($result)){
	$list[$i] = $row;
	$i++;
}

if($i == 0) api_error('002','�����Ͱ� �����ϴ�.'); 



api_error('000','ok', $list); //����


/*
�׽�Ʈ url
http://snap50.cafe24.com/FoodTruck/web/api/customer/sel_map.php
*/
?>