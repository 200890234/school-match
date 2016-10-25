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
        <a href="paiming3.shtml"><img src="images/arrow.png" alt="图片" class="left-arrow"></a>
        <p><?php echo $catname; ?></p>
      </div>
      <div class="new_innerbox">
        <div class="innerbox_one">
          <li class="change-one new-current">专业排名</li>
          <li class="change-two">背景提升</li>
          <li class="change-three"><a href="#" onclick="doyoo.util.openChat('g=10061553'); return false;">留学方案</a></li>
        </div>
        <!--下面的容器-->
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
                    $nums=count($majors['typeid']);//个数
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
              <p>小贴士：出国留学要求课外活动实践经历，而且好的实习经验也是求职加分项；背景提升项目为你提供一个锻炼的平台！</p>
            </div>
            <?php 
            	$text="项目开发中...<br>";
            	$text.="<a href='tel:400-618-0271'>有事儿的拨打400-618-0271</a><br>";
            	$text.="要涨姿势的，接着逛逛专业排名~";
            ?>
            <div class="new-inner_box">
              <h2>项目内容</h2>
              <div class="new-bg-box">
                <?php if($catid==1) : ?>
				<p><img src="images/tp55.jpg" alt="图片">
					<span style="margin-left:-0.33rem;">国际金融领袖项目</span>
				</p>
				<p><img src="images/tp56.jpg" alt="图片">
					<span>国际金融领袖项目（精英版）</span>
				</p>
				<p><img src="images/tp57.jpg" alt="图片">
					<span style="margin-left:-0.45rem;">国际财会精英计划</span>
				</p>
				<p><img src="images/tp58.jpg" alt="图片">
					<span style="margin-left:-0.3rem;">投行之路项目</span>
				</p>
				<p><img src="images/tp59.jpg" alt="图片">
					<span>DECA/FBLA商赛（美国）</span>
				</p>
                <?php elseif($catid==2) : ?>
                    <p><img src="images/tp72.jpg" alt="图片">
                    <span style="left:0;">卡耐基梅隆大学机器人学院（中国）</span>
                    <span style="top:2.5rem;left:0;">VEX机器人冬季训练营</span>
                    </p>
                <?php elseif($catid==3) : ?>
                    <p><img src="images/tp72.jpg" alt="图片">
                    <span style="left:0;">卡耐基梅隆大学机器人学院（中国）</span>
                    <span style="top:2.5rem;left:0;">VEX机器人冬季训练营</span>
                    </p>
                <?php elseif($catid==4) : ?>
                 <p>
                  <img src="images/tp63.jpg" alt="图片">
                  <span>香港新闻记者项目</span>
                </p>
                <?php elseif($catid==5) : ?>
                   <div class="createpro">
                    <p>项目开发中...</p>
                    <span>有事儿的拨打：<a href="tel:400-618-0271">400-618-0271</a></span>
                    <span>要涨姿势的，接着逛逛：<a href="paiming3.shtml" class="createpro-son">专业排名~</a></span>
                   </div>
                <?php elseif($catid==6) : ?>
                   <div class="createpro">
					          <p>项目开发中...</p>
                    <span>有事儿的拨打：<a href="tel:400-618-0271">400-618-0271</a></span>
                    <span>要涨姿势的，接着逛逛：<a href="paiming3.shtml" class="createpro-son">专业排名~</a></span>
                   </div>
                <?php elseif($catid==7) : ?>
                      <p><img src="images/tp64.jpg" alt="图片">
                         <span>中港公益策划项目</span>
                      </p>
                      <p><img src="images/tp65.jpg" alt="图片">
                         <span>柬埔寨教育中心筹建项目</span>
                      </p>
                <?php elseif($catid==8) : ?>
                   <div class="createpro">
                    <p>项目开发中...</p>
                    <span>有事儿的拨打：<a href="tel:400-618-0271">400-618-0271</a></span>
                    <span>要涨姿势的，接着逛逛：<a href="paiming3.shtml" class="createpro-son">专业排名~</a></span>
                   </div>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a href="#"  onclick="doyoo.util.openChat('g=10061553'); return false;" class="btn13">在线咨询申请条件</a>
      <a href="tel:400-618-0271"  class="btn14">连线专业规划师</a>
    </div>
