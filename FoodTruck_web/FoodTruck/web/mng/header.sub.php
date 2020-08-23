<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi" />
		<title>미샤톡 매니저 관리</title>
		<?if($header_data){?>
			<link rel="stylesheet" type="text/css" href="<?=$mng_css_url?>/login.css" />
		<?} else {?>
			<link rel="stylesheet" type="text/css" href="<?=$mng_css_url?>/default.css" />
			<link rel="stylesheet" type="text/css" href="<?=$mng_css_url?>/common.css" />
			<link rel="stylesheet" type="text/css" href="<?=$mng_css_url?>/table.css" />
			<?if($layout_no != "no"){?>
			<link rel="stylesheet" type="text/css" href="<?=$admin_css_url?>/layout.css" />
			<?}?>
			<link rel="stylesheet" type="text/css" href="<?=$mng_css_url?>/sub.css" />
			<link rel="stylesheet" type="text/css" href="<?=$mng_css_url?>/calendar.css" />
		<?}?>
		<!--[if lt IE 9]>
			<script type="text/javascript" src="<?=$mng_js_url?>/html5.js"></script>
		<![endif]-->
		<script src="<?=$mng_js_url?>/jquery-1.8.3.min.js"></script>
		<script src="<?=$mng_js_url?>/common.js"></script>

		<link type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" />

		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
		<script>
		jQuery(function($){
			$.datepicker.regional["ko"] = {
				closeText: "닫기",
				prevText: "이전달",
				nextText: "다음달",
				currentText: "오늘",
				monthNames: ["1월(JAN)","2월(FEB)","3월(MAR)","4월(APR)","5월(MAY)","6월(JUN)", "7월(JUL)","8월(AUG)","9월(SEP)","10월(OCT)","11월(NOV)","12월(DEC)"],
				monthNamesShort: ["1월","2월","3월","4월","5월","6월", "7월","8월","9월","10월","11월","12월"],
				dayNames: ["일","월","화","수","목","금","토"],
				dayNamesShort: ["일","월","화","수","목","금","토"],
				dayNamesMin: ["일","월","화","수","목","금","토"],
				weekHeader: "Wk",
				dateFormat: "yymmdd",
				firstDay: 0,
				isRTL: false,
				showMonthAfterYear: true,
				yearSuffix: ""
			};
			$.datepicker.setDefaults($.datepicker.regional["ko"]);
		});
		</script>

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	</head>

	<body <?if($left_no != "left_no"){?>class="system_area"<?}?>>

	<div id="wrap">
