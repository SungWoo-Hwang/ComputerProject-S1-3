<?
//관리자 설정

$member = sql_fetch( "select * from ".$TBA['ADM_CHAT_TABLE']." where mb_id='".$_SESSION['member_id']."' order by idx limit 1" );


if($ic_page == "") $ic_page = "login";

if($ic_page == "login") $header_data = 'noheader';
//if($ic_page == "pushsend") $left_no = 'left_no';

$ic_page_url = $chat_url."/?ic_page";
$ic_sub_page_url = $chat_url."/?ic_page=".$ic_page."&ic_sub_page";

?>