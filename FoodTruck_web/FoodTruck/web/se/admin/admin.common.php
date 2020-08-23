<?
//관리자 설정

if($ic_page == "") $ic_page = "login";

if($ic_page == "login") $header_data = 'noheader';
if($ic_page == "dashboard") $left_no = 'left_no';
if($ic_page == "message") $left_no = 'left_no';

$ic_page_url = $admin_url."/?ic_page";
$ic_sub_page_url = $admin_url."/?ic_page=".$ic_page."&ic_sub_page";



$depth01_title['dashboard'] = "대시보드";
$depth01_title['member'] = "회원관리";
$depth01_title['moving'] = "배송관리";
$depth01_title['charge'] = "정산관리";
$depth01_title['message'] = "메시지관리";
$depth01_title['customer'] = "고객센터";
$depth01_title['set'] = "설정";
$depth01_title['visit'] = "통계";

if($pt == "write"){
	$depth02_title['member01'] = "고객정보(등록/수정)";
} else {
	$depth02_title['member01'] = "회원";
}
$depth02_title['member02'] = "퀵딜맨 인증관리";
$depth02_title['member03'] = "탈퇴고객";
$depth02_title['member04'] = "블랙리스트";

if($pt == "write"){
	$depth02_title['moving01'] = "퀵딜맨 - 배송상세보기";
	$depth02_title['moving02'] = "퀵서비스 - 배송상세보기";
	$depth02_title['moving03'] = "택배 - 배송상세보기";
} else {
	$depth02_title['moving01'] = "퀵딜맨";
	$depth02_title['moving02'] = "퀵서비스";
	$depth02_title['moving03'] = "택배";
}

$depth02_title['charge01'] = "충전 신청내역";
$depth02_title['charge02'] = "충전 내역";
$depth02_title['charge03'] = "사용/환불 내역";
$depth02_title['charge04'] = "출금/지급 내역";


$depth02_title['customer01'] = "공지사항";
$depth02_title['customer02'] = "자주하는질물";
$depth02_title['customer03'] = "문의하기";
$depth02_title['customer04'] = "푸쉬발송";

$depth02_title['set01'] = "충전 포인트 설정";
$depth02_title['set02'] = "배송료 설정";
$depth02_title['set03'] = "수수료 설정";
$depth02_title['set04'] = "약관";


$depth02_title['visit01'] = "이용현황";
$depth02_title['visit02'] = "회원";
?>