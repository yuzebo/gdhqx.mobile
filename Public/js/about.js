$(function(){
	$('.about_html a').hover(function(){
		$(this).children('.about_html_show').stop().fadeIn();
	},function(){
		$(this).children('.about_html_show').stop().fadeOut();
	})
})