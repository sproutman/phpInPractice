<?php

function displayBlogsButtons($dir=''){
    $files = scandir(DIRECTORY_LISTING."/$dir", 1);

    foreach($files as $file){
        if($file == "." || $file == ".." || $file == ".svn")
            continue;

        if(is_dir(DIRECTORY_LISTING."/$file")){
            if($dir != '') $recurse = "$dir/$file";
            else $recurse = $file;
            displayBlogsButtons("$recurse");
        }
        else{
            list($month, $day, $year, $hour, $minute) =
                sscanf($file, "%s %d %d %d %d");

            print "<tr><td>";
            print "<a href='index.php?blog=$dir/$file&title=$file".
                  "&view=true'>$month $day $year $hour:$minute</a><br>";
            print "<td>";
            print "<form action='index.php' method='POST'>";
            print "<input type='hidden' name='blog' value='$dir/$file'>";
            print "<input type='hidden' name='title' ".
                  "value='$file'>";
            print "<input type='submit' name='edit' value='Edit'> ";
            print "<input type='submit' name='delete' value='Delete'>";
            print "</form>";
            print "</td>";
            print "</td></tr>";
        }
    }
}

function displayEditDeleteBlogForm(){
    print "<a href='index.php'>Editor Home</a><br>";
    print "<h2>Edit/Delete blog entries</h2>";
    print "<table>";

    displayBlogsButtons();

    print "</table>";
}

function displayAddNewBlogForm(){
    print "<a href='index.php'>Editor Home</a><br>";
    $month = date("M");
    $day = date("d");
    $year = date("Y");
    $hour = date("H");
    $minute = date("i");
    print "<h2>Add new blog entry for $month $day, $year $hour:$minute</h2>";

    if(is_file(DIRECTORY_LISTING."/$month $year/$month $day $year $hour $minute")){
        print "You've already created a blog entry in the last minute. Try".
              " deleting or editing it instead.";
        return;
    }

    print "<form action='index.php' method='POST'>";
    print "<input type='hidden' name='blog' value='$month $year/".
          "$month $day $year $hour $minute'>";
    print "<input type='hidden' name='dir' value='$month $year'>";
    print "<textarea name='content' cols='100' ".
          "rows='15'></textarea><br>";
    print "<input type='submit' name='save' value='Save'> ";
    print "</form>";
}

function viewEditBlog($blog){
    print "<a href='javascript:back()'>Back</a><br>";
    list($month, $day, $year, $hour, $minute) =
        sscanf($_POST['title'], "%s %d %d %d %d");
    print "<h2>Edit Blog for $month $day, $year $hour:$minute</h2>";
    print "<form action='index.php' method='POST'>";
    print "<input type='hidden' name='blog' value='$blog'>";
    print "<input type='hidden' name='dir' value='$month $year'>";
    print "<textarea name='content' cols='100' rows='15'>";
    readfile(DIRECTORY_LISTING.'/'.$blog);
    print "</textarea><br>";
    print "<input type='submit' name='save' value='Save'> ";
    print "</form>";
}

function viewBlog($blog){
    print "<a href='javascript:back()'>Back</a><br>";
    list($month, $day, $year, $hour, $minute) =
        sscanf($_GET['title'], "%s %d %d %d %d");
    print "<h2>View Blog for $month $day, $year $hour:$minute</h2>";
    readfile(DIRECTORY_LISTING.'/'.$blog);
}

?>
