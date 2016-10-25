<?php 
    session_start(); 
    $country=$_SESSION['country'];
    $degree=$_SESSION['degree'];
    $stype=$_SESSION['stype'];//school_type
    $major=$_SESSION['major'];//school_type
    $myorder=$_SESSION['myorder'];
    function getParameter($pName) {
        $pValue = "";
        if( isset( $_POST[$pName] ) )
          $pValue = $_POST[$pName];
        else if( isset( $_GET[$pName] ) )
          $pValue = $_GET[$pName];
        $pValue = iconv("utf-8","gb2312", trim($pValue) );
        return $pValue;
    }
    require_once($_SERVER["DOCUMENT_ROOT"].'/php/lib/PDOIGOWAPDB.class.php');
    $db = PDODB::getCMS_DB();
    $where="";
    $key=getParameter('key');
    $key=$_GET["key"];
    
    if(isset($key)){
        $where.=" and s.s_name_cn like '%$key%'";
    }
    
    if($degree){
        // $where.=" and ".$degree;
        $where=" and ".$degree;
    }
    if($stype){
        // $where.=" and s.s_type like '%$stype%'";
        $where=" and s.s_type like '%$stype%'";
    }
    if($major){
        // $where.=" and (s.college_id in(select i.college_id from t_school_speciality i where i.speciality_type like '%$major%'))";
        $where=" and (s.college_id in(select i.college_id from t_school_speciality i where i.speciality_type like '%$major%'))";
    }
    if($country){
        $where.=" and ".$country;
    }
    if($myorder){
        $myorder=' '.$myorder;
    }else{
        $myorder=' order by s.clicknum desc';
    }
    $sql="select * from t_schools s where s.logo_path is not null and s.recommend in(1,2)".$where.$myorder;
    $sql="select * from ($sql) where rownum<200";
    // echo $sql;
    // var_dump($_SESSION);
    $stmt = $db->prepare($sql);
    $stmt->execute();
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
<body sql="">
<div id="container">
	  <div class="header header_head">
			<a href="javascript:history.back(-2)"><img src="images/arrow.png" alt="图片" class="left-arrow"></a>
			<p>自主选校</p>
			<img src="images/search.png" alt="图片" class="right-search">
	</div>
    <div class="Independently">
        <div class="choose_top">
             <li class="quence" status="0">综合排序
                <img src="images/tp8.png" alt="综合排序" style="width:14%;" class="up-downa">
            </li>
            <li class="go" status="0">留学目的地
                <img src="images/tp8.png" alt="留学目的地" class="up-downb">
            </li>
            <li class="quence_a" status="0">入读阶段
                <img src="images/tp8.png" alt="入读阶段" class="up-downc">
            </li>
            <li class="screene" status="0">筛选
                <img src="images/tp8.png" alt="筛选" style="width:21%;" class="up-downd">
            </li>
        </div>
<!--综合排序-->
<div class="div1 rule_order">
        <img src="images/tp32.jpg" alt="小角标">
           <li><a href="order by s.comments_xt asc" target="_blank">难度由低到高</a></li>
           <li style="border-bottom:none;"><a href="order by s.clicknum desc" target="_blank">人气由高到低</a></li>    
</div>
<!--留学目的地-->
<div class="div2 rule_country">
        <img src="images/tp32.jpg" alt="小角标">
    <div class="nav_menu">
        <li><a href="" target="_blank">所有地区</a></li>
        <li><a href="s.s_country_code='US'" target="_blank">美国</a></li>
        <li><a href="s.s_country_code='GB'" target="_blank">英国</a></li>
        <li><a href="s.s_country_code='CA'" target="_blank">加拿大</a></li>
        <li><a href="s.s_country_code='AU'" target="_blank">澳大利亚</a></li>
        <li><a href="s.s_country_code='NZ'" target="_blank">新西兰</a></li>
        <li><a href="s.s_country_code='FR'" target="_blank">法国</a></li>
        <li><a href="s.s_country_code='DE'" target="_blank">德国</a></li>
        <li><a href="s.s_country_code='CH'" target="_blank">瑞士</a></li>
        <li><a href="s.s_country_code='ES'" target="_blank">西班牙</a></li>
        <li><a href="s.s_country_code='HL'" target="_blank">荷兰</a></li>
        <li><a href="s.s_country_code='IE'" target="_blank">爱尔兰</a></li>
        <li><a href="s.s_country_code='IT'" target="_blank">意大利</a></li>
        <li><a href="s.s_country_code='JP'" target="_blank">日本</a></li>
        <li><a href="s.s_country_code='KR'" target="_blank">韩国</a></li>
        <li><a href="s.s_country_code='SG'" target="_blank">新加坡</a></li>
        <li><a href="s.s_country_code='HK'" target="_blank">中国香港</a></li>
        <li><a href="s.s_country_code='TW'" target="_blank">中国台湾</a></li>
        <li style="border-bottom:none;"><a href="s.s_country_code='MY'" target="_blank">马来西亚</a></li>
</div>
</div>
<!--入读阶段-->
<div class="div3 rule_degree">
        <img src="images/tp32.jpg" alt="小角标">
        <li><a href="" target="_blank">所有阶段</a></li>
        <li><a href="(s.edu like '%硕士%' or s.edu like '%博士%')" target="_blank">硕博</a></li>
        <li><a href="s.edu like '%本科%'" target="_blank">本科</a></li>
        <li><a href="s.edu like '%中学%'" target="_blank">中学</a></li>
        <li style="border-bottom:none;"><a href="s.edu like '%其它%'" target="_blank">其它</a></li> 
