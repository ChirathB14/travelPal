<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Pal</title>
    <style>
        .container {
            display: flex;
            align-items: center;
            margin: 0;
        }

        .image-container {
            flex: 1;
        }

        .content-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .title {
            text-align: center;

            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 800;
            font-size: 24px;
            line-height: 54px;
            text-align: center;
            letter-spacing: 0.1em;
            text-transform: uppercase;

            color: #FFFFFF;
        }

        .description {
            text-align: center;

            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 500;
            font-size: 20px;
            line-height: 48px;
            text-align: center;
            letter-spacing: 0.1em;
            text-transform: uppercase;

            color: #FFFFFF;
        }

        .button {
            display: block;
            margin-top: 20px;
            background: #EEB444;
            border-radius: 15px;
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 700;
            font-size: 15px;
            line-height: 54px;
            text-align: center;
            letter-spacing: 0.1em;
            text-transform: uppercase;

            color: #FFFFFF;
        }
    </style>
</head>

<body style="background-color: #0E064D;">
    <table style="width: 100%;">
        <tr VALIGN=TOP>
            <td style="width: 100%;">
                <?php include '../Common/header.php'; ?>

            </td>
        </tr>
        <tr VALIGN=TOP>
            <td style="width: 100%;">
                <div class="container">

                    <div class="content-container">
                        <div class="image-container">
                            <img src="../../images/checked.png" alt="Image Description">
                        </div>
                        <h2 class="title">Payement Successfull</h2>
                        <p class="description">Thank you for your payment. we will be in contact with more details</p>
                        <a href="../TourPlanningComponent/AllTourSummary.php?common=<?php echo $_GET['common'] ?>">
                        <button class="button">to see the summary</button>
                        </a>
                    </div>
                </div>

            </td>
        </tr>
    </table>
</body>

</html>