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

$querycat = "SELECT name, id from categories where id = " . $_GET['catid'];

$resultset = $db->query($querycat);

$category = $resultset->fetch(PDO::FETCH_ASSOC);

$categoryID = $category['id'];
$categoryName = $category['name'];

//define query
$query = "SELECT id, name,images from products where category_id = " . $_GET['catid'];

//execute query and returns a PDOStatement object
$resultset = $db->query($query);

$products = $resultset->fetchAll(PDO::FETCH_ASSOC);
?>
<h2><?= $categoryName ?> </h2>
<table>
<tr>
<?php
foreach($products as $product)
{
?>
<td>
<a href="description.php?pid=<?= $product['id'] . "&catid=" . $categoryID?>"><img src='../images/<?= $product['images'] ?>' width='100px'>
<p><?= $product['name'] ?></p>
</a>
</td>
<?php
}
?>
<tr>
</table>
<p align="center"><a href="go-camping.php">Back</a></p>
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