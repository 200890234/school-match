<?php
/**
 * @author:zhengyiming
 * @time:2014-9-3
 * @description:wap��ԺУ�ն�ҳ
 */
session_start();
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
require_once($_SERVER["DOCUMENT_ROOT"].'/php/lib/PDOIGOWAPDB.class.php');
$id = getParameter("id");
$userid=$_SESSION["userinfo"]["userId"];


$db = PDODB::getCMS_DB();
$stmt = null;

$title = '';            //ҳ��title
$sName = '';        //ѧУ����
$sNameEn = '';        //ѧУӢ������
$sRank = "";         //ѧУ����
$clickNum = '';       //ԺУ���
$sRank = "";         //ѧУ����
$sProperty = "";      //ѧУ����
$sCreatedate = '';      //��Уʱ��
$sPosition = '';        //����λ��
$sPersonnum = '';       //ʦ������
$sHomepage = '';        //ѧУ��ҳ
$sInfo = '';            //ѧУ�ſ�
$sFeature = '';         //��ɫ����
$sCityinfo = '';        //���иſ�
$sTraffic = '';           //��ͨ״��
$specialityHtml = '';    //ԺУרҵ
$successCaseHtml = '';     //�ɹ�����
$collegeImgHtml = '';         //ԺУͼƬ
$logoPath = '';                 //logoͼ��ַ

/*$sql = 'select  S_RANK,S_NAME_CN,S_NAME_EN,S_PROPERTY,S_CREATEDATE,CLICKNUM,S_POSITION,S_PERSONNUM,S_HOMEPAGE,
                    S_INFO,S_FEATURE,S_CITYINFO,S_TRAFFIC,LOGO_PATH
                    from t_schools where college_id=?';*/
$sql = 'select * from t_schools where college_id=?';
try{
    $stmt = $db->prepare($sql);
    $stmt->execute( array($id) );
    if( $result = $stmt->fetch() )
        // var_dump($result);
    {
        $title = $result['S_NAME_CN'].'-ԺУ����';
        $sName = $result['S_NAME_CN'];
        $sNameEn = $result['S_NAME_EN'];
        $clickNum = $result['CLICKNUM'];
        $sRank = $result['S_RANK'];
        $sProperty = $result['S_PROPERTY'];
        $sCreatedate = $result['S_CREATEDATE'];
        $sPosition = $result['S_POSITION'];
        $sPersonnum = $result['S_PERSONNUM'];
        $sHomepage = $result['S_HOMEPAGE'];
        $sHomepageUrl = $sHomepage;
        $logoPath = $result['LOGO_PATH'];
        if (stripos($sHomepage,'http://') === false){
            $sHomepageUrl = 'http://'.$sHomepage;
        }
        $successCase = '';
        if (is_resource($result['S_INFO'])){
            $sInfo = stream_get_contents($result['S_INFO']);
            $sInfo = str_replace("\n","\n<br />",$sInfo);
        }
        if (is_resource($result['S_FEATURE'])){
            $sFeature = stream_get_contents($result['S_FEATURE']);
            $sFeature = str_replace("\n","\n<br />",$sFeature);
        }

        if(is_resource($result['S_CITYINFO'])){
            $sCityinfo = stream_get_contents($result['S_CITYINFO']);
            $sCityinfo = str_replace("\n","\n<br />",$sCityinfo);
        }
        if(is_resource($result['S_TRAFFIC'])){
            $sTraffic = stream_get_contents($result['S_TRAFFIC']);
            $sTraffic = str_replace("\n","\n<br />",$sTraffic);
        } 
        if(is_resource($result['MATERIAL'])){
            $sMaterial = stream_get_contents($result['MATERIAL']);
            $sMaterial = str_replace("\n","\n<br />",$sMaterial);
        }                                   
    }
    //ԺУרҵ
    $specialityArr = getCollegeSpeciality($id);
    $specialityHtml = getCollegeSpecialityHtml($specialityArr); 
    //ԺУ�ɹ�����
    $successCaseArr = getSuccessCases($id);
    foreach ($successCaseArr as $k => $v) {
        $caseids[]=$v['T_ID'];
    }    
    $successCaseHtml = getSuccessCasesHtml($successCaseArr);
    //ԺУͼƬ
    $collegeImgArr = getCollegeImg($id);
    $collegeImgHtml = getCollegeImgHtml($collegeImgArr);    
    
    $result = null;
    $stmt = null;
}catch(Exception $e){
    echo"������������ϵ����Ա��"; 
}

