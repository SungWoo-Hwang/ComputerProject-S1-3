<?
include "../../common.php";
$request_id = $_REQUEST['self_id'];

$normal_20 = $_REQUEST['normal_20'];
$normal_30 = $_REQUEST['normal_30'];
$normal_40 = $_REQUEST['normal_40'];

$special_20 = $_REQUEST['special_20'];
$special_30 = $_REQUEST['special_30'];
$special_40 = $_REQUEST['special_40'];
$place = $_REQUEST['place'];		//장소..


$status = $_REQUEST['status'];
//echo $request_id;

$mb = sql_fetch(" select * from ".$TBA['JY_INTRODUCTION_STATUS']." where self_id = '".$self_id."'");
$mb2 = sql_fetch(" select * from ".$TBA['JY_MEMBER']." where key_index = '".$self_id."'");

//echo $mb;
if($mb['self_id']==''){
	//æ¯¿∏∏È insert
	
	$sql = "
		insert into ".$TBA['JY_INTRODUCTION_STATUS']." set
			date='".date('Y-m-d H:i:s')."',
			self_id='".$self_id."',
			status='".$status."',
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
	update ".$TBA['JY_INTRODUCTION_STATUS']." set
		date='".date('Y-m-d H:i:s')."',
		self_id='".$self_id."',
		status='".$status."',
		normal_20='".$normal_20."',
		normal_30='".$normal_30."',
		normal_40='".$normal_40."',
		special_20='".$special_20."',
		special_30='".$special_30."',
		special_40='".$special_40."'
	where self_id='".$self_id."'";
	mysql_query($sql);
}

if($status == "ON"){
	//출근 ON
	mysql_query("UPDATE jy_member SET ing_status=1 ,  count = count + 1 WHERE key_index = ".$request_id);
	
	//업체한테 푸시 보내야함..
	$query = "select * from ".$TBA['JY_MEMBER']." where login_type = 0";

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
			$mb2['body'] = "소개소가 인원을 등록했습니다.";
			
			$mb2['status'] = $status;
			$mb2['normal_20'] = $normal_20;
			$mb2['normal_30'] = $normal_30;
			$mb2['normal_40'] = $normal_40;
			$mb2['special_20'] = $special_20;
			$mb2['special_30'] = $special_30;
			$mb2['special_40'] = $special_40;
			
			$obj = array($row);
			
			$list[$i] = $row;
			//$i++; 
			$output =  json_encode($mb2);
			//push_send($row['token'], $output, 2, "android");
		}
	}
}else{
	//출근 OFF
	mysql_query("UPDATE jy_member SET ing_status=0  , count = count + 1 WHERE key_index = ".$request_id);
}





/*
echo "<pre>";
print_r($return);
echo "</pre>";
*/


api_error('000','ok', ""); //¡§ªÛ

/*
http://wnsti661.cafe24.com/Introduce/web/api/introduction/in_out_introduction.php?self_id=1&ea=1000&status=ON
*/

?>