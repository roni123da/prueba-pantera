<?php
// lista de pokemons
$url = "https://pokeapi.co/api/v2/pokemon?limit=964";
$data = file_get_contents($url);
$pokemons = json_decode($data, true);

// estraer el nombre
$names = array_column($pokemons['results'], 'name');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
  </head>
  <body>
    <h1>Lista de pokemones</h1>
    <ul>
      <?php foreach ($names as $pokemon) { ?>
        <li><a href="pokemon.php?name=<?php echo $pokemon; ?>"><?php echo $pokemon; ?></a></li>
      <?php } ?>
    </ul>
  </body>
</html>