function getParameter($pName)
{
    $pValue = "";
    if( isset( $_GET[$pName] ) ) $pValue = $_GET[$pName];
    return htmlspecialchars($pValue,ENT_QUOTES,GB2312);
}
/**
 * ��ȡԺУרҵ��Ϣ
 * @param unknown $id
 */
function getCollegeSpeciality($id)
{
    global $db;
    $result = array();
    $sql = "select * from t_school_speciality where college_id=?";
    $stmt = $db->prepare($sql);
    $stmt->execute( array($id) );
    while($row = $stmt->fetch()){
        $result[] = $row;
    }
    unset($stmt);
    return $result; 
}
/**
 * ��ȡԺУרҵ��Ϣ��html
 * @param unknown $arr
 */
function getCollegeSpecialityHtml($arr)
{
    $html = '';
    $specialityInfo = '';
    foreach ($arr as $val){
        $html .= '<h3 class="yxkH3">ԺУרҵ('.$val['SPECIALITY_TYPE'].')</h3>';
        $html .= '<p class="schDetail">';
        if (!empty($val['APPLY_CONDITION'])){
            $html .= '��ѧҪ��'.$val['APPLY_CONDITION'].'<br />';
        }       
        if (!empty($val['APPLY_CLOSE'])){
            $html .= '�����ֹ��'.$val['APPLY_CLOSE'].'<br />';
        }
        if (!empty($val['APPLY_PROCESS'])){
            $html .= '�������̣�'.$val['APPLY_PROCESS'].'<br />';
        }       
        if (!empty($val['START_DATE'])){
            $html .= '��ѧʱ�䣺'.$val['START_DATE'].'<br />';
        }       
        if (!empty($val['APPLY_MATERIAL'])){
            $html .= '��ѧ������ϣ�'.$val['APPLY_MATERIAL'].'<br />';
        }   
        if (is_resource($val['SPECIALITY_INFO'])){
            $specialityInfo = stream_get_contents($val['SPECIALITY_INFO']);
            $html .= '���רҵ��Ϣ��'.$specialityInfo.'<br />';
        }
        $html .= '</p>';
    }
    return $html;
}
/**
 * ��ȡ��ԺУ�ĳɹ�����
 * @param unknown $collegeId
 */
function getSuccessCases($collegeId)
{
    global $db;
    $result = array();
    $sql = "select * from ( 
                            select c.t_id,c.t_title, s.t_name,c.t_lx_type, s.t_graduate_school school,s.t_language_info score,e.t_college_name,e.t_specialty 
                            from t_example c, t_example_stu s,t_example_enrolled e  
                            where c.t_id = s.case_id and e.case_id = c.t_id and e.t_college=? and c.state=2 
                            order by c.PUBLISHDATE desc nulls last,c.createdate desc 
                            )where rownum <=5";
    $stmt = $db->prepare($sql);
    $stmt->execute(array($collegeId));
    while ($row = $stmt->fetch()){
        $result[] = $row;
    }
    unset($stmt);
    return $result;
}
/**
 * ���ɸ�ԺУ�ĳɹ�����Html
 * @param unknown $arr
 */
