<?
include "../../common.php";
include $mng_path."/mng.common.php";

$login = sql_fetch("select * from ".$TBA['MNG_TABLE']." where store_code='".$_POST['login_id']."' and mb_pw='".$_POST['login_pw']."' order by idx limit 1");


if($login['idx'] == ""){
	alert('아이디와 비밀번호를 확인해주세요.');
	exit;
}


$_SESSION['member_id'] = $login['store_code'];

goto_url($ic_page_url."=member");
?>