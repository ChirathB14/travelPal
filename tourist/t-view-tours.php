<?php
session_start();
require_once('../inc/connection.php');

$title = "View Tours";
require_once("../inc/header.php");
?>

<head>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
    
        <style>
            .content table {
                margin: 5px;
                border-spacing: 0;
                background-color: rgb(235, 235, 235);
                width: 50%;
            }

            .content table th {
                padding: 5px;
                background-color: var(--primarycolor);
                border-top: 1px solid var(--accentcolor);
                color: var(--accentcolor);
            }

            .content table tr {
                border-bottom: 1px solid var(--accentcolor);
                color: var(--primarycolor);
                height: 20px;
            }

            .content table td {
                border-bottom: 1px solid var(--accentcolor);
                color: var(--primarycolor);
                text-align: center;
                justify-content: center;
            }
        </style>
</head>

<div class="body">
    <!-- Profile page content -->
    <div class="page-content">
        <!-- Dashboard - Tourist -->
        <div class="Dashboard">
            <div class="Dashboard-top">
                <img src="../assets/profile.png" alt="Profile pic">
                <h4><?php echo $_SESSION['full_name']; ?></h4>
            </div>
            <div class="Dashboard-bottom">
                <button onclick="location.href = 't-profile.php';">My Profile</button>
                <button onclick="location.href = 't-update-profile.php';">Update Profile</button>
                <button class="active" onclick="location.href = 't-view-tours.php';">View Tours</button>
                <br> <br> <br> <br> <br>
            </div>    
        </div>

        <div class="content">
        <h2>Your Tour Plans</h2>
        <table>
            <tr>
                <th>Tour Plan ID</th>
                <th>Status</th>
                <th>View</th>
                <th>Cancel</th>
            </tr> 
            <tr>
                <td>001</td>
                <td><mark style="background-color:grey; color:white; font-size:12px; padding:2px;">&nbsp;Draft&nbsp;</mark></td>
                <td><i class="fa fa-eye" aria-hidden="true" style="margin-left:15px; color:blue;"></i></td>
                <td><i class="fa fa-times" aria-hidden="true" style="margin-left:30px; color:red;"></i></td>
            </tr>
            <tr>
                <td>002</td>
                <td><mark style="background-color:green; color:white; font-size:12px; padding:2px;">&nbsp;Paid&nbsp;</mark></td>
                <td><i class="fa fa-eye" aria-hidden="true" style="margin-left:15px; color:blue;"></i></td>
                <td><i class="fa fa-times" aria-hidden="true" style="margin-left:30px; color:red;"></i></td>
            </tr>  
        </table>
        </div>

        </div>
    </div>

<?php
require_once("../inc/footer.php");
?>

<?php mysqli_close($connection); ?>