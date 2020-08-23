<?
include "../../common.php";
include $admin_path."/admin.common.php";


$img_path = $home_data_path.'/notice/';
$table_name = $TBA['JY_NOTICE'];
if($w == ""){


	if($_FILES['upload_file']['name']){
		$upload_func_file = file_upload($_FILES['upload_file'], $img_path, $img_upload_ext, "upload_file_".time());
		$upload_file_sql = ", upload_file='".$home_data_url."/notice/".$upload_func_file[1]."' ";
	}

	$sql = "
	insert into ".$table_name." set
		date='".date('Y-m-d H:i:s')."',
		title='".$_POST['wr_subject']."',
		body='".$_POST['w_comment']."',
		type='".$_POST['type']."'
		".$upload_file_sql."
	";
	mysql_query($sql);
	


	$query = "select * from jy_member where login_type = ".$_POST['type'];

	$result = mysql_query($query);
	
	
	while($row = @mysql_fetch_assoc($result)){
		
		push_send($row['token'], "공지사항이 등록되었습니다.", 88, "android");
		//alert($row['token'], $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
	}


	

	alert("등록되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}

if($w == "u"){

	$row = sql_fetch("select * from ".$table_name." where key_index='".$_POST['uidx']."' order by key_index desc");


	$row['upload_file'] = str_replace($home_data_url."/notice/","", $row['upload_file']);
	if($_FILES['upload_file']['name']){
		@unlink($img_path.$row['upload_file']);
		$upload_func_file = file_upload($_FILES['upload_file'], $img_path, $img_upload_ext, "upload_file_".time());
		mysql_query(" update ".$table_name." set upload_file='".$home_data_url."/notice/".$upload_func_file[1]."' where key_index='".$_POST['uidx']."' ");
	}


	$sql = "
	update ".$table_name." set
		title='".$_POST['wr_subject']."',
		body='".$_POST['w_comment']."'
	where key_index=".$_POST['uidx']."
	";
	mysql_query($sql);
	alert("수정되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."&pt=".$_POST['pt']."&vidx=".$_POST['uidx']."&w=u");
}


if($w == "d"){
	$row = sql_fetch("select * from ".$table_name." where key_index='".$_GET['didx']."' order by key_index desc");

	$row['upload_file'] = str_replace($home_data_url."/notice/","", $row['upload_file']);
	@unlink($img_path.$row['upload_file']);

	$sql = "delete from ".$table_name." where key_index=".$_GET['didx'];
	mysql_query($sql);

	alert("삭제되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}
?>