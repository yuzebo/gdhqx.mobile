


function playPause() {
	 
		var myVideo = document.getElementsByTagName('video')[0];
	 
	    if (myVideo.paused){
	 
	        myVideo.play();
	        
	        $(".play").hide();
	        $("#video_passage_text").hide();
	        $("#video_black").hide();
		}
	    else{

	 		$(".play").show();
	 		$("#video_black").show();
	 		$("#video_passage_text").show();
	        myVideo.pause();
			}
		}
		