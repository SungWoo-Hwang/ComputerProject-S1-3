<?
include "../../common.php";
include $admin_path."/admin.common.php";


$sql = "update ".$TBA['CONFIG_TABLE']." set ".$_POST['agree_name']."='".$_POST['w_comment']."'";
mysql_query($sql);

alert("저장(수정)되었습니다.", $ic_page_url."=set&ic_sub_page=set01&pt=".$_POST['pt']);

?>
