<?php 
	/* partId1 partName1 destcountry degree major avgmark lang rank fee */
	$info=$_POST;
	$country=$info["destcountry"];
	if(!$country&&!$_SESSION['scountry']){
		// $country="US";
		echo '<script>alert("请重新选择");location.href="javascript:history.back()"</script>';
		exit;
	}
	if(!$country){
		$country=$_SESSION['scountry'];
	}
	$degree=$info["degree"];
	$major=$info["major"];
	$avgmark=$info["avgmark"];
	$lang=$info["lang"];
	$rank=$info["rank"]*10;
	if(!$rank){
		$rank=$_SESSION['srank'];
	}
	$_SESSION['scountry']=$country;
	$_SESSION['srank']=$rank;
	$start2=$rank;
	$end2=$rank+6;
	$start1=$rank+5;
	$end1=$rank+11;
	$fee=$info["fee"];
	// var_dump($_POST);
	require_once($_SERVER["DOCUMENT_ROOT"].'/php/lib/PDOIGOWAPDB.class.php');
	$db = PDODB::getCMS_DB();
	$sql1="select * from t_schools where s_country_code='$country' and college_index>$start1 and college_index<$end1";
	$sqlc1="select count(*) count1 from t_schools where s_country_code='$country' and college_index>$start1 and college_index<$end1";
	$sql2="select * from t_schools where s_country_code='$country' and college_index>$start2 and college_index<$end2";
	$sqlc2="select count(*) count2 from t_schools where s_country_code='$country' and college_index>$start2 and college_index<$end2";
	// echo $sql2;
	// exit;
	$stmt1 = $db->prepare($sql1);
	$stmtc1 = $db->prepare($sqlc1);
	$stmt2 = $db->prepare($sql2);
	$stmtc2 = $db->prepare($sqlc2);
	$stmt1->execute();
	$stmtc1->execute();
	$stmt2->execute();
	$stmtc2->execute();
	while( $resultc1 = $stmtc1->fetch() ){
	  $count1=$resultc1['COUNT1'];
	}
	while( $resultc2 = $stmtc2->fetch() ){
	  $count2=$resultc2['COUNT2'];
	}
	// echo $count2;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="gb2312">
		<meta name="Keywords" content="选校,选校报告,选校引擎,选校网,选校系统,智能选校,留学选校,留学选校系统,留学院校定位系统,大学,美国留学选校,美国留学选校网站,留学美国如何选校,美国留学学校选择,英国留学选校,英国留学选校网站,留学英国如何选校,英国留学学校选择,爱尔兰留学,加拿大留学,澳大利亚留学,新西兰留学,韩国留学,日本留学,新加坡留学,马来西亚留学,香港的大学,意大利留学,荷兰留学,法国留学,欧洲留学,亚洲留学,德国留学,出国留学学校排名,美国大学,英国大学,院校排名,大学排名,世界大学排名,新通,新通教育,新通留学,排名,大学排名,世界大学排名,US News排名,美国大学排名,TIMES大学排名,泰晤士大学排名,QS大学排名,ARWU大学排名,上海交大大学排名,英国大学排名,美国大学,香港大学排名,澳州大学排名,欧洲大学排名,亚洲大学排名,英国大学,澳大利亚大学,亚洲大学,欧洲大学,加拿大大学,澳洲大学,排名信息,排名咨询,排名参考依据,专业信息排名,世界前200大学排名,世界前十大学排名,世界前五十大学排名,英国留学学校排名,美国留学学校排名
