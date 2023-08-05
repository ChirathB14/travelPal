<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/blog.css">

    <script crossorigin="anonymous">
        function loadBlog() {
            window.location.href = "CreateBlog.php";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<!--header-->
<?php
$title = "Blogs | TravePal";
include '../Common/header.php';
?>

<!--body-->
<body style="background-color:rgba(14, 6, 77, 0.7);">
    <div>
        <div class="blog-view-heading">
            <div class="blog-view-top">
                <center>
                    <h1>WELCOME TO THE TRAVEL PAL BLOG!</h1>
                    <p>Nature | Beauty | Experience</p>
                </center>
                <button class="create-blog" onclick="loadBlog()">Create Blog</button>
            </div>
            <div class="search">
                <form action="ViewBlogs.php" method="get" style="display: flex; flex-direction: column;">
                    <p style="margin-top: 40px;">
                        <input style="width:50%; height:40px; border-radius:5px; margin-left:160px;" type="search" name="search" placeholder="  Search Blog..." >
                        <button style="width: 200px; margin-top: 10px; font-size: 16px;">Search</button>
                    </p>
                </form>
            </div>
        </div>

        <?php
        require '../DbConfig.php';

        $sql = "SELECT * FROM blog WHERE isActivie= '" . 1 . "'";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if(isset($_GET['search'])){
                        $search = mysqli_real_escape_string($conn, $_GET['search']);
                        $sql1 = "SELECT DISTINCT * FROM blog WHERE (heading LIKE '%{$search}%')";
                        $result1 = $conn->query($sql1);
                        if ($result1 && $result1->num_rows > 0) {
                            $displayedBlogs = array(); // Store displayed blogs to avoid duplicates
                                while ($row1 = $result1->fetch_assoc()) {
                                    $blog_Id = $row1['blog_Id'];

                                    // Check if the blog ID has already been displayed
                                    if (in_array($blog_Id, $displayedBlogs)) {
                                        continue; // Skip to the next iteration
                                    }

                                    // Add the blog ID to the displayed blogs array
                                    $displayedBlogs[] = $blog_Id;

                                    // Display the blog entry searched for
                                    ?>
                                    <div class="blog-card">
                                        <div class="blog-card-heading">
                                            <div class="card-hedding">
                                                <br>
                                                <h1><?php echo $row1['heading']; ?></h1>
                                            </div>
                                        </div>
                                        <div class="sub-items">
                                            <div class="date">
                                                <h4><?php echo $row1['created_date']; ?></h4>
                                            </div>
                                            <div class="author">
                                                <h4><?php echo $row1['name']; ?></h4>
                                            </div>
                                        </div>
                                        <div>
                                            <img class="blog-image" src="../../upload/BlogImg/<?php echo $row1['image'];  ?>" />
                                        </div>
                                        <div class="card-body">

                                            <p class="card-para">
                                                <?php echo $row1['body']; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <br />
        <?php
                                    } 
                                } else {
                                    //if no blogs are available  
                                    echo "<center><h1 style='color:white;'>No Blogs Available</h1></center>";
                                }
                    } else {
        ?>
                    <div class="blog-card">
                        <div class="blog-card-heading">
                            <div class="card-hedding">
                                <br>
                                <h1><?php echo $row['heading']; ?></h1>
                            </div>

                        </div>
                        <div class="sub-items">
                            <div class="date">
                                <h4><?php echo $row['created_date']; ?></h4>
                            </div>
                            <div class="author">
                                <h4><?php echo $row['name']; ?></h4>
                            </div>
                        </div>
                        <div>
                            <img class="blog-image" src="../../upload/BlogImg/<?php echo $row['image'];  ?>" />
                        </div>
                        <div class="card-body">

                            <p class="card-para">
                                <?php echo $row['body']; ?>
                            </p>

                        </div>
                    </div>
                    <br />
        <?php
                    } 
                }
            } else {
                //if no blogs are available  
                echo "<center><h1 style='color:white;'>No Blogs Available</h1></center>";
            }
        } else {    
            echo "Error in " . $sql . "
                    " . $conn->$error;
        }
        $conn->close();
        ?>
    </div>
</body>

<!-- footer -->
<?php require_once("../Common/footer.php"); ?>

</html>