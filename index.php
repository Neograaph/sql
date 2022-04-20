<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>SQL</title>
</head>
<body>
  
<?php
include 'env.php';

$request1 = "CREATE TABLE if not exists employe (
  numero int primary key,
  departement int,
  nom varchar(50),
  profession varchar(50),
  DateEmbauche date,
  salaire numeric(8,2),
  commission numeric(8,2),
  constraint fk_departement foreign key (departement) references departement (numero)
  )";

$request2 = "CREATE TABLE if not exists departement (
  numero int primary key,
  nom varchar(50),
  Directeur int,
  ville varchar(50)
  )";

$request3 = "ALTER TABLE departement add
constraint fk_directeur foreign key (directeur) references employe(numero)";

$request4 = "INSERT INTO departement (numero, nom, ville)
VALUES  (1, 'Commercial', 'New York'),
        (2, 'Production', 'Houston'),
        (3, 'Développement', 'Boston')
";

$request5 = "INSERT INTO employe (numero, nom, profession, DateEmbauche, salaire, commission, departement)
VALUES  (10, 'Joe', 'Ingénieur', '1993/10/01', 4000, 3000, 3),
        (20, 'Jack', 'Technicien', '1993/10/01', 3000, 2000, 2),
        (30, 'Jim', 'Vendeur', '1993/10/01', 3000, 2000, 1),
        (40, 'Lucy', 'Ingénieur', '1993/10/01', 3000, 2000, 3),
        (50, 'Paul', 'Commercial', '1993/10/01', 3000, 2000, 1)
";

$request6 = "UPDATE departement
SET Directeur = '30'
WHERE nom = 'Commercial';
";

echo "<div>Exo 1 : Liste des départements</div>";
$request7 = "SELECT nom FROM departement
";

try {
  $dbh = new PDO("mysql:host=".$host.";dbname=".$db, $root, $root_password);

  foreach($dbh->query($request7) as $row)
  {
   echo $row[0] . "</br>";
  }
  // or die(print_r($dbh->errorInfo(), true));
  
  $dbh = null;
}
catch (PDOException $e) {
  die("DB ERROR: " . $e->getMessage());
}

echo "<br/>";
echo "<br/>";

echo "<div>Exo 2 : Liste des employés</div>";
$request8 = "SELECT nom FROM employe
";

try {
  $dbh = new PDO("mysql:host=".$host.";dbname=".$db, $root, $root_password);

  foreach($dbh->query($request8) as $row)
  {
   echo $row[0] . "</br>";
  }
  // or die(print_r($dbh->errorInfo(), true));
  
  $dbh = null;
}
catch (PDOException $e) {
  die("DB ERROR: " . $e->getMessage());
}

echo "<br/>";
echo "<br/>";

echo "<div>Exo 3 : Liste des employés</div>";
echo "<div>Par ordre de salaire décroissant</div>";

$request9 = "SELECT nom, salaire FROM employe
ORDER BY salaire DESC
";

try {
  $dbh = new PDO("mysql:host=".$host.";dbname=".$db, $root, $root_password);

  foreach($dbh->query($request9) as $row)
  {
   echo $row[0] . " - " .$row[1] . " €" ."</br>";
  }
  // or die(print_r($dbh->errorInfo(), true));
  
  $dbh = null;
}
catch (PDOException $e) {
  die("DB ERROR: " . $e->getMessage());
}

echo "<br/>";
echo "<br/>";

echo "<div>Exo 4 : Liste des employés</div>";
echo "<div>Par salaire inférieur à 5000</div>";

$request9 = "SELECT nom, salaire FROM employe
WHERE salaire<5000
";

try {
  $dbh = new PDO("mysql:host=".$host.";dbname=".$db, $root, $root_password);

  foreach($dbh->query($request9) as $row)
  {
   echo $row[0] . " - " .$row[1] . " €" ."</br>";
  }
  // or die(print_r($dbh->errorInfo(), true));
  
  $dbh = null;
}
catch (PDOException $e) {
  die("DB ERROR: " . $e->getMessage());
}

echo "<br/>";
echo "<br/>";

echo "<div>Exo 5 : Liste des employés</div>";
echo "<div>Par numéro et la commission des employés triés par profession</div>";

$request9 = "SELECT nom, salaire FROM employe
WHERE salaire<5000
";

try {
  $dbh = new PDO("mysql:host=".$host.";dbname=".$db, $root, $root_password);

  foreach($dbh->query($request9) as $row)
  {
   echo $row[0] . " - " .$row[1] . " €" ."</br>";
  }
  // or die(print_r($dbh->errorInfo(), true));
  
  $dbh = null;
}
catch (PDOException $e) {
  die("DB ERROR: " . $e->getMessage());
}

echo "<br/>";
echo "<br/>";

$request10 = "INSERT INTO departement (numero, nom, ville)
VALUES  (4, 'Retraité', 'Miami')
";

$request11 = "UPDATE employe
SET departement = 4
WHERE DateEmbauche < '1982/01/01';
";

// change les employés en retraité
// try {
//   $dbh = new PDO("mysql:host=".$host.";dbname=".$db, $root, $root_password);
  
//   $dbh->exec($request11)

//   or die(print_r($dbh->errorInfo(), true));
  
//   $dbh = null;
// }
// catch (PDOException $e) {
//   die("DB ERROR: " . $e->getMessage());
// }

// ajouter des nouvelles valeurs
$request12 = "INSERT INTO employe (numero, nom, profession, DateEmbauche, salaire, commission, departement)
VALUES (60, 'Lise', 'Commercial', '2008/11/06', 4500, 3250, 1),
(70, 'Jenny', 'Ingénieur', '2017/03/27', 6000, 5000, 2),
(80, 'Arthur', 'Pilote', '2015/04/17', 4500, 4500, 3),
(90, 'Bill', 'Pilote', '2008/05/12', 3500, NULL, 2),
(100, 'William', 'Vendeur', '2008/05/12', 3500, 2000, 1),
(110, 'Jane', 'Technicien', '2008/05/12', 4000, NULL, 2)
";

$request13 = "
";

try {
  $dbh = new PDO("mysql:host=".$host.";dbname=".$db, $root, $root_password);
  
  $dbh->exec($request13)

  or die(print_r($dbh->errorInfo(), true));
  
  $dbh = null;
}
catch (PDOException $e) {
  die("DB ERROR: " . $e->getMessage());
}





?>

</body>
</html>