function getSuccessCasesHtml($arr)
{
    $html = '';
    /*foreach ($arr as $val){
        $html .= "<tr>";
        $html .= "<td>".$val['T_NAME']."</td>";
        $html .= "<td>".$val['T_SPECIALTY']."</td>";
        $html .= "<td>".$val['SCHOOL']."</td>";
        $html .= '<td><a href="http://m.igo.cn/php/liuxue/case_detail.php?id='.$val['T_ID'].'" title="'.$val['T_TITLE'].'">�鿴����</a></td>';
        $html .= "<tr>";
    }*/
    foreach ($arr as $val){
        $html.='<div class="swiper-slide">';
        $html.='            <p><span>������</span>'.$val['T_NAME'].'</p>';
        $html.='            <p><span>¼ȡרҵ��</span>'.$val['T_SPECIALTY'].'</p>';
        $html.='            <p><span>��ҵԺУ��</span>'.$val['SCHOOL'].'</p>';
        $html.='            <p><span>¼ȡ�ɼ���</span>'.$val['SCORE'].'</p>';
        $html.='            <div class="button-case">';
        $html.='                <a href="http://m.igo.cn/liuxue/case/detail.php?caseid='.$val['T_ID'].'" class="btn23 new-case">��������</a>';
        $html.='                <a onclick="doyoo.util.openChat(\'g=10061553\');return false;" class="btn24 new-case">���ʴ���</a>';
        $html.='            </div>';
        $html.='        </div>';
        /*$html.='<div class="case_cell">';
        $html.='<div class="cell">';
        $html .= "<p>������".$val['T_NAME']."</p>";
        $html .= "<p>¼ȡרҵ��".$val['T_SPECIALTY']."</p>";
        $html .= "<p>��ҵԺУ��".$val['SCHOOL']."</p>";
        $html .= "<p>¼ȡ�ɼ���".$val['SCHOOL']."</p>";
        $html .= '<a href="http://m.igo.cn/liuxue/case/detail.php?caseid='.$val['T_ID'].'" target="_blank" class="dialog_href mr12">��������</a>';
        $html .= '<a href="javascript:;" onclick="doyoo.util.openChat(\'g=10061553\');&nbsp;return&nbsp;false;"&nbsp;target="_blank" class="dialog_href">���ʴ���</a>';
        $html.='</div>';
        $html.='</div>';*/
    }
    return $html;
}
/**
 * ��ȡԺУͼƬ
 * @param unknown $collegeId
 */
function getCollegeImg($collegeId)
{
    global $db;
    $result = array();
    $sql = "select * from t_school_images where college_id=?";
    $stmt = $db -> prepare($sql);
    $stmt -> execute(array($collegeId));
    while ($row = $stmt->fetch()){
        $result[] = $row;
    }
    unset($stmt);
    return $result;
}
/**
 * ����ԺУͼƬHtml
 * @param unknown $arr
 */
