<!-- DATABASE_URL="mysql://root:wxc@127.0.0.1:3306/maxime-gauthier.com?serverVersion=mariadb-10.4.11" -->
<?php
// $user = "root";
// $pass = "wxc";

// $dbh = new PDO('mysql:host=localhost;dbname=sqltest', $user, $pass);
// $sql = ("CREATE DATABASE sqltest");
// $dbh->query($sql);


$host = "localhost";
$root = "root";
$root_password = "wxc";

$user = 'newuser';
$pass = 'newpass';
$db = "sqldb";

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

try {
  $dbh = new PDO("mysql:host=".$host.";dbname=".$db, $root, $root_password);

  $dbh->exec($request5)
  or die(print_r($dbh->errorInfo(), true));

  $dbh = null;
}
catch (PDOException $e) {
  die("DB ERROR: " . $e->getMessage());
}

?>