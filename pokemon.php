<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}

$user = $_SESSION["user"];
$name = $_GET['name'];

$url = "https://pokeapi.co/api/v2/pokemon/$name";
$data = file_get_contents($url);
$pokemon = json_decode($data, true);

$sprite = $pokemon['sprites']['front_default'];
$weight = $pokemon['weight'];
$height = $pokemon['height'];
$types = $pokemon['types'];
$type_list = array();
foreach ($types as $type) {
  $type_list[] = $type['type']['name'];
}
$types_str = implode(', ', $type_list);

?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $name; ?></title>
    <link rel="stylesheet" href="pokemon.css">
  </head>
  <body>
    <h1><?php echo $name; ?></h1>
    <img src="<?php echo $sprite; ?>">
    <p>Weight: <?php echo $weight; ?></p>
    <p>Height: <?php echo $height; ?></p>
    <p>Types: <?php echo $types_str; ?></p>
<br>
    <center><a href="home.php">Back</a></center><br>
  </body>
  <center><a href="logout.php">Logout</a></center>
</html>

