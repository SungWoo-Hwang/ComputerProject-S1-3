<?
include "../../common.php";
include $admin_path."/admin.common.php";

/*
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
*/

$img_path = $home_data_path.'/product/';
$table_name = $TBA['PRODUCT_TABLE'];
$style_no = "MIPN".mktime().$_POST['cate1'].$_POST['cate2'].$_POST['cate3'];


$_POST['wr_comment'] = str_replace("'","`", $_POST['wr_comment']);

$common_sql = "
	signdate='".mktime()."',
	signdate_datetime='".date('Y-m-d H:i:s')."',
	STYLE_NO = '".$style_no."',
	cate1 = '".$_POST['cate1']."',
	cate2 = '".$_POST['cate2']."',
	cate3 = '".$_POST['cate3']."',
	wr_subject = '".$_POST['wr_subject']."',
	wr_s_subject = '".$_POST['wr_s_subject']."',
	wr_comment = '".$_POST['wr_comment']."'
";

$common_sql2 = "
	cate1 = '".$_POST['cate1']."',
	cate2 = '".$_POST['cate2']."',
	cate3 = '".$_POST['cate3']."',
	wr_subject = '".$_POST['wr_subject']."',
	wr_s_subject = '".$_POST['wr_s_subject']."',
	wr_comment = '".$_POST['wr_comment']."'
";

