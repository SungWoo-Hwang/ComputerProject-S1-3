<?
include "../../common.php";

$mb_id = $_REQUEST['mb_id'];
$mb_nick = $_REQUEST['mb_nick'];
$mb_hp = $_REQUEST['mb_hp'];
$before_pass = $_REQUEST['before_pass'];
$after_pass = $_REQUEST['after_pass'];
$after_pass_ck = $_REQUEST['after_pass_ck'];

$member = get_member($mb_id);

if($mb_id == "") api_error('001','no mb_id data'); //���̵� ���� ����
if($mb_nick == "") api_error('002','no mb_nick data'); //�г��� ���� ����
if($mb_hp == "") api_error('003','no mb_hp data'); //�ڵ��� ���� ����
if($member['idx'] == "") api_error('004','no member data'); //ȸ�������� ����

if($before_pass != ""){
	$be_password = get_encrypt_string($before_pass);
	if($member['mb_password'] != $be_password) api_error('005','no before password match'); //���� ��й�ȣ�� Ʋ����
	if($after_pass != $after_pass_ck) api_error('006','no after password match'); //����й�ȣ�� ��й�ȣ Ȯ���� Ʋ����
	$af_password = get_encrypt_string($after_pass);
	$password_sql = ", mb_password='".$af_password."'";
}

$mrow = sql_fetch( "select * from ".$TBA['MEM_TABLE']." where mb_nick='".$mb_nick."'" );
if($mrow['idx'] != "") api_error('007','have nickname value.'); //������� �г����� �ִ�

$sql = "
	update ".$TBA['MEM_TABLE']." set
		mb_nick='".$mb_nick."',
		mb_hp='".$mb_hp."'
		".$password_sql."
	where mb_id='".$mb_id."'
";
mysql_query($sql);

$mb = get_member($mb_id);

api_error('000','ok', $mb); //����
/*
�׽�Ʈ url
http://projectn11.vps.phps.kr/jhfolder/quick/web/api/member/modify.php?mb_id=test&mb_nick=test2&mb_hp=010-5511-6166&before_pass=test&after_pass=test22&after_pass_ck=test22
*/
?>