$(function(){
	$('.nav-right_ul>li>a').hover(function() {
		$(this).children().stop().addClass('active_this').animate({
			width: '100%'
		});
	}, function() {
		$(this).children().stop().animate({
			width: '0px'
		})
	});
	
	
//	$('.header_two_nav').parent().hover(function(){
//		$('.header_two_nav').fadeIn();
//	},function(){
//		$('.header_two_nav').fadeOut();
//	})
});

	






//	$('.header_two_five').parent().hover(function(){
//		$('.header_two_five').fadeIn();
//	},function(){
//		$('.header_two_five').fadeOut();
//	})
	
	
//	五大领域导航二级菜单
$(function(){
	var timer = null;
	var times = null;
	
	$('.header_two_afive').hover(function(){
		$('.header_two_five').fadeIn();
		clearInterval(timer);
	},function(){
		timer = setInterval(function(){
			$('.header_two_five').fadeOut();
		},1000)
		
		$('.header_two_five').mouseover(function(){
			clearInterval(timer);
		});
		
	});
	
	$('.header_two_five').hover(function(){
		clearInterval(times);
	},function(){
		times = setInterval(function(){
			$('.header_two_five').fadeOut();
		},1000)
		
		$('.header_two_afive').mouseover(function(){
			clearInterval(times);
		});
		
	});
});

	
	
	
	
//	公司概况导航二级菜单
$(function(){
	var timer = null;
	var times = null;
	
	$('.header_two_aintro').hover(function(){
		$('.header_two_intro').fadeIn();
		clearInterval(timer);
	},function(){
		timer = setInterval(function(){
			$('.header_two_intro').fadeOut();
		},1000)
		
		$('.header_two_intro').mouseover(function(){
			clearInterval(timer);
		});
		
	});
	
	$('.header_two_intro').hover(function(){
		clearInterval(times);
	},function(){
		times = setInterval(function(){
			$('.header_two_intro').fadeOut();
		},1000)
		
		$('.header_two_aintro').mouseover(function(){
			clearInterval(times);
		});
		
	});
})
	
//导航栏切换冲突
$(function(){
	
	$('.header_two_afive').mouseover(function(){
		$('.header_two_intro').hide();
	})
	
	$('.header_two_aintro').mouseover(function(){
		$('.header_two_five').hide();
	})
	
})

$(function(){
//	var navRightUl = document.getElementById('nav-right_ul');
//	var navRightUlA = navRightUl.getElementsByTagName('a');
//	var navRightUlI = navRightUl.getElementsByTagName('i');
//
//
//	for (var i = 0; i<navRightUlA.length; i++) {
//		navRightUlA[i].onclick=function(){
//
//			alert();
//
//		};
//
//	};

    $('#nav-right_ul>li').mouseover(function(){

        $(this).children('a').addClass('header_active').siblings().removeClass('header_active');



    });



});

//子页面导航栏点击效果
$(function(){
	window.onload = function () {
        $('.base_nav ul li').click(function(){
            $(this).addClass('base_nav_active');
            $(this).siblings('li').removeClass('base_nav_active');
        });
    }

});