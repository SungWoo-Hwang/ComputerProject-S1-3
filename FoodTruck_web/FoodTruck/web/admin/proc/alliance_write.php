<?
include "../../common.php";
include $admin_path."/admin.common.php";


$img_path = $home_data_path.'/alliance/';
$table_name = $TBA['ALLIANCE_TABLE'];
if($w == ""){


	if($_FILES['upload_file']['name']){
		$upload_func_file = file_upload($_FILES['upload_file'], $img_path, $img_upload_ext, "upload_file_".time());
		$upload_file_sql = ", upload_file='".$home_data_url."/alliance/".$upload_func_file[1]."' ";
	}

	$sql = "
	insert into ".$table_name." set
		signdate='".mktime()."',
		signdate_datetime='".date('Y-m-d H:i:s')."',
		mb_id='".$member['mb_id']."',
		wr_subject='".$_POST['wr_subject']."',
		wr_comment='".$_POST['w_comment']."'
		".$upload_file_sql."
	";
	mysql_query($sql);

	//exit;

	alert("등록되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}

if($w == "u"){

	$row = sql_fetch("select * from ".$table_name." where idx='".$_POST['uidx']."' order by idx desc");


	$row['upload_file'] = str_replace($home_data_url."/alliance/","", $row['upload_file']);
	if($_FILES['upload_file']['name']){
		@unlink($img_path.$row['upload_file']);
		$upload_func_file = file_upload($_FILES['upload_file'], $img_path, $img_upload_ext, "upload_file_".time());
		mysql_query(" update ".$table_name." set upload_file='".$home_data_url."/alliance/".$upload_func_file[1]."' where idx='".$_POST['uidx']."' ");
	}


	$sql = "
	update ".$table_name." set
		wr_subject='".$_POST['wr_subject']."',
		wr_comment='".$_POST['w_comment']."'
	where idx='".$_POST['uidx']."'
	";
	mysql_query($sql);
	alert("수정되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."&pt=".$_POST['pt']."&vidx=".$_POST['uidx']."&w=u");
}


if($w == "d"){
	$row = sql_fetch("select * from ".$table_name." where idx='".$_GET['didx']."' order by idx desc");

	$row['upload_file'] = str_replace($home_data_url."/alliance/","", $row['upload_file']);
	@unlink($img_path.$row['upload_file']);

	$sql = "delete from ".$table_name." where idx='".$_GET['didx']."'";
	mysql_query($sql);

	alert("삭제되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}
?>