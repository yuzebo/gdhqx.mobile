		

		/*---------------侧边导航-------------*/

		$(function(){
			$(".menu").click(function(){
				if($("#phonemenu").css("display") == "none" ){
					$("#phonemenu").show("slow");
				}

				else{
					$("#phonemenu").hide("slow");
				}


			/*$("body").animate({marginRight:'200px'});*/
			})
		})	



		/*---------------menu菜单------------*/


		function myFunction(x) {
   		 x.classList.toggle("change");
		}