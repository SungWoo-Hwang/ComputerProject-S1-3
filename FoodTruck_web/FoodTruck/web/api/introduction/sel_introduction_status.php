<?
include "../../common.php";

$place = $_REQUEST['place'];		



$query = "select * from ".$TBA['JY_INTRODUCTION_STATUS']." as A JOIN ".$TBA['JY_MEMBER']." AS B ON A.self_id = B.key_index and A.status ='ON' and B.login_type = 1";

//echo $query;
$result = mysql_query($query);
$i = 0;
while($row = @mysql_fetch_assoc($result)){
	$categoryName = $row['place01'];  
	$jbexplode = explode( ',', $place );
  	//echo $jbexplode[0];
  	$hh = false;
	foreach( $jbexplode as $key => $value ) {
		if(strpos($categoryName, $value) !== false) {  
    		$hh = true;
		}
	}
	if($hh){
		$list[$i] = $row;
		$i++; 
	}
}

if($i == 0) api_error('001','데이터가 존재하지 않습니다.'); 



api_error('000','ok', $list); 


?>