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
function get_member($id, $fields='*')
{
    global $TBA;
    //echo " select $fields from ".$TBA['JY_MEMBER']." where id = TRIM('$id') ";
    return sql_fetch(" select $fields from mem_tb where ID = TRIM('$id') ");
}

function get_key_member($key_index, $fields='*')
{
    global $TBA;
    //echo " select $fields from ".$TBA['JY_MEMBER']." where id = TRIM('$id') ";
    return sql_fetch(" select $fields from mem_tb where KEYINDEX = TRIM('$key_index') ");
}

function get_phone_member($phone_number, $fields='*')
{
    global $TBA;
    //echo " select $fields from ".$TBA['JY_MEMBER']." where id = TRIM('$id') ";
    return sql_fetch(" select $fields from ".$TBA['JY_MEMBER']." where phone_number = TRIM('$phone_number') ");
}

function get_number_member($number, $fields='*')
{
    global $TBA;
    //echo " select $fields from ".$TBA['JY_MEMBER']." where id = TRIM('$id') ";
    return sql_fetch(" select $fields from ".$TBA['JY_MEMBER']." where number = TRIM('$number') ");
}

function get_account($self_id, $fields='*')
{
    global $TBA;
    //echo " select $fields from ".$TBA['JY_MEMBER']." where id = TRIM('$id') ";
    return sql_fetch(" select $fields from ".$TBA['JY_ACCOUNT']." where status = 0 and self_id = TRIM('$self_id') ");
}

function get_admin_member($id, $fields='*')
{
    global $TBA;
    //echo " select $fields from ".$TBA['JY_MEMBER']." where id = TRIM('$id') ";
    return sql_fetch(" select $fields from ".$TBA['ADM_TABLE']." where mb_id = TRIM('$id') ");
}

function get_choo($id, $fields='*')
{
    global $TBA;
    //echo " select $fields from ".$TBA['JY_MEMBER']." where id = TRIM('$id') ";
    return sql_fetch(" select $fields from ".$TBA['JY_MEMBER']." where id = TRIM('$id') ");
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
		@Img_Resize($upload_file);
		return $return;
	} else {
		exit('Upload failed!');
	}
}

function file_upload_array($u, $file, $folder, $allowExt, $file_name) {
	$ext = substr(strrchr($file['name'][$u], '.'), 1);
	$return[0] = $file['name'][$u];
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

	if(@move_uploaded_file($file['tmp_name'][$u], $upload_file)) {
		@chmod($upload_file, 0707);
		$return[1] = $file_name.'.'.strtolower($ext);
		@Img_Resize($upload_file);
		return $return;
	} else {
		exit('Upload failed!');
	}
}


