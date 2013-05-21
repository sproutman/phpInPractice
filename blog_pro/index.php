<?php
include('includes/functions.php');
define('DIRECTORY_LISTING', "blogs");

$title="Welcome to ".BLOG_NAME;
include('header-sidebar.php');

if($_GET['blog'] != ''){
    printBlog($_GET['blog']);
}
else{
    print("
<p>Welcome to ".BLOG_NAME."!<br>
Take a look at my latest postings on the left.");
}

include('footer.php');
?>
