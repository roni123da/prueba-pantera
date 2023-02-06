<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="register.css">
</head>
<body>
  
  <form action="server.php" method="post">
  <h1>Register</h1>
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <label for="password_confirm">Confirm Password:</label>
    <input type="password" name="password_confirm" required><br>
    <input type="submit" name="register" value="Register">
    <a href="login.php">Login</a>
  </form>
  
</body>
</html>
