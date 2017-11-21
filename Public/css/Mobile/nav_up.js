



/*--------------------------------新闻导航-------------------------------*/
$(function(){
		$(".nav_A").click(function(){
			$(".white_img").remove();//移除下划线
			//var nav=$(this).attr("id").split('nav_A')[1];//获取id后面的数字
			//alert(nav);
			$(".nav_white").removeClass("nav_white");
			$(".white").remove();
			$(this).addClass('nav_white');
			$(this).append('<div class="white"></div>');
			
			
		})
	})




/*---------------menu菜单------------*/
		function myFunction(x) {
   		 x.classList.toggle("change");
		}