function getCollegeImgHtml($arr)
{
    $html = '';
    foreach ($arr as $val){
        $html .= '<img src="http://www.igo.cn/2010/images'.$val['IMG_PATH'].'" alt="'.$val['IMG_TITLE'].'" />';
    }
    return $html;
}
// check if is faved
$db = PDODB::getCMS_DB();
$favsql = "select count(*) cnt from m_favorites where fav_objid='$id' and fav_userid='$userid' and fav_type='academy'";
// echo $favsql;
$favstmt = $db -> prepare($favsql);
$favstmt -> execute();
$rs = $favstmt->fetch();
$cnt=$rs["CNT"];
if($cnt>0){
    $style="";
}else{
    $style="disable";
}
// for school selection system by mervyn
require_once("selection.class.php");//Z:\igowap\new-school-match\selection.class.php
$selection=new selection();
$catlist=$selection->getCatBySchool($sName);
$catarr=$selection->catarr;// academic_type array  **start from 1**
$cats=array(); //sorted cat array
for ($i=0; $i <= count($catarr); $i++) { 
    if(in_array($catarr[$i], $catlist)){
        array_push($cats, $catarr[$i]);
    }
}
//get teacher info html
function getExpertsByCases($caseids,$db){
    $ids=implode(',', $caseids);
    $sql = " select e.EXPERT_ID,e.EXPERT_NAME,e.PHOTO_PATH,e.COMPANY_ADDRESS address,e.LX_QUESTION_COUNTRY country,e.ABLITY,e.MAIL,e.COMPANY_TEL,e.BRIEF, p.url_gen from v_expert_lx e, v_expert_lx_prop p,t_case t where e.expert_id = p.id and e.IS_LX_EXPERT = '1' and p.url_gen is not null and e.EXPERT_NAME = t.creator_name and e.company_id = t.t_company_id and t.t_id in($ids)";
    // echo $sql;exit;
    $stmt = $db -> prepare($sql);
    $stmt -> execute();
    while ($result = $stmt->fetch()){
        $experts[] = $result;
        $experts['brief'][]=mb_substr(stream_get_contents($result['BRIEF']), 0,56,'gbk')."...";
    }
    return $experts;
}
function getCaseByExpert($expert,$db){
    $sql = "select * from t_example where creator_name=? and t_title is not null and t_title!='null' and rownum<6";
    // echo $sql;echo $expert;
    $stmt = $db -> prepare($sql);
    $stmt -> execute(array($expert));
    while ($result = $stmt->fetch()){
        $cases[] = $result;
    }
    return $cases;
}
if($caseids){
    $experts=getExpertsByCases($caseids,$db);
}else{
    $experts=null;
}
// var_dump($experts);exit;
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="gb2312">
  <title><?php echo $title;?></title>
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
  <link rel="stylesheet" type="text/css"  href="/liuxue/css/style.css">
  <link rel="stylesheet" type="text/css" href="/liuxue/css/new_style.css">
  <link rel="stylesheet" type="text/css" href="/school-match/css/index.css">
  <script type="text/javascript" src="/school-match/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/school-match/js/index.js"></script>
