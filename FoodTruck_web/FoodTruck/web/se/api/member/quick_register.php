<?
include "../../common.php";

$mb_id = $_REQUEST['mb_id'];
$mb_nick = $_REQUEST['mb_nick'];
$quick_moving_type = $_REQUEST['quick_moving_type'];
$zipcode = $_REQUEST['zipcode'];
$addr_data = $_REQUEST['addr_data'];
$addr_data_jibun = $_REQUEST['addr_data_jibun'];
$addr_data02 = $_REQUEST['addr_data02'];
$addr_data03 = $_REQUEST['addr_data03'];
$bank_store = $_REQUEST['bank_store'];
$bank_number = $_REQUEST['bank_number'];
$bank_name = $_REQUEST['bank_name'];
$mb_name = $_REQUEST['mb_name']; //실명인증 후 실명데이터
$mb_age = $_REQUEST['mb_age'];
$mb_sex = $_REQUEST['mb_sex'];

$mb = get_member($mb_id);


if($mb_id == "") api_error('001','no id data'); //회원 아이디 정보가 없다
if($mb_nick == "") api_error('002','no mb_nick data'); //닉네임 정보가 없다
if($zipcode == "") api_error('003','no zipcode data'); //우편번호 정보가 없다
if($addr_data == "") api_error('004','no addr_data data'); //새주소 정보가 없다
if($addr_data_jibun == "") api_error('005','no addr_data_jibun data'); //구주소 정보가 없다
if($addr_data02 == "") api_error('006','no addr_data02 data'); //상세주소 정보가 없다
//if($bank_store == "") api_error('007','no bank_store data'); //은행명 정보가 없다
//if($bank_number == "") api_error('008','no bank_number data'); //계좌번호 정보가 없다
//if($bank_name == "") api_error('009','no bank_name data'); //예금주 정보가 없다
if($mb_name == "") api_error('010','no name data'); //이름값이 없다
if($mb_age == "") api_error('011','no mb_age data'); //나이값이 없다
if($mb_sex == "") api_error('012','no mb_sex data'); //성별값이 없다.

//api_error('999','etc error'); //기타 이유를 알수없는 오류
if($mb['idx'] == "") api_error('013','no member data'); //회원정보가 없다
if($mb['mb_name'] != $mb_name) api_error('014','no match input name'); //회원가입시 입력한 이름과 실명이 다르다.


if($_FILES['profile_img']['name']){
	$file_profile_img_upload = file_upload($_FILES['profile_img'], $home_data_path.'/member/', $img_upload_ext, $mb_id);
}

$mrow = sql_fetch( "select * from ".$TBA['MEM_TABLE']." where mb_nick='".$mb_nick."'" );
if($mrow['idx'] != "") api_error('015','have nickname value.'); //사용중인 닉네임이 있다

$ex_addr_data = explode(" ", $addr_data_jibun);
$sql = "
	update ".$TBA['MEM_TABLE']." set
		mb_grade='2',
		quick_date='".date('Y-m-d H:i:s')."',
		zipcode='".$zipcode."',
		addr_data='".$addr_data."',
		addr_data_jibun='".$addr_data_jibun."',
		addr_data02='".$addr_data02."',
		addr_data03='".$addr_data03."',
		addr_s_data01='".$ex_addr_data[0]."',
		addr_s_data02='".$ex_addr_data[1]."',
		addr_s_data03='".$ex_addr_data[2]."',
		addr_s_data04='".$ex_addr_data[3]."',
		namecker='1',
		quick_date='".date('Y-m-d H:i:s')."',
		mb_name='".$mb_name."',
		mb_nick='".$mb_nick."',
		profile_img='".$file_profile_img_upload[1]."',
		quick_moving_type='".$quick_moving_type."',
		mb_age='".$mb_age."',
		mb_sex='".$mb_sex."',
		bank_store='".$bank_store."',
		bank_number='".$bank_number."',
		bank_name='".$bank_name."'
	where mb_id='".$mb_id."'
";
mysql_query($sql);

$member = get_member($mb_id);
if($member['bank_name'] == "") api_error('016','database error'); //디비 저장이 안됐다.

api_error('000','ok', $member); //정상
/*
테스트 url
http://projectn11.vps.phps.kr/jhfolder/quick/web/api/member/quick_register.php?mb_id=test&mb_nick=nicktest&quick_moving_type=도보,퀵보드,자전거,대중교통,오토바이,차량&addr_data=test&zipcode=21548&addr_data=경기 시흥시 솔고개길 3-4&addr_data_jibun=경기 시흥시 목감동 402-2&addr_data02=제니시스엠테라스 601호&addr_data03=(목감동)&bank_store=신한은행&bank_number=110257712944&bank_name=김대호&mb_name=김대호&mb_age=32&mb_sex=남
*/
?>