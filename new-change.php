<?php
/*require_once($_SERVER["DOCUMENT_ROOT"].'/php/lib/PDODB.class.php');
// Z:/igowap/php/lib/PDODB.class.php
$db = PDODB::getCMS_DB();*/
require_once("selection.class.php");//Z:\igowap\new-school-match\selection.class.php
$selection=new selection();
$catid=$selection->getParameter('catid');
$catname=$selection->catarr[$catid]; // catarr:array catid=>catname
// echo $catname;
$typelist=$selection->getTopRanks($catname); //get all cat under academic type
$typenames=$typelist['typename'];
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
    <script type="text/javascript" charset="utf-8" src="http://lead.soperson.com/20001470/10059602.js">
    </script>
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
      <div class="header" style="position:fixed;top:0;left:0;z-index:99">
        <a href="paiming3.shtml"><img src="images/arrow.png" alt="ͼƬ" class="left-arrow"></a>
        <p><?php echo $catname; ?></p>
      </div>
      <div class="new_innerbox">
        <div class="innerbox_one">
          <li class="change-one new-current">רҵ����</li>
          <li class="change-two">��������</li>
          <li class="change-three"><a href="#" onclick="doyoo.util.openChat('g=10061553'); return false;">��ѧ����</a></li>
        </div>
        <!--���������-->
        <script>
        	$(function(){
        		$('.new-box-top').eq(0).find("em").click();
        	})
    	</script>
        <div class="new-bottom">
          <div class="new-bottom_son" style="display:block;">
            <?php foreach($typenames as $key=>$type): ?>
            <div class="new_box">
              <div class="new-box-top">
                <em <?php echo $key==0?'class="new-curr"':'' ?>><?php echo $type ?></em>
              </div>
              <div class="new-box-son" <?php $key==0?'style="display:block;"':'' ?>>
                <?php 
                    $majors=$selection->getTopRankMajors($typelist['typeid'][$key]);// param: top type
                    $nums=count($majors['typeid']);//����
                    for ($n=0; $n < $nums; $n++){
                ?>
                    <li><a href="Professional.php?rankid=<?php echo $majors['typeid'][$n] ?>"><?php echo $majors['name'][$n] ?></a></li>
                <?php 
                  } 
                ?>
              </div>
            </div>
            <?php endforeach ?>
          </div>
          <div class="new-bottom_son bg_ascension">
            <div class="text-box">
              <p>С��ʿ��������ѧҪ�����ʵ�����������Һõ�ʵϰ����Ҳ����ְ�ӷ������������ĿΪ���ṩһ��������ƽ̨��</p>
            </div>
            <?php 
            	$text="��Ŀ������...<br>";
            	$text.="<a href='tel:400-618-0271'>���¶��Ĳ���400-618-0271</a><br>";
            	$text.="Ҫ�����Ƶģ����Ź��רҵ����~";
            ?>
            <div class="new-inner_box">
              <h2>��Ŀ����</h2>
              <div class="new-bg-box">
                <?php if($catid==1) : ?>
				<p><img src="images/tp55.jpg" alt="ͼƬ">
					<span style="margin-left:-0.33rem;">���ʽ���������Ŀ</span>
				</p>
				<p><img src="images/tp56.jpg" alt="ͼƬ">
					<span>���ʽ���������Ŀ����Ӣ�棩</span>
				</p>
				<p><img src="images/tp57.jpg" alt="ͼƬ">
					<span style="margin-left:-0.45rem;">���ʲƻᾫӢ�ƻ�</span>
				</p>
				<p><img src="images/tp58.jpg" alt="ͼƬ">
					<span style="margin-left:-0.3rem;">Ͷ��֮·��Ŀ</span>
				</p>
				<p><img src="images/tp59.jpg" alt="ͼƬ">
					<span>DECA/FBLA������������</span>
				</p>
                <?php elseif($catid==2) : ?>
                    <p><img src="images/tp72.jpg" alt="ͼƬ">
                    <span style="left:0;">���ͻ�÷¡��ѧ������ѧԺ���й���</span>
                    <span style="top:2.5rem;left:0;">VEX�����˶���ѵ��Ӫ</span>
                    </p>
                <?php elseif($catid==3) : ?>
                    <p><img src="images/tp72.jpg" alt="ͼƬ">
                    <span style="left:0;">���ͻ�÷¡��ѧ������ѧԺ���й���</span>
                    <span style="top:2.5rem;left:0;">VEX�����˶���ѵ��Ӫ</span>
                    </p>
                <?php elseif($catid==4) : ?>
                 <p>
                  <img src="images/tp63.jpg" alt="ͼƬ">
                  <span>������ż�����Ŀ</span>
                </p>
                <?php elseif($catid==5) : ?>
                   <div class="createpro">
                    <p>��Ŀ������...</p>
                    <span>���¶��Ĳ���<a href="tel:400-618-0271">400-618-0271</a></span>
                    <span>Ҫ�����Ƶģ����Ź�䣺<a href="paiming3.shtml" class="createpro-son">רҵ����~</a></span>
                   </div>
                <?php elseif($catid==6) : ?>
                   <div class="createpro">
					          <p>��Ŀ������...</p>
                    <span>���¶��Ĳ���<a href="tel:400-618-0271">400-618-0271</a></span>
                    <span>Ҫ�����Ƶģ����Ź�䣺<a href="paiming3.shtml" class="createpro-son">רҵ����~</a></span>
                   </div>
                <?php elseif($catid==7) : ?>
                      <p><img src="images/tp64.jpg" alt="ͼƬ">
                         <span>�и۹���߻���Ŀ</span>
                      </p>
                      <p><img src="images/tp65.jpg" alt="ͼƬ">
                         <span>����կ�������ĳｨ��Ŀ</span>
                      </p>
                <?php elseif($catid==8) : ?>
                   <div class="createpro">
                    <p>��Ŀ������...</p>
                    <span>���¶��Ĳ���<a href="tel:400-618-0271">400-618-0271</a></span>
                    <span>Ҫ�����Ƶģ����Ź�䣺<a href="paiming3.shtml" class="createpro-son">רҵ����~</a></span>
                   </div>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a href="#"  onclick="doyoo.util.openChat('g=10061553'); return false;" class="btn13">������ѯ��������</a>
      <a href="tel:400-618-0271"  class="btn14">����רҵ�滮ʦ</a>
    </div>