<!--弹窗-->
<?php if($catid==1) : ?>
<!--商科1.1-->
    <div class="new-shadow">
        <img src="images/tp62.png" alt="图片" class="new-close">
      <div class="Project_detail" style="display:none;">
        <h6>项目详情</h6>
        <!--亮点-->
        <div class="Bright_spot">
          <p><span></span><em>亮点</em></p>
          <div class="spot_box" style="height:6.8rem;">
            <div class="Bright_box">
              <p>香港金融领域权威人士授课</p>
              <p>英国保诚高管推荐信</p>
              <p>系统了解香港金融市场</p>
              <p>了解500强公司的日常运作/学习个人理财</p>
            </div>
          </div>
        </div>
        <!--试用人群-->
        <div class="App_people" style="margin-top:2.6rem;">
          <p><span></span><em>适用人群</em></p>
          <div class="app">高中生、本科生</div>
        </div>
        <!--项目证书-->
        <div class="Cer_project">
          <p><span></span><em>项目证书</em></p>
          <div class="Cerp">
            <p>结业证书（100%）</p>
            <p>推荐信（30%~50%）</p>
            <p>优胜团队证书（20%~25%）</p>
          </div>
        </div>
        <!--底部按钮-->
        <div class="new-button">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">查看项目时间</a>
          <a href="tel:400-618-8866" class="btn16 new-common">报名咨询热线</a>
        </div>
      </div>
      </div>
    </div>
<!--商科类1.2-->
  <div class="new-shadow">
        <img src="images/tp62.png" alt="图片" class="new-close">
      <div class="Project_detail" style="display:none;height:30rem;">
        <h6>项目详情</h6>
        <!--亮点-->
        <div class="Bright_spot">
          <p><span></span><em>亮点</em></p>
          <div class="spot_box" style="height:7.8rem;">
            <div class="Bright_box">
              <p>香港金融领域权威人士授课</p>
              <p>英国保诚高管推荐信</p>
              <p>系统了解香港金融市场</p>
              <p style="line-height:1rem;">学习金融市场的运作战略和方法/模拟金融项目的运作</p>
            </div>
          </div>
        </div>
        <!--试用人群-->
        <div class="App_people" style="margin-top:3.7rem;">
          <p><span></span><em>适用人群</em></p>
          <div class="app">本科生</div>
        </div>
        <!--项目证书-->
        <div class="Cer_project">
          <p><span></span><em>项目证书</em></p>
          <div class="Cerp">
            <p>结业证书（100%）</p>
            <p>推荐信（30%~50%）</p>
            <p>优胜团队证书（20%~25%）</p>
          </div>
        </div>
        <!--底部按钮-->
        <div class="new-button">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">查看项目时间</a>
          <a href="tel:400-618-8866" class="btn16 new-common">报名咨询热线</a>
        </div>
      </div>
      </div>
    </div>
<!--商科类1.3-->
  <div class="new-shadow">
        <img src="images/tp62.png" alt="图片" class="new-close">
      <div class="Project_detail" style="display:none;height:31.1rem;">
        <h6>项目详情</h6>
        <!--亮点-->
        <div class="Bright_spot">
          <p><span></span><em>亮点</em></p>
          <div class="spot_box" style="height:9.9rem;">
            <div class="Bright_box" style="width:92%;">
              <p>香港唯一专业级财会类实训项目</p>
              <p>香港金融机构/会计事务所高管授课</p>
              <p>香港知名金融机构/会计事务所推荐信</p>
              <p>世界500强金融企业实习经历</p>
              <p style="width:12.6rem;">系统了解财务/税务体制/学习企业各类报告分析</p>
              <p>评估企业资产结构与财务状况</p>
            </div>
          </div>
        </div>
        <!--试用人群-->
        <div class="App_people" style="margin-top:5.8rem;">
          <p><span></span><em>适用人群</em></p>
          <div class="app">本科学生（财会类专业），研究生</div>
        </div>
        <!--项目证书-->
        <div class="Cer_project">
          <p><span></span><em>项目证书</em></p>
          <div class="Cerp">
            <p>结业证书（100%）</p>
            <p>推荐信（30%~50%）</p>
            <p>优胜团队证书（20%~25%）</p>
          </div>
        </div>
        <!--底部按钮-->
        <div class="new-button">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">查看项目时间</a>
          <a href="tel:400-618-8866" class="btn16 new-common">报名咨询热线</a>
        </div>
      </div>
      </div>
    </div>
