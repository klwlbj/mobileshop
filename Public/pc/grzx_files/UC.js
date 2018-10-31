
//			右边二级
			$(function(){
				$('.olList').each(function(){
					$(this).on('mouseover',function(){
						$('#detail').show()
						var _index = $(this).index();
						$(this).css('background','#fff');
						$(this).siblings().css('background','rgba(51,51,51,.5)')
						$(this).siblings().find('a').css('color','#fff')
						
						var aObj = $(this).find('a'); //找到dl中的a标签
						$(aObj).css('color','#000');
						
						var liObj = $('#detail').find('li')[_index];
						$(liObj).addClass('active_menu');
						$(liObj).siblings().removeClass('active_menu');
					})
					$(this).on('mouseout',function(){
						$('#detail').hide();
						$(this).find('a').css('color','#fff');
						$(this).css('background','rgba(51,51,51,.5)')
					})
				})
				$('#detail').find('li').each(function(){
					$('#detail').on('mouseover',function(){
						$('#detail').show()
					})
					$('#detail').on('mouseout',function(){
						$('#detail').hide()
						$('.olList').css('background','rgba(51,51,51,.5)')
						$('.olList').find('a').css('color','#fff')
					})
				})
			})
			//下拉框
$(function(){
	$('.nav-left').hover(function () {
		$('.shutiao').show()
	},function () {
		$('.shutiao').hide()
	})
	
	$('#detail').hover(function () {
		$('.shutiao').show()
	},function () {
		$('.shutiao').hide()
	})
	$('.shutiao').hover(function () {
		$('.shutiao').show()
	},function () {
		$('.shutiao').hide()
	})
})
//vip选项卡
$(function(){
	$('.kindContent').click(function  () {
		var i=$('.kindContent').index(this);
		$('.tab').eq(i).show().siblings().hide();
		$('.kindContent').eq(i).siblings().removeClass('active_menu');
		$('.kindContent').eq(i).addClass('active_menu');
	})
})
//进度条
 function run(){  
        var bar = document.getElementById("bar"); 
        var total = document.getElementById("total"); 
    bar.style.width=parseInt(bar.style.width) + 1 + "%";  
    total.innerHTML = bar.style.width; 
    if(bar.style.width == "100%"){  
      window.clearTimeout(timeout); 
      return; 
    } 
    var timeout=window.setTimeout("run()",100); 
  } 
    window.onload = function(){  
       run(); 
    }  

window.onload=function(){ 
//设置年份的选择 
var myDate= new Date(); 
var startYear=myDate.getFullYear()-50;//起始年份 
var endYear=myDate.getFullYear()+50;//结束年份 
var startMonth=myDate.getMonth()-3;
var endMonth=myDate.getMonth()+8;
var startDate=myDate.getDate()-18;
var endDate=myDate.getDate()+12;
var obj=document.getElementById('myYear') ;
var obj1=document.getElementById('myMonth') ;
var obj2=document.getElementById('myDay') ;
for (var i=startYear;i<=endYear;i++) 
{ 
obj.options.add(new Option(i,i)); 
} 
obj.options[obj.options.length-51].selected=1; 
for (var a=startMonth;a<=endMonth;a++) 
{ 
obj1.options.add(new Option(a,a)); 
} 
obj1.options[obj1.options.length-8].selected=1; 
for (var b=startDate;b<=endDate;b++) 
{ 
obj2.options.add(new Option(b,b)); 
} 
obj2.options[obj2.options.length-13].selected=1; 
} 
//选项卡2
	$(function () {
		$('.data div').click(function () {
			var i=$('.data div').index(this)
			$(this).addClass('new').siblings().removeClass('new')
			$('.persondata #toppicture').eq(i).show().siblings().hide()
		})
})
	$(function () {
		$('.date div').click(function () {
			var i=$('.date div').index(this)
			$(this).addClass('new').siblings().removeClass('new')
			$('.persondata #toppicture').eq(i).show().siblings().hide()
		})
})