<!--����-->
<?php if($catid==1) : ?>
<!--�̿�1.1-->
    <div class="new-shadow">
        <img src="images/tp62.png" alt="ͼƬ" class="new-close">
      <div class="Project_detail" style="display:none;">
        <h6>��Ŀ����</h6>
        <!--����-->
        <div class="Bright_spot">
          <p><span></span><em>����</em></p>
          <div class="spot_box" style="height:6.8rem;">
            <div class="Bright_box">
              <p>��۽�������Ȩ����ʿ�ڿ�</p>
              <p>Ӣ�����ϸ߹��Ƽ���</p>
              <p>ϵͳ�˽���۽����г�</p>
              <p>�˽�500ǿ��˾���ճ�����/ѧϰ�������</p>
            </div>
          </div>
        </div>
        <!--������Ⱥ-->
        <div class="App_people" style="margin-top:2.6rem;">
          <p><span></span><em>������Ⱥ</em></p>
          <div class="app">��������������</div>
        </div>
        <!--��Ŀ֤��-->
        <div class="Cer_project">
          <p><span></span><em>��Ŀ֤��</em></p>
          <div class="Cerp">
            <p>��ҵ֤�飨100%��</p>
            <p>�Ƽ��ţ�30%~50%��</p>
            <p>��ʤ�Ŷ�֤�飨20%~25%��</p>
          </div>
        </div>
        <!--�ײ���ť-->
        <div class="new-button">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">�鿴��Ŀʱ��</a>
          <a href="tel:400-618-8866" class="btn16 new-common">������ѯ����</a>
        </div>
      </div>
      </div>
    </div>