if($w == ""){

	if($_FILES['list_file']['name']){
		$list_file_file = file_upload($_FILES['list_file'], $img_path, $img_upload_ext, "list_file_".time());
		$list_file_sql = ", list_file='".$home_data_url."/product/".$list_file_file[1]."' ";
	}
	if($_FILES['img_file01']['name']){
		$img_file01_file = file_upload($_FILES['img_file01'], $img_path, $img_upload_ext, "img_file01_".time());
		$img_file01_sql = ", img_file01='".$home_data_url."/product/".$img_file01_file[1]."' ";
	}
	if($_FILES['img_file02']['name']){
		$img_file02_file = file_upload($_FILES['img_file02'], $img_path, $img_upload_ext, "img_file02_".time());
		$img_file02_sql = ", img_file02='".$home_data_url."/product/".$img_file02_file[1]."' ";
	}
	if($_FILES['img_file03']['name']){
		$img_file03_file = file_upload($_FILES['img_file03'], $img_path, $img_upload_ext, "img_file03_".time());
		$img_file03_sql = ", img_file03='".$home_data_url."/product/".$img_file03_file[1]."' ";
	}
	if($_FILES['img_file04']['name']){
		$img_file04_file = file_upload($_FILES['img_file04'], $img_path, $img_upload_ext, "img_file04_".time());
		$img_file04_sql = ", img_file04='".$home_data_url."/product/".$img_file04_file[1]."' ";
	}
	if($_FILES['img_file05']['name']){
		$img_file05_file = file_upload($_FILES['img_file05'], $img_path, $img_upload_ext, "img_file05_".time());
		$img_file05_sql = ", img_file05='".$home_data_url."/product/".$img_file05_file[1]."' ";
	}

	$sql = "
	insert into ".$table_name." set
		".$common_sql."
		".$list_file_sql."
		".$img_file01_sql."
		".$img_file02_sql."
		".$img_file03_sql."
		".$img_file04_sql."
		".$img_file05_sql."
	";
	mysql_query($sql);


	alert("등록되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}


if($w == "add"){

	$row = sql_fetch("select * from ".$table_name." where idx='".$_POST['uidx']."' order by idx desc");

	$list_file_sql = ", list_file = '".$row['list_file']."' ";
	$img_file01_sql = ", img_file01 = '".$row['img_file01']."' ";
	$img_file02_sql = ", img_file02 = '".$row['img_file02']."' ";
	$img_file03_sql = ", img_file03 = '".$row['img_file03']."' ";
	$img_file04_sql = ", img_file04 = '".$row['img_file04']."' ";
	$img_file05_sql = ", img_file05 = '".$row['img_file05']."' ";


	$sql = "
	insert into ".$table_name." set
		".$common_sql."
		".$list_file_sql."
		".$img_file01_sql."
		".$img_file02_sql."
		".$img_file03_sql."
		".$img_file04_sql."
		".$img_file05_sql."
	";
	mysql_query($sql);


	alert("등록되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}

if($w == "u"){

	$row = sql_fetch("select * from ".$table_name." where idx='".$_POST['uidx']."' order by idx desc");


	$row['list_file'] = str_replace($home_data_url."/product/","", $row['list_file']);
	$row['img_file01'] = str_replace($home_data_url."/product/","", $row['img_file01']);
	$row['img_file02'] = str_replace($home_data_url."/product/","", $row['img_file02']);
	$row['img_file03'] = str_replace($home_data_url."/product/","", $row['img_file03']);
	$row['img_file04'] = str_replace($home_data_url."/product/","", $row['img_file04']);
	$row['img_file05'] = str_replace($home_data_url."/product/","", $row['img_file05']);

	if($_POST['list_file_del'] == "1"){
		@unlink($img_path.$row['list_file']);
		mysql_query(" update ".$table_name." set list_file='' where idx='".$_POST['uidx']."' ");

	}


	if($_POST['img_file01_del'] == "1"){
		@unlink($img_path.$row['img_file01']);
		mysql_query(" update ".$table_name." set img_file01='' where idx='".$_POST['uidx']."' ");

	}
	if($_POST['img_file02_del'] == "1"){
		@unlink($img_path.$row['img_file02']);
		mysql_query(" update ".$table_name." set img_file02='' where idx='".$_POST['uidx']."' ");

	}
	if($_POST['img_file03_del'] == "1"){
		@unlink($img_path.$row['img_file03']);
		mysql_query(" update ".$table_name." set img_file03='' where idx='".$_POST['uidx']."' ");

	}
	if($_POST['img_file04_del'] == "1"){
		@unlink($img_path.$row['img_file04']);
		mysql_query(" update ".$table_name." set img_file04='' where idx='".$_POST['uidx']."' ");

	}
	if($_POST['img_file05_del'] == "1"){
		@unlink($img_path.$row['img_file05']);
		mysql_query(" update ".$table_name." set img_file05='' where idx='".$_POST['uidx']."' ");

	}

	if($_FILES['list_file']['name']){
		@unlink($img_path.$row['list_file']);
		$list_file_file = file_upload($_FILES['list_file'], $img_path, $img_upload_ext, "list_file_".time());
		mysql_query(" update ".$table_name." set list_file='".$home_data_url."/product/".$list_file_file[1]."' where idx='".$_POST['uidx']."' ");
	}
	if($_FILES['img_file01']['name']){
		@unlink($img_path.$row['img_file01']);
		$img_file01_file = file_upload($_FILES['img_file01'], $img_path, $img_upload_ext, "img_file01_".time());
		mysql_query(" update ".$table_name." set img_file01='".$home_data_url."/product/".$img_file01_file[1]."' where idx='".$_POST['uidx']."' ");
	}
	if($_FILES['img_file02']['name']){
		@unlink($img_path.$row['img_file02']);
		$img_file02_file = file_upload($_FILES['img_file02'], $img_path, $img_upload_ext, "img_file02_".time());
		mysql_query(" update ".$table_name." set img_file02='".$home_data_url."/product/".$img_file02_file[1]."' where idx='".$_POST['uidx']."' ");
	}
	if($_FILES['img_file03']['name']){
		@unlink($img_path.$row['img_file03']);
		$img_file03_file = file_upload($_FILES['img_file03'], $img_path, $img_upload_ext, "img_file03_".time());
		mysql_query(" update ".$table_name." set img_file03='".$home_data_url."/product/".$img_file03_file[1]."' where idx='".$_POST['uidx']."' ");
	}
	if($_FILES['img_file04']['name']){
		@unlink($img_path.$row['img_file04']);
		$img_file04_file = file_upload($_FILES['img_file04'], $img_path, $img_upload_ext, "img_file04_".time());
		mysql_query(" update ".$table_name." set img_file04='".$home_data_url."/product/".$img_file04_file[1]."' where idx='".$_POST['uidx']."' ");
	}
	if($_FILES['img_file05']['name']){
		@unlink($img_path.$row['img_file05']);
		$img_file05_file = file_upload($_FILES['img_file05'], $img_path, $img_upload_ext, "img_file05_".time());
		mysql_query(" update ".$table_name." set img_file05='".$home_data_url."/product/".$img_file05_file[1]."' where idx='".$_POST['uidx']."' ");
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

		$row['list_file'] = str_replace($home_data_url."/product/","", $row['list_file']);
		$row['img_file01'] = str_replace($home_data_url."/product/","", $row['img_file01']);
		$row['img_file02'] = str_replace($home_data_url."/product/","", $row['img_file02']);
		$row['img_file03'] = str_replace($home_data_url."/product/","", $row['img_file03']);
		$row['img_file04'] = str_replace($home_data_url."/product/","", $row['img_file04']);
		$row['img_file05'] = str_replace($home_data_url."/product/","", $row['img_file05']);

		@unlink($img_path.$row['list_file']);
		@unlink($img_path.$row['img_file01']);
		@unlink($img_path.$row['img_file02']);
		@unlink($img_path.$row['img_file03']);
		@unlink($img_path.$row['img_file04']);
		@unlink($img_path.$row['img_file05']);

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