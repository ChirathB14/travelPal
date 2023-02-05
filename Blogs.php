<?php
session_start();
require_once('./inc/connection.php');
require_once('./inc/functions.php');


$blog_list = "";
$search = '';

// getting the list of users
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($connection, $_GET['search']);
    $query = "SELECT * FROM blog WHERE (subject LIKE '%{$search}%' OR content LIKE '%{$search}%' ORDER BY writtenDate";
} else {
    $query = "SELECT * FROM blog ORDER BY writtenDate DESC";
}

$blogs = mysqli_query($connection, $query);

verify_query($blogs);

while ($blog = mysqli_fetch_assoc($blogs)) {
    $blog_list .= "<div class=\"Blog-content\">";
    $blog_list .= "     <h2>{$blog['subject']}</h2>";
    $blog_list .= "     <h6>{$blog['writtenDate']} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {$blog['authorName']}</h6>";
    $blog_list .= "     <br>";
    $blog_list .= "     <img src=\"./uploads/blogs/{$blog['imagePath']}\" alt=\"Blog image\">";
    $blog_list .= "     <br><br>";
    $blog_list .= "     <p>{$blog['content']}</p>";
    $blog_list .= "     <a href=\"Blog.php?blogID={$blog['blogID']}\">View more</a>";
    $blog_list .= "</div>";
}

?>


<html>

<head>
    <link rel="stylesheet" href="/travelPal/css/Blogs.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<?php
$title = "Blogs | TravePal";
require_once("./inc/header.php");
?>

<head>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/Blogs.css">
</head>

<!-- Blogs page content -->
<div class="page-content">
    <div class="Blogs-Title">
        <div class="Blogs-TitleContent">
            <h2>Welcome to the Travel Pal Blog!</h2>
            <h4>Nature | beauty | experience</h4>
        </div>
        <button onclick="location.href = 'CreateBlogs.php';">Create Blog</button>
    </div>

    <?php 
    if($blog_list){
        echo $blog_list; 
    }else {
        echo "No Blogs Yet!";
    }
    ?>

    <br>
</div>

<!-- footer -->

<?php require_once("./inc/footer.php"); ?>