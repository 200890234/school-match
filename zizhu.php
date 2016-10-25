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
			<a href="javascript:history.back(-2)"><img src="images/arrow.png" alt="ͼƬ" class="left-arrow"></a>
			<p>����ѡУ</p>
			<img src="images/search.png" alt="ͼƬ" class="right-search">
	</div>
    <div class="Independently">
        <div class="choose_top">
             <li class="quence" status="0">�ۺ�����
                <img src="images/tp8.png" alt="�ۺ�����" style="width:14%;" class="up-downa">
            </li>
            <li class="go" status="0">��ѧĿ�ĵ�
                <img src="images/tp8.png" alt="��ѧĿ�ĵ�" class="up-downb">
            </li>
            <li class="quence_a" status="0">����׶�
                <img src="images/tp8.png" alt="����׶�" class="up-downc">
            </li>
            <li class="screene" status="0">ɸѡ
                <img src="images/tp8.png" alt="ɸѡ" style="width:21%;" class="up-downd">
            </li>
        </div>
<!--�ۺ�����-->
<div class="div1 rule_order">
        <img src="images/tp32.jpg" alt="С�Ǳ�">
           <li><a href="order by s.comments_xt asc" target="_blank">�Ѷ��ɵ͵���</a></li>
           <li style="border-bottom:none;"><a href="order by s.clicknum desc" target="_blank">�����ɸߵ���</a></li>    
</div>
<!--��ѧĿ�ĵ�-->
<div class="div2 rule_country">
        <img src="images/tp32.jpg" alt="С�Ǳ�">
    <div class="nav_menu">
        <li><a href="" target="_blank">���е���</a></li>
        <li><a href="s.s_country_code='US'" target="_blank">����</a></li>
        <li><a href="s.s_country_code='GB'" target="_blank">Ӣ��</a></li>
        <li><a href="s.s_country_code='CA'" target="_blank">���ô�</a></li>
        <li><a href="s.s_country_code='AU'" target="_blank">�Ĵ�����</a></li>
        <li><a href="s.s_country_code='NZ'" target="_blank">������</a></li>
        <li><a href="s.s_country_code='FR'" target="_blank">����</a></li>
        <li><a href="s.s_country_code='DE'" target="_blank">�¹�</a></li>
        <li><a href="s.s_country_code='CH'" target="_blank">��ʿ</a></li>
        <li><a href="s.s_country_code='ES'" target="_blank">������</a></li>
        <li><a href="s.s_country_code='HL'" target="_blank">����</a></li>
        <li><a href="s.s_country_code='IE'" target="_blank">������</a></li>
        <li><a href="s.s_country_code='IT'" target="_blank">�����</a></li>
        <li><a href="s.s_country_code='JP'" target="_blank">�ձ�</a></li>
        <li><a href="s.s_country_code='KR'" target="_blank">����</a></li>
        <li><a href="s.s_country_code='SG'" target="_blank">�¼���</a></li>
        <li><a href="s.s_country_code='HK'" target="_blank">�й����</a></li>
        <li><a href="s.s_country_code='TW'" target="_blank">�й�̨��</a></li>
        <li style="border-bottom:none;"><a href="s.s_country_code='MY'" target="_blank">��������</a></li>
</div>
</div>
<!--����׶�-->
<div class="div3 rule_degree">
        <img src="images/tp32.jpg" alt="С�Ǳ�">
        <li><a href="" target="_blank">���н׶�</a></li>
        <li><a href="(s.edu like '%˶ʿ%' or s.edu like '%��ʿ%')" target="_blank">˶��</a></li>
        <li><a href="s.edu like '%����%'" target="_blank">����</a></li>
        <li><a href="s.edu like '%��ѧ%'" target="_blank">��ѧ</a></li>
        <li style="border-bottom:none;"><a href="s.edu like '%����%'" target="_blank">����</a></li> 
</div>
    <!--ɸѡ-->
        <div class="block">
            <img src="images/tp32.jpg" alt="С�Ǳ�">
            <div class="block_box">
                <div class="block_boxa">
                    <p>ԺУ����</p>
                    <div class="boxb rule_stype">
                        <a href="#" target="_blank">��ѧ</a>
                        <a href="#" target="_blank">ѧԺ</a>
                        <a href="#" target="_blank">����ѧУ</a>
                        <a href="#" target="_blank">��ѧ</a>
                        <a href="#" target="_blank" style="margin-right:0rem;">����</a>
                    </div>
                </div>
              <div class="block_boxa distance">
                    <p>רҵ����</p>
                    <div class="boxb rule_major">
                        <a href="javascript:;" target="_blank">�Ŀ���</a>
                        <a href="javascript:;" target="_blank">�̿���</a>
                        <a href="javascript:;" target="_blank">�����</a>
                        <a href="javascript:;" target="_blank">������</a>
                        <a href="javascript:;" target="_blank" style="margin-right:0rem;">������</a>
                    </div>
                </div>
            <div class="button">
                <a href="javascript:;" class="btn8">���ɸѡ</a>
                <a href="javascript:;" class="btn9">ȷ��</a>
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
            $('.btn8').click(function(e) {//����
                e.preventDefault();
                $('.rule_stype a,.rule_major a').removeClass('cked');
                setSession('stype','');
                setSession('major','');
                location.reload();
            });
            $('.btn9').click(function(e) {//ȷ�� 
                e.preventDefault();
                var stype=$('.rule_stype a.cked').text();
                var major=$('.rule_major a.cked').text();
                if(!stype){
                    alert('��ѡ��ԺУ����');
                    return false;
                }else if(!major){
                    alert('��ѡ��רҵ����');
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
                        msg='����ʧ�ܣ�������';
                        alert(msg);
                        //alert(XMLHttpRequest.status);
                        //alert(XMLHttpRequest.readyState);
                        //alert(textStatus); // paser error;
                    }
                })
                // alert(msg);
                /*if(msg=='����ʧ�ܣ�������'){
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
                                <a href="/php/liuxue/schools_detail.php?id=<?php echo $result['COLLEGE_ID'] ?>" class="btn4"><img src="images/tp4.jpg"><span>����<br>����</span></a>
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
<!--��������-->
<div class="shadow shadow_y"></div>
<!--����Ҳ���������������-->
<div class="search-tip">
<div class="search">
 <input type="text" name="keywords" id="keywords"  class="search-box radio-left" value="��������������">
  <a href="javascript:;"  class="search-btn radio-right"></a>
   </div>
  <p class="cancel">ȡ��</p>
 </div>
<script type="text/javascript">
$('.search-box').click(function() {
          var cur=$(this);
          var key=cur.val();
     if(key=="��������������"){
              $(this).val("");
     }
});
$('.search-btn').click(function() {
      var key=$('#keywords').val();
      if(!key||key=="��������������"){
            alert("�����������ؼ���");
            $('.search-box').focus();
            return false;
          }
          // var ranktype="U.S. News�����ۺϴ�ѧ����";
          window.location.href="?key="+key;
});
</script>
<center style="display:none;"><?php //echo $sql; ?></center>
<?php //echo $sql; ?>
</body>
</html>