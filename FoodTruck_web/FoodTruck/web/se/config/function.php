<?

// 경고메세지를 경고창으로
function alert($msg='', $url='', $error=true, $post=false)
{
    global $g5, $config, $member, $_SESSION, $home_url;
    global $is_admin;

    $msg = $msg ? strip_tags($msg, '<br>') : '올바른 방법으로 이용해 주십시오.';
	
	//$_SESSION['get_url'] = $url;


    $header = '';
    if (isset($g5['title'])) {
        $header = $g5['title'];
    }

	if ($url) {
		$url_ck = "document.location.replace('".str_replace('&amp;', '&', $url)."');";
	} else {
		$url_ck =" history.back();";
	}

	echo '
	<script>
		alert("'.$msg.'");
		'.$url_ck.'
	</script>
	';
    exit;
}


// 경고메세지 출력후 창을 닫음
function alert_close($msg, $error=true)
{
    global $g5;
    
    $msg = strip_tags($msg, '<br>');

    $header = '';
    if (isset($g5['title'])) {
        $header = $g5['title'];
    }
	echo '
	<script>
		alert("'.$msg.'");
		window.close();
	</script>
	';
    exit;
}

// 회원 정보를 얻는다.
function get_member($mb_id, $fields='*')
{
    global $TBA;
    return sql_fetch(" select $fields from ".$TBA['MEM_TABLE']." where mb_id = TRIM('$mb_id') ");
}

// 회원 정보를 idx로 얻는다.
function get_member_idx($mb_idx, $fields='*')
{
    global $TBA;
    return sql_fetch(" select $fields from ".$TBA['MEM_TABLE']." where idx = TRIM('$mb_idx') ");
}



// 문자열 암호화
function get_encrypt_string($str)
{
    if(defined('G5_STRING_ENCRYPT_FUNCTION') && G5_STRING_ENCRYPT_FUNCTION) {
        $encrypt = call_user_func(G5_STRING_ENCRYPT_FUNCTION, $str);
    } else {
        $encrypt = sql_password($str);
    }

    return $encrypt;
}

// 비밀번호 비교
function check_password($pass, $hash)
{
    $password = get_encrypt_string($pass);
    return ($password === $hash);
}

function sql_password($value)
{
    // mysql 4.0x 이하 버전에서는 password() 함수의 결과가 16bytes
    // mysql 4.1x 이상 버전에서는 password() 함수의 결과가 41bytes
    $row = sql_fetch(" select password('$value') as pass ");

    return $row['pass'];
}

function sql_fetch($sql){
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    return $row;
}


// header("location:URL") 을 대체
function goto_url($url)
{
    global $_SESSION, $home_url;
    $url = str_replace("&amp;", "&", $url);
    echo "<script> location.replace('$url'); </script>";



    if (!headers_sent())
        header('Location: '.$url);
    else {
        echo '<script>';
        echo 'location.replace("'.$url.'");';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>';
    }
    exit;
}

function file_upload($file, $folder, $allowExt, $file_name) {
	$ext = substr(strrchr($file['name'], '.'), 1);
	$return[0] = $file['name'];
	if($ext) {
		$allow = explode(',', $allowExt);

		if(is_array($allow)) {
			 $check = in_array($ext, $allow);
		} else {
			 $check = ($ext == $allow) ? true : false;
		}
	}
	if(!$ext || !$check) exit('You can not upload '.$ext.' files!');
	$upload_file = $folder.$file_name.'.'.strtolower($ext);

	if(@move_uploaded_file($file['tmp_name'], $upload_file)) {
		@chmod($upload_file, 0707);
		$return[1] = $file_name.'.'.strtolower($ext);
		return $return;
	} else {
		exit('Upload failed!');
	}
}


function remoteFileExists($url) {
    $curl = curl_init($url);

    //don't fetch the actual page, you only want to check the connection is ok
    curl_setopt($curl, CURLOPT_NOBODY, true);

    //do request
    $result = curl_exec($curl);

    $ret = false;

    //if request did not fail
    if ($result !== false) {
        //if request was ok, check response code
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);  

        if ($statusCode == 200) {
            $ret = true;   
        }
    }

    curl_close($curl);

    return $ret;
}