<script type="text/javascript" src="js/swiper.min.js"></script>
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
<body style="background-color:#fff">
  <div class="xt-header xt-header3">
      <a class='back backBtn' href="javascript:history.back(-1)"></a>
      <p class="title">
        <span><?php echo $sName;?></span>
      </p>
      <em class="search-icon showSearch"></em>
      <script language="javascript">
      function Search(){
        var keywords=$("#keywords").val();
        if(keywords==""){
          window.alert("�����ؼ��ʲ���Ϊ��");
        }
        else{
          window.location.href='/php/sall.php?keywords='+keywords;
        }
      }
      </script>
  </div>
  <!--hiden searchbox-->
  <div class="mask" id="mask" style="background:rgba(0,0,0,0.95);"></div>
  <div class="search-tip searchTip" style="height:2.1rem;">
       <div class="search">
          <input type="text" name="keywords" id="keywords"  class="search-box radio-left" placeholder="��������������">
          <a href="#"  onclick="Search();" class="search-btn radio-right"></a>
      </div>
      <p class="cancel">ȡ��</p>
  </div>

    <section class="xt-container5">
      <div class="school_base_info">
            <div class="school_base_txt clearfix">
                <img src="http://www.igo.cn/liuxue/images<?php echo $logoPath;?>" style="width:82px;height:64px;" class="school_base_pic"/>
                <p class="school_name"><?php echo $sName;?></p>
                <p class="scholl_english_name"><?php echo $sNameEn;?></p>
            </div>
            <?php if ($sRank!=null && $sRank!="n/a" && $sRank!="N/A"):?>
            <p class="school_num fs"><img src="/liuxue/img/icon/newImg/line_icon.jpg"/><?php echo $sRank;?></p> 
            <?php endif ?>
            <p class="scholl_adress fs"><img src="/liuxue/img/icon/newImg/pos_icon.jpg"/><?php echo $sPosition;?></p> 
            <a href="javascript:;" class="contact_href pos_item" onclick="doyoo.util.openChat('g=10061553');&nbsp;return&nbsp;false;">��ϵ������</a>
            <span class="add_favorite star pos_item <?php echo $style; ?>" id="fav"></span>
        </div>
        <ul class="tools_list">
            <li id="school_summary_icon">
                <a href="javascript:;">
                    <img src="/liuxue/img/icon/newImg/school_info_icon1.jpg">
                    <p>ԺУ�ſ�</p>
                </a>
            </li>
            <li id="apply_factor_icon">
                <a href="javascript:;">
                    <img src="/liuxue/img/icon/newImg/school_info_icon2.jpg">
                    <p>��������</p>
                </a>
            </li>
            <li>
                <a href="http://m.igo.cn/school-match/paiming1.shtml">
                    <img src="/liuxue/img/icon/newImg/school_info_icon3.jpg">
                    <p>��ѧ����</p>
                </a>
            </li>
            <li  class="new-major">
                <a  href="javascript:;">
                    <img src="images/school_info_icon4.jpg">
                    <p>����רҵ</p>
                </a>
            </li>
            <li id="school_case_icon">
                <a href="javascript:;" onclick="jp('<?php echo $successCaseHtml?1:0; ?>')">
                    <img src="/liuxue/img/icon/newImg/school_info_icon5.jpg">
                    <p>У�Ѱ���</p>
                </a>
            </li>
            <li id="new-consultant">
                <a href="javascript:;" onclick="pj('<?php echo $experts?1:0; ?>')">
                    <img src="images/school_info_icon6.jpg" style="width:35%;margin-top:0.2rem;">
                    <p style="margin-top:0.45rem;">�������</p>
                </a>
            </li>
            <li>
                <a href="http://m.igo.cn/pinggu/">
                    <img src="/liuxue/img/icon/newImg/school_info_icon7.jpg">
                    <p>��������</p>
                </a>
            </li>
            <li>
                <a href="tel:400-618-0271">
                    <img src="/liuxue/img/icon/newImg/school_info_icon8.jpg">
                    <p>�绰��ѯ</p>
                </a>
            </li>
        </ul>
        <div class="new-school_summary">
            <p>���һ�ȡ��У�������ߡ�¼ȡ����</p>
            <p style="margin-top:0;">���ȵݽ�������ϣ�¼ȡ���ʴ�</p>
            <p style="margin-top:0;">������߶ѧ��</p>
         <div class="new-btn">
          <a href="tel:400-618-0271" class="btn18 new-co">��ɫ����ͨ��</a>
          <a href="#" class="btn19 new-co" onclick="doyoo.util.openChat('g=10061553'); return false;">��ѯ����</a>
         </div>
        </div> 
      <!--������ʵ���-->
<div class="Application"></div>
      <div class="swiper-container transverse"> 
            <div class="app_bg">
               <h4>�ɹ������У�Ĺ���</h4>
               <img src="/school-match/images/tp62.png" alt="ͼƬ" class="new-close-btn">
            </div> 
            <div class="swiper-wrapper">
                <?php //var_dump($experts) ?>
                <?php for($i=0;$i<count($experts)-1;$i++) : ?>  <!-- count of $experts array -1 (brief item) -->
                <div class="swiper-slide">
                    <div class="consultant_name">
                        <div class="consultant_left"><img src="http://www.igo.cn<?php echo $experts[$i]['PHOTO_PATH'] ?>" alt=""></div> 
                        <div class="consultant_right" url="<?php echo $experts[$i]['URL_GEN'] ?>">
                            <p>������<span><?php echo $experts[$i]['EXPERT_NAME'] ?></span></p>
                            <p>�ó���<span><?php echo $experts[$i]['COUNTRY'] ?></span></p>
                        </div> 
                    </div>
                    <p class="qualification"><b>רҵ������</b><?php echo $experts['brief'][$i]; ?></p> 
                    <ul class="School_success">
                    <?php $cases=getCaseByExpert($experts[$i]['EXPERT_NAME'],$db); ?>
                    <?php if($cases): ?>
                    <h1>��У�ɹ�������</h1>
                    <?php foreach ($cases as $k => $v) :?>
                        <li>&#8226; &nbsp;<a href="/liuxue/case/detail.php?caseid=<?php echo $v['T_ID'] ?>" style="color:#fff;"><?php echo $v['T_TITLE'] ?></a></li>
                    <?php endforeach ?>
                    <?php endif ?>
                    </ul>
                    <a href="" class="btn20" onclick="doyoo.util.openChat('g=10061553'); return false;">��Ta��ѯ</a>
                </div>
                <?php endfor ?>
            </div>
            <!--Բ�ΰ�ť-->
             <div class="swiper-pagination" style="top:-0.5rem;">
                <?php for($i=0;$i<count($experts)-1;$i++) : ?>
                 <div class="swiper-pagination-bullet"></div>
                <?php endfor ?>
             </div> 
