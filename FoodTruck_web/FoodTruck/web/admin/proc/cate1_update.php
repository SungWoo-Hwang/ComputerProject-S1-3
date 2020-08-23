<?
include "../../common.php";
include $admin_path."/admin.common.php";

/*
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
*/


$ca_last = sql_fetch( "select REFCD from ".$TBA['CATEGORY_INfO']." where GBNCD='".$_POST['catepth']."' order by REFCD desc limit 1" );
$ca_numbering = $ca_last['REFCD'] + 1;

$img_path = $home_data_path.'/category/';
$table_name = $TBA['CATEGORY_INfO'];
$table_name2 = $TBA['CATEGORY'];


if($w == ""){
	if($_FILES['title_img']['name']){
		$upload01_func_file = file_upload($_FILES['title_img'], $img_path, $img_upload_ext, "titleimg_".time());
		$upload_file01_sql = ", title_img='".$home_data_url."/category/".$upload01_func_file[1]."' ";
	}

	$sql = "
	insert into ".$table_name." set
		signdate='".mktime()."',
		GBNCD='".$_POST['catepth']."',
		REFCD='".$ca_numbering."',
		REFNM='".$_POST['REFNM']."',
		USEYN='".$_POST['USEYN']."',
		INSERT_DATETIME='".date('Y-m-d')."',
		view_type='".$_POST['view_type']."'
		".$upload_file01_sql."
	";
	mysql_query($sql);


	//exit;

	alert("등록되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}


if($w == "u"){


	$un = $_POST['u_number'];
	$row = sql_fetch("select * from ".$table_name." where idx='".$_POST['uidx'][$un]."' order by idx desc");


	$row['title_img'] = str_replace($home_data_url."/category/","", $row['title_img']);
	if($_FILES['title_img']['name'][$un]){
		@unlink($img_path.$row['title_img']);
		$upload01_func_file = file_upload_array($un, $_FILES['title_img'], $img_path, $img_upload_ext, "titleimg_".time());
		mysql_query(" update ".$table_name." set title_img='".$home_data_url."/category/".$upload01_func_file[1]."' where idx='".$row['idx']."' ");
	}

	if($_POST['USEYN'][$un] == ""){
		$USEYN_data = "N";
	} else {
		$USEYN_data = "Y";
	}

	$sql = "
	update ".$table_name." set
		REFNM='".$_POST['REFNM'][$un]."',
		USEYN='".$USEYN_data."',
		view_type='".$_POST['view_type'][$un]."'
	where idx='".$row['idx']."'
	";
	mysql_query($sql);

	//echo $sql;
	//exit;


	//exit;

	alert("수정되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}

if($w == "d"){
	$row = sql_fetch("select * from ".$table_name." where idx='".$_GET['didx']."' order by idx desc");

	$row['title_img'] = str_replace($home_data_url."/category/","", $row['title_img']);
	@unlink($img_path.$row['title_img']);

	$sql = "delete from ".$table_name." where idx='".$_GET['didx']."'";
	mysql_query($sql);

	alert("삭제되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");

}

?>