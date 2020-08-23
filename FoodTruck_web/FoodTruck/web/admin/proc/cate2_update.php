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
	$sql = "
	insert into ".$table_name." set
		signdate='".mktime()."',
		GBNCD='".$_POST['catepth']."',
		REFCD='".$ca_numbering."',
		REFNM='".$_POST['REFNM']."',
		USEYN='".$_POST['USEYN']."',
		INSERT_DATETIME='".date('Y-m-d')."'
	";
	mysql_query($sql);


	//exit;

	alert("등록되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}


if($w == "u"){
	$un = $_POST['u_number'];
	$row = sql_fetch("select * from ".$table_name." where idx='".$_POST['uidx'][$un]."' order by idx desc");

	if($_POST['USEYN'][$un] == ""){
		$USEYN_data = "N";
	} else {
		$USEYN_data = "Y";
	}

	$sql = "
	update ".$table_name." set
		REFNM='".$_POST['REFNM'][$un]."',
		USEYN='".$USEYN_data."'
	where idx='".$row['idx']."'
	";
	mysql_query($sql);


	//exit;

	alert("수정되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}

if($w == "d"){
	$row = sql_fetch("select * from ".$table_name." where idx='".$_GET['didx']."' order by idx desc");


	$sql = "delete from ".$table_name." where idx='".$_GET['didx']."'";
	mysql_query($sql);

	alert("삭제되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");

}

?>