<?
include "../common.php";
include $admin_path."/admin.common.php";

include $admin_path."/header.sub.php";


if($ic_page != "login" && $member['idx'] == ""){
	alert("로그인 후 이용해주세요.", $admin_url);
}

if($header_data != "noheader") include $admin_path."/header.php";
include $admin_ic_page_path."/".$ic_page.".php";
include $admin_path."/tail.php";
?>