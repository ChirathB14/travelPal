<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/blog.css">
    <link rel="stylesheet" href="../../css/common.css">
    <link rel="stylesheet" href="../../css/newFooter.css">
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
        </div>

        <?php
        require '../DbConfig.php';

        $sql = "SELECT * FROM blog WHERE isActivie= '" . 1 . "'";
        $result = $conn->query($sql);
        // echo $conn->query($sql);
        // $data = json_encode($result->user);
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
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