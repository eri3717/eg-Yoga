<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="conteiner-fluid">
        <h2>Register</h2>
        <form action="../userAction.php" method="post">
            <label for="">First Name</label>
            <input type="text" name="firstname" placeholder="First Name"><br>
            <label for="">Last Name</label>
            <input type="text" name="lastname" placeholder="Last Name"><br>
            <label for="">Gender</label>
            <input type="radio" value="male" name="gender"><span>Male</span>
            <input type="radio" value="female" name="gender"><span>Female</span>
            <input type="radio" value="none" name="gender"><span>None</span><br>
            <label for="">Birth Day</label>
            <input type="date" name="birthday"><br>
            <label for="">Email</label>
            <input type="email" name="email" placeholder="Email Address"><br>
            <label for="">Password</label>
            <input type="password" name="password_1" placeholder="Password"><br>
            <label for="">Confirm Password</label>
            <input type="password" name="password_2" placeholder="Confirm Password"><br>

            <input type="submit" value="Submit" name="submit">
        </form>
    </div>
</body>
</html>