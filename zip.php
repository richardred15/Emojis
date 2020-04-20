<?php

function scan_dir($dir) {
    $ignored = array('.', '..', '.svn', '.htaccess');

    $files = array();    
    foreach (scandir($dir) as $file) {
        if (in_array($file, $ignored)) continue;
        $files[$file] = filemtime($dir . '/' . $file);
    }

    arsort($files);
    //$files = array_keys($files);
    return ($files) ? $files : false;
}

$zips = scan_dir("zips");
$imgs = scan_dir("Emojis");
$latestImgTime = array_shift($imgs);
$latestZipTime = array_shift($zips);
$latestImg = array_shift(array_keys($imgs));
$latestZip = array_shift(array_keys($zips));
$name = $latestZip;
if($latestImgTime > $latestZipTime){
    $zip = new ZipArchive();

    $name = time() . ".zip";

    if($zip->open("zips/".$name, ZipArchive::CREATE) !== TRUE){
        exit("CANNOT OPEN ZIP");
    }

    $images = scandir("./Emojis");

    foreach($images as $file){
        if($file != "." && $file != ".."){
            $zip->addFile("./Emojis/" . $file, $file);
        }
    }

    $zip->close();
}


header("Content-type: application/zip"); 
header("Content-Disposition: attachment; filename=$name");
header("Content-length: " . filesize($name));
header("Pragma: no-cache"); 
header("Expires: 0"); 
readfile("zips/$name");

?>