function insert_cash_log($mb_id, $u_price, $content=''){

    if ($mb_id == '') { return 0; }

    $mb = sql_fetch(" select mb_id, mb_price from f_member where mb_id = '$mb_id' ");
    if (!$mb['mb_id']) { return 0; }

    $sql = "insert into cash_log set 
				signdate = '".mktime()."',
				date_y = '".date('Y')."',
				date_m = '".date('m')."',
				date_d = '".date('d')."',
				mb_id = '".$mb_id."',
				use_price = '".$u_price."',
				log_price = '".$mb['mb_price']."',
				comment = '".addslashes($content)."'
			";
    mysql_query($sql);

    return 1;
}

function insert_point_log($mb_id, $u_price, $content=''){

    if ($mb_id == '') { return 0; }

    $mb = sql_fetch(" select mb_id, mb_point from f_member where mb_id = '$mb_id' ");
    if (!$mb['mb_id']) { return 0; }

    $sql = "insert into point_log set 
				signdate = '".mktime()."',
				date_y = '".date('Y')."',
				date_m = '".date('m')."',
				date_d = '".date('d')."',
				mb_id = '".$mb_id."',
				use_point = '".$u_price."',
				log_point = '".$mb['mb_point']."',
				comment = '".addslashes($content)."'
			";
    mysql_query($sql);

    return 1;
}


function paging_func(){
	global $home_img_url, $start, $scale, $pagescale, $total, $search_val, $search_sel, $search_radio, $PHP_SELF;
	global $ic_page, $ic_sub_page, $view_type, $ic_page_tab;

	$page= @floor($start/($scale*$pagescale));
	$total_page = @ceil($total/($scale*$pagescale));
	$total_page_last = @floor($total/$scale);

	$page_link = "&ic_page=$ic_page&ic_page_tab=$ic_page_tab&ic_sub_page=$ic_sub_page&search_val=$search_val&search_sel=$search_sel&view_type=$view_type";

	if(($start+1) >= $total_page){
		$total_page_last = "javascript: alert(\"This is the last page.\");";
		$total_page_last= "$PHP_SELF?start=".($total_page-1)."".$page_link."";
	} else {
		$total_page_last= "$PHP_SELF?start=".($total_page-1)."".$page_link."";
	}
	//echo $n_start;


	$tmp_prev = $start - 1; // 이전 누르면 찾아갈 곳
	$tmp_next = $start + 1; // 다음 누르면 찾아갈 곳

	if($start == 0){
		$perv_link = "javascript: alert(\"This is the first page.\");";
		$perv_link = "$PHP_SELF?start=".($start)."".$page_link."";
	} else {
		$perv_link = "$PHP_SELF?start=".($tmp_prev)."".$page_link."";
	}
	if(($start+1) == $total_page){
		$next_link = "javascript: alert(\"This is the last page.\");";
		$next_link = "$PHP_SELF?start=".($start)."".$page_link."";
	} else {
		$next_link = "$PHP_SELF?start=".($tmp_next)."".$page_link."";
	}

	$page_html = "
		<div class='paging_area02'>
			<a href='$PHP_SELF?start=0".$page_link."' class='stimg link_cking' title='맨처음 페이지로 이동'><img src='".$home_img_url."/common/btn_paging_first_on.png' alt='맨처음 페이지로 이동'></a>
			<a href='".$perv_link."' class='stimg link_cking' title='전 페이지로 이동'><img src='".$home_img_url."/common/btn_paging_prev_on.png' alt='전 페이지로 이동'></a>
			page
			<strong>".($start+1)."</strong>
			of ".$total_page."
			<a href='".$next_link."' class='stimg link_cking' title='다음 페이지로 이동'><img src='".$home_img_url."/common/btn_paging_next_on.png' alt='다음 페이지로 이동'></a>
			<a href='".$total_page_last."' class='stimg link_cking' title='맨마지막 페이지로 이동'><img src='".$home_img_url."/common/btn_paging_last_on.png' alt='맨마지막 페이지로 이동'></a>
		</div>
	";

	print $page_html;
}

function Car_select($selectname, $selecter){
	global $config;
	
	echo "
	<select name='".$selectname."'>
		<option value='' >선택하세요.
	";
	$ex_car_info = explode("[@@@]", $config['carinfo']);
	for($i = 0; $i < count($ex_car_info); $i++){
		if($selecter == $ex_car_info[$i]){
			echo "<option value='".$ex_car_info[$i]."' selected>".$ex_car_info[$i];
		} else {
			echo "<option value='".$ex_car_info[$i]."'>".$ex_car_info[$i];
		}
	}
	echo "
	</select>
	";

}

