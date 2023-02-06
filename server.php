<?php

// Start session
session_start();

// Connect to database
$db = mysqli_connect("localhost", "root", "", "users");

if (isset($_POST["register"])) {
  // Get form values
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $password_confirm = $_POST["password_confirm"];

  $query = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($db, $query);
  if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Username already exists, please choose another.'); window.location.href='register.php';</script>";
    exit();
  }

  // Comprobar si las contraseñas coinciden
  if ($password !== $password_confirm) {
    echo "Passwords do not match, please try again.";
  } else {
    
    $password = password_hash($password, PASSWORD_BCRYPT);

   // Guardar usuario en la base de datos
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($db, $query);

    $_SESSION["loggedin"] = true;
    $_SESSION["user"] = $user;
    
    header('location: home.php');
  }
}

if (isset($_POST["login"])) {
  
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Comprobar si el nombre de usuario existe en la base de datos
  $query = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($db, $query);
  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    
    if (password_verify($password, $user["password"])) {
   // Iniciar sesión usuario
      $_SESSION["loggedin"] = true;
      $_SESSION["user"] = $user;

     
      header('location: home.php');
    } else {
      echo "Invalid username or password.";
    }
  } else {
    echo "Invalid username or password.";
  }
}

?>