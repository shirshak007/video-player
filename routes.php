<?php
get('/', 'views/index.php');
get('/videos', 'views/videoPlayer.php');
post('/getVideosAndDetails', 'controller/getVideosAndDetails');
post('/getKeywords', 'controller/getKeywords');

any('/404','views/404.php');