<!--�̿���1.2-->
  <div class="new-shadow">
        <img src="images/tp62.png" alt="ͼƬ" class="new-close">
      <div class="Project_detail" style="display:none;height:30rem;">
        <h6>��Ŀ����</h6>
        <!--����-->
        <div class="Bright_spot">
          <p><span></span><em>����</em></p>
          <div class="spot_box" style="height:7.8rem;">
            <div class="Bright_box">
              <p>��۽�������Ȩ����ʿ�ڿ�</p>
              <p>Ӣ�����ϸ߹��Ƽ���</p>
              <p>ϵͳ�˽���۽����г�</p>
              <p style="line-height:1rem;">ѧϰ�����г�������ս�Ժͷ���/ģ�������Ŀ������</p>
            </div>
          </div>
        </div>
        <!--������Ⱥ-->
        <div class="App_people" style="margin-top:3.7rem;">
          <p><span></span><em>������Ⱥ</em></p>
          <div class="app">������</div>
        </div>
        <!--��Ŀ֤��-->
        <div class="Cer_project">
          <p><span></span><em>��Ŀ֤��</em></p>
          <div class="Cerp">
            <p>��ҵ֤�飨100%��</p>
            <p>�Ƽ��ţ�30%~50%��</p>
            <p>��ʤ�Ŷ�֤�飨20%~25%��</p>
          </div>
        </div>
        <!--�ײ���ť-->
        <div class="new-button">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">�鿴��Ŀʱ��</a>
          <a href="tel:400-618-8866" class="btn16 new-common">������ѯ����</a>
        </div>
      </div>
      </div>
    </div>
<!--�̿���1.3-->
  <div class="new-shadow">
        <img src="images/tp62.png" alt="ͼƬ" class="new-close">
      <div class="Project_detail" style="display:none;height:31.1rem;">
        <h6>��Ŀ����</h6>
        <!--����-->
        <div class="Bright_spot">
          <p><span></span><em>����</em></p>
          <div class="spot_box" style="height:9.9rem;">
            <div class="Bright_box" style="width:92%;">
              <p>���Ψһרҵ���ƻ���ʵѵ��Ŀ</p>
              <p>��۽��ڻ���/����������߹��ڿ�</p>
              <p>���֪�����ڻ���/����������Ƽ���</p>
              <p>����500ǿ������ҵʵϰ����</p>
              <p style="width:12.6rem;">ϵͳ�˽����/˰������/ѧϰ��ҵ���౨�����</p>
              <p>������ҵ�ʲ��ṹ�����״��</p>
            </div>
          </div>
        </div>
        <!--������Ⱥ-->
        <div class="App_people" style="margin-top:5.8rem;">
          <p><span></span><em>������Ⱥ</em></p>
          <div class="app">����ѧ�����ƻ���רҵ�����о���</div>
        </div>
        <!--��Ŀ֤��-->
        <div class="Cer_project">
          <p><span></span><em>��Ŀ֤��</em></p>
          <div class="Cerp">
            <p>��ҵ֤�飨100%��</p>
            <p>�Ƽ��ţ�30%~50%��</p>
            <p>��ʤ�Ŷ�֤�飨20%~25%��</p>
          </div>
        </div>
        <!--�ײ���ť-->
        <div class="new-button">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">�鿴��Ŀʱ��</a>
          <a href="tel:400-618-8866" class="btn16 new-common">������ѯ����</a>
        </div>
      </div>
      </div>
    </div>
