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
<meta name="Keywords" content="ѡУ,ѡУ����,ѡУ����,ѡУ��,ѡУϵͳ,����ѡУ,��ѧѡУ,��ѧѡУϵͳ,��ѧԺУ��λϵͳ,��ѧ,������ѧѡУ,������ѧѡУ��վ,��ѧ�������ѡУ,������ѧѧУѡ��,Ӣ����ѧѡУ,Ӣ����ѧѡУ��վ,��ѧӢ�����ѡУ,Ӣ����ѧѧУѡ��,��������ѧ,���ô���ѧ,�Ĵ�������ѧ,��������ѧ,������ѧ,�ձ���ѧ,�¼�����ѧ,����������ѧ,��۵Ĵ�ѧ,�������ѧ,������ѧ,������ѧ,ŷ����ѧ,������ѧ,�¹���ѧ,������ѧѧУ����,������ѧ,Ӣ����ѧ,ԺУ����,��ѧ����,�����ѧ����,��ͨ,��ͨ����,��ͨ��ѧ,����,��ѧ����,�����ѧ����,US News����,������ѧ����,TIMES��ѧ����,̩��ʿ��ѧ����,QS��ѧ����,ARWU��ѧ����,�Ϻ������ѧ����,Ӣ����ѧ����,������ѧ,��۴�ѧ����,���ݴ�ѧ����,ŷ�޴�ѧ����,���޴�ѧ����,Ӣ����ѧ,�Ĵ����Ǵ�ѧ,���޴�ѧ,ŷ�޴�ѧ,���ô��ѧ,���޴�ѧ,������Ϣ,������ѯ,�����ο�����,רҵ��Ϣ����,����ǰ200��ѧ����,����ǰʮ��ѧ����,����ǰ��ʮ��ѧ����,Ӣ����ѧѧУ����,������ѧѧУ����
" />
<meta name="Description" content="ʵ��ȫ��ĺ���ԺУ���ݿ⣬�ṩ����ѡУ������ѡУ��ר��ѡУ��������ȫ�������ѡУ�оݿ�����" />
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<meta content="email=no" name="format-detection">
<title>ѡУϵͳ</title>
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
      <a href="javascript:history.back(-1)"><img src="images/arrow.png" alt="ͼƬ" class="left-arrow"></a>
      <p><?php echo $shortname; ?></p>
      <!-- <img src="images/search.png"  alt="ͼƬ"  class="right-search"> -->
         </div>
        <!--��������-->
     <div class="C_rank right-search" style="background:#f1f1f1;" id="new-C_rank">
          <div class="margin">
              <div class="margin_hl">
                  <input type="text" id="keywords" class="search-box" value="���������˽��ѧУ���鿴����">
                  <a href="javascript:void(0);" class="search-btn radio-right"><img src="images/search.png" alt="����ͼƬ"></a>
              </div>
          </div>
        </div>
<!--��������end-->
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
     if(key=="���������˽��ѧУ���鿴����"){
              $(this).val("");
     }
});
$('.search-btn').click(function() {
      var key=$('#keywords').val();
      if(!key||key=="���������˽��ѧУ���鿴����"){
            alert("�����������ؼ���");
            $('.search-box').focus();
            return false;
          }
          // var ranktype="U.S. News�����ۺϴ�ѧ����";
          window.location.href=window.location+"&key="+key;
});
</script>
<script type="text/javascript" charset="utf-8" src="http://lead.soperson.com/20001470/10059602.js">
</script>
</body>
</html>