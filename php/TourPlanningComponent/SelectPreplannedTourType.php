<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/preplanned.css">
</head>

<?php
    $title = "PrePlanned Tour | TravePal";
?>

<body>
    <table>
        <tr VALIGN=TOP>
            <?php include '../Common/header.php'; ?>
        </tr>
        <tr VALIGN=TOP>
            <center>
                <h2 class="preplanned-header">Preplanned tours</h2>
                <p class="preplanned-des">We have customized tours according to climate changes in Sri Lanka for more experience</p>
            </center>
            <div class="seasons">
                <?php
                require '../DbConfig.php';
                $season_sql = "SELECT * FROM season WHERE isActive= '" . 1 . "'";
                $season_result = $conn->query($season_sql);
                if ($season_result) {
                    if ($season_result->num_rows > 0) {
                        while ($season_row = $season_result->fetch_assoc()) {
                ?>
                            <div class="season">
                                <h2><?php echo $season_row['season_name']; ?></h2>
                                <div class="types" style="background-color: rgba(50, 121, 114, 0.5);">
                                    <?php
                                    $type_sql = "SELECT * FROM plan_types WHERE isActive= '" . 1 . "'";
                                    $type_result = $conn->query($type_sql);
                                    if ($type_result) {
                                        if ($type_result->num_rows > 0) {
                                            while ($type = $type_result->fetch_assoc()) {
                                    ?>
                                                <a href="./ViewAvailablePreplannedTours.php?season=<?php echo $season_row['season_name']; ?>&type=<?php echo ($type["name"]) ?>" class="type" style="background-color: #00357A;">
                                                    <img src="../../images/TourTypes/<?php echo ($type["image"]) ?>" alt="Type">
                                                    <h3><?php echo ($type["name"]) ?></h3>
                                                </a>

                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                <?php
                        }
                    }
                }
                ?>
            </div>
        </tr>
    </table>

</body>
 
<?php require_once("../Common/footer.php");?>

</html>