function Img_Resize($file_path){
	$target_width = 1600; 
	$target_height = 1600; 

	if (@ob_get_level() == 0) ob_start(); 
		if ($file != "." && $file != "..") { 
		  $destination_path = $file_path; 
		  $target_path = $destination_path . basename($file); 

		  $extension = pathinfo($target_path); 
		  $allowed_ext = "jpg, gif, png, bmp, jpeg, JPG"; 
		  $extension = $extension[extension]; 
		  $allowed_paths = explode(", ", $allowed_ext); 
		  $ok = 0; 
		  for($i = 0; $i < count($allowed_paths); $i++) { 
			if ($allowed_paths[$i] == "$extension") { 
			  $ok = "1"; 
			} 
		  } 

		  if ($ok == "1") { 

			if($extension == "jpg" || $extension == "jpeg" || $extension == "JPG"){ 
			  $tmp_image=imagecreatefromjpeg($target_path); 
			} 

			if($extension == "png") { 
			  $tmp_image=imagecreatefrompng($target_path); 
			} 

			if($extension == "gif") { 
			  $tmp_image=imagecreatefromgif($target_path); 
			} 

			$width = imagesx($tmp_image); 
			$height = imagesy($tmp_image); 

			//calculate the image ratio 
			$imgratio = ($width / $height); 

			if ($imgratio>1) { 
			  $new_width = $target_width; 
			  $new_height = ($target_width / $imgratio); 
			} else { 
			  $new_height = $target_height; 
			  $new_width = ($target_height * $imgratio); 
			} 

			$new_image = imagecreatetruecolor($new_width,$new_height); 
			imagecopyresampled($new_image, $tmp_image,0,0,0,0, $new_width, $new_height, $width, $height); 
			//Grab new image 
			//imagejpeg($new_image, $target_path, 75); 

			if($extension == "jpg" || $extension == "jpeg" || $extension == "JPG"){ 
				imagejpeg($new_image, $target_path, 95); 
			} 

			if($extension == "png") { 
				imagepng($new_image, $target_path); 
			} 

			if($extension == "gif") { 
				imagegif($new_image, $target_path); 
			} 

			$image_buffer = ob_get_contents(); 
			ImageDestroy($new_image); 
			ImageDestroy($tmp_image); 
			//echo " $file resized to $new_width x $new_height <br> \n"; 
			ob_flush(); 
			flush(); 
		  } 
	 // echo "Done."; 
	  @ob_end_flush(); 
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
	global $ic_page, $ic_sub_page, $view_type, $ic_page_tab, $store_code, $sdate, $edate, $cate1, $cate2, $cate3, $pt, $vidx;

	$page= @floor($start/($scale*$pagescale));
	$total_page = @ceil($total/($scale*$pagescale));
	$total_page_last = @floor($total/$scale);

	$page_link = "&ic_page=$ic_page&ic_page_tab=$ic_page_tab&ic_sub_page=$ic_sub_page&search_val=$search_val&search_sel=$search_sel&view_type=$view_type&store_code=$store_code&sdate=$sdate&edate=$edate&cate1=$cate1&cate2=$cate2&cate3=$cate3&pt=$pt&vidx=$vidx";

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

function api_error($code, $txt, $member='', $na=''){
	$groupData['rc'] = $code;
	$groupData['rc_txt'] = $txt;
	$groupData['rc_data'] = $member;
	$output = json_encode($groupData);
	echo $output;
	exit;
}

function api_error_list($code, $txt, $member='', $totalpage='', $thispage='', $totalcount=''){
	$groupData['rc'] = $code;
	$groupData['rc_txt'] = $txt;
	$groupData['totalcount'] = $totalcount;
	$groupData['total_page'] = $totalpage;
	$groupData['this_page'] = $thispage;
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


//안드로이드 푸시 발송
function push_send($reg_id, $message,$type, $device) {
	$GOOGLE_GCM_URL = "https://fcm.googleapis.com/fcm/send";
    /*
     type 정의
     0 = 공지사항
     1 = 매장 - > 고객 전송
     
     
     */
//	 echo $type;
	if($device == "ios"){
		$yummy = json_decode($message);
		$obj = array("msg" => $message);
		$output =  json_encode($obj);
		$fields = array(
			 'registration_ids'  => array( $reg_id ),
			 'mutable_content'=> true,
			 
			 "data" => (
      				array( "title" => "MICHAA"  ,
									  "body" => $yummy->msg ,
									  "sound"=> "default",
									  "data" => $output,
									  "type" => $type )
			  ),


		
			 'notification' => array( "title" => "MICHAA"  ,
						 			 "content-available" => true,
						 			 "mutable-content"=> true,
									  "body" => $yummy->msg ,
									  "sound"=> "default",
									  "data" => $output,
									  "type" => $type )
                        
            
		 );

		
		
		$headers = array(
			'Authorization: key=AAAAVDhA4K8:APA91bEJe0PDb-QPUmaHFCsXphXaSZNSqQEZnEb48cQ10Ts-LRdLN0KeEIgM1zqk76AGIF_pU-Gk5UhZe_JmWRdsuVnvL_aga9ZxYGWRu_Qm7yOX7Ax3B4Fi1-ZPmvz3N7ICUftycV8o',
			'Content-Type: application/json'
		);
	} else {
		$fields;
		$obj = array("msg" => $message);
		$output =  json_encode($obj);
		$fields = array(
			'registration_ids'  => array( $reg_id ),
			'data'              => array( "title" => "LineUp" , "body" => $output , "type" => $type ),
		);
		//echo $output."<BR>";

		$headers = array(
			'Authorization: key=AAAAVDhA4K8:APA91bEJe0PDb-QPUmaHFCsXphXaSZNSqQEZnEb48cQ10Ts-LRdLN0KeEIgM1zqk76AGIF_pU-Gk5UhZe_JmWRdsuVnvL_aga9ZxYGWRu_Qm7yOX7Ax3B4Fi1-ZPmvz3N7ICUftycV8o',
			'Content-Type: application/json'
		);
	}

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $GOOGLE_GCM_URL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Problem occurred: ' . curl_error($ch));
    }

    curl_close($ch);
    //echo $result;
}


//안드로이드 푸시 발송
function push_send2($reg_id, $message,$type, $device) {

	$GOOGLE_GCM_URL = "https://fcm.googleapis.com/fcm/send";
    /*
     type 정의
     0 = 공지사항
     1 = 매장 - > 고객 전송
     
     
     */
//	 echo $type;
	if($device == "ios"){
		$yummy = json_decode($message);
		$obj = array("msg" => $message);
		$output =  json_encode($obj);
		$fields = array(
			 'registration_ids'  => $reg_id,
			 'mutable_content'=> true,
			 
			 "data" => (
      				array( "title" => "MICHAA"  ,
									  "body" => $yummy->msg ,
									  "sound"=> "default",
									  "data" => $output,
									  "type" => $type )
			  ),


		
			 'notification' => array( "title" => "MICHAA"  ,
						 			 "content-available" => true,
						 			 "mutable-content"=> true,
									  "body" => $yummy->msg ,
									  "sound"=> "default",
									  "data" => $output,
									  "type" => $type )
                        
            
		 );

		
		
		$headers = array(
			'Authorization: key=AAAAVDhA4K8:APA91bEJe0PDb-QPUmaHFCsXphXaSZNSqQEZnEb48cQ10Ts-LRdLN0KeEIgM1zqk76AGIF_pU-Gk5UhZe_JmWRdsuVnvL_aga9ZxYGWRu_Qm7yOX7Ax3B4Fi1-ZPmvz3N7ICUftycV8o',
			'Content-Type: application/json'
		);
	} else {
		$fields;
		$obj = array("msg" => $message);
		$output =  json_encode($obj);
		$fields = array(
			'registration_ids'  => $reg_id,
			'data'              => array( "title" => "LineUp" , "body" => $output , "type" => $type ),
		);
		//echo $output."<BR>";

		$headers = array(
			'Authorization: key=AAAAVDhA4K8:APA91bEJe0PDb-QPUmaHFCsXphXaSZNSqQEZnEb48cQ10Ts-LRdLN0KeEIgM1zqk76AGIF_pU-Gk5UhZe_JmWRdsuVnvL_aga9ZxYGWRu_Qm7yOX7Ax3B4Fi1-ZPmvz3N7ICUftycV8o',
			'Content-Type: application/json'
		);
	}

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $GOOGLE_GCM_URL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Problem occurred: ' . curl_error($ch));
    }

    curl_close($ch);
    echo $result;
}

function passwordCheck($_str)
{
    $pw = $_str;
    $num = preg_match('/[0-9]/u', $pw);
    $eng = preg_match('/[a-z]/u', $pw);
    $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);
 
    if(strlen($pw) < 4)
    {
        return array(false,"min");
        exit;
    }
 
    if(preg_match("/\s/u", $pw) == true)
    {
        return array(false, "space");
        exit;
    }
 
    if( $num == 0 || $eng == 0)
    {
        return array(false, "not");
        exit;
    }
 
    return array(true);
}

?>