<!--�̿���1.4-->
  <div class="new-shadow">
        <img src="images/tp62.png" alt="ͼƬ" class="new-close">
      <div class="Project_detail" style="display:none;height:32.6rem;">
        <h6>��Ŀ����</h6>
        <!--����-->
        <div class="Bright_spot">
          <p><span></span><em>����</em></p>
          <div class="spot_box" style="height:10.9rem;">
            <div class="Bright_box" style="width:92%;">
              <p>���ΨһͶ����ʵѵ��Ŀ</p>
              <p style="line-height:1rem;">׼���ż����ߣ�Ҫ�к�ǿ�Ľ�������֪ʶ����רҵѧ���޷���ѡ����Ŀ</p>
              <p style="margin-top:1.6rem">��۽��ڻ���/Ͷ��/���и߹��ڿ�</p>
              <p>���֪�����ڻ���/Ͷ�и߹��Ƽ���</p>
              <P>����500ǿ������ҵʵϰ����</P>
              <P style="width:12.6rem;">ӭս��ǿ����ʵ��ģ�⣬���Ķ�������Ͷ����</P>
            </div>
          </div>
        </div>
        <!--������Ⱥ-->
        <div class="App_people" style="margin-top:6.8rem;">
          <p><span></span><em>������Ⱥ</em></p>
          <div class="app">����ѧ����������רҵ�����о���</div>
        </div>
        <!--��Ŀ֤��-->
        <div class="Cer_project">
          <p><span></span><em>��Ŀ֤��</em></p>
          <div class="Cerp">
            <p>��ҵ֤�飨100%��</p>
            <p>�Ƽ��ţ�30%~50%��</p>
            <p>��ʤ�Ŷ�֤�飨20%~25%��</p>
          </div>
        </div>
        <!--�ײ���ť-->
        <div class="new-button">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">�鿴��Ŀʱ��</a>
          <a href="tel:400-618-8866" class="btn16 new-common">������ѯ����</a>
        </div>
      </div>
      </div>
    </div>
<!--�̿���1.5-->
 <div class="new-shadow">
        <img src="images/tp62.png" alt="ͼƬ" class="new-close">
      <div class="Project_detail" style="display:none;height:34rem;">
        <h6>��Ŀ����</h6>
        <!--����-->
        <div class="Bright_spot">
          <p><span></span><em>����</em></p>
          <div class="spot_box" style="height:14.5rem;">
            <div class="Bright_box Bright_box_c">
              <p>�������ᡢ����������������ѧ�������뼼����֯��������ѧУ��Э�ᡢ������ѧ���»��һ���Ƽ����ϿɵĹٷ�Ȩ����Ŀ��</p>
              <p style="margin-top:2.8rem;">׼���ż����ߣ�Ҫ�к�ǿ�Ľ�������֪ʶ����רҵѧ���޷���ѡ����Ŀ</p>
              <p>����ߵĲ���֤������֤����ܵ��������ҽ������ٷ��Ͽɡ�</p>
              <p>�ӱ���������ǰ�ڣ�ѧ���ǲμ�������������ѵ����ѵ���ݰ�������ҵ����֪ʶ��ѵ��presentation������ѵ������д����ѵ����Ŀѡ����ӽ��顢��Ŀ��ϸ�����ȡ�</p>
            </div>
          </div>
        </div>
        <!--������Ⱥ-->
        <div class="App_people" style="margin-top:10.55rem;">
          <p><span></span><em>������Ⱥ</em></p>
          <div class="app">������</div>
        </div>
        <!--��Ŀ֤��-->
        <div class="Cer_project">
          <p><span></span><em>��Ŀ֤��</em></p>
          <div class="Cerp" style="height:1.7rem;">
            <p>����֤�飨100%��</p>
          </div>
        </div>
        <!--�ײ���ť-->
        <div class="new-button" style="margin-top:2.5rem;">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">�鿴��Ŀʱ��</a>
          <a href="tel:400-618-8866" class="btn16 new-common">������ѯ����</a>
        </div>
      </div>
      </div>
    </div>
