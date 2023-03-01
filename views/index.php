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

<div class="container-fluid"  style="background:#000;padding:0px;">
	<div class="card"  style="background:#000;padding:0px;">
		<div class="card-body"  style="background:#000;padding-top:0px;padding-bottom:0px;">
			<div class="row">
				<div class="col-sm-12 col-md-5">
					<div class="d-flex flex-column justify-content-center intro-left"> 
    					<div class="text-center">
    						<img src="<?php echo $base_url;?>data/images/rkm_logo.png" class="intro-logo" height="200px" width="200px" />
    					</div>
    					<div class="text-center text-white intro-text">
    						Faculty of Disability Management and Special Education<br>
    						RKMVERI, Coimbatore Campus<br>
    						Coimbatore, Tamil Nadu – 641020, India<br>
    					</div>
    					<div class="text-center text-white" style="font-size:15px;">
    						Presents
    					</div>
    					<div class="text-center pb-3">
    						<img src="<?php echo $base_url;?>data/images/holy_trinity.jpg" class="holy-trio" height="auto" width="350px">
    					</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-7">
					<div class="d-flex flex-column align-items-center justify-content-center intro-right">
						<div class="text-center text-white intro-big-text">
							Indian Sign Language Dictionary 
						</div>
						<div class="d-flex flex-column align-items-center justify-content-center" style="width:95%;">
    						<video class="intro-video" width="100%" height="auto" autoplay muted loop playsinline>
                            	<source src="<?php echo $base_url;?>data/videos/Indian Sign Language Dictionary.mp4" type="video/mp4" />
                        	</video>
                    	</div>  
                    	<br>
                    	<div style="position:absolute; bottom:10px; right:10px; cursor:pointer" onclick="location.href='<?php echo $base_url;?>videos'">
                    		<video width="100" height="auto" autoplay muted loop playsinline style="position:absolute; bottom:50px; right:10px;">
                            	<source src="<?php echo $base_url;?>data/videos/Next.mp4" type="video/mp4" />
                        	</video>
							<button class="btn btn-success float-end" style="width:100px; position:absolute; bottom:10px; right:10px;" onclick="location.href='<?php echo $base_url;?>videos'">
								<strong>NEXT</strong>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('assets/js/scripts.php');?>


