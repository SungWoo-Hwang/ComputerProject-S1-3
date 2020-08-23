<?
include "../../common.php";
include $admin_path."/admin.common.php";


$img_path = $home_data_path.'/store/';
$table_name = $TBA['MEM_TABLE'];


$sql = "
update ".$table_name." set
	blacklist_comment='".$_POST['comment']."'
where idx='".$_POST['bidx']."'
";
mysql_query($sql);


alert("수정 되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page);



?>