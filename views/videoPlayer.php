<?php  $base_url = "/";?>
<head>
	<title>Indian Sign Language Dictionary</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<link rel="icon" type="image/x-icon" href="<?php echo $base_url;?>data/images/favicon.ico">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $base_url;?>assets/css/styles.css">
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/811824b076.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="" href="<?php echo $base_url;?>" style="text-decoration:none; color:white">
    	<img src="<?php echo $base_url;?>data/images/rkm_logo.png" alt="..." height="36">
    	<span class="brand-name">
    		Indian Sign Language Dictionary - FDMSE
		</span>
    </a>
  </div>
</nav>

<div class="container-fluid mycontainer">
	<br>
	<div class="card" style="background: rgba(255,255,255,0.2);">
		<div class="card-body"  style="background: rgba(255,255,255,0.3);">
			<div class="row" style="background: rgba(255,255,255,0.2);">
				<div class="col-md-12 col-lg-3">
					<div class="card" style="background: rgba(255,255,255,0.2);">
						<div class="card-body" id="sidenav" style="background: rgba(255,255,255,0.2);">
							<form method="post">
    							<div class="d-flex">
    								<input class="form-control me-2" type="search" placeholder="Search videos" aria-label="Search" id="searchBox">
    								<button class="btn btn-outline-success" id="searchBtn">Search</button>
    							</div>
							</form>
							<div class="card" id="playlistdiv" style="display:none; margin-top:10px; overflow:auto;">
    							<div class="card-body card-outline card-success">
        							<div class="d-flex">
            							<ul id="playlist" class="list-group" style="width:100%"></ul>
        							</div>
    							</div>
							</div>
							<div class="card" id="descriptiondiv" style="display:none; margin-top:10px; max-height:300px; overflow:auto;">
								<div class="card-header">
									<h5 id="descriptionheader" class="text-center">Description</h5>
								</div>
								<div class="card-body" id="description">
								</div>
							</div>
		  				</div>
					</div>
				</div>

				<div class="col-md-12 col-lg-9"  id="videodivcard">
					<div class="card" style="background: rgba(255,255,255,0.6);">
    					<div class="card-body" id="videodiv" style="display:flex; flex-direction:column; align-items:center; justify-content:center;background: rgba(255,255,255,0.2);">
    						<video id="myVideo" width="640" height="480" controls preload="none" poster="<?php echo $base_url;?>data/images/blank.png"  onended="resetButtons()">
    						<source src="" type="video/mp4">
                            </video>
    					</div>
    					<div class="card-footer" >
    						<div id="video-controls" class="row" style="margin-top:10px;">
    							<div class="col-12 col-sm-12 col-md-6  d-flex justify-content-center mt-1 p-0">
                                	<div class="btn-group p-1" role="group" aria-label="Basic example">
                                    	<button class="btn btn-outline-secondary btn-sm text-dark" id="prevvideo" title="Previous Video">
                                        	<i class="fa fa-arrow-left"></i> Previous
        								</button>
                                    	<button class="btn btn-outline-secondary btn-sm text-dark" id="playpause" title="Play / Pause">
                                        	<i class="fa fa-play playicon"></i> 
                                        	<i class="fa fa-pause pauseicon" style="display:none"></i>
                                        	<font class="playtext">Play</font>
                                        	<font class="pausetext" style="display:none">Pause</font>
        								</button>
        								<button class="btn btn-outline-secondary btn-sm text-dark" id="nextvideo" title="Next Video">
                                    		Next <i class="fa fa-arrow-right"></i>
                                	 	</button>
        								
    								</div>
                            	</div>
                            	<div class="col-6 col-sm-6 col-md-3  d-flex justify-content-center mt-1 p-0">
                                	<div class="btn-group p-1" role="group" aria-label="Basic example">
                                    	<button class="btn btn-outline-secondary btn-sm text-dark" id="fullscreen" title="Full Screen">
                                    		Full-screen <i class="fas fa-expand"></i>
                                	 	</button>
    								</div>
                            	</div>
                            	
                            	<div class="col-6 col-sm-6 col-md-3 d-flex justify-content-center mt-1 p-0">
                        			<div class="btn-group p-1" role="group" aria-label="Basic example">
                                		<button type="button"  class="btn btn-outline-secondary btn-sm dropdown-toggle" id="speedcontrol" title="change speed" data-bs-toggle="dropdown" aria-expanded="false">
                                        	<span id="speedtext" class="text-dark">Speed : Normal</span>
                                        </button>
                                        <ul class="dropdown-menu w-100">
                                        <li><a class="dropdown-item speedcontrol" href="javascript:;" data-speed="0.5">0.5x</a></li>
                                        <li><a class="dropdown-item speedcontrol" href="javascript:;" data-speed="0.75">0.75x</a></li>
                                        <li><a class="dropdown-item speedcontrol" href="javascript:;" data-speed="1">Normal</a></li>
                                        <li><a class="dropdown-item speedcontrol" href="javascript:;" data-speed="1.25">1.25x</a></li>
                                        <li><a class="dropdown-item speedcontrol" href="javascript:;" data-speed="1.5">1.5x</a></li>
                                        </ul>
    								</div>
                            	</div>
								<div class="col-6 col-sm-6 col-md-6 d-flex justify-content-center mt-1 p-0">
									<div class="btn-group p-1" role="group" aria-label="Basic example">
                                    	<button class="btn btn-outline-success btn-sm text-dark" id="backward" title="-2 seconds Backward"><i class="fa fa-backward"></i> Backward</button>
        								<button class="btn btn-outline-success btn-sm text-dark" id="forward" title="+2 seconds Forward">Forward <i class="fa fa-forward"></i></button>
    								</div>
								</div>
								<div class="col-6 col-sm-6 col-md-6 d-flex justify-content-center mt-1 p-0">
									<div class="btn-group p-1" role="group" aria-label="Basic example">
    									<button class="btn btn-outline-info btn-sm text-dark" id="backwardoneframe">
                                        	-1 Frame
        								</button>
        								<button class="btn btn-outline-info btn-sm text-dark" id="forwardoneframe">
                                    		+1 Frame
        								</button>
                                	</div>
								</div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<footer class="navbar navbar-dark bg-dark text-white footer" style="width:100%">
	<?php include('./assets/js/scripts.php');?>

	<div style="display:flex; flex-direction:column; justify-content:center; align-items:center; width:100%">
		<div class="text-center">Faculty of Disability Management and Special Education (FDMSE)</div>
		<div class="text-center">Ramakrishna Mission Vivekananda Educational and Research Institute (Deemed to be University)</div>
	</div>
</footer>