function api_error($code, $txt, $member=''){
	$groupData['rc'] = $code;
	$groupData['rc_txt'] = $txt;
	$groupData['rc_data'] = $member;
	$output = json_encode($groupData);
	echo $output;
	exit;
}

function api_sms_error($code, $txt, $rand_code=''){
	$groupData['rc'] = $code;
	$groupData['rc_txt'] = $txt;
	$groupData['rc_data'] = $rand_code;

	$output = json_encode($groupData);
	echo $output;
	exit;
}

function api_config($charge_p, $config){
	$groupData['rc_charge_point'] = $charge_p;
	$groupData['rc_data'] = $config;

	$output = json_encode($groupData);
	echo $output;
	exit;
}

function sms_send_func($phone, $msg){

	/******************** 인증정보 ********************/
	$sms_url = "https://sslsms.cafe24.com/sms_sender.php"; // HTTPS 전송요청 URL
	// $sms_url = "http://sslsms.cafe24.com/sms_sender.php"; // 전송요청 URL
	$sms['user_id'] = base64_encode("bts01"); //SMS 아이디.
	$sms['secure'] = base64_encode("8e29e7bd55b07247480907f63b035b6e") ;//인증키

	$sms['msg'] = base64_encode(stripslashes($msg));
	if( $_POST['smsType'] == "L"){
		  $sms['subject'] =  base64_encode($msg);
	}
	$sms['rphone'] = base64_encode($phone);
	$sms['sphone1'] = base64_encode('010');
	$sms['sphone2'] = base64_encode('8290');
	$sms['sphone3'] = base64_encode('8262');
	$sms['rdate'] = base64_encode($_POST['rdate']);
	$sms['rtime'] = base64_encode($_POST['rtime']);
	$sms['mode'] = base64_encode("1"); // base64 사용시 반드시 모드값을 1로 주셔야 합니다.
	$sms['returnurl'] = base64_encode($_POST['returnurl']);
	$sms['testflag'] = base64_encode($_POST['testflag']);
	$sms['destination'] = strtr(base64_encode($_POST['destination']), '+/=', '-,');
	$returnurl = $_POST['returnurl'];
	$sms['repeatFlag'] = base64_encode($_POST['repeatFlag']);
	$sms['repeatNum'] = base64_encode($_POST['repeatNum']);
	$sms['repeatTime'] = base64_encode($_POST['repeatTime']);
	$sms['smsType'] = base64_encode($_POST['smsType']); // LMS일경우 L
	$nointeractive = $_POST['nointeractive']; //사용할 경우 : 1, 성공시 대화상자(alert)를 생략

	$host_info = explode("/", $sms_url);
	$host = $host_info[2];
	$path = $host_info[3]."/".$host_info[4];

	srand((double)microtime()*1000000);
	$boundary = "---------------------".substr(md5(rand(0,32000)),0,10);
	//print_r($sms);

	// 헤더 생성
	$header = "POST /".$path ." HTTP/1.0\r\n";
	$header .= "Host: ".$host."\r\n";
	$header .= "Content-type: multipart/form-data, boundary=".$boundary."\r\n";

	// 본문 생성
	foreach($sms AS $index => $value){
		$data .="--$boundary\r\n";
		$data .= "Content-Disposition: form-data; name=\"".$index."\"\r\n";
		$data .= "\r\n".$value."\r\n";
		$data .="--$boundary\r\n";
	}
	$header .= "Content-length: " . strlen($data) . "\r\n\r\n";

	$fp = fsockopen($host, 80);

	if ($fp) {
		fputs($fp, $header.$data);
		$rsp = '';
		while(!feof($fp)) {
			$rsp .= fgets($fp,8192);
		}
		fclose($fp);
		$msg = explode("\r\n\r\n",trim($rsp));
		$rMsg = explode(",", $msg[1]);
		$Result= $rMsg[0]; //발송결과
		$Count= $rMsg[1]; //잔여건수

		//발송결과 알림
		if($Result=="success") {
			$alert = "성공";
			$alert .= " 잔여건수는 ".$Count."건 입니다.";
		}
		else if($Result=="reserved") {
			$alert = "성공적으로 예약되었습니다.";
			$alert .= " 잔여건수는 ".$Count."건 입니다.";
		}
		else if($Result=="3205") {
			$alert = "잘못된 번호형식입니다.";
		}

		else if($Result=="0044") {
			$alert = "스팸문자는발송되지 않습니다.";
		}

		else {
			$alert = "[Error]".$Result;
		}
	}
	else {
		$alert = "Connection Failed";
	}

	return $Result;


}

?>