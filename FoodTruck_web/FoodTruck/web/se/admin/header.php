<!-- header -->
<div id="header">
<header>
	<!-- gnb_menu -->
	<div id="nav">
	<nav>
		<ul class="menu">
			<li class="logo_title"><a href="<?=$ic_page_url?>=dashboard" ><span>퀵딜 관리자</span></a></li>

			<li <?if($ic_page == "member"){?>class="on"<?}?>><a href="<?=$ic_page_url?>=member" ><span>회원관리</span></a></li>
			<li <?if($ic_page == "moving"){?>class="on"<?}?>><a href="<?=$ic_page_url?>=moving" ><span>배송관리</span></a></li>
			<li <?if($ic_page == "charge"){?>class="on"<?}?>><a href="<?=$ic_page_url?>=charge" ><span>정산관리</span></a></li>
			<li <?if($ic_page == "message"){?>class="on"<?}?>><a href="<?=$ic_page_url?>=message" ><span>메시지관리</span></a></li>
			<li <?if($ic_page == "customer"){?>class="on"<?}?>><a href="<?=$ic_page_url?>=customer" ><span>고객센터</span></a></li>
			<li <?if($ic_page == "set"){?>class="on"<?}?>><a href="<?=$ic_page_url?>=set" ><span>설정</span></a></li>
			<li <?if($ic_page == "visit"){?>class="on"<?}?>><a href="<?=$ic_page_url?>=visit" ><span>통계</span></a></li>
		</ul>
	</nav>
	</div>
	<!--// gnb_menu -->
	<!-- hsection -->
	<div class="hsection_area">
		<span>HI 관리자님</span>
		<a href="#" class="btn logout" title="로그아웃 하기">
			<span>Log Out</span>
		</a>
	</div>
	<!--// hsection -->
</header>
</div>
<!-- //header -->