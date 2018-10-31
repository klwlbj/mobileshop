$(document).ready(function(){
	var totWidth=0;
	var positions = new Array();
	$('#slides .slide').each(function(i){
		positions[i]= totWidth;
		totWidth += $(this).width();
		if(!$(this).width())
		{
			alert("Please, fill in width & height for all your images!");
			return false;
		}
	});
	$('#slides').width(totWidth);
	$('#dots a').mouseover(function(e,keepScroll){
			$('a.menuItem').removeClass('act').addClass('inact');
			$(this).addClass('act');
			
			var pos = $(this).prevAll('.menuItem').length;
			
			$('#slides').stop().animate({marginLeft:-positions[pos]+'px'},450);
			e.preventDefault();
			if(!keepScroll) clearInterval(itvl);
	});
	$('#dots a.menuItem:first').addClass('act').siblings().addClass('inact');
	var current=1;
	function autoAdvance()
	{
		if(current==-1) return false;
		$('#dots a').eq(current%$('#dots a').length).trigger('mouseover',[true]);
		current++;
	}
	var changeEvery = 20;
	var itvl = setInterval(function(){autoAdvance()},changeEvery*200);//设置自动播放时间，越大越慢
});