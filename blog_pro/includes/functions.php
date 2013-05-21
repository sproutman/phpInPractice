<?php

define('BLOG_NAME', "My blog");

function listBlogs($dir=''){
    $files = scandir(DIRECTORY_LISTING."/$dir", 1);

    foreach($files as $file){
        if($file == "." || $file == ".." || $file == ".svn")
            continue;

        if(is_dir(DIRECTORY_LISTING."/$file")){
            if($dir != '') $recurse = "$dir/$file";
            else $recurse = $file;
            listBlogs("$recurse");
        }
        else{
            list($month, $day, $year, $hour, $minute) =
                sscanf($file, "%s %d %d %d %d");

            print "<a href='index.php?blog=$dir/$file&title=$file".
                  "'>$month $day, $year $hour:$minute</a><br>";
        }
    }
}

function printBlog($blog){
    $dir = DIRECTORY_LISTING."/$blog";
    list($month, $day, $year, $hour, $minute) =
        sscanf($_GET['title'], "%s %d %d %d %d");
    print "<h3>Blog entry for $month $day, $year $hour:$minute</h3>";
    $fp = fopen($dir, 'r');
    $data = fread($fp, filesize($dir));
    fclose($fp);

    print $data;
}

function displayTopBar(){
    if(!isset($_GET['blog'])){
        print("Home");
    }
    else{
        print("<a href='index.php'>Home</a>");
    }
}
?>