<!--1����-->
<!--���/����2-3-->
<?php elseif($catid==2||$catid==3) : ?>
  <div class="new-shadow">
      <img src="images/tp62.png" alt="ͼƬ" class="new-close">
      <div class="Project_detail" style="height:41rem;">
        <h6>��Ŀ����</h6>
        <!--����-->
        <div class="Bright_spot">
          <p><span></span><em>����</em></p>
          <div class="spot_box" style="height:20.2rem;">
            <div class="Bright_box  Bright_box_b">
              <p>����Ȩ���γ̣������Ƚ���STEM ���������ROBOTC ��̼��������鿨�ͻ�÷¡��ѧ������ѧԺԭ֭ԭζ�����˿γ�</p>
              <p style="margin-top:2.5rem;">���ߺ������Ƽ���</p>
              <p>��ǿʦ���Ŷӣ�������ʦ��ͨ���������ͻ�÷¡��ѧ������ѧԺ��ʦ�ʸ���֤����һ֧��ս���������Ĺھ�ʦ�ʶ���</p>
              <p style="margin-top:2.5rem;">������֤ ������ѧ���ɼ��ϸ�ѧԱ�ɻ�ÿ��ͻ�÷¡��ѧ������ѧԺ���䷢��ROBOTC ���֤��</p>
              <p style="margin-top:2.5rem;">��ǿ���֧��</p>
              <p>�Խӹ��ڼ���������</p>
              <p>����̨ͬ������������λ���������ھ�����������ǰ��</p>
              <p style="margin-top:1.5rem;">�˴ζ���Ӫ���������Կ��ͻ�÷¡��ѧѧ��ǰ�����м����������ѧ��Ŀ����</p>
            </div>
          </div>
        </div>
        <!--������Ⱥ-->
        <div class="App_people" style="margin-top:16rem;">
          <p><span></span><em>������Ⱥ</em></p>
          <div class="app">13-18��</div>
        </div>
        <!--��Ŀ֤��-->
        <div class="Cer_project">
          <p><span></span><em>��Ŀ֤��</em></p>         
          <div class="Cerp" style="height:3rem;">
            <p style="line-height:1.2rem;padding:0.3rem 0 0 0.3rem;">�ɼ��ϸ�ѧԱ�ɻ�ÿ��ͻ�÷¡��ѧ������ѧԺ���䷢��ROBOTC���֤��</p>
          </div>
        </div>
        <!--�ײ���ť-->
        <div class="new-button" style="margin-top:3.5rem;">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">�鿴��Ŀʱ��</a>
          <a href="tel:400-618-8866" class="btn16 new-common">������ѯ����</a>
        </div>
      </div>
</div>
<!--23����-->
<!--�Ŀ�-->
<?php elseif($catid==4) : ?>
 <div class="new-shadow">
        <img src="images/tp62.png" alt="ͼƬ" class="new-close">
      <div class="Project_detail" style="display:none;height:30rem;">
        <h6>��Ŀ����</h6>
        <!--����-->
        <div class="Bright_spot">
          <p><span></span><em>����</em></p>
          <div class="spot_box" style="height:7.2rem;">
            <div class="Bright_box Bright_box_d">
              <p>���޶�������ѧ����ѧ����۽����ѧ��������Ĵ�ѧ��</p>
              <p>�ȵ�������ȵ��飬���ʵ�����Ų�д/������ӷ�ѧ</p>
              <p>��������Ĵ�ѧ��ҵ֤��/���Ÿ߹��Ƽ���</p>
            </div>
          </div>
        </div>
        <!--������Ⱥ-->
        <div class="App_people" style="margin-top:3.2rem;">
          <p><span></span><em>������Ⱥ</em></p>
          <div class="app">��������������</div>
        </div>
        <!--��Ŀ֤��-->
        <div class="Cer_project" style="margin-top:-0.1rem;">
          <p><span></span><em>��Ŀ֤��</em></p>
          <div class="Cerp" style="height:5.6rem;">
            <p>��ҵ֤�飨100%��</p>
            <p>�Ƽ��ţ�1��100%+2��50%��</p>
            <p>��ʤ�Ŷ�֤�飨30%~50%�� </p>
            <p>����ݽ�����֤��</p>
          </div>
        </div>
        <!--�ײ���ť-->
        <div class="new-button" style="margin-top:5.8rem;">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">�鿴��Ŀʱ��</a>
          <a href="tel:400-618-8866" class="btn16 new-common">������ѯ����</a>
        </div>
      </div>
      </div>
    </div>
