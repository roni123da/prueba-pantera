<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  
  <form action="server.php" method="post">
  <h1>LOGIN</h1>
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" name="login" value="Login">
    <center><a href="register.php">Registrarse</center></a>
  </form>
  
</body>
</html>
