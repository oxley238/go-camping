<html>
<head>
<title>Go Camping</title>
<?php
include("../includes/banner.php");
?>
<?php



try{
$database = "go-camping";
$username = "root";
$password = "";

// connect to database
$db = new PDO("mysql:host=localhost;dbname=$database",$username,$password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//define query
$query = "SELECT id, name, images, description, price from products where id = " . $_GET['pid'];

//execute query and returns a PDOStatement object
$resultset = $db->query($query);

$products = $resultset->fetchAll(PDO::FETCH_ASSOC);

$catid = $_GET['catid'];

?>
<table>
<tr>
<?php
foreach($products as $product)
{
?>
<td>
<img src='../images/<?= $product['images'] ?>' width='100px'>
<p><b><?= $product['name'] ?></b></p>
<p><?= $product['description'] ?></p>
<p><?= "Cost: $" . $product['price'] ?></p>
</td>
<?php
}
?>
<tr>
</table>
<p align="center"><a href='products.php?catid=<?= $catid ?>'>Back</a></p>
<?php
//destroy the PDO object
$db = null;

//if connection fails throw a PDO exception
}catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
</body>
</html>