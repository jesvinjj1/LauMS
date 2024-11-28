<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    
    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
   <div class="form-container">
    <form action="" method="post">
        <h3>Login now</h3>
       
        <input type="email" name="email" required placeholder="Enter your email">
        
        <div class="password-field">
            <input type="password"  name="password" required placeholder="Enter your password">
            <span class="toggle-password" onclick="togglePassword('password')">&#128065;</span> <!-- Eye icon -->
        </div>
        
        <input type="submit" name="submit" value="Login now" class="form-btn">
        <p>don't have an account? <a href="register_form.php">Register now</a></p>
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
