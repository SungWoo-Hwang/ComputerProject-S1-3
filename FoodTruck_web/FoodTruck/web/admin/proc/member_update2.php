<?
include "../../common.php";
include $admin_path."/admin.common.php";


$img_path = $home_data_path.'/store/';
$table_name = $TBA['JY_MEMBER'];

/*
echo "<pre>";
print_R($_POST);
echo "</pre>";
exit;
*/

if($w == ""){
	$sql = "
	update ".$table_name." set
		pw='".$_POST['pw']."'
	where key_index='".$_POST['uidx']."'
	";
	mysql_query($sql);
	
	alert("수정되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."&pt=".$_POST['pt']."&vidx=".$_POST['uidx']."&w=u");
}

if($w == "u"){

	$sql = "
	update ".$table_name." set
		pw='".$_POST['pw']."'
	where key_index='".$_POST['uidx']."'
	";
	mysql_query($sql);
	
	alert("수정되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."&pt=".$_POST['pt']."&vidx=".$_POST['uidx']."&w=u");




	
}


if($w == "a"){

	$row = sql_fetch("select * from ".$table_name." where idx='".$_POST['uidx']."' order by idx desc");

	$sql = "
	update ".$table_name." set
		mb_memo='".$_POST['mb_memo']."'
	where idx='".$_POST['uidx']."'
	";
	mysql_query($sql);
	alert("수정되었습니다2.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."&pt=".$_POST['pt']."&vidx=".$_POST['uidx']."&w=u");
}

if($w == "b"){

	$row = sql_fetch("select * from ".$table_name." where idx='".$_POST['uidx']."' order by idx desc");

	$sql = "
	update ".$table_name." set
		mb_memo='".$_POST['mb_memo']."',
		blacklist_comment='".$_POST['blacklist_comment']."'
	where idx='".$_POST['uidx']."'
	";
	mysql_query($sql);
	alert("수정되었습니다3.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."&pt=".$_POST['pt']."&vidx=".$_POST['uidx']."&w=u");
}



if($w == "d"){
	$row = sql_fetch("select * from ".$table_name." where idx='".$_GET['didx']."' order by idx desc");

	$sql = "delete from ".$table_name." where idx='".$_GET['didx']."'";
	mysql_query($sql);

	alert("삭제되었습니다4.", $ic_page_url."=".$ic_page."&ic_sub_page=".$ic_sub_page."");
}


if($w == "abort"){

	$row = sql_fetch("select * from ".$table_name." where idx='".$_GET['didx']."' order by idx desc");

	$sql = "
	update ".$table_name." set
		abort_date='".date('Y-m-d H:i:s')."',
		abort_type='1'
	where idx='".$_GET['didx']."'
	";
	mysql_query($sql);


	alert("탈퇴처리되었습니다5.", $ic_page_url."=".$ic_page."&ic_sub_page=member02");
}

if($w == "black"){

	$row = sql_fetch("select * from ".$table_name." where idx='".$_GET['didx']."' order by idx desc");

	$sql = "
	update ".$table_name." set
		blacklist_add_date='".date('Y-m-d H:i:s')."',
		blacklist_type='1'
	where idx='".$_GET['didx']."'
	";
	mysql_query($sql);


	alert("블랙리스트 처리 되었습니다6..", $ic_page_url."=".$ic_page."&ic_sub_page=member02");
}

if($w == "abort_back"){
	$row = sql_fetch("select * from ".$table_name." where idx='".$_GET['didx']."' order by idx desc");
	$sql = "
	update ".$table_name." set
		abort_type='0'
	where idx='".$_GET['didx']."'
	";
	mysql_query($sql);


	alert("승인 처리 되었습니다7.", $ic_page_url."=".$ic_page."&ic_sub_page=member02");
}


if($w == "blacklist_back"){
	$row = sql_fetch("select * from ".$table_name." where idx='".$_GET['didx']."' order by idx desc");
	$sql = "
	update ".$table_name." set
		blacklist_type='0'
	where idx='".$_GET['didx']."'
	";
	mysql_query($sql);


	alert("블랙리스트가 해제 되었습니다8.", $ic_page_url."=".$ic_page."&ic_sub_page=member02");
}


if($w == "list_update"){
	if(count($_POST['chk']) == 0){
		alert("변경하실 데이터를 하나이상 선택해주세요.");
		exit;
	}
	alert($act_button);
	

	if($act_button == "탈퇴"){
		for ($i=0; $i<count($_POST['chk']); $i++){
			// 실제 번호를 넘김
			$k = $_POST['chk'][$i];


			
			$sql = "DELETE FROM mem_tb WHERE KEYINDEX = ".$_POST['idx'][$k];
			mysql_query($sql);

			
		}
		alert("탈퇴 처리 되었습니다.", $ic_page_url."=".$ic_page."&ic_sub_page=member02");
	}

	


}


?>