<!--商科类1.4-->
  <div class="new-shadow">
        <img src="images/tp62.png" alt="图片" class="new-close">
      <div class="Project_detail" style="display:none;height:32.6rem;">
        <h6>项目详情</h6>
        <!--亮点-->
        <div class="Bright_spot">
          <p><span></span><em>亮点</em></p>
          <div class="spot_box" style="height:10.9rem;">
            <div class="Bright_box" style="width:92%;">
              <p>香港唯一投行类实训项目</p>
              <p style="line-height:1rem;">准入门槛极高，要有很强的金融领域知识，非专业学生无法入选该项目</p>
              <p style="margin-top:1.6rem">香港金融机构/投行/银行高管授课</p>
              <p>香港知名金融机构/投行高管推荐信</p>
              <P>世界500强金融企业实习经历</P>
              <P style="width:12.6rem;">迎战超强任务，实景模拟，对弈顶级机构投资者</P>
            </div>
          </div>
        </div>
        <!--试用人群-->
        <div class="App_people" style="margin-top:6.8rem;">
          <p><span></span><em>适用人群</em></p>
          <div class="app">本科学生（金融类专业），研究生</div>
        </div>
        <!--项目证书-->
        <div class="Cer_project">
          <p><span></span><em>项目证书</em></p>
          <div class="Cerp">
            <p>结业证书（100%）</p>
            <p>推荐信（30%~50%）</p>
            <p>优胜团队证书（20%~25%）</p>
          </div>
        </div>
        <!--底部按钮-->
        <div class="new-button">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">查看项目时间</a>
          <a href="tel:400-618-8866" class="btn16 new-common">报名咨询热线</a>
        </div>
      </div>
      </div>
    </div>
<!--商科类1.5-->
 <div class="new-shadow">
        <img src="images/tp62.png" alt="图片" class="new-close">
      <div class="Project_detail" style="display:none;height:34rem;">
        <h6>项目详情</h6>
        <!--亮点-->
        <div class="Bright_spot">
          <p><span></span><em>亮点</em></p>
          <div class="spot_box" style="height:14.5rem;">
            <div class="Bright_box Bright_box_c">
              <p>美国国会、美国教育部、美国学生生涯与技能组织、美国中学校长协会、美国大学理事会等一致推荐和认可的官方权威项目。</p>
              <p style="margin-top:2.8rem;">准入门槛极高，要有很强的金融领域知识，非专业学生无法入选该项目</p>
              <p>其出具的参赛证明、获奖证书均受到美国国家教育部官方认可。</p>
              <p>从报名到参赛前期，学生们参加了数次线上培训，培训内容包括：商业基础知识培训、presentation技巧培训、文书写作培训、项目选择及组队建议、项目详细分析等。</p>
            </div>
          </div>
        </div>
        <!--试用人群-->
        <div class="App_people" style="margin-top:10.55rem;">
          <p><span></span><em>适用人群</em></p>
          <div class="app">高中生</div>
        </div>
        <!--项目证书-->
        <div class="Cer_project">
          <p><span></span><em>项目证书</em></p>
          <div class="Cerp" style="height:1.7rem;">
            <p>参赛证书（100%）</p>
          </div>
        </div>
        <!--底部按钮-->
        <div class="new-button" style="margin-top:2.5rem;">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">查看项目时间</a>
          <a href="tel:400-618-8866" class="btn16 new-common">报名咨询热线</a>
        </div>
      </div>
      </div>
    </div>
