/*��ֹ����*/
var mo=function(e){e.preventDefault();};
function stop(){
        document.body.style.overflow='hidden';        
        document.addEventListener("touchmove",mo,false);
}
function move(){
        document.body.style.overflow='';
        document.removeEventListener("touchmove",mo,false);        
}
$(function(){
	$('.page-a .one').click(function(){
$(this).css('background','#307cb7').html('<div class="inner-box"><em>�����ѧУ��5��)<br>��¼ȡ�Ŀ����Դ�������ǰ�������������롣</em><i>�ﱣ��ѧУ��5����<br>ȷ���ɹ���ѧ�ĺ�ѡУ���������뼸���������еס�</i><a href="zhineng.shtml" class="btn1">��ʼѡУ</a></div>');
	})
/*��������*/
  $('.page-a .four').click(function(){
$(this).css('background','#d17c28').html('<div class="inner-box"><em>�����ְҵ��Ȥ�����������Լ���ְҵ��Ȥ���ͣ�</em><i class="change-top">��鿴רҵ��������ȷ��ѧ����</i><a href="http://m.igo.cn/zt/SDS/" class="btn10" target="_blank">ְҵ��Ȥ����</a><a href="paiming3.shtml" class="btn11">�鿴רҵ����</a></div>');
  })
$('.Choose_school li').each(function(index){
	$(this).click(function(){
		$(this).addClass('current').siblings().removeClass('current');
		$('.Choose_school .tab').eq(index).show().siblings().hide();
	})
})
$('.University_rank li').each(function(index){
	$(this).click(function(){
		$(this).addClass('curr').siblings().removeClass('curr');
		$(".University_rank .school_tab").eq(index).show().siblings().hide();
	})
})
$('.ranking .show_a').click(function(){
        $('.ranking .show-a').slideToggle(600);
        var pic=$(this).find('.updowna').attr('src');      
        if(pic=="images/tp8.png"){
        	$('.updowna').attr('src','images/tp6.png');
        }else{
        	$('.updowna').attr('src','images/tp8.png');
        }
	})
$('.ranking .show_b').click(function(){
        $('.ranking .show-b').slideToggle(600);
        var pic=$(this).find('.updownb').attr('src');      
        if(pic=="images/tp8.png"){
          $('.updownb').attr('src','images/tp6.png');
        }else{
          $('.updownb').attr('src','images/tp8.png');
        }
  })
$('.ranking .show_c').click(function(){
        $('.ranking .show-c').slideToggle(600);
        var pic=$(this).find('.updownc').attr('src');      
        if(pic=="images/tp8.png"){
          $('.updownc').attr('src','images/tp6.png');
        }else{
          $('.updownc').attr('src','images/tp8.png');
        }
  })
$('.ranking .show_d').click(function(){
        $('.ranking .show-d').slideToggle(600);
        var pic=$(this).find('.updownd').attr('src');      
      if(pic=="images/tp8.png"){
          $('.updownd').attr('src','images/tp6.png');
        }else{
          $('.updownd').attr('src','images/tp8.png');
        }
  })
$('.ranking .show_e').click(function(){
        $('.ranking .show-e').slideToggle(600);
        var pic=$(this).find('.updowne').attr('src');     
        if(pic=="images/tp8.png"){
          $('.updowne').attr('src','images/tp6.png');
        }else{
          $('.updowne').attr('src','images/tp8.png');
        }
  })
$('.Independently .quence').click(function(){
  var status=$(this).attr('status');
  $(this).siblings().attr('status',0);
  $(this).siblings('li').find('img').attr('src','images/tp8.png');
  if(status==0){
    $('.shadow').show();
    $(this).attr('status',1);
  }else{
    $('.shadow').hide();
    $(this).attr('status',0);
  }
$('.header_head').css({'z-index':'99','position':'relative'});
$('.shadow').css({'top':'3.77rem'});
   $('.Independently .div2').hide();
   $('.Independently .div3').hide();
   $('.Independently .block').hide();
   $('.Independently .div1').slideToggle(600);
	   var picc=$(this).find('.up-downa').attr('src');
        if(picc=="images/tp6.png"){
        	$('.up-downa').attr('src','images/tp8.png');
        }else{
        	$('.up-downa').attr('src','images/tp6.png');
        }
})
$('.Independently .go').click(function(){
  var status=$(this).attr('status');
  $(this).siblings().attr('status',0);
  $(this).siblings('li').find('img').attr('src','images/tp8.png');
  if(status==0){
    $('.shadow').show();
    $(this).attr('status',1);
  }else{
    $('.shadow').hide();
    $(this).attr('status',0);
  }
   $('.Independently .div1').hide();
   $('.Independently .div3').hide();
   $('.Independently .block').hide();
$('.header_head').css({'z-index':'99','position':'relative'});
$('.shadow').css({'top':'3.77rem'});
   $('.Independently .div2').slideToggle(600);
	   var picc=$(this).find('.up-downb').attr('src');
        if(picc=="images/tp6.png"){
        	$('.up-downb').attr('src','images/tp8.png');
        }else{
        	$('.up-downb').attr('src','images/tp6.png');
        }
})
$('.Independently .quence_a').click(function(){
  var status=$(this).attr('status');
  $(this).siblings().attr('status',0);
  $(this).siblings('li').find('img').attr('src','images/tp8.png');
  if(status==0){
    $('.shadow').show();
    $(this).attr('status',1);
  }else{
    $('.shadow').hide();
    $(this).attr('status',0);
  }
   $('.Independently .div1').hide();
   $('.Independently .div2').hide();
   $('.Independently .block').hide();
$('.header_head').css({'z-index':'99','position':'relative'});
$('.shadow').css({'top':'3.77rem'});
    $('.Independently .div3').slideToggle(600);
	   var picc=$(this).find('.up-downc').attr('src');
        if(picc=="images/tp6.png"){
        	$('.up-downc').attr('src','images/tp8.png');
        }else{
        	$('.up-downc').attr('src','images/tp6.png');
        }
})
$('.Independently .screene').click(function(){
  var status=$(this).attr('status');
  $(this).siblings().attr('status',0);
  $(this).siblings('li').find('img').attr('src','images/tp8.png');
  if(status==0){
    $('.shadow').show();
    $(this).attr('status',1);
  }else{
    $('.shadow').hide();
    $(this).attr('status',0);
  }
   $('.Independently .div1').hide();
   $('.Independently .div2').hide();
   $('.Independently .div3').hide();
$('.header_head').css({'z-index':'99','position':'relative'});
$('.shadow').css({'top':'3.77rem'});
    $('.Independently .block').slideToggle(600);
	   var picc=$(this).find('.up-downd').attr('src');
        if(picc=="images/tp6.png"){
        	$('.up-downd').attr('src','images/tp8.png');
        }else{
        	$('.up-downd').attr('src','images/tp6.png');
        }
})
$(window).scroll(function(){
  var top = $(this).scrollTop();
  var scroll_height = top/40;
  var scroll_a = top/40;
  if(scroll_height>0.5){
    $('.choose_top').css({'top':'0rem',"z-index":"99",'position':'fixed',});
    $('.shadow').css({'top':'0rem'});
    $('.div1').css({'top':'1.77rem'});
    $('.div2').css({'top':'1.77rem'});
    $('.div3').css({'top':'1.77rem'});
    $('.block').css({'top':'1.77rem'});
  }else{
    $('.choose_top').css({'position':'','top':'2rem'});
    $('.shadow').css({'top':'3.77rem'});
    $('.div1').css({'top':'3.77rem'});
    $('.div2').css({'top':'3.77rem'});
    $('.div3').css({'top':'3.77rem'});
    $('.block').css({'top':'3.77rem'});
  }
})
$(window).scroll(function() {
    var top=$(this).scrollTop();
    var rem=top/40;
    if (rem>1.75) {
        $('.rank').css({'top':'0',"z-index":"99",'position':'fixed',});
        $('.C_rank').css({'top':'1.85rem',"z-index":"99",'position':'fixed'});
        $('#header_name').hide();
    }else{
        $('.rank').css({'position':''});
        $('.C_rank').css({'position':''});
        $('.C_rank').css('top','');
        $('#header_name').show();
    }
});
$('#submitSelection').click(function(){
      var destcountry = $("#destcountry option:selected").text();   
      var degree = $("#degree option:selected").val();             
      var major = $("#major option:selected").val();               
      var avgmark = $('#avgmark option:selected').val();           
      var lang = $("#lang option:selected").val();                 
      var rank = $("#rank option:selected").text();               
      var fee = $('#fee option:selected').val();                  
      if(destcountry == "��ѧĿ�ĵ�"){
            alert("��ѡ��������ѧĿ�ĵ�");
            return false;
      }
      if(degree == "����׶�"){
            alert("��ѡ����������׶�");
            return false;
      }
      if(major == "רҵ����"){
            alert("��ѡ������רҵ����");
            return false;
      }
      if(avgmark == "ƽ����"){
            alert("��ѡ������ƽ����");
            return false;
      }
      if(lang == "���Գɼ�"){
            alert("��ѡ���������Գɼ�");
            return false;
      }
      if(rank == "ԺУ����"){
            alert("��ѡ������ԺУ����");
            return false;
      } 
      if(fee == "��ѧԤ��"){
            alert("��ѡ��������ѧԤ��");
            return false;
      }                        
      mySwiper.slideTo(2,100);
})
$('#submitInfo').click(function(){
    var destcountry = $("#destcountry option:selected").text();   
    var degree = $("#degree option:selected").val();             
    var major = $("#major option:selected").val();              
    var avgmark = $('#avgmark option:selected').val();          
    var lang = $("#lang option:selected").val();                
    var rank = $("#rank option:selected").text();                
    var fee = $('#fee option:selected').val();                  
    var name = $(".name").val();                 
    var city = $("#city option:selected").val();                      
    var tel = $(".tel").val();                   
    if(name =="" || name =="����"){  
         alert("��������������");
            $(".name").val("");
            $(".name").focus();
            return false;
          }else{
            var reg=/([\u4E00-\u9FA5\uf900-\ufa2d]{2,3})|([a-zA-Z]{3,20})/;
            if(!name.match(reg)){
              alert("��˶�����������");
              $(".name").focus();
              return false;
            }else if(name.length>=5){
              alert("��˶�����������"); 
              $(".name").focus();
              return false;
            }
          }
      if(city == "����"){
            alert("��ѡ�����ĳ���");
            return false;
      }
      var reg=/^(13[0-9]|14[0-9]|15[0-9]|18[0-9]|17[0-9])\d{8}$/;
        if(tel=="" || tel =="�绰"){
            alert("������������ϵ��ʽ");
            $(".tel").val('');
            $(".tel").focus();
            return false;
          }
          else if(reg.test(tel) != true){
            alert("��˶�������ϵ��ʽ");
            $(".tel").focus();
            return false;
          }     
var note="��ѧĿ�ĵ�"+destcountry+ "����׶�"  +degree+ "רҵ����"+major+ "ƽ����"+avgmark+ "���Գɼ�"+lang+ "ԺУ����"+rank+ "��ѧԤ��" +fee;
 var szData = {
        custName:name,
        tel:tel,
        country:destcountry,
        city:city,
        note:note,
        oper:"save", 
        partId:$("#partId1").val(), 
        partName:$("#partName1").val()
    };
    var url="/php/freeTest.php";
    $.post(url,szData, function(data, textStatus, xhr) {
        var d=eval("("+data+")");
        var code=d.code;
        if(code==0||code==5){
            $('form[name="selection_form"]').submit();
        }        
    });
})
/*��ȡ����ʱ������ʧ*/
function clear(element,e){
  $(element).on({
    focus:function(){
     if($(this).val() == e){$(this).val('')}
   },blur:function(){
    if($(this).val() == ''){$(this).val(e)}
  }
})
}
clear(".name","����");
clear(".tel","�绰");
$(".right-search").click(function(){
  $('.search-tip').show();
  $('.shadow').show();
  $('.shadow').css({'top':'0rem'});
  $('.choose_top').css({'z-index':'77'});
  $('.div1').hide();
  $('.div2').hide();
  $('.div3').hide();
  $('.block').hide();
  $(".new-shadow").hide();
  $(".Project_detail").hide();
  $(".new-close").hide();
})
$(".cancel").click(function(){
  $('.search-tip').hide();
  $('.shadow').hide();
})
/*רҵ����*/
$(".new_innerbox li").click(function(){
   $(this).addClass('new-current').siblings().removeClass('new-current');
   var index = $(this).index();
   $(".new_innerbox .new-bottom_son").eq(index).show().siblings().hide();
})
$(".new-bottom_son em").each(function(index){
  $(this).click(function(){
      $(this).addClass('new-curr').parents('.new_box').siblings().find('em').removeClass('new-curr');
      $('.new-bottom_son .new-box-son').eq(index).slideToggle(600).parents('.new_box').siblings().find('.new-box-son').hide();
  }) 
})
/*�̿���*/
$(".new-bg-box p").each(function(index){
$(this).click(function(){
  $('.new-shadow').eq(index).show();
  $(".Project_detail").eq(index).show();
  $(".new-close").eq(index).show();
  $("body").css({"height":"100%","overflow":"hidden"});
});
});
$(".new-close").click(function(){
  $('.new-shadow').hide();
  $(".Project_detail").hide();
  $(".new-close").hide();
  $("body").css({"height":"100%","overflow-y":"scroll"});
})
/*new-colleges.shtml*/
/*ԺУ�ſ�*/
$('#school_summary_icon').click(function(){
        $('.summary_dialog').show();
    })
/*��������*/
$('#apply_factor_icon').click(function(){
        $('#apply_dialog').show()
    })
/*�������*/
$("#new-consultant").click(function(){
  var has=$(this).attr('hasdata');
  if(has==1){
    $('.transverse').animate({"left":"0.6rem"});
    $('.Application').show();
    return false;
  }
})
$('.new-close-btn').click(function(){
    $(".Application").hide();
    $('.transverse').animate({"left":"-20rem"});
})
/*����רҵ*/
$(".new-major").click(function(){
   $('.Application_bg').show();
})
$('.new-close-btn').click(function(){
    $(".Application_bg").hide();
})
/*��������*/
$(".new-Popular_major li em").each(function(){
          var fontlength = $(this).find('span').html().length;
        if(fontlength>4){
             $(this).find('img').css({"right":"-5.8rem"});
           }else if(fontlength==2){
                 $(this).find('img').css({"right":"-7.6rem"});         
           }
})
$('.major_box').hide();
$(".new-Popular_major li em").click(function(e){
  $(this).addClass('new-slide');
  $(this).parent("li").siblings().find('em').removeClass('new-slide');
  $(this).parent("li").siblings().find('em').toggleClass(function(){
    if($(this).hasClass('new-slide')){
        $(this).removeClass('new-slide');
    }else{
        $(this).addClass('new-slide');
    }
  });
  $(this).parent("li").find(".major_box").slideToggle();
  $(this).parent("li").siblings().find(".major_box").slideUp();
  var pic=$(this).find("img");
  var pic2=$(this).parent("li").siblings().find("img");
  pic2.attr("src","images/tp71.png");
  if(pic.attr("src")=="images/tp70.png"){
    pic.attr("src","images/tp71.png");
  }else{
    pic.attr("src","images/tp70.png");
  }
});
$(".new-Popular_major li em").eq(0).click();
/*��̬��ȡ���*/
        $(".new-box-son li a").each(function(){
          var titleLength = $(this).html().length;
        if(titleLength>6){
            $(this).parent("li").width(titleLength*0.65 + 'rem');
          }else{
            $(this).parent("li").css({'width':"3.875rem"});
          }
        })
$(".new-close-btn").click(function(){
   $('.Alumni_casebox').hide();
   $(".Alumni_case_bg").animate({"left":"-15rem"});
   $("#pagination_a").animate({"left":"-15rem"})
})
/*ԺУ����*/
$(".new-closebtn").click(function(){
  $(".summary_dialog").hide();
  $("#apply_dialog").hide();
})
  $(".showSearch").click(function(){
        $(".mask").show();
        $(".searchTip").show();
        $("body").attr("overflow-y","hidden");
        $('.countrybox-list').hide();
        $(".ummary_dialo").hide();
    });
    $(".cancel").click(function(){
        $(".mask").hide();
        $(".searchTip").hide();
        $("body").attr("overflow-y","auto");
    });
/*ѧԺ*/
$(window).scroll(function(){
  var x = $(this).scrollTop();
  if(x>2){
      $("#new-header").addClass("new-fixed");
      $("#new-C_rank").addClass("new-cark");
  }else{
     $("#new-header").removeClass("new-fixed");
     $("#new-C_rank").removeClass("new-cark");
  }
})
/*safairBUG*/
$(".radio-left").click(function(){
  $(".shadow").css({"top":"2rem"});
})
})


