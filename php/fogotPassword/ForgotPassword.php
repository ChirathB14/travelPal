<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/main.css">
    <title>Travel Pal</title>
    <style>
        .container {
            max-width: 500px;
            margin: 100px auto;
            padding: 20px;
            background-color: rgba(0, 53, 122, 0.5);
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 53, 122, 0.5);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-weight: 600;
            font-size: 16px;
            line-height: 30px;
            letter-spacing: 0.1em;
            color: #FFFFFF;
        }

        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin: 5px 0;
            background: rgba(255, 255, 255, 0.75);
            border: 1px solid #FFFFFF;
            border-radius: 15px;
            height: 50px;
        }

        input[type="submit"] {
            background: rgba(238, 180, 68, 0.75);
            border-radius: 15px;
            padding: 10px;
            margin: 5px 0;
            font-weight: 600;
            font-size: 16px;
            color: #FFFFFF;
            height: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Password Reset</h1>
        <form action="reset_password.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Reset Password">
        </form>
    </div>
</body>

</html>