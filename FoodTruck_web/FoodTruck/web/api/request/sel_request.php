<?
include "../../common.php";

$place = $_REQUEST['place'];		
	


$query = "select * from ".$TBA['JY_REQUEST']." as A JOIN ".$TBA['JY_MEMBER']." AS B ON A.request_id = B.key_index
and B.login_type = 0 and B.token != ''"; 

//echo $place;
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