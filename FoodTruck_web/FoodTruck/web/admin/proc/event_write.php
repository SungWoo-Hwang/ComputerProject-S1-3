<?
include "../../common.php";
include $admin_path."/admin.common.php";


$img_path = $home_data_path.'/event/';
$table_name = $TBA['EVENT_TABLE'];
if($w == ""){


	if($_FILES['img_file01']['name']){
		$upload01_func_file = file_upload($_FILES['img_file01'], $img_path, $img_upload_ext, "upload_file01_".time());
		$upload_file01_sql = ", img_file01='".$home_data_url."/event/".$upload01_func_file[1]."' ";
	}
	if($_FILES['img_file02']['name']){
		$upload02_func_file = file_upload($_FILES['img_file02'], $img_path, $img_upload_ext, "upload_file02_".time());
		$upload_file02_sql = ", img_file02='".$home_data_url."/event/".$upload02_func_file[1]."' ";
	}

	$sql = "
	insert into ".$table_name." set
		signdate='".mktime()."',
		signdate_datetime='".date('Y-m-d H:i:s')."',
		sdate='".$_POST['sdate']." 00:00:00',
		edate='".$_POST['edate']." 23:59:59',
		wr_subject='".$_POST['wr_subject']."',
		wr_comment='".$_POST['w_comment']."',
		is_notice='".$_POST['is_notice']."',
		view_type='".$_POST['view_type']."'
		".$upload_file01_sql."
		".$upload_file02_sql."
	";
	mysql_query($sql);

	//exit;

	alert("등록되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}

if($w == "u"){

	$row = sql_fetch("select * from ".$table_name." where idx='".$_POST['uidx']."' order by idx desc");

	$row['img_file01'] = str_replace($home_data_url."/event/","", $row['img_file01']);
	$row['img_file02'] = str_replace($home_data_url."/event/","", $row['img_file02']);

	if($_FILES['img_file01']['name']){
		@unlink($img_path.$row['img_file01']);
		$upload01_func_file = file_upload($_FILES['img_file01'], $img_path, $img_upload_ext, "upload_file01_".time());
		mysql_query(" update ".$table_name." set img_file01='".$home_data_url."/event/".$upload01_func_file[1]."' where idx='".$_POST['uidx']."' ");
	}

	if($_FILES['img_file02']['name']){
		@unlink($img_path.$row['img_file02']);
		$upload02_func_file = file_upload($_FILES['img_file02'], $img_path, $img_upload_ext, "upload_file02_".time());
		mysql_query(" update ".$table_name." set img_file02='".$home_data_url."/event/".$upload02_func_file[1]."' where idx='".$_POST['uidx']."' ");
	}

	$sql = "
	update ".$table_name." set
		status='".$_POST['status']."',
		sdate='".$_POST['sdate']."',
		edate='".$_POST['edate']." 23:59:59',
		wr_subject='".$_POST['wr_subject']."',
		wr_comment='".$_POST['w_comment']."',
		is_notice='".$_POST['is_notice']."',
		view_type='".$_POST['view_type']."'
	where idx='".$_POST['uidx']."'
	";
	mysql_query($sql);
	alert("수정되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."&pt=".$_POST['pt']."&vidx=".$_POST['uidx']."&w=u");
}


if($w == "d"){
	$row = sql_fetch("select * from ".$table_name." where idx='".$_GET['didx']."' order by idx desc");

	$row['img_file01'] = str_replace($home_data_url."/event/","", $row['img_file01']);
	$row['img_file02'] = str_replace($home_data_url."/event/","", $row['img_file02']);
	@unlink($img_path.$row['img_file01']);
	@unlink($img_path.$row['img_file02']);

	$sql = "delete from ".$table_name." where idx='".$_GET['didx']."'";
	mysql_query($sql);

	alert("삭제되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}
?>