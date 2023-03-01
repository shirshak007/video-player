<?php
/**
 * Here we will get the files which will be sent to the front-end for rendering
 * @author Shirshak | 2023-02-16 
 */

//Requested search Keyword from front-end using POST method
$keywords = $_POST['search'];

//Path to the Keyword and Video files 
$keywordsFolder = "Uploads/Keywords/"; //change this if required.
$videoFolder =  "Uploads/Videos/"; //change this if required.

//get all the text files with matching Keyword
$allFiles = array();
$allFiles = glob("$keywordsFolder*.txt");  //matching filenames
$allFiles = array_unique($allFiles); //avoiding duplicates 

$i = 0;
foreach ($allFiles as $fileName) {
    $pattern = "/$keywords/i";
    $filenameOnly = basename($fileName, '.txt');
    if(preg_match($pattern, $filenameOnly, $matches)) {
        $keywordFiles[$i] = $fileName;
        $i++;
    }
}

log_message(json_encode($keywordFiles));

$data = array(); //this data will be sent as AJAX Response

//Check if there are matching Keywords
if(!empty($keywordFiles)) { 
    //Matches found
	$data['status'] = true;
	$data['message'] = "Found matches.";
	$data['count'] = count($keywordFiles);
	$i = 0;
	//There should be one video file correnponding to one text file.
	//So getting the video files paths/names using text files paths/names
	foreach($keywordFiles as $keywordFile) {
		$file = pathinfo($keywordFile);
		$data['keyword'][$i] =  $file['filename'];
		
		//if the corresponding video file exists then set the video path/filename
		if(file_exists($videoFolder.$file['filename'].'.mp4')) {
		    $data['video'][$i] = $videoFolder.$file['filename'].'.mp4';
		    $data['framerate'][$i] = 30; //change this if framerate is different
		} else {
		    $data['video'][$i] = "No video found.";
		}
		
		//Read the content from the text file
		$file = fopen($keywordFile, "r");
		$data['desc'][$i] =  fread($file, filesize($keywordFile));
		fclose($file);
		
		$i++;
	}
} else {
    //No matches found
	$data['status'] = false;
	$data['message'] = "No matches found.";	
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
