<?php

require_once('./inc/connection.php');
require_once('./inc/functions.php');

echo "Display  the blog - Blog ID -> {$_GET['blogID']} ";

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
