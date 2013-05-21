<?php
include('includes/functions.php');
define('DIRECTORY_LISTING', "../blogs");

require('header.html');

if($_POST['delete'] == 'Delete'){
    unlink(DIRECTORY_LISTING.'/'.$_POST['blog']);
    print "Blog entry deleted<br><br>";
}
else if($_POST['save'] == 'Save'){
    if(!is_dir(DIRECTORY_LISTING.'/'.$_POST['dir'])){
        mkdir(DIRECTORY_LISTING.'/'.$_POST['dir']);
    }
    $fp = fopen(DIRECTORY_LISTING.'/'.$_POST['blog'], 'w');
    fwrite($fp, $_POST['content']);
    fclose($fp);
    print "Blog entry saved/updated<br><br>";
}

if($_GET['edit'] == 'EditIt'){
    displayEditDeleteBlogForm();
}
else if($_POST['edit'] == 'Edit'){
    viewEditBlog($_POST['blog']);
}
else if($_GET['view'] == 'true'){
    viewBlog($_GET['blog']);
}
else if($_GET['addnew'] == 'Add New'){
    displayAddNewBlogForm();
}
else{
    print "<a href='index.php?edit=EditIt'>Edit/delete".
          " current blog entries</a><br>";
    print "<a href='index.php?addnew=Add New'>Add new blog".
          " entry for today</a><br>";
}

require('footer.html');
?>