<!--1结束-->
<!--理科/工科2-3-->
<?php elseif($catid==2||$catid==3) : ?>
  <div class="new-shadow">
      <img src="images/tp62.png" alt="图片" class="new-close">
      <div class="Project_detail" style="height:41rem;">
        <h6>项目详情</h6>
        <!--亮点-->
        <div class="Bright_spot">
          <p><span></span><em>亮点</em></p>
          <div class="spot_box" style="height:20.2rem;">
            <div class="Bright_box  Bright_box_b">
              <p>卡大权威课程：采用先进的STEM 教育理念和ROBOTC 编程技术，体验卡耐基梅隆大学机器人学院原汁原味机器人课程</p>
              <p style="margin-top:2.5rem;">超高含金量推荐信</p>
              <p>超强师资团队：所有老师均通过美国卡耐基梅隆大学机器人学院教师资格认证，是一支征战国际赛场的冠军师资队伍</p>
              <p style="margin-top:2.5rem;">国际认证 助力升学：成绩合格学员可获得卡耐基梅隆大学机器人学院所颁发的ROBOTC 编程证书</p>
              <p style="margin-top:2.5rem;">超强软件支持</p>
              <p>对接国内及国际赛事</p>
              <p>中美同台竞技：力邀多次获得世锦赛冠军的美国队伍前来</p>
              <p style="margin-top:1.5rem;">此次冬令营将邀请来自卡耐基梅隆大学学子前来进行技术及国外大学科目交流</p>
            </div>
          </div>
        </div>
        <!--试用人群-->
        <div class="App_people" style="margin-top:16rem;">
          <p><span></span><em>适用人群</em></p>
          <div class="app">13-18岁</div>
        </div>
        <!--项目证书-->
        <div class="Cer_project">
          <p><span></span><em>项目证书</em></p>         
          <div class="Cerp" style="height:3rem;">
            <p style="line-height:1.2rem;padding:0.3rem 0 0 0.3rem;">成绩合格学员可获得卡耐基梅隆大学机器人学院所颁发的ROBOTC编程证书</p>
          </div>
        </div>
        <!--底部按钮-->
        <div class="new-button" style="margin-top:3.5rem;">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">查看项目时间</a>
          <a href="tel:400-618-8866" class="btn16 new-common">报名咨询热线</a>
        </div>
      </div>
</div>
<!--23结束-->
<!--文科-->
<?php elseif($catid==4) : ?>
 <div class="new-shadow">
        <img src="images/tp62.png" alt="图片" class="new-close">
      <div class="Project_detail" style="display:none;height:30rem;">
        <h6>项目详情</h6>
        <!--亮点-->
        <div class="Bright_spot">
          <p><span></span><em>亮点</em></p>
          <div class="spot_box" style="height:7.2rem;">
            <div class="Bright_box Bright_box_d">
              <p>亚洲顶尖新闻学府访学（香港浸会大学或香港中文大学）</p>
              <p>热点新闻深度调查，香港实地新闻采写/凤凰卫视访学</p>
              <p>浸会或中文大学结业证书/新闻高管推荐信</p>
            </div>
          </div>
        </div>
        <!--试用人群-->
        <div class="App_people" style="margin-top:3.2rem;">
          <p><span></span><em>适用人群</em></p>
          <div class="app">高中生、本科生</div>
        </div>
        <!--项目证书-->
        <div class="Cer_project" style="margin-top:-0.1rem;">
          <p><span></span><em>项目证书</em></p>
          <div class="Cerp" style="height:5.6rem;">
            <p>结业证书（100%）</p>
            <p>推荐信（1封100%+2封50%）</p>
            <p>优胜团队证书（30%~50%） </p>
            <p>最佳演讲个人证书</p>
          </div>
        </div>
        <!--底部按钮-->
        <div class="new-button" style="margin-top:5.8rem;">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">查看项目时间</a>
          <a href="tel:400-618-8866" class="btn16 new-common">报名咨询热线</a>
        </div>
      </div>
      </div>
    </div>
