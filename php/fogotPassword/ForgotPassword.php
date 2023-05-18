<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Pal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0E064D;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0, 53, 122, 0.5);
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 53, 122, 0.5);
            ;
        }

        h1 {
            text-align: center;
            margin-top: 0;
            font-family: 'Poppins', sans-serif;
            font-style: normal;
            font-weight: 800;
            font-size: 24px;
            line-height: 36px;

            /* identical to box height */
            text-align: center;
            letter-spacing: 0.1em;
            text-transform: uppercase;

            color: #FFFFFF;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
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
        }

        input[type="submit"] {
            color: #fff;
            background: rgba(238, 180, 68, 0.75);
            border-radius: 15px;
            padding: 10px;
            margin: 15px 0;
            font-weight: 600;
            font-size: 14px;
            line-height: 30px;
            letter-spacing: 0.1em;
            color: #FFFFFF;
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