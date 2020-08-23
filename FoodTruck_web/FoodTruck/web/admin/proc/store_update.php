<?
include "../../common.php";
include $admin_path."/admin.common.php";


$img_path = $home_data_path.'/store/';
$table_name = $TBA['STORE_TABLE'];


$store_addr = $_POST['addr_data']." ".$_POST['addr_data02'];
$ex_do = explode(" ", $_POST['addr_data']);


if($w == ""){

	if($_FILES['profile_img']['name']){
		$profile_img_file = file_upload($_FILES['profile_img'], $img_path, $img_upload_ext, "profile_img_".time());
		$profile_sql = ", profile_img='".$home_data_url."/store/".$profile_img_file[1]."' ";
	}
	if($_FILES['bgimg']['name']){
		$bgimg_file = file_upload($_FILES['bgimg'], $img_path, $img_upload_ext, "profile_bg_img_".time());
		$bgimg_sql = ", bgimg='".$home_data_url."/store/".$bgimg_file[1]."' ";
	}


	$sql = "
	insert into ".$table_name." set
		signdate='".mktime()."',
		signdate_datetime='".date('Y-m-d H:i:s')."',
		store_name='".$_POST['store_name']."',
		store_name_eng='".$_POST['store_name_eng']."',
		store_code='".$_POST['store_code']."',
		store_phone='".$_POST['store_phone']."',
		store_addr='".$store_addr."',
		store_do='".$ex_do[0]."',
		zipcode='".$_POST['zipcode']."',
		addr_data='".$_POST['addr_data']."',
		addr_data_jibun='".$_POST['addr_data_jibun']."',
		addr_data02='".$_POST['addr_data02']."',
		addr_data03='".$_POST['addr_data03']."',
		store_lat='".$_POST['addr_lat']."',
		store_lon='".$_POST['addr_lng']."'
		".$profile_sql."
		".$bgimg_sql."
	";
	mysql_query($sql);


	$sql = "
	update ".$TBA['MNG_TABLE']." set
		store_name='".$_POST['store_name']."'
	where store_code='".$_POST['store_code']."'
	";
	mysql_query($sql);



	//exit;

	alert("등록되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}

if($w == "u"){

	$row = sql_fetch("select * from ".$table_name." where idx='".$_POST['uidx']."' order by idx desc");

	if($_FILES['profile_img']['name']){
		@unlink($img_path.$row['profile_img']);
		$profile_img_file = file_upload($_FILES['profile_img'], $img_path, $img_upload_ext, "profile_img_".time());
		mysql_query(" update ".$table_name." set profile_img='".$home_data_url."/store/".$profile_img_file[1]."' where idx='".$_POST['uidx']."' ");
	}

	if($_FILES['bgimg']['name']){
		@unlink($img_path.$row['bgimg']);
		$bgimg_file = file_upload($_FILES['bgimg'], $img_path, $img_upload_ext, "profile_bg_img_".time());
		mysql_query(" update ".$table_name." set bgimg='".$home_data_url."/store/".$bgimg_file[1]."' where idx='".$_POST['uidx']."' ");
	}

	if($_POST['store_code'] == "") $_POST['store_code'] = $row['store_code'];

	$sql = "
	update ".$table_name." set
		store_name='".$_POST['store_name']."',
		store_name_eng='".$_POST['store_name_eng']."',
		store_code='".$_POST['store_code']."',
		store_phone='".$_POST['store_phone']."',
		store_addr='".$store_addr."',
		store_do='".$ex_do[0]."',
		zipcode='".$_POST['zipcode']."',
		addr_data='".$_POST['addr_data']."',
		addr_data_jibun='".$_POST['addr_data_jibun']."',
		addr_data02='".$_POST['addr_data02']."',
		addr_data03='".$_POST['addr_data03']."',
		store_lat='".$_POST['addr_lat']."',
		store_lon='".$_POST['addr_lng']."'
	where idx='".$_POST['uidx']."'
	";
	mysql_query($sql);


	$sql = "
	update ".$TBA['MNG_TABLE']." set
		store_name=''
	where store_code='".$row['store_code']."'
	";
	mysql_query($sql);


	$sql = "
	update ".$TBA['MNG_TABLE']." set
		store_name='".$_POST['store_name']."'
	where store_code='".$_POST['store_code']."'
	";
	mysql_query($sql);


	alert("수정되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."&pt=".$_POST['pt']."&vidx=".$_POST['uidx']."&w=u");
}


if($w == "d"){
	$row = sql_fetch("select * from ".$table_name." where idx='".$_GET['didx']."' order by idx desc");
	$mng = sql_fetch("select * from ".$TBA['MNG_TABLE']." where store_code='".$row['store_code']."' order by idx desc limit 1");
	if($mng['idx'] != ""){
		alert("매니저가 존재합니다. 매니저를 먼저 삭제 후 삭제해주세요");
		exit;
	}

	$row['profile_img'] = str_replace($home_data_url."/store/", '', $row['profile_img']);
	$row['bgimg'] = str_replace($home_data_url."/store/", '', $row['bgimg']);

	@unlink($img_path.$row['profile_img']);
	@unlink($img_path.$row['bgimg']);


	$sql = "delete from ".$table_name." where idx='".$_GET['didx']."'";
	mysql_query($sql);

	alert("삭제되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}
?>