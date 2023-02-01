<!DOCTYPE html>
<html>
  <head>
    <title>Insérer des données dans la table Users</title>
  </head>
  <body>
    <form action="process.php" method="post">
      <p><label for="prenom">Prenom</label><input type="text" name="prenom"></p>
      <p><label for="nom">Nom</label><input type="text" name="nom"></p>
      <p><label for="email">Email</label><input type="text" name="email"></p>
      <p><input type="submit" name="insert" value="Insérer"></p>
    </form>
    <?php
	$servername = "localhost";
	$username = "phpdb";
	$password = "phpdbpass";

	try {
  	$conn = new PDO("mysql:host=$servername;dbname=phpDB", $username, $password);
  	// set the PDO error mode to exception
  	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  	echo "<br>";

  	$sql =  'SELECT prenom, nom, email FROM utilisateurs ORDER BY nom, prenom';
  	foreach  ($conn->query($sql) as $row) {
      		echo $row['prenom'] . "\t";
      		echo $row['nom'] . "\n";
//      	echo $row['email'] . "\n";
      		echo "<br>";
  	}


	} catch(PDOException $e) {
  	echo "Connection failed: " . $e->getMessage();
	}
	$conn = null;
    ?>

  </body>
</html>
