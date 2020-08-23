<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi" />
		<title>퀵딜 관리자</title>
		<?if($header_data){?>
			<link rel="stylesheet" type="text/css" href="<?=$admin_css_url?>/login.css" />
		<?} else {?>
			<link rel="stylesheet" type="text/css" href="<?=$admin_css_url?>/default.css" />
			<link rel="stylesheet" type="text/css" href="<?=$admin_css_url?>/common.css" />
			<link rel="stylesheet" type="text/css" href="<?=$admin_css_url?>/table.css" />
			<link rel="stylesheet" type="text/css" href="<?=$admin_css_url?>/layout.css" />
			<link rel="stylesheet" type="text/css" href="<?=$admin_css_url?>/sub.css" />
			<link rel="stylesheet" type="text/css" href="<?=$admin_css_url?>/calendar.css" />
		<?}?>
		<!--[if lt IE 9]>
			<script type="text/javascript" src="<?=$admin_js_url?>/html5.js"></script>
		<![endif]-->
		<script src="<?=$admin_js_url?>/jquery-1.8.3.min.js"></script>
		<script src="<?=$admin_js_url?>/common.js"></script>
	</head>

	<body <?if($left_no != "left_no"){?>class="system_area"<?}?>>

	<div id="wrap">