</div>
    <!--筛选-->
        <div class="block">
            <img src="images/tp32.jpg" alt="小角标">
            <div class="block_box">
                <div class="block_boxa">
                    <p>院校类型</p>
                    <div class="boxb rule_stype">
                        <a href="#" target="_blank">大学</a>
                        <a href="#" target="_blank">学院</a>
                        <a href="#" target="_blank">语言学校</a>
                        <a href="#" target="_blank">中学</a>
                        <a href="#" target="_blank" style="margin-right:0rem;">其它</a>
                    </div>
                </div>
              <div class="block_boxa distance">
                    <p>专业方向</p>
                    <div class="boxb rule_major">
                        <a href="javascript:;" target="_blank">文科类</a>
                        <a href="javascript:;" target="_blank">商科类</a>
                        <a href="javascript:;" target="_blank">理科类</a>
                        <a href="javascript:;" target="_blank">工科类</a>
                        <a href="javascript:;" target="_blank" style="margin-right:0rem;">艺术类</a>
                    </div>
                </div>
            <div class="button">
                <a href="javascript:;" class="btn8">清空筛选</a>
                <a href="javascript:;" class="btn9">确定</a>
            </div>
            </div>
        </div>
        <style>
            .cked{border-color:#bd141d !important;color:#bd141d !important;}
        </style>
        <script>
            $('.rule_stype a,.rule_major a').click(function(e) {
                e.preventDefault();
               /* $(this).siblings().removeClass('cked');
                $(this).addClass('cked');*/
                $(this).toggleClass('cked');
                $(this).siblings().removeClass('cked');
            });
            $('.btn8').click(function(e) {//重置
                e.preventDefault();
                $('.rule_stype a,.rule_major a').removeClass('cked');
                setSession('stype','');
                setSession('major','');
                location.reload();
            });
            $('.btn9').click(function(e) {//确定 
                e.preventDefault();
                var stype=$('.rule_stype a.cked').text();
                var major=$('.rule_major a.cked').text();
                if(!stype){
                    alert('请选择院校类型');
                    return false;
                }else if(!major){
                    alert('请选择专业方向');
                    return false;
                }
                setSession('stype',stype);
                setSession('major',major);
                location.reload();
            });
            $('.rule_order li a').click(function(e) {
                e.preventDefault();
                var val=$(this).attr('href');
                // alert(val);return;
                setSession('myorder',val);
                location.reload();
            });
            $('.rule_degree li a').click(function(e) {
                e.preventDefault();
                var val=$(this).attr('href');
                setSession('degree',val);
                // alert(val);
                location.reload();
            });
            $('.rule_country li a').click(function(e) {
                e.preventDefault();
                var val=$(this).attr('href');
                setSession('country',val);
                location.reload();
            });
            function setSession(name,val){      
                $.ajaxSetup({
                    async:false,
                })
                 
                // var d={};
                var msg='';
                $.ajax({
                    type:"get",
                    url:'setSession.php?name='+name+'&val='+val,
                    // data:d,
                    dataType:"text",
                    success:function(data){
                        // alert(data);
                        // msg=data;
                    },
                    error:function(){
                        msg='操作失败，请重试';
                        alert(msg);
                        //alert(XMLHttpRequest.status);
                        //alert(XMLHttpRequest.readyState);
                        //alert(textStatus); // paser error;
                    }
                })
                // alert(msg);
                /*if(msg=='操作失败，请重试'){
                    return false;
                }*/
                /*$.get('setSession.php?name='+name+'&val='+val, function(data) {
                    alert(data);
                });*/
                // alert(1);
            }
        </script>
     <div class="tab_bottom change_height">
            <div class="tab" style="display:block;height:100%;">
                <div class="content content_change" style="height:100%;">
                    <?php while( $result = $stmt->fetch() ): ?>
                    <li style="width:100%;">
                        <a href="/php/liuxue/schools_detail.php?id=<?php echo $result['COLLEGE_ID'] ?>">
                        <div class="content_a">
                            <div class="left"><img src="http://www.igo.cn/liuxue/images<?php echo $result['LOGO_PATH'] ?>"></div>
                            <div class="right">
                                <p><?php echo $result['S_NAME_CN'] ?></p>
                                <pre><?php echo $result['S_NAME_EN'] ?></pre>
                                <a href="/php/liuxue/schools_detail.php?id=<?php echo $result['COLLEGE_ID'] ?>" class="btn4"><img src="images/tp4.jpg"><span>申请<br>条件</span></a>
                            </div>
                        </div>
                        </a>
                    </li>
                    <?php endwhile ?>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!--弹窗背景-->
<div class="shadow shadow_y"></div>
<!--点击右侧收索出现收索条-->
<div class="search-tip">
<div class="search">
 <input type="text" name="keywords" id="keywords"  class="search-box radio-left" value="请输入搜索内容">
  <a href="javascript:;"  class="search-btn radio-right"></a>
   </div>
  <p class="cancel">取消</p>
 </div>
<script type="text/javascript">
$('.search-box').click(function() {
          var cur=$(this);
          var key=cur.val();
     if(key=="请输入搜索内容"){
              $(this).val("");
     }
});
$('.search-btn').click(function() {
      var key=$('#keywords').val();
      if(!key||key=="请输入搜索内容"){
            alert("请输入搜索关键字");
            $('.search-box').focus();
            return false;
          }
          // var ranktype="U.S. News美国综合大学排名";
          window.location.href="?key="+key;
});
</script>
<center style="display:none;"><?php //echo $sql; ?></center>
<?php //echo $sql; ?>
</body>
</html>