<!--����ѧ��-->
<?php elseif($catid==7) : ?>
<!--7.1-->
<div class="new-shadow">
      <img src="images/tp62.png" alt="ͼƬ" class="new-close">
      <div class="Project_detail" style="display:none;height:33rem;">
        <h6>��Ŀ����</h6>
          <!--����-->
        <div class="Bright_spot">
            <p><span></span><em>����</em></p>
          <div class="spot_box" style="height:9.5rem;">
            <div class="Bright_box Bright_box_e">
              <p>֪��NGO���� �����磩��ѧ</p>
              <p>������/�»��Ļ����������/���������̻����һ�������</p>
              <p style="margin-top:1.4rem;">ģ�����Ƽ��ű���100%</p>
              <p>һ��ѧ�����ɻ�������Ƽ��ţ��� ������/�»��Ļ����������/���������̻� ����һ��</p>
              <p style="margin-top:1.4rem;">��Ŀ�к����г̣��ѹ���߻�����������</p>
          </div>
         </div>
        </div>
    <!--������Ⱥ-->
       <div class="App_people" style="margin-top:5.4rem;">
           <p><span></span><em>������Ⱥ</em></p>
           <div class="app">�������ϣ�����ѧ��</div>
       </div>
    <!--��Ŀ֤��-->
    <div class="Cer_project" style="margin-top:1.2rem;">
       <p><span></span><em>��Ŀ֤��</em></p>
       <div class="Cerp" style="height:5.65rem;">
           <p>��ҵ֤�飨100%��</p>
           <p>�Ƽ��ţ�1��100%+2��50%��</p>
           <p>��ʤ�Ŷ�֤�飨30%~50%��</p>
           <p>����ݽ�����֤��</p>
       </div>
    </div>
        <!--�ײ���ť-->
        <div class="new-button" style="margin-top:6rem;">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">�鿴��Ŀʱ��</a>
          <a href="tel:400-618-8866" class="btn16 new-common">������ѯ����</a>
        </div>
      </div>
      </div>
</div>
<!--7.2-->
 <div class="new-shadow">
        <img src="images/tp62.png" alt="ͼƬ" class="new-close">
      <div class="Project_detail" style="display:none;height:26rem;">
        <h6>��Ŀ����</h6>
        <!--����-->
        <div class="Bright_spot">
          <p><span></span><em>����</em></p>
          <div class="spot_box" style="height:6.9rem;">
            <div class="Bright_box Bright_box_e">
              <p style="width:12.6rem;">��������NGO��֯ Ptea Teuk Dong�䷢֤��</p>
              <p>ʵ�ز��������������뽨�裬�д�����ҵ�ɹ�չʾ</p>
              <p style="margin-top:1.4rem;">�����ʦȫ��Ϊ���ţ�������������һ����У�ı�ҵ��</p>
            </div>
          </div>
        </div>
        <!--������Ⱥ-->
        <div class="App_people" style="margin-top:2.8rem;">
          <p><span></span><em>������Ⱥ</em></p>
          <div class="app">��������</div>
        </div>
        <!--��Ŀ֤��-->
        <div class="Cer_project">
          <p><span></span><em>��Ŀ֤��</em></p>
          <div class="Cerp" style="height:1.7rem;">
            <p>��ҵ֤�飨100%��</p>
          </div>
        </div>
        <!--�ײ���ť-->
        <div class="new-button" style="margin-top:2.2rem;">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">�鿴��Ŀʱ��</a>
          <a href="tel:400-618-8866" class="btn16 new-common">������ѯ����</a>
        </div>
      </div>
      </div>
    </div>
<!--47����-->
<?php endif ?>
<!--�ײ�����-->
<div class="bk_foot">
    <?php require_once($_SERVER["DOCUMENT_ROOT"].'/liuxue/include/home/footer_public_school.inc'); ?>
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
          window.location.href='/php/sall.php?keywords='+key;
});
</script>
  </body>
</html>