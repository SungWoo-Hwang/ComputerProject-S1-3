<?
include "../../common.php";
$request_id = $_REQUEST['request_id'];
$normal_20 = $_REQUEST['normal_20'];
$normal_30 = $_REQUEST['normal_30'];
$normal_40 = $_REQUEST['normal_40'];

$special_20 = $_REQUEST['special_20'];
$special_30 = $_REQUEST['special_30'];
$special_40 = $_REQUEST['special_40'];//echo $request_id;
$place = $_REQUEST['place'];		//장소..

$mb = sql_fetch(" select * from ".$TBA['JY_REQUEST']." where request_id = '".$request_id."'");
$mb2 = sql_fetch(" select * from ".$TBA['JY_MEMBER']." where key_index = '".$request_id."'");
//echo $mb;
if($mb['request_id']==''){
	//æ¯¿∏∏È insert
	
	$sql = "
		insert into ".$TBA['JY_REQUEST']." set
			date='".date('Y-m-d H:i:s')."',
			request_id='".$request_id."',
			normal_20='".$normal_20."',
			normal_30='".$normal_30."',
			normal_40='".$normal_40."',
			special_20='".$special_20."',
			special_30='".$special_30."',
			special_40='".$special_40."'
	";
	mysql_query($sql);
    
}else{
	//¿÷¿∏∏È update
	
	$sql = "
	update ".$TBA['JY_REQUEST']." set
		date='".date('Y-m-d H:i:s')."',
		request_id='".$request_id."',
		normal_20='".$normal_20."',
		normal_30='".$normal_30."',
		normal_40='".$normal_40."',
		special_20='".$special_20."',
		special_30='".$special_30."',
		special_40='".$special_40."'
	where request_id='".$request_id."'";
	mysql_query($sql);
}

//카운트
if($normal_20 == 0 &&
   $normal_30 == 0 &&
   $normal_40 == 0 &&
   $special_20 == 0 &&
   $special_30 == 0 &&
   $special_40 == 0 ){
	mysql_query("UPDATE jy_member SET count = count + 1 WHERE key_index = ".$request_id);
}



//히스토리 내역 저장
$sql = "insert into jy_request_history set date='".date('Y-m-d H:i:s')."', request_id=".$request_id.", normal_20='".$normal_20."',
		type='0',
		normal_30='".$normal_30."',
		normal_40='".$normal_40."',
		special_20='".$special_20."',
		special_30='".$special_30."',
		special_40='".$special_40."'";
//echo $sql;
mysql_query($sql);


//소개소한테 푸시 보내야함..
$query = "select * from ".$TBA['JY_MEMBER']." where login_type = 1 and ing_status = 1";

$result = mysql_query($query);
$i = 0;
while($row = @mysql_fetch_assoc($result)){
	$categoryName = $row['place01'];  
	$jbexplode = explode( ',', $place );
  	//echo $jbexplode[0];
  	$hh = false;
	foreach( $jbexplode as $key => $value ) {
		//echo "키 : " . $categoryName . ", 값 : " . $value . "<br>";
		if(strpos($categoryName, $value) !== false) {  
    		$hh = true;
		}
	}
	if($hh){
		//$list[$i] = $row;
		//$i++; 

		$mb2['body'] = "업체가 인원을 요청했습니다.";
		$mb2['normal_20'] = $normal_20;
		$mb2['normal_30'] = $normal_30;
		$mb2['normal_40'] = $normal_40;
		$mb2['special_20'] = $special_20;
		$mb2['special_30'] = $special_30;
		$mb2['special_40'] = $special_40;
		
		
		//$obj = array($row);
		
		$list[$i] = $mb;
		//$i++; 
        $output =  json_encode($mb2);

		push_send($row['token'], $output, 3, "android");
	}
}
//push 발송
/*
echo "<pre>";
print_r($return);
echo "</pre>";
*/


api_error('000','ok', ""); //¡§ªÛ

/*
http://wnsti661.cafe24.com/Introduce/web/api/request/insert_request.php?request_id=1&ea=1000
*/

?>