</div>
<!--�������-->
<script type="text/javascript">

var u = $(".swiper-container .swiper-slide").length;
if(u<=1){
    $(".swiper-pagination-bullet").css("background","none"); 
}else{
    var mySwiper = new Swiper ('.transverse', {
        direction : 'horizontal',
        speed:600,
        loop:true,
        pagination : '.swiper-pagination',
        paginationClickable :true,  
    }) 
}
</script>  
<!--����רҵ-->
 <div class="Application_bg">
    <div class="Application_son">
        <h4>����רҵ</h4>
        <img src="images/tp62.png" alt="ͼƬ" class="new-close-btn" style="right:0.5rem;top:0.5rem;">
        <div class="new-Popular_major">
        <?php foreach($cats as $cat) : ?>
           <li>
             <em class="new-slide"><span><?php echo $cat ?></span><img src="images/tp71.png" alt="ͼƬ"></em>
             <div class="major_box">
                <!-- $topranks=$selection->getTopRanks(); -->
                <p><?php echo $selection->filterTopRankByCat($sName,$cat)['typename'] ?></p>
                <?php $subids=$selection->getSubTypeByTopType($selection->filterTopRankByCat($sName,$cat)['typeid']); 
                    // $majors=$selection->getMajors($subids);
                    $majors=$selection->getMajorsBySchool($sName,$selection->filterTopRankByCat($sName,$cat)['typeid']);
                    // var_dump($majors);  // id name
                    //majors' corresponding detailed ranking type via major
                    //schools' rank in detailed ranking type via school
                    // var_dump($rankarr);
                    for ($i=0; $i < count($majors['id']); $i++) { 
                        // var_dump($majors['id'][$i]);
                        // $rank=$selection->getRankingsByTypeAndSchool($subids[$i],$sName);
                        $rank=$selection->getRankingsByMajor($majors['id'][$i],$sName);
                ?>
                <span><?php echo $majors['name'][$i][0]; ?>No.<?php echo $rank; ?></span>
                <?php } ?>
             </div>
            </li>
        <?php endforeach ?>
    </div>
     <div class="Popular_major-button">
         <a href="tel:400-618-0271" class="btn21">�鿴��������</a>
         <a href="#" class="btn22" onclick="doyoo.util.openChat('g=10061553'); return false;">��ѯ¼ȡ��</a>
     </div>
    </div>
    </div>
  </div>  
    </section> 
<!--��������end-->
</div>
<!--����-->
  <div class="Alumni_casebox">
       <div class="transverse_s">
           <img src="images/tp62.png" alt="ͼƬ" class="new-close-btn">
       </div>
  </div>
     <!--��2����-->
         <!--1-->
          <div class="swiper-container Alumni_case_bg">
                <div class="swiper-wrapper">
                    <?php echo $successCaseHtml ?>
               </div>
            </div>
          <!--2-->
            <div class="pagination" id="pagination_a"> 
                <?php for ($i=0; $i < count($successCaseArr); $i++) :?>
                    <div class="swiper-pagination-bullet"></div>
                <?php endfor ?>
            </div>  
    <a href="javascript:;"  class="btn25" onclick="doyoo.util.openChat('g=10061553'); return false;">����¼ȡ����</a>
