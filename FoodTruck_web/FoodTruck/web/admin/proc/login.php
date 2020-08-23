<?
include "../../common.php";
include $admin_path."/admin.common.php";

$pass = $_POST['login_pw'];
$login = sql_fetch("select * from ".$TBA['ADM_TABLE']." where mb_id='".$_POST['login_id']."' and mb_pass='".$pass."' order by idx limit 1");


if($login['idx'] == ""){
	alert('아이디와 비밀번호를 확인해주세요.');
	exit;
}



if($login['mb_level'] < 20){
	alert('관리자만 접속하실 수 있습니다.');
	exit;
}


$_SESSION['member_id'] = $login['mb_id'];

goto_url($ic_page_url."=member");
?>