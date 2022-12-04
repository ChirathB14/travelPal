<?php require_once('../inc/connection.php')?>
<?php 
    if(isset($_POST['submit'])){
        $firstName= $_POST['firstName'];
        $lastName=$_POST['lastName'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirmPassword=$_POST['confirmPassword'];
        $userType=$_POST['userType'];

        $passwordHash= password_hash($password,PASSWORD_DEFAULT);

        $errors= array();

        if(empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword)){
            array_push($errors,"All the fields are required");
        }

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            array_push($errors,"Email.is not valid");
        }
        if(strlen($password)<8){
            array_push($errors,"Password must be at least 8 character long");
        }
        if($password!== $confirmPassword){
            array_push($errors,"Password does not match");
        }
        
        $sql= "SELECT * FROM users WHERE email ='$email'";
        $result= mysqli_query($connection,$sql);
        $rowCount=mysqli_num_rows($result);

        if ($rowCount>0) {
            array_push($errors,"Email already exists!");
        }
        if (count($errors)>0) {
            foreach($errors as $error){
                echo "<p class='error'> $error </p>";
            }
      
        }else{
            //insert data into database
            $sql="INSERT INTO users(firstName,lastName,email,password)VALUES (?,?,?,?)";
            $stmt=mysqli_stmt_init($connection);
            $prepareStmt= mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt){
                mysqli_stmt_bind_param($stmt,"ssss",$firstName,$lastName,$email,$passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<p class='info'>You have successfully registered</p>";
            }

            //insert into tourist or service provider tables
            $sql="SELECT userID FROM users WHERE email=$email";
            $userId=mysqli_query($connection,$sql);
            die($userId);
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="registration">
    <div class="reg">
        <form action="registration.php" method="post">
            <h1>CREATE AN ACCOUNT</h1>
            <input  class="textinput" type="text" name="firstName" id="" placeholder="FIRST NAME">
            <input class="textinput" type="text" name="lastName" id="" placeholder="LAST NAME">
            <input class="textinput" type="email" name="email" id="" placeholder="EMAIL">
            <input class="textinput" type="password" name="password" id="" placeholder="PASSWORD">
            <input class="textinput" type="password" name="confirmPassword" id="" placeholder="CONFIRM PASSWORD">
            <select class="textinput" id="" name="userType">
                <option value="" disabled selected>REGISTER AS A</option>
                <option value="tourist">TOURIST</option>
                <option value="serviceProvider">SERVICE PROVIDER</option>
            </select>
            <button type="submit" name="submit">
                REGISTER
            </button >
            <P>
                <a href="index.php">ALREADY HAVE AN ACCOUNT?</a>            
            </P>
        </form>

    </div>
    
    
</body>
</html>