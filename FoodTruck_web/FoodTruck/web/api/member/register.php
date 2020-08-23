<?
include "../../common.php";


$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$memberid = $_REQUEST['memberid'];
$memberemail = $_REQUEST['memberemail'];
$memberpw = $_REQUEST['memberpw'];
$shopkeeper = $_REQUEST['shopkeeper'];		//고객 : N , 매장 : Y
		



$mb = get_member($memberid);
if($mb['ID'] == $memberid) api_error('001','이미 가입된 아이디입니다.');



$sql = "
	insert into mem_tb set
		ID='".$memberid."',
		PW='".$memberpw."',
		NAME='".$name."',
		PHONE='".$phone."',
		SHOP_KEEPER='".$shopkeeper."',
		IMG='',
		EMAIL='".$memberemail."',
		KEEPER_YN='N',
        ADDRESS='',
		WI='',
        GI='',
        INTRODUCE='',
        POINT=''
";
mysql_query($sql);



api_error('000','ok', $mb); //정상

/*
http://snap50.cafe24.com/FoodTruck/web/api/member/register.php?name=홍길동&phone=01027065914&memberid=snap40&memberemail=snap0425@gmail.com&memberpw=rbdyd3174&shopkeeper=Y

*/

?>
