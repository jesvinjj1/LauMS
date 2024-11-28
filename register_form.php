<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $pass = isset($_POST['password']) ? md5($_POST['password']) : '';
    $cpass = isset($_POST['cpassword']) ? md5($_POST['cpassword']) : '';
   

    $select = "SELECT * FROM user WHERE email= '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!';
    } else {
        if ($pass !== $cpass) {
            $error[] = 'Passwords do not match!';
        } else {
            $insert = "INSERT INTO user(name, email, password) VALUES ('$name', '$email', '$pass')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    
    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
   <div class="form-container">
    <form action="" method="post">
        <h3>Register now</h3>
<?php
if(isset($error)){
    foreach($error as $error){
        echo '<span class="error-msg">'.$error.'</span>';
    };
};

?>


   
        <input type="text" name="name" required placeholder="Enter your name">
        <input type="email" name="email" required placeholder="Enter your email">
        
        <div class="password-field">
            <input type="password" name="password" required placeholder="Enter your password">
            <span class="toggle-password" onclick="togglePassword('password')">&#128065;</span> <!-- Eye icon -->
        </div>
        <div class="password-field">
            <input type="password" name="cpassword" required placeholder="Confirm your password">
            <span class="toggle-password" onclick="togglePassword('confirm-password')">&#128065;</span> <!-- Eye icon -->
        </div>

        
        <input type="submit" name="submit" value="register now" class="form-btn">
        <p>already have an account? <a href="login.php">Login now</a></p>
     </form>
   </div> 

   <!-- JavaScript for Show/Hide Password -->
   <script>
       function togglePassword(inputId) {
           const input = document.getElementById(inputId);
           if (input.type === "password") {
               input.type = "text";
           } else {
               input.type = "password";
           }
       }
   </script>
</body>
</html>
