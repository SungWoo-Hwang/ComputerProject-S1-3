<?
include "../common.php";
include $chat_path."/chat.common.php";

include $chat_path."/header.sub.php";


if($ic_page != "login" && $member['idx'] == ""){
	alert("로그인 후 이용해주세요.", $chat_url);
}

if($header_data != "noheader") include $chat_path."/header.php";
include $chat_ic_page_path."/".$ic_page.".php";
include $chat_path."/tail.php";
?>