<!--社会科学类-->
<?php elseif($catid==7) : ?>
<!--7.1-->
<div class="new-shadow">
      <img src="images/tp62.png" alt="图片" class="new-close">
      <div class="Project_detail" style="display:none;height:33rem;">
        <h6>项目详情</h6>
          <!--亮点-->
        <div class="Bright_spot">
            <p><span></span><em>亮点</em></p>
          <div class="spot_box" style="height:9.5rem;">
            <div class="Bright_box Bright_box_e">
              <p>知名NGO（如 扶轮社）访学</p>
              <p>扶轮社/新华文化教育基金会/国际青年商会三家机构主办</p>
              <p style="margin-top:1.4rem;">模板型推荐信比例100%</p>
              <p>一名学生最多可获得三封推荐信，由 扶轮社/新华文化教育基金会/国际青年商会 各开一封</p>
              <p style="margin-top:1.4rem;">项目有后续行程，把公益策划真正做出来</p>
          </div>
         </div>
        </div>
    <!--试用人群-->
       <div class="App_people" style="margin-top:5.4rem;">
           <p><span></span><em>适用人群</em></p>
           <div class="app">初二以上，高中学生</div>
       </div>
    <!--项目证书-->
    <div class="Cer_project" style="margin-top:1.2rem;">
       <p><span></span><em>项目证书</em></p>
       <div class="Cerp" style="height:5.65rem;">
           <p>结业证书（100%）</p>
           <p>推荐信（1封100%+2封50%）</p>
           <p>优胜团队证书（30%~50%）</p>
           <p>最佳演讲个人证书</p>
       </div>
    </div>
        <!--底部按钮-->
        <div class="new-button" style="margin-top:6rem;">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">查看项目时间</a>
          <a href="tel:400-618-8866" class="btn16 new-common">报名咨询热线</a>
        </div>
      </div>
      </div>
</div>
<!--7.2-->
 <div class="new-shadow">
        <img src="images/tp62.png" alt="图片" class="new-close">
      <div class="Project_detail" style="display:none;height:26rem;">
        <h6>项目详情</h6>
        <!--亮点-->
        <div class="Bright_spot">
          <p><span></span><em>亮点</em></p>
          <div class="spot_box" style="height:6.9rem;">
            <div class="Bright_box Bright_box_e">
              <p style="width:12.6rem;">当地著名NGO组织 Ptea Teuk Dong颁发证书</p>
              <p>实地参与教育中心设计与建设，有慈善事业成果展示</p>
              <p style="margin-top:1.4rem;">领队老师全部为剑桥，伯克利等世界一流名校的毕业生</p>
            </div>
          </div>
        </div>
        <!--试用人群-->
        <div class="App_people" style="margin-top:2.8rem;">
          <p><span></span><em>适用人群</em></p>
          <div class="app">初高中生</div>
        </div>
        <!--项目证书-->
        <div class="Cer_project">
          <p><span></span><em>项目证书</em></p>
          <div class="Cerp" style="height:1.7rem;">
            <p>结业证书（100%）</p>
          </div>
        </div>
        <!--底部按钮-->
        <div class="new-button" style="margin-top:2.2rem;">
          <a href="#" class="btn15 new-common" onclick="doyoo.util.openChat('g=10061553'); return false;">查看项目时间</a>
          <a href="tel:400-618-8866" class="btn16 new-common">报名咨询热线</a>
        </div>
      </div>
      </div>
    </div>
<!--47结束-->
<?php endif ?>
<!--底部调用-->
<div class="bk_foot">
    <?php require_once($_SERVER["DOCUMENT_ROOT"].'/liuxue/include/home/footer_public_school.inc'); ?>
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
          window.location.href='/php/sall.php?keywords='+key;
});
</script>
  </body>
</html>