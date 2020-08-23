<?
include "../common.php";
include $mng_path."/mng.common.php";

include $mng_path."/header.sub.php";

if($ic_page != "login" && $member['idx'] == ""){
	alert("로그인 후 이용해주세요.", $mng_url);
}

if($header_data != "noheader") include $mng_path."/header.php";
include $mng_ic_page_path."/".$ic_page.".php";
include $mng_path."/tail.php";
?>