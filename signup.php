
<?php 
    require 'database.php';

    $message = '';

    if (!empty($_POST['email'])&& !empty($_POST['password'])) {
       $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(':email', $_POST['email']);
       $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
       $stmt->bindParam(':password', $password);

       if ($stmt->execute()) {
           $message = 'Successfully created new user';
       }else {
           $message = 'Sorry there must have been an error creating your password';
       }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUp</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
    
<body>   
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>
    
    <form action="signup.php" method="post">
    <input type="text" name="email" placeholder="Enter your email">
    <input type="password" name="password" placeholder="Enter your password">
    <input type="password" name="confirm_password" placeholder="Confirm your password">
    <input type="submit" value="Send form">

    </form>
</body>
</html>