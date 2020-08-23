<?
include "../../common.php";
include $admin_path."/admin.common.php";

/*
echo "<pre>";
print_r($_POST);
echo "<pre>";
exit;
*/


$table_name = $TBA['MNG_TABLE'];
if($w == ""){


	$sql = "
	insert into ".$table_name." set
		signdate='".mktime()."',
		signdate_datetime='".date('Y-m-d H:i:s')."',
		mng_name='".$_POST['mng_name']."',
		store_code='".$_POST['store_code']."',
		mb_pw='".$_POST['mb_pw']."',
		mng_phone='".$_POST['mng_phone']."'
	";
	mysql_query($sql);

	//exit;

	alert("등록되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}

if($w == "u"){

	$row = sql_fetch("select * from ".$table_name." where idx='".$_POST['uidx']."' order by idx desc");

	$sql = "
	update ".$table_name." set
		mng_name='".$_POST['mng_name']."',
		mb_pw='".$_POST['mb_pw']."',
		mng_phone='".$_POST['mng_phone']."'
	where idx='".$_POST['uidx']."'
	";
	mysql_query($sql);
	alert("수정되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."&pt=".$_POST['pt']."&vidx=".$_POST['uidx']."&w=u");
}


if($w == "d"){
	$row = sql_fetch("select * from ".$table_name." where idx='".$_GET['didx']."' order by idx desc");

	$sql = "delete from ".$table_name." where idx='".$_GET['didx']."'";
	mysql_query($sql);

	alert("삭제되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}
?>