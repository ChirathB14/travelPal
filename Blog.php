<?php

require_once('./inc/connection.php');
require_once('./inc/functions.php');

// echo "Display  the blog - Blog ID -> {$_GET['blogID']} ";

if (isset($_GET['blogID'])) {
    $blogID = mysqli_real_escape_string($connection, trim($_GET['blogID']));

    $query = "SELECT * FROM blog WHERE blogID = {$blogID}  LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            //user found
            $result = mysqli_fetch_assoc($result_set);
            $subject = $result['subject'];
            $content = $result['content'];
            $writtenDate = $result['writtenDate'];
            $authorName = $result['authorName'];

        } else {
            //blog not found
            header('Location: Blogs.php?err=blog_not_found');
        }
    } else {
        //query unsuccessful
        header('Location: BLogs.php?err=query_failed');
    }



}else {
    header("Location : Blogs.php?error=get_blog_failed");
}


?>

<?php
$title = "Blogs_View more | TravePal";
require_once("./inc/header.php");
?>

<head>
    <link rel="stylesheet" href="/travelPal/css/main.css">
    <link rel="stylesheet" href="/travelPal/css/Blogs.css">
</head>

<!-- Blogs page content -->
<div class="page-content" style="justify-content:center;align-items:center;">
    <div class="Blogs-Title">
        <div class="Blogs-TitleContent">
            <h2>Welcome to the Travel Pal Blog!</h2>
            <h4>Nature | beauty | experience</h4>
        </div>
        <button onclick="location.href = 'CreateBlogs.php';">Create Blog</button>
    </div>
    <br>
    
    <div class="Blog-content">
         <h2> <?php echo $subject?> </h2>";
         <h6> <?php echo $writtenDate?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $authorName?> </h6>
         <br>
        <img src="./uploads/blogs/blog2.png" alt="Blog image">
        <br><br>
         <p>{$blog['content']}</p>";
    </div>
    
</div>





<!-- Footer -->
<?php require_once("./inc/footer.php");?>
