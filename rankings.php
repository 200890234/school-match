<?php 
require_once($_SERVER["DOCUMENT_ROOT"].'/php/lib/PDOIGOWAPDB.class.php');
$listname=$_GET['list'];
if ($listname=="2016���޴�ѧ�Ǽ�����") {
  $style="width:8.9rem";
}else{
  $style="width:12rem";
}
// echo $style;
$key=$_GET['key'];
if($key){
  $add=" and rs.SCHOOL_NAME_CN like '%$key%'";
}else{
  $add="";
}
$db = PDODB::getCMS_DB();
$sql="select rs.*,s2.college_id from t_ranking_schools rs left join(select * from (select s.*,row_number() over(partition by s.s_name_cn order by s.college_id) r from t_schools s ) where r=1) s2 on rs.school_name_cn=s2.s_name_cn where rs.ranking_type_name='$listname'".$add." order by rs.myorder asc";
// echo $sql;exit;
$stmt = $db->prepare($sql);
$stmt->execute( );
while( $result = $stmt->fetch() ){
  $namelist[]=$result['SCHOOL_NAME_CN'];
  
  if($listname=='QS�����ѧӢ������ԺУ����'){
    $rankinglist[]=$result['MYORDER'];
  }else{
    $rankinglist[]=$result['RANKING'];
  }
  $orderlist[]=$result['MYORDER'];
  $linkid[]=$result['COLLEGE_ID'];
  $starlist[]=$result['STAR'];
}
$scount=count($namelist);
function setUrl($linkid){
  if(!$linkid){
    $url='onclick="doyoo.util.openChat(\'g=10061553\'); return false;"';
  }else{
    $url='href="/php/liuxue/schools_detail.php?id='.$linkid.'"';
  }
  return $url;
}
$starimg=array(
    5=>"images/tp41.png",
    4=>"images/tp42.png",
    3=>"images/tp43.png",
    2=>"images/tp44.png",
    1=>"images/tp45.png",
  );
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
<link rel="stylesheet" type="text/css" href="css/index.css">
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script src="js/jquery.mousewheel.min.js"></script>
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
<script type="text/javascript" charset="utf-8" src="http://lead.soperson.com/20001470/10059602.js"></script>
</head>
<body>
<div id="container">
	  <div class="header">
			<a href="javascript:history.back(-1)"><img src="images/arrow.png" alt="ͼƬ" class="left-arrow"></a>
			<p class="mr"><?php echo $listname; ?></p>
	</div>
    <div class="University_rank">
       <div class="rank">
           <li style="margin-left:0.45rem;" class="curr">1-50��</li>
           <li>51-100��</li>
           <li>101-150��</li>
           <li>151-200��</li>
       </div>
      <div class="C_rank">
          <div class="margin">
              <div class="margin_hl">
                  <input type="text" id="searchKey" value="���������˽��ѧУ���鿴����">
                  <a href="javascript:void(0);" id="searchrank"><img src="images/search.png" alt="����ͼƬ"></a>
              </div>
          </div>
      </div>
      <script>
        $('#searchKey').click(function() {
              var cur=$(this);
              var key=cur.val();
              if(key=="���������˽��ѧУ���鿴����"){
                $(this).val("");
              }
        });
        $('#searchrank').click(function() {
          var key=$('#searchKey').val();
          if(!key||key=="���������˽��ѧУ���鿴����"){
            alert("�����������ؼ���");
            $('#searchKey').focus();
            return false;
          }
          var ranktype="<?php echo $listname; ?>";
          window.location.href="rankings.php?list="+ranktype+"&key="+key;
        });
      </script>
       <div class="school">
           <div class="school_tab" style="display:block;">
            <?php if($scount>0): ?>
              <?php $max=$scount>50?50:$scount ?>
            <?php for ($i=0; $i < $max; $i++) :?>
            <?php 
              $star=$starlist[$i]; 
              if(!$star){
                $starhtml='';
              }else{
                $starhtml='<em class="pentagram"><img src="'.$starimg[$star].'"></em>';
              }
            ?>
             <li><a <?php echo setUrl($linkid[$i]) ?> target="_blank">
                 <span><?php echo $rankinglist[$i]; ?></span>
                 <i style='<?php echo $style; ?>'><?php echo $namelist[$i]; ?></i>
                 <?php echo $starhtml; ?>
                 <em><img src="images/tp5.png"></em>
             </a></li>
              <?php endfor ?>
              <?php else: ?>
              <li style="line-height:1.875rem;vertical-align:middle;font-size:0.7rem;font-size:0.7rem;">û������</li>
            <?php endif ?>
           </div>
           <div class="school_tab">
            <?php if($scount>50): ?>
              <?php $max=$scount>100?100:$scount ?>
              <?php for ($i=50; $i < $max; $i++) :?>
              <?php 
                $star=$starlist[$i]; 
                if(!$star){
                  $starhtml='';
                }else{
                  $starhtml='<em class="pentagram"><img src="'.$starimg[$star].'"></em>';
                }
              ?>
               <li><a <?php echo setUrl($linkid[$i]) ?> target="_blank">
                   <span><?php echo $rankinglist[$i]; ?></span>
                   <i style='<?php echo $style; ?>'><?php echo $namelist[$i]; ?></i>
                   <?php echo $starhtml; ?>
                   <em><img src="images/tp5.png"></em>
               </a></li>
              <?php endfor ?>
              <?php else: ?>
              <li style="line-height:1.875rem;vertical-align:middle;font-size:0.7rem;">û������</li>
            <?php endif ?>
           </div>
           <div class="school_tab">
            <?php if($scount>100): ?>
              <?php $max=$scount>150?150:$scount ?>
               <?php for ($i=100; $i < $max; $i++) :?>
               <?php 
                $star=$starlist[$i]; 
                if(!$star){
                  $starhtml='';
                }else{
                  $starhtml='<em class="pentagram"><img src="'.$starimg[$star].'"></em>';
                }
               ?>
               <li><a <?php echo setUrl($linkid[$i]) ?> target="_blank">
                   <span><?php echo $rankinglist[$i]; ?></span>
                   <i style='<?php echo $style; ?>'><?php echo $namelist[$i]; ?></i>
                   <?php echo $starhtml; ?>
                   <em><img src="images/tp5.png"></em>
               </a></li>
                <?php endfor ?>
                <?php else: ?>
              <li style="line-height:1.875rem;vertical-align:middle;font-size:0.7rem;">û������</li>
              <?php endif ?>
           </div>
           <div class="school_tab">
            <?php if($scount>150): ?>
              <?php $max=$scount>200?200:$scount ?>
              <?php for ($i=150; $i < $max; $i++) :?>
              <?php 
                $star=$starlist[$i]; 
                if(!$star){
                  $starhtml='';
                }else{
                  $starhtml='<em class="pentagram"><img src="'.$starimg[$star].'"></em>';
                }
              ?>
               <li><a <?php echo setUrl($linkid[$i]) ?> target="_blank">
                   <span><?php echo $rankinglist[$i]; ?></span>
                   <i style='<?php echo $style; ?>'><?php echo $namelist[$i]; ?></i>
                   <?php echo $starhtml; ?>
                   <em><img src="images/tp5.png"></em>
               </a></li>
                <?php endfor ?>
                <?php else: ?>
              <li style="line-height:1.875rem;vertical-align:middle;font-size:0.7rem;">û������</li>
              <?php endif ?>
           </div>       
       </div>
    </div>
</div>
<script>
  $('.school').mousewheel(function(e,delta){
    // console.log(delta);
      if(delta>0){//up
        $('.rank').show();
        $('.C_rank').css('position','');
        $('.C_rank').css('top','');
        // $('.rank').css('top','0').show();
      }else{
      }
  })
</script>
<script type="text/javascript" charset="utf-8" src="http://lead.soperson.com/20001470/10059545.js"></script>
</body>
</html>   