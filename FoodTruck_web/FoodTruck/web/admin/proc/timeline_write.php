<?
include "../../common.php";
include $admin_path."/admin.common.php";


$store = sql_fetch( "select * from ".$TBA['STORE_TABLE']." where store_code='".$member['mb_id']."'" );


$img_path = $home_data_path.'/timeline/';
$table_name = $TBA['TIMELINE'];



$common_sql = "
	signdate='".mktime()."',
	signdate_datetime='".date('Y-m-d H:i:s')."',
	status = '".$_POST['status']."',
	store_code = '".$store['store_code']."',
	store_name = '".$store['store_name']."',
	wr_subject = '".$_POST['wr_subject']."',
	wr_comment = '".$_POST['wr_comment']."',
	p_upload_img01 = '".$_POST['p_upload_img01']."',
	p_upload_img02 = '".$_POST['p_upload_img02']."',
	p_upload_img03 = '".$_POST['p_upload_img03']."'
";

$common_sql2 = "
	status = '".$_POST['status']."',
	store_code = '".$store['store_code']."',
	store_name = '".$store['store_name']."',
	wr_subject = '".$_POST['wr_subject']."',
	wr_comment = '".$_POST['wr_comment']."',
	p_upload_img01 = '".$_POST['p_upload_img01']."',
	p_upload_img02 = '".$_POST['p_upload_img02']."',
	p_upload_img03 = '".$_POST['p_upload_img03']."'
";

if($w == ""){


	if($_FILES['upload_img01']['name']){
		$upload_img01_file = file_upload($_FILES['upload_img01'], $img_path, $img_upload_ext, "upload_img01_".time());
		$upload_img01_sql = ", upload_img01='".$home_data_url."/timeline/".$upload_img01_file[1]."' ";
	}
	if($_FILES['upload_img02']['name']){
		$upload_img02_file = file_upload($_FILES['upload_img02'], $img_path, $img_upload_ext, "upload_img02_".time());
		$upload_img02_sql = ", upload_img02='".$home_data_url."/timeline/".$upload_img02_file[1]."' ";
	}
	if($_FILES['upload_img03']['name']){
		$upload_img03_file = file_upload($_FILES['upload_img03'], $img_path, $img_upload_ext, "upload_img03_".time());
		$upload_img03_sql = ", upload_img03='".$home_data_url."/timeline/".$upload_img03_file[1]."' ";
	}


	$sql = "
	insert into ".$table_name." set
		".$common_sql."
		".$upload_img01_sql."
		".$upload_img02_sql."
		".$upload_img03_sql."
	";
	mysql_query($sql);
	alert("등록되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}


if($w == "u"){

	$row = sql_fetch("select * from ".$table_name." where idx='".$_POST['uidx']."' order by idx desc");


	$row['upload_img01'] = str_replace($home_data_url."/timeline/","", $row['upload_img01']);
	$row['upload_img02'] = str_replace($home_data_url."/timeline/","", $row['upload_img02']);
	$row['upload_img03'] = str_replace($home_data_url."/timeline/","", $row['upload_img03']);


	if($_FILES['upload_img01']['name']){
		@unlink($img_path.$row['upload_img01']);
		$upload_img01_file = file_upload($_FILES['upload_img01'], $img_path, $img_upload_ext, "upload_img01_".time());
		mysql_query(" update ".$table_name." set upload_img01='".$home_data_url."/timeline/".$upload_img01_file[1]."' where idx='".$_POST['uidx']."' ");
	}
	if($_FILES['upload_img02']['name']){
		@unlink($img_path.$row['upload_img02']);
		$upload_img02_file = file_upload($_FILES['upload_img02'], $img_path, $img_upload_ext, "upload_img02_".time());
		mysql_query(" update ".$table_name." set upload_img02='".$home_data_url."/timeline/".$upload_img02_file[1]."' where idx='".$_POST['uidx']."' ");
	}
	if($_FILES['upload_img03']['name']){
		@unlink($img_path.$row['upload_img03']);
		$upload_img03_file = file_upload($_FILES['upload_img03'], $img_path, $img_upload_ext, "upload_img03_".time());
		mysql_query(" update ".$table_name." set upload_img03='".$home_data_url."/timeline/".$upload_img03_file[1]."' where idx='".$_POST['uidx']."' ");
	}


	$sql = "
	update ".$table_name." set
		".$common_sql2."
	where idx='".$_POST['uidx']."'
	";
	mysql_query($sql);
	alert("수정되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."&pt=".$_POST['pt']."&vidx=".$_POST['uidx']."&w=u");
}


if($w == "삭제"){

	for ($i=0; $i<count($_POST['chk']); $i++){
		// 실제 번호를 넘김
		$k = $_POST['chk'][$i];

		$row = sql_fetch("select * from ".$table_name." where idx='".$_POST['idx'][$k]."' order by idx desc");

		$row['upload_img01'] = str_replace($home_data_url."/timeline/","", $row['upload_img01']);
		$row['upload_img02'] = str_replace($home_data_url."/timeline/","", $row['upload_img02']);
		$row['upload_img03'] = str_replace($home_data_url."/timeline/","", $row['upload_img03']);

		@unlink($img_path.$row['upload_img01']);
		@unlink($img_path.$row['upload_img02']);
		@unlink($img_path.$row['upload_img03']);

		$sql = "delete from ".$table_name." where idx='".$_POST['idx'][$k]."'";
		mysql_query($sql);
	}

	alert("삭제되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}

if($w == "진열안함"){

	for ($i=0; $i<count($_POST['chk']); $i++){
		// 실제 번호를 넘김
		$k = $_POST['chk'][$i];

		$row = sql_fetch("select * from ".$table_name." where idx='".$_POST['idx'][$k]."' order by idx desc");

		$sql = "update ".$table_name." set status='1' where idx='".$_POST['idx'][$k]."'";
		mysql_query($sql);
	}

	alert("노출 제외 되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}

if($w == "진열함"){

	for ($i=0; $i<count($_POST['chk']); $i++){
		// 실제 번호를 넘김
		$k = $_POST['chk'][$i];

		$row = sql_fetch("select * from ".$table_name." where idx='".$_POST['idx'][$k]."' order by idx desc");

		$sql = "update ".$table_name." set status='0' where idx='".$_POST['idx'][$k]."'";
		mysql_query($sql);
	}

	alert("진열 되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}
?>