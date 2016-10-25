<?php 
require_once("selection.class.php");//Z:\igowap\new-school-match\selection.class.php
$selection=new selection();
$rankid=$selection->getParameter('rankid');// sub type id
$majorid=$selection->getParameter('majorid');
// $country=$selection->getCountryByMajor($majorid);//get country
$key=$selection->getParameter('key');
$key=$_GET["key"];
$ranks=$selection->getRankList($rankid,$key);// get detailed ranklist
$rankinfo=$selection->getSubRankById($rankid);
$shortname=$rankinfo['shortname'];
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
<link rel="stylesheet" href="/liuxue/css/style.css"> 
<link rel="stylesheet" type="text/css" href="css/index.css">
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
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
    <div class="header" id="new-header">
      <a href="javascript:history.back(-1)"><img src="images/arrow.png" alt="图片" class="left-arrow"></a>
      <p><?php echo $shortname; ?></p>
      <!-- <img src="images/search.png"  alt="图片"  class="right-search"> -->
         </div>
        <!--补充内容-->
     <div class="C_rank right-search" style="background:#f1f1f1;" id="new-C_rank">
          <div class="margin">
              <div class="margin_hl">
                  <input type="text" id="keywords" class="search-box" value="输入你想了解的学校，查看排名">
                  <a href="javascript:void(0);" class="search-btn radio-right"><img src="images/search.png" alt="搜索图片"></a>
              </div>
          </div>
        </div>
<!--补充内容end-->
       <div class="new-school">
        <?php for ($i=0; $i < count($ranks); $i++) : ?>
            <?php 
                $sname=$ranks[$i]['RANK_SCHOOL'];
                $sid=$selection->getSchoolId($sname);
                if(!$sid){
                    $url='onclick="doyoo.util.openChat(\'g=10061553\'); return false;"';
                }else{
                    // $url='href="/php/liuxue/school_v2_detail.php?id='.$sid.'"';
                    $url='href="school_v2_detail.php?id='.$sid.'"';
                }
            ?>
            <li><a <?php echo $url; ?>>
                 <span><?php echo $ranks[$i]['RANK_VAL'] ?></span>
                 <i style='width:12rem'><?php echo $sname; ?></i>
                 </a>
            </li>
        <?php endfor ?>   
       </div>
</div>

 <script type="text/javascript">
$('.search-box').click(function() {
          var cur=$(this);
          var key=cur.val();
     if(key=="输入你想了解的学校，查看排名"){
              $(this).val("");
     }
});
$('.search-btn').click(function() {
      var key=$('#keywords').val();
      if(!key||key=="输入你想了解的学校，查看排名"){
            alert("请输入搜索关键字");
            $('.search-box').focus();
            return false;
          }
          // var ranktype="U.S. News美国综合大学排名";
          window.location.href=window.location+"&key="+key;
});
</script>
<script type="text/javascript" charset="utf-8" src="http://lead.soperson.com/20001470/10059602.js">
</script>
</body>
</html>