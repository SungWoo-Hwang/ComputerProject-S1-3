<?
//관리자 설정

$member = sql_fetch( "select * from ".$TBA['ADM_TABLE']." where mb_id='".$_SESSION['member_id']."' order by idx limit 1" );


if($ic_page == "") $ic_page = "login";

if($ic_page == "login") $header_data = 'noheader';
if($ic_page == "pushsend") $left_no = 'left_no';

$ic_page_url = $admin_url."/?ic_page";
$ic_sub_page_url = $admin_url."/?ic_page=".$ic_page."&ic_sub_page";


$depth01_title['member'] = "고객관리";
$depth01_title['account'] = "리뷰";
//$depth01_title['notice'] = "공지사항";
//$depth01_title['ingstatus'] = "접속현황";
//$depth01_title['customer'] = "게시판관리";
//$depth01_title['pushsend'] = "푸쉬발송";
//$depth01_title['set'] = "설정";

//1
$depth02_title['member01'] = "점주";
$depth02_title['member02'] = "일반";

//2
$depth02_title['account01'] = "리뷰";
$depth02_title['account02'] = "결제승인내역";

//3
$depth02_title['notice01'] = "업체";
$depth02_title['notice02'] = "소개소1";

//4
$depth02_title['ingstatus01'] = "업체1";
$depth02_title['ingstatus02'] = "소개소";



$depth02_title['set01'] = "약관설정";
?>