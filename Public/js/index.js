// 首页新闻模块
$(function(){
    var timer = null;
    var n = 0;
    var news = document.getElementById('news_right_con');
    var newsCon = news.getElementsByTagName('li');
    
    function setNews(){
        timer = setInterval(function(){
            n=n+1;
    
            if(n>newsCon.length-5){
            
                $('.news .news_right li').eq(2).removeClass('op5').addClass('op1');
                $('.news .news_right li').eq(n+1).removeClass('op1');
                $('.news .news_right li').eq(n+1).children().css('color','#000');
                n=0;
            }
            
            $('.news .news_right ul').animate({top:'-'+(n*38)+'px'});
            $('.news .news_right li').eq(n).removeClass('op8 op1').addClass('op5');
            $('.news .news_right li').eq(n+1).removeClass('op5 op1').addClass('op8');
            $('.news .news_right li').eq(n+1).children().css('color','#000');
            $('.news .news_right li').eq(n+2).removeClass('op8').addClass('op1');
            $('.news .news_right li').eq(n+2).children().css('color','#fff');
            $('.news .news_right li').eq(n+3).removeClass('op5').addClass('op8');
            $('.news .news_right li').eq(n+4).addClass('op5');
    
    
            $('.news_left_con').eq(n-1).hide();
            $('.news_left_con').eq(n).fadeIn();
            
        },3000)
    }
    setNews();

    $('.news>.container').hover(function(){
        clearInterval(timer);
    },function(){
        setNews();
    });

})



//	公司简介轮播
$(function(){
	var timer = null;
	var n = 0;
	
	function showTime(n){
		$('.about_con').eq(n-1).hide();
		$('.about_con').eq(n).fadeIn();
		
		$('.about_con_stria_li').eq(n-1).css('border' , '2px solid #e7e7e7');
		$('.about_con_stria_li').eq(n).css('border' , '2px solid #00b9ef');
	}
	
	function showStria(){
		timer = setInterval(function(){
			showTime(n)
		n = n+1;
		if(n>1){
			n=0;
		}
		},3000)
		
	}
	showStria()
	
	
	$('.about_con_stria_li').hover(function(){
		clearInterval(timer);
		var liIndex = $(this).index();
		showTime(liIndex);
	},function(){
		showStria();
	})
	
	$('.about_con').hover(function(){
		clearInterval(timer);
	},function(){
		showStria();
	})
})


$(function(){
	$(document).ready(function() {
		$('#circleContent').carousel({
			interval: 2000
		}); //每隔5秒自动轮播 
	});
});


$(function(){

    window.onload=function(){
        var fiveUl = document.getElementById('five_top_ul');
        var fiveLi = fiveUl.getElementsByTagName('li');
        var fiveBottom = document.getElementById('five_bottom');
        var fiveBottomP = fiveBottom.getElementsByTagName('span');


        var i = 0;

        for(i = 0; i < fiveLi.length; i++) {
            fiveLi[i].timer = null;
            fiveLi[i].index = i;
            fiveLi[i].onmouseover = function() {
                fiveBottomP[this.index].style.display = 'block';
                startMove(fiveBottom, 210);
            }

            fiveLi[i].onmouseout = function() {

                for (var j = 0; j<fiveBottomP.length; j++) {
                    fiveBottomP[j].style.display = 'none';
                }
                startMove(fiveBottom, 0);
            }
        }


        function startMove(obj, iTarget) {
            clearInterval(obj.timer);
            obj.timer = setInterval(function() {
                var iSpeed = (iTarget - obj.offsetHeight) / 8;
                iSpeed = iSpeed > 0 ? Math.ceil(iSpeed) : Math.floor(iSpeed);

                if(obj.offsetHeight == iTarget) {
                    clearInterval(obj.timer);
                } else {
                    obj.style.height = obj.offsetHeight + iSpeed + 'px';
                }
            }, 30)
        }

    }

})


//合作伙伴点击事件
$(function(){
    var partnerLeft = document.getElementById('partner_con_left');
    var partnerRight = document.getElementById('partner_con_right');
    var partnerImg = document.getElementById('partner_con_img');
    partnerRight.onclick=function(){
        partnerImg.style.left = partnerImg.offsetLeft - 900 + 'px';
        if( partnerImg.style.left == -2700 + 'px' ){
            partnerImg.style.left = 0 + 'px';
        };
    };
    partnerLeft.onclick=function(){
        partnerImg.style.left = partnerImg.offsetLeft + 900 + 'px';
        if( partnerImg.style.left == 900 + 'px' ){
            partnerImg.style.left = -1800 + 'px';
        };
    };
});