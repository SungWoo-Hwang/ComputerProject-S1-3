<?
include "../../common.php";
include $mng_path."/mng.common.php";


$img_path = $home_data_path.'/store/';
$table_name = $TBA['MEM_TABLE'];

/*
echo "<pre>";
print_R($_POST);
echo "</pre>";
exit;
*/

if($w == ""){

}

if($w == "u"){

	$row = sql_fetch("select * from ".$table_name." where idx='".$_POST['uidx']."' order by idx desc");

	$sql = "
	update ".$table_name." set
		mb_memo='".$_POST['mb_memo']."'
	where idx='".$_POST['uidx']."'
	";
	mysql_query($sql);


	alert("수정되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."&pt=".$_POST['pt']."&vidx=".$_POST['uidx']."&w=u");
}



?>