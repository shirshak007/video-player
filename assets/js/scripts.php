<script>
$(()=>{
	$("#searchBox").focus();
	
	$("#speedtext").html("Speed : Normal");
	
	$.ajax({
        type: "POST",
        url: '<?php echo $base_url;?>getKeywords', 
        data: {
        	search : $("#searchBox").val(),
        },
        dataType : "json",  
        cache : false,
        success : function(data){
        	if(data['status'] == true) {
        		$("#playlistdiv").show();
        		videos = data['video'];
        		
        		html = "";
        		$.each(videos, function(index, value) {
                	html += '<li class="list-group-item playlist-item" data-search="'+data['keyword'][index]+'"><a href="javascript:;" class="playlist-item-link" data-id="'+index+'" style="display:block"><i class="fa fa-play playlist-play"></i> <i class="fa fa-pause playlist-pause" style="display:none"></i> '+data['keyword'][index]+'</a></li>';
                });

				//load the playlist
        		$("#playlist").html(html);
        		
        		//play video after clicking a video
        		$(".playlist-item-link").click(function(){
        			$("#speedtext").html("Speed : Normal");
        			
        			$(".playlist-item").each(function(){
        				$(this).removeClass("active");
        				$(this).removeClass("found");
        				$(".playlist-item-link").css("color","black");
        				$(".playlist-item-link").children(".playlist-play").show();
        				$(".playlist-item-link").children(".playlist-pause").hide();
        			})
        			
        			$(this).children(".playlist-play").hide();
        			$(this).children(".playlist-pause").show();
            		$(this).parent().addClass("active");
            		$(this).css("color","white");
            		
            		$("#descriptiondiv").show();
            		$("#description").html(data['desc'][$(this).attr('data-id')]);
            		$("#descriptionheader").html(data['keyword'][$(this).attr('data-id')]);
            		
            		var vid = document.getElementById("myVideo"); 
            		vid.pause();
            		$(".playicon").show();
            		$(".pauseicon").hide();
            		$(".playtext").show();
            		$(".pausetext").hide();
            		
            		$("#myVideo").html('<source src="<?php echo $base_url;?>'+data['video'][$(this).attr('data-id')]+'" type="video/mp4" data-id="'+$(this).attr('data-id')+'">')
            		
            		var vid = document.getElementById("myVideo"); 
            		vid.load();
            		
            		var playPromise = vid.play();
            		$(".playicon").hide();
            		$(".pauseicon").show();
            		$(".playtext").hide();
            		$(".pausetext").show();
                    if (playPromise !== undefined) {
                        playPromise.then(_ => {
                            // Automatic playback started!
                            // Show playing UI.
                            // We can now safely pause video...
                            video.pause();
                        }).catch(error => {
                            // Auto-play was prevented
                            // Show paused UI.
                        });
                    }
                    
            	})
            	
            	$("#playpause").click(function(){
            		$("#speedtext").html("Speed : Normal");
            		var vid = document.getElementById("myVideo"); 
            		
            		if (vid.paused) {
                    	console.log("VIDEO IS PAUSED");
                    	if($("#myVideo source").attr("src") != '') {
                    		vid.play();
                    		$(".playicon").hide();
                    		$(".pauseicon").show();
                    		$(".playtext").hide();
                    		$(".pausetext").show();
                    	}
                    	
                    } else {
                    	console.log("VIDEO IS PLAYING");
                    	vid.pause();
                    	$(".playicon").show();
                		$(".pauseicon").hide();
                		$(".playtext").show();
                		$(".pausetext").hide();
                    }
        		})
            	
            	//next video button click
            	$("#nextvideo").click(function(){
            		$("#speedtext").html("Speed : Normal");
            		current = $(".active").children().attr('data-id');
            		next = parseInt(current)+1;
            		
            		//scroll
            		document.getElementById('playlistdiv').scrollTo({top: next*24, behavior: 'smooth'});
            		
            		if(next == data['count']){
            			return 0;
            		}
            		$(".playlist-item").each(function(){
        				$(this).removeClass("active");
        				$(".playlist-item-link").css("color","black");
        				$(".playlist-item-link").children(".playlist-play").show();
        				$(".playlist-item-link").children(".playlist-pause").hide();
        			})
        			
        			$("a[data-id="+next+"]").trigger("click");
        			
            		$("#myVideo").html('<source src="<?php echo $base_url;?>'+data['video'][next]+'" type="video/mp4">')
            		var vid = document.getElementById("myVideo"); 
            		
                    var playPromise = vid.play();
                    $(".playicon").hide();
            		$(".pauseicon").show();
            		$(".playtext").hide();
            		$(".pausetext").show();
            		
                    if (playPromise !== undefined) {
                        playPromise.then(_ => {
                            // Automatic playback started!
                            // Show playing UI.
                            // We can now safely pause video...
                            vid.pause();
                            $(".playicon").show();
                    		$(".pauseicon").hide();
                    		$(".playtext").show();
                    		$(".pausetext").hide();
                        }).catch(error => {
                            // Auto-play was prevented
                            // Show paused UI.
                        });
                    }
            	})
            	
            	//previous video button click
            	$("#prevvideo").click(function(){
            		$("#speedtext").html("Speed : Normal");
            		current = $(".active").children().attr('data-id');
            		prev = parseInt(current)-1;
            		
            		document.getElementById('playlistdiv').scrollTo({top: prev*24, behavior: 'smooth'});
            		
            		if(prev < 0){
            			return 0;
            		}
            		
            		$(".playlist-item").each(function(){
        				$(this).removeClass("active");
        				$(".playlist-item-link").css("color","black");
        				$(".playlist-item-link").children(".playlist-play").show();
        				$(".playlist-item-link").children(".playlist-pause").hide();
        			})
        			
        			$("a[data-id="+prev+"]").trigger("click");
        			
            		$("#myVideo").html('<source src="<?php echo $base_url;?>'+data['video'][prev]+'" type="video/mp4">')
            		var vid = document.getElementById("myVideo"); 
            		
                    var playPromise = vid.play();
                    $(".playicon").hide();
            		$(".pauseicon").show();
            		$(".playtext").hide();
            		$(".pausetext").show();
                    if (playPromise !== undefined) {
                        playPromise.then(_ => {
                            // Automatic playback started!
                            // Show playing UI.
                            // We can now safely pause video...
                            video.pause();
                        }).catch(error => {
                            // Auto-play was prevented
                            // Show paused UI.
                        });
                    }
            	})
            	
            	//go backward button click
            	$("#backward").click(function(){
            		var vid = document.getElementById("myVideo"); 
					vid.currentTime -= 0.5;
            	})
            	
            	//go forward button click
            	$("#forward").click(function(){
            		var vid = document.getElementById("myVideo"); 
					vid.currentTime += 0.5;
            	})
            	
            	//-1 frame button click
            	$("#backwardoneframe").click(function(){
            		var vid = document.getElementById("myVideo"); 
            		vid.pause();
					$(".playicon").show();
            		$(".pauseicon").hide();
            		$(".playtext").show();
            		$(".pausetext").hide();
            		
					index = $("#myVideo source").attr('data-id');            		
            		duration = vid.duration;
            		frames = 1/data['framerate'][index];
            		
					vid.currentTime -= frames;
            	})
            	
            	//+1 frame button click
            	$("#forwardoneframe").click(function(){
            		var vid = document.getElementById("myVideo"); 
            		vid.pause();
            		$(".playicon").show();
            		$(".pauseicon").hide();
            		$(".playtext").show();
            		$(".pausetext").hide();

					index = $("#myVideo source").attr('data-id');            		
            		duration = vid.duration;
            		frames = 1/data['framerate'][index];
            		
					vid.currentTime += frames;
            	})
            	
            	//playback speed
            	$(".speedcontrol").click(function(){
            		speed = $(this).attr('data-speed');
            		var vid = document.getElementById("myVideo"); 
            		vid.playbackRate = speed;
            		
            		if(vid.playbackRate == 1) {
            			$("#speedtext").html("Speed : Normal")
					} else{
						$("#speedtext").html("Speed : "+speed+"x")
					}
            	})
        	} else {
        		$("#playlistdiv").show();
        		$("#playlist").html(data['message']);
        	}
        },
        error : function(data){
        	$("#videodiv").html("Some error occurred.");
        }
	});
})
$("#searchBox").on('input', () => {
	$("#searchBtn").trigger('click');
})

$("#searchBtn").click((e)=>{
	e.preventDefault();
	
	phrase = $("#searchBox").val().toUpperCase();
	
	i = 0;
	found = [];
	$(".playlist-item").each(function(index, value){
		$(this).removeClass('found');
		if(phrase == '') {
    		return 0;
    	}
    	
		keyword = $(this).attr('data-search').toUpperCase();
        if(keyword.indexOf(phrase) != -1){
        	found[i] = index;
        	i++;
        }
	})
	
	$("a[data-id="+found[0]+"]").parent().addClass("found");
	
	document.getElementById('playlistdiv').scrollTo({top: found[0]*24, behavior: 'smooth'});
})

function resetButtons() {
	$(".playicon").show();
	$(".pauseicon").hide();
	$(".playtext").show();
	$(".pausetext").hide();
	$(".playlist-item-link").children(".playlist-play").show();
	$(".playlist-item-link").children(".playlist-pause").hide();
}

$("#fullscreen").click(function(){
    var element = document.getElementById('myVideo');       
    if (element.mozRequestFullScreen) {
    	element.mozRequestFullScreen();
    } else if (element.webkitRequestFullScreen) {
    	element.webkitRequestFullScreen();
    }  
})
</script>