<!--�ײ�����-->
<div class="bk_foot">
    <?php require_once($_SERVER["DOCUMENT_ROOT"].'/liuxue/include/home/footer_public_school.inc'); ?>
</div>
    <!-- Hidebox  ԺУ�ſ� -->
    <div class="college_overview summary_dialog" style="background:rgba(0,0,0,0.85);">
        <img src="images/tp62.png" class="new-closebtn">
        <h2>ԺУ�ſ�</h2>
        <div class="panel_info">
            <?php echo strip_tags($sInfo,"<br><a><img>");?>
                <?php echo $collegeImgHtml;?>
        </div>
    </div>
    <!-- Hidebox  �������� -->
    <div class="college_overview" id="apply_dialog" style="background:rgba(0,0,0,0.85);">
        <img src="images/tp62.png" class="new-closebtn">
        <h2>��������</h2>
        <ul class="apply_factor">
            <li>
                <p>��������</p>
                <span><?php echo $sFeature; ?></span>
            </li>
            <li>
                <p>��ѧ����</p>
                <span><?php echo $sCityinfo; ?></span>
            </li>
            <li>
                <p>�������</p>
                <span><?php echo $sMaterial; ?></span>
            </li>
            <li>
                <p>��������</p>
                <span><?php echo $sTraffic ?></span>
            </li>
        </ul>
        <div style="text-align:center">
            <a href="javascript:;" onclick="doyoo.util.openChat('g=10061553');&nbsp;return&nbsp;false;" class="dialog_href">������ѧ</a>
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
<!--�������-->
<script type="text/javascript">

var u = $(".transverse .swiper-slide").length;
if(u<=1){ 
     $(".swiper-pagination-bullet").css("background","none"); 
}else{
    var mySwiper = new Swiper ('.Alumni_case_bg', {
        direction : 'horizontal',
        speed:600,
        loop:true,
        pagination : '.pagination',
        paginationClickable :true,
    })
}
</script>
<script type="text/javascript">
      //add to favorite 
    var objid="20140829000157";
        var userid="";
        var type="academy";
        $('#fav').click(function(){
            var self=$(this);
            if(!userid){
                alert("���ȵ�½");
                window.location.href="/liuxue/login/index.php?fromurl="+window.location;
                return false;
            }
             if($(this).hasClass('disable')){// add to fav
                var url="/php/ajax.php?action=addToFav&objid="+objid+"&userid="+userid+"&favtype="+type
                $.get(url, function(data) {
                    if(data==0){
                        alert("��ע�ɹ�");
                        self.removeClass("disable");
                    }
                });
             }else{//remove class
                var url="/php/ajax.php?action=delFav&objid="+objid+"&userid="+userid+"&favtype="+type;
                $.get(url, function(data) {
                    if(data==0){
                        alert("ȡ����ע�ɹ�");
                       self.addClass("disable");
                    }
                });
             }
       })
/*У�Ѱ���*/
function jp(has){
    if(has==1){
      $(".Alumni_casebox").show();
      $(".Alumni_case_bg").animate({"left":"0.8rem"});
      $("#pagination_a").animate({"left":"-0.5rem"});
      }else{
        window.location.href="http://chat.looyuoms.com/chat/chat/p.do?c=20001470&f=10059545&g=10061553";
      }
}
/*�������*/
function pj(has){
    if(has==1){
     $('.transverse').animate({"left":"0.6rem"});
     $('.Application').show();
      }else{
        window.location.href="http://chat.looyuoms.com/chat/chat/p.do?c=20001470&f=10059545&g=10061553";
      }
}
</script>
</body>
</html>