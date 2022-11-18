<html>

<body>
test

<?php

require_once("Connection.php");

//A CHANGER 
$user= 'sasa';
$pass='sasa';
$dsn='mysql:host=localhost;dbname=siteperso';
try{
$con=new Connection($dsn,$user,$pass);

$query = "SELECT * FROM categorie WHERE id=:id"; 


echo $con->executeQuery($query, array(':id' => array(1, PDO::PARAM_INT) ) );

$results=$con->getResults();
Foreach ($results as $row)
	print $row['titre'];    

 
}
catch( PDOException $Exception ) {
echo 'erreur';
echo $Exception->getMessage();}
?>

</body>
</html>