" />
<meta name="Description" content="实用全面的海外院校数据库，提供智能选校、自主选校、专家选校和排名大全，让你的选校有据可依！" />
		<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta content="black" name="apple-mobile-web-app-status-bar-style">
		<meta content="telephone=no" name="format-detection">
		<meta content="email=no" name="format-detection">
		<title>选校系统</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript" charset="utf-8" src="http://lead.soperson.com/20001470/10059602.js"></script>
		<script>
		!function(x) {
		function w() {
		var a = r.getBoundingClientRect().width;
		a / v > 540 && (a = 540 * v), x.rem = a / 16, r.style.fontSize = x.rem + "px"
		}
		var v, u, t, s = x.document, r = s.documentElement, q = s.querySelector('meta[name="viewport"]'), p = s.querySelector('meta[name="flexible"]');
		if (q) {
		var o = q.getAttribute("content").match(/initial\-scale=(["']?)([\d\.]+)\1?/);
		o && (u = parseFloat(o[2]), v = parseInt(1 / u))
		} else {
		if (p) {
		var o = p.getAttribute("content").match(/initial\-dpr=(["']?)([\d\.]+)\1?/);
		o && (v = parseFloat(o[2]), u = parseFloat((1 / v).toFixed(2)))
		}
		}
		if (!v && !u) {
		var n = (x.navigator.appVersion.match(/android/gi), x.navigator.appVersion.match(/iphone/gi)), v = x.devicePixelRatio;
		v = n ? v >= 3 ? 3 : v >= 2 ? 2 : 1 : 1, u = 1 / v
		}
		if (r.setAttribute("data-dpr", v), !q) {
		if (q = s.createElement("meta"), q.setAttribute("name", "viewport"), q.setAttribute("content", "initial-scale=" + u + ", maximum-scale=" + u + ", minimum-scale=" + u + ", user-scalable=no"), r.firstElementChild) {
		r.firstElementChild.appendChild(q)
		} else {
		var m = s.createElement("div");
		m.appendChild(q), s.write(m.innerHTML)
		}
		}
		x.dpr = v, x.addEventListener("resize", function() {
		clearTimeout(t), t = setTimeout(w, 300)
		}, !1), x.addEventListener("pageshow", function(b) {
		b.persisted && (clearTimeout(t), t = setTimeout(w, 300))
		}, !1), "complete" === s.readyState ? s.body.style.fontSize = 12 * v + "px" : s.addEventListener("DOMContentLoaded", function() {
		s.body.style.fontSize = 12 * v + "px"
		}, !1), w()
		}(window);
		</script>
	</head>
	<body>
		<div id="container">
			<div class="header">
				<a href="javascript:history.back(-2)"><img src="images/arrow.png" alt="图片" class="left-arrow"></a>
				<p class="xtmr">新通选校报告</p>
			</div>
			<div class="Choose_school">
				<div class="tab_top">
					<li class="current">保底学校</li>
					<li>核心学校</li>
				</div>
				<div class="tab_bottom">
					<div class="tab" style="display:block;">
						<div class="content">
							<?php if($count1>0): ?>
							<?php while( $result1 = $stmt1->fetch() ) : ?>
							<li style="width:100%;">
								<a href="/php/liuxue/schools_detail.php?id=<?php echo $result1['COLLEGE_ID'] ?>">
									<div class="content_a">
										<div class="left"><img src="http://www.igo.cn/liuxue/images<?php echo $result1['LOGO_PATH'] ?>"></div>
										<div class="right">
											<p><?php echo $result1['S_NAME_CN'] ?></p>
											<pre><?php echo $result1['S_NAME_EN'] ?></pre>
											<a href="/php/liuxue/schools_detail.php?id=<?php echo $result1['COLLEGE_ID'] ?>" class="btn4"><img src="images/tp4.jpg"><span>申请<br>条件</span></a>
										</div>
									</div>
								</a>
							</li>
							<?php endwhile ?>
							<?php else: ?>
							<pre class="independent">没有符合排名要求的院校，请重新查询。</pre>
							<?php endif ?>
						</div>
					</div>
					<div class="tab">
						<div class="content">
							<?php if($count2>0): ?>
							<?php while( $result2 = $stmt2->fetch() ) : ?>
							<li style="width:100%;">
								<a href="/php/liuxue/schools_detail.php?id=<?php echo $result2['COLLEGE_ID'] ?>">
									<div class="content_a">
										<div class="left"><img src="http://www.igo.cn/liuxue/images<?php echo $result2['LOGO_PATH'] ?>"></div>
										<div class="right">
											<p><?php echo $result2['S_NAME_CN'] ?></p>
											<pre><?php echo $result2['S_NAME_EN'] ?></pre>
											<a href="/php/liuxue/schools_detail.php?id=<?php echo $result2['COLLEGE_ID'] ?>" class="btn4"><img src="images/tp4.jpg"><span>申请<br>条件</span></a>
										</div>
									</div>
								</a>
							</li>
							<?php endwhile ?>
							<?php else: ?>
							<pre class="independent" style="left:-14rem">没有符合排名要求的院校，请重新查询。</pre>
							<?php endif ?>
						</div>
					</div>
				</div>
				<div class="bottom">
					<p>* 由于信息有限，选校报告仅作参考。<br>
					可以连线选校顾问，进行更加科学专业的选校规划。</p>
						<a href="#" class="btn5 common" onclick="doyoo.util.openChat('g=10061553'); return false;" target="_blank">连线选校顾问</a>
					<a href="index.shtml" class="btn6 common">返回选校系统</a>
				</div>
			</div>
			<script>
				/*$(function(){
					var country='<?php echo $country ?>';
					var rank='<?php echo $rank ?>';
					var d={country:country,rank:rank};
					var url="/php/ajax.php?action=loadSchoolSelectionReport";
					$.post(url,d,function(data, textStatus, xhr) {
						console.log(data);
					});
				})*/
			</script>
		</body>
	</html>