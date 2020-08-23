<!-- header -->
<div id="header">
<header>
	<!-- gnb_menu -->
	<div id="nav">
	<nav>
		<ul class="menu">
			<li class="logo_title"><a href="<?=$ic_page_url?>=member" ><span>미샤톡 매니저 관리</span></a></li>

			<li <?if($ic_page == "member"){?>class="on"<?}?>><a href="<?=$ic_page_url?>=member" ><span>고객</span></a></li>
			<li <?if($ic_page == "timeline"){?>class="on"<?}?>><a href="<?=$ic_page_url?>=timeline" ><span>타임라인</span></a></li>
			<li <?if($ic_page == "product"){?>class="on"<?}?>><a href="<?=$ic_page_url?>=product" ><span>위시리스트</span></a></li>
		</ul>
	</nav>
	</div>
	<!--// gnb_menu -->
	<!-- hsection -->
	<div class="hsection_area">
		<span>HI 매니저님</span>
		<a href="<?=$home_mng_proc_url?>/logout.php" class="btn logout" title="로그아웃 하기">
			<span>Log Out</span>
		</a>
	</div>
	<!--// hsection -->
</header>
</div>
<!-- //header -->