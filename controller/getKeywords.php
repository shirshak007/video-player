<?php
/**
 * Get the keywords from a text file and create playlist. 
 * A video file will be associated with a keyword
 * @author Shirshak | 2023-02-16 
 */

//Requested search Keyword from front-end using POST method
$keywords = $_POST['search'];

//txt file where the keywords are stored
$keywordsFile = "data/words.txt";
//Path to video files
$videoFolder =  "data/videos/"; 

$data = array(); //this data will be sent as AJAX Response

if(!file_exists($keywordsFile)) {
    $data['status'] = false;
    $data['message'] = "No videos available";
    echo json_encode($data);
    return 0;
}

$file = fopen($keywordsFile, "r");
$keywordsFileText =  fread($file, filesize($keywordsFile));
fclose($file);

if(!empty($keywordsFileText)) {
    $keywordsFileTextArr = explode(PHP_EOL, rtrim(ltrim($keywordsFileText, PHP_EOL), PHP_EOL));
}

if(!empty($keywordsFileTextArr)) {
    $data['status'] = true;
    $data['message'] = "Found matches.";
    $data['count'] = count($keywordsFileTextArr);
    
    $i = 0;
    foreach ($keywordsFileTextArr as $keywordText) {
        $keywordAndDesc = explode(':', rtrim(ltrim($keywordText, ' '), ' '));
        $keyword = $keywordAndDesc[0];
        $desc = $keywordAndDesc[1];
        
        $data['keyword'][$i] =  $keyword;
        $data['desc'][$i] =  $desc;
        
        //if the corresponding video file exists then set the video path/filename
        if(file_exists($videoFolder.$keyword.'.mp4')) {
            $data['video'][$i] = $videoFolder.$keyword.'.mp4';
            $data['framerate'][$i] = 30; //change this if framerate is different
        } else {
            $data['video'][$i] = "No video found.";
        }
        $i++;
    }
}


//Response
echo json_encode($data);

function log_message($msg){
    if(!file_exists("logs/log".date("Y-m-d").".txt")) {
        $myfile = fopen("logs/log".date("Y-m-d").".txt", "w") or die("Unable to open file!");
        $txt = "";
        fwrite($myfile, $txt);
        fclose($myfile);
    }
    $existing = file_get_contents('logs/log'.date("Y-m-d").'.txt');
    file_put_contents('logs/log'.date("Y-m-d").'.txt', $existing.PHP_EOL.date("Y-m-d H:i:s").": $msg");
}
?>
